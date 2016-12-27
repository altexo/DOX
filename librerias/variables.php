<?php
include_once('libreriagraficaphp.php');


$foto_temp= $_FILES[$campo_foto]['tmp_name'];
$foto_nombre= $_FILES[$campo_foto]['name'];
$foto_tipo= $_FILES[$campo_foto]['type'];
$foto_tamano= $_FILES[$campo_foto]['size'];

if ($foto_nombre <> "")
{
	  		 
	  $foto = $img_nom."_".$id.".jpg";
	  $foto2 = $img_nom2."_".$id.".jpg";
	  $foto3 = $img_nom3."_".$id.".jpg";
  
  $registro_foto= $ruta.$foto;
  $registro_foto2= $ruta.$foto2;
  $registro_foto3= $ruta.$foto3;
 
 if (is_uploaded_file($foto_temp))
  {

    @copy ($foto_temp,$registro_foto);
	@chmod($registro_foto,0777);
	thumbnail($ruta,$ruta,$foto,$tam_1, $tam_2);
	
	@copy ($foto_temp,$registro_foto2);
	@chmod($registro_foto2,0777);
	thumbnail($ruta,$ruta,$foto2,$tam_3, $tam_4);	

	@copy ($foto_temp,$registro_foto3);
	@chmod($registro_foto3,0777);
	thumbnail($ruta,$ruta,$foto3,$tam_5, $tam_6);	


  }	 
else
  {
   echo "error al descargar el archivo";
   }
	$val='';
}
?>

