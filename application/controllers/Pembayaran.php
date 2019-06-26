<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_produk");
        $this->load->model("m_pelanggan");
        $this->load->model("m_pemesanan");
        $this->load->model("c_pembayaran");
        $this->load->model("c_pemesanan");
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

    public function tambah($id) {
        $user = $this->session->userdata('username');
        $data["user"] = $this->m_pelanggan->getByName($user);
        $data["produk"] = $this->m_produk->getAllProduk();
        $data["pembayaran"] = $this->c_pembayaran->getById($id);
        
        if (!empty($_FILES['bukti_pembayaran']['name'])){
            $post = $this->input->post();
            $data_bayar = array(
                "bukti_pembayaran" => $this->c_pembayaran->uploadImage(),
                "tanggal_pembayaran" => date("Y/m/d"),
                "ket" => 8
            );
            $status = array(
                "status_id" => 3
            );
            $this->c_pembayaran->kirimStruk($data_bayar, $post["pemesanan_id"]);
            $this->c_pembayaran->status($status, $post["pemesanan_id"]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan anda telah diterima! Kami akan segera mengkonfirmasi pembayaran anda.</div>');
            redirect("pemesanan/list");
        }else {
            $this->session->set_flashdata("salah", "<small class='text-danger'><i>* File tidak boleh kosong!</i></small>");
        }
        $this->load->view("client/home/tambah-pembayaran", $data);
    }
}
