<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public $image = "default.jpg";

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_produk");
        $this->load->library('form_validation');
    }

	public function index() {
		$data["produk"] = $this->m_produk->getAllProduk();
		$this->load->view('admin/produk/data-tabel', $data);
	}

	public function tambah() {
        $product = $this->m_produk;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->insert();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		$this->load->view('admin/produk/form-data');
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('admin/produk');
       
        $product = $this->m_produk;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["produk"] = $product->getById($id);
        if (!$data["produk"]) show_404();
        
        $this->load->view("admin/produk/form-edit", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();
        
        if ($this->m_produk->delete($id)) {
            redirect(site_url('admin/produk'));
        }
	}
}
