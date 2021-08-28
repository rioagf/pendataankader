<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Desk_keluarga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Desk_keluarga_model');
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
            $config['base_url'] = base_url() . 'desk_keluarga/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'desk_keluarga/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'desk_keluarga/index.html';
            $config['first_url'] = base_url() . 'desk_keluarga/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Desk_keluarga_model->total_rows($q);
        $desk_keluarga = $this->Desk_keluarga_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'desk_keluarga_data' => $desk_keluarga,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('desk_keluarga/desk_keluarga_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Desk_keluarga_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_desk' => $row->id_desk,
		'no_kk' => $row->no_kk,
		'tempat_tinggal' => $row->tempat_tinggal,
		'status_lahan' => $row->status_lahan,
		'luas_lantai' => $row->luas_lantai,
		'luas_lahan' => $row->luas_lahan,
		'jenis_lantai' => $row->jenis_lantai,
		'dinding' => $row->dinding,
		'jendela' => $row->jendela,
		'genteng' => $row->genteng,
		'penerangan' => $row->penerangan,
		'energi_memasak' => $row->energi_memasak,
		'tps' => $row->tps,
		'mck' => $row->mck,
		'sumber_airmandi' => $row->sumber_airmandi,
		'fasilitas_bab' => $row->fasilitas_bab,
		'sumber_airminum' => $row->sumber_airminum,
		'pembuangan_limbah' => $row->pembuangan_limbah,
		'bawah_sutet' => $row->bawah_sutet,
		'bantaran_sungai' => $row->bantaran_sungai,
		'lerang' => $row->lerang,
		'kondisi_rumah' => $row->kondisi_rumah,
		'date_created' => $row->date_created,
		'date_updated' => $row->date_updated,
		'id_user' => $row->id_user,
	    );
            $this->load->view('desk_keluarga/desk_keluarga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desk_keluarga'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('desk_keluarga/create_action'),
	    'id_desk' => set_value('id_desk'),
	    'no_kk' => set_value('no_kk'),
	    'tempat_tinggal' => set_value('tempat_tinggal'),
	    'status_lahan' => set_value('status_lahan'),
	    'luas_lantai' => set_value('luas_lantai'),
	    'luas_lahan' => set_value('luas_lahan'),
	    'jenis_lantai' => set_value('jenis_lantai'),
	    'dinding' => set_value('dinding'),
	    'jendela' => set_value('jendela'),
	    'genteng' => set_value('genteng'),
	    'penerangan' => set_value('penerangan'),
	    'energi_memasak' => set_value('energi_memasak'),
	    'tps' => set_value('tps'),
	    'mck' => set_value('mck'),
	    'sumber_airmandi' => set_value('sumber_airmandi'),
	    'fasilitas_bab' => set_value('fasilitas_bab'),
	    'sumber_airminum' => set_value('sumber_airminum'),
	    'pembuangan_limbah' => set_value('pembuangan_limbah'),
	    'bawah_sutet' => set_value('bawah_sutet'),
	    'bantaran_sungai' => set_value('bantaran_sungai'),
	    'lerang' => set_value('lerang'),
	    'kondisi_rumah' => set_value('kondisi_rumah'),
	    'date_created' => set_value('date_created'),
	    'date_updated' => set_value('date_updated'),
	    'id_user' => set_value('id_user'),
	);
        $this->load->view('desk_keluarga/desk_keluarga_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_kk' => $this->input->post('no_kk',TRUE),
		'tempat_tinggal' => $this->input->post('tempat_tinggal',TRUE),
		'status_lahan' => $this->input->post('status_lahan',TRUE),
		'luas_lantai' => $this->input->post('luas_lantai',TRUE),
		'luas_lahan' => $this->input->post('luas_lahan',TRUE),
		'jenis_lantai' => $this->input->post('jenis_lantai',TRUE),
		'dinding' => $this->input->post('dinding',TRUE),
		'jendela' => $this->input->post('jendela',TRUE),
		'genteng' => $this->input->post('genteng',TRUE),
		'penerangan' => $this->input->post('penerangan',TRUE),
		'energi_memasak' => $this->input->post('energi_memasak',TRUE),
		'tps' => $this->input->post('tps',TRUE),
		'mck' => $this->input->post('mck',TRUE),
		'sumber_airmandi' => $this->input->post('sumber_airmandi',TRUE),
		'fasilitas_bab' => $this->input->post('fasilitas_bab',TRUE),
		'sumber_airminum' => $this->input->post('sumber_airminum',TRUE),
		'pembuangan_limbah' => $this->input->post('pembuangan_limbah',TRUE),
		'bawah_sutet' => $this->input->post('bawah_sutet',TRUE),
		'bantaran_sungai' => $this->input->post('bantaran_sungai',TRUE),
		'lerang' => $this->input->post('lerang',TRUE),
		'kondisi_rumah' => $this->input->post('kondisi_rumah',TRUE),
		'date_created' => $this->input->post('date_created',TRUE),
		'date_updated' => $this->input->post('date_updated',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
	    );

            $this->Desk_keluarga_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('desk_keluarga'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Desk_keluarga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('desk_keluarga/update_action'),
		'id_desk' => set_value('id_desk', $row->id_desk),
		'no_kk' => set_value('no_kk', $row->no_kk),
		'tempat_tinggal' => set_value('tempat_tinggal', $row->tempat_tinggal),
		'status_lahan' => set_value('status_lahan', $row->status_lahan),
		'luas_lantai' => set_value('luas_lantai', $row->luas_lantai),
		'luas_lahan' => set_value('luas_lahan', $row->luas_lahan),
		'jenis_lantai' => set_value('jenis_lantai', $row->jenis_lantai),
		'dinding' => set_value('dinding', $row->dinding),
		'jendela' => set_value('jendela', $row->jendela),
		'genteng' => set_value('genteng', $row->genteng),
		'penerangan' => set_value('penerangan', $row->penerangan),
		'energi_memasak' => set_value('energi_memasak', $row->energi_memasak),
		'tps' => set_value('tps', $row->tps),
		'mck' => set_value('mck', $row->mck),
		'sumber_airmandi' => set_value('sumber_airmandi', $row->sumber_airmandi),
		'fasilitas_bab' => set_value('fasilitas_bab', $row->fasilitas_bab),
		'sumber_airminum' => set_value('sumber_airminum', $row->sumber_airminum),
		'pembuangan_limbah' => set_value('pembuangan_limbah', $row->pembuangan_limbah),
		'bawah_sutet' => set_value('bawah_sutet', $row->bawah_sutet),
		'bantaran_sungai' => set_value('bantaran_sungai', $row->bantaran_sungai),
		'lerang' => set_value('lerang', $row->lerang),
		'kondisi_rumah' => set_value('kondisi_rumah', $row->kondisi_rumah),
		'date_created' => set_value('date_created', $row->date_created),
		'date_updated' => set_value('date_updated', $row->date_updated),
		'id_user' => set_value('id_user', $row->id_user),
	    );
            $this->load->view('desk_keluarga/desk_keluarga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desk_keluarga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_desk', TRUE));
        } else {
            $data = array(
		'no_kk' => $this->input->post('no_kk',TRUE),
		'tempat_tinggal' => $this->input->post('tempat_tinggal',TRUE),
		'status_lahan' => $this->input->post('status_lahan',TRUE),
		'luas_lantai' => $this->input->post('luas_lantai',TRUE),
		'luas_lahan' => $this->input->post('luas_lahan',TRUE),
		'jenis_lantai' => $this->input->post('jenis_lantai',TRUE),
		'dinding' => $this->input->post('dinding',TRUE),
		'jendela' => $this->input->post('jendela',TRUE),
		'genteng' => $this->input->post('genteng',TRUE),
		'penerangan' => $this->input->post('penerangan',TRUE),
		'energi_memasak' => $this->input->post('energi_memasak',TRUE),
		'tps' => $this->input->post('tps',TRUE),
		'mck' => $this->input->post('mck',TRUE),
		'sumber_airmandi' => $this->input->post('sumber_airmandi',TRUE),
		'fasilitas_bab' => $this->input->post('fasilitas_bab',TRUE),
		'sumber_airminum' => $this->input->post('sumber_airminum',TRUE),
		'pembuangan_limbah' => $this->input->post('pembuangan_limbah',TRUE),
		'bawah_sutet' => $this->input->post('bawah_sutet',TRUE),
		'bantaran_sungai' => $this->input->post('bantaran_sungai',TRUE),
		'lerang' => $this->input->post('lerang',TRUE),
		'kondisi_rumah' => $this->input->post('kondisi_rumah',TRUE),
		'date_created' => $this->input->post('date_created',TRUE),
		'date_updated' => $this->input->post('date_updated',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
	    );

            $this->Desk_keluarga_model->update($this->input->post('id_desk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('desk_keluarga'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Desk_keluarga_model->get_by_id($id);

        if ($row) {
            $this->Desk_keluarga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('desk_keluarga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desk_keluarga'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
	$this->form_validation->set_rules('tempat_tinggal', 'tempat tinggal', 'trim|required');
	$this->form_validation->set_rules('status_lahan', 'status lahan', 'trim|required');
	$this->form_validation->set_rules('luas_lantai', 'luas lantai', 'trim|required');
	$this->form_validation->set_rules('luas_lahan', 'luas lahan', 'trim|required');
	$this->form_validation->set_rules('jenis_lantai', 'jenis lantai', 'trim|required');
	$this->form_validation->set_rules('dinding', 'dinding', 'trim|required');
	$this->form_validation->set_rules('jendela', 'jendela', 'trim|required');
	$this->form_validation->set_rules('genteng', 'genteng', 'trim|required');
	$this->form_validation->set_rules('penerangan', 'penerangan', 'trim|required');
	$this->form_validation->set_rules('energi_memasak', 'energi memasak', 'trim|required');
	$this->form_validation->set_rules('tps', 'tps', 'trim|required');
	$this->form_validation->set_rules('mck', 'mck', 'trim|required');
	$this->form_validation->set_rules('sumber_airmandi', 'sumber airmandi', 'trim|required');
	$this->form_validation->set_rules('fasilitas_bab', 'fasilitas bab', 'trim|required');
	$this->form_validation->set_rules('sumber_airminum', 'sumber airminum', 'trim|required');
	$this->form_validation->set_rules('pembuangan_limbah', 'pembuangan limbah', 'trim|required');
	$this->form_validation->set_rules('bawah_sutet', 'bawah sutet', 'trim|required');
	$this->form_validation->set_rules('bantaran_sungai', 'bantaran sungai', 'trim|required');
	$this->form_validation->set_rules('lerang', 'lerang', 'trim|required');
	$this->form_validation->set_rules('kondisi_rumah', 'kondisi rumah', 'trim|required');
	$this->form_validation->set_rules('date_created', 'date created', 'trim|required');
	$this->form_validation->set_rules('date_updated', 'date updated', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');

	$this->form_validation->set_rules('id_desk', 'id_desk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Desk_keluarga.php */
/* Location: ./application/controllers/Desk_keluarga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-11 09:15:13 */
/* http://harviacode.com */