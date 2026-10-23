<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket_model extends MY_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getTipoServicios(){
		 $this->db->select('TT.id as ID_T,TT.nombre as Nom_T');
		 $this->db->from('tbl_tiposervicio as TT');
		 $this->db->order_by('ID_T','ASC');
		 $query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return array();
		}
	}

	public function getServiciosPorTipo($tipo_id){
		$this->db->select('t.*,rel.costo');
		$this->db->from('tbl_servicios t');
		$this->db->join('rel_servicios_pvi rel','rel.servicio_id = t.id','inner');
		$this->db->where('rel.status',1);
		$this->db->where('t.tiposervicio_id',$tipo_id);
		$query = $this->db->get();
		//echo $this->db->last_query();exit();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return array();
		}
	}

	public function getMaxCodigo(){
		 $this->db->select('MAX(id) as max,count(id) as count');
		 $this->db->from('tickets');
		 $query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return array();
		}
	}

	public function getCodigo($codigo){
		 $this->db->select('tickets.id,DATE_FORMAT(tickets.fecha_PC,"%Y-%m-%d %H:%i") as fecha,tickets.servicio_id,tbl_persona.`nombre` as nombreUsuario,CONCAT(tbl_persona.`apellido_paterno`," ",tbl_persona.`apellido_materno`) AS apellido,tbl_pvi.nombre');
		 $this->db->from('tickets');
		 $this->db->join('tbl_usuarios','tickets.PersonalID = tbl_usuarios.PersonalID','inner');
		 $this->db->join('tbl_pvi','tbl_pvi.id = tickets.pvi_id','inner');
		 $this->db->join('tbl_persona','tbl_persona.id = tbl_usuarios.persona_id','inner');
		 $this->db->where('tickets.codigo',$codigo);
		 $query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return array();
		}
	}

	public function getCostos($servicio_id){
		 $this->db->select('t.descripcion,rel.costo,t.nombre,t.tiposervicio_id');
		 $this->db->from('tbl_servicios t');
		 $this->db->join('rel_servicios_pvi rel','rel.servicio_id = t.id','inner');
		 $this->db->where('t.id',$servicio_id);
		 $query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return array();
		}
	}

	public function getEmpresaId($servicio_id){
		 $this->db->select('rel.empresa_id');
		 $this->db->from('tbl_servicios t');
		 $this->db->join('rel_tiposervicio_empresa rel','rel.tiposervicio_id = t.tiposervicio_id','inner');
		 $this->db->where('t.id',$servicio_id);
		 $query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return array();
		}
	}




}

/* End of file ticket_model.php */
/* Location: ./application/models/ticket_model.php */