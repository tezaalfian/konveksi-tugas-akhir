<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("m_pengiriman");
		$this->load->model("m_pembayaran");
		$this->load->model("c_kategori");
		$this->load->model('rajaongkir');
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
		$data["pembayaran"] = $this->m_pembayaran->getAll();
		$this->load->view('admin/pembayaran/tabel-data', $data);
	}

	public function tambah($id = null)
	{
        $post = $this->input->post();
		$this->form_validation->set_rules('nominal', 'Jumlah', 'required|numeric');

		$tanggal = "";
		$pesanan = $this->db->get_where('pemesanan', ['id_pemesanan' => $id])->row_array();
		if ($pesanan['jumlah'] <= 10) {
			$startDate = time();
			$tanggal = date('Y/m/d', strtotime('+5 day', $startDate));
		}elseif ($pesanan['jumlah'] <= 20) {
			$startDate = time();
			$tanggal = date('Y/m/d', strtotime('+10 day', $startDate));
		}elseif ($pesanan['jumlah'] <= 30) {
			$startDate = time();
			$tanggal = date('Y/m/d', strtotime('+15 day', $startDate));
		}elseif ($pesanan['jumlah'] <= 40) {
			$startDate = time();
			$tanggal = date('Y/m/d', strtotime('+20 day', $startDate));
		}elseif ($pesanan['jumlah'] > 40) {
			$startDate = time();
			$tanggal = date('Y/m/d', strtotime('+30 day', $startDate));
		}

	    if ($this->form_validation->run() == true) {
		    $status = array(
		        "status_id" => 4,
		        "perkiraan" => $tanggal
		    );

		    $data_bayar = array(
		    	"ket" => 11,
		    	"tanggal_pembayaran" => date("Y/m/d"),
		    	"nominal" => $post["nominal"]
		    );

		    if ($this->form_validation->run() == true) {
			    $this->c_kategori->status($status, $id);
			    $this->m_pembayaran->update($data_bayar, $id);
			    $this->session->set_flashdata('success', 'Berhasil disimpan');
			    redirect('admin/pemesanan');
		    }
	    }
	}

	public function batal($id=null)
	{  
		$data_bayar = array(
	    	"ket" => 8,
	    	"nominal" => 0
		);
		$status = array(
		    "status_id" => 2
		);
		$this->m_pembayaran->update($data_bayar, $id);
		$this->c_kategori->status($status, $id);
		$this->session->set_flashdata('gagal', 'Permintaan pengiriman ulang akan diteruskan ke pelanggan!');
		redirect('admin/pemesanan');
	}

	public function detail($id)
	{
		echo json_encode($this->m_pembayaran->getAllById($id));
	}
}
