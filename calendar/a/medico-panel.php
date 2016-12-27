


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Dox - Reserva tu consulta médica en línea -  Panel de Usuario</title>
   <link href="../../colors/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../../colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="../../colors/estilo_dox2.css"/>
<link rel="stylesheet" href="../../jquery/reveal.css">	
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="../../jquery/jquery.reveal.js"></script>
<script type="text/javascript" src="../../magic/magic-script.js"></script>
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
</style>

<link rel="stylesheet" type="text/css" href="../../bootstrap-320/css/bootstrap.css" />

<script language="javascript">
//Su explorador no soporta java o lo tiene deshabilitado; esta pagina necesita javascript para funcionar correctamente<!--
//Copyright © McAnam.com

function abrir(direccion, pantallacompleta, herramientas, direcciones, estado, barramenu, barrascroll, cambiatamano, ancho, alto, izquierda, arriba, sustituir){
     var opciones = "fullscreen=" + pantallacompleta +
                 ",toolbar=" + herramientas +
                 ",location=" + direcciones +
                 ",status=" + estado +
                 ",menubar=" + barramenu +
                 ",scrollbars=" + barrascroll +
                 ",resizable=" + cambiatamano +
                 ",width=" + ancho +
                 ",height=" + alto +
                 ",left=" + izquierda +
				 ",top=" + arriba;
     var ventana = window.open(direccion,"venta",opciones,sustituir);
}                    
</script>
</head>

<body >

<div class="contenedor sec-panel">

<!--Aqui termina la cabecera de dox ----->

  <div style="clear:both;"></div>
</div>
		
<div id="contenedor-degradado">
		
		<div ><!--- Aqui termina el div de contenido dox ---->
		
		<div id="contenedor">
     <div id="paneltitulo">Estimado(a) . en este panel puedes llevar el control de tus citas médicas, así como actualizar tus datos.<br />
       <br />
       ¡Gracias por preferir DOX!<br />
     </div>
      <div id="columna">
      
      <ul class="nav nav-pills nav-stacked">
  <li class="active">
<a href="#">Mis Citas</a>
</li>
  <li><a href="../../perfil-paciente.php?id=<? echo $rw['id']; ?>">Mi Usuario</a></li>
  <li><a href="<?php echo $logoutAction ?>">Salir de mi cuenta</a>      </li>
      </ul>
      </div>
      <div id="contpanel">
       <ul class="nav nav-tabs nav-justified" role="tablist">
<li class="active">
<a href="#">Próximas Citas</a>
</li>
<li>
<a href="../../citas-completadas.php">Citas Completadas</a>
</li>
<li>
<a href="#">Facturas</a>
</li>
</ul>
       <p>&nbsp;</p>
        <p>Te recomendamos presentarte a tu cita con puntualidad. Recuerda que puedes cancelar tu cita vía web solo hasta 2 horas antes.</p>
        <div class="alert alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <h4>Advertencia</h4>
  Dox es una herramienta seria que involucra el tiempo de médicos y sus pacientes. El mal uso de esta herramienta por parte del usuario podría resulta en el bloqueo parcial o total de su contraseña y/o su cuenta.</div>
      </div>
</div>
		
		
	</div><!--- Aqui termina el contenedor de dox ---->

</div>
	
	
	<div style="clear:both;"></div>
	
	 
<!--- Aqui termina el contenedor ciudad ----->
	
	
	<div style="clear:both;"></div>
    <?php include("../../pie.php"); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
    
<script src="../../js/bootstrap.js"></script>
</body>
</html>
		