<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{


    public function index()
    {
        $this->form_validation->set_rules(
            'username',
            'username',
            'trim|required',
            ['required' => "Harus diisi"]
        );
        $this->form_validation->set_rules(
            'password',
            'password',
            'trim|required',
            ['required' => "Harus diisi"]
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $username = data_post('username');
            $password = data_post('password');

            $cek_user = $this->db->get_where('user', ['username' => $username, 'password' => md5($password)]);
            if ($cek_user->num_rows() > 0) {
                $user = $cek_user->row_array();

                $_SESSION['username'] = $user['username'];
                // $_SESSION['password'] = $user['password'];

                notif('Selamat Anda Berhasil Login', true);
                redirect(base_url('dashboard'));
            } else {
                notif('Username atau Password Salah!', false);
                redirect(base_url('auth'));
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        // $this->session->unset_userdata('username');
        notif('Berhasil Logout!', true);
        redirect(base_url('auth'));
    }
}
