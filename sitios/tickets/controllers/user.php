<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    var $_site = "tickets";

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login() {
        if ($this->session->userdata('logged_in')){
            redirect(base_url() . $this->_site . '.php/user/verificador');
        } else {
            $this->load->view('user/login');
        }
    }

    function verificador(){
        if ($this->session->userdata('level_id') == 7) {
            redirect(base_url().$this->_site.'.php/nacional');
        } elseif ($this->session->userdata('level_id') == 1) { 
            redirect(base_url().$this->_site.'.php/tecnico');
        } elseif ($this->session->userdata('level_id') == 6) {
            redirect(base_url().$this->_site.'.php/estatal');
        } elseif ($this->session->userdata('level_id') == 2) {
            redirect(base_url().$this->_site.'.php/admin');
        }else {
            print_r($this->session->userdata);
            //redirect(base_url().$this->_site.'.php/user/login');
        }   
    }

    public function logout() {
        $data = array('logged_in' => FALSE, 'name' => '', 'id_user' => '', 'junta_id' => '', 'level_id' => '', 'personal_id' => '', 'junta_sicafi' => '', 'estado_id' => '', 'pais_id' => '', 'sitio' => '');
        $this->session->unset_userdata($data);
        redirect(base_url() . $this->_site . '.php');
    }

}