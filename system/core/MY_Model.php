<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	// var $db;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


}

/* End of file MY_Model.php */
