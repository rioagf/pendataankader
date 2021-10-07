<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Data_warga extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Data_warga_model');
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
			$config['base_url'] = base_url() . 'data_warga/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'data_warga/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'data_warga/index.html';
			$config['first_url'] = base_url() . 'data_warga/index.html';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Data_warga_model->total_rows($q);
		$data_warga = $this->Data_warga_model->get_all();

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'data_warga_data' => $data_warga,
			'start' => $start,
			'content' => 'data_warga/data_warga_list',
			'title' => 'Data Warga',

		);
		$this->load->view('themes/content', $data);
	}

	public function read($nokk) 
	{
		$row = $this->Data_warga_model->get_by_id($nokk);
		if ($row) {
			$data = array(
				'content' => 'data_warga/data_warga_read',
				'title' => 'Detail Data Warga',
				'row' => $row,
			);
			$this->load->view('themes/content', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('data_warga'));
		}
	}

	public function create() 
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('data_warga/create_action'),
			'content' => 'data_warga/data_warga_form',
			'title' => 'Tambah Data Warga',
			'id_data_warga' => set_value('id_data_warga'),
			'no_kk' => set_value('no_kk'),
			'nik' => set_value('nik'),
			'nama_lengkap' => set_value('nama_lengkap'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'tempat_lahir' => set_value('tempat_lahir'),
			'tanggal_lahir' => set_value('tanggal_lahir'),
			'status_perkawinan' => set_value('status_perkawinan'),
			'agama' => set_value('agama'),
			'warganegara' => set_value('warganegara'),
			'pendidikan' => set_value('pendidikan'),
			'kondisi_pekerjaan' => set_value('kondisi_pekerjaan'),
			'pekerjaan_utama' => set_value('pekerjaan_utama'),
			'jamsostek' => set_value('jamsostek'),
			'penghasilan' => set_value('penghasilan'),
			'jamsoskes' => set_value('jamsoskes'),
			'rt' => set_value('rt'),
			'status_keluarga' => set_value('status_keluarga'),
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
		);
		$this->load->view('themes/content', $data);
	}

	public function create_action() 
	{
		$jmlh = count($this->input->post('nik',TRUE));
		// var_dump($this->input->post('nik',TRUE)[0]);die();
		$insertArray = array();
		for ($i=0; $i < $jmlh; $i++) {
			// tanggal lahir
			$tanggal = new DateTime($this->input->post('tanggal_lahir',TRUE)[$i]);
			// tanggal hari ini
			$today = new DateTime('today');
			// tahun
			$y = $today->diff($tanggal)->y;
			// var_dump($y);die();
			$new_add = array(
				'no_kk' => $this->input->post('no_kk',TRUE),
				'nik' => $this->input->post('nik',TRUE)[$i],
				'nama_lengkap' => $this->input->post('nama_lengkap',TRUE)[$i],
				'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE)[$i],
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE)[$i],
				'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE)[$i],
				'usia' => $y,
				'status_perkawinan' => $this->input->post('status_perkawinan',TRUE)[$i],
				'agama' => $this->input->post('agama',TRUE)[$i],
				'warganegara' => $this->input->post('warganegara',TRUE)[$i],
				'pendidikan' => $this->input->post('pendidikan',TRUE)[$i],
				'kondisi_pekerjaan' => $this->input->post('kondisi_pekerjaan',TRUE)[$i],
				'pekerjaan_utama' => $this->input->post('pekerjaan_utama',TRUE)[$i],
				'jamsostek' => $this->input->post('jamsostek',TRUE)[$i],
				'penghasilan' => $this->input->post('penghasilan',TRUE)[$i],
				'jamsoskes' => $this->input->post('jamsoskes',TRUE)[$i],
				'rt' => $this->input->post('rt',TRUE)[$i],
				'status_keluarga' => $this->input->post('status_keluarga',TRUE)[$i],
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
				'id_user' => $this->session->userdata('id_user'),
			);
			array_push($insertArray,$new_add);

		}
		$this->Data_warga_model->insert($insertArray);
		// for ($i=0; $i < $jmlh; $i++) { 
		// 	$data[$i] = array(
		// 		'no_kk' => $this->input->post('no_kk',TRUE),
		// 		'nik' => $this->input->post('nik',TRUE),
		// 		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		// 		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		// 		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		// 		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		// 		'status_perkawinan' => $this->input->post('status_perkawinan',TRUE),
		// 		'agama' => $this->input->post('agama',TRUE),
		// 		'warganegara' => $this->input->post('warganegara',TRUE),
		// 		'pendidikan' => $this->input->post('pendidikan',TRUE),
		// 		'kondisi_pekerjaan' => $this->input->post('kondisi_pekerjaan',TRUE),
		// 		'pekerjaan_utama' => $this->input->post('pekerjaan_utama',TRUE),
		// 		'jamsostek' => $this->input->post('jamsostek',TRUE),
		// 		'penghasilan' => $this->input->post('penghasilan',TRUE),
		// 		'jamsoskes' => $this->input->post('jamsoskes',TRUE),
		// 		'rt' => $this->input->post('rt',TRUE),
		// 		'status_keluarga' => $this->input->post('status_keluarga',TRUE),
		// 		'date_created' => date('Y-m-d'),
		// 		'date_updated' => date('Y-m-d'),
		// 		'id_user' => $this->session->userdata('id_user'),
		// 	);

		// 	$this->Data_warga_model->insert($data[$i]);
		// }

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
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
			'id_user' => $this->session->userdata('id_user'),
		);

		$this->Desk_keluarga_model->insert($data);

		$this->session->set_flashdata('message', 'Berhasil menambahkan data');
		redirect(site_url('data_warga'));
	}

	public function update($id) 
	{
		$row = $this->Data_warga_model->get_by_nokk($id);
		$count = count(array($row));
		// var_dump(count($row));die();

		if ($row) {

			for ($i=0; $i < $count; $i++) { 
				$data = array(
					'button' => 'Update',
					'action' => site_url('data_warga/update_action'),
					'content' => 'data_warga/data_warga_form',
					'id_data_warga' => set_value('no_kk', $row->id_data_warga),
					'no_kk' => set_value('no_kk', $row->no_kk),
					'nik' => set_value('nik', $row->nik),
					'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
					'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
					'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
					'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
					'status_perkawinan' => set_value('status_perkawinan', $row->status_perkawinan),
					'agama' => set_value('agama', $row->agama),
					'warganegara' => set_value('warganegara', $row->warganegara),
					'pendidikan' => set_value('pendidikan', $row->pendidikan),
					'kondisi_pekerjaan' => set_value('kondisi_pekerjaan', $row->kondisi_pekerjaan),
					'pekerjaan_utama' => set_value('pekerjaan_utama', $row->pekerjaan_utama),
					'jamsostek' => set_value('jamsostek', $row->jamsostek),
					'penghasilan' => set_value('penghasilan', $row->penghasilan),
					'jamsoskes' => set_value('jamsoskes', $row->jamsoskes),
					'rt' => set_value('rt', $row->rt),
					'status_keluarga' => set_value('status_keluarga', $row->status_keluarga),
					'date_created' => set_value('date_created', $row->date_created),
					'date_updated' => set_value('date_updated', $row->date_updated),
					'id_user' => set_value('id_user', $row->id_user),

					// deskripsi
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
				);
			}
			// $data2 = array(
			// 	'tempat_tinggal' => set_value('tempat_tinggal'),
			// 	'status_lahan' => set_value('status_lahan'),
			// 	'luas_lantai' => set_value('luas_lantai'),
			// 	'luas_lahan' => set_value('luas_lahan'),
			// 	'jenis_lantai' => set_value('jenis_lantai'),
			// 	'dinding' => set_value('dinding'),
			// 	'jendela' => set_value('jendela'),
			// 	'genteng' => set_value('genteng'),
			// 	'penerangan' => set_value('penerangan'),
			// 	'energi_memasak' => set_value('energi_memasak'),
			// 	'tps' => set_value('tps'),
			// 	'mck' => set_value('mck'),
			// 	'sumber_airmandi' => set_value('sumber_airmandi'),
			// 	'fasilitas_bab' => set_value('fasilitas_bab'),
			// 	'sumber_airminum' => set_value('sumber_airminum'),
			// 	'pembuangan_limbah' => set_value('pembuangan_limbah'),
			// 	'bawah_sutet' => set_value('bawah_sutet'),
			// 	'bantaran_sungai' => set_value('bantaran_sungai'),
			// 	'lerang' => set_value('lerang'),
			// 	'kondisi_rumah' => set_value('kondisi_rumah'),
			// );
			
			$this->load->view('themes/content', $data);

			
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('data_warga'));
		}
	}

	public function update_action() 
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_data_warga', TRUE));
		} else {
			$data = array(
				'no_kk' => $this->input->post('no_kk',TRUE),
				'nik' => $this->input->post('nik',TRUE),
				'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
				'status_perkawinan' => $this->input->post('status_perkawinan',TRUE),
				'agama' => $this->input->post('agama',TRUE),
				'warganegara' => $this->input->post('warganegara',TRUE),
				'pendidikan' => $this->input->post('pendidikan',TRUE),
				'kondisi_pekerjaan' => $this->input->post('kondisi_pekerjaan',TRUE),
				'pekerjaan_utama' => $this->input->post('pekerjaan_utama',TRUE),
				'jamsostek' => $this->input->post('jamsostek',TRUE),
				'penghasilan' => $this->input->post('penghasilan',TRUE),
				'jamsoskes' => $this->input->post('jamsoskes',TRUE),
				'rt' => $this->input->post('rt',TRUE),
				'status_keluarga' => $this->input->post('status_keluarga',TRUE),
				'date_created' => $this->input->post('date_created',TRUE),
				'date_updated' => $this->input->post('date_updated',TRUE),
				'id_user' => $this->input->post('id_user',TRUE),
			);

			$this->Data_warga_model->update($this->input->post('id_data_warga', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('data_warga'));
		}
	}

	public function delete($id) 
	{
		$row = $this->Data_warga_model->get_by_id($id);

		if ($row) {
			$this->Data_warga_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('data_warga'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('data_warga'));
		}
	}

	public function _rules() 
	{
		// $this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
		// $this->form_validation->set_rules('nik', 'nik', 'trim|required');
		// $this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
		// $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		// $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		// $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		// $this->form_validation->set_rules('status_perkawinan', 'status perkawinan', 'trim|required');
		// $this->form_validation->set_rules('agama', 'agama', 'trim|required');
		// $this->form_validation->set_rules('warganegara', 'warganegara', 'trim|required');
		// $this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
		// $this->form_validation->set_rules('kondisi_pekerjaan', 'kondisi pekerjaan', 'trim|required');
		// $this->form_validation->set_rules('pekerjaan_utama', 'pekerjaan utama', 'trim|required');
		// $this->form_validation->set_rules('jamsostek', 'jamsostek', 'trim|required');
		// $this->form_validation->set_rules('penghasilan', 'penghasilan', 'trim|required');
		// $this->form_validation->set_rules('jamsoskes', 'jamsoskes', 'trim|required');
		// $this->form_validation->set_rules('rt', 'rt', 'trim|required');
		// $this->form_validation->set_rules('status_keluarga', 'status keluarga', 'trim|required');

		// $this->form_validation->set_rules('id_data_warga', 'id_data_warga', 'trim');
		// $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function update_data($nik) 
	{

			// tanggal lahir
			$tanggal = new DateTime($this->input->post('tanggal_lahir',TRUE));
			// tanggal hari ini
			$today = new DateTime('today');
			// tahun
			$y = $today->diff($tanggal)->y;
		$data = array(
			'no_kk' => $this->input->post('no_kk',TRUE),
			'nik' => $this->input->post('nik',TRUE),
			'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
			'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
			'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
			'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
			'usia' => $y,
			'status_perkawinan' => $this->input->post('status_perkawinan',TRUE),
			'agama' => $this->input->post('agama',TRUE),
			'warganegara' => $this->input->post('warganegara',TRUE),
			'pendidikan' => $this->input->post('pendidikan',TRUE),
			'kondisi_pekerjaan' => $this->input->post('kondisi_pekerjaan',TRUE),
			'pekerjaan_utama' => $this->input->post('pekerjaan_utama',TRUE),
			'jamsostek' => $this->input->post('jamsostek',TRUE),
			'penghasilan' => $this->input->post('penghasilan',TRUE),
			'jamsoskes' => $this->input->post('jamsoskes',TRUE),
			'rt' => $this->input->post('rt',TRUE),
			'status_keluarga' => $this->input->post('status_keluarga',TRUE),
			'date_updated' => date('Y-m-d'),
		);

		$this->Data_warga_model->update_warga($this->input->post('nik', TRUE), $data);
		$this->session->set_flashdata('message', 'Update Data Sukses');
		redirect(site_url('user/profile/'.$this->input->post('no_kk')));
	}

	public function update_detail($nik) 
	{
		$data = array(
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
			'date_updated' => date('Y-m-d'),
		);

		$this->Data_warga_model->update_detail($this->input->post('no_kk', TRUE), $data);
		$this->session->set_flashdata('message', 'Update Data Sukses');
		redirect(site_url('user/profile/'.$this->input->post('no_kk')));
	}

	public function tambah_warga() 
	{
			// tanggal lahir
			$tanggal = new DateTime($this->input->post('tanggal_lahir',TRUE));
			// tanggal hari ini
			$today = new DateTime('today');
			// tahun
			$y = $today->diff($tanggal)->y;
			// var_dump($y);die();
			$new_add = array(
				'no_kk' => $this->input->post('no_kk',TRUE),
				'nik' => $this->input->post('nik',TRUE),
				'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
				'usia' => $y,
				'status_perkawinan' => $this->input->post('status_perkawinan',TRUE),
				'agama' => $this->input->post('agama',TRUE),
				'warganegara' => $this->input->post('warganegara',TRUE),
				'pendidikan' => $this->input->post('pendidikan',TRUE),
				'kondisi_pekerjaan' => $this->input->post('kondisi_pekerjaan',TRUE),
				'pekerjaan_utama' => $this->input->post('pekerjaan_utama',TRUE),
				'jamsostek' => $this->input->post('jamsostek',TRUE),
				'penghasilan' => $this->input->post('penghasilan',TRUE),
				'jamsoskes' => $this->input->post('jamsoskes',TRUE),
				'rt' => $this->input->post('rt',TRUE),
				'status_keluarga' => $this->input->post('status_keluarga',TRUE),
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
				'id_user' => $this->session->userdata('id_user'),
			);

		$this->Data_warga_model->tambah_data_warga($new_add);

		$this->session->set_flashdata('message', 'Berhasil menambah data');
		redirect(site_url('user/profile/'.$this->input->post('no_kk')));
	}

	public function delete_warga($nik) 
	{
		$row = $this->Data_warga_model->get_by_nik($nik);

		if ($row) {
			$this->Data_warga_model->delete_nik($nik);
			$this->session->set_flashdata('success', 'Data Berhasil di Hapus');
			redirect(site_url('user/profile/'.$this->input->post('no_kk')));
		} else {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect(site_url('user/profile/'.$this->input->post('no_kk')));
		}
	}

}