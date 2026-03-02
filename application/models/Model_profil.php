<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_profil extends CI_Model 
{

	public function getAllProfil()
    {
    return $query = $this->db->get('user')->result_array();
    }

	public function profil()
	{
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['image_library'] = 'gd2';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '500';
            $config['max_height'] = '500';
            $config['upload_path'] = './assets/foto/';

            $this->load->library('upload', $config);
            $this->image_lib->initialize($config);

            if ($this->upload->do_upload('image')) {
                $foto = $this->upload->data('file_name');
                $this->db->set('foto', $foto);
                $this->session->set_flashdata('flash', 'Perubahan telah tersimpan, Silahkan login kembali : ');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        }

        $id = $this->input->post('id', true);
        $foto = $this->input->post('foto', true);
        $email = $this->input->post('email', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $this->db->set('email', $email);
        $this->db->set('username', $username);
        $this->db->set('password', $password);

        $this->db->where('id', $id);
        $this->db->update('user');
	}

    public function getProfilById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
}
?>