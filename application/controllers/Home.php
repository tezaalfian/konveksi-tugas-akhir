<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_produk");
        $this->load->model("m_pelanggan");

        $user = $this->session->userdata('username');

		if ($user) {
			
		} else {
			redirect('login');
		}
    }

	public function index()
	{
		$user = $this->session->userdata('username');

		$data["user"] = $this->m_pelanggan->getByName($user);
		$data["produk"] = $this->m_produk->getAllProduk();
		$this->load->view('client/home/after_login', $data);
	}

}
