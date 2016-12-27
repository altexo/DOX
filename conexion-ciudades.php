<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Request-Method: *');
    header('Access-Control-Allow-Headers: x-requested-with');
    if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
	    header("HTTP/1.1 200 OK");
	    return;
    }
	    
include("librerias/conexion2.php");	
header('Content-type: text/json');

$error="";

conectar();

// ESPECIALIDADES //

mysql_query('SET CHARACTER SET utf8');


// CIUDAD //

$sql3 = "SELECT * from ciudad";
$result3=mysql_query($sql3);
$row3 = mysql_fetch_assoc($result3);
$totalRows3 = mysql_num_rows($result3);
$results3 = array();

do {
  $results3[] = $row3;
} while ($row3 = mysql_fetch_assoc($result3));

//



echo json_encode(array("ciudades" => $results3));



desconectar();
		
?>
