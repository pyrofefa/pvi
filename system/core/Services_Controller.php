<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services_Controller extends CI_Controller {

	var $model;

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	public function getServiciosPorTipo($tipo_id){
		$this->load->model('ticket_model');
		$this->model = $this->ticket_model;
		// header('Content-Type: application/json');
		$R = $this->model->getServiciosPorTipo($tipo_id);
		echo $_GET['callback'] . '(' . json_encode($R) . ')';
		// echo "<pre>". print_r($R,true) ."</pre>";
			
	}

}

/* End of file Services_Controller.php */
/* Location: ./application/controllers/Services_Controller.php */