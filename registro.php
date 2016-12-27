<?
session_start();
$_SESSION['miid'] = $_GET['id']; //idcita
$_SESSION['iddoctor'] = $_GET['iddoctor'];
$_SESSION['hora'] = $_GET['hora'];
$_SESSION['clinica'] = $_GET['clinica'];
//echo $_SESSION['esp'];
//echo $_SESSION['nom-doctor'];
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

<title>Login - Dox</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="jquery/reveal.css">
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>

<script type="text/javascript" src="magic/magic-script.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">


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
			
			
</div><!----- Aqui termina la cabecera de dox ---->

		<div style="clear:both;"></div>


		<br>


		<div id="degradado">
		
		<div id="contenedor-login">

			
			<div id="fichas-contenedor">

				<div class="ficha">
				<form method="post" action="cita_confirmacion.php?x=r" name="formulario-login" >
					
					<div class="envoltorio-ficha">
					
						<img src="visual/yasoyusuario2.png" width="352" height="64"><span id="sprytextfield1">
						<input type="text" class="form-login" id="email_registrado" name="email_registrado" placeholder="E-mail" />
						<br /><span class="textfieldRequiredMsg">Se requiere un valor.</span></span>
						<!--onfocus="placeholder_in('Email','email_registrado')" 
onfocusout="placeholder_out('Email','email_registrado')"-->

<input type="password" class="form-login" id="contra_registrado" name="contra_registrado" placeholder="Ingrese su contraseña">
<!--onfocus="placeholder_in('Contraseña','contra_registrado')" 
onfocusout="placeholder_out('Contraseña','contra_registrado')" -->
									

						<div class="boton-consultar">
			      <input name="submit" type="submit"class="button" value="Consultar"  />	
							<!--<input type="image" src="visual/consultar_login.png" id="boton_registrado">-->
				  </form><!-- Aqui termina el form de login-paciente -->
							<br>

			<span id="olvidar"><br />
			<img src="visual/question.png">
			¿Olvidaste tu contraseña?</span>
			<a href="#" onclick="abrir('enviar-contra.php',0,0,0,0,0,1,1,500,350,300,200,1);">Haz clic aqu&iacute;</a>

			  </div>

		  </div>

		  </div>

<form  method="post" action="cita_confirmacion.php?x=n" name="formulario-registro" >

				<div class="ficha">

					<div class="envoltorio-ficha">

						<img src="visual/nosoyusuario2.png">


<input type="text" class="form-login" id="nombre_registro" placeholder="Nombre Completo" name="nombre_registro">

<!--onfocus="placeholder_in('Nombre','nombre_registro')" 
onfocusout="placeholder_out('Nombre','nombre_registro')" -->

<input type="text" class="form-login" id="email_registro" placeholder="Email" name="email_registro">
<!--onfocus="placeholder_in('Email','email_registro')" 
onfocusout="placeholder_out('Email','email_registro')" -->
						
 <span id="sprypassword1">

<input type="password" name="password" id="password" class="form-login" placeholder="Ingrese una contraseña" >
<span class="passwordRequiredMsg"><br />Se requiere un valor.</span><span class="passwordMinCharsMsg"><br />Debe ingresar al menos 6 caracteres.</span><span class="passwordMaxCharsMsg" ><br />Excede el número de caracteres (12).</span></span>
<br /><span id="spryconfirm1">

<input type="password" name="pass2" id="pass2" class="form-login" placeholder="Vuelva a ingresar contraseña" >
<span class="confirmRequiredMsg" ><br />Se requiere un valor.</span><span class="confirmInvalidMsg" ><br />Las contraseñas no concuerdan.</span></span>
<!--onfocus="placeholder_in('Contraseña','contra_registro')" 
onfocusout="placeholder_out('Contraseña','contra_registro')" -->
<span id="sprytextfield2">
<input type="text" class="form-login" id="cel_registro" placeholder="Celular" name="cel_registro" />
<span class="textfieldRequiredMsg"><br />Se requiere un valor.</span><span class="textfieldInvalidFormatMsg"><br />Formato de celular inválido. Ej: 6677123456</span></span>
<!--onfocus="placeholder_in('Celular','cel_registro')" 
onfocusout="placeholder_out('Celular','cel_registro')" 		-->	


						<div  style="padding:0; margin:0; text-align:center; width:370px"> <br />
							
				 <input name="submit" type="submit"class="button" value="Registrarme"  />	

   
    <br />
   
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
		
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>



<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "phone_number", {format:"phone_custom"});
</script>



<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:6, maxChars:12});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password");
</script>