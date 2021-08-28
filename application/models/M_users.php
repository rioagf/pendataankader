<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {
  function get__detail_login($email,$password) {
    $this->db->where('username', $email);
    $this->db->where('password', $password);
    $this->db->or_where('email', $email);
    $this->db->where('password', $password);
    return $this->db->get('user');
    // return $query;
  }

  function get__detail_data_petugas($email,$password){
    $this->db->join('data_petugas','user.id_user = data_petugas.id_user');
    $this->db->where('username', $email);
    $this->db->where('password', $password);
    $this->db->or_where('email', $email);
    $this->db->where('password', $password);
    return $this->db->get('user');
  }

  function data__petugas(){
    $this->db->join('data_petugas', 'user.id_user = data_petugas.id_user');
    return $this->db->get('user');
  }

  function detail__petugas($id){
    $this->db->where('id_user', $id);
    $this->db->join('data_petugas', 'user.id_user = data_petugas.id_user');
    return $this->db->get('user');
  }
}
