<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_produk");
        $this->load->model("m_pelanggan"); 
    }

	public function index()
	{
		$user = $this->session->userdata('username');

		if ($user) {
			redirect('home');
		} else {
			$data["produk"] = $this->m_produk->getAllProduk();
			$data["slide"] = $this->db->get('slide')->result();
			$data["medsos"] = $this->db->get('medsos')->result();
			$this->load->view('client/home/before_login', $data);
		}
	}

}
