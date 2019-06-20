<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class M_auth extends CI_Model {

        private $_table = "user";
        public $id_user;
        public $username;
        public $email;
        public $foto;
        public $password;
        public $date_created;
        public $is_active;
        public $role_id;

        public function rules()
        {
            return [
                ['field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim|alpha_dash|is_unique[user.username]'],
                
                ['field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email|is_unique[user.email]'],

                ['field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[8]|matches[password1]'],

                ['field' => 'password1',
                'label' => 'Confiirm Password',
                'rules' => 'required|trim|matches[password]']
            ];
        }

        public function rules2()
        {
            return [
                ['field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim'],

                ['field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim']
            ];
        }

        public function insert()
        {
            $post = $this->input->post();
            $this->id_user = base_convert(microtime(FALSE), 8, 16);
            $this->username = htmlspecialchars($this->input->post("username", true));
            $this->email = htmlspecialchars($this->input->post("email", true));
            $this->foto = "default.jpg";
            $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
            $this->is_active = 1;
            $this->date_created = time();
            $this->role_id = 2;

            $this->db->insert($this->_table, $this);
        }

        public function getUser()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            return $this->db->get_where('user', ['username' => $username])->row_array();
        }
                
    }
