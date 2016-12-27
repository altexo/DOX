<?php
session_start();
	include("../librerias/conexion.php");
	
	if(isset($_POST['guardar']))
	{	
	
		
		
	$date=$_POST['fecha']; // dato de prueba
		$tDate = explode("/",$date);
		
		$dateToMySQL = $tDate[2]."-".$tDate[0]."-".$tDate[1];
		
		
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
		
		
		$seguros = ",";
		
		if(isset($_POST['s1']))
			$seguros.= "1,";
		if(isset($_POST['s2']))
			$seguros.= "2,";
		if(isset($_POST['s3']))
			$seguros.= "3,";
		if(isset($_POST['s4']))
			$seguros.= "4,";
		if(isset($_POST['s5']))
			$seguros.= "5,";
		if(isset($_POST['s6']))
			$seguros.= "6,";
		
		
		
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
		
			
		
		
		
		
		
		

		conectar();
		
		
		
		
	

		//titulo,nombre,a_paterno,a_materno,fecha_nacimiento,id_ciudad,telefono,celular,nextel,presentacion,idiomas,descripcion
		//'".$titulo."','".$nombre."','".$a_paterno."','".$a_materno."','".$dateToMySQL."','".$ciudad."','".$telefono."','".$celular."','".$nextel."','".$presentacion."','".$idiomas."','".$descripcion."'
		
		/*$sql_c= "INSERT INTO clinica(id_doctor,nombre,calle,numero,numeroint,colonia,telefono,latitud,longitud,visa,mastercard,american)".
		"VALUES ('".$id."','".$nombre_c."','".$calle."','".$numero."','".$numeroint."','".$colonia."','".$telefono_c."','".$latitud."','".$longitud."','".$visa."','".$mastercard."','".$american."')";
		
		 && $result2 = mysql_query($sql_c) && $result3 = mysql_query($sql_e)
		
		*/
		if ($email <> "" && $pass <> "" /*&& $a_paterno <> "" && $dateToMySQL <> "" && $telefono <> ""*/)
		{
			
			$sql = "Update doctor Set titulo = '".$titulo."',nombre = '".$nombre."',a_paterno = '".$a_paterno."',a_materno = '".$a_materno."',fecha_nacimiento = '".$dateToMySQL."',telefono = '".$telefono."',celular = '".$celular."',nextel = '".$nextel."',email = '".$email."',educacion = '".$educacion."',idiomas= '".$idiomas."',certificaciones = '".$certificaciones."',seguros = '".$seguros."',tarjetas = '".$tarjetas."',pass = '".$pass."',cedula = '".$cedula."',cedula_esp = '".$cedula_esp."' where id = ".$_SESSION['id']."";
	
			if($result = mysql_query($sql))
			{ 
				?><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#090; "> <? echo "Datos guardados."; ?></span><?
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