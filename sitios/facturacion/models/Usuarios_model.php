<?php
class Usuarios_model extends CI_Model {
    /*Get lugares*/
    function pais($id){
        $this->db->select('id,name,codigo');
        $this->db->where('id',$id);
        return  $this->db->get('aseentic_fida.paises')->result_array();

    }
    function estados_pais(){
        $this->db->where('status',1);
        $this->db->select('id,name,clave');
        return $this->db->get('pvi.catEstados')->result_array();
    }
    function estados($id){
    	$this->db->where('pais_id',$id);
    	$this->db->select('id,name,codigo');
        $this->db->order_by('name', 'ASC');
        print_r(json_encode($this->db->get('aseentic_fida.estados')->result_array()));
    }
    function municipio($id,$cont = false){
    	$this->db->where('estado_id',$id);
    	$this->db->where('status',1);
    	$this->db->select('id,name,clave');
        $this->db->order_by('name', 'ASC');
        $datos = $this->db->get('pvi.catMunicipios')->result_array();
        if($cont){
            return $datos;
        }else{
           print_r(json_encode($datos)); 
        }


    	
    }
    function comunidades($id){
        $this->db->where('municipio_id',$id);
        $this->db->where('status',1);
        $this->db->select('id,name');
        $this->db->order_by('name', 'ASC');
        print_r(json_encode($this->db->get('aseentic_fida.comunidades')->result_array()));
    }
    /*fin get lugares*/
    function add_pais($datos){
        $sql = $this->db->insert('aseentic_fida.paises', $datos);
        if($sql>0){
            $this->db->select('id,name,codigo');
            print_r(json_encode($this->db->get('aseentic_fida.paises')->result_array()));    
        }else{
            print_r(json_encode(array()));
        }
    }
    function add_estado($datos){
    	$sql = $this->db->insert('aseentic_fida.estados', $datos);
    	if($sql>0){
            $this->db->where('pais_id',$datos['pais_id']);
            $this->db->select('id,name,codigo');
            print_r(json_encode($this->db->get('aseentic_fida.estados')->result_array()));    
        }else{
            print_r(json_encode(array()));
        }
    }
    function add_municipio($datos){
        $sql = $this->db->insert('aseentic_fida.municipios', $datos);
        if($sql>0){
            $this->db->where('estado_id',$datos['estado_id']);
            $this->db->select('id,name,codigo');
            print_r(json_encode($this->db->get('aseentic_fida.municipios')->result_array()));    
        }else{
            print_r(json_encode(array()));
        }
    }
    function add_comunidad($datos){
            $this->db->set('name', $datos['name']);        
            $this->db->set('municipio_id', $datos['municipio_id']);
            $this->db->set('status', $datos['status']);        
            $this->db->set('created', 'now()',false);        
        $sql = $this->db->insert('aseentic_fida.comunidades', $datos);
        if($sql>0){
            $this->db->where('municipio_id',$datos['municipio_id']);
            $this->db->select('id,name');
            print_r(json_encode($this->db->get('aseentic_fida.comunidades')->result_array()));    
        }else{
            print_r(json_encode(array()));
        }
    }
    /**/
    function getsitios(){
        $this->db->where('status',1);
        $this->db->select('id,name');
        return $this->db->get('aseentic_fida.sitios')->result_array();
    }
    function getniveles(){
        $this->db->select('id,name');
        $this->db->where('status',1);
        return $this->db->get('aseentic_fida.groups')->result_array();
    }
    function add_persona($datos){
        $sql = $this->db->insert('pvi.tbl_persona', $datos);
        if($sql>0){
           return  $this->db->insert_id();   
        }else{
            return 0;
        }
    }
    function add_user($datos){
        $sql = $this->db->insert('pvi.tbl_usuarios', $datos);
        if($sql>0){
           return  $this->db->insert_id();   
        }else{
            return 0;
        }
    }
    function add_datosf($datos){
        $sql = $this->db->insert('pvi.tbl_datosf', $datos);
        if($sql>0){
           return  $this->db->insert_id();   
        }else{
            return 0;
        }
    }
    function add_datosf_cliente($datos){
        $sql = $this->db->insert('pvi.rel_user_datosf', $datos);
        if($sql>0){
           return  $this->db->insert_id();   
        }else{
            return 0;
        }
    }

    function add_usergroup($datos){
           $sql = $this->db->insert('pvi.users_groups', $datos);
        if($sql>0){
           return  $this->db->insert_id();   
        }else{
            return 0;
        }
    }
    function get_username($username){
        $this->db->select('nombre,apellido_paterno');
        $this->db->from('pvi.tbl_usuarios');
        $this->db->join('pvi.tbl_persona','pvi.tbl_persona.id = pvi.tbl_usuarios.persona_id');
        $this->db->where('username',$username);
        return  $this->db->get()->result_array();
    }
    /*FIN ADD USER*/


}
