<?php

class C_pembayaran extends CI_Model {

	public $id_pembayaran;
	public $pemesanan_id;
	public $total_tagihan;

    public function getById($id)
    {
        return $this->db->get_where('pembayaran', ["pemesanan_id" => $id])->row();
    }

    public function insert()
    {
    	$post = $this->input->post();
    	$this->id_pembayaran = base_convert(microtime(FALSE), 8, 16);
    	$this->pemesanan_id = $post["pemesanan_id"];
    	$this->total_tagihan = $post["total_tagihan"];

        $this->db->insert("pembayaran", $this);
    }

    public function kirimStruk($data, $id)
    {
        $this->db->update("pembayaran", $data, array('pemesanan_id' => $id));
    }

    public function status($data, $id)
    {
        $this->db->update("pemesanan", $data, array('id_pemesanan' => $id));
    }

    public function uploadImage()
    {
        $config['upload_path']          = './upload/pembayaran/';
        $config['allowed_types']        = 'jpg|png|jpeg|pdf';
        $config['file_name']            = $this->input->post("pemesanan_id");
        $config['overwrite']            = true;
        $config['max_size']             = 10024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bukti_pembayaran')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }
}