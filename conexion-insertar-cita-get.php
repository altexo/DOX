<?php 
error_reporting(0);
// 01- ESTOS PARÁMETROS PONLOS COMO TÚ LOS NECESITES ALBERTEIN
session_start();
$id = $_GET['id']; //id del médico
$idhora = $_GET['idhora']; //id del médico
$clinica = $_GET['clinica']; // id de la clínica
$especialidad  = $_GET['especialidad'];

$paciente = $_GET['paciente']; //Nombre del paciente
$idpaciente = $_GET['idpaciente']; //Nombre del paciente
$motivo = $_GET['motivo']; //Motivo seleccionado
$celular = $_GET['celular']; //Celular especificado

// FIN DE DECLARACIÓN DE PARÁMETROS


// 02- GENERA 2 LETRAS Y 3 NÚMEROS ALEATORIOS PARA RESERVA
   
     $the_char = array(   
     "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"  
     );   
	 
     $the_char2 = array(   
     "1","2","3","4","5","6","7","8","9","0"  
     ); 

     $max_elements = count($the_char) - 1;   
	 $max_elements2 = count($the_char2) - 1;  
     mt_srand(time());    

     $c1 = $the_char[mt_rand(0,$max_elements)];    
     $c2 = $the_char[mt_rand(0,$max_elements)];    
     $c3 = $the_char2[mt_rand(0,$max_elements2)];    
     $c4 = $the_char2[mt_rand(0,$max_elements2)];    
     $c5 = $the_char2[mt_rand(0,$max_elements2)];    
       
     $reserva= "$c1$c2$c3$c4$c5";   
   
//FIN GENERADOR DE RESERVACIÓN




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



//EXTRAE PACIENTE
$sqlpaciente = "Select * From paciente where id = '".$idpaciente."'";
$result = mysql_query($sqlpaciente);
$rowpaciente = mysql_fetch_array($result);
//EXTRAE DATOS FECHA
$sqlfecha = "Select * From datos where id = '".$idhora."'";
$result2 = mysql_query($sqlfecha);
$rowfecha = mysql_fetch_array($result2);
//EXTRAE DATOS DOC
$sqldoc = "Select * From doctor where id = '".$id."'";
$result3 = mysql_query($sqldoc);
$rowdoc = mysql_fetch_array($result3);
//EXTRAE DATOS CLINICA
$sqlclinica = "Select * From clinica where id = '".$clinica."'";
$result4 = mysql_query($sqlclinica);
$rowclinica = mysql_fetch_array($result4);


$hora3= $rowfecha['hinicio'];

	
		 $hora_arreglo = explode(":",$hora3);
		 $hora_final2 = $hora_arreglo[0].":".$hora_arreglo[1];	
			
	

//GENERA MENSAJE DE RESERVACIÓN DE CITA Y LA GUARDA EN TEXTO
$texto = "Email: ".$rowpaciente['email']." _____________________________ Celular: ".$rowpaciente['celular']." _____________________________ Motivo: ".$motivo." _____________________________ Reserva: ".$reserva."";
//FIN DE GENERA MENSAJE



//INSERTA DATO EN CALENDARIO DEL MÉDICO - (ID PACIENTE LO TRAES EN SESIÓN ASÍ COMO ID DEL MÉDICO)

	$d = "update datos set titulo='".$paciente."', status='cita-hecha', bodyf = '".$texto."', idpaciente = ".$idpaciente." where id=".$idhora." and iddoctor=".$id."";
	$datos = mysql_query($d);
//FIN DE INSERCIÓN


echo json_encode(array("reserva" => $reserva, "sql" => $d, "exito" => true));


//Enviar correo a paciente cita registrada
$email = $rowpaciente['email'];

$hora = $hora_final;

$fecha = $rowfecha['inicio'];

$dir1 = $rowclinica['calle']. $rowclinica['numero'];
$dir2 = $rowclinica['colonia'];


$nomdoctor = $rowdoc['nombre']." ".$rowdoc['a_paterno']." ".$rowdoc['a_materno'];
$nomesp = $nom;

$sql3 = "SELECT * FROM paciente WHERE email='".$email."'";
$resultado3 = mysql_query($sql3) or die('La consulta fall&oacute;: ' . mysql_error());
$row3=mysql_fetch_array($resultado3);
desconectar();
$sfrom="DOX <no_contestar@dox.mx>"; //cuenta que envia 
$sdestinatario=$email; //cuenta destino 
$ssubject="Cita exitosa en DOX.mx"; //subject 
$shtml=	"
<html> 
			
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<body bgcolor=\"#DCEEFC\"> 

<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family:arial\" >
  <tr>
    <td height=\"40\" colspan=\"3\" align=\"center\" valign=\"middle\" bgcolor=\"#66CCFF\"><a href=\"http://www.dox.mx\" style=\"color:white\">Mensaje generado desde dox.mx</a></td>
  </tr>
  <tr>
    <td width=\"10%\">&nbsp;</td>
    <td align=\"center\"><a href=\"index.php\"><img src=\"http://www.dox.mx/visual/exito1.png\" width=\"545\" height=\"44\" /></a></td>
    <td width=\"10%\">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align=\"center\" style=\"font-size:13px\"><p><br>
        <em>Hola ".$paciente.":</em></p>
      <p>-----------------------------------------</p>
    <p><strong>Su cita:</strong><br>
      ".$hora_final2." el ".$fecha." </p>
    <p>-----------------------------------------</p>
    <p><strong>Lugar:
      </strong><br>".$dir1." <br>".$dir2."</p>
    <p>-----------------------------------------</p>
    <p><strong>Doctor:</strong><br>
      ".$nomdoctor." - ".$nomesp."</p>
    <p>-----------------------------------------<br>
    </p>
   <strong>Clave de Reserva:</strong>
     <h2>".$reserva."</h2>
     <br> Te recordamos que es muy importante presentarte con anticipación a la misma y que en caso de cancelación lo puedes hacer con 2 horas de anticipación.
	 <br>
      <br>
      Recuerda que puedes acceder a tu panel de control con tu email y contraseña donde puedes checar tus citas en línea.<br>
      <a href=\"http://www.dox.mx/panel.php\">http://www.dox.mx/panel.php</a><br>
      <br>
      DOX.mx es marca registrada 2014.
<br>
      <br>
	  <p style=\"font-size:10px\">AVISO DE PRIVACIDAD SIMPLIFICADO: DOX SOLUTIONS, S.A. DE C.V., CON DOMICILIO EN CALLE RIO QUELITE NO. 180, COL. GUADALUPE C.P. 80220 EN CULIACÁN, SINALOA, MÉXICO. UTILIZARÁ SUS DATOS PERSONALES AQUÍ RECABADOS PARA PODER GARANTIZAR EL BUEN FUNCIONAMIENTO DE LA APLICACIÓN Y/O HERRAMIENTA WEB A LA QUE ESTÁN ACCESANDO, ASÍ COMO RECIBIR NOTIFICACIONES, INVITACIONES, PROMOCIONES Y NOTICIAS, PARA PODER PERMITIR LA IDENTIFICACIÓN DEL USUARIO EN CASO DE MAL USO DEL SITIO. SI REQUIERE MAYOR INFORMACIÓN ACERCA DEL TRATAMIENTO Y DE LOS DERECHOS QUE PUEDE HACER VALER, USTED PUEDE ACCEDER AL AVISO DE PRIVACIDAD COMPLETO A TRAVÉS DE NUESTRA PAGINA <a href=\"http://www.dox.mx\" target=\"_blank\">WWW.DOX.MX</a> Y/O AL CORREO ELECTRONICO <a href=\"mailto:correo@dox.mx\">CORREO@DOX.MX</a>.</p>
   </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height=\"111\" background=\"http://dox.mx/visual/ciudad.png\"  colspan=\"3\" style=\" background-image:url(http://dox.mx/visual/ciudad.png); background-position:initial initial; background-repeat:repeat no-repeat; height:111px; margin-top:20px\" >&nbsp;</td>
  </tr>
</table>		
			
	</body></html>";
			$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 
			$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
			$sheader=$sheader."Mime-Version: 1.0\n"; 
			$sheader=$sheader."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
			mail($sdestinatario,$ssubject,$shtml,$sheader);
		
			
//Enviar correo doctor, paciente realizó una cita
$emaildr = $rowdoc['email'];


			$sfrom1="DOX <no_contestar@dox.mx>"; //cuenta que envia 
			$sdestinatario1=$emaildr; //cuenta destino 
			$ssubject1="Tiene una nueva cita - DOX.mx"; //subject 
			$shtml1= "
			<html> 
			
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<body bgcolor=\"#DCEEFC\"> 

<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family:arial\" >
  <tr>
    <td height=\"40\" colspan=\"3\" align=\"center\" valign=\"middle\" bgcolor=\"#66CCFF\"><a href=\"http://www.dox.mx\" style=\"color:white\">Mensaje generado desde DOX.mx</a></td>
  </tr>
  <tr>
    <td width=\"10%\">&nbsp;</td>
    <td align=\"center\"><a href=\"index.php\"><img src=\"http://www.dox.mx/visual/exito1.png\" width=\"545\" height=\"44\" /></a></td>
    <td width=\"10%\">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align=\"center\" style=\"font-size:13px\"><p><br>
        <em>Nombre del paciente: ".$paciente."</em></p>
      <p>-----------------------------------------</p>
    <p><strong>Contacto:</strong><br>
      ".$row3['email']." Cel: ".$row3['celular']." </p>
    <p>-----------------------------------------</p>
	<p><strong>Su cita:</strong><br>
      ".$hora_final2." el ".$fecha." </p>
    <p>-----------------------------------------</p>
    <p><strong>Lugar:
      </strong><br>".$dir1." <br>".$dir2."</p>
    <p>-----------------------------------------</p>
  
   <strong>Clave de Reserva:</strong>
     <h2>".$reserva."</h2>
     <br>
      <br>
      DOX.mx es marca registrada 2014.
<br>
      <br>
	  <p style=\"font-size:10px\">AVISO DE PRIVACIDAD SIMPLIFICADO: DOX SOLUTIONS, S.A. DE C.V., CON DOMICILIO EN CALLE RIO QUELITE NO. 180, COL. GUADALUPE C.P. 80220 EN CULIACÁN, SINALOA, MÉXICO. UTILIZARÁ SUS DATOS PERSONALES AQUÍ RECABADOS PARA PODER GARANTIZAR EL BUEN FUNCIONAMIENTO DE LA APLICACIÓN Y/O HERRAMIENTA WEB A LA QUE ESTÁN ACCESANDO, ASÍ COMO RECIBIR NOTIFICACIONES, INVITACIONES, PROMOCIONES Y NOTICIAS, PARA PODER PERMITIR LA IDENTIFICACIÓN DEL USUARIO EN CASO DE MAL USO DEL SITIO. SI REQUIERE MAYOR INFORMACIÓN ACERCA DEL TRATAMIENTO Y DE LOS DERECHOS QUE PUEDE HACER VALER, USTED PUEDE ACCEDER AL AVISO DE PRIVACIDAD COMPLETO A TRAVÉS DE NUESTRA PAGINA <a href=\"http://www.dox.mx\" target=\"_blank\">WWW.DOX.MX</a> Y/O AL CORREO ELECTRONICO <a href=\"mailto:correo@dox.mx\">CORREO@DOX.MX</a>.</p>
   </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height=\"111\" background=\"http://dox.mx/visual/ciudad.png\"  colspan=\"3\" style=\" background-image:url(http://dox.mx/visual/ciudad.png); background-position:initial initial; background-repeat:repeat no-repeat; height:111px; margin-top:20px\" >&nbsp;</td>
  </tr>
</table>		
			
	</body></html>
			
			
			";
			$sheader1="From:".$sfrom."\nReply-To:".$sfrom1."\n"; 
			$sheader1=$sheader1."X-Mailer:PHP/".phpversion()."\n"; 
			$sheader1=$sheader1."Mime-Version: 1.0\n"; 
			$sheader1=$sheader1."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
			mail($sdestinatario1,$ssubject1,$shtml1,$sheader1);
			
			
			//echo "emailp ".$email." fecha".$fecha." dir1".$dir1." dir2".$dir2." dir3".$dir3." nomdr".$nomdoctor." nomesp".$nomesp." emaildr".$emaildr;
	



				  																				
desconectar();  

// fin


?>
