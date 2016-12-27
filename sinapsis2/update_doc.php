<?php
	include("../librerias/conexion.php");
	include_once("../librerias/libreriagraficaphp.php");

		
	if(isset($_POST['guardar']))
	{	
	
		
		
	$date=$_POST['fecha']; // dato de prueba
		$tDate = explode("/",$date);
		
		$dateToMySQL = $tDate[2]."-".$tDate[0]."-".$tDate[1];
		
		
		$titulo = utf8_decode($_POST['titulo']);
		$especialidad = utf8_decode($_POST['especialidad']);
		$nombre = utf8_decode($_POST['nombre']);
		$a_paterno = utf8_decode($_POST['a_paterno']);
		$a_materno = utf8_decode($_POST['a_materno']);
		$ciudad = utf8_decode($_POST['ciudad']);
		$telefono = utf8_decode($_POST['telefono']);
		$celular = utf8_decode($_POST['celular']);
		$nextel = utf8_decode($_POST['nextel']);
		$email = utf8_decode($_POST['email']);
		$presentacion = utf8_decode($_POST['presentacion']);
		$idiomas = utf8_decode($_POST['idiomas']);
		$descripcion = utf8_decode($_POST['descripcion']);
		
		$nombre_c = utf8_decode($_POST['nombre_c']);
		$calle = utf8_decode($_POST['calle']);
		$numero = utf8_decode($_POST['numero']);
		$numeroint = utf8_decode($_POST['numeroint']);
		$colonia = utf8_decode($_POST['colonia']);
		$telefono_c = utf8_decode($_POST['telefono_c']);
		$latitud = utf8_decode($_POST['latitud']);
		$longitud = utf8_decode($_POST['longitud']);
		
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
		
		
		
		
		conectar();
		

		$id = $_POST['id_h'];
		
	
		/*if(isset($_FILES['imagen2']['name']))
		{
			$foto_temp = $_FILES['imagen2']['tmp_name'];
			$foto_nombre = $_FILES['imagen2']['name'];
		}
		else
		{
			$foto_nombre = '';
		}
		//Si sube imagen(incluyendo los campos obligatorios)
		if ($foto_nombre <> "")
		{
			$foto = $id."tem.jpg";

			
  
  			if (is_uploaded_file($foto_temp))
  			{
				//genera la foto
				$ruta_foto = "../fotos_noticias/";
			 	$registro_foto = $ruta_foto.$foto;
				copy($foto_temp, $registro_foto);
				thumbnail($ruta_foto, $ruta_foto, $foto,184,138); // solo imagen
				
				
  			}	 
			else
  			{
   				echo "Error al descargar la imagen.";
   			}*/
		
	
		
		if ($titulo <> "" && $nombre <> "" && $a_paterno <> "" && $dateToMySQL <> "" && $telefono <> "")
		{
			
			$sql = "Update doctor Set titulo = '".$titulo."',nombre = '".$nombre."',a_paterno = '".$a_paterno."',a_materno = '".$a_materno."',fecha_nacimiento = '".$dateToMySQL."',id_ciudad = '".$ciudad."',telefono = '".$telefono."',celular = '".$celular."',nextel = '".$nextel."',email ='".$email."',presentacion = '".$presentacion."',idiomas = '".$idiomas."',descripcion='".$descripcion."' where id = '".$id."'";
		
			$sql_c= "Update clinica Set nombre='".$nombre_c."',calle='".$calle."',numero='".$numero."',colonia='".$colonia."',telefono='".$telefono_c."',latitud='".$latitud."',longitud='".$longitud."',visa='".$visa."',mastercard='".$mastercard."',american= '".$american."' where id_doctor ='".$id."'";
		
		
		$sql_e= "Update dr_esp Set id_esp='".$especialidad."' where id_dr ='".$id."'";
		
		
	
			if($result = mysql_query($sql) && $result2 = mysql_query($sql_c) && $result3 = mysql_query($sql_e))
			{ 
				?><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#090; "> <? echo "Datos actualizados."; ?></span><?
			}
			
		}

	//}//isset($_FILES['imagen2']['name']))
			else
		{
			?><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#C00; "><? echo "Título, Nombre, Apellido Paterno y Teléfono son OBLIGATORIOS."; ?></span><?
		}	
		desconectar();
	}//ISSET POST
?>
<body>