<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("m_administrator");
		$this->load->model("c_admin");
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

	public function sandi()
	{
        $kode = $this->session->userdata('id_user');
        $data["user"] = $this->db->get_where('user', ['id_user' => $kode])->row_array();

        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/administrator/sandi');
        } else {
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($old_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi lama salah!</div>');
                redirect('admin/administrator/sandi');
            }else {
                if ($old_password == $new_password) {
                   $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi baru tidak boleh sama dengan kata sandi lama!</div>'); 
                   redirect('admin/administrator/sandi');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('id_user', $kode);
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata sandi berhasil diubah!</div>'); 
                   redirect('admin/administrator/sandi');
                }
            }
        }
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