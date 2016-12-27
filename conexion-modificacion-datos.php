<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Request-Method: *');
    header('Access-Control-Allow-Headers: x-requested-with');
    if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
	    header("HTTP/1.1 200 OK");
	    return;
    }
// inicio 

include("librerias/conexion2.php");
header('Content-type: text/json');

$id= $_POST['id'];
$nombre = $_POST['nombre'];
$cel = $_POST['cel'];
$contraclean = $_POST['contra'];
$contratoken = $_POST['token'];

$contra = md5($contraclean);


conectar();

$sq = mysql_query("Select * from paciente where id = '".$id."' and contrasena = '".$contra."' and passwordtoken ='".$contratoken."'");
$num = mysql_num_rows($sq);

if($num == 0)
{
	echo json_encode(array("exito" => false, "message" =>"La contraseña no coincide."));
	
}

else 

{
	$d = "update paciente set nombre='".$nombre."', celular = ".$cel." where id=".$id."";
	$datos = mysql_query($d);
	echo json_encode(array("exito" => true));
	}
																						  
																					
desconectar();  

// fin


?>
