<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datawarga extends CI_Model {

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

	public function get__data()
	{
		$get = $this->db->get('data_warga');
		return $get;
	}
	
	function insert__data($data)
	{
		$this->db->insert('data_warga', $data);
	}

	function get__detail_user_data() {
		$query = $this->db->query('SELECT data_warga.* FROM data_warga JOIN user ON user.no_kk = data_warga.no_kk JOIN desk_keluarga ON desk_keluarga.no_kk = data_warga.no_kk WHERE user.username = $this->session->userdata("username")');
		return $query;
	}


}
