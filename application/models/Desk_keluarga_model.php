<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Desk_keluarga_model extends CI_Model
{

    public $table = 'desk_keluarga';
    public $id = 'id_desk';
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

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_desk', $q);
	$this->db->or_like('no_kk', $q);
	$this->db->or_like('tempat_tinggal', $q);
	$this->db->or_like('status_lahan', $q);
	$this->db->or_like('luas_lantai', $q);
	$this->db->or_like('luas_lahan', $q);
	$this->db->or_like('jenis_lantai', $q);
	$this->db->or_like('dinding', $q);
	$this->db->or_like('jendela', $q);
	$this->db->or_like('genteng', $q);
	$this->db->or_like('penerangan', $q);
	$this->db->or_like('energi_memasak', $q);
	$this->db->or_like('tps', $q);
	$this->db->or_like('mck', $q);
	$this->db->or_like('sumber_airmandi', $q);
	$this->db->or_like('fasilitas_bab', $q);
	$this->db->or_like('sumber_airminum', $q);
	$this->db->or_like('pembuangan_limbah', $q);
	$this->db->or_like('bawah_sutet', $q);
	$this->db->or_like('bantaran_sungai', $q);
	$this->db->or_like('lerang', $q);
	$this->db->or_like('kondisi_rumah', $q);
	$this->db->or_like('date_created', $q);
	$this->db->or_like('date_updated', $q);
	$this->db->or_like('id_user', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_desk', $q);
	$this->db->or_like('no_kk', $q);
	$this->db->or_like('tempat_tinggal', $q);
	$this->db->or_like('status_lahan', $q);
	$this->db->or_like('luas_lantai', $q);
	$this->db->or_like('luas_lahan', $q);
	$this->db->or_like('jenis_lantai', $q);
	$this->db->or_like('dinding', $q);
	$this->db->or_like('jendela', $q);
	$this->db->or_like('genteng', $q);
	$this->db->or_like('penerangan', $q);
	$this->db->or_like('energi_memasak', $q);
	$this->db->or_like('tps', $q);
	$this->db->or_like('mck', $q);
	$this->db->or_like('sumber_airmandi', $q);
	$this->db->or_like('fasilitas_bab', $q);
	$this->db->or_like('sumber_airminum', $q);
	$this->db->or_like('pembuangan_limbah', $q);
	$this->db->or_like('bawah_sutet', $q);
	$this->db->or_like('bantaran_sungai', $q);
	$this->db->or_like('lerang', $q);
	$this->db->or_like('kondisi_rumah', $q);
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