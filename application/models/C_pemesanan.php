<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

        class C_pemesanan extends CI_Model {

                private $_table = "pemesanan";
                public $id_pemesanan;
                public $barang_id;
                public $jumlah;
                public $desain = "default.jpg";
                public $catatan;
                public $tanggal_pemesanan;
                public $tagihan;
                public $pelanggan_id;
                public $s, $m, $l, $xl, $xxl, $xxxl;

                public function insert()
                {
                    $post = $this->input->post();
                    $this->id_pemesanan = base_convert(microtime(FALSE), 8, 16);

                    $this->barang_id = $post["barang_id"];
                    $this->jumlah = $post["jumlah"];
                    $this->desain = $this->uploadImage();
                    $this->catatan = $post["catatan"];
                    $this->tanggal_pemesanan = date("Y/m/d");
                    $this->tagihan = $post["tagihan"];
                    $this->pelanggan_id = $this->session->userdata('id_user');

                    $this->s = $post["s"];
                    $this->m = $post["m"];
                    $this->l = $post["l"];
                    $this->xl = $post["xl"];
                    $this->xxl = $post["xxl"];
                    $this->xxxl = $post["xxxl"];

                    $this->db->insert($this->_table, $this);
                }

                public function update()
                {
                    $post = $this->input->post();
                    $this->id_pemesanan = $post['id_pemesanan'];

                    // $produk = $this->db->get_where('barang', ["nama" => $post["produk"]])->row();
                    $this->barang_id = $post["produk"];

                    $this->jumlah = $post["jumlah"];
                    $this->catatan = $post["catatan"];
                    $this->tagihan = $post["tagihan"];
                    $this->tanggal_pemesanan = $post["old_date"];

                    // $pelanggan = $this->db->get_where('pelanggan', ["username" => $post["pelanggan"]])->row();
                    $this->pelanggan_id = $post["pelanggan"];

                    $this->s = $post["s"];
                    $this->m = $post["m"];
                    $this->l = $post["l"];
                    $this->xl = $post["xl"];
                    $this->xxl = $post["xxl"];
                    $this->xxxl = $post["xxxl"];

                    if (!empty($_FILES["desain"]["name"])) {
                        $this->desain = $this->uploadImage();
                    } else {
                        $this->desain = $post["old_desain"];
                    }

                    $this->db->update($this->_table, $this, array('id_pemesanan' => $post['id_pemesanan']));
                }

                public function delete($id)
                {
                    $this->deleteImage($id);
                    return $this->db->delete('pemesanan', array("id_pemesanan" => $id));
                }

                private function uploadImage()
                {
                    $config['upload_path']          = './upload/pemesanan/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['file_name']            = $this->id_pemesanan;
                    $config['overwrite']            = true;
                    $config['max_size']             = 10120; // 1MB
                    // $config['max_width']            = 1024;
                    // $config['max_height']           = 768;

                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('desain')) {
                        $gbr = $this->upload->data();
                //Compress Image
                        $config['image_library']='gd2';
                        $config['source_image']='./upload/pemesanan/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= TRUE;
                        $config['height']           = 400;
                        $config['master_dim']       = 'height';
                        // $config['width']= 600;
                        // $config['height']= 600;
                        $config['new_image']= './upload/pemesanan/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        return $this->upload->data("file_name");
                    }
                    // print_r($this->upload->display_errors());
                    return "default.jpg";
                }

                private function deleteImage($id)
                {
                    $pemesanan = $this->getById($id);
                    if ($pemesanan->desain != "default.jpg") {
                        $filename = explode(".", $pemesanan->desain)[0];
                        return array_map('unlink', glob(FCPATH."upload/pemesanan/$filename.*"));
                    }
                }
        }
