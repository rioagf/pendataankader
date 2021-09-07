<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_keluhan_warga_model extends CI_Model
{

    public $table = 'data_keluhan_warga';
    public $id = 'id_keluhan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        if ($this->session->userdata('role') == 'rw') {
            $this->db->join('data_warga', 'data_warga.id_user = data_keluhan_warga.id_user');
            $this->db->where('data_warga.status_keluarga', 'Kepala Keluarga');
            // $this->db->order_by($this->id, $this->order);
            return $this->db->get($this->table)->result();
        } else if ($this->session->userdata('role') == 'warga') {
            $where = array(
                'data_warga.status_keluarga' => 'kepala keluarga',
                'data_keluhan_warga.id_user'   => $this->session->userdata('id_user'),
            );
            $this->db->join('data_warga', 'data_warga.id_user = data_keluhan_warga.id_user');
            $this->db->where($where);
            $this->db->order_by($this->id, $this->order);
            return $this->db->get($this->table)->result();
        } else if ($this->session->userdata('role') == 'kader') {
            $where = array(
                'data_petugas.jabatan' => 'Kader',
                'data_keluhan_warga.id_user'   => $this->session->userdata('id_user'),
            );
            $this->db->join('data_petugas', 'data_petugas.id_user = data_keluhan_warga.id_user');
            $this->db->where($where);
            $this->db->order_by($this->id, $this->order);
            return $this->db->get($this->table)->result();
        }
        
        


    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->join('data_warga', 'data_warga.id_user = data_keluhan_warga.id_user');
        $this->db->where('data_warga.id_user', $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_keluhan', $q);
        $this->db->or_like('judul_keluhan', $q);
        $this->db->or_like('deskripsi_keluhan', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('date_created', $q);
        $this->db->or_like('date_updated', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_keluhan', $q);
        $this->db->or_like('judul_keluhan', $q);
        $this->db->or_like('deskripsi_keluhan', $q);
        $this->db->or_like('id_user', $q);
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

}