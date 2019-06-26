<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

        class C_admin extends CI_Model {

                public function rules()
                {
                        return [
                            ['field' => 'username',
                            'label' => 'Username',
                            'rules' => 'required|trim|alpha_dash|is_unique[user.username]'],

                            ['field' => 'nama',
                            'label' => 'nama',
                            'rules' => 'required'],

                            ['field' => 'password',
                            'label' => 'Password',
                            'rules' => 'required|trim|min_length[8]']

                            // ['field' => 'jenis_kelamin',
                            // 'label' => 'jenis_kelamin',
                            // 'rules' => 'trim|required|xss_clean']
                        ];
                }

                public function rules2()
                {
                        return [
                            ['field' => 'username',
                            'label' => 'Username',
                            'rules' => 'required|trim|alpha_dash']

                            // ['field' => 'jenis_kelamin',
                            // 'label' => 'jenis_kelamin',
                            // 'rules' => 'trim|required|xss_clean']
                        ];
                }

                public function update()
                {
                    $post = $this->input->post();
                    $this->id_user = $post['id_user'];
                    $this->username = $post["username"];
                    $this->nama = $post["nama"];

                    if (!empty($_FILES["foto"]["name"])) {
                        $this->foto = $this->uploadImage();
                    } else {
                        $this->foto = $post["old_foto"];
                    }

                    $this->db->update("user", $this, array('id_user' => $post['id_user']));
                }

                private function uploadImage()
                {
                    $config['upload_path']          = './upload/administrator/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['file_name']            = $this->id_user;
                    $config['overwrite']            = true;
                    $config['max_size']             = 10120; // 1MB
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
                        $config['maintain_ratio']= TRUE;
                        $config['height']           = 400;
                        $config['master_dim']       = 'height';
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
        }
