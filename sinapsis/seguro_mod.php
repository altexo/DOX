<? 
 include("librerias/conexion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DOX</title>
<link href="_css/sinapsis_novo.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<style type="text/css">
<!--
p {
	margin-top: 10px;
	margin-right: 5px;
	margin-bottom: 5px;
	margin-left: 5px;
}

label {
	display: block;
	width: 150px;
	float: left;
}

.test3 {
	font-family:Eurostyle;
	font-size: 20px;
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

@font-face
{
	font-family:Eurostyle;
	src:url('fuentes/Eurostile.eot');
	

}
@font-face
{
	font-family:Eurostyle;
	src:url('fuentes/Eurostile.ttf');
	
	
}
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="encabezado"><img src="_assets/logo.png" width="200" height="73" /></div>
<div id="menu">
  <p>Seleccione una opción</p>
  <a href="doctor.php" class="navi">Médicos</a> <!--<a href="galeria.php" class="navi">Imágenes de médicos</a>--> <a href="seguros.php" class="navi">Seguros Médicos</a>
  <p style="clear:both">&nbsp;</p>
</div>
<div id="contenido">
  
	
	<h1>Seguros </h1>
  <p><a href="seguro_ins.php" id="bnuevo">Crear nuevo</a></p>
  <p>&nbsp; </p>
  
 
  <!--EMPIEZAN ELEMENTOS DE MEDICOS-->
  <div id="envoltura">

    <div id="cabeza">
     <div class="envoltura2">
      <div class="ficha1">Nuevo Seguro</div>
     </div>
    </div>
   
    <div class="envoltura2">
    <form action="update_seguro.php" method="post" enctype="multipart/form-data" name="form1" target="logo" id="form1" >

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
    <p>
     <label>Nombre:</label>
     <span id="sprytextfield1">
     <input name="nombre" type="text" id="nombre" value="<? echo utf8_encode($row2['nombre']); ?>" />
     <span class="textfieldRequiredMsg">Campo Obligatorio.</span></span>
     <input type="hidden" name="hid" id="hid" value="<? echo $row2['id']; ?>" />
    </p>
    <p> <label>&nbsp;</label>
      <img src="logo_seguro/<? echo $row2['logo'] ?>" alt="" height="40" /></p>
   
 
   <p>
     <label>Actualizar Logo:</label>
    
       <input type="file" name="logo" id="logo" value="" />
           </p>
   <p><label>&nbsp;</label>
     <input type="submit" name="guardar" id="guardar" value="Enviar" />
   </p>
     <p>
  <label>&nbsp;</label><iframe name="logo" allowtransparency="true" style="border:none"  width="500px" height="60px" id="logo" scrolling="Auto"> </iframe>
</p>
    <div style="clear:both;"></div>
      <? } ?>
    </form>
    </div>
        <div style="clear:both"></div>  
    
  </div>
      <!--TERMINAN ELEMENTOS DE MEDICOS-->
    <div style="clear:both"></div>
</div>
  
 
</div>
<div id="pie">Powered by Mente Interactiva's Sinapsis</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");

//-->
</script>
</body>
</html>
