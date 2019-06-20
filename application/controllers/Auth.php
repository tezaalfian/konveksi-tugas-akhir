<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("m_auth");
        $this->load->library('form_validation');
	}

	public function login()
	{
		$user = $this->session->userdata('username');
		if ($user) {
			redirect('home');
		}
		$auth = $this->m_auth;
        $validation = $this->form_validation;
        $validation->set_rules($auth->rules2());

        if ($validation->run()) {
            $this->_login();
        }

		$this->load->view('auth/login');
	}

	private function _login()
	{
		$password = $this->input->post('password');
		$user = $this->m_auth->getUser();

		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					
					if ($user['role_id'] == 2) {
						$data = [
							'username' => $user['username'],
							'role_id' => $user['role_id'],
							'id_user' => $user['id_user']
						];
						$this->session->set_userdata($data);
						redirect(base_url('home'));
					} elseif ($user['role_id'] == 1) {
						$data = [
							'username' => $user['username'],
							'role_id' => $user['role_id'],
							'id_user' => $user['id_user']
						];

						$this->session->set_userdata($data);
						redirect(base_url('admin/dashboard'));
					}
					
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah!</div>');
            		redirect('login');
				}
				
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum diverivikasi!</div>');
            	redirect('login');
			}
			
		}
		else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda tidak terdaftar!</div>');
            redirect('login');
		}
	}

	public function register()
	{
		$user = $this->session->userdata('username');
		if ($user) {
			redirect('home');
		}
		$auth = $this->m_auth;
        $validation = $this->form_validation;
        $validation->set_rules($auth->rules());

        if ($validation->run()) {
            $auth->insert();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Verifikasi email anda!</div>');
            redirect('login');
        }

		$this->load->view('auth/register');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout!</div>');
        redirect(base_url());
	}

}
