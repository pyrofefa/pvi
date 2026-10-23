<?php
	
	//DIRECCION DONDE ESTAN LOS ARCHIVOS QUE SE GUARDAN AL IMPRIMIR EL CODIGO
	$local_directory='C:/xampp/htdocs/pvi/sitios/tickets/backup/';

	//ARMAMOS LAS PROPIEDADES DEL PAQUETE Y DESIGNAMOS LA URL DONDE ESTA EL ARCHIVO QUE SUBIRA LA INFORMACION
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_POST, true);
	//curl_setopt($ch, CURLOPT_URL, 'http://www.cesaveson.com/pvisf/uploadFile/uploader.php' );
	//curl_setopt($ch, CURLOPT_URL, 'http://www.siafeson.com/pvis/index.php/Uploader/upload' );
	//curl_setopt($ch, CURLOPT_URL, 'http://162.144.59.137/~siafeson/pvis/index.php/Uploader/upload' );
	curl_setopt($ch, CURLOPT_URL, 'https://facturacionpvi.siafeson.org.mx/index.php/Uploader/upload' );

	//curl_setopt($ch, CURLOPT_URL, 'https://www.google.com.mx/' );
	
	$date=date("d");
	//SI EL DIA DEL MES ES MENOR O IGUAL QUE EL 5, SUBIRA EL ARCHIVO DEL MES PASADO Y DE ESTE. 
	if($date<=5)
	{

		$post_array = array(
        // "my_file"=>"@".$local_directory. date("Ym") . '01.pvisf',
        "my_file"=> new CURLFile($local_directory. date("Ym") . '01.pvisf'),
        "upload"=>"Upload");
        //print_r($post_array);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array); 
		$response = curl_exec($ch);

		$pastMonth = mktime(0,0,0,date("m")-1,date("d"),date("Y"));
		$pastMonth=date("Ym",$pastMonth);
		
		$post_array = array(
        //"my_file"=>"@".$local_directory. $pastMonth . '01.pvisf',
        "my_file"=> new CURLFile($local_directory. $pastMonth . '01.pvisf'),
        "upload"=>"Upload"
		);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array); 
		$response .= curl_exec($ch);
	}
	else //SI EL DIA DEL MES ES MAYOR QUE 5, SOLO SUBIRA ARCHIVOS DEL MES ACTUAL
	{
		$post_array = array(
        "my_file"=> new CURLFile($local_directory. date("Ym") . '01.pvisf'),
        "upload"=>"Upload"
		);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array); 
		$response = curl_exec($ch);
	}
	echo $response;
?>