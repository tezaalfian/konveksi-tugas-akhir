<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_produk");
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

	public function index() {
		$data["produk"] = $this->m_produk->getAllProduk();
		$this->load->view('admin/produk/data-tabel', $data);
	}

	public function tambah() {
        $product = $this->m_produk;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        $data_produk = array(
        	'nama' => $this->input->post("nama"),
        	'harga' => $this->input->post("harga"),
        	'deskripsi' => $this->input->post("deskripsi")
        );

        if ($validation->run()) {
            $product->insert($data_produk);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

		$this->load->view('admin/produk/form-data');
	}
}
