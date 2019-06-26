<?php

class M_pembayaran extends CI_Model {

    public function getAll()
    {
        $this->db->select("pemesanan.*, pembayaran.*, pengiriman.ongkir, status.status");
        $this->db->from("pembayaran");
        // $this->db->join("barang", "barang.id = pemesanan.barang_id");
        $this->db->join("status", "pembayaran.ket = status.id");
        $this->db->join("pemesanan", "pembayaran.pemesanan_id = pemesanan.id_pemesanan");
        $this->db->join("pengiriman", "pembayaran.pemesanan_id = pengiriman.pemesanan_id");
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
        $this->deleteImage($id);
        return $this->db->delete('pembayaran', array("pemesanan_id" => $id));
    }

    private function deleteImage($id)
    {
        $pembayaran = $this->getById($id);
        if ($pembayaran->desain != "default.jpg") {
            $filename = explode(".", $pembayaran->bukti_pembayaran)[0];
            return array_map('unlink', glob(FCPATH."upload/pembayaran/$filename.*"));
        }
    }

    public function update($data, $id)
    {
        return $this->db->update('pembayaran', $data, array('pemesanan_id' => $id));
    }
}