<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("m_pelanggan");
		if ($this->session->userdata('role_id') == 2) {
			show_404();
		}
	}

	public function index() {
		$data["pelanggan"] = $this->m_pelanggan->getAll();
		$this->load->view('admin/pelanggan/tabel-data', $data);
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('admin/pelanggan');
       
        $pelanggan = $this->m_pelanggan;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules2());

        if ($validation->run()) {
            $pelanggan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pelanggan"] = $this->m_pelanggan->getById($id);
        if (!$data["pelanggan"]) show_404();
        
        $this->load->view("admin/pelanggan/edit-pelanggan", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();
        
        if ($this->m_pelanggan->delete($id)) {
            redirect(site_url('admin/pelanggan'));
        }
	}

	public function tambah() {
        $pelanggan = $this->m_pelanggan;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());

        if ($validation->run()) {
            $pelanggan->insert();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		$this->load->view('admin/pelanggan/tambah-pelanggan');
	}

}