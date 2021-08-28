<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_petugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_petugas_model');
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
            $config['base_url'] = base_url() . 'data_petugas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_petugas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_petugas/index.html';
            $config['first_url'] = base_url() . 'data_petugas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Data_petugas_model->total_rows($q);
        $data_petugas = $this->Data_petugas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_petugas_data' => $data_petugas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('data_petugas/data_petugas_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Data_petugas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_petugas' => $row->id_petugas,
		'nama_petugas' => $row->nama_petugas,
		'jabatan' => $row->jabatan,
		'id_user' => $row->id_user,
		'date_created' => $row->date_created,
		'date_updated' => $row->date_updated,
	    );
            $this->load->view('data_petugas/data_petugas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_petugas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_petugas/create_action'),
	    'id_petugas' => set_value('id_petugas'),
	    'nama_petugas' => set_value('nama_petugas'),
	    'jabatan' => set_value('jabatan'),
	    'id_user' => set_value('id_user'),
	    'date_created' => set_value('date_created'),
	    'date_updated' => set_value('date_updated'),
	);
        $this->load->view('data_petugas/data_petugas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_petugas' => $this->input->post('nama_petugas',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'date_created' => $this->input->post('date_created',TRUE),
		'date_updated' => $this->input->post('date_updated',TRUE),
	    );

            $this->Data_petugas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_petugas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_petugas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_petugas/update_action'),
		'id_petugas' => set_value('id_petugas', $row->id_petugas),
		'nama_petugas' => set_value('nama_petugas', $row->nama_petugas),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'id_user' => set_value('id_user', $row->id_user),
		'date_created' => set_value('date_created', $row->date_created),
		'date_updated' => set_value('date_updated', $row->date_updated),
	    );
            $this->load->view('data_petugas/data_petugas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_petugas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_petugas', TRUE));
        } else {
            $data = array(
		'nama_petugas' => $this->input->post('nama_petugas',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'date_created' => $this->input->post('date_created',TRUE),
		'date_updated' => $this->input->post('date_updated',TRUE),
	    );

            $this->Data_petugas_model->update($this->input->post('id_petugas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_petugas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_petugas_model->get_by_id($id);

        if ($row) {
            $this->Data_petugas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_petugas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_petugas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_petugas', 'nama petugas', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('date_created', 'date created', 'trim|required');
	$this->form_validation->set_rules('date_updated', 'date updated', 'trim|required');

	$this->form_validation->set_rules('id_petugas', 'id_petugas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_petugas.php */
/* Location: ./application/controllers/Data_petugas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-11 09:15:13 */
/* http://harviacode.com */