<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_produk");
        $this->load->model("m_pelanggan");
        $this->load->model("m_pemesanan");
        $this->load->model("m_pengiriman");
        $this->load->model("c_pemesanan");
        $this->load->model("c_pembayaran");
        $this->load->model("c_kategori");
        $this->load->library('form_validation');

        $user = $this->session->userdata('username');

		if ($user) {
			$user = $this->session->userdata('username');
			$data["user"] = $this->m_pelanggan->getByName($user);
			$data["produk"] = $this->m_produk->getAllProduk();
		} else {
			redirect('login');
		}

        if ($this->session->userdata('role_id') == 1) {
            show_404();
        }
    }

	public function index()
	{

	}

    public function order() {
       $kode = $this->session->userdata('id_user'); 
       echo json_encode($this->c_kategori->allOrder($kode));
    }

    public function keranjang() {
       $kode = $this->session->userdata('id_user'); 
       echo json_encode($this->c_kategori->keranjang($kode));
    }

}