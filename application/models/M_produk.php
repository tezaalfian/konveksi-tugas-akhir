<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

        class M_produk extends CI_Model {

                private $_table = "barang";
                public $id;
                public $nama;
                public $harga;
                public $foto = "default.jpg";
                public $deskripsi;

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
                    $this->db->select("*");
                    $this->db->from("barang");
                    $this->db->order_by("nama", "asc");
                    $query = $this->db->get();
                    return $query->result();
                }

                public function getById($id)
                {
                    return $this->db->get_where('barang', ["id" => $id])->row();
                }

                public function insert()
                {
                    $post = $this->input->post();
                    $this->id = base_convert(microtime(FALSE), 10, 36);
                    $this->nama = $post["nama"];
                    $this->harga = $post["harga"];
                    $this->foto = $this->uploadImage();
                    $this->deskripsi = $post["deskripsi"];
                    $this->db->insert($this->_table, $this);
                }

                public function update()
                {
                    $post = $this->input->post();
                    $this->id = $post['id'];
                    $this->nama = $post["nama"];
                    $this->harga = $post["harga"];
                    $this->deskripsi = $post["deskripsi"];

                    if (!empty($_FILES["foto"]["name"])) {
                        $this->foto = $this->uploadImage();
                    } else {
                        $this->foto = $post["old_foto"];
                    }

                    $this->db->update($this->_table, $this, array('id' => $post['id']));
                }

                public function delete($id)
                {
                    $this->deleteImage($id);
                    return $this->db->delete('barang', array("id" => $id));
                }

                private function uploadImage()
                {
                    $config['upload_path']          = './upload/produk/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['file_name']            = $this->id;
                    $config['overwrite']            = true;
                    $config['max_size']             = 2048; // 1MB
                    // $config['max_width']            = 1024;
                    // $config['max_height']           = 768;

                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto')) {
                        $gbr = $this->upload->data();
                //Compress Image
                        $config['image_library']='gd2';
                        $config['source_image']='./upload/produk/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        // $config['width']= 600;
                        // $config['height']= 600;
                        $config['new_image']= './upload/produk/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        return $this->upload->data("file_name");
                    }
                    // print_r($this->upload->display_errors());
                    return "default.jpg";
                }

                private function deleteImage($id)
                {
                    $product = $this->getById($id);
                    if ($product->foto != "default.jpg") {
                        $filename = explode(".", $product->foto)[0];
                        return array_map('unlink', glob(FCPATH."upload/produk/$filename.*"));
                    }
                }
        }
