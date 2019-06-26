<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
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

    public function tambah2() {
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
            $kode = $this->session->userdata('id_pemesanan');
            redirect('home/checkout/'.$kode);
        }
        // $data['pemesanan'] = $this->db->get("pemesanan")->last_row();
    }

    public function list() {
        $user = $this->session->userdata('username');
        $kode = $this->session->userdata('id_user');
        $data["user"] = $this->m_pelanggan->getByName($user);
        $data["produk"] = $this->m_produk->getAllProduk();

        $status = $this->input->get("filter");
        if ($status) {
            $data["json_pesan"] = json_encode($this->filter($status));
            $data['pemesanan'] = $this->filter($status);
        }else{
            $data["json_pesan"] = json_encode($data['pemesanan'] = $this->c_kategori->allOrder($kode));
            $data['pemesanan'] = $this->c_kategori->allOrder($kode);
        }
        if (!$data["pemesanan"]){
            $this->session->set_flashdata('empty', '<div class="alert alert-danger" role="alert">Pesanan anda belum ada!</div>');
        }
        $this->load->view("client/home/list-pemesanan", $data);
    }

    public function filter($id)
    {
        $kode = $this->session->userdata('id_user');
        return $this->c_kategori->list($kode, $id);
    }

    public function diterima($id){
        $data_kirim = array(
            "tanggal_diterima" => date("Y/m/d"),
            "keterangan" => 7
        );

        $status = array(
            "status_id" => 6
        );

        $this->m_pengiriman->update($data_kirim, $id);
        $this->c_kategori->status($status, $id);
        $this->session->set_flashdata('success', 'Terima kasih telah memesan produk kami!');
        redirect('pemesanan/list');
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
            $this->c_pembayaran->delete($id);
            $this->db->delete('pengiriman', array("pemesanan_id" => $id));
            redirect(site_url('pemesanan/list'));
        }
    }
}
