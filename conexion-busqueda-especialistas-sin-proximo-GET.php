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

$especialidad = $_GET['especialidad'];
$ciudad = $_GET['ciudad'];
$seguro = $_GET['seguro'];
$fecha = $_GET['fecha'];

// 02 guarda sesión de especialidad 
$especialidad = $_GET['esp'] ;

// 03 arma una parte del query 

if($especialidad != '0')
	$sq_esp = "and clinica.especialidad like '%,".$especialidad.",%'";
else
	$sq_esp = " ";

if($ciudad != '0')
	$sq_ciu = "and clinica.id_ciudad = '".$ciudad."'";
else
	$sq_ciu = " ";
	
if($seguro != '0')
	$sq_seg = "and doctor.seguros like '%,".$seguro.",%'";
else
	$sq_seg = " ";
	
// hola, soy una función

function separar_hora($hora)
	{		
		 $hora_arreglo = explode(":",$hora);
		
		 $hora_final = $hora_arreglo[0].":".$hora_arreglo[1];
			
		return $hora_final; 
		
	}

//

conectar();

$sq = "SELECT doctor.id as id_doctor, clinica.id, clinica.latitud, clinica.longitud, doctor.titulo as titulo, doctor.nombre as nombremedico, doctor.a_paterno, doctor.a_materno, clinica.nombre as nombreclinica, clinica.calle, clinica.numero, clinica.numeroint, clinica.colonia, galeria.portada, doctor.tarjetas, doctor.seguros, doctor.educacion as educacion, doctor.certificaciones as certificaciones FROM doctor, clinica, galeria Where doctor.id = clinica.id_doctor  ".$sq_esp." ".$sq_ciu." ".$sq_seg." and doctor.id = galeria.id_doctor and doctor.publicar = '1' order by doctor.nombre, doctor.a_paterno, doctor.a_materno";
$sql = mysql_query($sq);
$num = mysql_num_rows ($sql);

switch($especialidad)
{
	case 0: $nom = "Todas"; break;
	case 1: $nom = "Alergología"; break;
	case 2: $nom = "Anestesiología"; break;
	case 3: $nom = "Angiología"; break;
	case 4: $nom = "Biología de la reproducción"; break;
	case 5: $nom = "Cardiología"; break;
	case 6: $nom = "Cirugía Bariátrica"; break;
	case 7: $nom = "Cirugía General"; break;
	case 8: $nom = "Cirugía Maxilofacial"; break;
	case 9: $nom = "Cirugía Plástica"; break;
	case 10: $nom = "Coloproctología"; break;
	case 11: $nom = "Dermatología"; break;
	case 12: $nom = "Endocrinología"; break;
	case 13: $nom = "Gastroenterología - Endoscopía"; break;
	case 14: $nom = "Genética"; break;
	case 15: $nom = "Geriatría"; break;
	case 16: $nom = "Ginecología - Obstetricia"; break;
	case 17: $nom = "Hematología"; break;
	case 18: $nom = "Infectología"; break;
	case 19: $nom = "Medicina de Rehabilitación"; break;
	case 20: $nom = "Medicina Interna"; break;
	case 21: $nom = "Neumología"; break;
	case 22: $nom = "Neurología - Neurocirugía"; break;
	case 23: $nom = "Nutrición"; break;
	case 24: $nom = "Pediatría"; break;
	case 25: $nom = "Psiquiatría - Psicología"; break;
	case 26: $nom = "Radiología y Ultrasonografista"; break;
	case 27: $nom = "Reumatología"; break;
	case 28: $nom = "Sexología"; break;
	case 29: $nom = "Traumatología y Ortopedia"; break;
	case 30: $nom = "Urología"; break;
	case 31: $nom = "Dentista"; break;
	case 32: $nom = "Odontopediatría"; break;
	case 33: $nom = "Otorrinolaringología"; break;
	case 34: $nom = "Oftalmología"; break;
	case 35: $nom = "Nefrología"; break;
	case 36: $nom = "Ortodoncia"; break;
	case 37: $nom = "Podología"; break;
	case 38: $nom = "Medicina del sueño"; break;
	case 39: $nom = "Medicina del deporte"; break;
}



mysql_query('SET CHARACTER SET utf8');
$result=mysql_query($sq);
$row = mysql_fetch_assoc($result);
$totalRows = mysql_num_rows($result);

switch($row['titulo'])
	{
		case 1: $row['titulo'] = "Dr"; break;
		case 2: $row['titulo'] = "Dra"; break;
		case 3: $row['titulo'] = "Psic"; break;
		case 4: $row['titulo'] = "Sr"; break;
		case 5: $row['titulo'] = "Sra"; break;
		case 6: $row['titulo'] = "Srita"; break;
		case 7: $row['titulo'] = "MC"; break;
		case 8: $row['titulo'] = "Lic"; break;
		case 9: $row['titulo'] = "Ing"; break;
		
	} 

//

if ($num==0)
{
echo json_encode(array("especialidad" => $nom, "resultados" => array()));
}
else 
{
	
$results = array();

do { //inicio de do
	// empieza la comprobación de horarios disponibles 
	$horarios = mysql_query("select * from datos where iddoctor 
			in(select id from doctor where id=".$row['id_doctor'].") and inicio='".$fecha."' 
			and status='cita-web' and titulo='' order by hinicio");	
$horas = array();
			while($bd = mysql_fetch_array($horarios))
			{
			$horas[] = separar_hora($bd['hinicio']);
			}
				
	//Aqui termina la comprobación
	
$row["seguros"] = substr($row["seguros"], 1, -1);
$row["seguros"] = split(",", $row["seguros"]);	
$row['horas'] = $horas;
$row["tarjetas"] = split(",", $row["tarjetas"]);	

// realiza rutina SIN HORARIOS DISPONIBLES
		$sq2 = mysql_query("select * from datos where inicio >= CURDATE() and status='cita-web' and titulo='' and iddoctor=".$row['id_doctor']." order by hinicio limit 1");
		$num2 = mysql_num_rows ($sq2);
		
			while($bd = mysql_fetch_array($sq2))
				$proxima = array("proximafecha" => $bd['inicio'], "id" => $bd['id']);
	$row["proximafecha"] = $proxima;
			// Fin de rutina de SIN HORARIOS DISPONIBLES

  $results[] = $row;
 
  
} while ($row = mysql_fetch_assoc($result));
echo json_encode(array("especialidad" => $nom, "resultados" => $results));
	} 
										  																				
desconectar();  

// fin


?>
