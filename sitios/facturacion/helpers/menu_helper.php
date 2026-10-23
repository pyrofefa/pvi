<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('menu')) {
    function menu() {
        $CI = & get_instance();
        if (logged()) {
            if ($CI->ion_auth->permiso(3)) {
                $CI->load->view("menu/cliente");
            // }elseif($CI->ion_auth->permiso(6) || $CI->ion_auth->permiso(1)){
            //     $CI->load->view("menu/admin");
            // }elseif($CI->ion_auth->permiso(10)){
            //     $CI->load->view('menu/estado');
            }else {
                $CI->load->view("menu/tecnico");
            }
        }
    }
}