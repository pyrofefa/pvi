<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('logged')) {

    function logged($var = false) {
        $CI = & get_instance();
        if (!$var) {
            if ($CI->ion_auth->logged_in()) {
                return true;
            } else {
                return false;
            }
        }
    }

}

if (!function_exists('assets_url')) {

    function assets_url() {
        return base_url() . 'assets/global/';
    }

}

if (!function_exists('exitQuery')) {

    function exitQuery() {
        $ci =& get_instance();
        echo $ci->db->last_query();
        exit;
    }

}

if (!function_exists('getMenu')) {

    function getMenu() {
        $ci = & get_instance();
        $menu = $ci->db->where_not_in('id', '9,13,22')->order_by('name asc')->get('siafeson_siafeson.sitios');
        return $menu->result();
    }

}




if (!function_exists('group_id')) {

    function group_id() {
        $CI = & get_instance();
        return $CI->session->userdata("group_id");
    }

}

if (!function_exists('controlEnvio')) {

    function controlEnvio($sitio, $junta) {
        $CI = & get_instance();
        $control = $CI->db->where(array('sitio_id' => $sitio, 'junta_id' => $junta, 'status' => 1))->get('siafeson_siafeson.control_sem_ant');
        if ($control->num_rows() > 0) {
            return $control->row_array();
        } else {
            return false;
        }
    }

}


if (!function_exists('user_id')) {

    function user_id() {
        $CI = & get_instance();
        return $CI->session->userdata("user_id");
    }

}


if (!function_exists('junta_id')) {

    function junta_id() {
        $CI = & get_instance();
        return $CI->session->userdata("junta_id");
    }

}





if (!function_exists('customs_url')) {

    function customs_url() {
        return base_url() . 'assets/customs/' . str_replace('.php', '', sitio()) . '/';
    }

}

if (!function_exists('sitio')) {

    function sitio() {
        $CI = & get_instance();
        return $CI->config->item('sitio_url');
        ;
    }

}

if (!function_exists('breadcrumbs')) {

    function breadcrumbs() {
        $CI = & get_instance();
        $breads = array();
        $first = $CI->uri->segment(1);
        $second = $CI->uri->segment(2);
        array_push($breads, $CI->config->item('sitio_short'));
        if (!$first) {
            array_push($breads, 'Principal');
        } else {
            switch ($first) {
                case 'home':
                    array_push($breads, 'Principal');
                    if ($second) {
                        switch ($second) {
                            case 'documentos':
                                array_push($breads, 'Documentos');
                                break;
                            case 'index':
                                array_push($breads, '');
                                break;
                            case 'fichas':
                                array_push($breads, lang('mnu_fichas'));
                                break;
                            case 'enlaces':
                                array_push($breads, lang('mnu_enlaces'));
                                break;
                            case 'protocolos':
                                array_push($breads, lang('mnu_protocolos'));
                                break;
                            case 'manuales':
                                array_push($breads, lang('mnu_documentos'));
                                break;
                        }
                    } else {
                        
                    }
                    break;
            }
        }
        return $breads;
    }

}

if (!function_exists('perm')) {

    function perm($object = null) {
        $CI = & get_instance();
        if (!is_null($object)) {
            if (logged()) {
                $arrayPerms = $CI->session->userdata('acl');
                if (array_key_exists($object, $arrayPerms)) {
                    return true;
                } else {
                    return false;
                }
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

}
