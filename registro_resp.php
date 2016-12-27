<?
session_start();
$_SESSION['id'] = $_GET['id'];
$_SESSION['iddoctor'] = $_GET['iddoctor'];
$_SESSION['hora'] = $_GET['hora'];
$_SESSION['clinica'] = $_GET['clinica'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Login - Dox</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<script type="text/javascript" src="magic/magic-script.js"></script>
</head>

<body class="fondo-portada">

	<div class="contenedor">



		<div id="cabecera-dox">

			<div id="logo-cabecera-dox">
	
				
								
			</div><!-- Aqui termina el div del logo ---->
				
				
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
						<li><a href="#">Mis Citas</a></li>
						<li><a href="#">Búsquedas</a></li>
						<li><a class="seleccionado" href="#">Inicio</a></li>
					</ul>
				
				<div style="clear:both;"></div>
				
				</div><!---- Aqui termina el div del menu de navegacion ------>
			
			</div><!---- Aqui termnina el div referente a la cabecera de dox en las opciones ---->
				
			<div style="clear:both;"></div>
				
			
			
		</div><!----- Aqui termina la cabecera de dox ---->

		<div style="clear:both;"></div>


		<br>


		<div id="degradado">
		
		<div id="contenedor-login">

			
			<div id="fichas-contenedor">

				<div class="ficha">
				<form method="post" action="cita-confirmacion.php" name="formulario-login" onsubmit="return login_paciente()">
					
					<div class="envoltorio-ficha">
					
						<img src="visual/yasoyusuario2.png">
				

<input type="text" class="form-login" onfocus="placeholder_in('Nombre','nombre_registrado')" 
id="nombre_registrado" value="Nombre" onfocusout="placeholder_out('Nombre','nombre_registrado')" 
>

<input type="password" class="form-login" onfocus="placeholder_in('Contraseña','contra_registrado')" 
onfocusout="placeholder_out('Contraseña','contra_registrado')" 
id="contra_registrado" value="Contraseña">
									

						<div class="boton-consultar">
							
							<input type="image" src="visual/consultar_login.png" id="boton_registrado">
					</form><!-- Aqui termina el form de login-paciente -->
							<br>

			<span id="olvidar"><img src="visual/question.png">
			Olvidaste tu contraseña..</span>
			<a href="#">Haz clic aqu&iacute;</a>

						</div>

					</div>

				</div>

<form  method="post" action="cita_confirmacion.php" name="formulario-registro" 
				onsubmit="return registro_paciente()">

				<div class="ficha">

					<div class="envoltorio-ficha">

						<img src="visual/nosoyusuario2.png">


<input type="text" class="form-login" onfocus="placeholder_in('Nombre','nombre_registro')" 
onfocusout="placeholder_out('Nombre','nombre_registro')" 
id="nombre_registro" value="Nombre" name="nombre_registro">

<input type="text" class="form-login" onfocus="placeholder_in('Email','email_registro')" 
onfocusout="placeholder_out('Email','email_registro')" 
id="email_registro" value="Email" name="email_registro">
						
<input type="password" class="form-login" onfocus="placeholder_in('Contraseña','contra_registro')" 
onfocusout="placeholder_out('Contraseña','contra_registro')" 
id="contra_registro" value="Contraseña" name="contra_registro">

<input type="text" class="form-login" onfocus="placeholder_in('Celular','cel_registro')" 
onfocusout="placeholder_out('Celular','cel_registro')" 
id="cel_registro" value="Celular" name="cel_registro">					


						<div class="boton-consultar">
							<img style="margin-bottom:-20px;" src="visual/mensaje_login.png">
				<input type="image" src="visual/registrame_login.png">


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
		