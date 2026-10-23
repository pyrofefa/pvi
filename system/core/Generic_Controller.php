<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generic_Controller extends CI_Controller {

	var $model;

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// echo 
	}


	public function pc(){
		echo "PC NUMBER:" . _PC_NUMBER_;
		exit();
	}

}

/* End of file generic_controller.php */
/* Location: ./application/controllers/generic_controller.php */