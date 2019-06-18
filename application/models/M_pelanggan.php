<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

        class M_pelanggan extends CI_Model {

                private $_table = "user";
                public $id_user;
                public $username;
                public $email;
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

                            ['field' => 'email',
                            'label' => 'email',
                            'rules' => 'required'],

                            ['field' => 'no_hp',
                            'label' => 'no_hp',
                            'rules' => 'numeric'],

                            ['field' => 'password',
                            'label' => 'password',
                            'rules' => 'required|min_length[8]'],
                            
                            // ['field' => 'alamat',
                            // 'label' => 'alamat',
                            // 'rules' => 'required'],

                            // ['field' => 'jenis_kelamin',
                            // 'label' => 'jenis_kelamin',
                            // 'rules' => 'trim|required|xss_clean']
                        ];
                }

                public function getAll()
                {
                    $this->db->select("*");
                    $this->db->from("user");
                    $this->db->order_by("username", "asc");
                    $this->db->where("role_id", 2);
                    $query = $this->db->get();
                    return $query->result();
                }

                public function getById($id)
                {
                   return $this->db->get_where('user', ["id_user" => $id])->row();
                }

                public function getByName($id)
                {
                   return $this->db->get_where('user', ["username" => $id])->row_array();
                }

                public function insert()
                {
                    $post = $this->input->post();
                    $this->id_usern = base_convert(microtime(FALSE), 8, 16);
                    $this->username = $post["username"];
                    $this->email = $post["email"];
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
                    $this->id_user = $post['id_user'];
                    $this->username = $post["username"];
                    $this->email = $post["email"];
                    $this->alamat = $post["alamat"];
                    $this->no_hp = $post["no_hp"];
                    $this->jenis_kelamin = $post["jenis_kelamin"];

                    if (!empty($_FILES["foto"]["name"])) {
                        $this->foto = $this->uploadImage();
                    } else {
                        $this->foto = $post["old_foto"];
                    }

                    $this->db->update($this->_table, $this, array('id_user' => $post['id_user']));
                }

                public function delete($id)
                {
                    $this->deleteImage($id);
                    return $this->db->delete('user', array("id_user" => $id));
                }

                private function uploadImage()
                {
                    $config['upload_path']          = './upload/pelanggan/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['file_name']            = $this->id_user;
                    $config['overwrite']            = true;
                    $config['max_size']             = 5120; // 1MB
                    // $config['max_width']            = 1024;
                    // $config['max_height']           = 768;

                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto')) {
                        $gbr = $this->upload->data();
                //Compress Image
                        $config['image_library']='gd2';
                        $config['source_image']='./upload/pelanggan/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= TRUE;
                        $config['quality']= '30%';
                        $config['height']           = 300;
                        $config['master_dim']       = 'height';
                        // $config['width']     = 500;
                        $config['new_image']= './upload/pelanggan/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        return $this->upload->data("file_name");
                        if ( ! $this->image_lib->resize())
                        {
                            echo $this->image_lib->display_errors();
                        }
                    }
                    // print_r($this->upload->display_errors());
                    return "default.jpg";
                }

                private function deleteImage($id)
                {
                    $pelanggan = $this->getById($id);
                    if ($pelanggan->foto != "default.jpg") {
                        $filename = explode(".", $pelanggan->foto)[0];
                        return array_map('unlink', glob(FCPATH."upload/pelanggan/$filename.*"));
                    }
                }
        }
