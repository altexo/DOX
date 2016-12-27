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
include("librerias/conexion.php");

$id = $_POST['h-id'];

//$pass = $_POST['contra_registrado'];

conectar();
$sql = "Update paciente Set nombre = '".utf8_decode($_POST['nombre'])."', contrasena = '".$_POST['contra']."', celular = '".$_POST['cel']."' where id = ".$id."";

$nombre=$_POST['nombre'];





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Dox - Reserva tu consulta médica en línea -  Panel de Usuario</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="jquery/reveal.css">
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
label
{
	display:block;
	width:100px;
	float:left;
}
</style>

</head>

<body class="fondo-normal">

<div class="contenedor">



		<div id="cabecera-dox">

			<a href="index.php"><div id="logo-cabecera-dox">
	
				
								
			</div></a><!-- Aqui termina el div del logo ----->
				
				
			<div id="navegacion-cabecera-dox">
			
				<div id="social-navegacion-cabecera-dox">
					
					<ul>
						<li><a href="#"><img src="visual/social/facebook2.png" onmouseover="this.src = 'visual/social/facebook.png';" onmouseout="this.src= 'visual/social/facebook2.png'; "></a></li>
						<li><a href="#"><img src="visual/social/twitter2.png" onmouseover="this.src = 'visual/social/twitter.png';" onmouseout="this.src= 'visual/social/twitter2.png'; "></a></li>
						<li><a href="#"><img src="visual/social/rss2.png" onmouseover="this.src = 'visual/social/rss.png';" onmouseout="this.src= 'visual/social/rss2.png'; "></a></li>
					</ul>
			
				<div style="clear:both;"></div>
			
				</div><!-- Aqui termina la cabecera de social de dox -->
			
				<div id="menu-navegacion-cabecera-dox">
							
					<ul>
						<li><a href="#">Regístrate</a></li>
						<li><a href="registro-panel.php">Mis Citas</a></li>
						<li><a href="#">Búsquedas</a></li>
						<li><a class="seleccionado" href="index.php">Inicio</a></li>
					</ul>
				
				<div style="clear:both;"></div>
				
				</div><!-- A qui termina el div del menu de navegacion --->
			
			</div><!--Aqui termnina el div referente a la cabecera de dox en las opciones --->
				
			<div style="clear:both;"></div>
				
			
			
		</div><!--Aqui termina la cabecera de dox ----->

		<div style="clear:both;"></div>
	</div>
		
<div id="contenedor-degradado">
		
		<div ><!--- Aqui termina el div de contenido dox ---->
		
		<div id="contenedor">
     <div id="paneltitulo">Estimado(a) <? echo $nombre; ?>. en este panel puedes llevar el control de tus citas médicas, así como actualizar tus datos.<br />
       <br />
       ¡Gracias por preferir DOX!<br />
     </div>
      <div id="columna">
        <p>Menú</p>
        <p><a href="panel.php?id=<? echo $id; ?>">Ver Mis Citas</a></p>
        <p><a href="perfil-paciente.php?id=<? echo $id; ?>">Mi Usuario</a></p>
        <p><a href="<?php echo $logoutAction ?>">Salir de mi cuenta</a></p>
      </div>
      <div id="contpanel">
        <p>Mi Usuario</p>
        <div class="cita2">
          <div class="reg1">&nbsp;</div>
          <div class="reg2">&nbsp;</div>
          <div class="reg3">&nbsp;</div>
          <div class="reg4">&nbsp;</div></div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><? if($result = mysql_query($sql)) { echo "Su información ha sido actualizada satisfactoriamente."; }  else { echo "Problemas al guardar"; } desconectar();?>  </p>
        <p>&nbsp;</p>
      </div>
</div>
		
		
	</div><!--- Aqui termina el contenedor de dox ---->

	</div>
	
	
	<div style="clear:both;"></div>
	
	 
<!--- Aqui termina el contenedor ciudad ----->
	
	
	<div style="clear:both;"></div>
	
	<div id="bolsita-footer">
	
	<div id="footer">
	
	<div class="menu-navegacion-secundaria">
	
		<ul>
			<li><a href="#">Blog</a></li>
			<li><a href="empresa.php">Sobre la Empresa</a></li>
			<li><a href="faq.php">Preguntas Frecuentes</a></li>
			<li><a href="#">Contactanos</a></li>
			<li><a href="#">Politicas de Privacidad</a></li>
		</ul>
	
	</div>
	
	<div class="footer">
	Powered By Mente Interactiva : New Agency 2011 <br>
	Dox 2011 Derechos Reservados &nbsp;
	</div>
	
	<div style="clear:both;"></div>
	
	</div>
	
	</div>
	
	
</body>
</html>
		