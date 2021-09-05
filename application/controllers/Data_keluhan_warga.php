<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_keluhan_warga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_keluhan_warga_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('status') != 'log in') {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $start = intval($this->input->get('start'));
        $data_keluhan_warga = $this->Data_keluhan_warga_model->get_all();

        $data = array(
            'title' => 'Data Keluhan',
            'content' => 'data_keluhan_warga/data_keluhan_warga_list',
            'data_keluhan_warga_data' => $data_keluhan_warga,
            'start' => $start,
        );
        $this->load->view('themes/content', $data);
    }

    public function read($id) 
    {
        $row = $this->Data_keluhan_warga_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Lapor Keluhan',
                'content' => 'data_keluhan_warga/data_keluhan_warga_read',
                'id_keluhan' => $row->id_keluhan,
                'judul_keluhan' => $row->judul_keluhan,
                'deskripsi_keluhan' => $row->deskripsi_keluhan,
                'nama_lengkap' => $row->nama_lengkap,
                'date_created' => $row->date_created,
                'date_updated' => $row->date_updated,
            );
            $data_new = array(
                'status_keluhan' => 'Sudah Dibaca',
            );
            $this->Data_keluhan_warga_model->update($row->id_keluhan, $data_new);
            $this->load->view('themes/content', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_keluhan_warga'));
        }
    }

    public function create() 
    {
        if ($this->session->userdata('role') == 'kader' || $this->session->userdata('role') == 'warga') {
            $data = array(
                'title' => 'Lapor Keluhan',
                'content' => 'data_keluhan_warga/data_keluhan_warga_form',
                'button' => 'Create',
                'action' => site_url('data_keluhan_warga/create_action'),
                'id_keluhan' => set_value('id_keluhan'),
                'judul_keluhan' => set_value('judul_keluhan'),
                'deskripsi_keluhan' => set_value('deskripsi_keluhan'),
            );
            $this->load->view('themes/content', $data);
        } else {
            $this->session->set_flashdata('error', 'Maaf, Anda tidak diizinkan!');
            redirect(base_url('data_keluhan_warga'));
        }
        
        
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'judul_keluhan' => $this->input->post('judul_keluhan',TRUE),
              'deskripsi_keluhan' => $this->input->post('deskripsi_keluhan',TRUE),
              'id_user' => $this->session->userdata('id_user'),
              'status_keluhan' => 'Keluhan Baru',
              'date_created' => date('Y-m-d'),
              'date_updated' => date('Y-m-d'),
          );

            $this->Data_keluhan_warga_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_keluhan_warga'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_keluhan_warga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_keluhan_warga/update_action'),
                'judul_keluhan' => set_value('judul_keluhan', $row->judul_keluhan),
                'deskripsi_keluhan' => set_value('deskripsi_keluhan', $row->deskripsi_keluhan),
            );
            $this->load->view('data_keluhan_warga/data_keluhan_warga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_keluhan_warga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_keluhan', TRUE));
        } else {
            $data = array(
              'judul_keluhan' => $this->input->post('judul_keluhan',TRUE),
              'deskripsi_keluhan' => $this->input->post('deskripsi_keluhan',TRUE),
              'id_user' => $this->session->userdata('id_user'),
              'date_created' => date('Y-m-d'),
              'date_updated' => date('Y-m-d'),
          );

            $this->Data_keluhan_warga_model->update($this->input->post('id_keluhan', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Keluhan Berhasil di Update');
            redirect(site_url('data_keluhan_warga'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_keluhan_warga_model->get_by_id($id);

        if ($row) {
            $this->Data_keluhan_warga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_keluhan_warga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_keluhan_warga'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('judul_keluhan', 'judul keluhan', 'trim|required');
       $this->form_validation->set_rules('deskripsi_keluhan', 'deskripsi keluhan', 'trim|required');

       $this->form_validation->set_rules('id_keluhan', 'id_keluhan', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

}

/* End of file Data_keluhan_warga.php */
/* Location: ./application/controllers/Data_keluhan_warga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-11 09:15:13 */
/* http://harviacode.com */