<?php

class M_pengiriman extends CI_Model {

    public function getAll()
    {
        $this->db->select("pemesanan.*, pengiriman.*, status.status");
        $this->db->from("pengiriman");
        // $this->db->join("barang", "barang.id = pemesanan.barang_id");
        $this->db->join("status", "pengiriman.keterangan = status.id");
        $this->db->join("pemesanan", "pengiriman.pemesanan_id = pemesanan.id_pemesanan");
        $this->db->order_by("pemesanan.status_id", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select("pemesanan.*, pengiriman.*, pembayaran.*, user.id_user, user.username");
        $this->db->from("pemesanan");
        $this->db->join("pengiriman", "pengiriman.pemesanan_id = pemesanan.id_pemesanan");
        $this->db->join("pembayaran", "pembayaran.pemesanan_id = pemesanan.id_pemesanan");
        $this->db->join("user", "user.id_user = pemesanan.pelanggan_id");
        $this->db->where("pemesanan.id_pemesanan", $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function delete($id)
    {
        return $this->db->delete('pengiriman', array("pemesanan_id" => $id));
    }

    public function update($data, $id)
    {
        return $this->db->update('pengiriman', $data, array('pemesanan_id' => $id));
    }

}