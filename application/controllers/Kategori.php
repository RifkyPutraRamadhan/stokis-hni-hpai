<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_kategori');
        if(!$this->session->userdata('username')) {
          redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Kategori';

        $data['Kategori'] = $this->Model_kategori->getAllKategori();
        if( $this->input->post('keyword') ) {
            $data['Kategori'] = $this->Model_kategori->Carikategori();
        }
        $this->load->view('templates/header.php', $data);
        $this->load->view('kategori/index.php', $data);
        $this->load->view('templates/footer.php');

    }

    public function tambah()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

        if($this->form_validation->run() == false ) {
            $data['title'] = 'Tambah Kategori';

        $this->load->view('templates/header.php', $data);
        $this->load->view('kategori/tambah.php', $data);
        $this->load->view('templates/footer.php');
    } else {
        $this->Model_kategori->Tambahkategori();
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('kategori');
    }

    }

    public function ubah($id)
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $data['kategori'] = $this->Model_kategori->getKategoriById($id);

        if($this->form_validation->run() == false ) {
            $data['title'] = 'Ubah Kategori';

            $this->load->view('templates/header.php', $data);
            $this->load->view('kategori/ubah.php', $data);
            $this->load->view('templates/footer.php');
        } else {
            $this->Model_kategori->Ubahkategori();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Kategori');
        }
    }

    public function hapus($id)
    {
      $this->Model_kategori->Hapuskategori($id);
      $this->session->set_flashdata('flash', 'Dihapus');
      redirect('Kategori');
    }

    public function export_excel(){
        $data['title'] = 'Data Kategori';
        $data['kategori'] = $this->Model_kategori->getAllkategori();
        $this->load->view('kategori/export_excel.php', $data);
    }
  }
?>