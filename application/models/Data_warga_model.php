<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_warga_model extends CI_Model
{

    public $table = 'data_warga';
    public $id = 'id_data_warga';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('status_keluarga', 'kepala keluarga');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_for_pengajuan()
    {
        var_dump($this->session->userdata('no_kk'));
        $this->db->where('no_kk', $this->session->userdata('no_kk'));
        // $this->db->order_by($this->id, $this->order);
        return $this->db->get('data_warga')->result();
    }

    function get_for_user()
    {
        $this->db->where('status_keluarga', 'kepala keluarga');
        $this->db->order_by('rt', 'ASC');
        return $this->db->get('data_warga')->result();
    }

    // get data by id
    function get_by_id($nokk)
    {
        $this->db->join('desk_keluarga', 'desk_keluarga.no_kk = data_warga.no_kk');
        $this->db->where('data_warga.no_kk', $nokk);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_nokk($nokk)
    {
        $this->db->join('desk_keluarga', 'desk_keluarga.no_kk = data_warga.no_kk');
        $this->db->where('data_warga.no_kk', $nokk);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_data_warga', $q);
	$this->db->or_like('no_kk', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('status_perkawinan', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('warganegara', $q);
	$this->db->or_like('pendidikan', $q);
	$this->db->or_like('kondisi_pekerjaan', $q);
	$this->db->or_like('pekerjaan_utama', $q);
	$this->db->or_like('jamsostek', $q);
	$this->db->or_like('penghasilan', $q);
	$this->db->or_like('jamsoskes', $q);
	$this->db->or_like('rt', $q);
	$this->db->or_like('status_keluarga', $q);
	$this->db->or_like('date_created', $q);
	$this->db->or_like('date_updated', $q);
	$this->db->or_like('id_user', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_data_warga', $q);
	$this->db->or_like('no_kk', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('status_perkawinan', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('warganegara', $q);
	$this->db->or_like('pendidikan', $q);
	$this->db->or_like('kondisi_pekerjaan', $q);
	$this->db->or_like('pekerjaan_utama', $q);
	$this->db->or_like('jamsostek', $q);
	$this->db->or_like('penghasilan', $q);
	$this->db->or_like('jamsoskes', $q);
	$this->db->or_like('rt', $q);
	$this->db->or_like('status_keluarga', $q);
	$this->db->or_like('date_created', $q);
	$this->db->or_like('date_updated', $q);
	$this->db->or_like('id_user', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert_batch($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($nokk)
    {
        $this->db->join('desk_keluarga', 'desk_keluarga.no_kk = data_warga.no_kk');
        $this->db->where('no_kk', $nokk);
        $this->db->delete(array($this->table,'desk_keluarga'));
    }



}