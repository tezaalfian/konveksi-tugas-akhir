<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$user = $this->session->userdata('username');
		if ($user) {
			if ($this->session->userdata('role_id') == 2) {
				show_404();
			}
  		} else {
  			redirect('login');
  		}
	}

	public function index() 
	{
		$this->load->view('admin/dashboard');
	}

	public function order()
	{
		echo json_encode($this->db->get('pemesanan')->result());
	}
}
