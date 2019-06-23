<?php

class C_pembayaran extends CI_Model {

	public $id_pembayaran;
	public $pemesanan_id;
	public $total_tagihan;

    public function insert()
    {
    	$post = $this->input->post();
    	$this->id_pembayaran = base_convert(microtime(FALSE), 8, 16);
    	$this->pemesanan_id = $post["pemesanan_id"];
    	$this->total_tagihan = $post["total_tagihan"];

        $this->db->insert("pembayaran", $this);
    }

}