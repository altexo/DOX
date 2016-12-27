<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>DOX - Reserva tu consulta médica en línea - Especialistas</title>

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
				<li><a href="#">Especialistas</a><li>
				<li><a href="usuarios.php">Usuarios</a><li>
				<li><a href="faq.php">Preguntas</a><li>
				<li><a href="contacto.php">Contáctanos</a><li>
			</ul>
		
		
		</div>
		
		</div>
				
		<div id="contenedor-degradado-apartados">
		
		<div class="contenedor">
		
		
		<div id="contenedor-especialistas">
		
			<div id="titulo-especialistas">
					
				<span class="titulo1-especialistas">Especialistas</span>
				
			</div>
		
		
			<div style="clear:both;"></div>
		
			<div id="contenido-indice-expecialistas">
		
			<span class="texto-resaltado">DOX</span> ofrece un espacio para que los especialistas m&eacute;dicos
			puedan publicar <span class="texto-resaltado">su horario de consulta</span> así como
			<span class="texto-resaltado">crear un perfil</span> que contenga <span class="texto-resaltado">
			sus datos de contacto, académicos y profesionales</span>.
		
            <div class="titulo-contenido-especilistas">
			Beneficios
		</div>
			
			<ul>
				<li>Nuevos pacientes.</li>
				<li>DOX es un excelente medio para darse a conocer profesionalmente, aumentar la cartera de 
					pacientes y el volumen de consultas.</li>
				<li>Le ayuda a mantener a sus pacientes existentes.</li>
				<li>Permite publicar los horarios disponibles por cancelaci&oacute;n o inasistencia aumentando as&iacute; la 
					 probabilidad de que otro paciente reserve ese espacio.</li>
				
			
			</ul>
            
            <div style=" width: 340px; margin-left:auto; margin-right:auto">
            <!--<form action="http://www.dox.mx/memberadmin">
            <input name="submit" type="submit" class="button" value="¡Estoy listo para contratar!"  />	
            </form>-->
            </div>
			
			<div class="titulo-contenido-especilistas">
				Para obtener más información llene el siguiente formulario y un representante de DOX se pondrá en contacto con usted:</div>
			
			<div style="clear:both;"></div>
			
			<form action="especialistas-enviar.php" method="post">
			<div id="formulario-especialistas" style="width:400px"><span id="sprytextfield1">
			  <input type="text" name="nombre" placeholder="Su Nombre Completo"/>
			  <span class="textfieldRequiredMsg">Se requiere llenar este campo</span></span><span id="sprytextfield2">
			  <input type="text" name="especialidad" placeholder="Especialidad"/>
			  <span class="textfieldRequiredMsg">Se requiere llenar este campo</span></span><span id="sprytextfield3">
              <input type="text" name="correo" placeholder="Correo Electrónico"/>
              <span class="textfieldRequiredMsg">Se requiere un email.</span><span class="textfieldInvalidFormatMsg">Formato de email inválido.</span></span>
			  <input type="text" name="domicilio" placeholder="Domicilio"/>
			  <span id="sprytextfield4">
			  <input type="text" name="celular" placeholder="Celular"/>
			  <span class="textfieldRequiredMsg">Se requiere llenar este campo.</span></span><span id="sprytextarea1">
				<textarea name="comentarios" placeholder="Comentarios"></textarea>
				<span class="textareaRequiredMsg">Se requiere llenar este campo.</span></span>
				<div class="boton" style="margin-top:0px">
			<input name="submit" type="submit" class="button" value="Enviar" style="width:410px; color:#FFF"  />	
			</div>
			
			</div><!--- Aqui termina el div formulario-especialistas---->
		
			</form>
			
			<div id="doctor-especialistas"><img src="visual/especialistas1.jpg" width="380" height="293" /></div><!--- Aqui termina el div doctor-especialistas---->
			
			
		
		
		
		  </div><!--- Aqui termina el indice de especialistas ------->
		
		
		</div><!--- Aqui termina el contenedor de especialistas------>
		
		
		
	</div><!--- Aqui termina el contenedor de dox ---->

	
	</div><!--- Aqui termina el contenedor de degradado ----->
	
	<div style="clear:both;"></div>
	
	
	<div id="contenedor-ciudad">
	
		
	
	
	
	</div><!--- Aqui termina el contenedor ciudad ----->
	
	
	<div style="clear:both;"></div>
	
	
	<?php include("pie.php"); ?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
</script>
</body>
</html>
		