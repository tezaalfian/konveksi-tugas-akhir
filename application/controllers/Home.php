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
        $this->load->model("c_pengiriman");
        $this->load->model("c_pembayaran");
        $this->load->model("c_kategori");
        $this->load->library("form_validation");
        $this->load->model('rajaongkir');

        $user = $this->session->userdata('username');

  		if ($user) {
  			$user = $this->session->userdata('username');
  			$data["user"] = $this->m_pelanggan->getByName($user);
  			$data["produk"] = $this->m_produk->getAllProduk();
  		} else {
  			redirect('login');
  		}

      // if ($this->session->userdata('role_id') == 1) {
      //   show_404();
      // }
  }

	public function index()
	{
		$user = $this->session->userdata('username');
		$data["user"] = $this->m_pelanggan->getByName($user);
		$data["produk"] = $this->m_produk->getAllProduk();	
    $data["slide"] = $this->db->get('slide')->result();
    $data["medsos"] = $this->db->get('medsos')->result();
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
        
        $data["medsos"] = $this->db->get('medsos')->result();
        $this->load->view("client/home/pemesanan", $data);
	}

  public function chart()
  {
    $user = $this->session->userdata('username');
    $data["user"] = $this->m_pelanggan->getByName($user);
    $data["produk"] = $this->m_produk->getAllProduk();

    $kode = $this->session->userdata('id_user');

    $data['pemesanan'] = $this->c_kategori->keranjang($kode);
    if (!$data["pemesanan"]){
      $this->session->set_flashdata('kosong', '<div class="alert alert-danger" role="alert">Keranjang anda kosong!</div>');
    }
        
    $data["medsos"] = $this->db->get('medsos')->result();
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
        
    $data["medsos"] = $this->db->get('medsos')->result();
    $this->load->view("client/home/tambah-pengiriman", $data);
	}

  public function pengiriman($id)
  {
    $post = $this->input->post();
    $provinsi = json_decode($this->rajaongkir->oneprovinsi($post["provinsi"]));
    $kota = json_decode($this->rajaongkir->onekota($post["kota"]));

    // $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    // $this->form_validation->set_rules('nama_penerima', 'Penerima', 'required');
    // $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
    // $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
    // $this->form_validation->set_rules('label', 'Label', 'required');
    $this->session->set_userdata("kode_pemesanan", $post["pemesanan_id"]);

    $data_pengiriman = array(
        "label" => $post["label"],
        "nama_penerima" => $post["nama_penerima"],
        "no_hp" => $post["no_hp"],
        "alamat" => $post["alamat"],
        "pemesanan_id" => $post["pemesanan_id"],
        "ongkir" => $post["ongkir"],
        "kode_pos" => $post["kode_pos"],
        "kurir" => $post["kurir"],
        "provinsi" => $provinsi->rajaongkir->results->province,
        "kota" => $kota->rajaongkir->results->city_name,
        "keterangan" => 9
    );

    // if ($this->form_validation->run()) {
      $this->c_pengiriman->insert_pengiriman($data_pengiriman);
      $this->c_pembayaran->insert();
      $this->c_pengiriman->menunggu_bayar();
      $kode = $this->session->userdata("kode_pemesanan");
      redirect('pembayaran/tambah/'.$kode);
    // }
  }

  public function kota($url)
  {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: fe911660a009a11d0a2ad2613f934654"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
       echo  $response;
      }
  }

  public function cost($dest, $weight)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=431&destination=".$dest."&weight=".$weight."&courier=jne",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: fe911660a009a11d0a2ad2613f934654"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
  }

}
