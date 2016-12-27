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

$sql1 = "SELECT * from especialidad";
$result1=mysql_query($sql1);
$row1 = mysql_fetch_assoc($result1);
$totalRows1 = mysql_num_rows($result1);
$results1 = array();

do {
  $results1[] = $row1;
} while ($row1 = mysql_fetch_assoc($result1));


// SEGUROS //

$sql2 = "SELECT * from seguro";
$result2=mysql_query($sql2);
$row2 = mysql_fetch_assoc($result2);
$totalRows2 = mysql_num_rows($result2);
$results2 = array();

do {
  $results2[] = $row2;
} while ($row2 = mysql_fetch_assoc($result2));

//

// CIUDAD //

$sql3 = "SELECT * from ciudad";
$result3=mysql_query($sql3);
$row3 = mysql_fetch_assoc($result3);
$totalRows3 = mysql_num_rows($result3);
$results3 = array();

do {
  $results3[] = $row3;
} while ($row3 = mysql_fetch_assoc($result3));

$results3[0] = array("id"=>"0","nombre"=>"Todas");
//



echo json_encode(array("especialidades" => $results1, "seguros" => $results2, "ciudades" => $results3));



desconectar();
		
?>
