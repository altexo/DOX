<?
session_start();
/*$_SESSION['id'] = $_GET['id'];
$_SESSION['iddoctor'] = $_GET['iddoctor'];
$_SESSION['hora'] = $_GET['hora'];
$_SESSION['clinica'] = $_GET['clinica'];*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>DOX - Creación de usuario</title>

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
</head>

<body class="fondo-portada">

	<p>&nbsp;</p>
	<div class="contenedor sec-registro">
    
    <?php include("cabeza.php"); ?>

	  <div style="clear:both;"></div>


		<br>


		<div id="degradado">
		
		<div id="contenedor-login">

			
			<div id="fichas-contenedor">

				<div class="ficha" style="margin-left:240px;">
				<form method="post" action="usuario-registrado.php" name="formulario-login" >
               <!-- onsubmit="return login_paciente()"-->
					
					<div class="envoltorio-ficha">
					<img src="visual/nosoyusuario2.png" alt="" /><span id="sprytextfield1">
					<input type="text" class="form-login" placeholder="Nombre Completo"
id="nombre_registro" name="nombre_registro" />
					<span class="textfieldRequiredMsg">Campo necesario.</span></span><span id="sprytextfield2">
                    <input type="text" class="form-login" placeholder="Correo Electrónico" 
id="email_registro" name="email_registro" />
                    <span class="textfieldRequiredMsg">Campo necesario.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span></span><span id="sprytextfield3">
                    <input type="password" class="form-login" placeholder="Escriba su contraseña" 
id="contra_registro" name="contra_registro" />
                    <span class="textfieldRequiredMsg">Campo necesario. Mínimo 6 dígitos.</span></span><span id="sprytextfield4">
                    <input type="text" class="form-login" placeholder="Celular" 
id="cel_registro" name="cel_registro" />
                    <span class="textfieldRequiredMsg">Campo necesario.</span><span class="textfieldInvalidFormatMsg">Formato de celular inválido. Ej: 6677123456</span></span>
                    <div class="boton-consultar">
				 
					<p><img src="visual/mensaje_login.png" alt="" style="margin-bottom:-20px;" /> 
					  <input type="image" src="visual/registrame_login.png" />
					</p>
      </form><!-- Aqui termina el form de login-paciente -->
							<br>

			

						</div>

					</div>

				</div>

<form  method="post" action="panel.php?x=n" name="formulario-registro" 
				onsubmit="return registro_paciente()">

				<div class="ficha" style="background:none; display:none">

					<div class="envoltorio-ficha">
					<div class="boton-consultar">
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
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email");
        </script>

		<script type="text/javascript">
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
        </script>
<script type="text/javascript">
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "phone_number", {format:"phone_custom"});
</script>
