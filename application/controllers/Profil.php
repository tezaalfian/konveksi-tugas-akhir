<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_produk");
        $this->load->model("m_pelanggan");
        $this->load->model("m_pemesanan");
        $this->load->model("m_pengiriman");
        $this->load->model("c_pemesanan");
        $this->load->model("c_pembayaran");
        $this->load->model("c_kategori");
        $this->load->model("c_pelanggan");
        $this->load->library('form_validation');

        $user = $this->session->userdata('username');

		if ($user) {
			$user = $this->session->userdata('username');
			$data["user"] = $this->m_pelanggan->getByName($user);
			$data["produk"] = $this->m_produk->getAllProduk();
		} else {
			redirect('login');
		}

        if ($this->session->userdata('role_id') == 1) {
            show_404();
        }
    }

	public function index()
	{
        $user = $this->session->userdata('username');
        $kode = $this->session->userdata('id_user');
        $data["user"] = $this->m_pelanggan->getByName($user);

        $data["medsos"] = $this->db->get('medsos')->result();
        $this->load->view('client/profil/data-profil', $data);
	}

    public function edit() {
        $user = $this->session->userdata('username');
        $kode = $this->session->userdata('id_user');
        $data["user"] = $this->m_pelanggan->getByName($user);

        $pelanggan = $this->c_pelanggan;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules2());

        if ($validation->run()) {
            $pelanggan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('profil');
        }

        $data["medsos"] = $this->db->get('medsos')->result();
        $this->load->view('client/profil/edit', $data);
    }

    public function change_password() {
        $user = $this->session->userdata('username');
        $kode = $this->session->userdata('id_user');
        $data["user"] = $this->m_pelanggan->getByName($user);

        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {

            $data["medsos"] = $this->db->get('medsos')->result();
            $this->load->view('client/profil/sandi', $data);
        } else {
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($old_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi lama salah!</div>');
                redirect('profil/change_password');
            }else {
                if ($old_password == $new_password) {
                   $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi baru tidak boleh sama dengan kata sandi lama!</div>'); 
                   redirect('profil/change_password');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('id_user', $kode);
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata sandi berhasil diubah!</div>'); 
                   redirect('profil/change_password');
                }
            }
        }
    }

}
