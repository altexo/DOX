<?php
	include("librerias/conexion.php");
	
	if(isset($_POST['guardar']))
	{	
	
		
		
	/*$date=$_POST['fecha']; // dato de prueba
		$tDate = explode("/",$date);*/
		
		$dateToMySQL = $_POST['año']."-".$_POST['mes']."-".$_POST['dia'];
		
		
		$titulo = utf8_decode($_POST['titulo']);
		//$especialidad = utf8_decode($_POST['especialidad']);
		$nombre = utf8_decode($_POST['nombre']);
		$a_paterno = utf8_decode($_POST['a_paterno']);
		$a_materno = utf8_decode($_POST['a_materno']);
		$ciudad = utf8_decode($_POST['ciudad']);
		$telefono = utf8_decode($_POST['telefono']);
		$celular = utf8_decode($_POST['celular']);
		$nextel = utf8_decode($_POST['nextel']);
		$email = utf8_decode($_POST['email']);
		$educacion = utf8_decode($_POST['educacion']);
		$idiomas = utf8_decode($_POST['idiomas']);
		$certificaciones = utf8_decode($_POST['certificaciones']);
		
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
		
		$seg = ",";
		if(isset($_POST['s1']))
			$seg.= "1,";
		if(isset($_POST['s2']))
			$seg.= "2,";
		if(isset($_POST['s3']))
			$seg.= "3,";
		if(isset($_POST['s4']))
			$seg.= "4,";
		if(isset($_POST['s5']))
			$seg.= "5,";
		if(isset($_POST['s6']))
			$seg.= "6,";
		
		$esp = ",";
		if(isset($_POST['1']))
			$esp.= "1,";
		if(isset($_POST['2']))
			$esp.= "2,";
		if(isset($_POST['3']))
			$esp.= "3,";
		if(isset($_POST['4']))
			$esp.= "4,";
		if(isset($_POST['5']))
			$esp.= "5,";
		if(isset($_POST['6']))
			$esp.= "6,";
		if(isset($_POST['7']))
			$esp.= "7,";
		if(isset($_POST['8']))
			$esp.= "8,";
		if(isset($_POST['9']))
			$esp.= "9,";
		if(isset($_POST['10']))
			$esp.= "10,";
		if(isset($_POST['11']))
			$esp.= "11,";
		if(isset($_POST['12']))
			$esp.= "12,";
		if(isset($_POST['13']))
			$esp.= "13,";
		if(isset($_POST['14']))
			$esp.= "14,";
		if(isset($_POST['15']))
			$esp.= "15,";
		if(isset($_POST['16']))
			$esp.= "16,";
		if(isset($_POST['17']))
			$esp.= "17,";
		if(isset($_POST['18']))
			$esp.= "18,";
		if(isset($_POST['19']))
			$esp.= "19,";
		if(isset($_POST['20']))
			$esp.= "20,";
		if(isset($_POST['21']))
			$esp.= "21,";
		if(isset($_POST['22']))
			$esp.= "22,";
		if(isset($_POST['23']))
			$esp.= "23,";
		if(isset($_POST['24']))
			$esp.= "24,";
		if(isset($_POST['25']))
			$esp.= "25,";
		if(isset($_POST['26']))
			$esp.= "26,";
		if(isset($_POST['27']))
			$esp.= "27,";
		if(isset($_POST['28']))
			$esp.= "28,";
		if(isset($_POST['29']))
			$esp.= "29,";
		if(isset($_POST['30']))
			$esp.= "30,";
		if(isset($_POST['31']))
			$esp.= "31,";
		if(isset($_POST['32']))
			$esp.= "32,";
		if(isset($_POST['33']))
			$esp.= "33,";
		if(isset($_POST['34']))
			$esp.= "34,";
		if(isset($_POST['35']))
			$esp.= "35,";
		if(isset($_POST['36']))
			$esp.= "36,";
		if(isset($_POST['37']))
			$esp.= "37,";
		if(isset($_POST['38']))
			$esp.= "38,";
			if(isset($_POST['39']))
			$esp.= "39,";
		
			
		
		
		
		
		
		

		conectar();
		$sql2 = "SELECT id FROM doctor where email = '".$email."'";
		$result = mysql_query($sql2);
		$row = mysql_fetch_array($result);

		$id = $row['id'];
		
		
		
	

		$sql_e="Update doctor Set titulo = '".$titulo."',nombre = '".$nombre."',a_paterno = '".$a_paterno."',a_materno = '".$a_materno."',fecha_nacimiento = '".$dateToMySQL."',telefono = '".$telefono."',celular = '".$celular."',nextel = '".$nextel."',educacion = '".$educacion."' ,idiomas = '".$idiomas."' ,certificaciones = '".$certificaciones."',seguros = '".$seg."',tarjetas = '".$tarjetas."', pass = '".$pass."', cedula = '".$cedula."',cedula_esp = '".$cedula_esp."',publicar = '".$publicar."' where id = '".$id."'";
		
		$sql_c= "INSERT INTO clinica(id_doctor,nombre,calle,numero,numeroint,colonia,telefono,id_ciudad,latitud,longitud,especialidad) VALUES ('".$id."','".$nombre_c."','".$calle."','".$numero."','".$numeroint."','".$colonia."','".$telefono_c."','".$ciudad."','".$latitud."','".$longitud."','".$esp."')";
		
		
		$sql_g= "INSERT INTO galeria(id_doctor) VALUES ('".$id."')";
		
		 
		 
		 switch($titulo)
		 {
			 case 1: $t = "Dr"; break;
			 case 2: $t = "Dra"; break;
			 case 3: $t = "Psic"; break;
			 case 4: $t = "Sr"; break;
			 case 5: $t = "Sra"; break; 
			 case 6: $t = "Srita"; break;
			 case 7: $t = "MC"; break;
			 case 8: $t = "Lic"; break;
			 case 9: $t = "Ing"; break;
			
		 }
		
		
		
		if ($result2 = mysql_query($sql_c) && $result3 = mysql_query($sql_e) && $result4 = mysql_query($sql_g))
		{
			
	
			 
				?>
                
                <span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#090; "> <? echo "La información ha sido capturada exitosamente."; ?></span><?
				//Email de bienvenida y con los datos de login de nuevo y con liga para empezar a cargar horarios
				$sfrom="DOX <no_contestar@dox.mx>"; //cuenta que envia 
				$sdestinatario=$email; //cuenta destino 
				$ssubject="Bienvenido a dox.mx"; //subject 
				$shtml=	$t." ".$nombre." ".$a_paterno." ".$a_materno."\r\n BIENVENIDO A DOX, LA RED DE MÉDICOS MAS IMPORTANTE DEL PAÍS, A PARTIR DE ESTE
MOMENTO USTED PODRÁ PUBLICAR SUS HORARIOS DE CONSULTA Y DISFRUTAR LOS BENEFICIOS DE NUESTRA APLICACIÓN. \r\n A CONTINUACIÓN LE PROPORCIONAMOS DE MANERA CONFIDENCIAL SU INFORMACIÓN DE ACCESO \r\n Usuario: ".$email." Contraseña: ".$pass."\r\n Ingrese a Dox.mx para acceder al sistema o haga <a href='dox.mx/calendar/testing/index.php'> Clic aquí</a>";
					
				
				
				$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 
				$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
				$sheader=$sheader."Mime-Version: 1.0\n"; 
				$sheader=$sheader."Content-Type: text/html"; 
				mail($sdestinatario,$ssubject,$shtml,$sheader);
				
			
			
		}


		else
		{
			?><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#C00; "><? echo "Error al guardar."; ?></span><?
		}	
		desconectar();
	}
	
	
	//ISSET POST
	
?>

<body>