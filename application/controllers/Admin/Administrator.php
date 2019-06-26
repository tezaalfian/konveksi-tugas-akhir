<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("m_administrator");
		$this->load->model("c_admin");
		if ($this->session->userdata('role_id') == 2) {
			show_404();
		}
	}

	public function index() {
		$data["administrator"] = $this->m_administrator->getAll();
		$this->load->view('admin/administrator/tabel-data', $data);
	}

	public function edit($id = null)
	{
		// if (!isset($id)) redirect('admin/administrator');
       
        $administrator = $this->c_admin;
        $validation = $this->form_validation;
        $validation->set_rules($administrator->rules2());

        if ($validation->run()) {
            $administrator->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["administrator"] = $this->m_administrator->getById($id);
        if (!$data["administrator"]) show_404();
        
        $this->load->view("admin/administrator/edit-administrator", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();
        
        if ($this->m_administrator->delete($id)) {
            redirect(site_url('admin/administrator'));
        }
	}

	public function tambah() {
        $administrator = $this->m_administrator;
        $validation = $this->form_validation;
        $validation->set_rules($administrator->rules());

        if ($validation->run()) {
            $administrator->insert();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		$this->load->view('admin/administrator/tambah-administrator');
	}

}