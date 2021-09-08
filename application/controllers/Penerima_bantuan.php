<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Penerima_bantuan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Penerima_bantuan_model');
    $this->load->library('form_validation');
    if ($this->session->userdata('status') != 'log in') {
      redirect(base_url('auth'));
    }
  }

  public function index()
  {
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));
    $penerima_bantuan = $this->Penerima_bantuan_model->get_all();

    $data = array(
      'title' => 'Laporan Data Penerima Bantuan',
      'content' => 'penerima_bantuan/penerima_bantuan_list',
      'penerima_bantuan_data' => $penerima_bantuan,
      'start' => $start,
    );
    $this->load->view('themes/content', $data);
  }

  public function read($id) 
  {
    $row = $this->Penerima_bantuan_model->get_by_id($id);
    if ($row) {
      $data = array(
        'title' => 'Detail Penerima Bantuan',
        'content' => 'penerima_bantuan/penerima_bantuan_read',
        'id_penerima' => $row->id_penerima,
        'no_kk' => $row->no_kk,
        'nik' => $row->nik,
        'nama_penerima' => $row->nama_penerima,
        'rt' => $row->rt,
        'jenis_bantuan' => $row->jenis_bantuan,
        'tanggal_generate_penerima' => $row->tanggal_generate_penerima,
        'date_created' => $row->date_created,
        'date_updated' => $row->date_updated,
        'id_user' => $row->id_user,
      );
      $this->load->view('themes/content', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('penerima_bantuan'));
    }
  }

  public function create() 
  {
    $data = array(
      'button' => 'Create',
      'action' => site_url('penerima_bantuan/create_action'),
      'id_penerima' => set_value('id_penerima'),
      'no_kk' => set_value('no_kk'),
      'nik' => set_value('nik'),
      'nama_penerima' => set_value('nama_penerima'),
      'rt' => set_value('rt'),
      'jenis_bantuan' => set_value('jenis_bantuan'),
      'tanggal_generate_penerima' => set_value('tanggal_generate_penerima'),
      'date_created' => set_value('date_created'),
      'date_updated' => set_value('date_updated'),
      'id_user' => set_value('id_user'),
    );
    $this->load->view('penerima_bantuan/penerima_bantuan_form', $data);
  }

  public function create_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $data = array(
        'no_kk' => $this->input->post('no_kk',TRUE),
        'nik' => $this->input->post('nik',TRUE),
        'nama_penerima' => $this->input->post('nama_penerima',TRUE),
        'rt' => $this->input->post('rt',TRUE),
        'jenis_bantuan' => $this->input->post('jenis_bantuan',TRUE),
        'tanggal_generate_penerima' => $this->input->post('tanggal_generate_penerima',TRUE),
        'date_created' => $this->input->post('date_created',TRUE),
        'date_updated' => $this->input->post('date_updated',TRUE),
        'id_user' => $this->input->post('id_user',TRUE),
      );

      $this->Penerima_bantuan_model->insert($data);
      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('penerima_bantuan'));
    }
  }

  public function generate_data()
  {
    $avail = $this->Penerima_bantuan_model->get_no_kk()->num_rows();
    if ($avail > 0) {

      $layak = $this->Penerima_bantuan_model->count_layak();
      $tidak_layak = $this->Penerima_bantuan_model->count_tidak_layak();
      $count_data = $this->Penerima_bantuan_model->count_all_data();
      $no_kk = $this->Penerima_bantuan_model->get_no_kk()->result();
      $no_kk_layak = $this->Penerima_bantuan_model->get_no_kk()->row();
      $p_layak = (int)$layak/(int)$count_data;
      $p_tidaklayak = (int)$tidak_layak/(int)$count_data;
      $insertArray = array();
      foreach ($no_kk as $data) {

      //LAYAK
        $usia_layak = $this->Penerima_bantuan_model->usia_layak($data->usia);
        $pekerjaan_layak = $this->Penerima_bantuan_model->pekerjaan_layak($data->kondisi_pekerjaan);
        $pekerjaan_tidak_layak = $this->Penerima_bantuan_model->pekerjaan_tidak_layak($data->kondisi_pekerjaan);
        $jamsostek_layak = $this->Penerima_bantuan_model->jamsostek_layak($data->jamsostek);
        $jamsostek_tidak_layak = $this->Penerima_bantuan_model->jamsostek_tidak_layak($data->jamsostek);
        $status_perkawinan_layak = $this->Penerima_bantuan_model->status_perkawinan_layak($data->status_perkawinan);

      //TIDAK LAYAK
        $usia_tidak_layak = $this->Penerima_bantuan_model->usia_tidak_layak($data->usia);
        $status_perkawinan_tidak_layak = $this->Penerima_bantuan_model->status_perkawinan_tidak_layak($data->status_perkawinan);
        $gaji_layak = $this->Penerima_bantuan_model->hitung_gaji_layak($data->penghasilan);
        $gaji_tidak_layak = $this->Penerima_bantuan_model->hitung_gaji_layak($data->penghasilan);
        $pendidikan_layak = $this->Penerima_bantuan_model->hitung_pendidikan_layak($data->pendidikan);
        $pendidikan_tidak_layak = $this->Penerima_bantuan_model->hitung_pendidikan_tidak_layak($data->pendidikan);

      // perhitungan layak
        $p_usia_layak = number_format((int)$usia_layak->usia_layak/(int)$layak, 3);
        $p_gajilayak = number_format((int)$gaji_layak->jml/(int)$layak, 3);
        $p_pendidikanlayak = number_format((int)$pendidikan_layak->jml_pendidikan/(int)$layak, 3);
        $p_pekerjaan_layak = number_format((int)$pekerjaan_layak->jml_pekerjaan/(int)$layak, 3);
        $p_status_perkawinan_layak = number_format((int)$status_perkawinan_layak->perkawinan/(int)$layak, 3);
        $p_jamsostek_layak = number_format((int)$jamsostek_layak->jamsostek/(int)$layak, 3);
        $p_layak_bantuan = $p_gajilayak*$p_usia_layak*$p_pendidikanlayak*$p_pekerjaan_layak*$p_status_perkawinan_layak*$p_jamsostek_layak*$p_layak;

      // perhitungan tidak layak
        $p_usia_tidak_layak = number_format((int)$usia_tidak_layak->usia_tidak_layak/(int)$layak, 3);
        $p_gajitidaklayak = number_format((int)$gaji_tidak_layak->jml/(int)$tidak_layak, 3);
        $p_pendidikantidaklayak = number_format((int)$pendidikan_tidak_layak->jml_pendidikan/(int)$tidak_layak, 3);
        $p_pekerjaan_tidak_layak = number_format((int)$pekerjaan_tidak_layak->jml_pekerjaan/(int)$tidak_layak, 3);
        $p_status_perkawinan_tidak_layak = number_format((int)$status_perkawinan_tidak_layak->perkawinan/(int)$tidak_layak, 3);
        $p_jamsostek_tidak_layak = number_format((int)$jamsostek_tidak_layak->jamsostek/(int)$tidak_layak, 3);
        $p_tidak_layak_bantuan = $p_gajitidaklayak*$p_usia_tidak_layak*$p_pendidikantidaklayak*$p_pekerjaan_tidak_layak*$p_status_perkawinan_tidak_layak*$p_jamsostek_tidak_layak*$p_tidaklayak;

        if ($p_layak_bantuan > $p_tidak_layak_bantuan) {
          $status = 'Layak';
        } else {
          $status = 'Tidak Layak';
        }

        $data = array(
          'no_kk' => $data->no_kk,
          'nik' => $data->nik,
          'nama_penerima' => $data->nama_lengkap,
          'rt' => $data->rt,
          'jenis_bantuan' => 'PKH',
          'tanggal_generate_penerima' => date('Y-m-d'),
          'status' => $status,
          'date_created' => date('Y-m-d'),
          'date_updated' => date('Y-m-d'),
          'id_user' => $this->session->userdata('id_user'),
        );
        array_push($insertArray,$data);

      }

      $this->Penerima_bantuan_model->insert($insertArray);
      $this->session->set_flashdata('message', 'Data Penerima Bantuan Berhasil di Generate');
      redirect(site_url('penerima_bantuan'));
    } else {
      $this->session->set_flashdata('message', 'Data Warga Masih Kosong');
      redirect(site_url('penerima_bantuan'));
    }

  }

  public function update($id) 
  {
    $row = $this->Penerima_bantuan_model->get_by_id($id);

    if ($row) {
      $data = array(
        'button' => 'Update',
        'action' => site_url('penerima_bantuan/update_action'),
        'id_penerima' => set_value('id_penerima', $row->id_penerima),
        'no_kk' => set_value('no_kk', $row->no_kk),
        'nik' => set_value('nik', $row->nik),
        'nama_penerima' => set_value('nama_penerima', $row->nama_penerima),
        'rt' => set_value('rt', $row->rt),
        'jenis_bantuan' => set_value('jenis_bantuan', $row->jenis_bantuan),
        'tanggal_generate_penerima' => set_value('tanggal_generate_penerima', $row->tanggal_generate_penerima),
        'date_created' => set_value('date_created', $row->date_created),
        'date_updated' => set_value('date_updated', $row->date_updated),
        'id_user' => set_value('id_user', $row->id_user),
      );
      $this->load->view('penerima_bantuan/penerima_bantuan_form', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('penerima_bantuan'));
    }
  }

  public function update_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('id_penerima', TRUE));
    } else {
      $data = array(
        'no_kk' => $this->input->post('no_kk',TRUE),
        'nik' => $this->input->post('nik',TRUE),
        'nama_penerima' => $this->input->post('nama_penerima',TRUE),
        'rt' => $this->input->post('rt',TRUE),
        'jenis_bantuan' => $this->input->post('jenis_bantuan',TRUE),
        'tanggal_generate_penerima' => $this->input->post('tanggal_generate_penerima',TRUE),
        'date_created' => $this->input->post('date_created',TRUE),
        'date_updated' => $this->input->post('date_updated',TRUE),
        'id_user' => $this->input->post('id_user',TRUE),
      );

      $this->Penerima_bantuan_model->update($this->input->post('id_penerima', TRUE), $data);
      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('penerima_bantuan'));
    }
  }

  public function delete($id) 
  {
    $row = $this->Penerima_bantuan_model->get_by_id($id);

    if ($row) {
      $this->Penerima_bantuan_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('penerima_bantuan'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('penerima_bantuan'));
    }
  }

  public function _rules() 
  {
   $this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
   $this->form_validation->set_rules('nik', 'nik', 'trim|required');
   $this->form_validation->set_rules('nama_penerima', 'nama penerima', 'trim|required');
   $this->form_validation->set_rules('rt', 'rt', 'trim|required');
   $this->form_validation->set_rules('jenis_bantuan', 'jenis bantuan', 'trim|required');
   $this->form_validation->set_rules('tanggal_generate_penerima', 'tanggal generate penerima', 'trim|required');
   $this->form_validation->set_rules('date_created', 'date created', 'trim|required');
   $this->form_validation->set_rules('date_updated', 'date updated', 'trim|required');
   $this->form_validation->set_rules('id_user', 'id user', 'trim|required');

   $this->form_validation->set_rules('id_penerima', 'id_penerima', 'trim');
   $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }

}