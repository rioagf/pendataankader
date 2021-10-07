<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'user';
    public $id = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data user
    function get_data_user()
    {
        $this->db->where('role', 'warga');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data user
    function get_data_user_by_id($id)
    {
        $this->db->join('data_warga', 'data_warga.no_kk = user.no_kk');
        $this->db->where('user.'.$this->id, $id);
        return $this->db->get($this->table)->result();
    }


    // get data user
    function get_data_petugas()
    {
        $this->db->where('role !=', 'warga');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->join('data_warga', 'data_warga.no_kk = user.no_kk');
        $this->db->where('user.'.$this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function profile($nokk)
    {
        $this->db->join('data_warga', 'data_warga.no_kk = user.no_kk');
        $this->db->where('user.no_kk', $nokk);
        $this->db->group_by('data_warga.nik');
        $this->db->order_by('data_warga.usia', 'DESC');
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_user', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('no_hp', $q);
        $this->db->or_like('no_kk', $q);
        $this->db->or_like('role', $q);
        $this->db->or_like('date_created', $q);
        $this->db->or_like('date_updated', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_user', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('no_hp', $q);
        $this->db->or_like('no_kk', $q);
        $this->db->or_like('role', $q);
        $this->db->or_like('date_created', $q);
        $this->db->or_like('date_updated', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // insert data
    function insert_petugas($data)
    {
        $this->db->select('nama_lengkap');
        $this->db->where('no_kk', $data['no_kk']);
        $nama = $this->db->get('data_warga')->row();
        // var_dump($nama->nama_lengkap);die();

        $this->db->insert($this->table, $data);
        $id_user = $this->db->insert_id();


        $data2 = array(
            'nama_petugas' => $nama->nama_lengkap,
            'jabatan' => ucwords($this->input->post('role')),
            'id_user' => $id_user,
            'date_created' => date('Y-m-d'),
            'date_updated' => date('Y-m-d'),
        );
        
        $this->db->insert('data_petugas', $data2);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function getdata($username)
    {
        $username = $this->session->userdata('username');
        $sql = $this->db->query('SELECT * FROM data_warga join user on data_warga.id_user = user.id_user WHERE user.username = "'.$username.'"');
        return $sql->row();
    }

    function getdatapetugas($username)
    {
        $username = $this->session->userdata('username');
        $sql = $this->db->query('SELECT * FROM data_petugas join user on data_petugas.id_user = user.id_user WHERE user.username = "'.$username.'"');
        return $sql->row();
    }


    //Start: method tambahan untuk reset code  
    public function getUserInfo($id)  
    {  
        $q = $this->db->get_where('user', array('id_user' => $id), 1);   
        if($this->db->affected_rows() > 0){  
            $row = $q->row();  
            return $row;  
        }else{  
            error_log('User tidak ditemukan getUserInfo('.$id.')');  
            return false;  
        }  
    }  

    public function getUserInfoByEmail($email){  
        $q = $this->db->get_where('user', array('email' => $email), 1);   
        if($this->db->affected_rows() > 0){  
            $row = $q->row();  
            return $row;  
        }  
    }  

    public function insertToken($id_user)  
    {    
        $token = substr(sha1(rand()), 0, 30);   
        $date = date('Y-m-d');  

        $string = array(  
            'token'=> $token,  
            'id_user'=>$id_user,  
            'date_created'=>$date  
        );  
        $query = $this->db->insert_string('token',$string);  
        $this->db->query($query);  
        return $token . $id_user;  

    }  

    public function isTokenValid($token)  
    {  
        $tkn = substr($token,0,30);  
        $uid = substr($token,30);     

        $q = $this->db->get_where('token', array(  
            'token.token' => $tkn,   
            'token.id_user' => $uid), 1);               

        if($this->db->affected_rows() > 0){  
            $row = $q->row();         

            $created = $row->date_created;  
            $createdTS = strtotime($created);  
            $today = date('Y-m-d');   
            $todayTS = strtotime($today);  

            if($createdTS != $todayTS){  
                return false;  
            }  

            $user_info = $this->getUserInfo($row->id_user);  
            return $user_info;  

        }else{  
            return false;  
        }  

    }   

    public function updatePassword($post)  
    {    
        $this->db->where('id_user', $post['id_user']);  
        $this->db->update('user', array('password' => $post['password']));      
        return true;  
    }   
   //End: method tambahan untuk reset code

}