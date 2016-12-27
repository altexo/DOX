<? 
include_once('librerias/conexion.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sinapsis V3 - Powered by Mente Interactiva</title>
<link href="../css_sinapsis3/css_s3_base.css" rel="stylesheet" type="text/css" />
<link href="../css_sinapsis3/css_s3_txt.css" rel="stylesheet" type="text/css" />
<link href="../css_sinapsis3/css_s3_formas.css" rel="stylesheet" type="text/css" />
<link href="../css_sinapsis3/css_s3_ligas.css" rel="stylesheet" type="text/css" />
<link href="../css_sinapsis3/css_s3_sistemas.css" rel="stylesheet" type="text/css" />
<link href="estilos/etiquetas.css" rel="stylesheet" type="text/css" />
<script src="../js/menu.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.functions.js"></script>
<script type="text/javascript" src="../js/livevalidation_standalone.compressed.js"></script>
<script src="js/valida_entradas.js" type="text/javascript"></script>
<script src="../scripts/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
	$(function(){
		$('#menumg li .liga_mg').click(function(event){
			var elem = $(this).next();
			if(elem.is('ul')){
				event.preventDefault();
				$('#menumg ul:visible').not(elem).slideUp();
				elem.slideToggle();
			}
		});
	});
	</script>


<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

</script> 
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

 <SCRIPT LANGUAGE="JavaScript">
<!-- Original:  Ronnie T. Moore -->
<!-- Web Site:  The JavaScript Source -->

<!-- Dynamic 'fix' by: Nannette Thacker -->
<!-- Web Site: http://www.shiningstar.net -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else 
countfield.value = maxlimit - field.value.length;
}
</script>
<link href="../css_sinapsis3/css_s3_menu.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.oblig {	color:#C00; 
	font-size:16px; 
	margin-left:5px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
p {
	margin-top: 10px;
	margin-right: 5px;
	margin-bottom: 5px;
	margin-left: 5px;
}
fieldset {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 13px;
	border-color:#EEE;
	width:550px; 
	margin-left:10px;
}
label {
	display: block;
	width: 115px;
	float: left;
}
.oblig{
	color:#C00; 
	font-size:16px; 
	margin-left:5px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
.oblig1 {color:#C00; 
	font-size:16px; 
	margin-left:5px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
.oblig1 {	color:#C00; 
	font-size:16px; 
	margin-left:5px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
</style>
</head>

<body <? /*echo $msj;*/?>>
<div id="contenedor"> 
   <div id="encabezado">
    <div id="logo"></div>
    <a href="#" class="boton_encabezado">Dashboard</a> <a href="#" class="boton_encabezado">Control de Usuario</a> <a href="#" class="boton_encabezado">Soporte Sinapsis V3</a></div>
  <? include('menu.php')?>
  <form action="" method="post" enctype="multipart/form-data" name="form1" target="" id="form1" >
    <div id="interfaz">
      <p><span class="txt_titulo1">Galería</span><span class="txt_titulo1"><br />
      </span></p> 
      <p>&nbsp;
      </p>
      <p>
        <input style="background:#F60; line-height:50px; border-bottom-style:solid; border-bottom-width:1px; border-color:#CCC; width:130px; height:40px; color:#FFF; padding: 10px;  -moz-border-radius: 10px; -webkit-border-radius:10px; float:left; margin-right: 2px;" type="submit" name="button" id="button" value="+ Agregar Galería" onclick="abrir('galeria_ins.php',0,0,0,0,0,1,1,540,380,180,200,1);" />
        
      </p>
      <div id="cmp2" style="float:left"></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>


<? 
	conectar();
	$sql = mysql_query("Select * From doctor");
	desconectar();
?>



</p>
<div id="etiquetas_deudores">
  <div id="cliente">Nombre </div>
  <div id="monto">Especialidad</div>
  <div id="monto">Correo</div>
</div>


<? 
while ($rw = mysql_fetch_array($sql))
{
?>
<div class="elemento">
  <div class="cliente1">
    
    <?  
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
	echo utf8_encode($nom." ".$rw['nombre']." ".$rw['a_paterno']." ".$rw['a_materno']); ?>
  </div>
  <div class="monto1" ><? 
  conectar(); 
  $sql2 = mysql_query("Select * From dr_esp where id_dr = ".$rw['id']."");

  
  while($rw2 = mysql_fetch_array($sql2))
  {
	    $sql_e = mysql_query("Select * from especialidad where id = ".$rw2['id_esp']."");
		$rw_e = mysql_fetch_array($sql_e);
	  echo utf8_encode($rw_e['nombre']);
	  ?>
      <br />
	  <?
  }desconectar();
  ?></div>
  <div class="monto1" ><? echo utf8_encode($rw['email']); ?></div>
  <div class="editar">
    
    <a href="#" onclick="abrir('galeria_mod.php?id=<? echo $rw['id']; ?>',0,0,0,0,0,1,1,540,540,300,200,1);"><img src="img/b_edit.png" alt="Editar" width="16" height="16" border="0" /></a>
    </div> 
    <div class="editar">
    <a href="#" onclick="abrir('galeria_view.php?id=<? echo $rw['id']; ?>',0,0,0,0,0,1,1,540,400,300,200,1);"><img src="img/ojo.jpg" alt="Ver" width="16" height="16" border="0" /></a>
    </div>

  <div class="editar">
  
    <a href="#" onclick="abrir('galeria_del.php?id=<? echo $rw['id']; ?>',0,0,0,0,0,1,1,540,400,300,200,1);"><img src="img/b_drop.png" width="16" height="16" alt="Eliminar" border="0" /></a>
   
  </div>
</div>

<? 

}
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
  <p><br /><br />
  </p>
    </div>
    <p>&nbsp;</p>
  </form>
</div>
</body>
</html>
