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
 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

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
  <a href="doctor.php" class="navi">Médicos</a> <!--<a href="clinica-imagen.php" class="navi">Imágenes de médicos</a>--> <a href="seguros.php" class="navi">Seguros Médicos</a><a href="pacientes.php" class="navi">Pacientes</a><a href="#" class="navi" style="float:right">Cerrar Sesión</a>
  <p style="clear:both">&nbsp;</p>
</div>
<div id="contenido">
  
	
	<h1>Médicos </h1>
  <p><a href="doctor-nuevo.php" id="bnuevo">Crear nuevo</a></p>
  <p>&nbsp; </p>
  
  <? 
  conectar();
	$sql = mysql_query("Select * From doctor");
	desconectar();
  
  ?>
  <!--EMPIEZAN ELEMENTOS DE MEDICOS-->

  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
    <? 
conectar(); $sql = mysql_query("Select * From doctor"); desconectar();
  ?>
    <tr>
    <td width="80" bgcolor="#E9E9E9">&nbsp;</td>
    <td width="20%" bgcolor="#E9E9E9">Nombre</td>
    <td width="15%" bgcolor="#E9E9E9">Especialidad</td>
    <td width="10%" bgcolor="#E9E9E9">Usuario</td>
    <td width="10%" bgcolor="#E9E9E9">Teléfono</td>
    <td bgcolor="#E9E9E9">Ciudad</td>
    <td bgcolor="#E9E9E9">&nbsp;</td>
  </tr>
   <? 
	while ($rw = mysql_fetch_array($sql))
{
	
	$val = $rw['titulo'];
	for($i = 1; $i <= 9; $i++)
			{
				switch($val)
				{
					
					case 1: $nom = "Dr"; break;
					case 2: $nom = "Dra"; break;
					case 3: $nom = "Psic"; break;
					case 4: $nom = "Sr"; break;
					case 5: $nom = "Sra"; break;
					case 6: $nom = "Srita"; break;
					case 7: $nom = "MC"; break;
					case 8: $nom = "Lic"; break;
					case 9: $nom = "Ing"; break;
					
				}
				
					
			}
	
	?>
  <tr>
    <td>
	<?php conectar();
	   $sql2 = mysql_query("Select * from galeria where id_doctor = ".$rw['id']."");
 $rw2 = mysql_fetch_array($sql2);
 desconectar();
 if ($rw2['portada']==!"") {
	   $foto = "galeria_dr/".$rw2['portada'];}
	   else
	   { $foto = "galeria_dr/noimage.jpeg"; } 
	   
	   
	   ?>
       
       <img src="<?php echo $foto; ?>" width="60px" />
       
	</td>
    <td><a href="doctor-editar-ficha.php?id=<?php echo utf8_encode($rw['id']); ?>" class="screenshot" rel="<?php echo $foto; ?>" title="<? echo utf8_encode($nom." ".$rw['nombre']." ".$rw['a_paterno']." ".$rw['a_materno']); ?>"><? echo utf8_encode($nom." ".$rw['nombre']." ".$rw['a_paterno']." ".$rw['a_materno']); ?></a><br />ID: <? echo utf8_encode($rw['id']); ?></td>
    <td>
      <? 
	  conectar();
	  $sql2 = mysql_query("Select especialidad, id_ciudad from clinica where id_doctor = ".$rw['id']."");
	  desconectar();
	    
	  while($rw2 = mysql_fetch_array($sql2))
	 {
		 /*if($rw2['especialidad'] != '')
		 {*/
			 $esp = explode(",",$rw2['especialidad']);
			 $num = count($esp);
			 for($i = 1; $i < $num - 1; $i++)
			 {
				 /*if($esp[$i] != ",")
				 {*/
					 switch($esp[$i])
					 {
						 case 1: $e = "Alergología"; break;
						 case 2: $e = "Anestesiología"; break;
						 case 3: $e = "Angiología"; break;
						 case 4: $e = "Biología de la reproducción"; break;
						 case 5: $e = "Cardiología"; break;
						 case 6: $e = "Cirugía Bariátrica"; break;
						 case 7: $e = "Cirugía General"; break;
						 case 8: $e = "Cirugía Maxilofacial"; break;
						 case 9: $e = "Cirugía Plástica"; break;
						 case 10: $e = "Coloproctología"; break;
						 case 11: $e = "Dermatología"; break;
						 case 12: $e = "Endocrinología"; break;
						 case 13: $e = "Gastroenterología-Endoscopía"; break;
						 case 14: $e = "Genética"; break;
						 case 15: $e = "Geriatría"; break;
						 case 16: $e = "Ginecología - Obstetricia"; break;
						 case 17: $e = "Hematología"; break;
						 case 18: $e = "Infectología"; break;
						 case 19: $e = "Medicina de Rehabilitación"; break;
						 case 20: $e = "Medicina Interna"; break;
						 case 21: $e = "Neumología"; break;
						 case 22: $e = "Neurología-neurocirugía"; break;
						 case 23: $e = "Nutrición"; break;
						 case 24: $e = "Pediatría"; break;
						 case 25: $e = "Psiquiatría - Psicología"; break;
						 case 26: $e = "Radiología y Ultrasonografista"; break;
						 case 27: $e = "Reumatología"; break;
						 case 28: $e = "Sexología"; break;
						 case 29: $e = "Traumatología y Ortopedia"; break;
						 case 30: $e = "Urología"; break;
						 case 31: $e = "Dentista"; break;
						 case 32: $e = "Odontopediatría"; break;
						 case 33: $e = "Otorrinolaringología"; break;
						 case 34: $e = "Oftalmología"; break;
						 case 35: $e = "Nefrología"; break;
						 case 36: $e = "Ortodoncia"; break;
						 case 37: $e = "Podología"; break;
						 case 38: $e = "Medicina del sueño"; break;
						 case 39: $e = "Medicina del deporte"; break;
						 
						 
					 }
					 echo $e."<br /> ";	
				 //}
			 }
		 //}
		 
		   switch($rw2['id_ciudad'])
		  {
				case 1: $ciudad = "Culiacán"; break;
				case 2: $ciudad = "Tijuana"; break;
				case 3: $ciudad = "La Paz"; break;
				case 4: $ciudad = "Los Mochis"; break;
				case 5: $ciudad = "Hermosillo"; break;
				case 6: $ciudad = "Mazatlán"; break;
				case 7: $ciudad = "Tepic"; break;
				case 8: $ciudad = "Guadalajara"; break;
				case 9: $ciudad = "DF"; break;
				case 10: $ciudad = "Monterrey"; break;
				case 11: $ciudad = "Chihuahua"; break;
				case 12: $ciudad = "Torreón"; break;
				case 13: $ciudad = "León"; break;
		  }
	 
	 
	 }
	  
	  ?>
    </td>
    <td><? echo utf8_encode($rw['email']); ?></td>
    <td><? echo utf8_encode($rw['celular']); ?></td>
    <td><? echo $ciudad; ?></td>
    <td><a href="doctor-editar-ficha.php?id=<?php echo utf8_encode($rw['id']); ?>" title="Editar Médico"><img src="_assets/edit.png" width="22" height="22" /></a><a href="clinica-imagen.php?id_dr=<? echo $rw['id']; ?>"  title="Ir a la galería"><img src="_assets/doctor.png" width="24" height="24" /></a>
    
  <!--  <a href="#" onclick="abrir('doctor_del.php?id= echo $rw['id']; ',0,0,0,0,0,1,1,300,170,300,200,1);"  title="Eliminar Doctor">-->
    
    <a href="#myModal<?php echo $rw['id']; ?>" role="button" class="btn btn-mini" data-toggle="modal"title="Eliminar Doctor">
    <img src="_assets/trash3.png" width="24" height="24" /></a>
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
    <a href="doctor_del2.php?id=<?php echo $rw['id']; ?>" class="btn btn-danger">¡Confirmar y eliminar ahora!</a>
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
  
 
</div>
<p><br />
</p>
<p><br />
  <br />
  <br />
  
</p>
<div id="pie">Powered by Mente Interactiva's Sinapsis</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/bootstrap-dropdown.js"></script>
</body>
</html>
