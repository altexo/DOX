<? 
 include("librerias/conexion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DOX</title>
<link href="_css/sinapsis_novo.css" rel="stylesheet" type="text/css" />
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
  <a href="doctor.php" class="navi">Médicos</a>
  <!--<a href="clinica-imagen.php" class="navi">Imágenes de médicos</a>-->
  <a href="seguros.php" class="navi">Seguros Médicos</a><a href="pacientes.php" class="navi">Pacientes</a><a href="#" class="navi" style="float:right">Cerrar Sesión</a>
  <p style="clear:both"></p>
  <p style="clear:both">&nbsp;</p>
</div>
<div id="contenido">
  
	
	<h1>Seguros </h1>
  <p><a href="seguro_ins.php" id="bnuevo">Crear nuevo</a></p>
  <p>&nbsp; </p>
  
  <? 
  conectar();
	$sql = mysql_query("Select * From seguro");
	desconectar();
  
  ?>
  <!--EMPIEZAN ELEMENTOS DE MEDICOS-->
  <div id="envoltura">

    <div id="cabeza">
     <div class="envoltura2">
      <div class="ficha1" style="width:550px;">Nombre</div>
      <div class="ficha2" style="width:400px;">Logo</div>
     </div>
    </div>
   
    <div class="envoltura2">
    
    <? 
	while ($rw = mysql_fetch_array($sql))
{
	
	
	
	?>
      <div class="elemento">
        <div class="ficha1" style="width:550px;"><a href="#" class="screenshot" rel="_assets/fulano.jpg"><? echo utf8_encode($rw['nombre']); ?></a></div>
      <div class="ficha2" style="width:400px;"><img src="logo_seguro/<? echo $rw['logo']; ?>" alt="Logo"  height="40" border="0"  align="absmiddle" /></div>
      <div class="ficha5" style="float:right;"><a href="seguro_mod.php?id=<? echo $rw['id']; ?>" class="tooltip" title="Editar Seguro"><img src="_assets/edit.png" width="22" height="22" /></a><a href="#" onclick="abrir('seguro_del.php?id=<? echo $rw['id']; ?>',0,0,0,0,0,1,1,300,170,300,200,1);" class="tooltip" title="Eliminar Seguro"><img src="_assets/trash3.png" width="24" height="24" /></a></div>
  </div>
    <div style="clear:both;"></div>
      <? } ?> 
    
    </div>
        <div style="clear:both"></div>  
    
  </div>
      <!--TERMINAN ELEMENTOS DE MEDICOS-->
    <div style="clear:both"></div>
</div>
  
 
</div><br />
<br />
<br />
<br />
<div id="pie">Powered by Mente Interactiva's Sinapsis</div>
</body>
</html>
