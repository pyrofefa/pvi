<?php 
//echo "holajona";
//print(APPPATH.'libraries\phpqrcode\qrlib.php');exit
include(APPPATH .'libraries/phpqrcode/qrlib.php');
$codigo = $_GET['codigo'];
//print($codigo);exit;
QRcode::png($codigo);
exit; // evita que CodeIgniter agregue su página 404 después de la imagen
?>