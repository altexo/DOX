<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>DOX - Reserva tu consulta médica en línea - Contacto</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="jquery/reveal.css">
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>

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

</head>

<body>

	<div class="contenedor">


<?php include("cabeza.php"); ?>

		<div style="clear:both;"></div>
		
		<div id="menu-opciones">
		
			<ul>
				<li><a href="empresa.php">Empresa</a><li>
				<li><a href="funcionamiento.php">¿Cómo funciona?</a><li>
				<li><a href="especialistas.php">Especialistas</a><li>
				<li><a href="usuarios.php">Usuarios</a><li>
				<li><a href="faq.php">Preguntas</a><li>
				<li><a href="#">Contáctanos</a><li>
			</ul>
		
		
		</div>
		
		</div>
		
		<div id="contenedor-degradado-apartados">
		
		<div class="contenedor">
		
		<div id="faq-contenido-contacto">
		
			<div id="contenido-funcionamiento">
			
				<div class="titulo-funcionamiento-pregunta">
					
				<span class="titulo1-funcionamiento">Contáctanos</span></div>
			
			
			<div style="clear:both;"></div>
			<h2>Acércate a nosotros, llena este formulario electrónico y con gusto te responderemos.</h2>
            <form action="contacto-enviar.php" method="post">
			<div id="formulario-especialistas"><span id="sprytextfield1">
			  <input type="text" name="nombre" placeholder="Nombre"/>
			  <span class="textfieldRequiredMsg">Se requiere que ingreses tu nombre.</span></span><span id="sprytextfield2">
              <input type="text" name="correo" placeholder="Correo Electrónico"/>
              <span class="textfieldRequiredMsg">Se requiere tu correo electrónico.</span><span class="textfieldInvalidFormatMsg">Formato de email inválido.</span></span>
			  <input type="text" name="celular" placeholder="Celular"/>
			  <span id="sprytextarea1">
			  <textarea name="domicilio" placeholder="Comentarios"></textarea>
			  <span class="textareaRequiredMsg">Se requiere ingreses un mensaje.</span></span><br />  <input name="submit" type="submit" class="button" value="Enviar" style="color:#FFF; width:408px"   />	
			
			</div></form>
	      </div><!--- Auqui termina el div del contenido funcionamiento ----><!--- Aqui termina el div opciones-contenido-funcionamiento --->		
		
			
		
		</div><!--- Aqui termina el div de funcionamiento ------>
		
	</div><!--- Aqui termina el contenedor de dox ---->

	
	</div><!--- Aqui termina el contenedor-degradado-apartados--->
	
	<div style="clear:both;"></div>
	
	
	<div id="contenedor-ciudad">
	
		
	
	
	
	</div><!--- Aqui termina el contenedor ciudad ----->
	
	
	<div style="clear:both;"></div>
	
	
	</div><!--- Aqui termina el contenedor de dox ---->
<?php include("pie.php"); ?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>
</body>
</html>
		