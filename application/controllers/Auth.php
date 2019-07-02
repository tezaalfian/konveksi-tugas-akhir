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
			redirect(base_url());
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
					} 
					elseif ($user['role_id'] == 1) {
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

        $email = $this->input->post('email');

        if ($validation->run()) {

        	$token = base64_encode(random_bytes(32));
        	$user_token = [
        		'email' => $email,
        		'token' => $token,
        		'date_created' => time()
        	];

            $auth->insert();
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Verifikasi email anda!</div>');
            redirect('login');
        }

		$this->load->view('auth/register');
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'tezaalfian291@gmail.com',
			'smtp_pass' => 'stormshadow21',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->from('tezaalfian291@gmail.com', 'Co Tailor');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Akun Verifikasi');
			$this->email->message('Click this link to verify your account : <a href="'.base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Activate</a>');
		}

		if($this->email->send()){
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			// if ($user_token) {
				$this->db->set('is_active', 1);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->db->delete('user_token', ['email' => $email]);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$email.' telah diaktivasi! silahkan login.</div>');
        		redirect(base_url('login'));

			// } else {
				// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Token salah</div>');
    //     		redirect(base_url('login'));	
			// }
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Email salah</div>');
        	redirect(base_url('login'));
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout!</div>');
        redirect(base_url());
	}

	public function lupasandi()
	{
		$user = $this->session->userdata('username');
		if ($user) {
			redirect(base_url());
		}

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
			$this->load->view('auth/lupa-sandi');        	
        }else {
        	$email = $this->input->post('email');
        	$user = $this->db->get_where('user', array('email' => $email, 'is_active' => 1))->row_array();
        	if ($user) {
        		$data['user'] = $user;
        		$this->load->view('auth/')
        	}else{
        		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email anda tidak terdaftar!</div>');
        		redirect('lupasandi');
        	}
        }

		$this->load->view('auth/lupa-sandi');
	}

}
