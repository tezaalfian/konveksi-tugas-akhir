<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("m_pengiriman");
		$this->load->model("m_pembayaran");
		$this->load->model('rajaongkir');
		if ($this->session->userdata('role_id') == 2) {
			show_404();
		}		
	}

	public function index() {
		$data["pengiriman"] = $this->m_pengiriman->getAll();
		$this->load->view('admin/pengiriman/tabel-data', $data);
	}

	public function edit($id = null)
	{
        $post = $this->input->post();
		    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
		    $this->form_validation->set_rules('nama_penerima', 'Penerima', 'required');
		    $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
		    $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
		    $this->form_validation->set_rules('label', 'Label', 'required');
	    if ($this->form_validation->run()) {
	    	$provinsi = json_decode($this->rajaongkir->oneprovinsi($post["provinsi"]));
		    $kota = json_decode($this->rajaongkir->onekota($post["kota"]));


		    $data_pengiriman = array(
		        "label" => $post["label"],
		        "nama_penerima" => $post["nama_penerima"],
		        "no_hp" => $post["no_hp"],
		        "alamat" => $post["alamat"],
		        // "pemesanan_id" => $post["pemesanan_id"],
		        "ongkir" => $post["ongkir"],
		        "kode_pos" => $post["kode_pos"],
		        "kurir" => $post["kurir"],
		        "provinsi" => $provinsi->rajaongkir->results->province,
		        "kota" => $kota->rajaongkir->results->city_name,
		        "keterangan" => 9
		    );

		    $data_bayar = array(
		    	"total_tagihan" => $post["total_tagihan"]
		    );

		    if ($this->form_validation->run() == true) {
			    $this->m_pengiriman->update($data_pengiriman, $id);
			    $this->m_pembayaran->update($data_bayar, $id);
			    $this->session->set_flashdata('success', 'Berhasil disimpan');
		    }
	    }

	    $data["produk"] = json_encode($this->m_pengiriman->getById($id));
	    $data["provinsi"] = $this->rajaongkir->provinsi();
	    $data["kota"] = $this->rajaongkir->kota();
        $data["pemesanan"] = $this->m_pengiriman->getById($id);

        $this->load->view("admin/pengiriman/edit-pengiriman", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();
        
        if ($this->m_pengiriman->delete($id)) {
            redirect(site_url('admin/pengiriman'));
        }
	}

	public function tambah() {
		$data["produk"] = json_encode($this->m_produk->getAllProduk());
		$data["pelanggan"] = $this->m_pelanggan->getAll();
        $pengiriman = $this->m_pengiriman;
        $validation = $this->form_validation;
        $validation->set_rules($pengiriman->rules());

        if ($validation->run()) {
            $pengiriman->insert();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		$this->load->view('admin/pengiriman/tambah-pengiriman',$data);
	}
}
