<?php

class LanguageLoader {

    function initialize() {
        $ci = & get_instance();
        $ci->load->helper('language');
        $ci->load->library('user_agent');
        $site_lang = $ci->session->userdata('site_lang');

        if ($site_lang) {
            $ci->lang->load('user', $ci->session->userdata('site_lang'));
            $ci->lang->load('reportes', $ci->session->userdata('site_lang'));
        } else {
            $ci->lang->load('user', 'spanish');
            $ci->lang->load('reportes', 'spanish');
        }
        
        if($ci->ion_auth->permiso(1)){
            if ($site_lang) {
                $ci->lang->load('tecnico', $ci->session->userdata('site_lang'));
                $ci->lang->load('comun', $ci->session->userdata('site_lang'));
            } else {
                $ci->lang->load('tecnico', 'spanish');
                $ci->lang->load('comun', 'spanish');
            }
        }elseif($ci->ion_auth->permiso(6)){
            if ($site_lang) {
                $ci->lang->load('admin', $ci->session->userdata('site_lang'));
                $ci->lang->load('comun', $ci->session->userdata('site_lang'));
            } else {
                $ci->lang->load('admin', 'spanish');
                $ci->lang->load('comun', 'spanish');
            }

        }
    }

}