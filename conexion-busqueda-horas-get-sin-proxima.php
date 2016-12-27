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

// 01 identifica variables

$id = $_GET['id'];
$clinica = $_GET['clinica'];
$fecha = $_GET['fecha'];

// 02 guarda sesión de especialidad 
// $_SESSION['esp'] = $especialidad;

	
// hola, soy una función

function separar_hora($hora)
	{		
		$hora_arreglo = explode(":",$hora);
		$hora_final = $hora_arreglo[0].":".$hora_arreglo[1];
		return $hora_final; 	
	}

//

conectar();

$sq = mysql_query("select * from datos where inicio='".$fecha."' and status='cita-web' and titulo='' and iddoctor=".$id." and clinica ='".$clinica."' order by hinicio");
$num = mysql_num_rows ($sq);

mysql_query('SET CHARACTER SET utf8');

if ($num==0)
{
echo json_encode(array("horas" => Array()));
}
else 
{
	
$results = array();

	
$horas = array();
while($bd = mysql_fetch_array($sq))
	
	$horas[] = array("hora" => separar_hora($bd['hinicio']), "id" => $bd['id']);

			
echo json_encode(array("horas" => $horas));
	}
										  																				
desconectar();  

// fin


?>
