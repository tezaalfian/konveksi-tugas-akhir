<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medsos extends CI_Controller {

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
    $data['medsos'] = $this->db->get('medsos')->result();
    $this->load->view('admin/medsos/tabel-data', $data);
	}

  public function tambah()
  {
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run()) {
      
      $data = [
        'nama' => $this->input->post('nama'),
        'kode' => $this->input->post('icon'),
        'link' => $this->input->post('link')
      ];

      $this->db->insert('medsos', $data);
      $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $this->load->view('admin/medsos/tambah-medsos');
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run()) {
      
      $data = [
        'nama' => $this->input->post('nama'),
        'kode' => $this->input->post('icon'),
        'link' => $this->input->post('link')
      ];

      $this->db->update('medsos', $data, ['id' => $id]);
      $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $data["medsos"] = $this->db->get_where('medsos', ['id' => $id])->row();
    if (!$data["medsos"]) show_404();
        
    $this->load->view("admin/medsos/edit-medsos", $data);
  }

  public function hapus($id)
  {
    $this->delete($id);
    redirect('admin/medsos');
  }

  private function delete($id){
    return $this->db->delete('medsos', array("id" => $id));
  }

}
