<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_data_warga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_data_warga_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('status') != 'log in') {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $laporan_data_warga = $this->Laporan_data_warga_model->get_data();

        $data = array(
            'title' => 'Laporan Data Warga',
            'content' => 'laporan_data_warga/laporan_data_warga_list',
            'laporan_data_warga_data' => $laporan_data_warga,
            'start' => $start,
        );
        $this->load->view('themes/content', $data);
    }

    public function generate()
    {
        $laporansatu = $this->Laporan_data_warga_model->rt_satu()->row();
        $laporandua = $this->Laporan_data_warga_model->rt_dua()->row();
        $laporantiga = $this->Laporan_data_warga_model->rt_tiga()->row();
        $laporanempat = $this->Laporan_data_warga_model->rt_empat()->row();
        $laporanlima = $this->Laporan_data_warga_model->rt_lima()->row();
        $laporanenam = $this->Laporan_data_warga_model->rt_enam()->row();
        $laporantujuh = $this->Laporan_data_warga_model->rt_tujuh()->row();
        $laporandelapan = $this->Laporan_data_warga_model->rt_delapan()->row();
        $laporan = $this->Laporan_data_warga_model->jumlah_semua()->row();

        $data = array(
            'rt_satu' => $laporansatu->rtsatu,
            'rt_dua' => $laporandua->rtdua,
            'rt_tiga' => $laporantiga->rttiga,
            'rt_empat' => $laporanempat->rtempat,
            'rt_lima' => $laporanlima->rtlima,
            'rt_enam' => $laporanenam->rtenam,
            'rt_tujuh' => $laporantujuh->rttujuh,
            'rt_delapan' => $laporandelapan->rtdelapan,
            'jumlah' => $laporan->jumlah_data,
            'status_lapor' => 'Belum Dilaporkan',
            'date_created' => date('Y-m-d'),
            'date_updated' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
        );

        $this->Laporan_data_warga_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('laporan_data_warga'));
    }

    public function laporkan($id)
    {
        // var_dump($id);die();
        $data = array(
            'status_lapor' => 'Dilaporkan',
        );
        $this->Laporan_data_warga_model->update($id, $data);
        $this->session->set_flashdata('message', 'Data Berhasil Dilaporkan');
        redirect(site_url('laporan_data_warga'));
    }

    public function read($id) 
    {
        $row = $this->Laporan_data_warga_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Laporan Data Warga',
                'content' => 'laporan_data_warga/laporan_data_warga_read',
                'id_laporandata_warga' => $row->id_laporandata_warga,
                'rt_satu' => $row->rt_satu,
                'rt_dua' => $row->rt_dua,
                'rt_tiga' => $row->rt_tiga,
                'rt_empat' => $row->rt_empat,
                'rt_lima' => $row->rt_lima,
                'rt_enam' => $row->rt_enam,
                'rt_tujuh' => $row->rt_tujuh,
                'rt_delapan' => $row->rt_delapan,
                'jumlah' => $row->jumlah,
                'status_lapor' => $row->status_lapor,
                'date_created' => $row->date_created,
            );
            $this->load->view('themes/content', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_data_warga'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan_data_warga/create_action'),
            'id_laporandata_warga' => set_value('id_laporandata_warga'),
            'jumlah_data' => set_value('jumlah_data'),
            'id_data_warga' => set_value('id_data_warga'),
            'status_lapor' => set_value('status_lapor'),
            'rt' => set_value('rt'),
            'date_created' => set_value('date_created'),
            'date_updated' => set_value('date_updated'),
            'id_user' => set_value('id_user'),
        );
        $this->load->view('laporan_data_warga/laporan_data_warga_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'jumlah_data' => $this->input->post('jumlah_data',TRUE),
              'id_data_warga' => $this->input->post('id_data_warga',TRUE),
              'status_lapor' => $this->input->post('status_lapor',TRUE),
              'rt' => $this->input->post('rt',TRUE),
              'date_created' => $this->input->post('date_created',TRUE),
              'date_updated' => $this->input->post('date_updated',TRUE),
              'id_user' => $this->input->post('id_user',TRUE),
          );

            $this->Laporan_data_warga_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('laporan_data_warga'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Laporan_data_warga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporan_data_warga/update_action'),
                'id_laporandata_warga' => set_value('id_laporandata_warga', $row->id_laporandata_warga),
                'jumlah_data' => set_value('jumlah_data', $row->jumlah_data),
                'id_data_warga' => set_value('id_data_warga', $row->id_data_warga),
                'status_lapor' => set_value('status_lapor', $row->status_lapor),
                'rt' => set_value('rt', $row->rt),
                'date_created' => set_value('date_created', $row->date_created),
                'date_updated' => set_value('date_updated', $row->date_updated),
                'id_user' => set_value('id_user', $row->id_user),
            );
            $this->load->view('laporan_data_warga/laporan_data_warga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_data_warga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_laporandata_warga', TRUE));
        } else {
            $data = array(
              'jumlah_data' => $this->input->post('jumlah_data',TRUE),
              'id_data_warga' => $this->input->post('id_data_warga',TRUE),
              'status_lapor' => $this->input->post('status_lapor',TRUE),
              'rt' => $this->input->post('rt',TRUE),
              'date_created' => $this->input->post('date_created',TRUE),
              'date_updated' => $this->input->post('date_updated',TRUE),
              'id_user' => $this->input->post('id_user',TRUE),
          );

            $this->Laporan_data_warga_model->update($this->input->post('id_laporandata_warga', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('laporan_data_warga'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_data_warga_model->get_by_id($id);

        if ($row) {
            $this->Laporan_data_warga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('laporan_data_warga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_data_warga'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('jumlah_data', 'jumlah data', 'trim|required');
       $this->form_validation->set_rules('id_data_warga', 'id data warga', 'trim|required');
       $this->form_validation->set_rules('status_lapor', 'status lapor', 'trim|required');
       $this->form_validation->set_rules('rt', 'rt', 'trim|required');
       $this->form_validation->set_rules('date_created', 'date created', 'trim|required');
       $this->form_validation->set_rules('date_updated', 'date updated', 'trim|required');
       $this->form_validation->set_rules('id_user', 'id user', 'trim|required');

       $this->form_validation->set_rules('id_laporandata_warga', 'id_laporandata_warga', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

}

/* End of file Laporan_data_warga.php */
/* Location: ./application/controllers/Laporan_data_warga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-11 09:15:13 */
/* http://harviacode.com */