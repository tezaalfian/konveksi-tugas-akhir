<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("m_produk");
		$this->load->model("m_pelanggan");
		$this->load->model("m_pemesanan");
		if ($this->session->userdata('role_id') == 2) {
			show_404();
		}		
	}

	public function index() {
		$data["pemesanan"] = $this->m_pemesanan->getAll();
		$this->load->view('admin/pemesanan/tabel-data', $data);
	}

	public function edit($id = null)
	{
		// if (!isset($id)) redirect('admin/pemesanan');
      	$data["produk"] = json_encode($this->m_produk->getAllProduk());
		$data["pelanggan"] = $this->m_pelanggan->getAll();
		$data["harga_produk"] = $this->m_pemesanan->getAllById($id);
        $pemesanan = $this->m_pemesanan;
        $validation = $this->form_validation;
        $validation->set_rules($pemesanan->rules());

        if ($validation->run()) {
            $pemesanan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pemesanan"] = $this->m_pemesanan->getById($id);
        if (!$data["pemesanan"]) show_404();
        
        $this->load->view("admin/pemesanan/edit-pemesanan", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();
        
        if ($this->m_pemesanan->delete($id)) {
            redirect(site_url('admin/pemesanan'));
        }
	}

	public function tambah() {
		$data["produk"] = json_encode($this->m_produk->getAllProduk());
		$data["pelanggan"] = $this->m_pelanggan->getAll();
        $pemesanan = $this->m_pemesanan;
        $validation = $this->form_validation;
        $validation->set_rules($pemesanan->rules());

        if ($validation->run()) {
            $pemesanan->insert();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		$this->load->view('admin/pemesanan/tambah-pemesanan',$data);
	}
}
