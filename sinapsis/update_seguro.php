<?php
	include("../librerias/conexion.php");
	include_once("../librerias/libreriagraficaphp.php");

		
	if(isset($_POST['guardar']))
	{	
		$nombre = utf8_decode($_POST['nombre']);
		
	
		conectar();
		//$sql2 = "SELECT MAX(id) FROM seguro ";
		//$result = mysql_query($sql2);
		//$row = mysql_fetch_array($result);

		$id = $_POST['hid'];
		if(isset($_FILES['logo']['name']))
		{
			$foto_temp = $_FILES['logo']['tmp_name'];
			$foto_nombre = $_FILES['logo']['name'];
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
				$ruta_foto = "logo_seguro/";
			 	$registro_foto = $ruta_foto.$foto;
				copy($foto_temp, $registro_foto);
				thumbnail($ruta_foto, $ruta_foto, $foto,184,138); // solo imagen	
  			}	 
			else
  			{
   				echo "Error al descargar la imagen.";
   			}
			if ($nombre <> "" )
			{				
				$sql = "Update seguro Set nombre = '".$nombre."', logo = '".$foto."' where id = '$id'";
				
				
	
				if($result = mysql_query($sql))
				{ 
					?><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#090; "> <? echo "Datos actualizados."; ?></span><?
				}
			}
		
		}
		else
		{
			$sql = "Update seguro Set nombre= '".$nombre."' where id = '".$id."'";
			
			
	
				if($result = mysql_query($sql))
				{ 
					?><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#090; "> <? echo "Datos actualizados."; ?></span><?
				}
		}
			desconectar();
	}
?>
<body>