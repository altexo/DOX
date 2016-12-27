<? 
session_start();
include("librerias/conexion.php");

$id = $_GET['id'];
$f= $GET['fecha']; 
$h= $GET['hora']; 
$doc= $GET['doctor']; 

if(isset($_POST['cancelar']))
{
	conectar();
	if($sql = mysql_query("Update datos Set status = 'cita-cancelada' where id = ".$id.""))
	{
		
		?>
        
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cancelar Cita</title>
<link href="colors/estilo_dox1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	padding: 10px;
}
</style>
</head>

<body>
        <h2>CANCELAR CITA.</h2>
		<p>La cita con el <? echo $_POST['doctor']; ?> el día <? echo $_POST['fecha']; ?> a las <? echo $_POST['hora']; ?> ha sido cancelada<br /><br />Motivo: <? echo $_POST['comentario']; ?><br /><br />Muchas gracias por usar dox.mx</p></body>
</html>
        <?
$email = $_SESSION['email'];
$sfrom="DOX <no_contestar@dox.mx>"; //cuenta que envia 
$sdestinatario=$email; //cuenta destino 
$ssubject="Cita cancelada desde DOX.mx";
//subject 
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
    <p><strong>Su cita:</strong><br>
      ".$_POST['hora']." el ".$_POST['fecha']." </p>
    <p>-----------------------------------------</p>
    <p>Ha sido registrada como CANCELADA</p>
    <p>-----------------------------------------</p>
    <p><strong>Doctor:</strong><br>
      ".$_POST['doctor']."</p>
    <p>-----------------------------------------<br>
    </p>
   <strong>Motivo:</strong>
     <p>".$_POST['comentario']."</p>
     
	 <br>
      <br>
      Recuerde que puede acceder a su panel de control con su email y contraseña donde puede checar sus citas en línea.<br>
      <a href=\"http://www.dox.mx/panel.php\">http://www.dox.mx/panel.php</a><br>
      <br>
      DOX.mx es marca registrada 2012.
<br>
      <br>
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
			
				
$sql3 = "SELECT * FROM datos WHERE id='".$id."'";
$resultado3 = mysql_query($sql3) or die('La consulta fall&oacute;: ' . mysql_error());
$row3=mysql_fetch_array($resultado3);
		
$sql2 = "SELECT * FROM doctor WHERE id='".$row3['iddoctor']."'";
$resultado2 = mysql_query($sql2) or die('La consulta fall&oacute;: ' . mysql_error());
$row2=mysql_fetch_array($resultado2);

$sfrom="DOX <no_contestar@dox.mx>"; //cuenta que envia 
$sdestinatario=$row2['email']; //cuenta destino 
$ssubject="
Cita cancelada a través de dox.mx"; //subject 
$shtml=	"
<html> 
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
 <body bgcolor=\"#DCEEFC\"> 			
La cita con ".$_POST['doctor']." el día ".$_POST['fecha']." a las ".$_POST['hora']." ha sido cancelada<br /><br />Motivo: ".$_POST['comentario']."<br /><br />Muchas gracias por usar dox.mx

</body></html>
";
$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
$sheader=$sheader."Mime-Version: 1.0\n"; 
$sheader=$sheader."Content-Type: text/html; charset=utf-8\r\n\r\n";
mail($sdestinatario,$ssubject,$shtml,$sheader);
		
	}
	
	desconectar();
}
else if(isset($_POST['mantener']))
{
	echo "nada :)";
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
<style type="text/css">
body {
	padding: 10px;
}
</style>
</head>

<body>
<h2>CANCELAR CITA.</h2>
<p>Deseo cancelar mi cita con <br /><? echo $_GET['doctor']; ?> <br />el día <? echo $_GET['fecha']; ?> <br />a las <? echo $_GET['hora']; ?> h.</p>

<p style="font-size:11px">Recuerde que al cancelar una cita debe especificar el motivo. Al cancelar su cita se anulará el compromiso que tiene con el médico, aun así le recomendamos solamente cancelar cuando definitivamente no pueda acudir a su cita.</p>
<form id="form1" name="form1" method="post" action="">
  <label>
    Motivo de cancelación:<br />
    <input type="hidden" value="<? echo $_GET['doctor']; ?>" id="doctor" name="doctor"  />
<input type="hidden" value="<? echo $_GET['fecha']; ?>" id="fecha" name="fecha"  />
<input type="hidden" value="<? echo $_GET['hora']; ?>" id="hora" name="hora"  />
    <textarea name="comentario" id="comentario" cols="45" rows="5"></textarea>
    <br />
    <br />
    <input type="submit" name="cancelar" id="cancelar" value="Cancelar Cita" />
  
<br />
  </label>
</form>
<p>&nbsp;</p>
</body>
</html>
<? } ?>