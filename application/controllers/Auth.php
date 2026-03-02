<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct()
  {
      parent:: __construct();
      $this->load->library('form_validation');
  }

  public function index()
  {
      $this->form_validation->set_rules('username', 'username', 'trim|required');
      $this->form_validation->set_rules('password', 'password', 'trim|required');

      if($this->form_validation->run() == false) {
          $this->load->view('templates/login_header.php');
          $this->load->view('auth/index');
          $this->load->view('templates/login_footer.php');
      } else {
          $this->_login();
      }
  }

  private function _login()
  {
      $user = $this->input->post('username', true);
      $pass = $this->input->post('password', true);

      $ambil_data = $this->db->get_where('user', ['username' =>$user])->row_array();

      if($ambil_data) {
          if($pass == $ambil_data['password']) {
            if($ambil_data['id_role'] == 1) {
                $data = [
                    'id' => $ambil_data['id'],
                    'foto' => $ambil_data['foto'],
                    'email' => $ambil_data['email'],
                    'username' => $ambil_data['username'],
                    'password' => $ambil_data['password'],
                    'id_role' => $ambil_data['id_role']
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else if($ambil_data['id_role'] == 2) {
                $data = [
                    'id' => $ambil_data['id'],
                    'foto' => $ambil_data['foto'],
                    'email' => $ambil_data['email'],
                    'username' => $ambil_data['username'],
                    'password' => $ambil_data['password'],
                    'id_role' => $ambil_data['id_role']
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            }
              
          } else {
              $this->session->set_flashdata('message', 'password salah');
              redirect('auth');
          }
      } else {
          $this->session->set_flashdata('message', 'username salah');
          redirect('auth');
      }
  }

  public function logout()
  {
      $this->session->unset_userdata('username');
      $this->session->set_flashdata('message', 'Akun anda telah berhasil Keluar!');
      redirect('auth');
  }
}
?>