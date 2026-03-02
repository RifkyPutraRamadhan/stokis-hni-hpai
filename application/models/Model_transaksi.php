<?php
class Model_transaksi extends CI_Model
{
    public function getAllTransaksi($keyword = null)
    {
        $this->db->select('a.*, b.kategori');
        $this->db->from('transaksi a');
        $this->db->join('kategori b', 'a.id_kategori = b.id');

        if ($keyword) {
            $this->db->group_start();
            $this->db->like('a.id_member', $keyword);
            $this->db->or_like('a.nama', $keyword);
            $this->db->or_like('a.produk', $keyword);
            $this->db->or_like('b.kategori', $keyword);
            $this->db->group_end();
        }

        if ($this->session->userdata('id_role') != 1) {
            $this->db->where('a.email', $this->session->userdata('email'));
        }

        return $this->db->get()->result_array();
    }

    public function Tambahtransaksi($id_barang)
    {
        $kuantitas = $this->input->post('kuantitas', true);
        $barang = $this->db->get_where('barang', ['id' => $id_barang])->row_array();

        if (!$barang || $barang['stok'] < $kuantitas) {
            $this->session->set_flashdata('error', 'Stok tidak mencukupi atau barang tidak ditemukan.');
            return false; 
        }

        $data = [
            "foto"              => $barang['foto'],
            "id_member"         => $this->input->post('id_member', true),
            "email"             => $this->input->post('email', true),
            "no_hp"             => $this->input->post('no_hp', true),
            "nama"              => $this->input->post('nama', true),
            "alamat"            => $this->input->post('alamat', true),
            "id_kategori"       => $barang['id_kategori'],
            "produk"            => $barang['produk'],
            "kuantitas"         => $kuantitas,
            "status"            => 1,
            "harga"             => $barang['harga'],
            "total"             => $barang['harga'] * $kuantitas,
            "keterangan"        => $this->input->post('keterangan', true),
            "tanggal_transaksi" => date('Y-m-d')
        ];

        $this->db->insert('transaksi', $data);

        $sisa_stok = $barang['stok'] - $kuantitas;
        $this->db->update('barang', ['stok' => $sisa_stok], ['id' => $id_barang]);

        $this->session->set_flashdata('flash', 'Ditambahkan!');
        return true;
    }

    public function Ubahtransaksi()
    {
        $id = $this->input->post('id', true);
        $data = [
            "id_member"         => $this->input->post('id_member', true),
            "email"             => $this->input->post('email', true),
            "no_hp"             => $this->input->post('no_hp', true),
            "nama"              => $this->input->post('nama', true),
            "alamat"            => $this->input->post('alamat', true),
            "status"            => $this->input->post('status', true),
            "keterangan"        => $this->input->post('keterangan', true)
        ];

        $this->db->where('id', $id);
        $this->db->update('transaksi', $data);
    }

    public function Hapustransaksi($id)
    {
        $this->db->delete('transaksi', ['id' => $id]);
    }

    public function getTransaksiById($id)
    {
        $this->db->select('a.*, b.kategori');
        $this->db->from('transaksi a');
        $this->db->join('kategori b', 'a.id_kategori = b.id');
        $this->db->where('a.id', $id);
        return $this->db->get()->row_array();
    }
}