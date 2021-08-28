<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengajuan_surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengajuan_surat_model');
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
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pengajuan_surat/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pengajuan_surat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pengajuan_surat/index.html';
            $config['first_url'] = base_url() . 'pengajuan_surat/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pengajuan_surat_model->total_rows($q);
        $pengajuan_surat = $this->Pengajuan_surat_model->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'title' => 'Data Pengajuan Surat',
            'content' => 'pengajuan_surat/pengajuan_surat_list',
            'pengajuan_surat_data' => $pengajuan_surat,
            'start' => $start,
        );
        $this->load->view('themes/content', $data);
    }

    public function read($id) 
    {
        $row = $this->Pengajuan_surat_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Detail Pengajuan Surat '.$row->jenis_surat.' '.$row->nama_pembuat_pengajuan,
                'content' => 'pengajuan_surat/pengajuan_surat_read',
                'id_pengajuan' => $row->id_pengajuan,
                'jenis_surat' => $row->jenis_surat,
                'nama_pembuat_pengajuan' => $row->nama_pembuat_pengajuan,
                'nama_yang_meninggal' => $row->nama_yang_meninggal,
                'tanggal_kematian' => $row->tanggal_kematian,
                'faktor_kematian' => $row->faktor_kematian,
                'tanggal_dispensasi' => $row->tanggal_dispensasi,
                'sampai_tanggal_dispensasi' => $row->sampai_tanggal_dispensasi,
                'jumlah_hari' => $row->jumlah_hari,
                'alasan_dispen' => $row->alasan_dispen,
                'rt_domisili' => $row->rt_domisili,
                'date_created' => $row->date_created,
                'date_updated' => $row->date_updated,
                'id_user' => $row->id_user,
            );
            $this->load->view('themes/content', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengajuan_surat'));
        }
    }

    public function create() 
    {
        $data_warga = $this->Data_warga_model->get_for_pengajuan();
        if ($this->session->userdata('role') == 'warga' ) {
            $data = array(
                'title' => 'Data Pengajuan Surat',
                'content' => 'pengajuan_surat/pengajuan_surat_form',
                'button' => 'Create',
                'data_warga' => $data_warga,
                'action' => site_url('pengajuan_surat/create_action'),
            );
            $this->load->view('themes/content', $data);
        } else {
            $this->session->set_flashdata('error', 'Maaf, Anda tidak diizinkan!');
            redirect(base_url('pengajuan_surat'));
        }
        
    }
    
    public function create_action() 
    {

        if ($this->input->post('jenis_surat') == 'surat kematian') {
            $data = array(
                'jenis_surat' => $this->input->post('jenis_surat',TRUE),
                'nama_pembuat_pengajuan' => $this->input->post('nama_pembuat_pengajuan',TRUE),
                'nama_yang_meninggal' => $this->input->post('nama_yang_meninggal',TRUE),
                'tanggal_kematian' => $this->input->post('tanggal_kematian',TRUE),
                'faktor_kematian' => $this->input->post('faktor_kematian',TRUE),
                'tanggal_dispensasi' => '0000-00-00',
                'sampai_tanggal_dispensasi' => "0000-00-00",
                'jumlah_hari' => '-',
                'alasan_dispen' => '-',
                'rt_domisili' => $this->input->post('rt_domisili',TRUE),
                'date_created' => date('Y-m-d'),
                'date_updated' => date('Y-m-d'),
                'id_user' => $this->session->userdata('id_user'),
            );
            $this->Pengajuan_surat_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Mengajukan Surat');
            redirect(site_url('pengajuan_surat'));
        } else if ($this->input->post('jenis_surat') == 'surat dispensasi') {
            $data = array(
                'jenis_surat' => $this->input->post('jenis_surat',TRUE),
                'nama_pembuat_pengajuan' => $this->input->post('nama_pembuat_pengajuan',TRUE),
                'nama_yang_meninggal' => '-',
                'tanggal_kematian' => '0000-00-00',
                'faktor_kematian' => '-',
                'tanggal_dispensasi' => $this->input->post('tanggal_dispensasi',TRUE),
                'sampai_tanggal_dispensasi' => $this->input->post('sampai_tanggal_dispensasi',TRUE),
                'jumlah_hari' => $this->input->post('jumlah_hari',TRUE),
                'alasan_dispen' => $this->input->post('alasan_dispen',TRUE),
                'rt_domisili' => $this->input->post('rt_domisili',TRUE),
                'date_created' => date('Y-m-d'),
                'date_updated' => date('Y-m-d'),
                'id_user' => $this->session->userdata('id_user'),
            );
            $this->Pengajuan_surat_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Mengajukan Surat');
            redirect(site_url('pengajuan_surat'));
        } else {
            $data = array(
                'jenis_surat' => $this->input->post('jenis_surat',TRUE),
                'nama_pembuat_pengajuan' => $this->input->post('nama_pembuat_pengajuan',TRUE),
                'nama_yang_meninggal' => '-',
                'tanggal_kematian' => '-',
                'faktor_kematian' => '-',
                'tanggal_dispensasi' => '0000-00-00',
                'sampai_tanggal_dispensasi' => '0000-00-00',
                'jumlah_hari' => '-',
                'alasan_dispen' => '-',
                'rt_domisili' => $this->input->post('rt_domisili',TRUE),
                'date_created' => date('Y-m-d'),
                'date_updated' => date('Y-m-d'),
                'id_user' => $this->session->userdata('id_user'),
            );
            $this->Pengajuan_surat_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Mengajukan Surat');
            redirect(site_url('pengajuan_surat'));
        }
    }

    public function update($id) 
    {
        $row = $this->Pengajuan_surat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Ubah Data Pengajuan Surat',
                'content' => 'pengajuan_surat/pengajuan_surat_form',
                'button' => 'Update',
                'action' => site_url('pengajuan_surat/update_action'),
                'id_pengajuan' => set_value('id_pengajuan', $row->id_pengajuan),
                'jenis_surat' => set_value('jenis_surat', $row->jenis_surat),
                'nama_pembuat_pengajuan' => set_value('nama_pembuat_pengajuan', $row->nama_pembuat_pengajuan),
                'nama_yang_meninggal' => set_value('nama_yang_meninggal', $row->nama_yang_meninggal),
                'tanggal_kematian' => set_value('tanggal_kematian', $row->tanggal_kematian),
                'faktor_kematian' => set_value('faktor_kematian', $row->faktor_kematian),
                'tanggal_dispensasi' => set_value('tanggal_dispensasi', $row->tanggal_dispensasi),
                'sampai_tanggal_dispensasi' => set_value('sampai_tanggal_dispensasi', $row->sampai_tanggal_dispensasi),
                'jumlah_hari' => set_value('jumlah_hari', $row->jumlah_hari),
                'alasan_dispen' => set_value('alasan_dispen', $row->alasan_dispen),
                'rt_domisili' => set_value('rt_domisili', $row->rt_domisili),
            );
            $this->load->view('themes/content', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengajuan_surat'));
        }
    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengajuan', TRUE));
        } else {
            $data = array(
              'jenis_surat' => $this->input->post('jenis_surat',TRUE),
              'nama_pembuat_pengajuan' => $this->input->post('nama_pembuat_pengajuan',TRUE),
              'nama_yang_meninggal' => $this->input->post('nama_yang_meninggal',TRUE),
              'tanggal_kematian' => $this->input->post('tanggal_kematian',TRUE),
              'faktor_kematian' => $this->input->post('faktor_kematian',TRUE),
              'tanggal_dispensasi' => $this->input->post('tanggal_dispensasi',TRUE),
              'sampai_tanggal_dispensasi' => $this->input->post('sampai_tanggal_dispensasi',TRUE),
              'jumlah_hari' => $this->input->post('jumlah_hari',TRUE),
              'alasan_dispen' => $this->input->post('alasan_dispen',TRUE),
              'rt_domisili' => $this->input->post('rt_domisili',TRUE),
              'date_updated' => date('Y-m-d'),
          );

            $this->Pengajuan_surat_model->update($this->input->post('id_pengajuan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengajuan_surat'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Pengajuan_surat_model->get_by_id($id);

        if ($row) {
            $this->Pengajuan_surat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengajuan_surat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengajuan_surat'));
        }
    }

    public function _rules() 
    {

     // $this->form_validation->set_rules('id_pengajuan', 'id_pengajuan', 'trim');
     // $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}