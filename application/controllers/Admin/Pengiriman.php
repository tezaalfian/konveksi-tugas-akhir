<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("m_produk");
		$this->load->model("m_pelanggan");
		$this->load->model("m_pengiriman");
	}

	public function index() {
		$data["pengiriman"] = $this->m_pengiriman->getAll();
		$this->load->view('admin/pengiriman/tabel-data', $data);
	}

	public function edit($id = null)
	{
		// if (!isset($id)) redirect('admin/pengiriman');
      	$data["produk"] = json_encode($this->m_produk->getAllProduk());
		$data["pelanggan"] = $this->m_pelanggan->getAll();
		$data["harga_produk"] = $this->m_pengiriman->getAllById($id);
        $pengiriman = $this->m_pengiriman;
        $validation = $this->form_validation;
        $validation->set_rules($pengiriman->rules());

        if ($validation->run()) {
            $pengiriman->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pengiriman"] = $this->m_pengiriman->getById($id);
        if (!$data["pengiriman"]) show_404();
        
        $this->load->view("admin/pengiriman/edit-pengiriman", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();
        
        if ($this->m_pengiriman->delete($id)) {
            redirect(site_url('admin/pengiriman'));
        }
	}

	public function tambah() {
		$data["produk"] = json_encode($this->m_produk->getAllProduk());
		$data["pelanggan"] = $this->m_pelanggan->getAll();
        $pengiriman = $this->m_pengiriman;
        $validation = $this->form_validation;
        $validation->set_rules($pengiriman->rules());

        if ($validation->run()) {
            $pengiriman->insert();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		$this->load->view('admin/pengiriman/tambah-pengiriman',$data);
	}
}
