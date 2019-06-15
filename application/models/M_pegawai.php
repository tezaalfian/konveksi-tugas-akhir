<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

        class M_pegawai extends CI_Model {

                private $_table = "pegawai";
                public $id_pegawai;
                public $username;
                public $nama;
                public $foto = "default.jpg";
                public $alamat;
                public $password;
                public $no_hp;
                public $jenis_kelamin;

                public function rules()
                {
                        return [
                            ['field' => 'username',
                            'label' => 'username',
                            'rules' => 'required'],

                            ['field' => 'nama',
                            'label' => 'nama',
                            'rules' => 'required'],

                            ['field' => 'no_hp',
                            'label' => 'no_hp',
                            'rules' => 'required|numeric'],

                            ['field' => 'password',
                            'label' => 'password',
                            'rules' => 'required|min_length[8]'],
                            
                            ['field' => 'alamat',
                            'label' => 'alamat',
                            'rules' => 'required'],

                            // ['field' => 'jenis_kelamin',
                            // 'label' => 'jenis_kelamin',
                            // 'rules' => 'trim|required|xss_clean']
                        ];
                }

                public function getAll()
                {
                    $this->db->select("*");
                    $this->db->from("pegawai");
                    $this->db->order_by("nama", "asc");
                    $query = $this->db->get();
                    return $query->result();
                }

                public function getById($id)
                {
                   return $this->db->get_where('pegawai', ["id_pegawai" => $id])->row();
                }

                public function insert()
                {
                    $post = $this->input->post();
                    $this->id_pegawai = base_convert(microtime(FALSE), 8, 16);
                    $this->username = $post["username"];
                    $this->nama = $post["nama"];
                    $this->foto = $this->uploadImage();
                    $this->alamat = $post["alamat"];
                    $this->password = $post["password"];
                    $this->no_hp = $post["no_hp"];
                    $this->jenis_kelamin = $post["jenis_kelamin"];

                    $this->db->insert($this->_table, $this);
                }

                public function update()
                {
                    $post = $this->input->post();
                    $this->id_pegawai = $post['id_pegawai'];
                    $this->username = $post["username"];
                    $this->nama = $post["nama"];
                    $this->alamat = $post["alamat"];
                    $this->password = $post["password"];
                    $this->no_hp = $post["no_hp"];
                    $this->jenis_kelamin = $post["jenis_kelamin"];

                    if (!empty($_FILES["foto"]["name"])) {
                        $this->foto = $this->uploadImage();
                    } else {
                        $this->foto = $post["old_foto"];
                    }

                    $this->db->update($this->_table, $this, array('id_pegawai' => $post['id_pegawai']));
                }

                public function delete($id)
                {
                    $this->deleteImage($id);
                    return $this->db->delete('pegawai', array("id_pegawai" => $id));
                }

                private function uploadImage()
                {
                    $config['upload_path']          = './upload/pegawai/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['file_name']            = $this->id_pegawai;
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
                        $config['source_image']='./upload/pegawai/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        $config['width']= 600;
                        $config['height']= 600;
                        $config['new_image']= './upload/pegawai/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        return $this->upload->data("file_name");
                    }
                    // print_r($this->upload->display_errors());
                    return "default.jpg";
                }

                private function deleteImage($id)
                {
                    $pegawai = $this->getById($id);
                    if ($pegawai->foto != "default.jpg") {
                        $filename = explode(".", $pegawai->foto)[0];
                        return array_map('unlink', glob(FCPATH."upload/pegawai/$filename.*"));
                    }
                }
        }
