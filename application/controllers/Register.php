<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
        $this->load->model('Model_register');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]', [
            'is_unique' => 'Username ini sudah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('foto', 'Foto', 'trim|required');
        $this->form_validation->set_rules('id_role', 'ID Role', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/login_header');
            $this->load->view('register/index');
            $this->load->view('templates/login_footer');
        } else {
            $this->Model_register->register();
            $this->session->set_flashdata('message', 'Berhasil Dibuat! Silakan Login.');
            redirect('auth'); 
        }
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/login_header');
            $this->load->view('register/forgot_password');
            $this->load->view('templates/login_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row();
    
            if ($user) {
                $new_pw_plain = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 8);
                $data = ['password' => password_hash($new_pw_plain, PASSWORD_DEFAULT)];
                $this->db->where('email', $email);
                $this->db->update('user', $data);
    
                $this->session->set_flashdata('success_msg', 'Password berhasil direset.');
                $this->session->set_flashdata('success_pw', 'Password Baru: ' . $new_pw_plain);
                redirect('register/forgot_password');
            } else {
                $this->session->set_flashdata('error_msg', 'E-mail tidak terdaftar.');
                redirect('register/forgot_password');
            }
        }
    }
}