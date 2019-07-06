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

    if (!empty($_FILES["slide"]["name"])) {
      
      $this->id = time();
      $this->slide = $this->_uploadImage();

      $this->db->insert('slide', $this);
      $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $this->load->view('admin/slide/tambah-slide');
  }

  public function edit($id)
  {

    if (!empty($_FILES["slide"]["name"])) {
      
      $this->id = $this->input->post('id');
      $this->slide = $this->_uploadImage();

      $this->db->update('slide', $this, ['id' => $id]);
      $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $data["slide"] = $this->db->get_where('slide', ['id' => $id])->row();
    if (!$data["slide"]) show_404();
        
    $this->load->view("admin/slide/edit-slide", $data);
  }

  public function hapus($id)
  {
    $this->delete($id);
    redirect('admin/slide');
  }

  private function delete($id){
    $this->_deleteImage($id);
    return $this->db->delete('slide', array("id" => $id));
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
      $slide = $this->db->get_where('slide', ['id' => $id])->row();
      if ($slide->slide != "default.jpg") {
        $filename = explode(".", $slide->slide)[0];
      return array_map('unlink', glob(FCPATH."upload/slide/$filename.*"));
      }
  }
}
