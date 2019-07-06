<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {
	
  public $id;
  public $slide;

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('m_pelanggan');

    $user = $this->session->userdata('username');

		if ($user) {
			$user = $this->session->userdata('username');
			$data["user"] = $this->m_pelanggan->getByName($user);
		} else {
			redirect('login');
		}
  }

	public function index()
	{
    $data['slide'] = $this->db->get('slide')->result();
    $this->load->view('admin/slide/tabel-data', $data);
	}

  public function tambah()
  {
    $this->form_validation->set_rules('slide', 'Slide', 'required');
    
      var_dump($this->input->post('slide')); die;
    if ($this->form_validation->run()) {
      $data = [
        $this->id => time(),
        $this->slide => $this->_uploadImage()
      ];
      $this->db->insert('slide', $data);
      $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $this->load->view('admin/slide/tambah-slide');
  }

  public function edit($id)
  {
    
  }

  public function hapus($id)
  {
    
  }

  private function _uploadImage()
  {
      $config['upload_path']          = './upload/slide/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['file_name']            = $this->id;
      $config['overwrite']            = true;
      $config['max_size']             = 10024; // 1MB
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('slide')) {
          return $this->upload->data("file_name");
      }
      
      return "default.jpg";
  }

  private function _deleteImage($id)
  {
      $slide = $this->getById($id);
      if ($slide->image != "default.jpg") {
        $filename = explode(".", $slide->image)[0];
      return array_map('unlink', glob(FCPATH."upload/slide/$filename.*"));
      }
  }
}
