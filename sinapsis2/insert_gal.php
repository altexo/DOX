<?php
	include("../librerias/conexion.php");
	include_once("../librerias/libreriagraficaphp.php");

		
	if(isset($_POST['guardar']))
	{	
	
		$id_dr = $_POST['doctor'];
		conectar();
		$sql2 = "SELECT MAX(id) FROM galeria ";
		$result = mysql_query($sql2);
		$row = mysql_fetch_array($result);

		$id = $row['MAX(id)'] + 1;
		
	
		if(isset($_FILES['portada']['name']))
		{
			$foto_temp = $_FILES['portada']['tmp_name'];
			$foto_nombre = $_FILES['portada']['name'];
		}
		else
		{
			$foto_nombre = '';
		}
		if(isset($_FILES['img1']['name']))
		{
			$foto_temp1 = $_FILES['img1']['tmp_name'];
			$foto_nombre1 = $_FILES['img1']['name'];
		}
		else
		{
			$foto_nombre1 = '';
		}
		if(isset($_FILES['img2']['name']))
		{
			$foto_temp2 = $_FILES['img2']['tmp_name'];
			$foto_nombre2 = $_FILES['img2']['name'];
		}
		else
		{
			$foto_nombre2 = '';
		}
		if(isset($_FILES['img3']['name']))
		{
			$foto_temp3 = $_FILES['img3']['tmp_name'];
			$foto_nombre3 = $_FILES['img3']['name'];
		}
		else
		{
			$foto_nombre3 = '';
		}
		//Si sube imagen(incluyendo los campos obligatorios)
		if ($foto_nombre <> "" && $foto_nombre1 <> "" && $foto_nombre2 <> "" && $foto_nombre3 <> "")
		{
			$foto = $id."portada.jpg";
			$foto_thumb = $id."img_thumb.jpg";
			$foto1 = $id."img1.jpg";
			$foto1_thumb = $id."img1_thumb.jpg";
			$foto2 = $id."img2.jpg";
			$foto2_thumb = $id."img2_thumb.jpg";
			$foto3 = $id."img3.jpg";
			$foto3_thumb = $id."img3_thumb.jpg";
			
  
  			if (is_uploaded_file($foto_temp) && is_uploaded_file($foto_temp1)  && is_uploaded_file($foto_temp2)  && is_uploaded_file($foto_temp3))
  			{
				//genera la foto
				$ruta_foto = "fotos/";
			 	$registro_foto = $ruta_foto.$foto;
				copy($foto_temp, $registro_foto);
				thumbnail($ruta_foto, $ruta_foto, $foto,184,138); // solo imagen
				
				$registro_foto1 = $ruta_foto.$foto1;
				copy($foto_temp1, $registro_foto1);
				thumbnail($ruta_foto, $ruta_foto, $foto1,184,138); // solo imagen
				
				$registro_foto2 = $ruta_foto.$foto2;
				copy($foto_temp2, $registro_foto2);
				thumbnail($ruta_foto, $ruta_foto, $foto2,184,138); // solo imagen
				
				$registro_foto3 = $ruta_foto.$foto3;
				copy($foto_temp3, $registro_foto3);
				thumbnail($ruta_foto, $ruta_foto, $foto3,184,138); // solo imagen
				
				
  			}	 
			else
  			{
   				echo "Error al descargar la imagen.";
   			}
		
	
			
			$sql = "INSERT INTO galeria(id_doctor,portada,img1,img2,img3)".
		"VALUES ('".$id_dr."','".$foto."','".$foto1."','".$foto2."','".$foto3."')";
		
			
		
		
	
			if($result = mysql_query($sql))
			{ 
				?><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#090; "> <? echo "Datos guardados."; ?></span><?
			}
			
		}

	//}//isset($_FILES['imagen2']['name']))
		/*	else
		{
			?><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#C00; "><? echo "Título, Nombre, Apellido Paterno y Teléfono son OBLIGATORIOS."; ?></span><?
		}	*/
		desconectar();
	}//ISSET POST
?>
<body>