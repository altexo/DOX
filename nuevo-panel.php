<? 
session_start();
include("librerias/conexion.php");
 
$x = $_GET['x'];

//Viene del loggin
if(isset($_POST['email_registrado']) and isset($_POST['contra_registrado']))
{
	$email = $_POST['email_registrado'];
	$contra = $_POST['contra_registrado'];
	
	//$pass = $_POST['contra_registrado'];
	$cadena = "Select * from paciente where email = '".$email."' and contrasena = '".$contra."'";
	
}
else if(isset($_GET['id'])) //Viene de mi usuario
{
	$id = 	$_GET['id'];
	$cadena = "Select * from paciente where id = ".$id."";
}
conectar();
$sq = mysql_query($cadena);
$rw = mysql_fetch_array($sq);
$hola = "Select * from datos where idpaciente = ".$rw['id']." order by inicio desc";
$sql = mysql_query($hola);

desconectar();



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Dox - Reserva tu consulta médica en línea -  Panel de Usuario</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<script type="text/javascript" src="magic/magic-script.js"></script>
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

<body class="fondo-normal">

<div class="contenedor">



		 <?php include("cabeza.php"); ?>

		<div style="clear:both;"></div>
	</div>
		
<div id="contenedor-degradado">
		
		<div ><!--- Aqui termina el div de contenido dox ---->
		
		<div id="contenedor">
     <div id="paneltitulo">Estimado(a) <? echo utf8_encode($rw['nombre']); ?>. en este panel usted puede llevar el control de sus citas médicas, así como actualizar sus datos.<br />
       <br />
       ¡Gracias por preferir DOX!<br />
     </div>
      <div id="columna">
        <p>Menú</p>
        <p><a href="#">Ver Mis Citas</a></p>
        <p><a href="perfil-paciente.php?id=<? echo $rw['id']; ?>">Mi Usuario</a></p>
      </div>
      <div id="contpanel">
        <p>Mis Citas</p>
        <div class="cita2"><div class="reg1">Día</div><div class="reg2">Hora</div>
          <div class="reg3">Médico</div>
          <div class="reg4">Acción</div></div>
        
        <? while($row = mysql_fetch_array($sql)) {?>
        <div class="cita">
        <? 
		
		
		$fecha = explode("-",$row['inicio']);
			$f = $fecha[2]."-".$fecha[1]."-".$fecha[0];
			
			$hora = explode(":",$row['hinicio']);
			$h = $hora[0].":".$hora[1];
		?>
          <div class="reg1"><? echo $f; ?></div>
          <div class="reg2"><? echo $h." h"; ?></div>
          <div class="reg3"><? 
		  
		 
		 conectar();
		 $hola2 = "Select * from doctor where id = ".$row['iddoctor']."";
		  $sql2 = mysql_query($hola2);
		  $row2 = mysql_fetch_array($sql2);
		  
		  desconectar();
		  
		  switch($row2['titulo'])
		  {
			case 1: $t = "Dr"; break;
          	case 2: $t = "Dra"; break; 
          	case 3: $t = "Psic"; break; 
          	case 4: $t = "Sr"; break;
          	case 5: $t = "Sra"; break;
          	case 6: $t = "Srita"; break;
          	case 7: $t = "MC"; break;
          	case 8: $t = "Lic"; break;
          	case 9: $t = "Ing"; break;
		  }
		  
		  
		  echo utf8_encode($t." ".$row2['nombre']." ".$row2['a_paterno']." ".$row2['a_materno']); ?></div>
          <div class="reg4"><a href="#" onclick="abrir('cancelar.php?id=<? echo $row['id']; ?>',0,0,0,0,0,1,1,500,350,300,200,1);">Cancelar Cita</a></div>
        </div>
        <? } ?>
        <p>&nbsp;</p> 
        <p>&nbsp;</p>
        <p>Te recomendamos presentarte a tu cita con puntualidad. Recuerda que puedes cancelar tu cita vía web solo hasta 2 horas antes.</p>
        <img src="visual/ad.jpg" width="730" height="100" /></div>
</div>
		
		
	</div><!--- Aqui termina el contenedor de dox ---->

	</div>
	
	
	<div style="clear:both;"></div>
	
	 
<!--- Aqui termina el contenedor ciudad ----->
	
	
	<div style="clear:both;"></div>
	
	<?php include("pie.php"); ?>
	
	
</body>
</html>
		