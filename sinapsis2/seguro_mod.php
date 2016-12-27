<?
include("librerias/conexion.php");

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nuevo Seguro</title>
<link href="css_sinapsis3/css_s3_base.css" rel="stylesheet" type="text/css" />
<link href="css_sinapsis3/css_s3_txt.css" rel="stylesheet" type="text/css" />
<link href="css_sinapsis3/css_s3_formas.css" rel="stylesheet" type="text/css" />
<link href="css_sinapsis3/css_s3_ligas.css" rel="stylesheet" type="text/css" />
<link href="css_sinapsis3/css_s3_sistemas.css" rel="stylesheet" type="text/css" />
<script src="js/menu.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>

<style type="text/css">
<!--
.oblig {	color:#C00; 
	font-size:16px; 
	margin-left:5px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
-->
</style>
<style type="text/css">
<!--
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
	width:400px; 
	margin-left:10px;
}
label {
	display: block;
	width: 115px;
	float: left;
}
.oblig{
	color:#C00; 
	font-size:16px; 
	margin-left:5px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}

-->
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




		<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p><span class="test3" style="font-weight:bold; margin-left:10px; margin-bottom:10px">NUEVO SEGURO</span></p>
<form action="update_seguro.php?id=<? echo $row2['id']; ?>" method="post" enctype="multipart/form-data" name="form1" target="logo" id="form1" >

 <? 
		
		  if(isset($_GET['id']))
		 {
			
		$d=$_GET['id'];

			conectar();
	$sql2 = "SELECT * FROM seguro WHERE id = '".$d."'";
	$result2 = mysql_query($sql2);
	$row2 = mysql_fetch_array($result2);
	desconectar();
	//echo $d;

?>

<fieldset style="float:left; height:240px ">
  <legend>Datos Seguro </legend>
  <p>
    <label>Nombre: </label>
    <span id="sprytextfield1">
    <input name="nombre" type="text" id="nombre" value="<? echo utf8_encode($row2['nombre']); ?>" />
    <span class="textfieldRequiredMsg">Obligatorio</span></span>  </p>
  <p>
    <label>&nbsp;</label><img src="logo_seguro/<? echo $row2['nombre'] ?>" height="40" />
  </p>
  <p>
    <label>Actualizar Logo:</label>
    
     <input type="file" name="logo" id="logo" />
 </p>
   <p>
     <label>&nbsp;</label>
     <iframe name="logo" allowtransparency="true" style="border:none"  width="250px" height="50px" id="logo"> </iframe>
   </p>
   <p><span style="float:left; height:450px;">
     <label>&nbsp;</label>
     <input type="submit" name="Guardar" id="Guardar" value="Guardar"  />
   </span></p>
 
</fieldset>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
</script>
</body>
</html>
<? //} ?>