<?php 
class Model_kategori extends CI_Model
{
          public function getAllKategori()
          {
          return $query = $this->db->get('kategori')->result_array();
          }

          public function Tambahkategori()
          {

                    $data = [ 
                        "kategori" => $this->input->post('kategori', true)
                     ];

                    $this->db->insert('kategori', $data);
          }

          public function Ubahkategori()
          {
                    $data = [
                        "kategori" => $this->input->post('kategori', true)
                    ];

                    $this->db->where('id', $this->input->post('id')); 
                    $this->db->update('kategori', $data);
          }

          public function Hapuskategori($id)
          {
                    $this->db->where('id', $id);
                    $this->db->delete('kategori');
          }

          public function getkategoriById($id)
          {
                    return $this->db->get_where('kategori', ['id' => $id])->row_array();
          }
          public function Carikategori()
          {
                    $keyword = $this->input->post('keyword', true); 
                    $this->db->like('kategori', $keyword); 
                    return $this->db->get('kategori')->result_array();
          }
}

?>