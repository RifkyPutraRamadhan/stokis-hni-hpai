<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

      public function __construct()
      {
             parent::__construct();
             $this->load->library('form_validation');
             $this->load->library('session');
             if(!$this->session->userdata('username')) { 
                    redirect('auth');
          }
      }

      public function index() 
      {
             $data['title'] = 'Dashboard';
             $this->load->view('templates/header.php', $data);
             $this->load->view('dashboard/index.php');
             $this->load->view('templates/footer.php');
      }
}
?>