<?php 

// 01- ESTOS PARÁMETROS PONLOS COMO TÚ LOS NECESITES ALBERTEIN

$idpaciente = $_GET['idpaciente']; //ID Paciente

// FIN DE DECLARACIÓN DE PARÁMETROS

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Request-Method: *');
    header('Access-Control-Allow-Headers: x-requested-with');
    if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
	    header("HTTP/1.1 200 OK");
	    return;
    }

include("librerias/conexion2.php");
 header('Content-type: text/json');

switch($especialidad)
{
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
	case 13: $nom = "Gastroenterología-Endoscopía 	"; break;
	case 14: $nom = "Genética"; break;
	case 15: $nom = "Geriatría"; break;
	case 16: $nom = "Ginecología - Obstetricia"; break;
	case 17: $nom = "Hematología"; break;
	case 18: $nom = "Infectología"; break;
	case 19: $nom = "Medicina de Rehabilitación"; break;
	case 20: $nom = "Medicina Interna"; break;
	case 21: $nom = "Neumología"; break;
	case 22: $nom = "Neurología-neurocirugía"; break;
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


// hola, soy una función

function separar_hora($hora)
	{		
		 $hora_arreglo = explode(":",$hora);
		 $hora_final = $hora_arreglo[0].":".$hora_arreglo[1];	
		return $hora_final; 	
	}

//

conectar();

mysql_query('SET CHARACTER SET utf8');

//INSERTA DATO EN CALENDARIO DEL MÉDICO - (ID PACIENTE LO TRAES EN SESIÓN ASÍ COMO ID DEL MÉDICO)

$sq = mysql_query("select * from datos where idpaciente = " .$idpaciente ." and status ='cita-hecha'");	
$num = mysql_num_rows($sq);
				
mysql_query('SET CHARACTER SET utf8');

if ($num==0)
{
echo json_encode(array("citas" => array()));
}
else 
{
$horas = array();
while($bd = mysql_fetch_array($sq))
{
$perfil = mysql_query("select * from doctor where id = " .$bd['iddoctor'] );	
while($bd2 = mysql_fetch_array($perfil)) 
{
$clinica = mysql_query("select * from clinica where id = " .$bd['clinica'] );	
while($bd3 = mysql_fetch_array($clinica)) 
{
$galeria = mysql_query("select * from galeria where id_doctor = " .$bd['iddoctor'] );	
while($bd4 = mysql_fetch_array($galeria)) 
{
	switch($bd2['titulo'])
	{
		case 1: $bd2['titulo'] = "Dr"; break;
		case 2: $bd2['titulo'] = "Dra"; break;
		case 3: $bd2['titulo'] = "Psic"; break;
		case 4: $bd2['titulo'] = "Sr"; break;
		case 5: $bd2['titulo'] = "Sra"; break;
		case 6: $bd2['titulo'] = "Srita"; break;
		case 7: $bd2['titulo'] = "MC"; break;
		case 8: $bd2['titulo'] = "Lic"; break;
		case 9: $bd2['titulo'] = "Ing"; break;
		
	} 

$horas[] =  array("fecha" => $bd['inicio'], "hora" => $bd['hinicio'], "titulo" => $bd2['titulo'], "idmedico" => $bd['iddoctor'], "nombremedico" => $bd2['nombre'], "a_paterno" => $bd2['a_paterno'], "a_materno" => $bd2['a_materno'], "a_materno" => $bd2['a_materno'], "nombreclinica" => $bd3['nombre'], "calle" => $bd3['calle'], "numeroext" => $bd3['numero'], "numero" => $bd3['numeroint'], "colonia" => $bd3['colonia'], "latitud" => $bd3['latitud'], "longitud" => $bd3['longitud'], "portada" => $bd4['portada']);
}
}
}
}
			
echo json_encode(array("citas" => $horas));
}
										  																				
desconectar();  
// fin


?>
