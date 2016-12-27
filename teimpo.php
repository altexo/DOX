<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CRON JOB</title>
</head>

<body>
<? 
/*Conecta a Bases de Datos*/
include("librerias/conexion.php");

/*Hora Actual SERVER*/
$horaActual = date("H:i:s", time());
$actual = date("Y-m-d");

/*Hora Actual Sumada a 3 horas*/
$horaSumada = $horaActual+(180*60);
$cita = date("H:i:s",$horaSumada);

conectar(); 


$sql = mysql_query("SELECT * FROM datos WHERE `inicio` = '".$actual."' AND `hinicio` = '".$cita."';"); 
echo "SELECT * FROM datos WHERE `inicio` = '".$actual."' AND `hinicio` = '".$cita."';";
while ($rw = mysql_fetch_array($sql))
{
/* Inicio WHILE */	

$sql1 = "SELECT * FROM doctor WHERE id='".$rw['iddoctor']."'";
$resultado1 = mysql_query($sql1) or die('La consulta fall&oacute;: ' . mysql_error());
$row1=mysql_fetch_array($resultado1);

$sql2 = "SELECT * FROM paciente WHERE id='".$rw['idpaciente']."'";
$resultado2 = mysql_query($sql2) or die('La consulta fall&oacute;: ' . mysql_error());
$row2=mysql_fetch_array($resultado2);


$sfrom="DOX <no_contestar@dox.mx>"; //cuenta que envia 
$sdestinatario=$row2['email']; //cuenta destino 
$ssubject="Recordatorio de Cita DOX.mx"; //subject 
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
    <td align=\"center\" style=\"font-size:13px\"><p>
	   <br>Te recordamos que en las próximas horas tiene una cita para consulta médica. A continuación, los detalles de la misma:<br>
	
	<br>
        <em>Hola ".$row2['nombre'].":</em></p>
      <p>-----------------------------------------</p>
    <p><strong>Su cita:</strong><br>
      ".$rw['hinicio']." el ".$rw['inicio']." </p>
    <p>-----------------------------------------</p>
  
    <p><strong>Doctor:</strong><br>
      ".$row1['nombre']." ".$row1['a_paterno']."</p>
    <p>-----------------------------------------<br>
   
     
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
			
	</body></html>";
			$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 
			$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
			$sheader=$sheader."Mime-Version: 1.0\n"; 
			$sheader=$sheader."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
			mail($sdestinatario,$ssubject,$shtml,$sheader);

/* Fin WHILE */	
}
desconectar();
?>

</body>
</html>