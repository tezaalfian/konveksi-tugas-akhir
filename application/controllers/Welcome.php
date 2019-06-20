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
		$data["produk"] = $this->m_produk->getAllProduk();
		$this->load->view('client/home/before_login', $data);
	}

	public function home()
	{
		$user = $this->session->userdata('username');

		if ($user) {
			$data["user"] = $this->m_pelanggan->getByName($user);
			$data["produk"] = $this->m_produk->getAllProduk();
			$this->load->view('client/home/after_login', $data);
		} else {
			redirect('login');
		}
		
	}

}
