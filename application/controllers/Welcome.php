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
		// if ($user) {
		// 	redirect(home());
		// }else{
		// 	$data["produk"] = $this->m_produk->getAllProduk();
		// 	$this->load->view('client/home/before_login', $data);
		// }
		if ($user) {
			$data["user"] = $this->m_pelanggan->getByName($user);
			$data["produk"] = $this->m_produk->getAllProduk();
			$this->load->view('client/home/after_login', $data);
		} else {
			$data["produk"] = $this->m_produk->getAllProduk();
			$this->load->view('client/home/before_login', $data);
		}
	}

	// public function home()
	// {
	// 	$user = $this->session->userdata('username');
	// 	if ($this->session->userdata('role_id') == 1) {
	//         show_404();
	//     }

	// 	if ($user) {
	// 		$data["user"] = $this->m_pelanggan->getByName($user);
	// 		$data["produk"] = $this->m_produk->getAllProduk();
	// 		$this->load->view('client/home/after_login', $data);
	// 	} else {
	// 		redirect('login');
	// 	}
		
	// }

}
