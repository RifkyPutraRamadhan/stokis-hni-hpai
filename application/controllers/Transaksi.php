<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['Model_transaksi', 'Model_kategori', 'Model_barang']);
        
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Transaksi';
        $keyword = $this->input->post('keyword', true);
        $data['transaksi'] = $this->Model_transaksi->getAllTransaksi($keyword);
        
        $this->load->view('templates/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($id) {
        $data['barang'] = $this->Model_barang->getBarangById($id);
        $data['kategori'] = $this->Model_kategori->getAllKategori();
        $data['title'] = 'Tambah Transaksi';

        $this->form_validation->set_rules('id_member', 'ID Member', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kuantitas', 'Kuantitas', 'required|numeric|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('transaksi/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_transaksi->Tambahtransaksi($id);
            $this->session->set_flashdata('flash', 'Berhasil Ditambahkan');
            redirect('transaksi');
        }
    }

    public function ubah($id) {
        $data['transaksi'] = $this->Model_transaksi->getTransaksiById($id);
        $data['title'] = 'Ubah Status Transaksi';

        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('transaksi/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_transaksi->Ubahtransaksi();
            $this->session->set_flashdata('flash', 'Berhasil Diubah');
            redirect('transaksi');
        }
    }

    public function detail($id) {
        $data['title'] = 'Detail Transaksi';
        $data['transaksi'] = $this->Model_transaksi->getTransaksiById($id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('transaksi/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id) {
        $this->Model_transaksi->Hapustransaksi($id);
        $this->session->set_flashdata('flash', 'Berhasil Dihapus');
        redirect('transaksi');
    }
}