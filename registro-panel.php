<?
session_start();
include("librerias/conexion.php");	
$error="";



 if( isset($_POST['email_registrado'])  && isset($_POST['contra_registrado']) )
 {
	$email = $_POST['email_registrado'];
	$passclean = $_POST['contra_registrado'];
	$pass = md5($passclean);

	conectar();
	$sql = "SELECT * FROM paciente WHERE email = '".$email."' AND contrasena = '".$pass."'";
	$result=mysql_query($sql);
	mysql_num_rows($result);
	if(mysql_num_rows($result)==1)
	{
		
		$_SESSION['email'] = $email;
		$_SESSION['contra'] = $pass;
		desconectar();
		header("Location: panel.php");
	}
	else
	{
		$error = "Usuario y/o Contraseña Incorrectas<br />Recuerda que la contraseña es sensitiva a<br />MAYÚSCULAS y minúsculas.<br />Por favor, vuelva a intentar.";
	}
	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">
.button {
	background-color: #2d96de;
	text-decoration: none;
	border-radius: 4px;
	-moz-border-radius: 4px;
	border: 1px solid #1376ba;
	box-shadow: 0px 4px 0px #1376ba;
	-moz-box-shadow: 0px 4px 0px #1376ba;
	-webkit-box-shadow: 0px 4px 0px #1376ba;
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
	width: 340px;
	cursor: pointer;
}

.button:hover {
	background-color: #58b4f3;
	border-radius: 4px;
	-moz-border-radius: 4px;
	border: 1px solid #1376ba;
	text-decoration: none;
}

</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>DOX Reserva tu consulta médica en línea - Registrarme</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="jquery/reveal.css">
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>
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

<body class="fondo-portada">

	<div class="contenedor">



<?php include("cabeza.php"); ?>

		<div style="clear:both;"></div>


		<br>


		<div id="degradado">
		
		<div id="contenedor-login">

			
			<div id="fichas-contenedor">

				<div class="ficha" style="text-align:center">
				<form method="post" action="registro-panel.php" name="formulario-login" onsubmit="return login_paciente()">
					
					<div class="envoltorio-ficha">
					
						<img src="visual/yasoyusuario2.png">
				

<input type="text" class="form-login" id="email_registrado" name="email_registrado" placeholder="Correo Electrónico" >
<!--onfocus="placeholder_in('Email','email_registrado')" 
onfocusout="placeholder_out('Email','email_registrado')"-->
<input type="password" class="form-login" id="contra_registrado" placeholder="Su contraseña" name="contra_registrado">
<!--onfocus="placeholder_in('Contraseña','contra_registrado')" 
onfocusout="placeholder_out('Contraseña','contra_registrado')" -->
<br /><br />
<br />


								
	
                               <p style="margin-left:20px; color:#C00;"><? echo $error; ?> </p>

						<div class="boton-consultar">
							
				  <input name="submit" type="submit" class="button" value="Consultar" style="color:#FFF; width:348px; margin-left:10px"   />	
				  </form><!-- Aqui termina el form de login-paciente -->
							<br>

			<span id="olvidar"><br />
			<img src="visual/question.png">
			¿Olvidaste tu contraseña?</span>
			<a href="#" onclick="abrir('enviar-contra.php',0,0,0,0,0,1,1,500,350,300,200,1);">¡Haz clic aquí!</a></div>

					</div>

				</div>
<div class="ficha">
<form method="post" action="usuario-panel.php" name="formulario-registro" onsubmit="return registro_paciente()">

		

					<div class="envoltorio-ficha" ">

						<img src="visual/nosoyusuario2.png">
                        <div style="text-align:center; width:320px; margin-left:40px">
	  <p><br />
	    ¡Regístrate!<br />
	    <br />
	    Es <span style="color:#5e98d0; 	">GRATIS</span>, fácil y rápido. <br />
	    <br />
	    </p>
      </div>
                        <br />
                        <br />
 <input name="submit" type="submit" class="button" value="Registrarme" style="color:#FFF; width:348px; margin-left:20px;"   />	
	  
</form><!-- Aqui termina el form de registro paciente -->

						</div>


					</div>

				

				<div style="clear:both;"></div>

			<!--- Aqui termina el fichas-contenedor ---------->

			<div style="clear:both;"></div>


		<!---- Aqui termina el contendor-login ---->


		<!---- Aqui termina el div de degradado -->
		
		</div><!----- div anonimo ---->


		<div style="clear:both;"></div>


		</div></div></div></div>
		<?php include("pie.php"); ?>
</body>
</html>
		