<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Language extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }
 
    function Load($language = "") {
    	$web = (!$_SERVER['HTTP_REFERER'])?"#":$_SERVER['HTTP_REFERER'];
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        redirect($web);
    }
}