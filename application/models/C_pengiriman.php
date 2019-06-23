<?php

class C_pengiriman extends CI_Model {

    public function insert_pengiriman($data)
    {
        $this->db->insert('pengiriman', $data);
    }
    
    public function menunggu_bayar()
    {
        $post = $this->input->post();
        $this->status_id = 2;
        $this->tanggal_pemesanan = date("Y/m/d");
        $this->db->update("pemesanan", $this, array('id_pemesanan' => $post['pemesanan_id']));
    }
}