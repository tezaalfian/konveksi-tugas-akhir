<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

        class M_pembayaran extends CI_Model {

                private $_table = "pembayaran";
                public $id_pembayaran;
                public $barang_id;
                public $jumlah;
                public $desain = "default.jpg";
                public $catatan;
                public $tanggal_pembayaran;
                public $tagihan;
                public $pelanggan_id;
                public $s, $m, $l, $xl, $xxl, $xxxl;

                public function rules()
                {
                        return [
                            ['field' => 'pelanggan',
                            'label' => 'pelanggan',
                            'rules' => 'required'],

                            ['field' => 'produk',
                            'label' => 'produk',
                            'rules' => 'required'],

                            // ['field' => 'pelanggan_id',
                            // 'label' => 'pelanggan_id',
                            // 'rules' => 'trim|required|xss_clean']
                        ];
                }

                public function getAll()
                {
                    $this->db->select("*");
                    $this->db->from("pembayaran");
                    $this->db->join("barang", "barang.id = pembayaran.barang_id");
                    $this->db->join("pelanggan", "pelanggan.id_pelanggan = pembayaran.pelanggan_id");
                    $this->db->order_by("pembayaran.tanggal_pembayaran", "asc");
                    $query = $this->db->get();
                    return $query->result();
                }

                public function getAllById($id)
                {
                    $this->db->select("*");
                    $this->db->from("pembayaran");
                    $this->db->join("barang", "barang.id = pembayaran.barang_id");
                    $this->db->join("pelanggan", "pelanggan.id_pelanggan = pembayaran.pelanggan_id");
                    $this->db->where("pembayaran.id_pembayaran", $id);
                    $this->db->order_by("pembayaran.tanggal_pembayaran", "asc");
                    $query = $this->db->get();
                    return $query->result();
                }

                public function getById($id)
                {
                   return $this->db->get_where('pembayaran', ["id_pembayaran" => $id])->row();
                }

                public function insert()
                {
                    $post = $this->input->post();
                    $this->id_pembayaran = base_convert(microtime(FALSE), 8, 16);

                    $produk = $this->db->get_where('barang', ["nama" => $post["produk"]])->row();
                    $this->barang_id = $produk->id;

                    $this->jumlah = $post["jumlah"];
                    $this->desain = $this->uploadImage();
                    $this->catatan = $post["catatan"];
                    $this->tanggal_pembayaran = date("Y/m/d");
                    $this->tagihan = $post["tagihan"];

                    $pelanggan = $this->db->get_where('pelanggan', ["username" => $post["pelanggan"]])->row();
                    $this->pelanggan_id = $pelanggan->id_pelanggan;

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
                    $this->id_pembayaran = $post['id_pembayaran'];

                    // $produk = $this->db->get_where('barang', ["nama" => $post["produk"]])->row();
                    $this->barang_id = $post["produk"];

                    $this->jumlah = $post["jumlah"];
                    $this->catatan = $post["catatan"];
                    $this->tagihan = $post["tagihan"];
                    $this->tanggal_pembayaran = $post["old_date"];

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

                    $this->db->update($this->_table, $this, array('id_pembayaran' => $post['id_pembayaran']));
                }

                public function delete($id)
                {
                    $this->deleteImage($id);
                    return $this->db->delete('pembayaran', array("id_pembayaran" => $id));
                }

                private function uploadImage()
                {
                    $config['upload_path']          = './upload/pembayaran/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['file_name']            = $this->id_pembayaran;
                    $config['overwrite']            = true;
                    $config['max_size']             = 2048; // 1MB
                    // $config['max_width']            = 1024;
                    // $config['max_height']           = 768;

                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('desain')) {
                        $gbr = $this->upload->data();
                //Compress Image
                        $config['image_library']='gd2';
                        $config['source_image']='./upload/pembayaran/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        // $config['width']= 600;
                        // $config['height']= 600;
                        $config['new_image']= './upload/pembayaran/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        return $this->upload->data("file_name");
                    }
                    // print_r($this->upload->display_errors());
                    return "default.jpg";
                }

                private function deleteImage($id)
                {
                    $pembayaran = $this->getById($id);
                    if ($pembayaran->desain != "default.jpg") {
                        $filename = explode(".", $pembayaran->desain)[0];
                        return array_map('unlink', glob(FCPATH."upload/pembayaran/$filename.*"));
                    }
                }
        }
