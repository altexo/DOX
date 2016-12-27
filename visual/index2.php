<?
include("librerias/conexion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="colors/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />

<title>DOX - Reserva tu consulta médica en línea</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<link rel="stylesheet" href="jquery/reveal.css">	
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>



</head>

<body class="fondo-home">

	<div id="contenedor" class="sec-portada">
<?php include("cabeza.php"); ?>

		<div style="clear:both;"></div>
		
		
		
		<div id="contenedor-degradado">
		<div id="principal">
		
		<img src="visual/servicio-gratuito.png" width="100" height="42" id="servicio-gratuito">
		
		<p>&nbsp;</p>
		
		  <form id="form1" name="form1" method="post" action="busquedas.php">
		    <div class="listbox-principal">
		      <div class="titulo1-listbox">Encuentra un doctor y haz tu cita en línea</div>
		      <? conectar(); 
		$sql = mysql_query("Select * From especialidad");
	?>
		      <select id="especialidad" name="especialidad" class="form">
		        <option selected="selected" value="0">Especialidad</option>
		        <? while($row=mysql_fetch_array($sql)){ ?>
		        <option value="<? echo utf8_encode($row['id']); ?>"><? echo utf8_encode($row['nombre']); ?></option>
		        <? } 
	 desconectar();
	 ?>
	          </select>
		     
		      <? conectar(); 
		$sql = mysql_query("Select * From ciudad");
	?>
		      <select id="ciudad" name="ciudad" class="form">
		        <option selected="selected" value="0">Ciudad</option>
		        <? while($row=mysql_fetch_array($sql)){ ?>
		        <option value="<? echo utf8_encode($row['id']); ?>"><? echo utf8_encode($row['nombre']); ?></option>
		        <? } 
	 desconectar();
	 ?>
	          </select>
	
		      <? conectar(); 
		$sql = mysql_query("Select * From seguro");
	?>
		      <select id="seguro" name="seguro" class="form">
		        <option selected="selected" value="0">Aseguradora</option>
                
		        <? while($row=mysql_fetch_array($sql)){ ?>
		        <option value="<? echo utf8_encode($row['id']); ?>"><? echo utf8_encode($row['nombre']); ?></option>
		        <? } 
	 desconectar();
	 ?>
	          </select>
<input type="image" name="submit" src="visual/bt_encontrar_medico2.png" width="162" height="40" style="margin-left:90px; margin-top:5px"> 
	        </div>
	      </form>
		  <!--- Aqui termina el div de listbox-principal --->
			  <div id="slide-principal"><div id="mislider ">
          <div id="slide">
            <div class="slides_container">

		
						<div><img src="visual/portada2.jpg"></div>
                    <div><img src="visual/portada1.jpg"></div>
                    <div><img src="visual/portada3.jpg"></div>
		
		
			</div></div></div></div>
            <!-- Aqui termina el slide de principal ---->
		
		
		
		</div><!--- Aqui termina el banner principal ----->
		
		
		<div style="clear:both;"></div>
		
		<div id="beneficios">
		
			<!--- *************************** BENEFICIO ********************************* --->
			<div class="beneficio">
				<br>
				<img src="visual/folder.png">
				<div class="titulo-beneficio folder">Gran Cat&aacute;logo M&eacute;dico</div>
				<div class="abstract-beneficio">
				Los mejores m&eacute;dicos de todas las especialidades 
				en un solo lugar.
				
				</div>
			</div>
		
			<!---- *********************************** FIN BENEFEICIO *********************** --->
		
			<!--- *************************** BENEFICIO ********************************* --->
			<div class="beneficio">
				<br>
				<img src="visual/reloj.png">
				<div class="titulo-beneficio reloj">R&aacute;pido y f&aacute;cil</div>
				<div class="abstract-beneficio">
				Consulta, r&eacute;gistrate y realiza tu cita médica en segundos de la manera más fácil.
				
				</div>
			</div>
		
			<!---- *********************************** FIN BENEFEICIO *********************** --->
		
			<!--- *************************** BENEFICIO ********************************* --->
			<div class="beneficio">
				<br>
				<img src="visual/candado.png">
				<div class="titulo-beneficio candado">Seguridad y Confianza</div>
				<div class="abstract-beneficio">
				Tus datos de registro,b&uacute;squedas y citas se mantendr&aacute;n protegidos.
				
				</div>
			</div>
		
			<!---- *********************************** FIN BENEFEICIO *********************** --->
		
		<div style="clear:both;"></div>
		
		</div><!--- Aqui termina el div de beneficios ---->
		
		<div style="clear:both;"></div>
		<div id="beneficios2">
		  <!--- *************************** BENEFICIO ********************************* --->
		  <div class="beneficio"> 
		    <img src="visual/folder.png" width="61" height="40" style="margin-top:10px; margin-bottom:5px"/>
		    <div class="titulo-beneficio folder">Gran Cat&aacute;logo M&eacute;dico</div>
		    <div class="abstract-beneficio"> Los mejores m&eacute;dicos de todas las especialidades 
		      en un solo lugar. </div>
	      </div>
		  <!---- *********************************** FIN BENEFEICIO *********************** --->
		  <!--- *************************** BENEFICIO ********************************* --->
		  <div class="beneficio"> 
		    <img src="visual/reloj.png" width="76" height="50" style="margin-top:5px" />
		    <div class="titulo-beneficio reloj">R&aacute;pido y f&aacute;cil</div>
		    <div class="abstract-beneficio"> Consulta, regístrate y realiza tu cita médica en segundos de la manera más fácil. </div>
	      </div>
		  <!---- *********************************** FIN BENEFEICIO *********************** --->
		  <!--- *************************** BENEFICIO ********************************* --->
		  <div class="beneficio"> 
		    <img src="visual/candado.png" width="75" height="50"  style="margin-top:5px"/>
		    <div class="titulo-beneficio candado">Seguridad y Confianza</div>
		    <div class="abstract-beneficio"> Tus datos de registro, b&uacute;squedas y citas se mantendr&aacute;n protegidos. </div>
	      </div>
		  <!---- *********************************** FIN BENEFEICIO *********************** --->
		  <div style="clear:both;"></div>
		  </div>
<div id="seguridad-unete"> <a href="especialistas.php"><img src="visual/unete.png"></a>
			
		<img src="visual/seguridad.png">
		
		
		
	  </div>
		
		
	</div><!--- Aqui termina el contenedor-degradado--->
	<div id="empujador"></div>
	</div><!--- Aqui termina el contenedor de dox ---->

	
	
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
    
    
</body>
</html>
 <script>
            $(function(){
                $("#slide").slides({
 
 preload: true,
 preloadImage: '/imagenes/slider/loading.gif',
play: 8000,
				pause: 2500,
				hoverPause: false
});
});
        </script>
		