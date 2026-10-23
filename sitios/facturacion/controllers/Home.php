<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_controller {

    function __construct(){
        parent::__construct();       
             $this->load->model('usuarios_model','model');       
    }

    function index(){
       // exit("Hola conra");
        if($this->ion_auth->logged_in()){
             if($this->session->userdata('group_id') == 3){
                redirect(base_url().sitio().'/facturacion/codigos','refresh');
             }elseif($this->session->userdata('group_id') == 2){
                redirect(base_url().sitio().'/admin/pendientes','refresh');
             }
        }else{
             $data = array(
            'content' => 'includes/inicio'
        );
        $this->load->view('includes/template', $data);
        }
       
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

    function altacliente() {
        $data['estados'] = $this->model->estados_pais();
        $data['content'] = 'pagina/altacliente';        
        $this->load->view('includes/template', $data);
    }

    function get_municipio(){
        $this->model->municipio($this->input->post('id'));
    }

    function get_username(){
        $array_json = array();
        $username = $this->input->post('username');
        $result = $this->model->get_username($username);
        if(count($result)>0){
            $array_json['success'] = true;
            $array_json['estatus'] = 0;
            $array_json['msg'] =  'Usuario no disponible, intente con un usuario diferente';
            print_r(json_encode($array_json));
        }else{
            $array_json['success'] = true;
            $array_json['estatus'] = 1;
            $array_json['msg'] =  'Usuario disponible';
            print_r(json_encode($array_json));
        }
    }

    function add_user(){
        $array_json = array();
        $datos = array(
            'nombre'=> $this->input->post('nombre'),
            'apellido_paterno'=> $this->input->post('paterno'),
            'apellido_materno'=> $this->input->post('materno'),
            'telefono'=> $this->input->post('telefono'),
            'correo'=> $this->input->post('correo'),
           // 'estado_id'=> $this->input->post('estado_id'),
           // 'municipio_id'=> $this->input->post('municipio_id'),
            'status'=> 1,
            //'sexo'=> $this->input->post('sexo'),
            'created'=>date('Y-m-d h:i:s')
        );
        $persona_id = $this->model->add_persona($datos);
        if($persona_id == 0){
            $array_json['success'] = true;
            $array_json['estatus'] = 0;
            $array_json['msg'] =  'La persona no pudo ser registrada, favor de reportarlo.';
            print_r(json_encode($array_json));
        }else{
            $salt =  substr(md5(uniqid(rand(), true)), 0, 10);
            $datos_us = array(
                'username' => $this->input->post('usuario'), 
                'password' => sha1($this->input->post('password').$salt), 
                'salt' => $salt, 
                'email' => $this->input->post('correo'),
                'persona_id' => $persona_id,
                'active' => 1, 
                'status' => 1, 
                'created' => date('Y-m-d h:i:s')
                );
            $user_id = $this->model->add_user($datos_us);
            if($user_id == 0){
                $array_json['success'] = true;
                $array_json['estatus'] = 0;
                $array_json['msg'] =  'El usuario no pudo ser creado';
                print_r(json_encode($array_json));
                //echo 'No se pudo insertar al usuario';
            }else{
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
             $datosf_id = $this->model->add_datosf($datosf);
         if($datosf_id == 0){
            $array_json['success'] = true;
            $array_json['estatus'] = 0;
            $array_json['msg'] =  'Error al guardar datos de facturación';
         }else{
              $datosf_cliente = array(
                        'cliente_id' => $user_id, 
                        'datosf_id' => $datosf_id, 
                        'status' => 1,
                        'created' => date('Y-m-d h:i:s')
                        ); 

              $datosf_cliente_id = $this->model->add_datosf_cliente($datosf_cliente);
            if($datosf_cliente_id == 0){
                 $array_json['success'] = true;
                 $array_json['estatus'] = 0;
                 $array_json['msg'] =  'Error al guardar datos de facturación y su relación con cliente.';
            }else{
               // $sitio = $this->input->post('sitios');
                $level = $this->input->post('nivel');
                $con = 0;
                    $datos_sitio = array(
                        'user_id' => $user_id, 
                        'status' => 1, 
                        'group_id' => $level,
                        'created' => date('Y-m-d'),
                        'updated' => date('Y-m-d') 
                        ); 
                    $res = $this->model->add_usergroup($datos_sitio);
                    $con = $con + $res;
                
                if($con ==  0){
                    $array_json['success'] = true;
                    $array_json['estatus'] = 0;
                    $array_json['msg'] =  'El usuario no pudo ser agregado al nivel correspondiente, pero si a personas, usuario y sus datos de facturación.';
                    print_r(json_encode($array_json));
                }else{
                    $this->enviar_mail($this->input->post('nombre'),$this->input->post('paterno'),$this->input->post('materno'),$this->input->post('usuario'),$this->input->post('password'),$this->input->post('correo'));
                    $array_json['success'] = true;
                    $array_json['estatus'] = 1;
                    $array_json['msg'] =  'Usuario generado correctamente.';
                    print_r(json_encode($array_json));
                }

                }
            }
                }  
        }   
    }
    function enviar_mail($nombre,$paterno,$materno,$usuario,$contrasena,$correo){

        $nombrecompleto = $nombre." ".$paterno." ".$materno;
         $this->load->library('email');
         $this->email->clear();

        $config = array(
            'protocol'    => 'smtp',
            'smtp_host'   => 'mail.cesaveson.com',
            'smtp_port'   =>  587,
            'smtp_user'   => 'siafeson@cesaveson.com',
            'smtp_pass'   => "(H+458hZ{*:X'",
            'mailtype'    => 'html', 
            'charset'     => 'utf-8',
            'wordwrap'=> TRUE
        );

        $data['nombre'] = $nombrecompleto;
        $data['usuario'] = $usuario;
        $data['contrasena'] = $contrasena;

        $this->email->initialize($config);
        $this->email->from('siafeson@cesaveson.com','PVI');
        $this->email->to($correo); 
        $this->email->bcc('jonathan.garcia@cesaveson.com'); 
        $this->email->subject(' Alta de usuario ');
        $this->email->message($this->load->view('pagina/email',$data,true));   
        if($this->email->send()){
               // echo 'Correo enviado exitosamente';
                //return true;
        }else{
               // echo 'No se envío el correo';
               // return false;
        } 

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
