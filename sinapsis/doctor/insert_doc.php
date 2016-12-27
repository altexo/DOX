<?php
session_start();
	include("../librerias/conexion.php");
	
	if(isset($_POST['guardar']))
	{	
	
		//enviar correo de solicitud de cambios a los administradores 
		
	$date=$_POST['fecha']; // dato de prueba
		$tDate = explode("/",$date);
		
		$dateToMySQL = $tDate[2]."-".$tDate[0]."-".$tDate[1];
		
		switch($_POST['titulo'])
		{
			case 1: $titulo = "Dr"; break;
			case 2: $titulo = "Dra"; break;
			case 3: $titulo = "Psic"; break;
			case 4: $titulo = "Sr"; break;
			case 5: $titulo = "Sra"; break;
			case 6: $titulo = "Srita"; break;
			case 7: $titulo = "MC"; break;
			case 8: $titulo = "Lic"; break;
			case 9: $titulo = "Ing"; break;
			
		}
		
		//$especialidad = utf8_decode($_POST['especialidad']);
		$nombre = utf8_decode($_POST['nombre']);
		$a_paterno = utf8_decode($_POST['a_paterno']);
		$a_materno = utf8_decode($_POST['a_materno']);
		$ciudad = $_POST['ciudad'];
		$telefono = utf8_decode($_POST['telefono']);
		$celular = utf8_decode($_POST['celular']);
		$nextel = utf8_decode($_POST['nextel']);
		$email = utf8_decode($_POST['email']);
		$educacion = utf8_decode($_POST['educacion']);
		$idiomas = utf8_decode($_POST['idiomas']);
		$certificaciones = utf8_decode($_POST['certificaciones']);
		$nacimiento = $_POST['ano']."-".$_POST['mes']."-".$_POST['dia'];
		$pass = utf8_decode($_POST['pass']);
		$cedula = utf8_decode($_POST['cedula']);
		$cedula_esp = utf8_decode($_POST['cedula_esp']);
		
		
		
		$nombre_c = utf8_decode($_POST['nombre_c']);
		$calle = utf8_decode($_POST['calle']);
		$numero = utf8_decode($_POST['numero']);
		$numeroint = utf8_decode($_POST['numeroint']);
		$colonia = utf8_decode($_POST['colonia']);
		$telefono_c = utf8_decode($_POST['telefono_c']);
		$latitud = utf8_decode($_POST['latitud']);
		$longitud = utf8_decode($_POST['longitud']);
		
		if(isset($_POST['publicar']))
			$publicar = $_POST['publicar'];
		else
			$publicar = 0;
		
		if(isset($_POST['visa']))
			$visa = $_POST['visa'];
		else
			$visa = 0;
		if(isset($_POST['mastercard']))	
			$mastercard = $_POST['mastercard'];
		else
			$mastercard = 0;
		if(isset($_POST['american']))
			$american = $_POST['american'];
		else
			$american = 0;
			
		$tarjetas = $visa.",".$mastercard.",".$american;
		
		
		$seguros = ",";
		
		if(isset($_POST['s1']))
		{
			$seguros.= "1,";
			$s_email.="Mapfre-Tepeyac,";
		}
		if(isset($_POST['s2']))
		{
			$seguros.= "2,";
			$s_email.="GNP,";
		}
		if(isset($_POST['s3']))
		{
			$seguros.= "3,";
			$s_email.="Allianz,";
		}
		if(isset($_POST['s4']))
		{
			$seguros.= "4,";
			$s_email.="AXA,";
		}
		if(isset($_POST['s5']))
		{
			$seguros.= "5,";
			$s_email.="Met Life,";
		}
		if(isset($_POST['s6']))
		{
			$seguros.= "6,";
			$s_email.="Seguros Monterrey New York Life,";
		}
		
		
		
		$esp = ",";
		if(isset($_POST['1']))
		{
			$esp.= "1,";
			$e_email.= "Alergología,";
		}
		if(isset($_POST['2']))
		{
			$esp.= "2,";
			$e_email.= "Anestesiología,";
		}
		if(isset($_POST['3']))
		{
			$esp.= "3,";
			$e_email.= "Angiología,";
		}
		if(isset($_POST['4']))
		{
			$esp.= "4,";
			$e_email.= "Biología de la reproducción,";
		}
		if(isset($_POST['5']))
		{
			$esp.= "5,";
			$e_email.= "Cardiología,";
		}
		if(isset($_POST['6']))
		{
			$esp.= "6,";
			$e_email.= "Cirugía Bariátrica,";
		}
		if(isset($_POST['7']))
		{
			$esp.= "7,";
			$e_email.= "Cirugía General,";
		}
		if(isset($_POST['8']))
		{
			$esp.= "8,";
			$e_email.= "Cirugía Maxilofacial,";
		}
		if(isset($_POST['9']))
		{
			$esp.= "9,";
			$e_email.= "Cirugía Plástica,";
		}
		if(isset($_POST['10']))
		{
			$esp.= "10,";
			$e_email.= "Coloproctología,";
		}
		if(isset($_POST['11']))
		{
			$esp.= "11,";
			$e_email.= "Dermatología,";
		}
		if(isset($_POST['12']))
		{
			$esp.= "12,";
			$e_email.= "Endocrinología,";
		}
		if(isset($_POST['13']))
		{
			$esp.= "13,";
			$e_email.= "Gastroenterología-Endoscopía,";
		}
		if(isset($_POST['14']))
		{
			$esp.= "14,";
			$e_email.= "Genética,";
		}
		if(isset($_POST['15']))
		{
			$esp.= "15,";
			$e_email.= "Geriatría,";
		}
		if(isset($_POST['16']))
		{
			$esp.= "16,";
			$e_email.= "Ginecología - Obstetricia,";
		}
		if(isset($_POST['17']))
		{
			$esp.= "17,";
			$e_email.= "Hematología,";
		}
		if(isset($_POST['18']))
		{
			$esp.= "18,";
			$e_email.= "Infectología,";
		}
		if(isset($_POST['19']))
		{
			$esp.= "19,";
			$e_email.= "Medicina de Rehabilitación,";
		}
		if(isset($_POST['20']))
		{
			$esp.= "20,";
			$e_email.= "Medicina Interna,";
		}
		if(isset($_POST['21']))
		{
			$esp.= "21,";
			$e_email.= "Neumología,";
		}
		if(isset($_POST['22']))
		{
			$esp.= "22,";
			$e_email.= "Neurología - Neurocirugía,";
		}
		if(isset($_POST['23']))
		{
			$esp.= "23,";
			$e_email.= "Nutrición,";
		}
		if(isset($_POST['24']))
		{
			$esp.= "24,";
			$e_email.= "Pediatría,";
		}
		if(isset($_POST['25']))
		{
			$esp.= "25,";
			$e_email.= "Psiquiatría-Psicología,";
		}
		if(isset($_POST['26']))
		{
			$esp.= "26,";
			$e_email.= "Radiología y Ultrasonografista,";
		}
		if(isset($_POST['27']))
		{
			$esp.= "27,";
			$e_email.= "Reumatología,";
		}
		if(isset($_POST['28']))
		{
			$esp.= "28,";
			$e_email.= "Sexología,";
		}
		if(isset($_POST['29']))
		{
			$esp.= "29,";
			$e_email.= "Traumatología y Ortopedia,";
		}
		if(isset($_POST['30']))
		{
			$esp.= "30,";
			$e_email.= "Urología,";
		}

/* Nuevas especialidades */

		if(isset($_POST['31']))
		{
			$esp.= "31,";
			$e_email.= "Dentista,";
		}
		if(isset($_POST['32']))
		{
			$esp.= "32,";
			$e_email.= "Odontopediatría,";
		}
		if(isset($_POST['33']))
		{
			$esp.= "33,";
			$e_email.= "Otorrinolaringología,";
		}
		if(isset($_POST['34']))
		{
			$esp.= "34,";
			$e_email.= "Oftalmología,";
		}
		if(isset($_POST['35']))
		{
			$esp.= "35,";
			$e_email.= "Nefrología,";
		}
		if(isset($_POST['36']))
		{
			$esp.= "36,";
			$e_email.= "Ortodoncia,";
		}
		if(isset($_POST['37']))
		{
			$esp.= "37,";
			$e_email.= "Podología,";
		}
		if(isset($_POST['38']))
		{
			$esp.= "38,";
			$e_email.= "Medicina del Sueño,";
		}
		if(isset($_POST['39']))
		{
			$esp.= "39	,";
			$e_email.= "Mediciona del Deporte";
		}
		
		
			
		
		
		
		
		
		

		conectar();
		
		
		
		
	

		//titulo,nombre,a_paterno,a_materno,fecha_nacimiento,id_ciudad,telefono,celular,nextel,presentacion,idiomas,descripcion
		//'".$titulo."','".$nombre."','".$a_paterno."','".$a_materno."','".$dateToMySQL."','".$ciudad."','".$telefono."','".$celular."','".$nextel."','".$presentacion."','".$idiomas."','".$descripcion."'
		
		/*$sql_c= "INSERT INTO clinica(id_doctor,nombre,calle,numero,numeroint,colonia,telefono,latitud,longitud,visa,mastercard,american)".
		"VALUES ('".$id."','".$nombre_c."','".$calle."','".$numero."','".$numeroint."','".$colonia."','".$telefono_c."','".$latitud."','".$longitud."','".$visa."','".$mastercard."','".$american."')";
		
		 && $result2 = mysql_query($sql_c) && $result3 = mysql_query($sql_e)
		
		*/
		if ($email <> "" /*&& $a_paterno <> "" && $dateToMySQL <> "" && $telefono <> ""*/)
		{
			
		/*	$sql = "Update doctor Set titulo = '".$titulo."',nombre = '".$nombre."',a_paterno = '".$a_paterno."',a_materno = '".$a_materno."',fecha_nacimiento = '".$dateToMySQL."',telefono = '".$telefono."',celular = '".$celular."',nextel = '".$nextel."',email = '".$email."',educacion = '".$educacion."',idiomas= '".$idiomas."',certificaciones = '".$certificaciones."',seguros = '".$seguros."',tarjetas = '".$tarjetas."',pass = '".$pass."',cedula = '".$cedula."',cedula_esp = '".$cedula_esp."' where id = ".$_SESSION['id']."";*/
		
		$sfrom="".$nombre." ".$a_pateno." <".$email.">"; //Cuenta que envía.
		$sdestinatario="clientes@dox.mx, menteinteractiva@live.com"; //Cuenta destino.
		$ssubject="DOX - Prellenado de ficha"; //subject 
		$shtml="
		<html> 
			
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<body bgcolor=\"#DCEEFC\"> 


		
		<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family:arial\" >
  <tr>
    <td height=\"40\" colspan=\"3\" align=\"center\" valign=\"middle\" bgcolor=\"#66CCFF\"><a href=\"http://www.dox.mx\" style=\"color:white\">Prellenado de Ficha Médica</a></td>
  </tr>
  <tr>
    <td width=\"10%\">&nbsp;</td>
    <td align=\"center\"><a href=\"index.php\"><img src=\"http://www.dox.mx/visual/exito1.png\" width=\"545\" height=\"44\" /></a></td>
    <td width=\"10%\">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td  style=\"font-size:13px\">
		<h2>DATOS DOCTOR</h2>
		<strong>Título:</strong> ".$titulo."<br>
		<strong>Nombre:</strong> ".$nombre."<br>
		<strong>Apellido Paterno:</strong> ".$a_paterno."<br>
		<strong>Apellido Materno:</strong> ".$a_materno."<br>
		<strong>Nacimiento:</strong> ".$nacimiento."<br>
		<strong>Ciudad:</strong> ".$ciudad."<br>
		<strong>Teléfono:</strong> ".$telefono."<br>
		<strong>Celular:</strong> ".$celular."<br>
		<strong>Nextel:</strong> ".$nextel."<br>
		<strong>Email:</strong> ".$email."<br>
		<strong>Educación:</strong> ".$educacion."<br>
		<strong>Idiomas:</strong> ".$idiomas."<br>
		<strong>Certificaciones:</strong> ".$certificaciones."<br>
		
		<strong>Cédula:</strong> ".$cedula."<br>
		<strong>Cédula especialidad:</strong> ".$cedula_esp."<br>
		<strong>Seguros:</strong> ".$s_email."<br><br>
		<h2>DATOS CLÍNICA</h2><br>
		<strong>Nombre:</strong> ".$nombre_c."<br>
		<strong>Calle:</strong> ".$calle."<br>
		<strong>Número:</strong> ".$numero."<br>
		<strong>Número int:</strong> ".$numeroint."<br>
		<strong>Colonia:</strong> ".$colonia."<br>
		<strong>Teléfono:</strong> ".$telefono_c."<br>
		<strong>Latitud:</strong> ".$latitud."<br>
		<strong>Longitud:</strong> ".$longitud."<br>
		<strong>Especialidades:</strong> ".$e_email."<br>
      <br>
      DOX.mx es marca registrada 2013.
<br>
      <br>
   </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height=\"111\" background=\"http://dox.mx/visual/ciudad.png\"  colspan=\"3\" style=\" background-image:url(http://dox.mx/visual/ciudad.png); background-position:initial initial; background-repeat:repeat no-repeat; height:111px; margin-top:20px\" >&nbsp;</td>
  </tr>
</table>		
			
	</body></html>
		";

		$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 
		$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
		$sheader=$sheader."Mime-Version: 1.0\n"; 
		$sheader=$sheader."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
		
			
			if(mail($sdestinatario,$ssubject,$shtml,$sheader))/*$result = mysql_query($sql)*/
			{ 
				?><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#090; "> <? echo "Solicitud Enviada."; ?></span><?
			}
			
		}
		
		
		

	//}//isset($_FILES['imagen2']['name']))
	
	/*------------*/
			else
		{
			?><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#C00; "><? echo "Email y contraseña son OBLIGATORIOS."; ?></span><?
		}	
		desconectar();
	}
	
	
	//ISSET POST
	
?>

<body>