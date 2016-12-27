
<?
include("librerias/conexion.php");
	
	if(isset($_POST['guardar']))
	{	
	
		$email = utf8_decode($_POST['email']);
		$pass = utf8_decode($_POST['pass']);
		conectar();
		if ($email <> "" && $pass <> "" /*&& $a_paterno <> "" && $dateToMySQL <> "" && $telefono <> ""*/)
		{
			//Validar que no se repita el correo
			
			$sq = mysql_query("Select * From doctor where email = '".$email."'");
			$num = mysql_num_rows($sq);
			
			
			if($num == 0)
			{
						
				$sql = "INSERT INTO doctor(email,pass) VALUES ('".$email."','".$pass."')";
				
			
		
				if($result = mysql_query($sql))
				{ 
				
				$sql2 = "SELECT * FROM doctor WHERE email= '".$email."'";
				$resultado2 = mysql_query($sql2) or die('La consulta fall&oacute;: ' . mysql_error());		
				$row2=mysql_fetch_array($resultado2);
				
				
				$sql_g= "INSERT INTO galeria(id_doctor) VALUES ('".$row2['id']."')";
				$result = mysql_query($sql_g);
			
				$sql_c= "INSERT INTO clinica(id_doctor) VALUES ('".$row2['id']."')";
				$result = mysql_query($sql_c);
				
					?><span style="font-family:Calibri; font-size:14px; color:#090; "> <? echo "Se ha creado el acceso al doctor, si desea llenar la ficha "; ?><a href="doctor-ficha.php?email=<? echo $email; ?>&pass=<? echo $pass; ?>" target="_parent">haga clic aquí</a></span><?
					
					$sfrom="DOX <no_contestar@dox.mx>"; //cuenta que envia 
					$sdestinatario=$email; //cuenta destino 
					$ssubject="Bienvenido a DOX.mx"; //subject 
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
    <h2>Bienvenido a DOX.mx</h2><p>Puede acceder con su usuario: ".$email." y contraseña: ".$pass."</p>
	<p>Su perfil aun no ha sido publicado en la red de médicos DOX.mx ya que necesita prellenar sus datos accediendo a este <a href=\"http://dox.mx/sinapsis/doctor/index.php\">panel de control</a> con los datos mencionados.</p>
     
      <br>
      DOX.mx es marca registrada 2013.
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
									
				}
			}
			else
			{
				?><span style="font-family:Calibri; font-size:14px; color:#900; "> <? echo "No es posible registrar el mismo correo dos veces."; ?></span><?
			}
			
		}
		desconectar();
	}
?>
