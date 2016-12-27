<? 
 include("librerias/conexion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DOX</title>
<link href="_css/sinapsis_novo.css" rel="stylesheet" type="text/css" />
<link href="../colors/bs.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
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

<body>
<div id="encabezado"><img src="_assets/logo.png" width="200" height="73" /></div>
<div id="menu">
  <p>Seleccione una opción</p>
  <a href="doctor.php" class="navi">Médicos</a> <!--<a href="clinica-imagen.php" class="navi">Imágenes de médicos</a>--> <a href="seguros.php" class="navi">Seguros Médicos</a><a href="pacientes.php" class="navi">Pacientes</a>
  <p style="clear:both">&nbsp;</p>
</div>
<div id="contenido">
  
	
	<h1>Pacientes</h1>
  <p>&nbsp; </p>
  
  <? 
  conectar();
	$sql = mysql_query("Select * From paciente");
	desconectar();
  
  ?>
  <!--EMPIEZAN ELEMENTOS DE MEDICOS-->

  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
    <? 
conectar(); $sql = mysql_query("Select * From paciente"); desconectar();
  ?>
    <tr>
    <td width="40%" bgcolor="#E9E9E9">Nombre</td>
    <td width="15%" bgcolor="#E9E9E9">Email</td>
    <td width="20%" bgcolor="#E9E9E9">Contraseña</td>
    <td width="15%" bgcolor="#E9E9E9">Celular</td>
    <td bgcolor="#E9E9E9">&nbsp;</td>
    </tr>
   <? 
	while ($rw = mysql_fetch_array($sql))
{
	
	
	
	?>
  <tr>
    <td width="15%"><? echo utf8_encode($rw['nombre']); ?><br />ID: <? echo utf8_encode($rw['id']); ?></td>
    <td width="15%"><? echo utf8_encode($rw['email']); ?></td>
    <td width="15%"><? echo utf8_encode($rw['contrasena']); ?></td>
    <td width="15%"><? echo utf8_encode($rw['celular']); ?></td>
    <td width="15%"><a href="#myModal<?php echo $rw['id']; ?>" role="button" class="btn btn-mini" data-toggle="modal"title="Eliminar Paciente"><img src="_assets/trash3.png" width="24" height="24" /></a>
    
    <div class="modal hide fade" id="myModal<?php echo $rw['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Eliminar elemento</h3>
  </div>
  <div class="modal-body">
    <p>¿Está seguro que desea eliminar este elemento?</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn">Cancelar acción</a>
    <a href="paciente_del2.php?id=<?php echo $rw['id']; ?>" class="btn btn-danger">¡Confirmar y eliminar ahora!</a>
  </div>
</div>
    
    </td>
    </tr>
  <?
}
  ?>
</table>
  
      <!--TERMINAN ELEMENTOS DE MEDICOS-->
  <div style="clear:both"></div>
</div>
  
 
</div><br />
<br />
<br />
<br />

<div id="pie">Powered by Mente Interactiva's Sinapsis</div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/bootstrap-dropdown.js"></script>
</body>
</html>
