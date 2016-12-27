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
</head>

<body>
<div id="encabezado"><img src="_assets/logo.png" width="200" height="73" /></div>
<div id="menu">
  <p>Seleccione una opción</p>
  <a href="doctor.php" class="navi">Médicos</a> <!--<a href="galeria.php" class="navi">Imágenes de médicos</a>--> <a href="seguros.php" class="navi">Seguros Médicos</a>
  <p style="clear:both">&nbsp;</p>
</div>
<div id="contenido">
  
	
	<h1>Médicos </h1>
  <p><a href="#" id="bnuevo">Crear nuevo</a></p>
  <p>&nbsp; </p>
  
  <? 
  conectar();
	$sql = mysql_query("Select * From doctor");
	desconectar();
  
  ?>
  <!--EMPIEZAN ELEMENTOS DE MEDICOS-->
  <div id="envoltura">

    <div id="cabeza">
     <div class="envoltura2">
      <div class="ficha1">Nombre</div>
      <div class="ficha2">Especialidad</div>
      <div class="ficha3">Usuario</div>
      <div class="ficha4">Teléfono</div>
      </div>
    </div>
   
    <div class="envoltura2">
    
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
      <div class="elemento">
        <div class="ficha1"><a href="#" class="screenshot" rel="_assets/fulano.jpg"><? echo utf8_encode($nom." ".$rw['nombre']." ".$rw['a_paterno']." ".$rw['a_materno']); ?></a></div>
      <div class="ficha2"><? 
	  conectar();
	  $sql2 = mysql_query("Select especialidad from clinica where id_doctor = ".$rw['id']."");
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
						 
						 
					 }
					 echo $e.", ";	
				 //}
			 }
		 //}
		 
	 }
	  
	  ?>&nbsp;</div>
      <div class="ficha3"><? echo utf8_encode($rw['email']); ?>&nbsp;</div>
      <div class="ficha4"><? echo utf8_encode($rw['celular']); ?>&nbsp;</div>
      <div class="ficha5"><a href="doctor-edit.php" class="tooltip" title="Editar Médico"><img src="_assets/edit.png" width="22" height="22" /></a><a href="#" class="tooltip" title="Ver Perfil del Médico"><img src="_assets/doctor.png" width="24" height="24" /></a><a href="#" class="tooltip" title="Eliminar Perfil"><img src="_assets/trash3.png" width="24" height="24" /></a></div>
  </div>
    <div style="clear:both;"></div>
      <? } ?> 
    
    </div>
        <div style="clear:both"></div>  
    
  </div>
      <!--TERMINAN ELEMENTOS DE MEDICOS-->
    <div style="clear:both"></div>
</div>
  
 
</div>
<div id="pie">Powered by Mente Interactiva's Sinapsis</div>
</body>
</html>
