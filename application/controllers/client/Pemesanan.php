<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_produk");
        $this->load->model("m_pelanggan");
        $this->load->model("m_pemesanan");
        $this->load->model("c_pemesanan");

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

	}

    public function tambah() {
        // $data["produk"] = json_encode($this->m_produk->getAllProduk());
        // $data["pelanggan"] = $this->m_pelanggan->getAll();
        $pemesanan = $this->m_pemesanan;
        $validation = $this->form_validation;
        $validation->set_rules($pemesanan->rules());

        if ($validation->run()) {
            $this->c_pemesanan->insert();
            // $data['pemesanan'] = $this->db->get("pemesanan")->last_row();
            // $this->load->view('client/home/tambah-pengiriman',$data);
        }
    }

}