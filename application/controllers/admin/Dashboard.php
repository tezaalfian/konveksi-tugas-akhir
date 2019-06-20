<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') == 2) {
			show_404();
		}
	}

	public function index() 
	{
		$this->load->view('admin/contoh_view');
	}
}
