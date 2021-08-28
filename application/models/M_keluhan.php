<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keluhan extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function get__keluhan()
	{
		$get = $this->db->get('keluhan');
		return $get;
	}
	
	function get__detail_keluhan($id_keluhan)
	{
		$this->db->where('id_keluhan', $id_keluhan);
		return $this->db->get('keluhan');
	}

	function get__keluhan_warga_by_user() {
		$id_user = $this->session->userdata('id_user');
		$this->db->where('id_user', $id_user);
		return $this->db->get('keluhan');
	}

	function proses__data_keluhan($id_keluhan, $data)
	{
		$this->db->where('id_keluhan', $id_keluhan);
		return $this->db->update('keluhan', $data);
	}

	function kirim__keluhan_warga($data)
	{
		return $this->db->insert('keluhan', $data);
	}
}