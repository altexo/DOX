<?php
$nombre = $_POST['nombre_registro'];
$email = $_POST['email_registro'];
$contra = $_POST['contra_registro'];
$celular = $_POST['cel_registro'];

if($nombre == "" || $email == "" || $contra == "" || $celular == "" || is_numeric($celular) != true)
{
	$mensaje = "<div id='mensaje-registro'>Los datos dados no estan correctamente escritos 
	<a href='registro.php>vuelve a intentarlo </a></div>";
}
else{

$mensaje = "<div id='mensaje-registro'>Bienvenido<span id='nombre-registrado'> 	".$nombre." </span>, estas listo <a href='#'>Realiza una busqueda</a></div>";

 
/*include("respaldo/librerias/conexion2.php");
conectar();
$sql = mysql_query("insert into table(nombre,email,contra,celular)values('".$nombre."','".$email."',
'".$contra."','".$celular."'");
desconectar();*/
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Confirmacion de registro - Dox</title>

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


		<div id="mensaje-confirmacion-registro">

			<?php 

			echo $mensaje;


			?>

		</div>


		</div><!---- Aqui termina el div de degradado -->
		
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
		