<?php
class Model_barang extends CI_Model
{
    public function getAllBarang($keyword = null)
    {
        if ($keyword) {
            $this->db->like('kode', $keyword);
            $this->db->or_like('produk', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->or_like('dimensi_kualitas', $keyword);
            $this->db->or_like('berat_bersih', $keyword);
            $this->db->or_like('stok', $keyword);
            $this->db->or_like('harga', $keyword);
            $this->db->or_like('keterangan', $keyword);
            $this->db->or_like('tanggal_proses', $keyword);
        }

        return $query = $this->db->get('joinbarang')->result_array();
    }

    public function Tambahbarang()
    {
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/foto/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $foto = $this->upload->data('file_name');
            $data = [
                "foto" => $foto,
                "kode" => $this->input->post('kode', true),
                "produk" => $this->input->post('produk', true),
                "id_kategori" => $this->input->post('kategori', true),
                "dimensi_kualitas" => $this->input->post('dimensi_kualitas', true),
                "berat_bersih" => $this->input->post('berat_bersih', true),
                "stok" => $this->input->post('stok', true),
                "harga" => $this->input->post('harga', true),
                "keterangan" => $this->input->post('keterangan', true),
                "tanggal_proses" => $this->input->post('tanggal_proses', true)
            ];

            $this->db->insert('joinbarang', $data);

            $this->session->set_flashdata('flash', 'Ditambahkan!');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
        }
    }
}

    public function Ubahbarang()
    {
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/foto/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $foto = $this->upload->data('file_name');
                $this->db->set('foto', $foto);
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        }

        $id = $this->input->post('id', true);
        $kode = $this->input->post('kode', true);
        $produk = $this->input->post('produk', true);
        $id_kategori = $this->input->post('kategori', true);
        $dimensi_kualitas = $this->input->post('dimensi_kualitas', true);
        $berat_bersih = $this->input->post('berat_bersih', true);
        $stok = $this->input->post('stok', true);
        $harga = $this->input->post('harga', true);
        $keterangan = $this->input->post('keterangan', true);
        $tanggal_proses = $this->input->post('tanggal_proses', true);

        $this->db->set('kode', $kode);
        $this->db->set('produk', $produk);
        $this->db->set('id_kategori', $id_kategori);
        $this->db->set('dimensi_kualitas', $dimensi_kualitas);
        $this->db->set('berat_bersih', $berat_bersih);
        $this->db->set('stok', $stok);
        $this->db->set('harga', $harga);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('tanggal_proses', $tanggal_proses);

        $this->db->where('id', $id);
        $this->db->update('barang');
    }

    public function Hapusbarang($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');
    }

    public function getBarangById($id)
    {
        $joinbarang = "SELECT   a.id,
                                a.foto,
                                a.kode,
                                a.produk,
                                a.id_kategori,
                                b.kategori,
                                a.dimensi_kualitas,
                                a.berat_bersih,
                                a.stok,
                                a.harga,
                                a.keterangan,
                                a.tanggal_proses
                                FROM barang AS a
                                JOIN kategori AS b
                                ON a.id_kategori = b.id
                                WHERE a.id = $id";
       return $query = $this->db->query($joinbarang)->row_array();
    }

    public function Caribarang()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kode', $keyword);
        $this->db->or_like('produk', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('dimensi_kualitas', $keyword);
        $this->db->or_like('berat_bersih', $keyword);
        $this->db->or_like('stok', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);
        $this->db->or_like('tanggal_proses', $keyword);
        return $this->db->get('kategori')->result_array();
    }
}