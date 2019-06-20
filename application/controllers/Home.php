<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_produk");
        $this->load->model("m_pelanggan");
        $this->load->model("m_pemesanan");

        $user = $this->session->userdata('username');

		if ($user) {
			$user = $this->session->userdata('username');
			$data["user"] = $this->m_pelanggan->getByName($user);
			$data["produk"] = $this->m_produk->getAllProduk();
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

	public function pemesanan($id)
	{
		$user = $this->session->userdata('username');
		$data["user"] = $this->m_pelanggan->getByName($user);
		$data["produk"] = $this->m_produk->getAllProduk();
       
        $product = $this->m_produk;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["produk"] = $product->getById($id);
        if (!$data["produk"]) show_404();
        
        $this->load->view("client/home/pemesanan", $data);
	}

}
