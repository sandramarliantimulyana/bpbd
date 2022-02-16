<?php
defined('BASEPATH') or exit('No direct script access allowed');

function manggil_view($file, $data)
{
    $ieu = get_instance();
    $data['file'] = $file;
    $ieu->load->view('template/index', $data);
}

// function notif($text, $tipe)
// {
//     $ieu = get_instance();
//     if ($tipe == true) {
//         $warna = 'success';
//     } else {
//         $warna = 'danger';
//     }
//     $ieu->session->set_flashdata('message', '<div class="alert alert-' . $warna . ' alert-dismissable"> 
//     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
//     ' . $text . '</div>');
// }
function data_post($data)
{
    $ini = get_instance();
    return $ini->input->post($data);
}
