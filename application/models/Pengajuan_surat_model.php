<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengajuan_surat_model extends CI_Model
{

    public $table = 'pengajuan_surat';
    public $id = 'id_pengajuan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        if ($this->session->userdata('role') == 'rw') {
            // $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
        } else {
            $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
        }
        
        
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pengajuan', $q);
	$this->db->or_like('jenis_surat', $q);
	$this->db->or_like('nama_pembuat_pengajuan', $q);
	$this->db->or_like('nama_yang_meninggal', $q);
	$this->db->or_like('tanggal_kematian', $q);
	$this->db->or_like('faktor_kematian', $q);
	$this->db->or_like('tanggal_dispensasi', $q);
	$this->db->or_like('sampai_tanggal_dispensasi', $q);
	$this->db->or_like('jumlah_hari', $q);
	$this->db->or_like('alasan_dispen', $q);
	$this->db->or_like('rt_domisili', $q);
	$this->db->or_like('date_created', $q);
	$this->db->or_like('date_updated', $q);
	$this->db->or_like('id_user', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pengajuan', $q);
	$this->db->or_like('jenis_surat', $q);
	$this->db->or_like('nama_pembuat_pengajuan', $q);
	$this->db->or_like('nama_yang_meninggal', $q);
	$this->db->or_like('tanggal_kematian', $q);
	$this->db->or_like('faktor_kematian', $q);
	$this->db->or_like('tanggal_dispensasi', $q);
	$this->db->or_like('sampai_tanggal_dispensasi', $q);
	$this->db->or_like('jumlah_hari', $q);
	$this->db->or_like('alasan_dispen', $q);
	$this->db->or_like('rt_domisili', $q);
	$this->db->or_like('date_created', $q);
	$this->db->or_like('date_updated', $q);
	$this->db->or_like('id_user', $q);
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