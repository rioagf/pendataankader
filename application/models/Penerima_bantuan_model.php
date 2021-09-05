<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penerima_bantuan_model extends CI_Model
{

    public $table = 'penerima_bantuan';
    public $id = 'id_penerima';
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
        $this->db->like('id_penerima', $q);
	$this->db->or_like('no_kk', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('nama_penerima', $q);
	$this->db->or_like('rt', $q);
	$this->db->or_like('jenis_bantuan', $q);
	$this->db->or_like('tanggal_generate_penerima', $q);
	$this->db->or_like('date_created', $q);
	$this->db->or_like('date_updated', $q);
	$this->db->or_like('id_user', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_no_kk()
    {
        $this->db->join('desk_keluarga', 'desk_keluarga.no_kk = data_warga.no_kk');
        $this->db->where('data_warga.status_keluarga', 'kepala keluarga');
        return $this->db->get('data_warga');
    }

    function count_layak()
    {
        $this->db->join('data_warga', 'data_warga.no_kk = data_training.no_kk');
        $this->db->join('desk_keluarga', 'desk_keluarga.no_kk = data_training.no_kk');
        $this->db->where(array('data_training.status_kelayakan' => 'Layak', 'data_warga.status_keluarga' => 'kepala keluarga'));
        $this->db->from('data_training');
        return $this->db->count_all_results();
    }

    function count_tidak_layak()
    {
        $this->db->join('data_warga', 'data_warga.no_kk = data_training.no_kk');
        $this->db->join('desk_keluarga', 'desk_keluarga.no_kk = data_training.no_kk');
        $this->db->where(array('data_training.status_kelayakan' => 'Tidak Layak', 'data_warga.status_keluarga' => 'kepala keluarga'));
        $this->db->from('data_training');
        return $this->db->count_all_results();
    }

    function count_all_data()
    {
        $this->db->join('data_warga', 'data_warga.no_kk = data_training.no_kk');
        $this->db->join('desk_keluarga', 'desk_keluarga.no_kk = data_training.no_kk');
        $this->db->where('data_warga.status_keluarga', 'kepala keluarga');
        $this->db->from('data_training');
        return $this->db->count_all_results();
    }

    function pekerjaan_layak($pekerjaan)
    {
        // $this->db->join('data_warga', 'data_warga.no_kk = desk_keluarga.no_kk');
        $db = $this->db->query("SELECT count(*) as jml_pekerjaan FROM data_warga JOIN data_training ON data_training.no_kk = data_warga.no_kk WHERE data_warga.kondisi_pekerjaan = '$pekerjaan' AND data_training.status_kelayakan = 'Layak' AND data_warga.status_keluarga = 'Kepala Keluarga'")->row();
        return $db;
    }

    function pekerjaan_tidak_layak($pekerjaan)
    {
        // $this->db->join('data_warga', 'data_warga.no_kk = desk_keluarga.no_kk');
        $db = $this->db->query("SELECT count(*) as jml_pekerjaan FROM data_warga JOIN data_training ON data_training.no_kk = data_warga.no_kk WHERE data_warga.kondisi_pekerjaan = '$pekerjaan' AND data_training.status_kelayakan = 'Tidak Layak' AND data_warga.status_keluarga = 'Kepala Keluarga'")->row();
        return $db;
    }

    function usia_layak($usia)
    {
        // $this->db->join('data_warga', 'data_warga.no_kk = desk_keluarga.no_kk');
        $db = $this->db->query("SELECT count(*) as usia_layak FROM data_warga JOIN data_training ON data_training.no_kk = data_warga.no_kk WHERE data_warga.usia = '$usia' AND data_training.status_kelayakan = 'Layak' AND data_warga.status_keluarga = 'Kepala Keluarga'")->row();
        return $db;
    }

    function usia_tidak_layak($usia)
    {
        // $this->db->join('data_warga', 'data_warga.no_kk = desk_keluarga.no_kk');
        $db = $this->db->query("SELECT count(*) as usia_tidak_layak FROM data_warga JOIN data_training ON data_training.no_kk = data_warga.no_kk WHERE data_warga.usia = '$usia' AND data_training.status_kelayakan = 'Tidak Layak' AND data_warga.status_keluarga = 'Kepala Keluarga'")->row();
        return $db;
    }

    function status_perkawinan_layak($perkawinan)
    {
        // $this->db->join('data_warga', 'data_warga.no_kk = desk_keluarga.no_kk');
        $db = $this->db->query("SELECT count(*) as perkawinan FROM data_warga JOIN data_training ON data_training.no_kk = data_warga.no_kk WHERE data_warga.status_perkawinan = '$perkawinan' AND data_training.status_kelayakan = 'Layak' AND data_warga.status_keluarga = 'Kepala Keluarga'")->row();
        return $db;
    }

    function status_perkawinan_tidak_layak($perkawinan)
    {
        // $this->db->join('data_warga', 'data_warga.no_kk = desk_keluarga.no_kk');
        $db = $this->db->query("SELECT count(*) as perkawinan FROM data_warga JOIN data_training ON data_training.no_kk = data_warga.no_kk WHERE data_warga.status_perkawinan = '$perkawinan' AND data_training.status_kelayakan = 'Tidak Layak' AND data_warga.status_keluarga = 'Kepala Keluarga'")->row();
        return $db;
    }

    function jamsostek_layak($jamsostek)
    {
        // $this->db->join('data_warga', 'data_warga.no_kk = desk_keluarga.no_kk');
        $db = $this->db->query("SELECT count(*) as jamsostek FROM data_warga JOIN data_training ON data_training.no_kk = data_warga.no_kk WHERE data_warga.jamsostek = '$jamsostek' AND data_training.status_kelayakan = 'Layak' AND data_warga.status_keluarga = 'Kepala Keluarga'")->row();
        return $db;
    }

    function jamsostek_tidak_layak($jamsostek)
    {
        // $this->db->join('data_warga', 'data_warga.no_kk = desk_keluarga.no_kk');
        $db = $this->db->query("SELECT count(*) as jamsostek FROM data_warga JOIN data_training ON data_training.no_kk = data_warga.no_kk WHERE data_warga.jamsostek = '$jamsostek' AND data_training.status_kelayakan = 'Tidak Layak' AND data_warga.status_keluarga = 'Kepala Keluarga'")->row();
        return $db;
    }

    function hitung_gaji_layak($penghasilan)
    {
        $kat ="";
        if ($penghasilan > 2500000) {
            $kat = "tinggi";
        }else if($penghasilan >= 1500000 && $penghasilan <= 2500000){
            $kat = "sedang";
        }else if($penghasilan < 1500000){
            $kat = "rendah";
        }
        $q_layak = $this->db->query("SELECT count(*) as jml FROM (
            SELECT data_warga.penghasilan,  data_training.status_kelayakan,
            CASE
            WHEN data_warga.penghasilan > 3000000 THEN 'tinggi'
            WHEN data_warga.penghasilan >= 2000000 AND data_warga.penghasilan <= 3000000 THEN 'sedang'
            WHEN data_warga.penghasilan < 2000000 THEN 'rendah'
            ELSE ''
            END AS c_jml_penghasilan
            FROM data_training JOIN data_warga ON data_warga.no_kk = data_training.no_kk WHERE status_keluarga = 'Kepala Keluarga'
            ) as conversi_jml_penghasilan  WHERE c_jml_penghasilan ='$kat' AND status_kelayakan = 'layak'
            ")->row();

        return $q_layak;
    }

    function hitung_gaji_tidak_layak($penghasilan)
    {
        $kat ="";
        if ($penghasilan > 2500000) {
            $kat = "tinggi";
        }else if($penghasilan >= 1500000 && $penghasilan <= 2500000){
            $kat = "sedang";
        }else if($penghasilan < 1500000){
            $kat = "rendah";
        }
        $q_tidak_layak = $this->db->query("SELECT count(*) as jml FROM (
            SELECT data_warga.penghasilan,  data_training.status_kelayakan,
            CASE
            WHEN data_warga.penghasilan > 3000000 THEN 'tinggi'
            WHEN data_warga.penghasilan >= 2000000 AND data_warga.penghasilan <= 3000000 THEN 'sedang'
            WHEN data_warga.penghasilan < 2000000 THEN 'rendah'
            ELSE ''
            END AS c_jml_penghasilan
            FROM data_training JOIN data_warga ON data_warga.no_kk = data_training.no_kk WHERE status_keluarga = 'Kepala Keluarga'
            ) as conversi_jml_penghasilan  WHERE c_jml_penghasilan ='$kat' AND status_kelayakan = 'tidak layak'
            ")->row();

        return $q_tidak_layak;
    }

    function hitung_pendidikan_layak($pendidikan)
    {
        $q_layak = $this->db->query("SELECT count(*) as jml_pendidikan FROM data_training JOIN data_warga ON data_warga.no_kk = data_training.no_kk WHERE data_warga.status_keluarga = 'Kepala Keluarga' AND data_warga.pendidikan = '$pendidikan' AND status_kelayakan = 'layak'")->row();

        return $q_layak;
    }

    function hitung_pendidikan_tidak_layak($pendidikan)
    {
        $q_tidak_layak = $this->db->query("SELECT count(*) as jml_pendidikan FROM data_training JOIN data_warga ON data_warga.no_kk = data_training.no_kk WHERE data_warga.status_keluarga = 'Kepala Keluarga' AND data_warga.pendidikan = '$pendidikan' AND status_kelayakan = 'tidak layak'
            ")->row();

        return $q_tidak_layak;
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_penerima', $q);
	$this->db->or_like('no_kk', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('nama_penerima', $q);
	$this->db->or_like('rt', $q);
	$this->db->or_like('jenis_bantuan', $q);
	$this->db->or_like('tanggal_generate_penerima', $q);
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
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}