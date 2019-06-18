<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

        class M_administrator extends CI_Model {

                private $_table = "administrator";
                public $id_administrator;
                public $username;
                public $nama;
                public $foto = "default.jpg";
                public $password;

                public function rules()
                {
                        return [
                            ['field' => 'username',
                            'label' => 'username',
                            'rules' => 'required'],

                            ['field' => 'nama',
                            'label' => 'nama',
                            'rules' => 'required'],

                            ['field' => 'password',
                            'label' => 'password',
                            'rules' => 'required|min_length[8]'],

                            // ['field' => 'jenis_kelamin',
                            // 'label' => 'jenis_kelamin',
                            // 'rules' => 'trim|required|xss_clean']
                        ];
                }

                public function getAll()
                {
                    $this->db->select("*");
                    $this->db->from("administrator");
                    $this->db->order_by("nama", "asc");
                    $query = $this->db->get();
                    return $query->result();
                }

                public function getById($id)
                {
                   return $this->db->get_where('administrator', ["id_administrator" => $id])->row();
                }

                public function insert()
                {
                    $post = $this->input->post();
                    $this->id_administrator = base_convert(microtime(FALSE), 8, 16);
                    $this->username = $post["username"];
                    $this->nama = $post["nama"];
                    $this->foto = $this->uploadImage();
                    $this->password = $post["password"];

                    $this->db->insert($this->_table, $this);
                }

                public function update()
                {
                    $post = $this->input->post();
                    $this->id_administrator = $post['id_administrator'];
                    $this->username = $post["username"];
                    $this->nama = $post["nama"];
                    $this->password = $post["password"];

                    if (!empty($_FILES["foto"]["name"])) {
                        $this->foto = $this->uploadImage();
                    } else {
                        $this->foto = $post["old_foto"];
                    }

                    $this->db->update($this->_table, $this, array('id_administrator' => $post['id_administrator']));
                }

                public function delete($id)
                {
                    $this->deleteImage($id);
                    return $this->db->delete('administrator', array("id_administrator" => $id));
                }

                private function uploadImage()
                {
                    $config['upload_path']          = './upload/administrator/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['file_name']            = $this->id_administrator;
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
                        $config['source_image']='./upload/administrator/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        // $config['width']= 600;
                        // $config['height']= 600;
                        $config['new_image']= './upload/administrator/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        return $this->upload->data("file_name");
                    }
                    print_r($this->upload->display_errors());
                    return "default.jpg";
                }

                private function deleteImage($id)
                {
                    $administrator = $this->getById($id);
                    if ($administrator->foto != "default.jpg") {
                        $filename = explode(".", $administrator->foto)[0];
                        return array_map('unlink', glob(FCPATH."upload/administrator/$filename.*"));
                    }
                }
        }
