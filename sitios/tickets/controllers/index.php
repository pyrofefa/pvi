<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends Generic_Controller {

	var $view_temp = "template/template";
	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->library("ion_auth");
		$this->load->model('ticket_model');
		$this->model = $this->ticket_model;
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
	}

	public function index(){
		print_r($_SESSION);exit();
		$this->data['Servicios'] = $this->model->getTipoServicios();
		$this->data['Contenido'] = 'main';
		$this->load->view($this->view_temp, $this->data);

	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */