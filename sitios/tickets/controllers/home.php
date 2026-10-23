<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_controller {

    function __construct(){
        parent::__construct();
        if ($this->ion_auth->permiso(1)) {
            $this->load->model('ticket_model');
            $this->model = $this->ticket_model;
        }else {
            redirect(base_url() . sitio() . '/users/login');
        }
        
       
      //  $this->load->model('Sample_model');
    }

    function index(){
        $this->data['Servicios'] = $this->model->getTipoServicios();
        $this->data['content'] = 'tickets/tickets';
        $this->load->view('includes/template', $this->data);
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
        $empresa_id = $this->model->getEmpresaId($_POST['servicio']);
        $empresa_id = $empresa_id[0]['empresa_id'];
        if($folio==-1)
        {
            echo "0";
        }else{
            //LO MANDAMOS A ESCRIBIR AL SERVIDOR PRINCIPAL (COMO MAYORMENTE NO HAY INTERNET MARCA ERROR Y SE MANDA A ESCRIBIRLO A LA BD LOCAL)
            $var=$this->writeCodeServer($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$maq,$empresa_id);
            if($var==0){  //SI NO SE PUEDE ESCRIBIR EN LA BASE DE DATOS PRINCIPAL)

            //SE GUARDA EN LA BASE DE DATOS LOCAL Y REGRESA EL CODIGO SI SE PUDO GRABAR
            if($this->writeCodeLocal($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$maq,$empresa_id))
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

    function writeCodeServer($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$Maq,$empresa_id){
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
                'created' =>  date("Y-m-d H:i:s"),
                'empresa_id' => $empresa_id
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

    function writeCodeLocal($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$Maq,$empresa_id){
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
                'created' =>  date("Y-m-d H:i:s"),
                'empresa_id' => $empresa_id
                );
            $q = $this->db->insert('tickets', $data);
            
            if($q && $this->db->affected_rows())
            {
                 //UNA VEZ QUE SE GRABA EN LA BASE DE DATOS LOCAL, SE GRABA EN TXT, PARA QUE EL PROCESO DE subirArchivo(descrito en el paso 5 de la instalacion) LO CARGUE A LA BD PRINCIPAL POSTERIORMENTE.
                if($this->writeTxt($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$Maq,$empresa_id))
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

    function writeTxt($code,$datetime,$personalID,$pviID,$servicio,$precio,$folio,$Maq,$empresa_id){
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
        
        $insert="insert into tickets (fecha_PC,fecha_SV,codigo,PersonalID,precio,pvi_id,servicio_id,folioTicket,idMaq,created,empresa_id) values (\"" . $datetime . "\",NOW(),";
        $insert.="\"" . $code . "\"," . $personalID . "," . $precio . "," . $pviID . "," . $servicio . "," . $folio . "," . $Maq . ",NOW()," . $empresa_id .");";
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
       $empresa_id = $this->model->getEmpresaId($r[0]['servicio_id']);
       $empresa_id = $empresa_id[0]['empresa_id'];
       $this->data['empresa_id'] = $empresa_id;
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
    $query="select count(*) from tickets where codigo=\"" . $code . "\"";
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
