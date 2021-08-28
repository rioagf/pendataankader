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
   public function pengajuan__by_user()
   {
     $id_user = $this->session->userdata('id_user');
     $this->db->where('id_user', $id_user);
     return $this->db->get('pengajuan');
   }

   public function pengajuan__per_rt()
   {
     $jabatan = $this->session->userdata('jabatan');
     $this->db->where('jabatan', $jabatan);
     return $this->db->get('pengajuan');
   }
}
