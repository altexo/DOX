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
$hola = "Select * from datos where idpaciente = ".$rw['id']." and status ='cita-hecha' order by inicio desc";
$sql = mysql_query($hola);

desconectar();

$id = $_GET['id'];
$f= $GET['fecha']; 
$h= $GET['hora']; 
$doc= $GET['doctor']; 
$idpaciente= $GET['idpaciente']; 



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
<link rel="stylesheet" type="text/css" href="bootstrap-320/css/bootstrap.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>
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
     <div id="paneltitulo">Estimado(a) <? echo utf8_encode($rw['nombre']); ?>. en este panel puedes llevar el control de tus citas médicas, así como actualizar tus datos.<br />
       <br />
       ¡Gracias por preferir DOX!<br />
     </div>
     <div id="columna">
       <ul class="nav nav-pills nav-stacked">
         <li class="active"> <a href="panel.php"><span class="badge pull-right"><? echo $num_filas; ?></span>Mis Citas</a> </li>
         <li><a href="perfil-paciente.php?id=<? echo $rw['id']; ?>">Mi Usuario</a></li>
         <li><a href="<?php echo $logoutAction ?>">Salir de mi cuenta</a></li>
       </ul>
     </div>
     <div id="contpanel">
        <h2>CANCELAR CITA.</h2>
<p>Deseo cancelar mi cita con <br /><? echo $_GET['doctor']; ?> <br />el día <? echo $_GET['fecha']; ?> <br />a las <? echo $_GET['hora']; ?> h.</p>

<p style="font-size:11px">Recuerde que al cancelar una cita debe especificar el motivo. Al cancelar su cita se anulará el compromiso que tiene con el médico, aun así le recomendamos solamente cancelar cuando definitivamente no pueda acudir a su cita.</p>
<form id="form1" name="form1" method="post" action="cancelar-cita2.php">
  <label>
    Motivo de cancelación:<br />
    <input type="hidden" value="<? echo $_GET['doctor']; ?>" id="doctor" name="doctor"  />
<input type="hidden" value="<? echo $_GET['fecha']; ?>" id="fecha" name="fecha"  />
<input type="hidden" value="<? echo $_GET['hora']; ?>" id="hora" name="hora"  />
<input type="hidden" value="<? echo $_GET['id']; ?>" id="id" name="id"  />
<input type="hidden" value="<? echo $_GET['idpaciente']; ?>" id="idpaciente" name="idpaciente"  />
    <textarea name="comentario" id="comentario" cols="45" rows="5"></textarea>
    <br />
    <br />
    <input type="submit" name="cancelar" id="cancelar" value="Cancelar Cita" />
  
<br />
  </label>
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
</body>
</html>
		