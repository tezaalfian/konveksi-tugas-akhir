<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_produk");
        $this->load->model("m_pelanggan");
        $this->load->model("m_pemesanan");
        $this->load->model("c_pemesanan");
        $this->load->model("c_kategori");
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

	}

    public function tambah() {
        // $data["produk"] = json_encode($this->m_produk->getAllProduk());
        
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('tagihan', 'Total', 'required');
        $this->form_validation->set_rules('desain', 'Desain', 'required');
        // if (empty($_FILES['desain']['name']))
        // {
        // }
        // var_dump($this->input->post("tagihan"));
        // die;
        if ($this->input->post('jumlah') == null || empty($_FILES['desain']['name'])) {
            $id = $this->input->post('barang_id');
            $this->session->set_flashdata('error', '<div class="invalid-feedback">Masukkan jumlah barang!</div>');
            redirect('home/pemesanan/'.$id);
        }else{
            // var_dump($_FILES['desain']['name']);
            // die;
            $this->c_pemesanan->insert();
            $kode = $this->session->userdata('kode');
            redirect('home/chart');
        }
        // $data['pemesanan'] = $this->db->get("pemesanan")->last_row();
    }

    public function list() {
        $user = $this->session->userdata('username');
        $data["user"] = $this->m_pelanggan->getByName($user);
        $data["produk"] = $this->m_produk->getAllProduk();

        $status = $this->input->get("filter");
        $data['pemesanan'] = $this->filter($status);

        $this->load->view("client/home/list-pemesanan", $data);
    }

    public function filter($id)
    {
        $kode = $this->session->userdata('id_user');
        return $this->c_kategori->list($kode, $id);
    }

    public function edit($id) {
        // $data["produk"] = json_encode($this->m_produk->getAllProduk());
        
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('tagihan', 'Total', 'required');
        $this->form_validation->set_rules('desain', 'Desain', 'required');
        // if (empty($_FILES['desain']['name']))
        // {
        // }
        // var_dump($this->input->post("tagihan"));
        // die;
        // var_dump($this->input->post());
        // die;
        if ($this->input->post('jumlah') == null) {
            // $id = $this->input->post('barang_id');
            $this->session->set_flashdata('error', '<div class="invalid-feedback">Masukkan jumlah barang!</div>');
            // redirect('pemesanan/edit/'.$id);
        }else{
            // var_dump($_FILES['desain']['name']);
            // die;
            $this->c_pemesanan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
            $user = $this->session->userdata('username');
            $data["user"] = $this->m_pelanggan->getByName($user);

            $data['pemesanan'] = $this->m_pemesanan->getAllById($id);
            $data['produk'] = json_encode($this->m_pemesanan->getAllById($id));
            $this->load->view("client/pemesanan/edit", $data);
        // $data['pemesanan'] = $this->db->get("pemesanan")->last_row();
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->c_pemesanan->delete($id)) {
            redirect(site_url('home'));
        }
    }

    public function delete2($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->c_pemesanan->delete($id)) {
            redirect(site_url('home/chart'));
        }
    }
    public function delete3($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->c_pemesanan->delete($id)) {
            redirect(site_url('home/list?filter=2'));
        }
    }
}
