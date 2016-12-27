<? 
session_start();
include("librerias/conexion.php");
include("librerias/libreriagraficaphp.php");

if(isset($_POST['Guardar']))
{	

$id_dr = $_SESSION['id_dr'];

$ep = $_POST['ep'];
$e1 = $_POST['e1'];
$e2 = $_POST['e2'];
$e3 = $_POST['e3'];


conectar();
$sql2 = "SELECT * FROM galeria WHERE id_doctor = ".$id_dr."";
$result = mysql_query($sql2);
$row = mysql_fetch_array($result);
		
$id = $row['id']; //id galería

//Portada
if(isset($_FILES['portada']['name']))
{
	$foto_temp = $_FILES['portada']['tmp_name'];
	$foto_nombre = $_FILES['portada']['name'];
}
else
{
	$foto_nombre = '';
	$foto_temp = '';
}
if($foto_nombre <> "")
{
	
	$foto = $id."portada.jpg";
  	$foto_thumb= $id."portadathumb.jpg";
  
  	if (is_uploaded_file($foto_temp))
  	{
		//genera las fotos
		$ruta_foto = "galeria_dr/";
		$registro_foto = $ruta_foto.$foto;
		copy($foto_temp, $registro_foto);
		thumbnail($ruta_foto, $ruta_foto, $foto, 298,450);
				
		// genera thumb2  
		$registro_thumb=$ruta_foto.$foto_thumb;
		copy($foto_temp, $registro_thumb); //insertando la fotografia en la tabla
		thumbnail($ruta_foto,$ruta_foto,$foto_thumb,104,146);  
  	}	 
			
	$sql = "UPDATE galeria SET portada = '".$foto."',portada_thumb = '".$foto_thumb."' WHERE id = ".$id."";
	if($result = mysql_query($sql))
	{
		?><span style="font-family:Calibri;"> <? echo "Portada Actualizada, " ?> </span> <? ;
	}
	else
	{
		?><span style="font-family:Calibri;"> <? echo "Problemas al actualizar la portada, " ?> </span> <? ;
	}
}
//Eliminar portada
if($ep == "p")
{
	$sql = "UPDATE galeria SET portada = '',portada_thumb = '' WHERE id = ".$id."";
	if($result = mysql_query($sql))
	{
		?><span style="font-family:Calibri;"> <? echo "Portada Eliminada, " ?> </span> <? ;
	}
	else
	{
		?><span style="font-family:Calibri;"> <? echo "Problemas al Eliminar la portada, " ?> </span> <? ;
	}
}

//Imagen 1 

if(isset($_FILES['img1']['name']))
{
	$foto1_temp = $_FILES['img1']['tmp_name']; 
	$foto1_nombre = $_FILES['img1']['name'];
}
else
{
	$foto1_nombre = '';
	$foto1_temp = '';
}
if($foto1_nombre <> "")
{
	$foto1 = $id."img1.jpg";
  	$foto1_thumb= $id."img1thumb.jpg";
  
  	if (is_uploaded_file($foto1_temp))
  	{
		//genera las fotos
		$ruta_foto1 = "galeria_dr/";
		$registro_foto1 = $ruta_foto1.$foto1;
		copy($foto1_temp, $registro_foto1);
		thumbnail($ruta_foto1, $ruta_foto1, $foto1, 676,450);
				
		// genera thumb2  
		$registro_thumb1=$ruta_foto1.$foto1_thumb;
		copy($foto1_temp, $registro_thumb1); //insertando la fotografia en la tabla
		thumbnail($ruta_foto1,$ruta_foto1,$foto1_thumb,60,40);  
  	}	 
			
	$sql = "UPDATE galeria SET img1 = '".$foto1."',img1_thumb = '".$foto1_thumb."' WHERE id = ".$id."";
	if($result = mysql_query($sql))
	{
		?><span style="font-family:Calibri;"> <? echo "Imagen 1 actualizada, " ?> </span> <? ;
	}
	else
	{
		?><span style="font-family:Calibri;"> <? echo "Problemas al actualizar imagen 1, " ?> </span> <? ;
	}
}

//Eliminar img1
if($e1 == "1")
{
	$sql = "UPDATE galeria SET img1 = '',img1_thumb = '' WHERE id = ".$id."";
	if($result = mysql_query($sql))
	{
		?><span style="font-family:Calibri;"> <? echo "Imagen 1 Eliminada, " ?> </span> <? ;
	}
	else
	{
		?><span style="font-family:Calibri;"> <? echo "Problemas al Eliminar imagen1, " ?> </span> <? ;
	}
}


//Imagen 2 

if(isset($_FILES['img2']['name']))
{
	$foto2_temp = $_FILES['img2']['tmp_name']; 
	$foto2_nombre = $_FILES['img2']['name'];
}
else
{
	$foto2_nombre = '';
	$foto2_temp = '';
}
if($foto2_nombre <> "")
{
	$foto2 = $id."img2.jpg";
  	$foto2_thumb= $id."img2thumb.jpg";
  
  	if (is_uploaded_file($foto2_temp))
  	{
		//genera las fotos
		$ruta_foto2 = "galeria_dr/";
		$registro_foto2 = $ruta_foto2.$foto2;
		copy($foto2_temp, $registro_foto2);
		thumbnail($ruta_foto2, $ruta_foto2, $foto2, 676,450);
				
		// genera thumb2  
		$registro_thumb2=$ruta_foto2.$foto2_thumb;
		copy($foto2_temp, $registro_thumb2); //insertando la fotografia en la tabla
		thumbnail($ruta_foto2,$ruta_foto2,$foto2_thumb,60,40);  
  	}	 
			
	$sql = "UPDATE galeria SET img2 = '".$foto2."',img2_thumb = '".$foto2_thumb."' WHERE id = ".$id."";
	if($result = mysql_query($sql))
	{
		?><span style="font-family:Calibri;"> <? echo "Imagen 2 actualizada" ?> </span> <? ;
	}
	else
	{
		?><span style="font-family:Calibri;"> <? echo "Problemas al actualizar imagen 2, " ?> </span> <? ;
	}
}

//Eliminar img2
if($e2 == "2")
{
	$sql = "UPDATE galeria SET img2 = '',img2_thumb = '' WHERE id = ".$id."";
	if($result = mysql_query($sql))
	{
		?><span style="font-family:Calibri;"> <? echo "Imagen 2 Eliminada, " ?> </span> <? ;
	}
	else
	{
		?><span style="font-family:Calibri;"> <? echo "Problemas al Eliminar imagen2, " ?> </span> <? ;
	}
}

//Imagen 3 

if(isset($_FILES['img3']['name']))
{
	$foto3_temp = $_FILES['img3']['tmp_name']; 
	$foto3_nombre = $_FILES['img3']['name'];
}
else
{
	$foto3_nombre = '';
	$foto3_temp = '';
}
if($foto3_nombre <> "")
{
	$foto3 = $id."img3.jpg";
  	$foto3_thumb= $id."img3thumb.jpg";
  
  	if (is_uploaded_file($foto3_temp))
  	{
		//genera las fotos
		$ruta_foto3 = "galeria_dr/";
		$registro_foto3 = $ruta_foto3.$foto3;
		copy($foto3_temp, $registro_foto3);
		thumbnail($ruta_foto3, $ruta_foto3, $foto3, 676,450);
				
		// genera thumb2  
		$registro_thumb3=$ruta_foto3.$foto3_thumb;
		copy($foto3_temp, $registro_thumb3); //insertando la fotografia en la tabla
		thumbnail($ruta_foto3,$ruta_foto3,$foto3_thumb,60,40);  
  	}	 
			
	$sql = "UPDATE galeria SET img3 = '".$foto3."',img3_thumb = '".$foto3_thumb."' WHERE id = ".$id."";
	if($result = mysql_query($sql))
	{
		?><span style="font-family:Calibri;"> <? echo "Imagen 3 actualizada, " ?> </span> <? ;
	}
	else
	{
		?><span style="font-family:Calibri;"> <? echo "Problemas al actualizar imagen 3, " ?> </span> <? ;
	}
}

//Eliminar img3
if($e3 == "3")
{
	$sql = "UPDATE galeria SET img3 = '',img3_thumb = '' WHERE id = ".$id."";
	if($result = mysql_query($sql))
	{
		?><span style="font-family:Calibri;"> <? echo "Imagen 3 Eliminada." ?> </span> <? ;
	}
	else
	{
		?><span style="font-family:Calibri;"> <? echo "Problemas al Eliminar imagen3." ?> </span> <? ;
	}
}


desconectar();
}

?>

