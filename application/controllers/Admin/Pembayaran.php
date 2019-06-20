<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("m_produk");
		$this->load->model("m_pelanggan");
		$this->load->model("m_pembayaran");
		if ($this->session->userdata('role_id') == 2) {
			show_404();
		}		
	}

	public function index() {
		$data["pembayaran"] = $this->m_pembayaran->getAll();
		$this->load->view('admin/pembayaran/tabel-data', $data);
	}

	public function edit($id = null)
	{
		// if (!isset($id)) redirect('admin/pembayaran');
      	$data["produk"] = json_encode($this->m_produk->getAllProduk());
		$data["pelanggan"] = $this->m_pelanggan->getAll();
		$data["harga_produk"] = $this->m_pembayaran->getAllById($id);
        $pembayaran = $this->m_pembayaran;
        $validation = $this->form_validation;
        $validation->set_rules($pembayaran->rules());

        if ($validation->run()) {
            $pembayaran->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pembayaran"] = $this->m_pembayaran->getById($id);
        if (!$data["pembayaran"]) show_404();
        
        $this->load->view("admin/pembayaran/edit-pembayaran", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();
        
        if ($this->m_pembayaran->delete($id)) {
            redirect(site_url('admin/pembayaran'));
        }
	}

	public function tambah() {
		$data["produk"] = json_encode($this->m_produk->getAllProduk());
		$data["pelanggan"] = $this->m_pelanggan->getAll();
        $pembayaran = $this->m_pembayaran;
        $validation = $this->form_validation;
        $validation->set_rules($pembayaran->rules());

        if ($validation->run()) {
            $pembayaran->insert();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		$this->load->view('admin/pembayaran/tambah-pembayaran',$data);
	}
}
