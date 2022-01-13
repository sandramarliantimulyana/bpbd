<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_barang');

        if (!$this->session->userdata('username')) {
            notif('Login Terlebih Dahulu!', false);
            redirect(base_url("auth"));
        }
    }
    public function index()
    {
        $data['judul'] = "Dashboard";
        manggil_view('dashboard/index', $data);
    }
    // public function daftar()
    // {
    //     $data['judul'] = "Daftar";
    //     manggil_view('dashboard/daftar', $data);
    // }
    public function barang()
    {
        $data['judul'] = "Data Barang";
        $this->db->group_by('nama_barang');
        $data['tampil'] = $this->db->get('barang_masuk')->result_array();
        manggil_view('dashboard/barang', $data);
    }
    public function masuk()
    {
        $data['judul'] = "Barang Masuk";
        $data['join_barangmasuk_kategori'] = $this->Model_barang->data_join();
        // $this->mydb->input_dt($data, 'barang_masuk');

        manggil_view('dashboard/masuk', $data);
        // $this->load->view('v_mahasiswa', $data);
        // $data['tampil'] = $this->db->get('barang_masuk')->result_array();
    }
    public function keluar()
    {
        $data['judul'] = "Barang Keluar";
        $data['tampil'] = $this->db->get('barang_keluar')->result_array();
        manggil_view('dashboard/keluar', $data);
    }
    public function stok()
    {
        $data['judul'] = "Stok Barang";
        $this->db->select('*, sum(jml_barang) as jml')->group_by('nama_barang');
        $data['tampil'] = $this->db->get('barang_masuk')->result_array();
        manggil_view('dashboard/stok', $data);
    }
    public function exp()
    {
        $data['judul'] = "Expired";
        $data['tampil'] = $this->Model_barang->data_join();
        manggil_view('dashboard/exp', $data);
    }
    public function i_masuk()
    {

        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('jml_barang', 'Jumlah Barang', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('tgl_exp', 'Tanggal Expired', 'trim');
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Tambah Barang";
            manggil_view('dashboard/i_masuk', $data);
        } else {
            $data['judul'] = "Tambah Barang";
            manggil_view('dashboard/i_masuk', $data);
            $kolom = [
                "tgl_masuk" => data_post('tgl_masuk'),
                "nama_barang" => data_post('nama_barang'),
                "jml_barang" => data_post('jml_barang'),
                "satuan" => data_post('satuan'),
                "tgl_exp" => data_post('tgl_exp'),
                "id_sumber" => data_post('sumber'),
                "id_kategori" => data_post('kategori')
            ];

            $this->mydb->input_dt($kolom, 'barang_masuk');
            notif('Berhasil memperbarui barang masuk', true);
            redirect(base_url('dashboard/masuk'));
        }
    }
    public function i_keluar()
    {
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('jml_barang', 'Jumlah Barang', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('tujuan', 'Tujuan / Posko', 'trim|required', ['required' => "Harus diisi"]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Barang Keluar";
            manggil_view('dashboard/i_keluar', $data);
        } else {
            $data['judul'] = "Barang Keluar";
            manggil_view('dashboard/i_keluar', $data);
            $kolom = [
                "tgl_keluar" => data_post('tgl_keluar'),
                "nama_barang" => data_post('nama_barang'),
                "jml_barang" => data_post('jml_barang'),
                "satuan" => data_post('satuan'),
                "tujuan" => data_post('tujuan'),
            ];

            $this->mydb->input_dt($kolom, 'barang_keluar');
            notif('Berhasil memperbarui barang keluar', true);
            redirect(base_url('dashboard/keluar'));
        }
    }
    public function hapus_masuk($id)
    {
        $this->mydb->del(['id_masuk' => $id], 'barang_masuk');
        notif('Berhasil menghapus data barang masuk', true);
        redirect(base_url('dashboard/masuk'));
    }
    public function edit_masuk($id)
    {

        $where = ['id_masuk' => $id];
        $data['col'] = $this->db->get_where('barang_masuk', $where)->row_array();
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('jml_barang', 'Jumlah Barang', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('tgl_exp', 'Tanggal Expired', 'trim|required', ['required' => "Harus diisi"]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Edit";
            manggil_view('dashboard/e_masuk', $data);
        } else {
            $kolom = [
                "tgl_masuk" => data_post('tgl_masuk'),
                "nama_barang" => data_post('nama_barang'),
                "jml_barang" => data_post('jml_barang'),
                "satuan" => data_post('satuan'),
                "tgl_exp" => data_post('tgl_exp'),
                "id_sumber" => data_post('sumber'),
                "id_kategori" => data_post('kategori')
            ];

            $this->mydb->update_dt($where, $kolom, 'barang_masuk');
            notif('Berhasil memperbarui barang masuk', true);
            redirect(base_url('dashboard/masuk'));
        }
    }
    public function edit_keluar($id)
    {

        $where = ['id_keluar' => $id];
        $data['col'] = $this->db->get_where('barang_keluar', $where)->row_array();
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('jml_barang', 'Jumlah Barang', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('tujuan', 'Posko / Tujuan', 'trim|required', ['required' => "Harus diisi"]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Edit";
            manggil_view('dashboard/e_keluar', $data);
        } else {
            $kolom = [
                "tgl_masuk" => data_post('tgl_masuk'),
                "nama_barang" => data_post('nama_barang'),
                "jml_barang" => data_post('jml_barang'),
                "satuan" => data_post('satuan'),
                "tgl_exp" => data_post('tgl_exp'),
                "id_sumber" => data_post('sumber'),
                "id_kategori" => data_post('kategori')
            ];

            $this->mydb->update_dt($where, $kolom, 'barang_keluar');
            notif('Berhasil memperbarui barang keluar', true);
            redirect(base_url('dashboard/keluar'));
        }
    }

    public function hapus_keluar($id)
    {
        $this->mydb->del(['id_keluar' => $id], 'barang_keluar');
        notif('Berhasil menghapus data barang keluar', true);
        redirect(base_url('dashboard/keluar'));
    }
    public function hasil()
    {

        $this->db->select_sum('jml_barang');
        $this->db->from('barang_masuk');
        $data['sum_masuk'] = $this->db->get()->row_array();
        //make sum from table barang_keluar
        $this->db->select_sum('jml_barang');
        $this->db->from('barang_keluar');
        $data['sum_keluar'] = $this->db->get()->row_array();


        $data['sum_hasil'] = $data['sum_masuk']['jml_barang'] - $data['sum_keluar']['jml_barang'];
        $data['judul'] = "Hasil";
        manggil_view('dashboard/hasil', $data);
    }
}
