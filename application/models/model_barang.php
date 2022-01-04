<?php
class Model_barang extends CI_Model
{

    public function sumber()
    {
        $query = $this->db->get_where('sumber', ['id_sumber'])->result_array();
        return $query;
    }

    public function data_join()
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('kategori', 'kategori.id_kategori=barang_masuk.id_kategori');
        $this->db->join('sumber', 'sumber.id_sumber=barang_masuk.id_sumber');
        return $this->db->get()->result_array();
    }

    //join table barang_masuk with barang_keluar
    public function join_barangmasuk_barangkeluar()
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('barang_keluar', 'barang_masuk.id_barang_masuk=barang_keluar.id_barang_masuk');
        return $this->db->get()->result_array();
    }
}