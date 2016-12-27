<?php
session_start();
require_once('recaptcha/recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6Ld52OkSAAAAAIBvW0wqNfr8gc6zX-jklJ9wfuwb";
$privatekey = "6Ld52OkSAAAAAB0JbpJ9UGhXU6cdfJUVrOTL7K34";

$error = null;

// Variables

$paciente = utf8_encode($_POST['paciente']);
$motivo = utf8_encode($_POST['motivo']);
$celular = utf8_encode($_POST['celular']);
$reserva = utf8_encode($_POST['reserva']);
    
?>



<?
//recibo los valores, guardo al usuario o hago la validación del login, busco los datos del doctor y pide los datos del paciente, siguiente pantalla se genera la cita.

include("librerias/conexion.php");

$_SESSION['esp'];
conectar();
$sql = mysql_query("Select * from datos where id = ".$_SESSION['miid']." and iddoctor = ".$_SESSION['iddoctor']."");
$row = mysql_fetch_array($sql);
desconectar();

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
   
//FIN Código 2 letras y 3 números aleatorios 

$fecha1 = explode("-", $row['inicio']);

switch($fecha1[1])
{
	case "01": $mes = "Enero"; break;
	case "02": $mes = "Febrero"; break;
	case "03": $mes = "Marzo"; break;
	case "04": $mes = "Abril"; break;
	case "05": $mes = "Mayo"; break;
	case "06": $mes = "Junio"; break;
	case "07": $mes = "Julio"; break;
	case "08": $mes = "Agosto"; break;
	case "09": $mes = "Septiembre"; break;
	case "10": $mes = "Octubre"; break;
	case "11": $mes = "Noviembre"; break;
	case "12": $mes = "Diciembre"; break;
}

$fecha = $fecha1[2]." de ".$mes." de ".$fecha1[0];
$_SESSION['fecha'] = $fecha;


//x determina si es usuario nuevo o registrado

if($_GET['x'] == 'n')
{
//Usuario nuevo
$nombre = utf8_decode($_POST['nombre_registro']); 
$_SESSION['nombre'] = $nombre;
$contra = utf8_decode($_POST['contra_registro']);
$_SESSION['contra'] = $contra;
$email = utf8_decode($_POST['email_registro']);
$_SESSION['email'] = $email;
$celular = utf8_decode($_POST['cel_registro']);
$_SESSION['celular'] = $celular;

	conectar();
	mysql_query('SET CHARACTER SET utf8');
	//Verificar si ya está registrado el email
	$s = "Select * from paciente where email = '".$email."'";
	$que = mysql_query($s);
	$numr = mysql_num_rows($que);
	if($numr != 1)
	{
		$sq2 = "insert into paciente (nombre,email,contrasena,celular) values ('".$nombre."','".$email."','".$contra."','".$celular."')";
		$sql2 = mysql_query($sq2);
		//buscar el id del paciente recién registrado
		
		$sql4 = "Select id From paciente where nombre = '".$nombre."' and email = '".$email."' and contrasena = '".$contra."' and celular = '".$celular."'";
		$result = mysql_query($sql4);
		$row4 = mysql_fetch_array($result);
		$id = $row4['id'];
		$_SESSION['idpaciente'] = $id;
		$mensaje = "";
		
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
    <p>Su usuario ha sido registrado satisfactoriamente.</p><p>Ya puede realizar citas y consultar sus citas en línea.</p>
     Ha completado su frase de registro, a partir de este momento podrás realizar reservaciones para consultas médicas.<br /><br />Usuario: ".$email."<br />Contraseña: ".$contra."
	 <br>
      <br>
      Recuerde que puede acceder a su panel de control con su email y contraseña donde puede checar sus citas en línea.<br>
      <a href=\"http://www.dox.mx/panel.php\">http://www.dox.mx/panel.php</a><br>
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
	else
	{
		$mensaje = "No es posible registrar el mismo correo dos veces";
	}
	desconectar();
}

else if($_GET['x'] == 'r')
{

//Usuario registrado 
$email_r = $_POST['email_registrado'];
$contra_r = $_POST['contra_registrado'];


	conectar();
	$sq3 = "Select * from paciente where email = '".$email_r."' and contrasena = '".$contra_r."'";
	$sql3 = mysql_query($sq3);
	$num = mysql_num_rows($sql3);
	if($num == 1)
	{
		$row3 = mysql_fetch_array($sql3);
		$nombre = $row3['nombre'];
		
		$_SESSION['idpaciente'] = $row3['id'];
		$celular = $row3['celular'];
		$_SESSION['email'] = $email_r;
		$mensaje = "";
	}
	else
	{
		$mensaje = "El usuario y/o contraseña son incorrectos";
	}
	
	desconectar();
}

//Ya tenemos el id del paciente registrado ($row3['id'])




//guardar paciente o loggearlo y tomar el id del paciente para guardarlo en la tabla de datos 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>DOX.mx - Reserva tu consulta médica en línea</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<link rel="stylesheet" href="jquery/reveal.css">	
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>



</head>

<body class="fondo-normal">

<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean'
 };
 </script>

	




	<!-- Aqui esta todo lo referente a los lightbox y mensajes que aparecen -->
	<!-- ********************** LIGHTBOX ¨********************************* -->

	<div id="capa-lightbox"></div>

	<div id="identificador-lightbox">

	<div id="titulo-lightbox">Verifica tu email o  Celular</div>

	<div id="data-lightbox">

	<div class="data-lightbox uno">

	<img src="visual/mensaje-lightbox.png">	

	</div>

	<div class="data-lightbox dos">	
	El equipo de DOX ha enviado un mensaje a tu email o celular. ingrese el 
	<span class="fecha-programada">codigo de confirmacion</span> en el siguiente campo para confirmar
	la cita:

	<br>

	<input type="text" class="form-login2" placeholder="CODIGO">

	<br>
	<div id="boton-aceptar-lightbox"><input type="image" src="visual/boton-lightbox.png"></div>

	</div>

	<div style="clear:both;"></div>

	<img src="visual/mensaje-final-lightbox.png">


	</div>

	</div>

	<!-- *********************** LIGHTBOX ************************************** -->


	<div class="contenedor">
    
    <?php include("cabeza.php"); ?>

<div style="clear:both;"></div>


		<br>


		<div id="degradado">
		
		<div id="contenedor-cita-confirmacion"> 
        
        <? 
//Si el correo ya está registrado o si es incorrecta la contraseña

if($mensaje != "")
{ ?>
<div style="height:230px; margin-top:120px;">
 <?
	echo $mensaje;
	
	?></div><?
}
else
{

?>

<!--INICIO CHEQUEO CAPTCHA-->

<?

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
	$d = "update datos set  titulo='".$paciente."', status='cita-hecha', bodyf = '".$texto."', idpaciente = ".$_SESSION['idpaciente']." where id=".$_SESSION['miid']." and iddoctor=".$_SESSION['iddoctor']."";
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
  <br />
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
        
        <!--FORMA ELECTRONICA-->
        
        <form id="form1" name="form1" method="post" action="cita_confirmacion.php">

		<div id="presentacion-usuario">

			<span id="nombre-usuario">Bienvenido(a) <? echo utf8_encode($nombre); ?></span>			

		</div>

		<div id="ficha-doctor-confirmacion">

			<div id="ficha-doctor-imagen">


					<? if($_SESSION['portada'] == '') { $img = "/visual/perfil/1.jpg"; } else { $img = "sinapsis/galeria_dr/".$_SESSION['portada']; }?> <img class="perfil"  src="<? echo $img; ?>">

					<br>
			</div><!-- Aqui termina el div de la foto de ficha-doctor -->
	
			  <div id="ficha-doctor-datos">
			    <div id="cabecera-ficha-confirmacion"> <span id="nombre-doctor-confirmacion"><? echo $_SESSION['nom-doctor']; ?></span>
			      <div class="especialidad-cabecara-confirmacion"> <? conectar(); $sql5 = mysql_query("Select nombre from especialidad where id = ".$_SESSION['esp'].""); $row5 = mysql_fetch_array($sql5); echo utf8_encode($row5['nombre']); desconectar(); $_SESSION['nom-esp'] = utf8_encode($row5['nombre']); ?> <img src="visual/cardiologos_corazon.png" alt="" /> </div>
		        </div>
			    <!-- Aqui termina la cabecera-ficha-doctor -->
			    <div id="data-ficha-confirmacion">
			     <? 
				$lista = $_SESSION['list-esp'];
				 $esp = explode(",", $lista);
				 
				 ?>
                 
                  <div class="data uno">
			        <ul>
			         <?  $num = count($esp);
						
						for($i = 1; $i < $num - 1; $i++)
						{
						
						switch($esp[$i])
						{
							case 1: $nom = "Alergología"; break;
							case 2: $nom = "Anestesiología"; break;
							case 3: $nom = "Angiología"; break;
							case 4: $nom = "Biología de la reproducción"; break;
							case 5: $nom = "Cardiología"; break;
							case 6: $nom = "Cirugía Bariátrica"; break;
							case 7: $nom = "Cirugía General"; break;
							case 8: $nom = "Cirugía Maxilofacial"; break;
							case 9: $nom = "Cirugía Plástica"; break;
							case 10: $nom = "Coloproctología"; break;
							case 11: $nom = "Dermatología"; break;
							case 12: $nom = "Endocrinología"; break;
							case 13: $nom = "Gastroenterología-Endoscopía 	"; break;
							case 14: $nom = "Genética"; break;
							case 15: $nom = "Geriatría"; break;
							case 16: $nom = "Ginecología - Obstetricia"; break;
							case 17: $nom = "Hematología"; break;
							case 18: $nom = "Infectología"; break;
							case 19: $nom = "Medicina de Rehabilitación"; break;
							case 20: $nom = "Medicina Interna"; break;
							case 21: $nom = "Neumología"; break;
							case 22: $nom = "Neurología-neurocirugía"; break;
							case 23: $nom = "Nutrición"; break;
							case 24: $nom = "Pediatría"; break;
							case 25: $nom = "Psiquiatría - Psicología"; break;
							case 26: $nom = "Radiología y Ultrasonografista"; break;
							case 27: $nom = "Reumatología"; break;
							case 28: $nom = "Sexología"; break;
							case 29: $nom = "Traumatología y Ortopedia"; break;
							case 30: $nom = "Urología"; break;
						} 
						?>
					
							<li><? echo $nom; ?></li>
                            <? 
						}
							?>
		            </ul>
			        <br />
		          <? 
					echo $_SESSION['dir1'];
					echo $_SESSION['dir2'];
					echo $_SESSION['dir3'];
				   
				   ?></div>
			      <div class="data dos">
                  <ul style="float:right; width:200px">
                  <? 
				  $lista2 = $_SESSION['list-seg'];
				  $seg = explode(",", $lista2); 
						
				  $num = count($seg);
						
						for($i = 1; $i < $num - 1; $i++)
						{
						
						switch($seg[$i])
						{
							case 1: $nom = "Mapfre-Tepeyac"; $logo = "mapfre_80.png"; break;
							case 2: $nom = "GNP"; $logo = "GNP_80.png"; break;
							case 3: $nom = "Allianz"; $logo = "allianz_80.png"; break;
							case 4: $nom = "AXA"; $logo = "axa_80.png"; break;
							case 5: $nom = "Met Life"; $logo = "met_80.png"; break;
							case 6: $nom = "Seguros Monterrey New York Life"; $logo = "seguros-monterrey_80.png"; break;
							
						} 
						?>
					
							<li style="float:left; width:80px; text-align:center; height:40px; line-height:40px; padding:5px"><img src="sinapsis/logo_seguro/<? echo $logo; ?>"  /></li>
                    <? 
						}
							?></ul>
		          </div>
			      <div style="clear:both;"></div>
			      <div id="citador-confirmacion"> Cita el: <span class="fecha-programada"><? echo $fecha; ?></span> a las <span class="fecha-programada"><? echo $_SESSION['hora'] ;?></span></div>
		        </div>
			    <!-- Aqui termina el div data-ficha-informacion -->
		      </div>

			<!---- Aqui termina el div de datos en la ficha -->

	
			<div style="clear:both;"></div>
			
           
 <div class="nombre-citadora">
 <input type="checkbox" value="1" name="primera" id="primera"  /> Es mi primera visita.

 
 
  </div>
			<div class="fecha-programada re">Escriba el Nombre del Paciente</div>

			<div class="nombre-citadora">
			<input name="paciente" type="text" size="60" style="width:380px" value="<? echo utf8_encode($nombre); ?>" id="paciente" />
			</div>

			<div class="fecha-programada re">Seleccione el Motivo de la Cita</div>

			<div class="motivo-cita">
            <input name="celular" type="hidden" value="<? echo utf8_encode($celular); ?>" />
            <input name="reserva" type="hidden" value="<? echo $reserva; ?>" />
			<select name="motivo" id="motivo">
            
            <? 
			
			switch($_SESSION['esp'])
			{
				case 0: //No escogió ninguna
					echo "<option value='Consulta General'>Consulta General</option>
					<option value='Seguimiento'>Seguimiento</option>
					<option value='Malestar'>Malestar</option>
					<option value='Interpretación de Análisis/Estudios'>Interpretación de Análisis/Estudios</option>
					<option value='Examen Pre Operatorio'>Examen Pre Operatorio</option>
					<option value='Otro'>Otro</option>"; break;
				
				
				case 1: //Alergología
					
					echo "<option value='Consulta por alergia'>Consulta por alergia</option>
					<option value='Consulta de seguimiento'>Consulta de seguimiento</option>
					<option value='Falta de Respiración por alergia'>Falta de Respiración por alergia</option>
					<option value='Tos por alergia'>Tos por alergia</option>
					<option value='Problema en ojos por alergia'>Problema en ojos por alergia</option>
					<option value='Alergia a medicamento'>Alergia a medicamento</option>
					<option value='Alergia a alimento'>Alergia a alimento</option>
					<option value='Fiebre Estacional por alergia'>Fiebre Estacional por alergia</option>
					<option value='Envenenamiento'>Envenenamiento</option>
					<option value='Rash'>Rash</option>
					<option value='Picazón'>Picazón</option>
					<option value='Picadura'>Picadura</option>
					<option value='Fiebre por alergia'>Fiebre por alergia</option>
					<option value='Otro'>Otro</option>";
					break;
					
				case 5: //Cardiología
				
					echo "<option value='Consulta cardiología'>Consulta cardiología</option>
					<option value='Consulta de seguimiento'>Consulta de seguimiento</option>
					<option value='Estudio Electrocardiograma'>Estudio Electrocardiograma</option>
					<option value='Estudio Doppler'>Estudio Doppler</option>
					<option value='Interpretación de resultados'>Interpretación de resultados</option>
					<option value='Angiografía Coronaria'>Angiografía Coronaria</option>
					<option value='Ecocardiograma'>Ecocardiograma</option>
					<option value='Mareos/Desvanecimiento'>Mareos/Desvanecimiento</option>
					<option value='Hipertensión'>Hipertensión</option>
					<option value='Estudio Holter'>Estudio Holter</option>
					<option value='Prueba de estrés'>Prueba de estrés</option>
					<option value='Cateterismo'>Cateterismo</option>
					<option value='Seguimiento cateterismo'>Seguimiento cateterismo</option>
					<option value='Prueba de Esfuerzo'>Prueba de Esfuerzo</option>
					<option value='Otro'>Otro</option>";
					break;
				
				case 9: //Cirujano Plástico
				
					echo "<option value='Tratamiento Anti-edad'>Tratamiento Anti-edad</option>
					<option value='Botox'>Botox</option>
					<option value='Implantes de senos (aumento)'>Implantes de senos (aumento)</option>
					<option value='Reducción medida seno'>Reducción medida seno</option>
					<option value='Prótesis'>Prótesis</option>
					<option value='Peeling'>Peeling</option>
					<option value='Mentón'>Mentón</option>
					<option value='Otoplastía (cirugía orejas)'>Otoplastía (cirugía orejas)</option>
					<option value='Cirugía de párpados'>Cirugía de párpados</option>
					<option value='Cirugía estética'>Cirugía estética</option>
					<option value='Depilación láser'>Depilación láser</option>
					<option value='Tratamiento láser en piel'>Tratamiento láser en piel</option>
					<option value='Liposucción'>Liposucción</option>
					<option value='Rinoplastía (cirugía nariz)'>Rinoplastía (cirugía nariz)</option>
					<option value='Consulta de revisión'>Consulta de revisión</option>
					<option value='Seguimiento consulta de revisión'>Seguimiento consulta de revisión</option>
					<option value='Cirugía estética de abdomen'>Cirugía estética de abdomen</option>
					<option value='Cirugía reconstructiva'>Cirugía reconstructiva</option>
					<option value='Otro'>Otro</option>";
					break;
					
				case 11: //Dermatología
				
					 echo "<option value='Acné'>Acné</option>
					<option value='Consulta dermatológica'>Consulta dermatológica</option>
					<option value='Tratamiento anti-edad'>Tratamiento anti-edad</option>
					<option value='Botox tratamiento'>Botox tratamiento</option>
					<option value='Consulta de seguimiento'>Consulta de seguimiento</option>
					<option value='Caída de cabello'>Caída de cabello</option>
					<option value='Psoriasis'>Psoriasis</option>
					<option value='Rash'>Rash</option>
					<option value='Picazón'>Picazón</option>
					<option value='Manchas en la piel'>Manchas en la piel</option>
					<option value='Quemaduras'>Quemaduras</option>
					<option value='Otro'>Otro</option>";
					break; 
					
				case 12: //Endocrinologia
				
					echo "<option value='Problema metabólico'>Problema metabólico</option>
					<option value='Diabetes'>Diabetes</option>
					<option value='Seguimiento diabetes'>Seguimiento diabetes</option>
					<option value='Consulta endocrinología'>Consulta endocrinología</option>
					<option value='Bocio'>Bocio</option>
					<option value='Infertilidad'>Infertilidad</option>
					<option value='Tiroides'>Tiroides</option>
					<option value='Otro'>Otro</option>";
					break; 
					
				case 13: //Gastroenterología
				
					echo "<option value='Reflujo'>Reflujo</option>
					<option value='Problemas digestivos'>Problemas digestivos</option>
					<option value='Heces color negro'>Heces color negro</option>
					<option value='Sangre en heces fecales'>Sangre en heces fecales</option>
					<option value='Estudio de colon'>Estudio de colon</option>
					<option value='Colonoscopía'>Colonoscopía</option>
					<option value='Diarrea'>Diarrea</option>
					<option value='Consulta general'>Consulta general</option>
					<option value='Seguimiento consulta general'>Seguimiento consulta general</option>
					<option value='Gastroscopia'>Gastroscopia</option>
					<option value='Colitis'>Colitis</option>
					<option value='Páncreas'>Páncreas</option>
					<option value='Dolor de estómago'>Dolor de estómago</option>
					<option value='Úlceras'>Úlceras</option>
					<option value='Vómitos'>Vómitos</option>
					<option value='Otro'>Otro</option>";
					break;
					
				case 16: //Ginecología-Obstetricia
				
					echo "<option value='Disfunsión sexual'>Disfunsión sexual</option>
					<option value='Métodos anticonceptivos'>Métodos anticonceptivos</option>
					<option value='Menopausia'>Menopausia</option>
					<option value='Seguimiento menopausia'>Seguimiento menopausia</option>
					<option value='Consulta ginecológica'>Consulta ginecológica</option>
					<option value='Seguimiento consulta ginecológica'>Seguimiento consulta ginecológica</option>
					<option value='Evaluación de osteoporosis'>Evaluación de osteoporosis</option>
					<option value='Papanicolaus'>Papanicolaus</option>
					<option value='Control de embarazo'>Control de embarazo</option>
					<option value='Seguimiento control de embarazo'>Seguimiento control de embarazo</option>
					<option value='Ultrasonido'>Ultrasonido</option>
					<option value='Infección vaginal'>Infección vaginal</option>
					<option value='Otro'>Otro</option>";
					break; 
					
				case 17: //Hematología
				
					echo "<option value='Anemia'>Anemia</option>
					<option value='Heces color negro'>Heces color negro</option>
					<option value='Trastorno de coagulación'>Trastorno de coagulación</option>
					<option value='Adelgazamiento de sangre'>Adelgazamiento de sangre</option>
					<option value='Consulta trasnfusión de sangre'>Consulta trasnfusión de sangre</option>
					<option value='Transplante médula ósea'>Transplante médula ósea</option>
					<option value='Quimioterapia'>Quimioterapia</option>
					<option value='Revisión Colesterol/Triglicéridos'>Revisión Colesterol/Triglicéridos</option>
					<option value='Consulta general'>Consulta general</option>
					<option value='Seguimiento consulta general'>Seguimiento consulta general</option>
					<option value='Problemas de bazo'>Problemas de bazo</option>
					<option value='Otro'>Otro</option>";
					break; 
				
				case 18: //Infectología
				
					echo "<option value='SIDA'>SIDA</option>
					<option value='ETS'>ETS</option>
					<option value='Seguimiento SIDA'>Seguimiento SIDA</option>
					<option value='Seguimiento ETS'>Seguimiento ETS</option>
					<option value='Consulta general'>Consulta general</option>
					<option value='Seguimiento consulta general'>Seguimiento consulta general</option>
					<option value='Otro'>Otro</option>";
					break; 
					
				case 21: //Neumología
				
					echo "<option value='Asma'>Asma</option>
					<option value='Bronquitis'>Bronquitis</option>
					<option value='Broncoscopía'>Broncoscopía</option>
					<option value='Fibrosis quística'>Fibrosis quística</option>
					<option value='Enfisema'>Enfisema</option>
					<option value='Estudio cáncer de pulmón'>Estudio cáncer de pulmón</option>
					<option value='Neumonía'>Neumonía</option>
					<option value='Prueba de función pulmonar'>Prueba de función pulmonar</option>
					<option value='Consulta neumología'>Consulta neumología</option>
					<option value='Consulta de seguimiento'>Consulta de seguimiento</option>
					<option value='Problemas de sueño'>Problemas de sueño</option>
					<option value='Toracoscopía'>Toracoscopía</option>
					<option value='Otro'>Otro</option>
					";
					break;
					
				case 22: //Neurología
					echo "<option value='Cuestiones cognitivas'>Cuestiones cognitivas</option>
					<option value='Demencia'>Demencia</option>
					<option value='Electroencefalograma'>Electroencefalograma</option>
					<option value='Dolor de cabeza'>Dolor de cabeza</option>
					<option value='Migraña'>Migraña</option>
					<option value='Cuestiones de movimiento'>Cuestiones de movimiento</option>
					<option value='Esclerosis múltiple'>Esclerosis múltiple</option>
					<option value='Consulta neurología'>Consulta neurología</option>
					<option value='Consulta de seguimiento'>Consulta de seguimiento</option>
					<option value='Parkinson'>Parkinson</option>
					<option value='Epilepsia'>Epilepsia</option>
					<option value='Eventos cerebrovasculares'>Eventos cerebrovasculares</option>
					<option value='Hormigueos/Debilidad/Fatiga'>Hormigueos/Debilidad/Fatiga</option>
					<option value='Otro'>Otro</option>
					";
					break;
				
				case 23: //Nutrición
					echo "<option value='Consulta para pérdida de peso'>Consulta para pérdida de peso</option>
					<option value='Consulta por alergia'>Consulta por alergia</option>
					<option value='Checar colesterol/triglicéridos'>Checar colesterol/triglicéridos</option>
					<option value='Consulta Diabetes'>Consulta Diabetes</option>
					<option value='Problemas digestivos'>Problemas digestivos</option>
					<option value='Dieta'>Dieta</option>
					<option value='Otro'>Otro</option>";
					break; 
					
				case 24: //Pediatría
					echo "<option value='Revisión Bebé'>Revisión Bebé</option>
					<option value='Revisión anual del Bebé'>Revisión anual del Bebé</option>
					<option value='Fiebre'>Fiebre</option>
					<option value='Consulta pediátrica'>Consulta pediátrica</option>
					<option value='Seguimiento consulta pediátrica'>Seguimiento consulta pediátrica</option>
					<option value='Niño prematuro'>Niño prematuro</option>
					<option value='Seguimiento niño prematuro'>Seguimiento niño prematuro</option>
					<option value='Otro'>Otro</option>";
					break;
					
				case 25: //Psiquiatría
					echo "<option value='Hiperactividad'>Hiperactividad</option>
					<option value='Adicciones'>Adicciones</option>
					<option value='Alzheimer'>Alzheimer</option>
					<option value='Terapia analítica'>Terapia analítica</option>
					<option value='Manejo de ira'>Manejo de ira</option>
					<option value='Ansiedad'>Ansiedad</option>
					<option value='Autismo'>Autismo</option>
					<option value='Terapia de comportamiento'>Terapia de comportamiento</option>
					<option value='Desorden Bipolar'>Desorden Bipolar</option>
					<option value='Terapia Cognitiva'>Terapia Cognitiva</option>
					<option value='Depresión'>Depresión</option>
					<option value='Desorden alimenticio'>Desorden alimenticio</option>
					<option value='Terapia de grupo'>Terapia de grupo</option>
					<option value='Revisión médica'>Revisión médica</option>
					<option value='Consulta general'>Consulta general</option>
					<option value='Seguimiento consulta general'>Seguimiento consulta general</option>
					<option value='Psicoterapia'>Psicoterapia</option>
					<option value='Consejos matrimoniales'>Consejos matrimoniales</option>
					<option value='Esquizofrenia'>Esquizofrenia</option>
					<option value='Terapia sexual'>Terapia sexual</option>
					<option value='Preocupaciones'>Preocupaciones</option>
					<option value='Otro'>Otro</option>
					";
					break;
				
				case 255: //Psicología
					echo "<option value='Adicciones'>Adicciones</option>
					<option value='Adolescencia'>Adolescencia</option>
					<option value='Terapia analítica'>Terapia analítica</option>
					<option value='Manejo de ira'>Manejo de ira</option>
					<option value='Ansiedad'>Ansiedad</option>
					<option value='Terapia de comportamiento'>Terapia de comportamiento</option>
					<option value='Terapia Cognitiva'>Terapia Cognitiva</option>
					<option value='Depresión'>Depresión</option>
					<option value='Consejos de divorcio'>Consejos de divorcio</option>
					<option value='Desorden alimenticio'>Desorden alimenticio</option>
					<option value='Terapia de grupo'>Terapia de grupo</option>
					<option value='Terapia familiar'>Terapia familiar</option>
					<option value='Psicoterapia'>Psicoterapia</option>
					<option value='Consejos matrimoniales'>Consejos matrimoniales</option>
					<option value='Terapia sexual'>Terapia sexual</option>
					<option value='Abuso sexual'>Abuso sexual</option>
					<option value='Terapia de desempeño'>Terapia de desempeño</option>
					<option value='Preocupaciones'>Preocupaciones</option>
					<option value='Otro'>Otro</option>";
					break;
					
				case 26: //Radiología
					echo "<option value='Densitometría'>Densitometría</option>
					<option value='Tomografía'>Tomografía</option>
					<option value='Angiografía'>Angiografía</option>
					<option value='Estudio de extensión extratorásica'>Estudio de extensión extratorásica</option>
					<option value='Escaneo dental'>Escaneo dental</option>
					<option value='Colonoscopia virtual'>Colonoscopia virtual</option>
					<option value='Mamografía'>Mamografía</option>
					<option value='Resonancia magnética'>Resonancia magnética</option>
					<option value='RM Cerebro'>RM Cerebro</option>
					<option value='RM Pecho'>RM Pecho</option>
					<option value='Sonografía'>Sonografía</option>
					<option value='Rayos X'>Rayos X</option>
					<option value='Otro'>Otro</option>";
					break; 
			
				case 27: //Reumatología
					echo "<option value='Artritis'>Artritis</option>
					<option value='Arteritis células gigantes'>Arteritis células gigantes</option>
					<option value='Gota'>Gota</option>
					<option value='Dolor de articulaciones'>Dolor de articulaciones</option>
					<option value='Lupus'>Lupus</option>
					<option value='Dolor de músculo'>Dolor de músculo</option>
					<option value='Osteoporosis'>Osteoporosis</option>
					<option value='Polimialgia reumática'>Polimialgia reumática</option>
					<option value='Artritis reumatoide'>Artritis reumatoide</option>
					<option value='Esclerodermia'>Esclerodermia</option>
					<option value='Vasculitis'>Vasculitis</option>
					<option value='Otro'>Otro</option>";
					break;
			
				case 30: //Urología
					echo "<option value='Hiperplasia Benigna Prostática'>Hiperplasia Benigna Prostática</option>
					<option value='Disfunción erectil'>Disfunción erectil</option>
					<option value='Orina con frecuencia'>Orina con frecuencia</option>
					<option value='Incontinencia'>Incontinencia</option>
					<option value='Infertilidad masculina'>Infertilidad masculina</option>
					<option value='Vejiga neurogénica'>Vejiga neurogénica</option>
					<option value='Eyaculación precoz'>Eyaculación precoz</option>
					<option value='Cáncer de próstata'>Cáncer de próstata</option>
					<option value='Infección tracto urinario'>Infección tracto urinario</option>
					<option value='Consulta de revisión'>Consulta de revisión</option>
					<option value='Consulta de seguimiento'>Consulta de seguimiento</option>
					<option value='Vasectomía'>Vasectomía</option>
					<option value='Otro'>Otro</option>";
					break;
				
				
				//Especialidades aún no agregadas a la base de datos.
				//31
				case "Dentista":
					echo "<option value='Consulta dental'>Consulta dental</option>
					<option value='Frenillos'>Frenillos</option>
					<option value='Puente dental'>Puente dental</option>
					<option value='Coronas dentales'>Coronas dentales</option>
					<option value='Limpieza dental'>Limpieza dental</option>
					<option value='Emergencia dental'>Emergencia dental</option>
					<option value='Consulta de seguimiento'>Consulta de seguimiento</option>
					<option value='Dentaduras'>Dentaduras</option>
					<option value='Amalgama'>Amalgama</option>
					<option value='Cirugía'>Cirugía</option>
					<option value='Implantes'>Implantes</option>
					<option value='Blanqueamiento dental'>Blanqueamiento dental</option>
					<option value='Extracción dental'>Extracción dental</option>
					<option value='Casquillos'>Casquillos</option>
					<option value='Otro'>Otro</option>";
					break; 
					//32
				case "Odontopediatría": 
					echo "<option value='Consulta dental pediátrica'>Consulta dental pediátrica</option>
					<option value='Diente de leche (extracción)'>Diente de leche (extracción)</option>
					<option value='Uso de pacificador'>Uso de pacificador</option>
					<option value='Extracción dental'>Extracción dental</option>
					<option value='Puente dental'>Puente dental</option>
					<option value='Coronas dentales'>Coronas dentales</option>
					<option value='Limpieza dental'>Limpieza dental</option>
					<option value='Emergencia dental'>Emergencia dental</option>
					<option value='Consulta de seguimiento'>Consulta de seguimiento</option>
					<option value='Amalgama'>Amalgama</option>
					<option value='Cirugía'>Cirugía</option>
					<option value='Implantes'>Implantes</option>
					<option value='Blanqueamiento dental'>Blanqueamiento dental</option>
					<option value='Otro'>Otro</option>";
					break; 
					//33
				case "Otorrinolaringología":
					echo "<option value='Consulta revisión ONG'>Consulta revisión ONG</option>
					<option value='Vértigo'>Vértigo</option>
					<option value='Infección de ONG'>Infección de ONG</option>
					<option value='Dolor ONG'>Dolor ONG</option>
					<option value='Problemas de oído'>Problemas de oído</option>
					<option value='Sinusitis'>Sinusitis</option>
					<option value='Problemas del sueño'>Problemas del sueño</option>
					<option value='Resfriado/Gripe'>Resfriado/Gripe</option>
					<option value='Otro'>Otro</option>";
					break; 
					//34
				case "Oftalmología":
					echo "<option value='Lentes de contacto'>Lentes de contacto</option>
					<option value='Infección de ojo'>Infección de ojo</option>
					<option value='Lentes'>Lentes</option>
					<option value='Consulta oftalmólogo'>Consulta oftalmólogo</option>
					<option value='Consulta de seguimiento'>Consulta de seguimiento</option>
					<option value='Glaucoma'>Glaucoma</option>
					<option value='Seguimiento glaucoma'>Seguimiento glaucoma</option>
					<option value='Problemas de retina'>Problemas de retina</option>
					<option value='Cirugía de retina'>Cirugía de retina</option>
					<option value='Otro'>Otro</option>";
					break;
			//35
				case "Nefrología":
					echo "<option value='Sangre en orina'>Sangre en orina</option>
					<option value='Problema renal crónico'>Problema renal crónico</option>
					<option value='Diálisis'>Diálisis</option>
					<option value='Consulta general'>Consulta general</option>
					<option value='Seguimiento consulta general'>Seguimiento consulta general</option>
					<option value='Piedras en riñón'>Piedras en riñón</option>
					<option value='Proteinuria'>Proteinuria</option>
					<option value='Falla Renal'>Falla Renal</option>
					<option value='Ultrasonido'>Ultrasonido</option>
					<option value='Infección tracto urinario'>Infección tracto urinario</option>
					<option value='Otro'>Otro</option>";					
					break;
					//36
				case "Ortodoncia":
					echo "<option value='Consulta de revisión'>Consulta de revisión</option>
					<option value='Frenillos'>Frenillos</option>
					<option value='Puente dental'>Puente dental</option>
					<option value='Coronas dentales'>Coronas dentales</option>
					<option value='Limpieza dental'>Limpieza dental</option>
					<option value='Emergencia dental'>Emergencia dental</option>
					<option value='Consulta de seguimiento'>Consulta de seguimiento</option>
					<option value='Dentaduras'>Dentaduras</option>
					<option value='Amalgama'>Amalgama</option>					
					<option value='Cirugía'>Cirugía</option>
					<option value='Implantes'>Implantes</option>
					<option value='Blanqueamiento dental'>Blanqueamiento dental</option>
					<option value='Extracción dental'>Extracción dental</option>
					<option value='Casquillos'>Casquillos</option>
					<option value='Otro'>Otro</option>";
					break; 
					//37
				case "Podología":
					echo "<option value='Lesiones de talón'>Lesiones de talón</option>
					<option value='Artritis'>Artritis</option>
					<option value='Pie de atleta'>Pie de atleta</option>
					<option value='Bunion'>Bunion</option>
					<option value='Pie Diabético'>Pie Diabético</option>
					<option value='Consulta general'>Consulta general</option>
					<option value='Seguimiento consulta general'>Seguimiento consulta general</option>
					<option value='Infección'>Infección</option>
					<option value='Lesiones'>Lesiones</option>
					<option value='Dolor'>Dolor</option>
					<option value='Problemas de uñas'>Problemas de uñas</option>
					<option value='Problemas para caminar'>Problemas para caminar</option>
					<option value='Verrugas'>Verrugas</option>
					<option value='Otro'>Otro</option>";
					break;
					//38
				case "Medicina del sueño":
					echo "<option value='Problemas del sueño'>Problemas del sueño</option>			
					<option value='Otro'>Otro</option>";
					break; 
					//39
				case "Medicina del deporte":
					echo "<option value='Lesiones deportivas'>Lesiones deportivas</option>						
						<option value='Otro'>Otro</option>";
						break; 
				
				/* echo "<option value=''></option>
					<option value=''></option>
					<option value=''></option>
					<option value=''></option>
					<option value=''></option>
					<option value=''></option>
					<option value=''></option>
					<option value=''></option>
					<option value=''></option>
					<option value='Otro'>Otro</option>";
					break; */
				
				/*case 2: break;
				case 3: break;
				case 4: break;
				case 5: break;
				case 6: break;
				case 7: break;
				case 8: break;
				case 9: break;
				case 10: break;
				case 11: break;
				case 12: break;
				case 13: break;
				case 14: break;
				case 15: break;
				case 16: break;
				case 17: break;
				case 18: break;
				case 19: break;
				case 20: break;
				case 21: break;
				case 22: break;
				case 23: break;
				case 24: break;
				case 25: break;
				case 26: break;
				case 27: break;
				case 28: break;
				case 29: break;
				case 30: break;*/
				default: echo "<option value='Consulta General'>Consulta General</option>
					<option value='Seguimiento'>Seguimiento</option>
					<option value='Malestar'>Malestar</option>
					<option value='Interpretación de Análisis/Estudios'>Interpretación de Análisis/Estudios</option>
					<option value='Examen Pre Operatorio'>Examen Pre Operatorio</option>
					<option value='Otro'>Otro</option>"; break;
			}
			
			?>
          
            
            </select>
			</div>
            
            
         <div style="margin-left:34px"><?php echo recaptcha_get_html($publickey, $error); ?>  </div>

			<div style="float:left; width:480px; font-size:11px; text-align:left; margin-top:10px">Una vez que confirmes la información  de la cita, por favor prográmala.
Recuerda que al realizar tu cita aceptas los términos y condiciones de DOX.mx</div><div class="boton-agendar">

    <input type="hidden" name="action" value="register" />

			<input type="image" src="visual/agendar_cita.png">

			</div>
            </form>
            
        
        <!--FIN FORMA ELECTRONICA-->
        
        <?
		
	}




			

?>


<!--FIN CAPTCHA-->
 


		</div><!-- Aqui termina la ficha de confirmacion -->
  <? } ?>

		</div><!--- Aqui termina el div contenedor de la confirmacion de la cita ---------->
		</div><!---- Aqui termina el div de degradado -->
		</div><!----- div anonimo ---->
		<div style="clear:both;"></div>

	<?php include("pie.php"); ?>
	
	</div>
	
</body>
</html>
>>