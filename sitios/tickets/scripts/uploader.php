<?php 
$upload_directory='';
$BANDERA=false;

echo "hola";

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
	$db2 = $this->load->database('localhost', TRUE);
	
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
			$data=split("&",$line);
			
			if(strlen($data[1])>30)
			{
				if(!isAlready($data[0]))
				{
					if(mysql_query($data[1]))
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
	if($errors>0 && ($uploaded+$errors)==$contador)
	{
		echo "<br><br><br><br><div id='mensaje' style='margin:0 auto;width:300px;height:300px;border:#000 solid 1px;'>Existen errores, por favor vuelva a ejecutar la aplicaci&oacute;n.</div>";
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
?>