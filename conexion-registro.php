<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Request-Method: *');
    header('Access-Control-Allow-Headers: x-requested-with');
    if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
	    header("HTTP/1.1 200 OK");
	    return;
    }
// inicio 

include("librerias/conexion.php");
header('Content-type: text/json');

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$contraclean = $_POST['contra'];
$cel = $_POST['cel'];

$contra = md5($contraclean);
$contratokenclean=$contraclean."wiiwo";
$contratoken = md5($contratokenclean);

conectar();
$sq = mysql_query("Select * from paciente where email = '".$email."'");
$num = mysql_num_rows($sq);

if($num == 0)
{
	if($sql = mysql_query("Insert into paciente (nombre,email,contrasena,celular,passwordtoken) Values ('".$nombre."','".$email."','".$contra."','".$cel."','".$contratoken."')"))
	{
	
		$_SESSION['email'] = $email;
		$_SESSION['contra'] = $pass;
		
		$sql2 = "SELECT id, nombre, email, celular, passwordtoken FROM paciente WHERE email = '".$email."'";
	$result=mysql_query($sql2);
		$row_usuario = mysql_fetch_assoc($result);
		
		echo json_encode(array("exito" => true, "user" => $row_usuario));
		
		
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
     Has completado tu fase de registro, a partir de este momento podrás realizar reservaciones para consultas médicas.<br /><br />Usuario: ".$_POST['email']."<br />Contraseña: ".$_POST['contra']."
	 <br>
      <br>
      Recuerda que puedes acceder al panel de control con tu email y contraseña donde puedes checar tus citas en línea.<br>
      <a href=\"http://www.dox.mx/panel.php\">http://www.dox.mx/panel.php</a><br>
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
		
		
		echo json_encode(array("exito" => false, "message" => "Problemas al registrar"));
		
		
	}
}
else
{
	
	
	echo json_encode(array("exito" => false, "message" => "Ya existe un usuario con este e-mail"));
		
}
																						  
																					
desconectar();  

// fin


?>
