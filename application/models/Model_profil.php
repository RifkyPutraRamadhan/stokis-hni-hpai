<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_profil extends CI_Model 
{
    public function getAllProfil()
    {
        return $this->db->get('user')->result_array();
    }

    public function getProfilById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function profil()
    {
        $id = $this->input->post('id', true);
        $email = $this->input->post('email', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/foto/';
            $config['file_name'] = 'user-' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $user_lama = $this->getProfilById($id);
                if ($user_lama['foto'] != 'default.jpg' && file_exists(FCPATH . 'assets/foto/' . $user_lama['foto'])) {
                    unlink(FCPATH . 'assets/foto/' . $user_lama['foto']);
                }

                $foto_baru = $this->upload->data('file_name');
                $this->db->set('foto', $foto_baru);
                $this->session->set_userdata('foto', $foto_baru);
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        }

        if (!empty($password)) {
            $this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
        }

        $this->db->set('email', $email);
        $this->db->set('username', $username);
        $this->db->where('id', $id);
        $this->db->update('user');

        $this->session->set_userdata('username', $username);
    }

    public function hapus_foto()
    {
        $id = $this->session->userdata('id');
        $user = $this->getProfilById($id);

        if ($user['foto'] != 'default.jpg' && file_exists(FCPATH . 'assets/foto/' . $user['foto'])) {
            unlink(FCPATH . 'assets/foto/' . $user['foto']);
        }

        $this->db->set('foto', 'default.jpg');
        $this->db->where('id', $id);
        $this->db->update('user');

        $this->session->set_userdata('foto', 'default.jpg');
    }
}