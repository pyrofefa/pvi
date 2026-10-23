<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_controller {

    function __construct(){
        parent::__construct();
        if ($this->session->userdata('group_id') == 2) {
            $this->load->model('Admin_model');
            $this->model = $this->Admin_model;
        }else {
            redirect(base_url() . sitio() . '/users/login');
        }
        
       
      //  $this->load->model('Sample_model');
    }

    function index(){
       // $this->data['Servicios'] = $this->model->getTipoServicios();
        $this->data['content'] = 'facturacion/facturacion';
        $this->load->view('includes/template', $this->data);
    }

    function pendientes(){
        $user_id = $this->session->userdata('user_id');
        $empresa_id = $this->model->getEmpresa($user_id);
        $this->data['registros'] = $this->model->getPeticiones($empresa_id);
        $this->data['content'] = 'admin/pendientes';
        $this->load->view('includes/template', $this->data);
    }

    function clientes(){
        $user_id = $this->session->userdata('user_id');
        $empresa_id = $this->model->getEmpresa($user_id);
        $this->data['registros'] = $this->model->getClientes($empresa_id);
        $this->data['content'] = 'admin/clientes';
        $this->load->view('includes/template', $this->data);
    }

    function getHistorial($datosf_id){
        $user_id = $this->session->userdata('user_id');
        $empresa_id = $this->model->getEmpresa($user_id);
        $this->data['nombre_empresa'] = $this->model->getEmpresaNombre($datosf_id);
        $this->data['registros'] = $this->model->getHistorial($empresa_id,$datosf_id);
        $this->data['content'] = 'admin/historial';
        $this->load->view('includes/template', $this->data);
    }

    function registrar($id = false){

        if($id){

        }else{

            $data['titulo'] = 'Agregar códigos';
           
        }
        $data['content'] = 'facturacion/captura';
        $this->load->view('includes/template',$data);
    }

    function getFactura($id = false){
             $user_id = $this->session->userdata('user_id');
             $empresa_id = $this->model->getEmpresa($user_id);
             $data['estados'] = $this->model->estados_pais();
             $data['titulo'] = 'Datos de Facturación';
             $data['id'] = $id;
             $datosfact_id = $this->model->getDatosFactid($id);
             $data['registros'] = $this->model->getDatosFact($datosfact_id[0]['datosf_id'],2);
             $data['registrospersona'] = $this->model->getDatosPer($datosfact_id[0]['user_id']);
             $data['registrostickets'] = $this->model->getDatosTickets($id,$empresa_id);
             $data['registrosticketstotal'] = count($data['registrostickets']);
             $data['fechapeticion'] = $datosfact_id[0]['fecha'];
             $data['usocomprobante'] = $this->model->getUsoComprobante($id);
             for ($i=0; $i <count($data['registrostickets']); $i++) { 
                 $data['registrostickets'][$i]['noticket'] = $i +1;
             }
        
        $data['content'] = 'admin/datosfact';
        $this->load->view('includes/template',$data);
    }

    function getdatoshistorial($id = false){
             $user_id = $this->session->userdata('user_id');
           //  $empresa_id = $this->model->getEmpresa($user_id);
             $data['estados'] = $this->model->estados_pais();
             $data['titulo'] = 'Datos de Facturación';
             $data['id'] = $id;
             $datosfact_id = $this->model->getPeticionid($id);
             $data['datosfact_id'] = $datosfact_id[0]['datosf_id'];
             $data['registros'] = $this->model->getDatosFact($datosfact_id[0]['datosf_id'],2);
             $data['registrospersona'] = $this->model->getDatosPer($datosfact_id[0]['user_id']);
             $data['registrostickets'] = $this->model->getDatosTicket($id);
             $data['registrosticketstotal'] = count($data['registrostickets']);
             $data['fechapeticion'] = $datosfact_id[0]['fecha'];
             for ($i=0; $i <count($data['registrostickets']); $i++) { 
                 $data['registrostickets'][$i]['noticket'] = $i +1;
             }
        
        $data['content'] = 'admin/datosfacthistorial';
        $this->load->view('includes/template',$data);
    }

    function updatepass(){
        $user_id = $this->session->userdata('user_id');

        $data['titulo'] = 'Cambio de contraseña de acceso';        
        $data['content'] = 'facturacion/updatepass';
        $this->load->view('includes/template',$data);
    }
    function datospersonales(){
        $user_id = $this->session->userdata('user_id');
        $data['registros'] = $this->model->getDatosPer($user_id);
        $data['titulo'] = 'Actualización de datos personales';        
        $data['content'] = 'facturacion/updatepersonal';
        $this->load->view('includes/template',$data);
    }

    function marcarfacturado(){
          $array_json = array();
          $user_id = $this->session->userdata('user_id');
          $empresa_id = $this->model->getEmpresa($user_id);
          $nofactura = $this->input->post('nofactura');
          $fecha = $this->input->post('fecha');
          $peticion_id = $this->input->post('peticionid');
          $tickets = $this->model->getticketsid($peticion_id,$empresa_id);
          $tickets2 = "";
          for ($i=0; $i < count($tickets); $i++) { 
          	$tickets2 .= $tickets[$i]['id'] . ",";
          }
          $tickets2 = substr($tickets2, 0, -1);
        $res = $this->model->Updatepeticion($peticion_id,$nofactura,$fecha,$tickets2);
        if($res == 1){
            $res1 = $this->model->updateticketfacturado($tickets2);
            if($res1 == 1){
            	 $array_json['success'] = true;
                    $array_json['estatus'] = 1;
                    $array_json['msg'] =  'Ticket actualizado correctamente.';
                    print_r(json_encode($array_json));
                }else{
 					$array_json['success'] = true;
                    $array_json['estatus'] = 0;
                    $array_json['msg'] =  'Error al actualizar status de ticket, favor de reportarlo.';
                }
                }else{
                    $array_json['success'] = true;
                    $array_json['estatus'] = 0;
                    $array_json['msg'] =  'Error al guardar número de factura o fecha, favor de reportarlo.';
            print_r(json_encode($array_json));
                }
    }
    function updatepersonalnew(){
          $array_json = array();

          $user_id = $this->session->userdata('user_id');
          $nombre = $this->input->post('nombre');
          $paterno = $this->input->post('paterno');
          $materno = $this->input->post('materno');
          $telefono = $this->input->post('telefono');
          $correo = $this->input->post('correo');
        
        $res = $this->model->updatepersonal($user_id,$nombre,$paterno,$materno,$telefono,$correo);
        if($res == 1){
             $array_json['success'] = true;
                    $array_json['estatus'] = 1;
                    $array_json['msg'] =  'Datos personales actualizados correctamente.';
                    print_r(json_encode($array_json));
                }else{
                    $array_json['success'] = true;
                    $array_json['estatus'] = 0;
                    $array_json['msg'] =  'Los datos personales no pudieron ser actualizados, favor de reportarlo.';
            print_r(json_encode($array_json));
                }
    }

    function get_municipio(){
        $this->model->municipio($this->input->post('id'));
    }

    function datosfacturacion(){
        $user_id = $this->session->userdata('user_id');
        $this->data['registros'] = $this->model->getDatosFact($user_id,3);
     //   print_r($this->data['registros']);exit;
        $this->data['content'] = 'facturacion/datosfact';
        $this->load->view('includes/template', $this->data);
    }
    function getinfocode(){
        $infocodigo = $this->model->getinfocode($_POST["codigo"]);
    }
    function getinfopass(){
        $user_id = $this->session->userdata('user_id');
        $salt = $this->model->getsalt($user_id);
        $infopass = $this->model->getinfopass($_POST["pass"],$salt,$user_id);
    }
    function getinfodataf(){
        $infodataf = $this->model->getinfodataf($_POST["valdatosf"]);
    }
    function fill_select($opt = false, $seleccionar = 1,$tipo=1){
        $user_id = $this->session->userdata('user_id');

        echo $opt;
        $ret = "";
        if($seleccionar > 0){
            $ret = "<option value=''>-- Seleccione --</option>";
        }            
            $R = $this->model->getDatosFact($user_id);
         //var_dump($R);exit();

            for ($i=0; $i < count($R); $i++) {
                $ret .= "<option value='". $R[$i]['id'] ."'>".$R[$i]['rfc']."</option>";
            }
           // print_r($ret);exit();
           
        
        echo $ret;
    }
    function update_datosfacturacion(){
        $array_json = array();
        $filtros = array(
            't.tipopersona_id'=> $this->input->post('tipopersona'),
            't.rfc'=> $this->input->post('rfc'),
            't.nombre'=> $this->input->post('razon'),
            't.direccion'=> $this->input->post('calle'),
            't.colonia'=> $this->input->post('colonia'),
            't.n_exterior'=> $this->input->post('exterior'),
            't.n_interior'=> $this->input->post('interior'),
            't.c_postal'=> $this->input->post('cp'),
            't.localidad'=> $this->input->post('localidad'),
            't.municipio_id'=> $this->input->post('municipio_id'),
            't.estado_id'=> $this->input->post('estado_id'),            
            't.updated'=>date('Y-m-d h:i:s')
        );
        $res = $this->model->Updatedatosf($this->input->post('id'),$filtros);
        if($res == 1){
             $array_json['success'] = true;
                    $array_json['estatus'] = 1;
                    $array_json['msg'] =  'Datos de facturación actualizados correctamente.';
                    print_r(json_encode($array_json));
                }else{
                    $array_json['success'] = true;
                    $array_json['estatus'] = 0;
                    $array_json['msg'] =  'Los datos de facturación no pudieron ser actualizados, favor de reportarlo.';
            print_r(json_encode($array_json));
                }
    }
    function add_datosfacturacion(){
        $array_json = array();

        try{


        $datosf = array(
            'tipopersona_id'=> $this->input->post('tipopersona'),
            'rfc'=> $this->input->post('rfc'),
            'nombre'=> $this->input->post('razon'),
            'direccion'=> $this->input->post('calle'),
            'colonia'=> $this->input->post('colonia'),
            'n_exterior'=> $this->input->post('exterior'),
            'n_interior'=> $this->input->post('interior'),
            'c_postal'=> $this->input->post('cp'),
            'localidad'=> $this->input->post('localidad'),
            'municipio_id'=> $this->input->post('municipio_id'),
            'estado_id'=> $this->input->post('estado_id'),
            'status'=> 1,            
            'created'=>date('Y-m-d h:i:s')
        );
        $this->db->trans_start();
        $datosf_id = $this->model->add_datosf($datosf);
        if($datosf_id == 0){
            $array_json['success'] = true;
            $array_json['estatus'] = 0;
            $array_json['msg'] =  'Los datos de facturación no pudieron ser registrados, favor de reportarlo.';
            print_r(json_encode($array_json));
        }else{
              $user_id = $this->session->userdata('user_id');
              $con = 0;
              $datosf_cliente = array(
                        'cliente_id' => $user_id, 
                        'datosf_id' => $datosf_id, 
                        'status' => 1,
                        'created' => date('Y-m-d h:i:s')
                        ); 
                    $res = $this->model->add_datosf_cliente($datosf_cliente); 
                    $con = $con + $res;
                    $this->db->trans_complete();
                if($con ==  0){
                    $array_json['success'] = true;
                    $array_json['estatus'] = 0;
                    $array_json['msg'] =  'Error al registrar datos de facturación.';
                    print_r(json_encode($array_json));
                }else{
                    $array_json['success'] = true;
                    $array_json['estatus'] = 1;
                    $array_json['msg'] =  'Datos de facturación generados correctamente.';
                    print_r(json_encode($array_json));
                }
        }  
         }
        catch(Exception $e){
            $array_json['success'] = true;
            $array_json['estatus'] = 0;
            $array_json['msg'] =  'Los datos de facturación no pudieron ser registrados, favor de reportarlo.';
            print_r(json_encode($array_json));
        } 
    }

     function add_peticion(){
        try{


           $arrTickets = array();
           $arrTickets = $this->input->post('ticket_id');
           $array_json = array();
           $datos = array(
            'cliente_id'=> $this->session->userdata('user_id'),
            'datosf_id'=> $this->input->post('datosf_id'),
            'fecha_peticion'=> date('Y-m-d h:i:s'),
            'status'=> 1,
            'created'=>date('Y-m-d h:i:s')
        );
           $this->db->trans_start();
           $peticion_id = $this->model->add_peticion($datos);
        if($peticion_id == 0){
            $array_json['success'] = true;
            $array_json['estatus'] = 0;
            $array_json['msg'] =  'La petición no pudo ser registrada, favor de reportarlo.';
            print_r(json_encode($array_json));
        }else{
            if(count($arrTickets) > 0){
                for ($i=0; $i < count($arrTickets); $i++) { 
                    $datos_rel = array(
                        'peticion_id'=> $peticion_id,
                        'ticket_id'=> $arrTickets[$i],
                        'status'=> 1,
                        'created'=>date('Y-m-d h:i:s')
                    );
                    $this->model->updateticketstatus($arrTickets[$i]);
                    $rel_peticion_id = $this->model->add_rel_peticion($datos_rel);
                }
                $this->db->trans_complete();
                if($rel_peticion_id ==  0){
                    $array_json['success'] = true;
                    $array_json['estatus'] = 0;
                    $array_json['msg'] =  'La relación de la petición no se pudo generar, pero si la petición, favor de reportarlo.';
                    print_r(json_encode($array_json));
                }else{
                    $array_json['success'] = true;
                    $array_json['estatus'] = 1;
                    $array_json['msg'] =  'Petición generada correctamente.';
                    print_r(json_encode($array_json));
                }
            }else{
                 $array_json['success'] = true;
                    $array_json['estatus'] = 0;
                    $array_json['msg'] =  'Error. No hay tickets asociados.';
                    print_r(json_encode($array_json));
            }
        }
        }catch(Exception $e){
            $array_json['success'] = true;
            $array_json['estatus'] = 0;
            $array_json['msg'] =  'La petición no pudo ser registrada, favor de reportarlo.';
            print_r(json_encode($array_json));
        }

     }

    function eliminar(){
        try{

        $this->db->trans_start();
        if($this->input->post()){
            $rel_id = $this->model->getidrel($this->input->post('cid'));
            $id = $this->input->post('cid');
            if ($this->model->EliminarRegistro($rel_id,"rel_user_datosf")) {
                if($this->model->EliminarRegistro($id,"tbl_datosf")){
                    $this->db->trans_complete();
                    $R['success'] = 1;
                    $R['head_msg'] = "Eliminado";
                    $R['msg'] = "Registro Eliminado";
                }else{
                    $R['success'] = 0;
                    $R['head_msg'] = "Error";
                    $R['message'] = "Error al eliminar el registro";
                }
               
            } else {
                $R['success'] = 0;
                $R['head_msg'] = "Error";
                $R['message'] = "Error al eliminar el registro";
            }
            print_r(json_encode($R));
        }else{
            echo 'Error';
        }
        }catch(Exception $e){
                $R['success'] = 0;
                $R['head_msg'] = "Error";
                $R['message'] = "Error al eliminar el registro";
        }
    }

    function getServiciosPorTipo($id){
        $servicios = $this->model->getServiciosPorTipo($id);
       echo json_encode($servicios);
    }

    function getCodigo(){
    	$personalID=$this->session->userdata('personalID');
    	$pviID=$this->session->userdata('pvi_id');
    	$datetime=date("Y-m-d H:i:s");
    	$maq=$this->config->item('idMaquina');

    	if(isset($_POST['var'])){
			$code=md5($maq . $pviID . $personalID . $datetime . $_POST['var'] . $servicio);
		}
		else{
			$code=md5($maq . $pviID . $personalID . $datetime);
            // print_r($code);exit();
		}

		//GENERAMOS EL CODIGO DEL TICKET	
		$servicio=$_POST['servicio'];
		$precio=$_POST['precio'];
		$folio=$this->getNextFolio();
		if($folio==-1)
		{
			echo "0";
		}else{
			//LO MANDAMOS A ESCRIBIR AL SERVIDOR PRINCIPAL (COMO MAYORMENTE NO HAY INTERNET MARCA ERROR Y SE MANDA A ESCRIBIRLO A LA BD LOCAL)
			$var=$this->writeCodeServer($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$maq);
			if($var==0){  //SI NO SE PUEDE ESCRIBIR EN LA BASE DE DATOS PRINCIPAL)

			//SE GUARDA EN LA BASE DE DATOS LOCAL Y REGRESA EL CODIGO SI SE PUDO GRABAR
			if($this->writeCodeLocal($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$maq))
			{
				echo $code;
			}
			else
			{
				echo "0";
			}
		}
		else
		{
			echo $var;
		}
		}
    	
        
    }

    function getNextFolio(){
		$r = $this->model->getMaxCodigo();
		if( (is_numeric($r[0]['max']) && $r[0]['max']>0) || $r[0]['count']==0)
		{
			return ( $r[0]['max'] + 1 );
		}
		else
		{
			return -1;
		}
	}

	function writeCodeServer($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$Maq){
		$con=null;
		if($con)
		{
			$data = array(
				'fecha_PC' => $datetime,
				'fecha_SV' => date("Y-m-d H:i:s"),
				'codigo' => $code,
				'personalID' => $personalID,
				'precio' => $precio,
				'pvi_id' => $pviID,
				'servicio_id' => $servicio,
				'folioTicket' => $folio,
				'idMaq' => $Maq,
				'created' =>  date("Y-m-d H:i:s")
				);
			$q = $this->db->insert('tickets', $data);
			if($q && $this->db->affected_rows())
			{
				return $code;
			}
			else
			{
				return 0;
			}
		}
	}

	function writeCodeLocal($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$Maq){
		$con=1;
		
		if($con)
		{
			$data = array(
				'fecha_PC' => $datetime,
				'fecha_SV' => date("Y-m-d H:i:s"),
				'codigo' => $code,
				'personalID' => $personalID,
				'precio' => $precio,
				'pvi_id' => $pviID,
				'servicio_id' => $servicio,
				'folioTicket' => $folio,
				'idMaq' => $Maq,
				'created' =>  date("Y-m-d H:i:s")
				);
			$q = $this->db->insert('tickets', $data);
			
			if($q && $this->db->affected_rows())
			{
				 //UNA VEZ QUE SE GRABA EN LA BASE DE DATOS LOCAL, SE GRABA EN TXT, PARA QUE EL PROCESO DE subirArchivo(descrito en el paso 5 de la instalacion) LO CARGUE A LA BD PRINCIPAL POSTERIORMENTE.
				if($this->writeTxt($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$Maq))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
	}

	function writeTxt($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$Maq){
		$name= getcwd() . "/sitios/tickets/backup/" . date("Ym") . "01.pvisf";
		$name = array(getcwd(),"sitios","tickets","backup",date("Ym") . "01.pvisf");
		$name = implode(DIRECTORY_SEPARATOR, $name);
		//print_r($name);exit();
		if(!is_file($name))
		{
			$fid=fopen($name,'w+');
		}
		else
		{
			$fid=fopen($name,'a');
		}
		
		$insert="insert into tickets (fecha_PC,fecha_SV,codigo,PersonalID,precio,pvi_id,servicio_id,folioTicket,idMaq) values (\"" . $datetime . "\",NOW(),";
		$insert.="\"" . $code . "\"," . $personalID . "," . $precio . "," . $pviID . "," . $servicio . "," . $folio . "," . $Maq . ");";
		fwrite($fid,$code . "&" . $insert . "\r\n");
		fclose($fid);
		
		return true;
	}

    function printTicketz(){
       $codigo=$_GET['code'];
       $this->data['codigo'] = $codigo;
       //SELECCIONAMOS LAS PROPIEDADES DEL CODIGO QUE SE ACABA DE GUARDAR EN LA BASE DE DATOS LOCAL
       $r = $this->model->getCodigo($codigo);
      // print_r($r);exit();
       //SELECCIONAMOS LAS PROPIEDADES DE LOS COSTOS DEL CODIGO 
       $r2 = $this->model->getCostos($r[0]['servicio_id']);
       //print_r($r2);exit();
       //DESIGNAMOS UN FOLIO
       $folio = $r[0]['id'];
       $this->data['folio'] = $folio;
       //PROPIEDADES DEL SERVICIO
       $serDesc=$r2[0]['descripcion'];
       $this->data['serDesc'] = $serDesc;
       $costo=number_format($r2[0]['costo'],2);
       $this->data['costo'] = $costo;
       $servNombre=$r2[0]['nombre'];
       $this->data['servNombre'] = $servNombre;
       $tipoServicio=$r2[0]['tiposervicio_id'];
       $this->data['tipoServicio'] = $tipoServicio;
       if(in_array($tipoServicio, array(2,3,4))){
            $servNombre = "Desinfecci&oacute;n";
            $this->data['servNombre'] = $servNombre;
        }
       $fecha=$r[0]['fecha'];
       $this->data['fecha'] = $fecha;
       $idSer=$r[0]['servicio_id'];
       $this->data['idSer'] = $idSer;
       $nombre=$r[0]['nombreUsuario'] . " " . $r[0]['apellido'];
       $this->data['nombre'] = $nombre;
       $pvi = $r[0]['nombre'];
       $this->data['pvi'] = $pvi;
       $maq=$this->config->item('idMaquina');
       $this->data['maq'] = $maq;
       $this->load->view('tickets/imprimir', $this->data);

      
    }

    function uploader(){

        echo "hola uploader 2";exit;


    }

    function isAlready($code)
    {
    $query="select count(*) from tblCodigos where codigo=\"" . $code . "\"";
    $r=mysql_fetch_array(mysql_query($query));
    if($r[0]==0)
    {
        return false;
    }
    else
    {
        return true;
    }   
    }
    function uploader2(){
        echo "<pre>";
        print_r($this);

    }
    
    function this(){
        echo "<pre>";
        print_r($this);

    }

    function documentos() {
        $data = array(
            'content' => 'pagina/documentos'
        );
        $this->load->view('includes/template', $data);
    }

    function circulares() {
        $data = array(
            'content' => 'pagina/circulares'
        );
        $this->load->view('includes/template', $data);
    }

    function fichas() {
        $data = array(
            'content' => 'pagina/fichas'
        );
        $this->load->view('includes/template', $data);
    }

    function enlaces() {
        $data = array(
            'content' => 'pagina/enlaces'
        );
        $this->load->view('includes/template', $data);
    }

    function protocolos() {
        $data = array(
            'content' => 'pagina/protocolos'
        );
        $this->load->view('includes/template', $data);
    }

    function manuales() {
        $data = array(
            'content' => 'pagina/manuales'
        );
        $this->load->view('includes/template', $data);
    }
    
    function escribirpdf(){
        $this->load->library('Excel');
        $this->excel->probar();
    }
    
    function html(){
        $this->load->view('test');
    }
    
    function scripts($file) {
        header('Content-Type: application/javascript');
        $this->load->view('scripts/' . $file);
    }
    

    function _prueba1($nReg = 100) {
        $this->load->library('Enviarsicafi');
        $config = array(
            'capturas' => 'muestreo',
            'intermedia' => 'int_son_cccrmuestreo',
            'ConexionMSQL' => 'mssql_estados',
            'TablaSicafi' => 'son.i_cccrmuestreo',
            'IdSicafi' => 'sim_id_sicafi',
            'nReg' => $nReg,
            'sim_status' => 'sim_status',
            'sim_status_sicafi' => 'sim_status_sicafi',
            'SitioID' => 27,
            'ColumnaSicafi' => 'SiembraID',
            'formatoFecha' => 'Ymd',
            'ReducirFecha' => true,
            'excluir' => array()
        );
        $this->enviarsicafi->set($config);
        $this->enviarsicafi->Enviar();
        return true;
    }
    
    function _prueba2($nReg = 100){
        $this->load->library('Enviarsicafi');
        $config = array(
            'capturas' => 'muestreo',
            'intermedia' => 'int_son_cccrmuestreo',
            'ConexionMSQL' => 'mssql_estados',
            'TablaSicafi' => 'son.i_cccrmuestreo',
            'IdSicafi' => 'sim_id_sicafi',
            'nReg' => $nReg,
            'sim_status' => 'sim_status',
            'sim_status_sicafi' => 'sim_status_sicafi',
            'SitioID' => 27,
            'ColumnaSicafi' => 'SiembraID',
            'formatoFecha' => 'Ymd',
            'ReducirFecha' => true,
            'excluir' => array()
        );
        $this->enviarsicafi->set($config);
        $this->enviarsicafi->Corregir();
        return true;
    }    
    
    function sendsicafi($nreg = 100){
        echo '================= '.date('Y-m-d H:i:s').' ======================';
        if($this->_prueba2($nreg)){
            echo 'Proceso 2 finalizado con éxito';
        }else{
            echo 'Ocurrió un error en el proceso 2';
        }
        echo '<br />';
        if($this->_prueba1($nreg)){
            echo 'Proceso 1 finalizado con éxito';
        }else{
            echo 'Ocurrió un error en el proceso 1';
        }
    }
    
    function camposAsignados(){
        $sem = $this->globaltools->semana();
        $ano = date('Y');
        $cA = $this->db->where(array('semana' => $sem))->get('camposAsignados');
        if($cA->num_rows() > 0){
            echo 'Ya se realizó el conteo esta semana';
        }else{
        $q = 'INSERT INTO camposAsignados (ano, semana, pais, junta, user_id, total, STATUS, comentario, created, modified)
                SELECT \''.$ano.'\','.$sem.' ,1, c.junta_id, cu.user_id, COUNT(*), 1, \'\', NOW(), NOW() 
                FROM rel_campo_user cu
                INNER JOIN catCampos c ON c.id = cu.`campo_id`
                WHERE c.status = 1
                AND cu.status=1
                GROUP BY c.junta_id, cu.user_id';
        if($this->db->query($q)){
            echo 'Success';
        }else{
            echo 'Error';
        }
        }
    }
}
