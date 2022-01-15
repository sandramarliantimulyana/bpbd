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
        date_default_timezone_set('Asia/Bangkok');
        $tgl = date('Y-m-d');
        $this->db->from('barang_masuk');
        $this->db->join('kategori', 'kategori.id_kategori=barang_masuk.id_kategori');
        $this->db->join('sumber', 'sumber.id_sumber=barang_masuk.id_sumber');
        return $this->db->get()->result_array();
    }

    //join table barang_masuk with barang_keluar
    public function join_barangmasuk_barangkeluar()
    {
        $tgl = date_default_timezone_set('Asia/Bangkok');
        $this->db->from('barang_masuk');
        $this->db->join('barang_keluar', 'barang_masuk.id_barang_masuk=barang_keluar.id_barang_masuk');
        $this->db->join('sumber', 'sumber.id_sumber=barang_masuk.id_sumber');
        $this->db->where('tgl_exp >=' . $tgl);

        return $this->db->get()->result_array();
    }
    public function keluar()
    {
        $this->db->from('barang_keluar');
        $this->db->join();
    }
}
