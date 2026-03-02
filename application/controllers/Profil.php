<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

      public function __construct()
      {
             parent::__construct();
             $this->load->library('form_validation');
             $this->load->library('session');
             $this->load->library('image_lib');
             $this->load->model('Model_profil');
             if(!$this->session->userdata('username')) { 
               redirect('auth');
          }
      }

      public function index() 
      {
              $this->form_validation->set_rules('foto', 'foto', 'trim');
              $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
              $this->form_validation->set_rules('username', 'username', 'trim|required');
              $this->form_validation->set_rules('password', 'password', 'trim|required');

              if($this->form_validation->run() == false ) {
                 $data['title'] = 'Profil Pengguna';
                 
                 $this->load->view('templates/header.php', $data);
                 $this->load->view('profil/index.php');
                 $this->load->view('templates/footer.php');
              } else {
                 $this->Model_profil->profil();
                 $old_image = $data['barang']['foto'];
                 unlink(FCPATH . 'assets/foto/' . $old_image);
                 redirect('profil');
              } 
      }
}
?>