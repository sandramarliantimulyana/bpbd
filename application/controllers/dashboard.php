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
    // Dashboard
    public function index()
    {
        $data['judul'] = "Dashboard";
        manggil_view('dashboard/index', $data);
    }
    // Profil
    public function profil()
    {
        $data['judul'] = "Profil";
        $where = ['id_user' => $_SESSION['id_user']];
        $data['tampil'] = $this->db->get_where('user', $where)->row_array();
        manggil_view('dashboard/profil', $data);
    }
    public function edit_profil()
    {

        $where = ['id_user' => $_SESSION['id_user']];
        $data['col'] = $this->db->get_where('user', $where)->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('curent_pass', 'Curent Password', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'trim|required', ['required' => "Harus diisi"]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Edit";
            manggil_view('dashboard/e_profil', $data);
        } else {
            $kolom = [
                "nama" => data_post('nama'),
                "jabatan" => data_post('jabatan'),
                "username" => data_post('username'),
                "password" => md5(data_post('password'))
            ];

            $this->mydb->update_dt($where, $kolom, 'user');
            notif('Berhasil memperbarui profil', true);
            redirect(base_url('dashboard/profil'));
        }
    }
    // Data Barang
    public function barang()
    {
        $data['judul'] = "Data Barang";
        $this->db->group_by('nama_barang');
        $data['tampil'] = $this->db->get('barang_masuk')->result_array();
        manggil_view('dashboard/barang', $data);
    }
    // Stok Barang
    public function stok()
    {
        $data['judul'] = "Stok Barang";
        $this->db->select('*, sum(stok) as jml')->group_by('nama_barang');
        $data['tampil'] = $this->db->get('barang_masuk')->result_array();
        manggil_view('dashboard/stok', $data);
    }
    // Exp Barang
    public function exp()
    {
        $data['judul'] = "Expired";
        $data['tampil'] = $this->Model_barang->data_join();
        manggil_view('dashboard/exp', $data);
    }
    public function hapus_exp($id)
    {
        $this->mydb->del(['id_masuk' => $id], 'barang_masuk');
        notif('Berhasil menghapus data barang expired', true);
        redirect(base_url('dashboard/exp'));
    }
    // Barang Masuk
    public function masuk()
    {
        $data['judul'] = "Barang Masuk";
        $data['join_barangmasuk_kategori'] = $this->Model_barang->data_join();
        // $this->mydb->input_dt($data, 'barang_masuk');

        manggil_view('dashboard/masuk', $data);
        // $this->load->view('v_mahasiswa', $data);
        // $data['tampil'] = $this->db->get('barang_masuk')->result_array();
    }
    public function i_masuk()
    {

        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('jml_barang', 'Jumlah Barang', 'trim|required', ['required' => "Harus diisi"]);
        // $this->form_validation->set_rules('stok', 'stok', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('tgl_exp', 'Tanggal Expired', 'trim|required');
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
                "stok" => data_post('jml_barang'),
                "satuan" => data_post('satuan'),
                "tgl_exp" => data_post('tgl_exp'),
                "id_sumber" => data_post('sumber'),
                "id_kategori" => data_post('kategori')
            ];

            $this->mydb->input_dt($kolom, 'barang_masuk');
            notif('Berhasil menambahkan barang masuk', true);
            redirect(base_url('dashboard/masuk'));
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
        // $where = ['id_user' => $_SESSION['id_user']];
        // $data['col'] = $this->db->get_where('user', $where)->row_array();
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
    // Barang Keluar
    public function keluar()
    {
        $data['judul'] = "Barang Keluar";
        $data['tampil'] = $this->Model_barang->keluar();
        manggil_view('dashboard/keluar', $data);
    }
    public function i_keluar()
    {
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('tujuan', 'Tujuan / Posko', 'trim|required', ['required' => "Harus diisi"]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Barang Keluar";
            $data['tampil'] = $this->Model_barang->data_join();
            manggil_view('dashboard/i_keluar', $data);
        } else {
            $id_barang = data_post('id_masuk');
            $qty = data_post('qty');
            $jml = count($id_barang);
            for ($i = 0; $i < $jml; $i++) {
                //mencari data barang masuk
                $barang = $this->db->get_where('barang_masuk', ['id_masuk' => $id_barang[$i]])->row_array();
                //cek qty di isi apa tdk
                if ($qty[$i] != null) {
                    //update kolom stok di tabel barang masuk
                    $stok = $barang['stok'] - $qty[$i];
                    $where = ['id_masuk' => $barang['id_masuk']];
                    $set = ['stok' => $stok];
                    $this->mydb->update_dt($where, $set, 'barang_masuk');

                    //input barang_keluar
                    $kolom = [
                        "id_masuk" => $barang['id_masuk'],
                        "tgl_keluar" => data_post('tgl_keluar'),
                        "jml_barang_keluar" => $qty[$i],
                        "tujuan" => data_post('tujuan'),
                    ];
                    $this->mydb->input_dt($kolom, 'barang_keluar');
                }
            }
            notif('Berhasil menambahkan barang keluar', true);
            redirect(base_url('dashboard/keluar'));
        }
    }
    public function edit_keluar($id)
    {

        $where = ['id_keluar' => $id];
        $data['col'] = $this->db->get_where('barang_keluar', $where)->row_array();
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'trim|required', ['required' => "Harus diisi"]);
        $this->form_validation->set_rules('tujuan', 'Posko / Tujuan', 'trim|required', ['required' => "Harus diisi"]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Edit";
            manggil_view('dashboard/e_keluar', $data);
        } else {
            $kolom = [
                "tgl_keluar" => data_post('tgl_keluar'),
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
        //mencari data barang masuk
        //$barang = $this->db->get_where('barang_masuk', ['id_masuk' => $id_barang[$i]])->row_array();
        //update kolom stok di tabel barang masuk
        //$stok = $barang['stok'] - $qty[$i];
        //$where = ['id_masuk' => $barang['id_masuk']];
        //$set = ['stok' => $stok];
        //$this->mydb->update_dt($where, $set, 'barang_masuk');
        $this->mydb->del(['id_keluar' => $id], 'barang_keluar');
        $this->Model_barang->hapus_keluar();
        notif('Berhasil menghapus data barang keluar', true);
        redirect(base_url('dashboard/keluar'));
    }
    // Sumber Barang
    public function sumber()
    {
        $data['judul'] = "Sumber Dana";
        $data['tampil'] = $this->db->get('sumber')->result_array();
        manggil_view('dashboard/sumber', $data);
    }
    public function i_sumber()
    {

        $this->form_validation->set_rules('nama_sumber', 'Sumber', 'trim|required', ['required' => "Harus diisi"]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Tambah Sumber";
            manggil_view('dashboard/i_sumber', $data);
        } else {
            $data['judul'] = "Tambah Sumber";
            manggil_view('dashboard/i_sumber', $data);
            $kolom = [
                "nama_sumber" => data_post('nama_sumber'),
            ];

            $this->mydb->input_dt($kolom, 'sumber');
            notif('Berhasil menambahkan sumber dana', true);
            redirect(base_url('dashboard/sumber'));
        }
    }
    public function hapus_sumber($id)
    {
        $this->mydb->del(['id_sumber' => $id], 'sumber');
        notif('Berhasil menghapus data sumber dana', true);
        redirect(base_url('dashboard/sumber'));
    }
    public function edit_sumber($id)
    {

        $where = ['id_sumber' => $id];
        $data['col'] = $this->db->get_where('sumber', $where)->row_array();
        $this->form_validation->set_rules('nama_sumber', 'Sumber Dana', 'trim|required', ['required' => "Harus diisi"]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Edit";
            manggil_view('dashboard/e_sumber', $data);
        } else {
            $kolom = [
                "nama_sumber" => data_post('nama_sumber'),
            ];

            $this->mydb->update_dt($where, $kolom, 'sumber');
            notif('Berhasil memperbarui sumber dana', true);
            redirect(base_url('dashboard/sumber'));
        }
    }
    // Kategori Barang
    public function kategori()
    {
        $data['judul'] = "Kategori Barang";
        $data['tampil'] = $this->db->get('kategori')->result_array();
        manggil_view('dashboard/kategori', $data);
    }
    public function i_kategori()
    {

        $this->form_validation->set_rules('nama_kategori', 'kategori', 'trim|required', ['required' => "Harus diisi"]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Tambah Kategori";
            manggil_view('dashboard/i_kategori', $data);
        } else {
            $data['judul'] = "Tambah Kategori";
            manggil_view('dashboard/i_kategori', $data);
            $kolom = [
                "nama_kategori" => data_post('nama_kategori'),
            ];

            $this->mydb->input_dt($kolom, 'kategori');
            notif('Berhasil menambahkan kategori barang', true);
            redirect(base_url('dashboard/kategori'));
        }
    }
    public function hapus_kategori($id)
    {
        $this->mydb->del(['id_kategori' => $id], 'kategori');
        notif('Berhasil menghapus data kategori barang', true);
        redirect(base_url('dashboard/kategori'));
    }
    public function edit_kategori($id)
    {

        $where = ['id_kategori' => $id];
        $data['col'] = $this->db->get_where('kategori', $where)->row_array();
        $this->form_validation->set_rules('nama_kategori', 'Kategori Barang', 'trim|required', ['required' => "Harus diisi"]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Edit";
            manggil_view('dashboard/e_kategori', $data);
        } else {
            $kolom = [
                "nama_kategori" => data_post('nama_kategori'),
            ];

            $this->mydb->update_dt($where, $kolom, 'kategori');
            notif('Berhasil memperbarui kategori barang', true);
            redirect(base_url('dashboard/kategori'));
        }
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
    // public function pdf()
    // {
    //     $this->db->get('barang_masuk')->result();
    //     $this->load->library('pdf');
    //     $this->pdf->setPaper('A4', 'landscape');
    //     $this->pdf->filename = "Laporan Barang Masuk BPBD Majalengka.pdf";
    //     $this->pdf->load_view('dashboard/print', $data);
    // }
    //     function cetak_barang()
    //   {
    //     $data['dataBarang'] = $this->Barang_model->get_all();
    //     $this->load->library('pdf');
    //     $this->pdf->setPaper('A4','potrait');
    //     $this->pdf->filename = "barang";
    //     $this->pdf->load_view('cetak/barang',$data);
    //   }
    public function print_masuk()
    {
        $this->load->model('Model_barang');
        $data['barang_masuk'] = $this->Model_barang->getData();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-data-siswa.pdf";
        $this->pdf->load_view('dashboard/print', $data);
    }
}

    // public function i_barang()
    // {
    //     $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required', ['required' => "Harus diisi"]);
    //     $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required', ['required' => "Harus diisi"]);
    //     $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', ['required' => "Harus diisi"]);
    //     if ($this->form_validation->run() == false) {
    //         $data['judul'] = "Data Barang";
    //         manggil_view('dashboard/i_barang', $data);
    //     } else {
    //         $data['judul'] = "Data Barang";
    //         manggil_view('dashboard/i_barang', $data);
    //         $kolom = [
    //             "kode_barang" => data_post('kode_barang'),
    //             "nama_barang" => data_post('nama_barang'),
    //             "satuan" => data_post('satuan')
    //         ];

    //         $this->mydb->input_dt($kolom, 'barang_masuk');
    //         notif('Berhasil menambah data barang', true);
    //         redirect(base_url('dashboard/barang'));
    //     }
    // }
    // public function hapus_barang($id)
    // {
    //     $this->mydb->del(['id_masuk' => $id], 'barang_masuk');
    //     notif('Berhasil menghapus data barang', true);
    //     redirect(base_url('dashboard/barang'));
    // }
    // public function edit_barang($id)
    // {

    //     $where = ['id_masuk' => $id];
    //     $data['col'] = $this->db->get_where('barang_masuk', $where)->row_array();
    //     $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required', ['required' => "Harus diisi"]);
    //     $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required', ['required' => "Harus diisi"]);
    //     $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', ['required' => "Harus diisi"]);
    //     if ($this->form_validation->run() == false) {
    //         $data['judul'] = "Edit";
    //         manggil_view('dashboard/e_barang', $data);
    //     } else {
    //         $kolom = [
    //             "kode_barang" => data_post('kode_barang'),
    //             "nama_barang" => data_post('nama_barang'),
    //             "satuan" => data_post('satuan')
    //         ];

    //         $this->mydb->update_dt($where, $kolom, 'barang_masuk');
    //         notif('Berhasil memperbarui data barang', true);
    //         redirect(base_url('dashboard/barang'));
    //     }
    // }
