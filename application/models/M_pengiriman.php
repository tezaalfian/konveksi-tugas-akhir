<?php

class M_pengiriman extends CI_Model {

    public function getAll()
    {
        $this->db->select("pemesanan.*, pengiriman.*, status.status");
        $this->db->from("pengiriman");
        // $this->db->join("barang", "barang.id = pemesanan.barang_id");
        $this->db->join("status", "pengiriman.status = status.id");
        $this->db->join("pemesanan", "pengiriman.pemesanan_id = pemesanan.id_pemesanan");
        $this->db->order_by("pemesanan.status_id", "asc");
        $query = $this->db->get();
        return $query->result();
    }
}