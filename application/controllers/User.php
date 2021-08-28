<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Data_warga_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('status') != 'log in') {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $user = $this->User_model->get_data_user();

        $data = array(
            'user_data' => $user,
            'start' => $start,
            'content' => 'user/user_list',
            'title' => 'Data User',

        );
        $this->load->view('themes/content', $data);
    }

    public function petugas()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $user = $this->User_model->get_data_petugas();

        $data = array(
            'user_data' => $user,
            'start' => $start,
            'content' => 'user/petugas_list',
            'title' => 'Data User Petugas',

        );
        $this->load->view('themes/content', $data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
                'content' => 'user/user_read',
                'title' => 'Data '.$row->username,
		        'id_user' => $row->id_user,
		        'username' => $row->username,
		        'password' => $row->password,
		        'email' => $row->email,
		        'no_hp' => $row->no_hp,
		        'no_kk' => $row->no_kk,
		        'role' => $row->role,
		        'date_created' => $row->date_created,
		        'date_updated' => $row->date_updated,
	        );
            $this->load->view('themes/content', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function profile($nokk) 
    {
        $row = $this->User_model->profile($nokk);
        if ($row) {
            $data = array(
                'content' => 'user/user_profile',
                'title' => 'Detail Data',
                'data' => $row,
            );
            $this->load->view('themes/content', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data_warga = $this->Data_warga_model->get_for_user();
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
            'content' => 'user/user_form',
            'title' => 'Tambah Data User',
	        'id_user' => set_value('id_user'),
	        'username' => set_value('username'),
	        'password' => set_value('password'),
	        'email' => set_value('email'),
	        'no_hp' => set_value('no_hp'),
	        'no_kk' => set_value('no_kk'),
	        'role' => set_value('role'),
            'data_warga' => $data_warga,
	    );
        $this->load->view('themes/content', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => sha1(md5($this->input->post('password',TRUE))),
		'email' => $this->input->post('email',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'no_kk' => $this->input->post('no_kk',TRUE),
		'role' => $this->input->post('role',TRUE),
		'date_created' => date('Y-m-d'),
		'date_updated' => date('Y-m-d'),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'content' => 'user/user_form',
                'title' => 'Ubah Data '.$row->username,
                'button' => 'Update',
                'action' => site_url('user/update_action'),
                'id_user' => set_value('id_user', $row->id_user),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'email' => set_value('email', $row->email),
                'no_hp' => set_value('no_hp', $row->no_hp),
                'no_kk' => set_value('no_kk', $row->no_kk),
                'role' => set_value('role', $row->role),
	        );
            $this->load->view('themes/content', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
                'username' => $this->input->post('username',TRUE),
                'password' => $this->input->post('password',TRUE),
                'email' => $this->input->post('email',TRUE),
                'no_hp' => $this->input->post('no_hp',TRUE),
                'no_kk' => $this->input->post('no_kk',TRUE),
                'role' => $this->input->post('role',TRUE),
                'date_updated' => date('Y-m-d'),
            );

            $this->User_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
	$this->form_validation->set_rules('role', 'role', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-11 09:15:13 */
/* http://harviacode.com */