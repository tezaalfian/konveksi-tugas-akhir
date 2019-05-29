<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

        class M_produk extends CI_Model {

                public $title;
                public $content;
                public $date;

                public function rules()
                {
                        return [
                            ['field' => 'nama',
                            'label' => 'Nama',
                            'rules' => 'required'],

                            ['field' => 'harga',
                            'label' => 'Harga',
                            'rules' => 'numeric'],
                            
                            ['field' => 'deskripsi',
                            'label' => 'Deskripsi',
                            'rules' => 'required']
                        ];
                }

                public function getAllProduk()
                {
                        $query = $this->db->get('barang');
                        return $query->result();
                }

                public function insert($data)
                {
                        $this->db->insert('barang', $data);
                }

                public function update_entry()
                {
                        $this->title    = $_POST['title'];
                        $this->content  = $_POST['content'];
                        $this->date     = time();

                        $this->db->update('entries', $this, array('id' => $_POST['id']));
                }

        }
