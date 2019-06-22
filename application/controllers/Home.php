<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
  {
        parent::__construct();
        $this->load->model("m_produk");
        $this->load->model("m_pelanggan");
        $this->load->model("m_pemesanan");
        $this->load->model("c_pemesanan");
        $this->load->model('rajaongkir');

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
		$data["user"] = $this->m_pelanggan->getByName($user);
		$data["produk"] = $this->m_produk->getAllProduk();	

		$this->load->view('client/home/after_login', $data);
	}

	public function pemesanan($id)
	{
		$user = $this->session->userdata('username');
		$data["user"] = $this->m_pelanggan->getByName($user);
		$data["produk"] = $this->m_produk->getAllProduk();
       
        $product = $this->m_produk;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["produk"] = json_encode($product->getById($id));
        if (!$data["produk"]) show_404();

        // var_dump($data['produk']);
        // die;
        
        $this->load->view("client/home/pemesanan", $data);
	}

  public function chart()
  {
    $user = $this->session->userdata('username');
    $data["user"] = $this->m_pelanggan->getByName($user);
    $data["produk"] = $this->m_produk->getAllProduk();

    $kode = $this->session->userdata('id_user');

    $data['pemesanan'] = $this->c_pemesanan->getAllById($kode);
    if (!$data["pemesanan"]){
      $this->session->set_flashdata('kosong', '<div class="alert alert-danger" role="alert">Keranjang anda kosong!</div>');
    }
        
    $this->load->view("client/home/chart", $data);
  }

	public function checkout($id)
	{
		$user = $this->session->userdata('username');
		$data["user"] = $this->m_pelanggan->getByName($user);
    $data["pemesanan"] = $this->m_pemesanan->getAllById($id);
    $data["produk"] = json_encode($this->m_pemesanan->getAllById($id));
    $data["provinsi"] = $this->rajaongkir->provinsi();
    $data["kota"] = $this->rajaongkir->kota();
  //       $product = $this->m_produk;
  //       $validation = $this->form_validation;
  //       $validation->set_rules($product->rules());

  //       if ($validation->run()) {
  //           $product->update();
  //           $this->session->set_flashdata('success', 'Berhasil disimpan');
  //       }
      // $kode = $this->session->userdata('kode');

      //   $data['pemesanan'] = $this->m_pemesanan->getAllById($kode);
        // if (!$data["pemesanan"]) show_404();
        
    $this->load->view("client/home/tambah-pengiriman", $data);
	}

}
