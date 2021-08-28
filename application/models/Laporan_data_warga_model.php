<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_data_warga_model extends CI_Model
{

    public $table = 'laporan_data_warga';
    public $id = 'id_laporandata_warga';
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

    function rt_satu()
    {
        return $this->db->query("SELECT count(*) AS rtsatu FROM data_warga WHERE rt = '1' AND status_keluarga = 'kepala keluarga'");
    }

    function rt_dua()
    {
        return $this->db->query("SELECT count(*) AS rtdua FROM data_warga WHERE rt = '2' AND status_keluarga = 'kepala keluarga'");
    }

    function rt_tiga()
    {
        return $this->db->query("SELECT count(*) AS rttiga FROM data_warga WHERE rt = '3' AND status_keluarga = 'kepala keluarga'");
    }

    function rt_empat()
    {
        return $this->db->query("SELECT count(*) AS rtempat FROM data_warga WHERE rt = '4' AND status_keluarga = 'kepala keluarga'");
    }

    function rt_lima()
    {
        return $this->db->query("SELECT count(*) AS rtlima FROM data_warga WHERE rt = '5' AND status_keluarga = 'kepala keluarga'");
    }

    function rt_enam()
    {
        return $this->db->query("SELECT count(*) AS rtenam FROM data_warga WHERE rt = '6' AND status_keluarga = 'kepala keluarga'");
    }

    function rt_tujuh()
    {
        return $this->db->query("SELECT count(*) AS rttujuh FROM data_warga WHERE rt = '7' AND status_keluarga = 'kepala keluarga'");
    }

    function rt_delapan()
    {
        return $this->db->query("SELECT count(*) AS rtdelapan FROM data_warga WHERE rt = '8' AND status_keluarga = 'kepala keluarga'");
    }

    function jumlah_semua()
    {
        return $this->db->query("SELECT count(*) AS jumlah_data FROM data_warga WHERE status_keluarga = 'kepala keluarga'");
    }

    function get_data()
    {
        $session = $this->session->userdata('role');
        if ($session == 'kader') {
            $this->db->order_by($this->id, $this->order);
            return $this->db->get($this->table)->result();
        } else {
            $this->db->where('status_lapor', 'Dilaporkan');
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
        $this->db->like('id_laporandata_warga', $q);
	$this->db->or_like('jumlah_data', $q);
	$this->db->or_like('id_data_warga', $q);
	$this->db->or_like('status_lapor', $q);
	$this->db->or_like('rt', $q);
	$this->db->or_like('date_created', $q);
	$this->db->or_like('date_updated', $q);
	$this->db->or_like('id_user', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_laporandata_warga', $q);
	$this->db->or_like('jumlah_data', $q);
	$this->db->or_like('id_data_warga', $q);
	$this->db->or_like('status_lapor', $q);
	$this->db->or_like('rt', $q);
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