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

$hola = "Select * from datos where idpaciente = ".$rw['id']." and autorizar='0' and status ='cita-hecha' and inicio >= '".$hoy."' order by inicio asc, hinicio asc";
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
<a href="#"> <span class="badge pull-right"><? echo $num_filas; ?></span>Mis Citas</a>
</li>
  <li><a href="perfil-paciente.php?id=<? echo $rw['id']; ?>">Mi Usuario</a></li>
  <li><a href="<?php echo $logoutAction ?>">Salir de mi cuenta</a>      </li>
      </ul>
      </div>
      <div id="contpanel">
       <ul class="nav nav-tabs nav-justified" role="tablist">
<li class="active">
<a href="#">Próximas Citas</a>
</li>
<li>
<a href="citas-completadas.php">Citas Completadas</a>
</li>
<li>
<a href="citas-facturas.php">Facturas</a>
</li>
</ul>
       <table data-toggle="table" data-cache="false" data-height="299" class="table table-striped">
        <thead> <tr>
           <td align="center" scope="col"><span class="glyphicon glyphicon-calendar"></span> <strong>Día</strong></td>
           <td align="center" scope="col"><span class="glyphicon glyphicon-time"></span> <strong>Hora</strong></td>
           <td align="center" scope="col"><span class="glyphicon glyphicon-user"></span> <strong>Especialista</strong></td>
           <td align="center" scope="col"><span class="glyphicon glyphicon-star"></span><strong>Clave de reserva</strong></td>
           <td align="center" scope="col"><strong>Acción</strong></td>
         </tr>
        </thead>
         
         
         <? 
		$num = mysql_num_rows($sql);
		if($num != 0)
		{
		
		while($row = mysql_fetch_array($sql)) {?>
       
        <? 
		$fecha = explode("-",$row['inicio']);
		$f = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		$hora = explode(":",$row['hinicio']);
		$h = $hora[0].":".$hora[1];
		?>
       
        
       
 
         <tr>
           <td>  <? echo $f; ?></td>
           <td> <? echo $h." h"; ?></td>
           <td><? 
		   
		    conectar();
		 $hola2 = "Select * from doctor where id = ".$row['iddoctor']."";
		  $sql2 = mysql_query($hola2);
		  $row2 = mysql_fetch_array($sql2);
		  
		  desconectar();
		   
		    switch($row2['titulo'])
		  {
			case 1: $t = "Dr"; break;
          	case 2: $t = "Dra"; break; 
          	case 3: $t = "Psic"; break; 
          	case 4: $t = "Sr"; break;
          	case 5: $t = "Sra"; break;
          	case 6: $t = "Srita"; break;
          	case 7: $t = "MC"; break;
          	case 8: $t = "Lic"; break;
          	case 9: $t = "Ing"; break;
		  }
		  
		  
		  echo $t." ".$row2['nombre']." ".$row2['a_paterno']." ".$row2['a_materno'];
		    ?></td>
           <td><h4><span class="label label-info"><? echo $row['clavereserva']?></span></h4></td>
           <td><a href="cancelar-cita.php?id=<? echo $row['id']; ?>&amp;idpaciente=<? echo $idpaciente; ?>&amp;fecha=<? echo $f; ?>&amp;hora=<? echo $h; ?>&amp;doctor=<? echo $t." ".$row2['nombre']." ".$row2['a_paterno']." ".$row2['a_materno']?>">Cancelar Cita</a></td>
         </tr>
         
          <? 
		}
		}
		else
		{ ?> <tr> <td colspan="5" > <?
			echo "<p>Por el momento no hay ninguna cita reservada.</p>";
			
		 ?></td> </tr> <?
		}
		?>
         
       </table>
       <p>&nbsp;</p>
        <p>Te recomendamos presentarte a tu cita con puntualidad. Recuerda que puedes cancelar tu cita vía web solo hasta 2 horas antes.</p>
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
		