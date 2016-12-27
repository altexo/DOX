<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['email'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['email']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "registro-panel.php";
if (!((isset($_SESSION['email'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['email'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>


<? 
include("librerias/conexion.php");

$id = $_GET['id'];

//$pass = $_POST['contra_registrado'];

conectar();
$sql = mysql_query("Select * from paciente where id = ".$id."");
$row = mysql_fetch_array($sql);


$hoy = date("Y-m-d");



$resultado = mysql_query("Select * from datos where idpaciente = ".$id." and autorizar='0' and status ='cita-hecha' and inicio >= '".$hoy."' order by inicio asc");
$num_filas = mysql_num_rows($resultado);

desconectar();



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Dox - Reserva tu consulta médica en línea -  Panel de Usuario</title>
<link href="colors/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="jquery/reveal.css">
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<style type="text/css">
#paneltitulo {
	float: left;
	width: 100%;
	background-color: #4F91CD;
	-webkit-border-radius: 15px;
	border-radius: 15px;
	padding: 8px;
	margin-top: 20px;
	color: #FFF;
	border: 3px solid #FFF;
}

#columna {
	width: 200px;
	margin-top: 40px;
	margin-right: 40px;
	float: left;
}

#contpanel {
	float: left;
	margin-top: 40px;
	width: 730px;
	margin-bottom: 60px;
}

.cita {
	float: left;
	clear: left;
	line-height: 30px;
	font-size: 13px;
}

.cita2 {
	float: left;
	clear: left;
	line-height: 30px;
	background-color: #548FC7;
	color: #FFF;
	font-weight: bold;
}

.reg1 {
	float: left;
	width: 90px;
}

.reg2 {
	float: left;
	width: 80px;
}

.reg3 {
	float: left;
	width: 460px;
}

.reg4 {
	float: left;
	width: 100px;
}

.reg5 {
	float: left;
	width: 100px;
}
label
{
	display:block;
	width:100px;
	float:left;
}
</style>
<link rel="stylesheet" type="text/css" href="bootstrap-320/css/bootstrap.css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body >


<div class="contenedor sec-panel">

<?php include("cabeza.php"); ?>

  <div style="clear:both;"></div>
</div>
		
<div id="contenedor-degradado">
		
		<div ><!--- Aqui termina el div de contenido dox ---->
		
		<div id="contenedor">
     <div id="paneltitulo">Estimado(a) <? echo $row['nombre']; ?> en este panel puedes llevar el control de tus citas médicas, así como actualizar tus datos.<br />
       <br />
       ¡Gracias por preferir DOX!<br />
     </div>
     <div id="columna">
       <ul class="nav nav-pills nav-stacked">
         <li > <a href="panel.php"><span class="badge pull-right"><? echo $num_filas; ?></span>Mis Citas</a> </li>
         <li class="active"><a href="perfil-paciente.php?id=<? echo $rw['id']; ?>">Mi Usuario</a></li>
         <li><a href="<?php echo $logoutAction ?>">Salir de mi cuenta</a></li>
       </ul>
     </div>
     <div id="contpanel">
      <ol class="breadcrumb">
  <li><a href="#">Mi Usuario</a></li>
  
</ol>
        <p>&nbsp;</p>
        <form id="form1" name="form1" method="post" action="perfil-paciente2.php">
          <div style="text-align:left">
            <p>
              <label>Nombre:</label>
              <span id="sprytextfield1">
              <input type="text" name="nombre" id="nombre" value="<? echo $row['nombre']; ?>" />
              <span class="textfieldRequiredMsg">Campo Obligatorio.</span></span>
              <input type="hidden" name="h-id" id="h-id" value="<? echo $id; ?>" />
            </p>
            <p>
              <label>Email:</label>
              <? echo $row['email']; ?> <br />
            </p>
            <p>
              <label>Contraseña:</label>
              <span id="sprytextfield2">
              <input type="password" name="contra" id="contra" value="<? echo $row['contrasena']; ?>" />
              <span class="textfieldRequiredMsg">Campo Obligatorio.</span></span></p>
            <p>
              <label>Celular:</label>
              <span id="sprytextfield3">
              <input type="text" name="cel" id="cel" value="<? echo $row['celular']; ?>" />
              <span class="textfieldRequiredMsg">Campo Obligatorio.</span></span></p>
            <p>
              <label>&nbsp;</label>
              <input type="submit" name="guardar" id="guardar" value="Guardar cambios" class="btn btn-primary btn-lg btn-block" />
            </p>
          </div>
        </form>
      </div>
</div>
		
		
	</div><!--- Aqui termina el contenedor de dox ---->

	</div>
	
	
	<div style="clear:both;"></div>
	
	 
<!--- Aqui termina el contenedor ciudad ----->
	
	
	<div style="clear:both;"></div>
	<?php include("pie.php"); ?>
	
    <div id="myModal" class="reveal-modal avisoprivacidad">



<img src="visual/dox-transp.png" width="176" height="60" />

<div style="clear:both"></div>

<p><strong><u>AVISO DE PRIVACIDAD</u></strong><strong>:</strong><br>
</p>
<p><strong>Dox Solutions, S.A. de C.V.,</strong> denominado comercialmente como <strong>&ldquo;DOX&rdquo;</strong> con la finalidad de orientar sobre la información recabada al titular de sus datos personales que en nuestro caso serian nuestros usuarios (público en general que accedan al sitio web gratuitamente y tiene acceso al directorio de los clientes) y los clientes (son las personas parte del directorio, que inician sesión&nbsp;en el portal y éstos a su vez hacen una aportación económica al administrador del sitio web, para hacer publicaciones en el mismo).  </p>
<p>De acuerdo a la Ley Federal de Protección de Datos Personales en Posesión de Particulares, a continuación hacemos una declaración de los elementos informativos en nuestro aviso de privacidad para nuestros clientes y usuarios:<strong> a) REVOCACIÓN AL CONSENTIMIENTO DE DATOS PERSONALES: </strong>El titular tiene derecho a revocar en cualquier momento el consentimiento que otorgó al encargado, para el tratamiento de sus datos personales (art. 8).  Esto se podrá llevar a cabo realizando una solicitud a nuestro correo electrónico <strong><u>correo@dox.mx</u></strong>, por lo que hacemos de su conocimiento que tendremos un plazo máximo de 20 (veinte)  días para atender su petición si resulta procedente, y se haga efectiva la misma dentro de los 15 (quince) días siguientes a la fecha, donde la respuesta se hará a la dirección de correo electrónico de la cual se realizó la solicitud. <strong>b) DATOS PERSONALES RECABADOS:</strong> Para las finalidades señaladas en el presente aviso de privacidad, recabamos sus datos de distintas formas (art. 17), Cuando usted nos lo proporciona directamente, por medios electrónicos, y cuando obtenemos información a través de otras fuentes que están permitidas por la ley; las formas de recabar y los datos que recabamos son los siguientes:</p>
<p><br>
<strong>De forma directa:</strong> </p>
<p>Cuando usted mismo nos lo proporciona, o nos da información con objeto de que le prestemos un servicio. </p>
<p>Los datos son: </p>
<p><strong>Usuarios:</strong>
</p>
<ul>
  
  <li>Nombre completo, </li>
  <li>Correo electrónico y</li>
  <li>Número de teléfono celular.</li>
</ul>
<p><strong>Clientes:</strong>
</p>
<ul>
  
  <li>Nombre completo, </li>
  <li>Correo electrónico, </li>
  <li>Fecha de nacimiento,</li>
  <li>Número de teléfono celular y de trabajo,</li>
  <li>Profesión,</li>
  <li>Cédula profesional,</li>
  <li>Especialidad,</li>
  <li>Cédula especialidad,</li>
  <li>Domicilio laboral,</li>
  <li>Educación,</li>
  <li>Idiomas y</li>
  <li>Certificaciones.</li>
</ul>
<p><strong>Medios electrónicos: </strong></p>
<p>cuando visita nuestro sitio de internet (<a href="http://www.dox.mx">www.dox.mx</a>), redes sociales<strong> </strong>(facebook y twitter)<strong> </strong>así como cuando nos envía información por correo electrónico:
  <em><strong>Usuarios:</strong></em>
</p>
<ul>
  
  <li>Nombre completo, </li>
  <li>Correo electrónico y </li>
  <li>Número de teléfono celular.</li>
</ul>
<p><strong>Clientes:</strong>
</p>
<ul>
  
  <li>Nombre completo, </li>
  <li>Correo electrónico, </li>
  <li>Fecha de nacimiento,</li>
  <li>Número de teléfono celular y de trabajo,</li>
  <li>Profesión,</li>
  <li>Cédula profesional,</li>
  <li>Especialidad,</li>
  <li>Cédula especialidad,</li>
  <li>Domicilio laboral,</li>
  <li>Educación,</li>
  <li>Idiomas y</li>
  <li>Certificaciones.</li>
</ul>
<p><strong>Otras fuentes:</strong> </p>
<p>A través de otras fuentes como directorios públicos, y los que en un futuro la empresa considere: </p>

<p><strong>Usuarios:</strong>
</p>
<ul>
  
  <li>Nombre completo, </li>
  <li>Correo electrónico y</li>
  <li>Número de teléfono celular.</li>
</ul>
<p><strong>Clientes:</strong>
</p>
<ul>
  
  <li>Nombre completo, </li>
  <li>Correo electrónico, </li>
  <li>Fecha de nacimiento,</li>
  <li>Número de teléfono celular y de trabajo,</li>
  <li>Profesión,</li>
  <li>Cédula profesional,</li>
  <li>Especialidad,</li>
  <li>Cédula especialidad,</li>
  <li>Domicilio laboral,</li>
  <li>Educación,</li>
  <li>Idiomas y</li>
  <li>Certificaciones.</li>
</ul>
<p><strong>c)  FINALIDADES DEL TRATAMIENTO DE SUS DATOS PERSONALES: </strong>(art.15)  </p>
<p><strong>Usuarios:</strong
></p>
<ul>

  <li>Para poder garantizar el buen funcionamiento de la aplicación y/o herramienta web a la que están accesando<strong>,</strong></li>
  <li>Para recibir notificaciones, invitaciones, promociones y noticias así como;<strong>  </strong></li>
  <li>Para permitir la identificación del usuario en caso de mal uso del sitio.<strong></strong></li>
</ul>
<p><strong>Clientes:</strong>
</p>
<ul>
  
  <li>Para poder garantizar el buen funcionamiento de la aplicación y/o herramienta web a la que están accesando, </li>
  <li>Para recibir notificaciones, invitaciones, promociones y noticias, así como;</li>
  <li>Para permitir la identificación del usuario en caso de mal uso del sitio,</li>
  <li>Para crear un directorio donde los clientes puedan publicar la información deseada que previamente hayan autorizado a Dox Solutions, S.A. de C.V. utilizar y</li>
  <li>Para crear un directorio donde los usuarios tengan acceso a la información de nuestros clientes.</li>
</ul>
<p><strong>d) IDENTIDAD Y DOMICILIO DEL RESPONSABLE QUE RECABA LOS DATOS PERSONALES:</strong> </p>
<p><strong>Dox Solutions, S.A. de C.V., </strong>denominada comercialmente <strong>&ldquo;DOX&rdquo; </strong>a cargo del <strong>C.</strong><strong> Guillermo Carranza Torróntegui</strong> quien es responsable del tratamiento de sus datos personales, con domicilio en <strong>calle Rio Quelite no. 180, Col. Guadalupe C.P. 80220 en Culiacán, Sinaloa</strong><strong>,</strong><strong> </strong><strong>México.</strong> Puede contactarnos para alguna duda, comentario, queja o sugerencia en nuestra página <strong><a href="http://www.dox.mx">www.dox.mx</a></strong>; o bien en nuestro correo electrónico: <strong><a href="mailto:correo@dox.mx">correo@dox.mx</a></strong> (art. 16).<strong>e)  LIMITACIÓN DEL USO DE DIVULGACIÓN DE SUS DATOS PERSONALES:</strong>  Usted puede limitar  ó dejar de recibir mensajes promocionales por teléfono fijo o celulares, así como dejar de recibir correo postal publicitario y correo electrónico (que puede contener instrucciones para optar por no participar), solicitándolo al correo electrónico <strong><u>correo@dox.mx</u></strong>(art. 16).<strong>f) MEDIOS PARA EJERCER LOS DERECHOS DE ACCESO, RECTIFICACIÓN, CANCELACIÓN U OPOSICIÓN DE DATOS PERSONALES (ARCO):</strong> Usted tiene el derecho de acceder a sus datos personales que poseemos y a los detalles del tratamiento de los mismos, así como rectificarlos en caso de ser inexactos o instruirnos, cancelarlos cuando considere que resulten ser excesivos o innecesarios para la finalidad que justificaron su obtención u oponerse al tratamiento de los mismos para fines específicos (art. 16).</p>
<p><br>
  Los mecanismos que se han implementado para el ejercicio de dichos derechos son a través de la presentación de la solicitud respectiva en:</p>
<ul>
  <li>Nuestra página web: <strong><u><a href="http://www.dox.mx">www.dox.mx</a></u></strong> y/o</li>
  <li>Nuestro correo electrónico: <strong><u><a href="mailto:correo@dox.mx">correo@dox.mx</a></u></strong>.</li>
</ul>
<p>Para mayor información, puede enviar un correo electrónico a la dirección anteriormente citada y dirigirlo a Guillermo Carranza Torróntegui.<strong>g) TRANSFERENCIA DE DATOS:</strong> La información que recabamos podría compartirse a los usuarios o bien a los clientes según sea el caso; ya que nuestra página es un catálogo virtual donde el usuario puede hacer contacto con nuestro cliente para reservar una cita médica y solicitar sus servicios, y esta a su vez permite a los clientes contactar a nuestros usuarios para confirmar una cita o bien prestar sus servicios. Sin embargo; hacemos la  aclaración que  nosotros no realizamos transferencias de sus datos a terceros nacionales ó  extranjeros, (art. 36). </p>
<p><br>
Nos comprometemos a no transferir su información personal a terceros sin su consentimiento, salvo las excepciones previstas en el artículo 37 de la Ley, así como realizar esta transferencia en los términos que fija está ley.Salvo en los casos del artículo 37de la Ley:</p>
<p><br>
  <strong><em><u>Artículo 37.-</u> </em></strong></p>
<p>Las transferencias nacionales o internacionales de datos podrán llevarse a cabo sin el consentimiento del titular cuando se dé alguno de los siguientes supuestos:<br>
  I.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cuando la transferencia esté prevista en una Ley o Tratado en los que México sea parte;<br>
  II.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cuando la transferencia sea necesaria para la prevención o el diagnóstico médico, la prestación de asistencia sanitaria, tratamiento médico o la gestión de servicios sanitarios;<br>
  III.&nbsp;&nbsp;&nbsp;&nbsp;Cuando la transferencia sea efectuada a sociedades controladoras, subsidiarias o afiliadas bajo el control común del responsable, o a una sociedad matriz o a cualquier sociedad del mismo grupo del responsable que opere bajo los mismos procesos y políticas internas;<br>
  IV.&nbsp;&nbsp;&nbsp;&nbsp;Cuando la transferencia sea necesaria por virtud de un contrato celebrado o por celebrar en interés del titular, por el responsable y un tercero;<br>
  V.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cuando la transferencia sea necesaria o legalmente exigida para la salvaguarda de un interés público, o para la procuración o administración de justicia;<br>
  VI.&nbsp;&nbsp;&nbsp;&nbsp;Cuando la transferencia sea precisa para el reconocimiento, ejercicio o defensa de un derecho en un proceso judicial, y<br>
  VII.&nbsp;&nbsp;&nbsp;Cuando la transferencia sea precisa para el mantenimiento o cumplimiento de una relación jurídica entre el responsable y el titular.</p>
<p>Si usted no manifiesta su oposición, a través de los medios para ejercer sus derechos ARCO, para que sus datos personales y/o datos personales sensibles sean  transferidos, se entenderá que ha otorgado su consentimiento para ello.<strong>h)  MODIFICACIÓN AL AVISO DE PRIVACIDAD: </strong>Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad, para atención de novedades legislativas o jurisprudenciales, políticas internas, nuevos requerimientos para la prestación u ofrecimiento de nuestros servicios o productos y prácticas del mercado (art. 18).<br>
</p>
<p>Estas modificaciones estarán disponibles al público a través de alguno de los siguientes medios: </p>
<ul>
  <li>En nuestra página de internet: <strong><a href="http://www.dox.mx">www.dox.mx</a></strong> y/o</li>
  <li>Notificación vía correo electrónico que nos haya proporcionado.</li>
</ul>
<p><strong>i)</strong>  <strong>OBTENCIÓN DE DATOS PERSONALES SENSIBLES</strong>: </p>
<p>Le informamos que para cumplir con las finalidades previstas en este aviso, serán recabados y tratados datos personales sensibles (art. 9), cabe aclarar que estos datos no representan un diagnóstico, más bien es para conocer la especialidad a canalizar; así como, el tipo de servicio a prestar. Como aquellos datos personales que refieren a:<br>
  <strong>Usuarios:</strong>
</p>
<ul>
  <li>Signos patológicos,</li>
  <li>Síntomas,</li>
  <li>Padecimientos y</li>
  <li>Condición de salud presente.</li>
</ul>
<p><strong>Clientes:</strong></p>
<ul>
  <li>N/A</li>
</ul>
<p>Por lo tanto se declara que los mismos serán tratados bajo medidas de seguridad, siempre garantizando su confidencialidad.<strong>QUEJAS Y DENUNCIAS  POR EL TRATAMIENTO INDEBIDO DE SUS DATOS PERSONALES: </strong>Si usted considera que su derecho de protección de datos personales ha sido lesionado por alguna conducta de nuestros empleados o de nuestras actuaciones o respuestas, presume que en el tratamiento de sus datos personales existe alguna violación a las disposiciones previstas en ley federal de protección de datos personales en posesión de los particulares, podrá interponer la queja o denuncia correspondiente ante el IFAI, para mayor información visite <strong><a href="http://www.ifai.org.mx">www.ifai.org.mx</a></strong>.</p>
<p><br>
  Fecha de la última actualización: [04/Marzo /2013].</p>

			<a class="close-reveal-modal">&#215;</a>
</div>
    
	
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
//-->
</script>
</body>
</html>
		