<?
session_start();
     

require_once('recaptcha/recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6Ld52OkSAAAAAIBvW0wqNfr8gc6zX-jklJ9wfuwb";
$privatekey = "6Ld52OkSAAAAAB0JbpJ9UGhXU6cdfJUVrOTL7K34";

$error = null;


    

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>DOX - Cita finalizada</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="jquery/reveal.css">
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>
</head>

<body class="fondo-portada">

	<div class="contenedor">



		<?php include("cabeza.php"); ?>

				

<div style="clear:both;"></div>

<?



include("librerias/conexion.php");

$paciente = $_POST['paciente'];
$motivo = $_POST['motivo'];
$celular = $_POST['celular'];
$reserva = $_POST['reserva'];

if ($_POST['action'] == "register") {
	$re_ip = $_SERVER["REMOTE_ADDR"];
	$re_challenge = $_POST["recaptcha_challenge_field"];
	$re_response = $_POST["recaptcha_response_field"];
	
	$resp = recaptcha_check_answer($privatekey, $re_ip, $re_challenge, $re_response);
	
    if ($resp->is_valid) {
    	// start!
		if($_POST['primera'] == 1)
{
	$p = "Primera vez _____________________________ ";
}
else
{
	$p = "";
}

$texto = $p."Email: ".$_SESSION['email']." _____________________________ Celular: ".$celular." _____________________________ Motivo: ".$motivo." _____________________________ Reserva: ".$reserva."";

conectar();

//Agregar id de paciente
	$d = "update datos set  titulo='".$paciente."', status='cita-hecha', bodyf = '".$texto."', idpaciente = ".$_SESSION['idpaciente'].", clavereserva = ".$reserva." where id=".$_SESSION['miid']." and iddoctor=".$_SESSION['iddoctor']."";
	mysql_query("SET NAMES 'utf8'");
	$datos = mysql_query($d);
	
	
	


//Enviar correo a paciente cita registrada
$email = $_SESSION['email'];
$fecha = $_SESSION['fecha'];
$hora = $_SESSION['hora'];
$dir1 = $_SESSION['dir1'];
$dir2 = $_SESSION['dir2'];
$dir3 = $_SESSION['dir3'];
$nomdoctor = $_SESSION['nom-doctor'];
$nomesp = $_SESSION['nom-esp'];

$sql3 = "SELECT * FROM paciente WHERE email='".$email."'";
$resultado3 = mysql_query($sql3) or die('La consulta fall&oacute;: ' . mysql_error());
$row3=mysql_fetch_array($resultado3);
desconectar();
$sfrom="DOX <no_contestar@dox.mx>"; //cuenta que envia 
$sdestinatario=$email; //cuenta destino 
$ssubject="Cita exitosa en DOX.mx"; //subject 
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
    <td align=\"center\" style=\"font-size:13px\"><p><br>
        <em>Hola ".$paciente.":</em></p>
      <p>-----------------------------------------</p>
    <p><strong>Su cita:</strong><br>
      ".$hora." el ".$fecha." </p>
    <p>-----------------------------------------</p>
    <p><strong>Lugar:
      </strong><br>".$dir1." ".$dir2." ".$dir3."</p>
    <p>-----------------------------------------</p>
    <p><strong>Doctor:</strong><br>
      ".$nomdoctor." - ".$nomesp."</p>
    <p>-----------------------------------------<br>
    </p>
   <strong>Clave de Reserva:</strong>
     <h2>".$reserva."</h2>
     <br> Te recordamos que es muy importante presentarte con anticipación a la misma y que en caso de cancelación lo puedes hacer con 2 horas de anticipación.
	 <br>
      <br>
      Recuerda que puedes acceder a tu panel de control con tu email y contraseña donde puedes checar tus citas en línea.<br>
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
		
			
//Enviar correo doctor, paciente realizó una cita
$emaildr = $_SESSION['email-dr'];


			$sfrom1="DOX <no_contestar@dox.mx>"; //cuenta que envia 
			$sdestinatario1=$emaildr; //cuenta destino 
			$ssubject1="Tiene una nueva cita - DOX.mx"; //subject 
			$shtml1= "
			<html> 
			
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<body bgcolor=\"#DCEEFC\"> 

<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family:arial\" >
  <tr>
    <td height=\"40\" colspan=\"3\" align=\"center\" valign=\"middle\" bgcolor=\"#66CCFF\"><a href=\"http://www.dox.mx\" style=\"color:white\">Mensaje generado desde DOX.mx</a></td>
  </tr>
  <tr>
    <td width=\"10%\">&nbsp;</td>
    <td align=\"center\"><a href=\"index.php\"><img src=\"http://www.dox.mx/visual/exito1.png\" width=\"545\" height=\"44\" /></a></td>
    <td width=\"10%\">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align=\"center\" style=\"font-size:13px\"><p><br>
        <em>Nombre del paciente: ".$paciente."</em></p>
      <p>-----------------------------------------</p>
    <p><strong>Contacto:</strong><br>
      ".$row3['email']." Cel: ".$row3['celular']." </p>
    <p>-----------------------------------------</p>
	<p><strong>Su cita:</strong><br>
      ".$hora." el ".$fecha." </p>
    <p>-----------------------------------------</p>
    <p><strong>Lugar:
      </strong><br>".$dir1." ".$dir2." ".$dir3."</p>
    <p>-----------------------------------------</p>
  
   <strong>Clave de Reserva:</strong>
     <h2>".$reserva."</h2>
     <br>
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
			$sheader1="From:".$sfrom."\nReply-To:".$sfrom1."\n"; 
			$sheader1=$sheader1."X-Mailer:PHP/".phpversion()."\n"; 
			$sheader1=$sheader1."Mime-Version: 1.0\n"; 
			$sheader1=$sheader1."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
			mail($sdestinatario1,$ssubject1,$shtml1,$sheader1);
			
			
			//echo "emailp ".$email." fecha".$fecha." dir1".$dir1." dir2".$dir2." dir3".$dir3." nomdr".$nomdoctor." nomesp".$nomesp." emaildr".$emaildr;
		?>
       <br /> <h1>
<span class="titulo1-datos">¡Éxito! </span></h1>
<h2><span class="titulo2-datos">Tu cita se ha REGISTRADO.<br />
  </span><span class="titulo3-datos">Tu código de confirmación es:</span><span class="titulo2-datos"> <? echo $reserva;?>
  <br />SQL:<? echo $d; ?>
            En este momento deberás recibir un correo electrónico confirmando tu cita.
            </span><a href="index.php"><br />
            <img src="visual/email_open.png" width="128" height="128" /><br />
<img src="visual/exito1.png" width="545" height="44" /></a>
        <?
		//fin
		exit;
    } else {
        $error = $resp->error;
		?>
        <h1><span class="titulo1-datos">El código reCAPTCHA ha sido introducido incorrectamente. Regrese y vuelva a intentar.</span></h1>
        <?
		
	}
}



			

?>



 <br />
            <br />
<!--- Aqui termina el fichas-contenedor ---------->

</h2>
<div style="clear:both;"></div>


		<!---- Aqui termina el contendor-login ---->


<!---- Aqui termina el div de degradado -->
		
		</div><!----- div anonimo ---->


		<div style="clear:both;"></div>


	<?php include("pie.php"); ?>
    
	
	</div>
	
</body>
</html>
		