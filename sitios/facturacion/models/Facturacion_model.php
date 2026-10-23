<?php
class Facturacion_model extends CI_Model {
    /*Get lugares*/

    function estados_pais(){
        $this->db->where('status',1);
        $this->db->select('id,name,clave');
        return $this->db->get('pvi.catEstados')->result_array();
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

    function EliminarRegistro($id,$tabla){
        $min = 0;
        $data = array('status' => $min);
        $this->db->where('id', $id);
        if ($this->db->update($tabla, $data)) {
            return true;
        } else {
            return false;
        }
    }

    function add_persona($datos){
        $sql = $this->db->insert('pvi.tbl_persona', $datos);
        if($sql>0){
           return  $this->db->insert_id();   
        }else{
            return 0;
        }
    }
    function add_peticion($datos){
        $sql = $this->db->insert('pvi.peticiones', $datos);
        if($sql>0){
           return  $this->db->insert_id();   
        }else{
            return 0;
        }
    }
    function add_rel_peticion($datos){
        $sql = $this->db->insert('pvi.rel_peticiones', $datos);
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
    function getidrel($id){
        $this->db->select('r.id');
        $this->db->from('pvi.rel_user_datosf r');
        $this->db->where('r.datosf_id',$id);
        $id =  $this->db->get()->result_array();
        $id = $id[0]['id'];
        return $id;
    }


    function getinfocode($codigo){ 
        $array_json = array();
        $this->db->select('t.id,t.codigo,t.fecha_PC as fecha,t.precio,s.nombreVISTA as servicio,t.status');
        $this->db->from('pvi.tickets t'); 
        $this->db->join('pvi.tbl_servicios as s','s.id = t.servicio_id');  
        $this->db->where('t.codigo',$codigo);
        $resp = $this->db->get()->result_array();

                if(count($resp) > 0){
                    $array_json['success'] = true;
                    $array_json['datos'] = $resp;
                    $array_json['estatus'] = 1;
                    $array_json['msg'] =  "Éxito";
                   
                }else{
                    $array_json['success'] = false;
                    $array_json['estatus'] = 0;
                    $array_json['msg'] =  "Error";
                   
                }
        print_r(json_encode($array_json));
       
    }
    function getinfopass($pass,$salt,$user_id){ 
        $array_json = array();
        $qry = "select t.*
                from pvi.tbl_usuarios t
                where t.password = SHA1(CONCAT('$pass','$salt'))
                and t.id = $user_id";
        $query = $this->db->query($qry);
        $res = $query->result_array();
    // print_r($query);exit;
                if(count($res) > 0){
                    $array_json['success'] = true;
                    $array_json['datos'] = $res;
                    $array_json['estatus'] = 1;
                    $array_json['msg'] =  "Éxito";
                   
                }else{
                    $array_json['success'] = false;
                    $array_json['estatus'] = 0;
                    $array_json['msg'] =  "Error";
                   
                }
        print_r(json_encode($array_json));
       
    }
    function getinfodataf($id){ 
        $array_json = array();
        $this->db->select('f.`id`,f.`nombre`,f.`c_postal` as cp,f.`direccion` as calle,f.`n_exterior` as exterior,f.`n_interior` as interior,f.`colonia`,f.`localidad`,cm.`name` AS municipio,ce.`name` AS estado');
        $this->db->from('pvi.tbl_datosf f'); 
        $this->db->join('pvi.catMunicipios as cm','cm.id = f.municipio_id');  
        $this->db->join('pvi.catEstados as ce','ce.id = f.estado_id');  
        $this->db->where('f.id',$id);
        $resp = $this->db->get()->result_array();

                if(count($resp) > 0){
                    $array_json['success'] = true;
                    $array_json['datos'] = $resp;
                    $array_json['estatus'] = 1;
                    $array_json['msg'] =  "Éxito";
                   
                }else{
                    $array_json['success'] = false;
                    $array_json['estatus'] = 0;
                    $array_json['msg'] =  "Error";
                   
                }
        print_r(json_encode($array_json));
       
    }


    function updateticketstatus($ticket_id){
            $this->db->set('status', 1);
            $this->db->where('id', $ticket_id);
            $this->db->update('pvi.tickets');
            $resp = $this->db->affected_rows();

            if($resp > 0){
               return 1; 
            }else{
                return 0; 
            }
    }
    function Updatedatosf($id,$filtros){
        return $this->db->where('t.id',$id)->update('tbl_datosf t',$filtros);
    }
    function updatepersonal($user_id,$nombre,$paterno,$materno,$telefono,$correo){
        $qry = "update
                tbl_persona t inner join tbl_usuarios u on u.persona_id = t.id
                set t.nombre = '$nombre',
                t.apellido_paterno = '$paterno',
                t.apellido_materno = '$materno',
                t.telefono = $telefono,
                t.correo = '$correo'
                where u.id = $user_id";
        $this->db->query($qry);
        $query  = $this->db->affected_rows();
      if($query > 0){
        return $query;
      }else{
        return 0;
      }
    }
    function Updatepassnew($user_id,$pass,$salt){
        $qry="update tbl_usuarios set password = SHA1(CONCAT('$pass','$salt')) where id = $user_id ";
        $this->db->query($qry);
        $query =  $this->db->affected_rows();

        if ($query > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function getRegistros($user_id){        
       
        $this->db->select('t.id,t.fecha_PC as fecha,t.codigo,t.precio,s.nombre as servicio,t.folioTicket,ct.nombreVISTA as status,pvi.nombreVISTA as pvi,df.rfc,CONCAT("(",cuc.codigo,")"," ",cuc.name) as usocomprobante');
        $this->db->from('pvi.tickets t');
        $this->db->join('pvi.rel_peticiones as rel','rel.ticket_id = t.id');
        $this->db->join('pvi.peticiones as p','p.id = rel.peticion_id'); 
        $this->db->join('pvi.tbl_servicios as s','s.id = t.servicio_id'); 
        $this->db->join('pvi.catStatus as ct','ct.valor = t.status'); 
        $this->db->join('pvi.tbl_pvi as pvi','pvi.id = t.pvi_id'); 
        $this->db->join('pvi.tbl_datosf as df','df.id = p.datosf_id'); 
        $this->db->join('pvi.catUsoComprobante as cuc','cuc.id = p.usoComprobante_id'); 
        $this->db->where('p.cliente_id',$user_id); 
        $this->db->where('rel.status',1); 
        return  $this->db->get()->result();
    }   

    function getsalt($user_id){        
       
        $this->db->select('t.salt as salt');
        $this->db->from('pvi.tbl_usuarios t'); 
        $this->db->where('t.id',$user_id); 
        $id =  $this->db->get()->result_array();
        $id = $id[0]['salt'];
        return $id;
    } 

    function getDatosFact($persona_id,$tipo = 1){        
      // print_r($tipo);exit();
        $this->db->select('d.id,d.rfc,d.nombre as razon,d.direccion,d.colonia,d.n_exterior as exterior,d.n_interior as interior,d.c_postal as cp,ce.name as estado,cm.name as municipio,d.localidad,d.tipopersona_id as tipopersona,d.estado_id,d.municipio_id');
        $this->db->from('pvi.tbl_datosf d');
        $this->db->join('pvi.rel_user_datosf as rel','rel.datosf_id = d.id');
        $this->db->join('pvi.catEstados as ce','ce.id = d.estado_id');
        $this->db->join('pvi.catMunicipios as cm','cm.id = d.municipio_id');
        if($tipo == 2){
            $this->db->where('rel.datosf_id',$persona_id); 
        }else{
            $this->db->where('rel.cliente_id',$persona_id); 
        }
        $this->db->where('rel.status',1);     
           
       if($tipo == 3){
            return  $this->db->get()->result();
       }elseif($tipo == 1 || $tipo == 2){
             return  $this->db->get()->result_array();
       }
        
        
    } 

    function getDatosUso(){        
      // print_r($tipo);exit();
        $this->db->select('d.id,CONCAT("(",d.`codigo`,")"," ",d.`name`) AS nombre');
        $this->db->from('pvi.catUsoComprobante d');
        $this->db->where('d.status',1); 

        return  $this->db->get()->result_array();
             
    } 

    function getDatosPer($user_id){        
        $this->db->select('u.id as user_id,t.id as persona_id,t.nombre,t.apellido_paterno,t.apellido_materno,t.telefono,t.correo');
        $this->db->from('pvi.tbl_persona t');
        $this->db->join('pvi.tbl_usuarios as u','u.persona_id = t.id');        
        $this->db->where('u.id',$user_id); 
           
        return  $this->db->get()->result_array();
       
        
        
    }



}
