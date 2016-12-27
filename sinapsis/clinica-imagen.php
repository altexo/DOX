<? 
 session_start();
 include("librerias/conexion.php");
 include("librerias/libreriagraficaphp.php");
 
 $_SESSION['id_dr'] = $_GET['id_dr'];
 $id_dr = $_SESSION['id_dr'];
 
 conectar();
 $sql = mysql_query("Select * from galeria where id_doctor = ".$id_dr."");
 $row = mysql_fetch_array($sql);
 
 $sql2 = mysql_query("Select * from doctor where id = ".$id_dr."");
 $row2 = mysql_fetch_array($sql2);
 desconectar();
 
 switch($row2[1])
	{
		case 1: $tit = "Dr"; break;
		case 2: $tit = "Dra"; break;
		case 3: $tit = "Psic"; break;
		case 4: $tit = "Sr"; break;
		case 5: $tit = "Sra"; break;
		case 6: $tit = "Srita"; break;
		case 7: $tit = "MC"; break;
		case 8: $tit = "Lic"; break;
		case 9: $tit = "Ing"; break;
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DOX</title>
<link href="_css/sinapsis_novo.css" rel="stylesheet" type="text/css" />
<style type="text/css"></style>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
</head>

<body>
<div id="encabezado"><img src="_assets/logo.png" width="200" height="73" /></div>
<div id="menu">
  <p>Seleccione una opción</p>
  <a href="doctor.php" class="navi">Médicos</a> <!--<a href="galeria.php" class="navi">Imágenes de médicos</a>--> <a href="seguros.php" class="navi">Seguros Médicos</a>
  <p style="clear:both">&nbsp;</p>
</div>
<form action="clinica-imagen2.php" method="post" enctype="multipart/form-data" target="portada" name="form1" id="form1" >

  <div id="contenido">
    <h1>Galería Médicos </h1>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <a class="botongen"  href="doctor.php">&lt; Regresar </a>
    <div class="etiqueta_ubica"> Usted está editando la galería de <? echo utf8_encode($tit." ".$row2[2]." ".$row2[3]." ".$row2[4]); ?> </div>
    <div id="salvar">Debe hacer clic en el botón Guardar Cambios para que todo el progreso que haya hecho en ésta página se aplique en el sistema, de lo contrario los cambios se perderán.<br />
      <br />
      <!--<a href="clinica-imagen2.php" class="botonsalvar">Guardar Cambios</a>--><input name="Guardar" type="submit" id="Guardar" value="Guardar Cambios" class="botonsalvar" />
      <br />
      <iframe name="portada" allowtransparency="true" style="border:none; "  width="500px" height="40px" id="portada" scrolling="Auto"> </iframe>
<br />
    </div>
    <div id="contenedor_imagenes">
      <p>&nbsp;</p>
      <div id="caja">
        <div class="examinar">
          <p>Portada (298x450)</p>
          <p>&nbsp;</p>
          <p>
            <label for="imagen6"></label>
            <input type="file" name="portada" id="portada" />
          </p>
          <p><a href="#">
            <input type="checkbox" name="ep" id="ep" value="p" />
          Eliminar imagen (dejar espacio en blanco)</a>&nbsp;<img src="_assets/cancel1.png" width="16" height="16" /></p>
        </div>
        <div class="placeholder"><? if($row['portada'] != '') { ?><img src="galeria_dr/<? echo $row['portada']; ?>" alt="" width="230" height="176" /> <? } ?></div>
        <p>&nbsp;</p>
      </div>
      <div id="caja2">
        <div class="examinar">
          <p>Imagen Secundaria 1 (676x450)</p>
          <p>&nbsp;</p>
          <p>
            <label for="imagen7"></label>
            <input type="file" name="img1" id="img1" />
            <br />
            <a href="#">
            <input type="checkbox" name="e1" id="e1" value="1" />
            Eliminar imagen (dejar espacio en blanco)</a>&nbsp;<img src="_assets/cancel1.png" width="16" height="16" /></p>
        </div>
        <div class="placeholder"><? if($row['img1'] != '') { ?><img src="galeria_dr/<? echo $row['img1']; ?>" alt="" width="230" height="176" /> <? } ?></div>
        <p>&nbsp;</p>
      </div>
      <div id="caja3">
        <div class="examinar">
          <p>Imagen Secundaria 2 (676x450)</p>
          <p>&nbsp;</p>
          <p>
            <label for="img3"></label>
            <input type="file" name="img2" id="img2" />
            <br />
            <a href="#">
            <input type="checkbox" name="e2" id="e2" value="2" />
            Eliminar imagen (dejar espacio en blanco)</a>&nbsp;<img src="_assets/cancel1.png" width="16" height="16" /></p>
        </div>
        <div class="placeholder"><? if($row['img2'] != '') { ?><img src="galeria_dr/<? echo $row['img2']; ?>" alt="" width="230" height="176" /> <? } ?></div>
        <p>&nbsp;</p>
      </div>
      <div id="caja4">
        <div class="examinar">
          <p>Imagen Secundaria 3 (676x450)</p>
          <p>&nbsp;</p>
          <p>
            <label for="imagen5"></label>
            <input type="file" name="img3" id="img3" />
            <br />
           <a href="#">
           <input type="checkbox" name="e3" id="e3" value="3" />
           Eliminar imagen (dejar espacio en blanco)</a>&nbsp;<img src="_assets/cancel1.png" width="16" height="16" /></p>
        </div>
        <div class="placeholder"><? if($row['img3'] != '') { ?><img src="galeria_dr/<? echo $row['img3']; ?>" alt="" width="230" height="176" /> <? } ?></div>
        <p>&nbsp;</p>
      </div>
      <!--EMPIEZAN ELEMENTOS DE MEDICOS-->
      <!--TERMINAN ELEMENTOS DE MEDICOS-->
      <div style="clear:both"></div>
    </div>
    <p>&nbsp;</p>
  </div>
</form>
</div>
<div id="pie">Powered by Mente Interactiva's Sinapsis</div>
</body>
</html>
