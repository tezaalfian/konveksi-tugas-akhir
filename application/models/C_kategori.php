<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class C_kategori extends CI_Model {
    	
    	public function keranjang($id)
        {
            $this->db->select("pemesanan.*, barang.*, user.id_user, user.username, status.status");
            $this->db->from("pemesanan");
            $this->db->join("barang", "barang.id = pemesanan.barang_id");
            $this->db->join("user", "user.id_user = pemesanan.pelanggan_id");
            $this->db->join("status", "status.id = pemesanan.status_id");
            $this->db->where("pemesanan.pelanggan_id", $id);
            $this->db->where("pemesanan.status_id", 1);
            $this->db->order_by("pemesanan.tanggal_pemesanan", "asc");
            $query = $this->db->get();
            return $query->result();
        }

        public function list($id, $status)
        {
            $this->db->select("pemesanan.*, barang.*, user.id_user, user.username, status.status, pengiriman.*, pembayaran.*");
            $this->db->from("pemesanan");
            $this->db->join("barang", "barang.id = pemesanan.barang_id");
            $this->db->join("user", "user.id_user = pemesanan.pelanggan_id");
            $this->db->join("status", "status.id = pemesanan.status_id");
            $this->db->join("pengiriman", "pemesanan.id_pemesanan = pengiriman.pemesanan_id");
            $this->db->join("pembayaran", "pemesanan.id_pemesanan = pembayaran.pemesanan_id");
            $this->db->where("pemesanan.pelanggan_id", $id);
            $this->db->where("pemesanan.status_id", $status);
            $this->db->order_by("pemesanan.tanggal_pemesanan", "asc");
            $query = $this->db->get();
            return $query->result();
        }
    }