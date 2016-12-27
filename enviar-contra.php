<? 
include("librerias/conexion.php");

if(isset($_POST['enviar']))
{
	conectar();
	$sql = mysql_query("Select * from paciente where email = '".$_POST['email']."'");
	if($row = mysql_fetch_array($sql))
	{
		
		?>
       <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DOX - Recuperar contraseña</title>
<link href="colors/estilo_dox1.css" rel="stylesheet" type="text/css" />
</head>

<body>
        <h2><br />
RECUPERACIÓN CONTRASEÑA.</h2><br />
        Se ha enviado la contraseña al correo electrónico proporcionado.<br /><br />
</body>
        </html>
		<?php
		
		$sfrom="DOX <no_contestar@dox.mx>"; //cuenta que envia 
			$sdestinatario=$_POST['email']; //cuenta destino 
			$ssubject="Recuperación de contraseña DOX"; //subject 
			$shtml=	"
			<html> 
  			<body bgcolor=\"#DCEEFC\"> 
			¡Hola! Se ha solicitado la contraseña de manera automática desde el sitio Web de Dox.<br /><br />Su contraseña de usuario es:<br /><h3>".$row['contrasena']."</h3><br /><br />Gracias por usar dox.mx Por favor no conteste a este email. Si usted tiene una consulta sobre dudas o comentarios dirígase a info@dox.mx <br /><br />Atentamente,<br/ >El equipo de DOX</body></html>";
			$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 
			$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
			$sheader=$sheader."Mime-Version: 1.0\n"; 
			$sheader=$sheader."Content-Type: text/html\r\n"; 
			mail($sdestinatario,$ssubject,$shtml,$sheader);
		
	}
	else
	{
		echo utf8_decode("El correo proporcionado no está registrado.");
	}
	
	desconectar();
}
else
{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cancelar Cita</title>
<link href="colors/estilo_dox1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h2><br />
RECUPERACIÓN CONTRASEÑA.</h2>
<form id="form1" name="form1" method="post" action="">
  <label>
    Email:
      <input type="text" name="email" id="email" />
    <br />
    <br />
    <br />
    <input type="submit" name="enviar" id="enviar" value="Enviar contraseña" />
    <br />
  </label>
</form>
<p>&nbsp;</p>
</body>
</html>
<? } ?>