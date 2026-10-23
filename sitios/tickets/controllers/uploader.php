<?php 

class Uploader extends CI_controller {

    function __construct(){
        parent::__construct();
        
    }


function isAlready($code)
{
	$query="select count(*) as count from tickets where codigo=\"" . $code . "\"";
	$r = $this->db2->query($query);
	$r = $r->result_array();
	//print_r($r[0]['count']);exit();
	//$r=mysql_fetch_array(mysql_query($query) or die("Error en " . mysql_error()));
	
	if($r[0]['count']==0)
	{
		return false;
	}
	else
	{
		return true;
	}	
}

public function upload(){
	
	$upload_directory='';
	$BANDERA=false;
	if (isset($_POST['upload']))
{  
	if (!empty($_FILES['my_file']))
	{ 

    	if ($_FILES['my_file']['error'] > 0)
		{ 
            echo "Error: " . $_FILES["my_file"]["error"] ;
        }
		else
		{
			$name=md5($_FILES['my_file']['name'] . date("Y-m-d"));
			$upload_directory=$upload_directory . $name;
			move_uploaded_file($_FILES['my_file']['tmp_name'], $upload_directory);
			$BANDERA=true;
        }
    }
	else
	{
		$BANDERA=false;
    }
}

if($BANDERA)
{
	
	$this->db2 = $this->load->database('default', TRUE);
	//print_r($db2);exit();
	$file=fopen($upload_directory,'r');
	$con=true;
	$uploaded=0;
	$errors=0;
	$contador=0;
	if($con)
	{
		while(!feof($file))
		{	 
			$line = fgets($file);
			//$data=split("&",$line);
			$data=explode("&",$line);
			
			if(isset($data[1])){
			if(strlen($data[1])>30)
			{
				if(!$this->isAlready($data[0]))
				{
					//if(mysql_query($data[1]))
					if($this->db2->query($data[1]))
					{
						$uploaded++;
					}
					else
					{
						$errors++;
					}
				}
			}
			$contador++;
			}
		}
	}
	//print_r($errors);
	if($errors>0 && ($uploaded+$errors)==$contador)
	{
		echo "<br><br><br><br><div id='mensaje' style='margin:0 auto;width:300px;height:300px;border:#000 solid 1px;'>Existen errores, por favor vuelva a ejecutar la aplicaci&oacute;n. Cod 01</div>";
		unlink($upload_directory);
	}
	if($contador==$uploaded)
	{
		echo "<br><br><br><br><div id='mensaje' style='margin:0 auto;width:300px;height:300px;border:#000 solid 1px;'>Todos los datos cargados.</div>";
		unlink($upload_directory);
	}
}
else
{
	echo "<br><br><br><br><div id='mensaje' style='margin:0 auto;width:300px;height:300px;border:#000 solid 1px;'>Existen errores, por favor vuelva a ejecutar la aplicaci&oacute;n</div>";
	unlink($upload_directory);
}
}


}
?>