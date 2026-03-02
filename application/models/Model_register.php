<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_register extends CI_Model 
{
    public function getAllRegister()
    {
        return $this->db->get('user')->result_array();
    }

    public function register()
    {
        $password_input = $this->input->post('password');
        $password_hashed = password_hash($password_input, PASSWORD_DEFAULT);

        $data = [ 
            "foto"     => $this->input->post('foto', true),
            "email"    => htmlspecialchars($this->input->post('email', true)),
            "username" => htmlspecialchars($this->input->post('username', true)),
            "password" => $password_hashed,
            "id_role"  => $this->input->post('id_role', true)
        ];

        return $this->db->insert('user', $data);
    }
}