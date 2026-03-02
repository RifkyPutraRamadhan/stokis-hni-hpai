<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_barang');
        $this->load->model('Model_kategori');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Barang';
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }

        $data['barang'] = $this->Model_barang->getAllBarang($data['keyword']);

        $this->load->view('templates/header.php', $data);
        $this->load->view('barang/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function tambah()
    {
        $data['barang'] = $this->Model_barang->getAllBarang();
        $data['kategori'] = $this->Model_kategori->getAllKategori();
        $this->form_validation->set_rules('kode', 'Kode', 'trim|required|numeric');
        $this->form_validation->set_rules('produk', 'Produk', 'trim|required'); 
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');        
        $this->form_validation->set_rules('dimensi_kualitas', 'Dimensi_kualitas', 'trim|required');
        $this->form_validation->set_rules('berat_bersih', 'Berat_bersih', 'trim|required');        
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required|numeric');        
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('tanggal_proses', 'Tanggal_proses', 'trim|required|date');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Barang';

            $this->load->view('templates/header.php', $data);
            $this->load->view('barang/tambah.php', $data);
            $this->load->view('templates/footer.php');
        } else {
            $this->Model_barang->Tambahbarang();
            redirect('barang');
        }          
    }

    public function ubah($id)
    {
        $data['barang'] = $this->Model_barang->getBarangById($id);
        $data['kategori'] = $this->Model_kategori->getAllKategori();
        $this->form_validation->set_rules('kode', 'Kode', 'trim|required|numeric');
        $this->form_validation->set_rules('produk', 'Produk', 'trim|required'); 
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');        
        $this->form_validation->set_rules('dimensi_kualitas', 'Dimensi_kualitas', 'trim|required');
        $this->form_validation->set_rules('berat_bersih', 'Berat_bersih', 'trim|required');        
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');        
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('tanggal_proses', 'Tanggal_proses', 'trim|required|date'); 
        

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Barang';

            $this->load->view('templates/header.php', $data);
            $this->load->view('barang/ubah.php', $data);
            $this->load->view('templates/footer.php');
        } else {
            $this->Model_barang->Ubahbarang();
            $old_image = $data['barang']['foto'];
            unlink(FCPATH . 'assets/foto/' . $old_image);
            $this->session->set_flashdata('flash', 'Diubahkan');
            redirect('barang');
        }
    }

    public function detail($id)
    {
        $data['barang'] = $this->Model_barang->getBarangById($id);

        $data['title'] = 'Detail Barang';
        $this->load->view('templates/header.php', $data);
        $this->load->view('barang/detail.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function hapus($id)
    {
        $data['barang'] = $this->Model_barang->getBarangById($id);
        $old_image = $data['barang']['foto'];
        unlink(FCPATH . 'assets/foto/' . $old_image);
        $this->Model_barang->Hapusbarang($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('barang');
    }

    public function export_excel(){
        $data['title'] = 'Data Barang';
        $data['barang'] = $this->Model_barang->getAllBarang();
        $this->load->view('barang/export_excel.php', $data);
    }
}
?>