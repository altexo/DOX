<?

	mysql_connect("localhost","menteint_admin","navic1");
		
	mysql_select_db("menteint_dox");
	
	/*mysql_connect("localhost", "root", "");
	mysql_select_db("dox");*/
	

	$iddoctor = $_GET['iddoctor'];
	$id = $_GET['id'];
	$inicio = $_GET['inicio'];
	$final = $_GET['final'];
	$hinicio = $_GET['hinicio'];
	$hfinal = $_GET['hfinal'];
	$titulo = $_GET['titulo'];
	$bodyf = $_GET['bodyf'];
	$status = $_GET['status'];
	$sql = $_GET['sql'];
	$clinica = $_GET['clinica'];
	
	switch($sql)
	{
		case "1":


$sql4 = "SELECT MAX(id)+1 FROM datos WHERE iddoctor='".$iddoctor."'";
$resultado4 = mysql_query($sql4) or die('La consulta fall&oacute;: ' . mysql_error());
$row4=mysql_fetch_array($resultado4);

if($titulo!="")
{
//Genera Código 2 letras y 3 números aleatorios 
   
     $the_char = array(   
     "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"  
     );   
	 
     $the_char2 = array(   
     "1","2","3","4","5","6","7","8","9","0"  
     ); 

     $max_elements = count($the_char) - 1;   
	 $max_elements2 = count($the_char2) - 1;  
     mt_srand(time());    

     $c1 = $the_char[mt_rand(0,$max_elements)];    
     $c2 = $the_char[mt_rand(0,$max_elements)];    
     $c3 = $the_char2[mt_rand(0,$max_elements2)];    
     $c4 = $the_char2[mt_rand(0,$max_elements2)];    
     $c5 = $the_char2[mt_rand(0,$max_elements2)];    
       
     $reserva= "$c1$c2$c3$c4$c5";   
	 $clave = " -- CLAVE: ".$reserva;
	 $bodyf= utf8_decode($bodyf.$clave);
   
//FIN Código 2 letras y 3 números aleatorios 
$datos = mysql_query("insert into datos(iddoctor,id,inicio,final,hinicio,hfinal,titulo,bodyf,status,clinica, clavereserva) VALUES('".$iddoctor."',
'".$row4[0]."', '".$inicio."', '".$final."', '".$hinicio."', '".$hfinal."','".utf8_decode($titulo)."','".$bodyf."', '".$status."', '".$clinica."', '".$reserva."')");
}
else
{
	$datos = mysql_query("insert into datos(iddoctor,id,inicio,final,hinicio,hfinal,titulo,bodyf,status,clinica) VALUES('".$iddoctor."',
'".$row4[0]."', '".$inicio."', '".$final."', '".$hinicio."', '".$hfinal."','".$titulo."','".$bodyf."', '".$status."', '".$clinica."')");

	}

$sql = "SELECT * FROM doctor WHERE id='".$iddoctor."'";
$resultado = mysql_query($sql) or die('La consulta fall&oacute;: ' . mysql_error());
$row=mysql_fetch_array($resultado);

$sql2 = "SELECT * FROM clinica WHERE id='".$clinica."'";
$resultado2 = mysql_query($sql2) or die('La consulta fall&oacute;: ' . mysql_error());
$row2=mysql_fetch_array($resultado2);

if($titulo!="")
{
$hora3= $hinicio;
$hora_arreglo = explode(":",$hora3);
$hora_final2 = $hora_arreglo[0].":".$hora_arreglo[1];	
	
//Enviar correo doctor, paciente realizó una cita
$emaildr = $row['email'];
$sfrom1="DOX <no_contestar@dox.mx>"; //cuenta que envia 
$sdestinatario1=$emaildr; //cuenta destino 
$ssubject1="Cita creada desde CALENDAR DOX.mx"; //título

/*$shtml1="00:11 Query pasó por INSERT y luego hizo insert into datos(iddoctor,id,inicio,final,hinicio,hfinal,titulo,bodyf,status,clinica) VALUES('".$iddoctor."',
'".$row4[0]."', '".$inicio."', '".$final."', '".$hinicio."', '".$hfinal."','".$titulo."','".$bodyf."', '".$status."', '".$clinica."')";*/
$shtml1= "
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
        <h2>Usted tiene un consulta generada desde CALENDAR DOX.mx</h2></p>
      <p>-----------------------------------------</p>
    <p>
	<b>Fecha:</b> ".$inicio."<br /><b>Hora:</b> ".$hora_final2."
	 </p>
    <p>-----------------------------------------</p>
  <b>Paciente:</b> ".$titulo."
     <p>-----------------------------------------</p>
 <b>Información:</b> ".$bodyf."
 <p>-----------------------------------------</p>
 <b>Clínica:</b> ".$row2['nombre']."
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
			
	</body></html>
";
$sheader1="From:".$sfrom1."\nReply-To:".$sfrom1."\n"; 
$sheader1=$sheader1."X-Mailer:PHP/".phpversion()."\n"; 
$sheader1=$sheader1."Mime-Version: 1.0\n"; 
$sheader1=$sheader1."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
mail($sdestinatario1,$ssubject1,$shtml1,$sheader1);
}
		break;
	
		case "2":

/*$sqlx = "SELECT * FROM datos WHERE id='".$id."' and iddoctor='".$iddoctor."'";
$resultadox = mysql_query($sqlx) or die('La consulta fall&oacute;: ' . mysql_error());
$rowx=mysql_fetch_array($resultadox);*/

$sql = "SELECT * FROM doctor WHERE id='".$iddoctor."'";
$resultado = mysql_query($sql) or die('La consulta fall&oacute;: ' . mysql_error());
$row=mysql_fetch_array($resultado);

$sql2 = "SELECT * FROM clinica WHERE id='".$clinica."'";
$resultado2 = mysql_query($sql2) or die('La consulta fall&oacute;: ' . mysql_error());
$row2=mysql_fetch_array($resultado2);


	$datos2 = mysql_query("update datos set inicio='".$inicio."', final='".$final."',
 hinicio='".$hinicio."', hfinal='".$hfinal."', titulo='".$titulo."', bodyf='".$bodyf."', status='".$status."',
 clinica='".$clinica."' where id='".$id."' and iddoctor='".$iddoctor."'");	
 
 $sql3 = "SELECT * FROM datos WHERE inicio='".$inicio."' AND final='".$final."' AND hinicio='".$hinicio." AND hfinal='".$hfinal."'";
$resultado3 = mysql_query($sql3) or die('La consulta fall&oacute;: ' . mysql_error());
$row1000=mysql_fetch_array($resultado3);
		
 
if($row1000['status']!="borrado" or $row1000['status']!="cita-web")
{
	

//Enviar correo doctor, paciente realizó una cita
$emaildr = $row['email'];
$sfrom1="DOX <no_contestar@dox.mx>"; //cuenta que envia 
$sdestinatario1=$emaildr; //cuenta destino 
$ssubject1="Cita creada desde CALENDAR DOX.mx 2".$row1000['status']; //título

/*$shtml1="00:11 Query pasó por INSERT y luego hizo insert into datos(iddoctor,id,inicio,final,hinicio,hfinal,titulo,bodyf,status,clinica) VALUES('".$iddoctor."',
'".$row4[0]."', '".$inicio."', '".$final."', '".$hinicio."', '".$hfinal."','".$titulo."','".$bodyf."', '".$status."', '".$clinica."')";*/
$shtml1= "
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
        <h2>Usted tiene un consulta generada desde CALENDAR DOX.mx</h2></p>
      <p>-----------------------------------------</p>
    <p>
	<b>Fecha:</b> ".$inicio."<br /><b>Hora:</b> ".$hinicio."
	 </p>
    <p>-----------------------------------------</p>
  <b>Paciente:</b> ".$titulo."
     <p>-----------------------------------------</p>
 <b>Información:</b> ".$bodyf."
 <p>-----------------------------------------</p>
 <b>Clínica:</b> ".$row2['nombre']."
 <p>-----------------------------------------</p>
    
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
$sheader1="From:".$sfrom1."\nReply-To:".$sfrom1."\n"; 
$sheader1=$sheader1."X-Mailer:PHP/".phpversion()."\n"; 
$sheader1=$sheader1."Mime-Version: 1.0\n"; 
$sheader1=$sheader1."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
mail($sdestinatario1,$ssubject1,$shtml1,$sheader1);
}

		break;
		
		case "3":
		
			$datos3 = mysql_query("delete from datos where id='".$id."' and iddoctor='".$iddoctor."' and inicio='".$inicio."' and hinicio='".$hinicio."'");
			
			$emaildr = "correo@menteinteractiva.com";
$sfrom1="DOX <no_contestar@dox.mx>"; //cuenta que envia 
$sdestinatario1=$emaildr; //cuenta destino 
$ssubject1="Cita creada desde CALENDAR DOX.mx"; //título

$shtml1="Query pasó por DELETE y luego hizo delete from datos where id=".$id." and iddoctor=".$iddoctor." and inicio='".$inicio."' and hinicio='".$hinicio."'";

$sheader1="From:".$sfrom1."\nReply-To:".$sfrom1."\n"; 
$sheader1=$sheader1."X-Mailer:PHP/".phpversion()."\n"; 
$sheader1=$sheader1."Mime-Version: 1.0\n"; 
$sheader1=$sheader1."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
mail($sdestinatario1,$ssubject1,$shtml1,$sheader1);
			
				
		break;
	
	}
	
	mysql_close();

?>