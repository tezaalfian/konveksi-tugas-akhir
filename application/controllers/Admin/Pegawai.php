<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("m_pegawai");
		$user = $this->session->userdata('username');
		if ($user) {
			if ($this->session->userdata('role_id') == 2) {
				show_404();
			}
  		} else {
  			redirect('login');
  		}		
	}

	public function index() {
		$data["pegawai"] = $this->m_pegawai->getAll();
		$this->load->view('admin/pegawai/tabel-data', $data);
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('admin/pegawai');
       
        $pegawai = $this->m_pegawai;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules2());

        if ($validation->run()) {
            $pegawai->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pegawai"] = $this->m_pegawai->getById($id);
        if (!$data["pegawai"]) show_404();
        
        $this->load->view("admin/pegawai/edit-pegawai", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();
        
        if ($this->m_pegawai->delete($id)) {
            redirect(site_url('admin/pegawai'));
        }
	}

	public function tambah() {
        $pegawai = $this->m_pegawai;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->insert();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		$this->load->view('admin/pegawai/tambah-pegawai');
	}

}