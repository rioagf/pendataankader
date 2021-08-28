<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') != 'log in') {
            $data = array(
                'content' => 'auth/login',
                'title' => 'Login Sistem',
            );
            $this->load->view('themes/content', $data);
        } else {
            redirect(base_url());
        }

    }

    public function forgotpassword()  
    {  

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');   

        if($this->form_validation->run() == FALSE) {  
            $data = array(
                'content' => 'auth/forgot_password',
                'title' => 'Lupa Password',
            );
            $this->load->view('themes/content', $data); 
        }else{  
            $email = $this->input->post('email');   
            $clean = $this->security->xss_clean($email);  
            $userInfo = $this->User_model->getUserInfoByEmail($clean);
            $tanggal = date("d F Y");  

            if(!$userInfo){  
                $this->session->set_flashdata('sukses', 'email address salah, silakan coba lagi.');  
                redirect(site_url('login'),'refresh');   
            } 

            $token = $this->User_model->insertToken($userInfo->id_user);              
            $qstring = $this->base64url_encode($token);           
            $url = site_url() . 'auth/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>';   
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://mail.solusidesainweb.com";//pengaturan smtp
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user']= "no-reply@solusidesainweb.com"; // isi dengan email kamu
            $config['smtp_pass']= "no-reply@admin1234#"; // isi dengan password kamu
            $config['crlf']="\r\n"; 
            $config['newline']="\r\n"; 
            $config['wordwrap'] = TRUE;
            //memanggil library email dan set konfigurasi untuk pengiriman email

            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject("Permintaan Reset Password");
            $this->email->message(
                "
                <div style='width: 1000px; padding: 25px; text-align: center; background-color: #e5e5e5;'>
                <h1 style='text-align:center;'>PERMINTAAN RESET PASSWORD</h1>
                <hr style='border-top: 3px solid #ccc;' width='75px'>
                <br>
                <p style='font-size: 24px;'>Kami mendapatkan permintaan untuk reset password dengan akun email ".$email." pada tanggal : ".$tanggal."<br>
                Jika anda merasa melakukan hal tersebut, silahkan klik link dibawah ini untuk melakukan reset password<br><br>
                ".$link.
                "<br><br>Jika anda tidak merasa melakukan hal tersebut, abaikan email ini dan segera ganti password akun anda</p></div>"
            );

            if($this->email->send()) {
                $this->session->set_flashdata('success','Email terkirim');
            } else {
                $this->session->set_flashdata('error','Gagal melakukan pengiriman reset password');
            }

            redirect(site_url('auth/konfirmasi'));  

        }  

    }  

    public function reset_password()  
    {  
    	$token = $this->base64url_decode($this->uri->segment(4));           
    	$cleanToken = $this->security->xss_clean($token);  
    	$user_info = $this->User_model->isTokenValid($cleanToken); //either false or array();          

    	if(!$user_info){  
    		$this->session->set_flashdata('error', 'Token tidak valid atau kadaluarsa');  
    		redirect(site_url('login'),'refresh');   
    	}    

    	$data = array(  
    		'title'=> 'Halaman Reset Password',  
            'content' => 'auth/reset_password',
    		// 'nama'=> $user_info->nama,   
    		'email'=>$user_info->email,   
    		'token'=>$this->base64url_encode($token)  
    	);  

    	$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');  
    	$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');         

    	if ($this->form_validation->run() == FALSE) {
            // $this->session->set_flashdata('error', 'Update password gagal. Silahkan periksa kembali password yang diinputkan dan pastikan benar.');    
            $this->load->view('themes/content', $data);  
        }else{  

            $post = $this->input->post(NULL, TRUE);          
            $cleanPost = $this->security->xss_clean($post);          
            $hashed = sha1(md5($cleanPost['password']));          
            $cleanPost['password'] = $hashed;  
            $cleanPost['id_user'] = $user_info->id_user;  
            unset($cleanPost['passconf']);          
            if(!$this->User_model->updatePassword($cleanPost)){  
                $this->session->set_flashdata('error', 'Update password gagal.');  
            }else{  
                $this->session->set_flashdata('sukses', 'Password anda sudah diperbaharui. Silakan login.');  
            }  
            redirect(site_url('auth/sukses_reset'),'refresh');         
        }  
    }

    public function sukses_reset()
    {
        $data = array(  
            'title'=> 'Halaman Reset Password',  
            'content' => 'auth/sukses_reset',
        );
        $this->load->view('themes/content', $data);
    }

    public function konfirmasi()
    {
        $data = array(  
            'title'=> 'Halaman Reset Password',  
            'content' => 'auth/konfirmasi',
        );
        $this->load->view('themes/content', $data);
    }  

    public function base64url_encode($data) {   
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
    }   

    public function base64url_decode($data) {   
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
    }

    public function proseslogin(){
        $username = $this->input->post('username');
        $password = sha1(md5($this->input->post('password')));
        $datasess = $this->M_auth->cekuser($username, $password)->num_rows();
        $datauser = $this->M_auth->cekuser($username, $password)->row();
        // var_dump($datauser);die();
        if ($datasess > 0 && $datauser->role == 'administrator') {
            $datasession = array(
                'id_user' => $datauser->id_user,
                'username' => $datauser->username,
                'role' => $datauser->role,
                'no_kk' => $datauser->no_kk,
                'status' => 'log in',
            );
            $this->session->set_userdata($datasession);
            redirect(base_url(''));
        } elseif ($datasess > 0 && $datauser->role == 'rw') {
            $datasession = array(
                'id_user' => $datauser->id_user,
                'username' => $datauser->username,
                'role' => $datauser->role,
                'no_kk' => $datauser->no_kk,
                'status' => 'log in',
            );
            $this->session->set_userdata($datasession);
            redirect(base_url());
        } elseif ($datasess > 0 && $datauser->role == 'rt') {
            $datasession = array(
                'id_user' => $datauser->id_user,
                'username' => $datauser->username,
                'role' => $datauser->role,
                'no_kk' => $datauser->no_kk,
                'status' => 'log in',
            );
            $this->session->set_userdata($datasession);
            redirect(base_url());
        } elseif ($datasess > 0 && $datauser->role == 'kader') {
            $datasession = array(
                'id_user' => $datauser->id_user,
                'username' => $datauser->username,
                'role' => $datauser->role,
                'no_kk' => $datauser->no_kk,
                'status' => 'log in',
            );
            $this->session->set_userdata($datasession);
            redirect(base_url());
        } elseif ($datasess > 0 && $datauser->role == 'warga') {
            $datasession = array(
                'id_user' => $datauser->id_user,
                'username' => $datauser->username,
                'role' => $datauser->role,
                'no_kk' => $datauser->no_kk,
                'status' => 'log in',
            );
            $this->session->set_userdata($datasession);
            redirect(base_url());
        } else {
            $this->session->set_flashdata('error', 'Username atau Password Salah');
            redirect(base_url('auth'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}