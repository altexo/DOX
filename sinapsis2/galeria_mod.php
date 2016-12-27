<?
include("librerias/conexion.php");

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar Galería</title>



<style type="text/css">

p {
	margin-top: 10px;
	margin-right: 5px;
	margin-bottom: 5px;
	margin-left: 5px;
}
fieldset {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 13px;
	border-color:#EEE;
	width:480px; 
	margin-left:10px;
}
label {
	display: block;
	width: 100px;
	float: left;
}


.test {
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 15px;
	text-decoration: none;
	
}
.test2{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 15px;
	text-decoration: none;
	color:#000;
}
.test3 {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 13px;
	text-decoration: none;
	
}
a{
	text-decoration:none;
	color:#000;
}
a:hover
{
	color:#C00;
}
</style>





</head>

<? $id = $_GET['id'];

conectar();
$sql = mysql_query("Select * From galeria where id_doctor = '$id'");
$row = mysql_fetch_array($sql);
?>
<body>
<p><span class="test3" style="font-weight:bold; margin-left:10px; margin-bottom:10px">MODIFICAR GALERÍA</span></p>
<form action="insert_gal.php" method="post" enctype="multipart/form-data" name="form1" target="imagen" id="form1" >
  <fieldset style="float:left;">
    <legend></legend>
    <p>*Se muestra la imagen actual, si desea modificarla elija una nueva imagen, de lo contrario permanecerá la actual.<br />
    </p>
    <p><label>Portada</label> <label>Imagen 1</label> <label>Imagen 2</label> <label>Imagen 3</label> </p>
    <br />
    <p><img src="fotos/<? echo $row['portada']; ?>" width="96" height="107"  />
    <img src="fotos/<? echo $row['img1']; ?>" width="96" height="107" /> <img src="fotos/<? echo $row['img2']; ?>" width="96" height="107" /> <img src="fotos/<? echo $row['img3']; ?>" width="96" height="107" /></p>
  <p>
    <label>Foto Personal:</label>
   
      <input name="portada" type="file" id="portada" />
       </p>
  <p>
    <label>Imagen 1: </label>
    <input name="img1" type="file" id="img1" />
  </p>
  <p>
    <label>Imagen 2: </label>
    <input name="img2" type="file" id="img2" />
  </p>
  <p>
    <label>Imagen 3:</label>
    <input type="file" name="img3" id="img3" />
    <br />
    <br />
  </p>
  <p>
    <label>&nbsp;</label>
   <input type="submit" name="guardar" id="guardar" value="Modificar Información" />
 </p>
 <p>
   <label>&nbsp;</label>
   <iframe name="imagen" allowtransparency="true" style="border:none"  width="300px" height="40px" id="imagen" scrolling="Auto"> </iframe>
</p>
</fieldset>
</form>

</body>
</html>
<? //} ?>