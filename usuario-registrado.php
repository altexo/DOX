<?
include("librerias/conexion.php");
$nombre = $_POST['nombre_registro'];;
$email = $_POST['email_registro'];
$contraclean = $_POST['password'];
$contra = md5($contraclean);
$contratokenclean=$contraclean."wiiwo";
$contratoken = md5($contratokenclean);
$cel = $_POST['cel_registro'];

conectar();
mysql_query('SET CHARACTER SET utf8');
$sq = mysql_query("Select * from paciente where email = '".$email."'");
$num = mysql_num_rows($sq);

if($num == 0)
{
	if($sql = mysql_query("Insert into paciente (nombre,email,contrasena,celular,passwordtoken) Values ('".$nombre."','".$email."','".$contra."','".$cel."','".$contratoken."')"))
	{
		$mensaje = "

		<h2>Bienvenido a DOX</h2>
		<p>Tu usuario ha sido registrado satisfactoriamente,</p><p>Ya puedes realizar y consultar citas.</p>
		<p>Haga click <a href='index.php' > aquí </a> para empezar a hacer citas.</p>
		<p>Haga click <a href='registro-panel.php' > aquí </a> para ir a su panel de citas.</p><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		
		//Enviar Email bienvenida
			$sfrom="DOX <no_contestar@dox.mx>"; //cuenta que envia 
			$sdestinatario=$email; //cuenta destino 
			$ssubject="Bienvenido a dox.mx"; //subject 
			$shtml=	"
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
    <td align=\"center\" style=\"font-size:13px\">
    <p>Tu usuario ha sido registrado satisfactoriamente.</p><p>Ya puedes realizar y consultar citas en línea.</p>
     Has completado tu fase de registro, a partir de este momento podrás realizar reservaciones para consultas médicas.<br /><br />Usuario: ".$_POST['email_registro']."<br />Contraseña: ".$_POST['password']."
	 <br>
      <br>
      Recuerda que puedes acceder al panel de control con tu email y contraseña donde puedes checar tus citas en línea.<br>
      <a href=\"http://www.dox.mx/panel.php\">http://www.dox.mx/panel.php</a><br>
      <br>
      DOX.mx es marca registrada 2013.
<br>
      <br>
	  <p style=\"font-size:11px\">AVISO DE PRIVACIDAD SIMPLIFICADO: DOX SOLUTIONS, S.A. DE C.V., CON DOMICILIO EN CALLE RIO QUELITE NO. 180, COL. GUADALUPE C.P. 80220 EN CULIACÁN, SINALOA, MÉXICO. UTILIZARÁ SUS DATOS PERSONALES AQUÍ RECABADOS PARA PODER GARANTIZAR EL BUEN FUNCIONAMIENTO DE LA APLICACIÓN Y/O HERRAMIENTA WEB A LA QUE ESTÁN ACCESANDO, ASÍ COMO RECIBIR NOTIFICACIONES, INVITACIONES, PROMOCIONES Y NOTICIAS, PARA PODER PERMITIR LA IDENTIFICACIÓN DEL USUARIO EN CASO DE MAL USO DEL SITIO. SI REQUIERE MAYOR INFORMACIÓN ACERCA DEL TRATAMIENTO Y DE LOS DERECHOS QUE PUEDE HACER VALER, USTED PUEDE ACCEDER AL AVISO DE PRIVACIDAD COMPLETO A TRAVÉS DE NUESTRA PAGINA <a href=\"http://www.dox.mx\" target=\"_blank\">WWW.DOX.MX</a> Y/O AL CORREO ELECTRONICO <a href=\"mailto:correo@dox.mx\">CORREO@DOX.MX</a>.</p>
   </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height=\"111\" background=\"http://dox.mx/visual/ciudad.png\"  colspan=\"3\" style=\" background-image:url(http://dox.mx/visual/ciudad.png); background-position:initial initial; background-repeat:repeat no-repeat; height:111px; margin-top:20px\" >&nbsp;</td>
  </tr>
</table>		
			
	</body></html>
			
		";
			$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 
			$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
			$sheader=$sheader."Mime-Version: 1.0\n"; 
			$sheader=$sheader."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
			mail($sdestinatario,$ssubject,$shtml,$sheader);
	}
	else
	{
		$mensaje = "Problemas al guardar";
	}
}
else
{
	$mensaje = "No es posible registrar el mismo correo electrónico dos veces";
}
																						  
																					
desconectar();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Login - Dox</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<link rel="stylesheet" href="jquery/reveal.css">	
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>
</head>

<body class="fondo-portada">

	<div class="contenedor">
     <?php include("cabeza.php"); ?>
    <!----- Aqui termina la cabecera de dox ---->

	  <div style="clear:both;"></div>


		<br>


		<div id="degradado">
		
		<div id="contenedor-login">

			
			<div id="fichas-contenedor">
			  <? echo $mensaje; ?>
          </div>

				</div><!-- Aqui termina el form de registro paciente -->

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
	
	<?php include("pie.php"); ?>
	
	</div>
	
</body>
</html>
		