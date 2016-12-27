<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['email'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['email']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "registro-panel.php";
if (!((isset($_SESSION['email'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['email'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>

<? 
session_start();
include("librerias/conexion.php");
 


//Viene del loggin
if(isset($_SESSION['email']) and isset($_SESSION['contra']))
{
	$email = $_SESSION['email'];//$_POST['email_registrado'];
	$contra = $_SESSION['contra'];//$_POST['contra_registrado'];
	
	//$pass = $_POST['contra_registrado'];
	$cadena = "Select * from paciente where email = '".$email."' and contrasena = '".$contra."'";
	
}
else if(isset($_GET['id'])) //Viene de mi usuario
{
	$id = 	$_GET['id'];
	$cadena = "Select * from paciente where id = ".$id."";
}

conectar();
$sq = mysql_query($cadena);
$rw = mysql_fetch_array($sq);
$hoy = date("Y-m-d");

$hola = "Select * from datos where idpaciente = ".$rw['id']." and status ='cita-hecha' and autorizar = '1' order by inicio asc";
$idpaciente=$rw['id'];
$sql = mysql_query($hola);

$resultado = mysql_query("Select * from datos where idpaciente = ".$rw['id']." and autorizar='0' and status ='cita-hecha' and inicio >= '".$hoy."' order by inicio asc");
$num_filas = mysql_num_rows($resultado);

desconectar();



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Dox - Reserva tu consulta médica en línea -  Panel de Usuario</title>
   <link href="colors/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<link rel="stylesheet" href="jquery/reveal.css">	
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<style type="text/css">
#paneltitulo {
	float: left;
	width: 100%;
	background-color: #4F91CD;
	-webkit-border-radius: 15px;
	border-radius: 15px;
	padding: 8px;
	margin-top: 20px;
	color: #FFF;
	border: 3px solid #FFF;
}

#columna {
	width: 200px;
	margin-top: 40px;
	margin-right: 40px;
	float: left;
}

#contpanel {
	float: left;
	margin-top: 40px;
	width: 730px;
	margin-bottom: 60px;
}

.cita {
	float: left;
	clear: left;
	line-height: 30px;
	font-size: 13px;
}

.cita2 {
	float: left;
	clear: left;
	line-height: 30px;
	background-color: #548FC7;
	color: #FFF;
	font-weight: bold;
}

.reg1 {
	float: left;
	width: 90px;
}

.reg2 {
	float: left;
	width: 80px;
}

.reg3 {
	float: left;
	width: 460px;
}

.reg4 {
	float: left;
	width: 100px;
}

.reg5 {
	float: left;
	width: 100px;
}
</style>

<link rel="stylesheet" type="text/css" href="bootstrap-320/css/bootstrap.css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script language="javascript">
//Su explorador no soporta java o lo tiene deshabilitado; esta pagina necesita javascript para funcionar correctamente<!--
//Copyright © McAnam.com

function abrir(direccion, pantallacompleta, herramientas, direcciones, estado, barramenu, barrascroll, cambiatamano, ancho, alto, izquierda, arriba, sustituir){
     var opciones = "fullscreen=" + pantallacompleta +
                 ",toolbar=" + herramientas +
                 ",location=" + direcciones +
                 ",status=" + estado +
                 ",menubar=" + barramenu +
                 ",scrollbars=" + barrascroll +
                 ",resizable=" + cambiatamano +
                 ",width=" + ancho +
                 ",height=" + alto +
                 ",left=" + izquierda +
				 ",top=" + arriba;
     var ventana = window.open(direccion,"venta",opciones,sustituir);
}                    
</script>
</head>

<body >

<div class="contenedor sec-panel">
<?php include("cabeza.php"); ?>
<!--Aqui termina la cabecera de dox ----->

  <div style="clear:both;"></div>
</div>
		
<div id="contenedor-degradado">
		
		<div ><!--- Aqui termina el div de contenido dox ---->
		
		<div id="contenedor">
     <div id="paneltitulo">Estimado(a) <? echo $rw['nombre']; ?>. en este panel puedes llevar el control de tus citas médicas, así como actualizar tus datos.<br />
       <br />
       ¡Gracias por preferir DOX!<br />
     </div>
      <div id="columna">
      
      <ul class="nav nav-pills nav-stacked">
  <li class="active">
<a href="#"><span class="badge pull-right"><? echo $num_filas; ?></span>Mis Citas</a>
</li>
  <li><a href="perfil-paciente.php?id=<? echo $rw['id']; ?>">Mi Usuario</a></li>
  <li><a href="<?php echo $logoutAction ?>">Salir de mi cuenta</a>      </li>
      </ul>
      </div>
      <div id="contpanel">
       <ul class="nav nav-tabs nav-justified" role="tablist">
<li>
<a href="panel.php">Próximas Citas</a>
</li>
<li  class="active">
<a href="citas-completadas.php">Citas Completadas</a>
</li>
<li>
<a href="citas-facturas.php">Mis Facturas</a>
</li>
</ul>
       <p></p>
	  
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  
  <?
   conectar();
		 $cita = "Select * from datos where id = ".$_GET['id']."";
		  $sqlc = mysql_query($cita);
		  $rowcita = mysql_fetch_array($sqlc);
		  
		  desconectar();
  ?>
    <td align="left"><h2>Referencia: <? echo $rowcita[15] ?></h2></td>
    <td align="right"><h5><? echo $_GET['doctor'] ?> </h5><h5>Concepto: <? echo  $rowcita['concepto'] ?></h5><input id="concepto" name="concepto" type="hidden" value="<? echo  $rowcita['concepto'] ?>" />
    <h5>Monto: $<? echo  $rowcita['monto'] ?></h5><input id="monto" name="monto" type="hidden" value="<? echo  $rowcita['monto'] ?>" /></td>
  </tr>

</table><form action="facturar-terminado.php" name="forma" method="POST" enctype="multipart/form-data" id="forma">
       <p><span id="sprytextfield1">
         <input name="1" type="text" class="form-control" id="1" placeholder="RFC" value="<?php if($rw['guardar']==1) { echo $rw['rfc']; } ?>" />
         <span class="textfieldRequiredMsg">Se requiere este dato.</span></span></p>
       
       <p><span id="sprytextfield2">
         <input name="2" type="text" class="form-control" id="2" placeholder="Razón Social" value="<?php if($rw['guardar']==1) { echo $rw['razonsocial']; } ?>" />
         <span class="textfieldRequiredMsg">Se requiere este dato.</span></span></p>
       <p><span id="sprytextfield3">
         <input name="3" type="text" class="form-control" id="3" placeholder="Estado" value="<?php if($rw['guardar']==1) { echo $rw['estado']; } ?>" />
         <span class="textfieldRequiredMsg">Se requiere este dato.</span></span></p>
       
       <p><span id="sprytextfield4">
         <input name="4" type="text" class="form-control" id="4" placeholder="Municipio" value="<?php if($rw['guardar']==1) { echo $rw['municipio']; } ?>" />
         <span class="textfieldRequiredMsg">Se requiere este dato.</span></span></p>
       
       <p>
         <input name="5" type="text" class="form-control" id="5" placeholder="Localidad" value="<?php if($rw['guardar']==1) { echo $rw['localidad']; } ?>">
       </p>
       
       <p><span id="sprytextfield5">
         <input name="6" type="text" class="form-control" id="6" placeholder="Calle" value="<?php if($rw['guardar']==1) { echo $rw['calle']; } ?>" />
         <span class="textfieldRequiredMsg">Se requiere este dato.</span></span></p>
       <p>
         <input name="7" type="text" class="form-control" id="7" placeholder="Número Exterior" value="<?php if($rw['guardar']==1) { echo $rw['numext']; } ?>">
       </p>
       
       <p>
         <input name="8" type="text" class="form-control" id="8" placeholder="Número Interior" value="<?php if($rw['guardar']==1) { echo $rw['numint']; } ?>">
       </p>
       <p>
         <input name="9" type="text" class="form-control" id="9" placeholder="Referencia" value="<?php if($rw['guardar']==1) { echo $rw['referencia']; } ?>">
       </p>
       
       <p><span id="sprytextfield6">
         <input name="10" type="text" class="form-control" id="10" placeholder="Colonia" value="<?php if($rw['guardar']==1) { echo $rw['colonia']; } ?>" />
         <span class="textfieldRequiredMsg">Se requiere este dato.</span></span></p>
       
       <p>
         <input name="11" type="text" class="form-control" id="11" placeholder="Código Postal" value="<?php if($rw['guardar']==1) { echo $rw['cp']; } ?>">
       </p>
       
       <p>
         <input name="12" type="text" class="form-control" id="12" placeholder="Correo Electrónico" value="<?php if($rw['guardar']==1) { echo $rw['email2']; } ?>">
       </p>
       
       <p>
         <input name="13" type="text" class="form-control" id="13" placeholder="Teléfono" value="<?php if($rw['guardar']==1) { echo $rw['tel1']; } ?>">
       </p>
       
       <p>
         <input name="14" type="text" class="form-control" id="14" placeholder="Teléfono 2" value="<?php if($rw['guardar']==1) { echo $rw['tel2']; } ?>">
       </p>
      <input name="idcita" id="idcita" type="hidden" value="<? echo $_GET['id'] ?>" />
       
       <div class="checkbox">
         <label>
    <input name="guardar" type="checkbox" id="guardar" value="1" <? if($rw['guardar']==1) { ?>checked="checked" <? } ?>>
    Guardar mis datos. </label>
  
</div>
 <button type="submit" class="btn btn-primary btn-lg btn-block" name="boton" id="boton">Generar Factura Ahora</button>
 <input type="hidden" name="MM_update" value="forma" />
</form>
      </div>
</div>
		
		
	</div><!--- Aqui termina el contenedor de dox ---->

</div>
	
	
	<div style="clear:both;"></div>
	
	 
<!--- Aqui termina el contenedor ciudad ----->
	
	
	<div style="clear:both;"></div>
    <?php include("pie.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
    
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
</script>
</body>
</html>

