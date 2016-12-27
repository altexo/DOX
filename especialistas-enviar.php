<?php
$sfrom="DOX <no_contestar@dox.mx>"; //cuenta que envia 
$sdestinatario="clientes@dox.mx"; //cuenta destino 
$ssubject="Mensaje generado desde especialistas DOX.mx"; //título

$shtml=
"
<html> 
			
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<body bgcolor=\"#DCEEFC\"> 

<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family:arial\" >
  <tr>
    <td height=\"40\" colspan=\"3\" align=\"center\" valign=\"middle\" bgcolor=\"#66CCFF\"><a href=\"http://www.dox.mx\" style=\"color:white\">Mensaje generado desde dox.mx</a></td>
  </tr>
  <tr>
    <td width=\"10%\">&nbsp;</td>
    <td align=\"center\"><a href=\"index.php\"><img src=\"http://www.dox.mx/visual/exito1.png\" width=\"545\" height=\"44\" /></a></td>
    <td width=\"10%\">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align=\"center\" style=\"font-size:13px\"><p><br>
        <h2>Mensaje generado desde Contacto DOX.mx</h2></p>
      <p>-----------------------------------------</p>
    <p>
	<b>Nombre:</b> ".$_POST["nombre"]."
	 </p>
    <p>-----------------------------------------</p>
  <b>Especialidad:</b> ".$_POST["especialidad"]."
     <p>-----------------------------------------</p>
 <b>Celular:</b> ".$_POST["celular"]."
 <p>-----------------------------------------</p>
 <b>Email:</b> ".$_POST["correo"]."
 <p>-----------------------------------------</p>
  <b>Domicilio:</b> ".$_POST["domicilio"]."
 <p>-----------------------------------------</p>
  <b>Comentarios:</b> ".$_POST["comentarios"]."
 <p>-----------------------------------------</p>
 
 
    
      <br>
      DOX.mx es marca registrada 2014.
<br>
      <br>
	  <p style=\"font-size:10px\">AVISO DE PRIVACIDAD SIMPLIFICADO: DOX SOLUTIONS, S.A. DE C.V., CON DOMICILIO EN CALLE RIO QUELITE NO. 180, COL. GUADALUPE C.P. 80220 EN CULIACÁN, SINALOA, MÉXICO. UTILIZARÁ SUS DATOS PERSONALES AQUÍ RECABADOS PARA PODER GARANTIZAR EL BUEN FUNCIONAMIENTO DE LA APLICACIÓN Y/O HERRAMIENTA WEB A LA QUE ESTÁN ACCESANDO, ASÍ COMO RECIBIR NOTIFICACIONES, INVITACIONES, PROMOCIONES Y NOTICIAS, PARA PODER PERMITIR LA IDENTIFICACIÓN DEL USUARIO EN CASO DE MAL USO DEL SITIO. SI REQUIERE MAYOR INFORMACIÓN ACERCA DEL TRATAMIENTO Y DE LOS DERECHOS QUE PUEDE HACER VALER, USTED PUEDE ACCEDER AL AVISO DE PRIVACIDAD COMPLETO A TRAVÉS DE NUESTRA PAGINA <a href=\"http://www.dox.mx\" target=\"_blank\">WWW.DOX.MX</a> Y/O AL CORREO ELECTRONICO <a href=\"mailto:correo@dox.mx\">CORREO@DOX.MX</a>.</p>
   </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height=\"111\" background=\"http://dox.mx/visual/ciudad.png\"  colspan=\"3\" style=\" background-image:url(http://dox.mx/visual/ciudad.png); background-position:initial initial; background-repeat:repeat no-repeat; height:111px; margin-top:20px\" >&nbsp;</td>
  </tr>
</table>		
			
	</body></html>";

$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
$sheader=$sheader."Mime-Version: 1.0\n"; 
$sheader=$sheader."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
mail($sdestinatario,$ssubject,$shtml,$sheader);

// Segundo correo a receptor

$sfrom="DOX <no_contestar@dox.mx>"; //cuenta que envia 
$sdestinatario=$_POST["correo"]; //cuenta destino 
$ssubject="Mensaje generado desde especialistas DOX.mx"; //título

$shtml=
"
<html> 
			
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<body bgcolor=\"#DCEEFC\"> 

<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family:arial\" >
  <tr>
    <td height=\"40\" colspan=\"3\" align=\"center\" valign=\"middle\" bgcolor=\"#66CCFF\"><a href=\"http://www.dox.mx\" style=\"color:white\">Mensaje generado desde dox.mx</a></td>
  </tr>
  <tr>
    <td width=\"10%\">&nbsp;</td>
    <td align=\"center\"><a href=\"index.php\"><img src=\"http://www.dox.mx/visual/exito1.png\" width=\"545\" height=\"44\" /></a></td>
    <td width=\"10%\">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align=\"center\" style=\"font-size:13px\"><p><br>
        <h2>Mensaje generado desde Contacto DOX.mx</h2></p>
      <p>-----------------------------------------</p>
    <p>
	Hola ".$_POST["nombre"].", le agradecemos su interés en DOX.mx. Le comunicamos que hemos recibido su correo electrónico y en breve nos comunicaremos con usted. 
	 </p>
    <p>-----------------------------------------</p>
  <b>DOX Solutions</b></p>
    
      <br>
      DOX.mx es marca registrada 2014.
<br>
      <br>
	   <p style=\"font-size:10px\">AVISO DE PRIVACIDAD SIMPLIFICADO: DOX SOLUTIONS, S.A. DE C.V., CON DOMICILIO EN CALLE RIO QUELITE NO. 180, COL. GUADALUPE C.P. 80220 EN CULIACÁN, SINALOA, MÉXICO. UTILIZARÁ SUS DATOS PERSONALES AQUÍ RECABADOS PARA PODER GARANTIZAR EL BUEN FUNCIONAMIENTO DE LA APLICACIÓN Y/O HERRAMIENTA WEB A LA QUE ESTÁN ACCESANDO, ASÍ COMO RECIBIR NOTIFICACIONES, INVITACIONES, PROMOCIONES Y NOTICIAS, PARA PODER PERMITIR LA IDENTIFICACIÓN DEL USUARIO EN CASO DE MAL USO DEL SITIO. SI REQUIERE MAYOR INFORMACIÓN ACERCA DEL TRATAMIENTO Y DE LOS DERECHOS QUE PUEDE HACER VALER, USTED PUEDE ACCEDER AL AVISO DE PRIVACIDAD COMPLETO A TRAVÉS DE NUESTRA PAGINA <a href=\"http://www.dox.mx\" target=\"_blank\">WWW.DOX.MX</a> Y/O AL CORREO ELECTRONICO <a href=\"mailto:correo@dox.mx\">CORREO@DOX.MX</a>.</p>
   </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height=\"111\" background=\"http://dox.mx/visual/ciudad.png\"  colspan=\"3\" style=\" background-image:url(http://dox.mx/visual/ciudad.png); background-position:initial initial; background-repeat:repeat no-repeat; height:111px; margin-top:20px\" >&nbsp;</td>
  </tr>
</table>		
			
	</body></html>";

$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
$sheader=$sheader."Mime-Version: 1.0\n"; 
$sheader=$sheader."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
mail($sdestinatario,$ssubject,$shtml,$sheader);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>DOX - Reserva tu consulta médica en línea - Especialistas</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="jquery/reveal.css">
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="magic/magic-script.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
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
<div class="titulo-contenido-especilistas">
			¡Su solicitud ha sido enviada! <br />
			  Muchas gracias por su interés en DOX.mx <br />
			  <br />
			  En breve, le enviaremos respuesta. </div>
			
			<div style="clear:both;"></div>
			
			<form action="especialistas-enviar.php" method="post">
			<div id="formulario-especialistas" style="width:400px"><span id="sprytextfield1">
			  <input name="nombre" type="text" disabled="disabled" placeholder="Su Nombre Completo"/>
			  <span class="textfieldRequiredMsg">Se requiere llenar este campo</span></span><span id="sprytextfield2">
			  <input name="especialidad" type="text" disabled="disabled" placeholder="Especialidad"/>
			  <span class="textfieldRequiredMsg">Se requiere llenar este campo</span></span><span id="sprytextfield3">
              <input name="correo" type="text" disabled="disabled" placeholder="Correo Electrónico"/>
              <span class="textfieldRequiredMsg">Se requiere un email.</span><span class="textfieldInvalidFormatMsg">Formato de email inválido.</span></span>
			  <input name="domicilio" type="text" disabled="disabled" placeholder="Domicilio"/>
			  <span id="sprytextfield4">
			  <input name="celular" type="text" disabled="disabled" placeholder="Celular"/>
			  <span class="textfieldRequiredMsg">Se requiere llenar este campo.</span></span><span id="sprytextarea1">
				<textarea name="comentarios" disabled="disabled" placeholder="Comentarios"></textarea>
				<span class="textareaRequiredMsg">Se requiere llenar este campo.</span></span>
				<div class="boton"></div>
			
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
		