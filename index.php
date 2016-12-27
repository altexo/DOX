<?php
error_reporting(0);
include("librerias/conexion.php");

 session_start();
 
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

$hola = "Select * from datos where idpaciente = ".$rw['id']." and status ='cita-hecha' and inicio >= '".$hoy."' order by inicio desc";
$idpaciente=$rw['id'];
$sql = mysql_query($hola);

desconectar();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="colors/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />

<style type="text/css">
.button {
	background-color: #20cd6d;
	text-decoration: none;
	border-radius: 4px;
	-moz-border-radius: 4px;
	border: 1px solid #006600;
	box-shadow: 0px 4px 0px #006600;
	-moz-box-shadow: 0px 4px 0px #006600;
	-webkit-box-shadow: 0px 4px 0px #006600;
	-webkit-transition: background-color 0.5s ease-in;
	-moz-transition: background-color 0.5s ease-in;
	-o-transition: background-color 0.5s ease-in;
	transition: background-color 0.5s ease-in;
	line-height: 36px;
	text-align: center;
	color: #FFF;
	font-size: 16px;
	margin-top: 5px;
	margin-left: 0px;
	height: 46px;
	width: 246px;
	cursor: pointer;
}

.button:hover {
	background-color: #1aaf5e;
	border-radius: 4px;
	-moz-border-radius: 4px;
	border: 1px solid #006600;
	text-decoration: none;
}
#ban1 {
	width: 350px;
	float: left;
}
#ban2 {
	width: 350px;
	float: left;
}
#seguridad-unete-2 {
	float: left;
	width: 700px;
	margin-left: 170px;
	margin-bottom: 30px;
	margin-top: 20px;
}
#seguridad-unete-2 img {
	float: left;
}
#seguridad-unete-2 span {
	float: left;
	width: 250px;
	text-align: left;
	padding-top: 10px;
	padding-left: 10px;
	font-size: 1.1em;
}
</style>

<title>DOX - Reserva tu consulta médica en línea</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<link rel="stylesheet" href="jquery/reveal.css">	
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>



</head>

<body class="fondo-home">
<? 
if(isset($_SESSION['email']) and isset($_SESSION['contra']))
{
?>
<? } ?>
	<div id="contenedor" class="sec-portada">
<?php include("cabeza.php"); ?>

		<div style="clear:both;"></div>
		
		
		
		<div id="contenedor-degradado">
		<div id="principal">
		
		<img src="visual/servicio-gratuito.png" width="100" height="42" id="servicio-gratuito">
		
		<p>&nbsp;</p>
		
		  <form id="form1" name="form1" method="get" action="busquedas.php">
		    <div class="listbox-principal">
		      <div class="titulo1-listbox">Encuentra un doctor y haz tu cita en línea</div>
		      <? conectar(); 
		$sql = mysql_query("Select * From especialidad order by nombre");
	?>
		      <select id="especialidad" name="especialidad" class="form">
		        <option selected="selected" value="0">Especialidad</option>
		        <? while($row=mysql_fetch_array($sql)){ ?>
		        <option value="<? echo utf8_encode($row['id']); ?>"><? echo $row['nombre']; ?></option>
		        <? } 
	 desconectar();
	 ?>
	          </select>
		     
		      <? conectar(); 
		$sql = mysql_query("Select * From ciudad");
	?>
		      <select id="ciudad" name="ciudad" class="form">
		        <option selected="selected" value="0">Ciudad</option>
		        <? while($row=mysql_fetch_array($sql)){ ?>
		        <option value="<? echo utf8_encode($row['id']); ?>"><? echo $row['nombre']; ?></option>
		        <? } 
	 desconectar();
	 ?>
	          </select>
	
		      <? conectar(); 
		$sql = mysql_query("Select * From seguro");
	?>
		      <select id="seguro" name="seguro" class="form">
		        <option selected="selected" value="0">Seleccionar mi aseguradora después</option>
                
		        <? while($row=mysql_fetch_array($sql)){ ?>
		        <option value="<? echo utf8_encode($row['id']); ?>"><? echo utf8_encode($row['nombre']); ?></option>
		        <? } 
	 desconectar();
	 ?>
	          </select>
              <input name="submit" type="submit"class="button" value="Encontrar médico"  />
<!--<input type="image" name="submit" src="visual/botones/boton1.png" width="148" height="39" style="margin-left:90px; margin-top:5px"> -->



	        </div>
	      </form>
		  <!--- Aqui termina el div de listbox-principal --->
			  <div id="slide-principal"><div id="mislider ">
          <div id="slide">
            <div class="slides_container">

		
						<div><img src="visual/portada2.jpg"></div>
                    <div><img src="visual/portada1.jpg"></div>
                    <div><img src="visual/portada3.jpg"></div>
		
		
			</div></div></div></div>
            <!-- Aqui termina el slide de principal ---->
		
		
		
		</div><!--- Aqui termina el banner principal ----->
		
		
		<div style="clear:both;"></div>
		
		<div id="beneficios">
		
			<!--- *************************** BENEFICIO ********************************* --->
			<div class="beneficio">
				<br>
				<img src="visual/folder.png">
				<div class="titulo-beneficio folder">Gran Cat&aacute;logo M&eacute;dico</div>
				<div class="abstract-beneficio">
				Los mejores m&eacute;dicos de todas las especialidades 
				en un solo lugar.
				
				</div>
			</div>
		
			<!---- *********************************** FIN BENEFEICIO *********************** --->
		
			<!--- *************************** BENEFICIO ********************************* --->
			<div class="beneficio">
				<br>
				<img src="visual/reloj.png">
				<div class="titulo-beneficio reloj">R&aacute;pido y f&aacute;cil</div>
				<div class="abstract-beneficio">
				Consulta, r&eacute;gistrate y realiza tu cita médica en segundos de la manera más fácil.
				
				</div>
			</div>
		
			<!---- *********************************** FIN BENEFEICIO *********************** --->
		
			<!--- *************************** BENEFICIO ********************************* --->
			<div class="beneficio">
				<br>
				<img src="visual/candado.png">
				<div class="titulo-beneficio candado">Seguridad y Confianza</div>
				<div class="abstract-beneficio">
				Tus datos de registro,b&uacute;squedas y citas se mantendr&aacute;n protegidos.
				
				</div>
			</div>
		
			<!---- *********************************** FIN BENEFEICIO *********************** --->
		
		<div style="clear:both;"></div>
		
		</div><!--- Aqui termina el div de beneficios ---->
		
		<div style="clear:both;"></div>
		<div id="beneficios2">
		  <!--- *************************** BENEFICIO ********************************* --->
		  <div class="beneficio" style="margin-left:28px"><img src="visual/iconos/gente.png" width="100" height="87" />
		    <div style="margin-top:13px" class="titulo-beneficio folder">Gran Cat&aacute;logo M&eacute;dico</div>
		    <div class="abstract-beneficio"> Los mejores m&eacute;dicos de todas las especialidades 
		      en un solo lugar. </div>
	      </div>
		  <!---- *********************************** FIN BENEFEICIO *********************** --->
		  <!--- *************************** BENEFICIO ********************************* --->
		  <div class="beneficio"><img src="visual/iconos/tiempo.png" width="100" height="100" />
		    <div class="titulo-beneficio reloj">R&aacute;pido y f&aacute;cil</div>
		    <div class="abstract-beneficio"> Consulta, regístrate y realiza tu cita médica en segundos de la manera más fácil. </div>
	      </div>
		  <!---- *********************************** FIN BENEFEICIO *********************** --->
		  <!--- *************************** BENEFICIO ********************************* --->
		  <div class="beneficio"><img src="visual/iconos/seguridad.png" width="100" height="100" />
		    <div class="titulo-beneficio candado">Seguridad y Confianza</div>
		    <div class="abstract-beneficio"> Tus datos de registro, b&uacute;squedas y citas se mantendr&aacute;n protegidos. </div>
	      </div>
		  <!---- *********************************** FIN BENEFEICIO *********************** --->
		  <div style="clear:both;"></div>
		  </div>
<div id="seguridad-unete-2">

<div id="ban1"> <a href="especialistas.php"><img src="visual/iconos/icono-doc.png" width="70" height="70" /></a>  <span>¿Es usted Médico o Dentista?
  <br />
  ¡Únete a DOX!</span>
</div>

<div id="ban2">
 <img src="visual/iconos/icono-sec.png" width="70" height="70" /> <span>Sistema 100% Protegido

 <br />
 Seguridad SSL 128 Bits </span>
</div>
  <div class="empujador"></div>
	  </div>
		
		
	</div><!--- Aqui termina el contenedor-degradado--->
	
</div><!--- Aqui termina el contenedor de dox ---->

	<div class="empujador"></div>
	
	<?php include("pie.php"); ?>
	
    
</body>
</html>
 <script>
            $(function(){
                $("#slide").slides({
 
 preload: true,
 preloadImage: '/imagenes/slider/loading.gif',
play: 8000,
				pause: 2500,
				hoverPause: false
});
});
        </script>
		