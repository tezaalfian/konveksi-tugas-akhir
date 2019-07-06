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
        $this->load->model("m_pembayaran");
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
    }

	public function index()
	{

	}

    public function order() {
       $kode = $this->session->userdata('id_user'); 
       echo json_encode($this->c_kategori->allOrder2($kode));
    }

    public function a_order() {
       echo json_encode($this->m_pemesanan->getLast());
    }

    public function allOrder() {
      echo json_encode($this->m_pemesanan->getAll());
    }

    public function allPay() {
      echo json_encode($this->m_pembayaran->getAll());
    }

    public function allUser() {
      echo json_encode($this->m_pelanggan->getAll());
    }

    public function keranjang() {
       $kode = $this->session->userdata('id_user'); 
       echo json_encode($this->c_kategori->keranjang($kode));
    }

}
