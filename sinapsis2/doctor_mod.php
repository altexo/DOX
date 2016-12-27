<?
include("librerias/conexion.php");

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar Doctor</title>

<script type="text/javascript" src="../fecha_prueba/mootools.v1.11.js" ></script>
<script type="text/javascript" src="../fecha_prueba/DatePicker.js" ></script>
<script type="text/javascript">

// The following should be put in your external js file,
// with the rest of your ondomready actions.

window.addEvent('domready', function(){

	$$('input.DatePicker').each( function(el){
		new DatePicker(el);
	});

});


</script>
<style type="text/css">
<!--
.oblig {	color:#C00; 
	font-size:16px; 
	margin-left:5px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
-->
</style>
<style type="text/css">
<!--
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
	width:480px; 
	margin-left:10px;
}
label {
	display: block;
	width: 135px;
	float: left;
}
.oblig{
	color:#C00; 
	font-size:16px; 
	margin-left:5px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}

-->
.test {
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 15px;
	text-decoration: none;
	
}
.test2{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 15px;
	text-decoration: none;
	color:#000;
}
.test3 {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 13px;
	text-decoration: none;
	
}
a{
	text-decoration:none;
	color:#000;
}
a:hover
{
	color:#C00;
}
</style>
<style type="text/css">



input.DatePicker{
	display: block;
	width: 60px;
	padding: 3px 3px 3px 24px;
	border: 1px solid #0070bf;
	font-size: 10px;
	background: #fff url(../fecha_prueba/date.gif) no-repeat top left;
	cursor: pointer;
}
input:focus.DatePicker{
	background: #fffce9 url(../fecha_prueba/datefocus.gif) no-repeat top left;
}
.dp_container{
	position:  absolute;
	padding: 0;
	z-index: 500;
}
.dp_cal{
	background-color: #fff;
	border: 1px solid #0070bf;
	position: absolute;
	width: 177px;
	top: 24px;
	left: 0;
	margin: 0px 0px 3px 0px;
}
.dp_cal table{
	width: 100%;
	border-collapse: collapse;
	border-spacing: 0;
}
.dp_cal select{
	margin: 2px 3px;
	font-size: 11px;
}
.dp_cal select option{
	padding: 1px 3px;
}
.dp_cal th,
.dp_cal td{
	width: 14.2857%;
	text-align: center;
	font-size: 11px;
	padding: 2px 0;
}
.dp_cal th{
	border: solid #aad4f2;
	border-width: 1px 0;
	color: #797774;
	background: #daf2e6;
	font-weight: bold;
}
.dp_cal td{
	cursor: pointer;
}
.dp_cal thead th{
	background: #d9eefc;
}
.dp_cal td.dp_roll{
	color: #000;
	background: #fff6bf;
}
 
.dp_hide{
	visibility: hidden;
}
.dp_empty{
	background: #eee;
}
.dp_today{
	background: #daf2e6;
}
.dp_selected{
	color: #fff;
	background: #328dcf;
}



</style>




		<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>


<body>
<p><span class="test3" style="font-weight:bold; margin-left:10px; margin-bottom:10px">MODIFICAR DOCTOR</span></p>
<form action="update_doc.php" method="post" enctype="multipart/form-data" name="form1" target="imagen" id="form1" >
<? 
$id = $_GET['id'];
conectar();
$sql_d = mysql_query("Select * from doctor where id = ".$id."");
$row_d = mysql_fetch_array($sql_d);

$sql_c = mysql_query("Select * from clinica where id_doctor = ".$id."");
$row_c = mysql_fetch_array($sql_c);

$sql_e = mysql_query("Select * from dr_esp where id_dr = ".$id."");
$row_e = mysql_fetch_array($sql_e);

desconectar();
?>
<fieldset style="float:left;">
  <legend><strong>Datos Doctor</strong> </legend>
  <p>
    <label>Título: </label>
    <select name="titulo" id="titulo">
     <?			conectar();
	  	$sql4 = mysql_query("select * from doctor where id = '".$id."'");
	  	desconectar();
	  	$row4 = mysql_fetch_array($sql4);
		$val = $row4['titulo'];
		
		

			for($i = 1; $i <= 9; $i++)
			{
				switch($i)
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
				if($i != $val)
					echo "<option value='".$i."'>".$nom."</option>";
				else
					echo "<option value='".$row4['titulo']."' selected='selected'>".$nom."</option>";
					
			}
			  
			  ?>
    </select>
    <input type="hidden" name="id_h" id="id_h" value="<? echo $id; ?>" />
  </p>
  <p>
    <label>Especialidad: </label>
 
   
    <select name="especialidad" id="especialidad">
     <?			conectar();
	  	$sql4 = mysql_query("select * from especialidad where id = '".$row_e['id_esp']."'");
	  	desconectar();
	  	$row4 = mysql_fetch_array($sql4);
		$val = $row4['id'];
		
		

			for($i = 1; $i <= 30; $i++)
			{
				switch($i)
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
					case 13: $nom = "Gastroenterología-Endoscopía"; break;
					
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
					case 26: $nom = "Radiología y Ultrasonografista 	"; break;
					case 27: $nom = "Reumatología"; break;
					case 28: $nom = "Sexología"; break;
					case 29: $nom = "Traumatología y Ortopedia"; break;
					case 30: $nom = "Urología"; break;
				}
				if($i != $val)
					echo "<option value='".$i."'>".$nom."</option>";
				else
					echo "<option value='".$row4['id']."' selected='selected'>".$nom."</option>";
					
			}
			  
			  ?>
    </select>
  Agregar</p>
  <p>
    <label>Nombre: </label>
    <input name="nombre" type="text" id="nombre" size="40" value="<? echo utf8_encode($row_d['nombre']); ?>" />
  </p>
  <p>
    <label>Apellido Paterno:</label>
    <span id="sprytextfield2">
    <input name="a_paterno" type="text" id="a_paterno" size="40" value="<? echo utf8_encode($row_d['a_paterno']); ?>" />
    <span class="textfieldRequiredMsg">Obligatorio</span></span></p>
  <p>
    <label>Apellido Materno: </label>
    <input name="a_materno" type="text" id="a_materno" size="40" value="<? echo utf8_encode($row_d['a_materno']); ?>" />
  </p>
  <p>
  
    <label>Fecha de Nacimiento:</label> <?php $date=$row_d['fecha_nacimiento']; // dato de prueba
	$tDate = explode("-",$date); 
	$dateToMySQL = $tDate[1]."/".$tDate[2]."/".$tDate[0];
	
	
	?>
    <input id="fecha" name="fecha" type="text" class="DatePicker" tabindex="1" value="<? echo $dateToMySQL; ?>" />
  </p>
  <p>
    <label>Ciudad:</label>
     <select name="ciudad" id="ciudad">
     <?			conectar();
	  	$sql4 = mysql_query("select * from doctor where id = '".$id."'");
	  	desconectar();
	  	$row4 = mysql_fetch_array($sql4);
		$val = $row4['id_ciudad'];
		
		

			for($i = 1; $i <= 13; $i++)
			{
				switch($i)
				{
					
					case 1: $nom = "Hermosillo"; break;
					case 2: $nom = "Tijuana"; break;
					case 3: $nom = "La Paz"; break;
					
					case 4: $nom = "Los Mochis"; break;
					case 5: $nom = "Culiacán"; break;
					case 6: $nom = "Mazatlán"; break;
					case 7: $nom = "Tepic"; break;
					case 8: $nom = "Guadalajara"; break;
					case 9: $nom = "DF"; break;
					case 10: $nom = "Monterrey"; break;
					case 11: $nom = "Chihuahua"; break;
					case 12: $nom = "Torreón"; break;
					case 13: $nom = "León"; break;
					
				}
				if($i != $val)
					echo "<option value='".$i."'>".$nom."</option>";
				else
					echo "<option value='".$row4['id_ciudad']."' selected='selected'>".$nom."</option>";
					
			}
			  
			  ?>
    </select>
  </p>
  <p>
    <label>Teléfono:</label>
    
    <input type="text" name="telefono" id="telefono" value="<? echo $row_d['telefono']; ?>" />
  </p>

   <p>
    <label>Celular:</label>
     
       <input type="text" name="celular" id="celular" value="<? echo $row_d['celular']; ?>" />
    </p>   <p>
     <label>Nextel:</label>
     
     <input type="text" name="nextel" id="nextel" value="<? echo $row_d['nextel']; ?>" />
   </p>
   <p>
     <label>Email:</label>
     <input type="text" name="email" id="email" value="<? echo $row_d['email']; ?>" />
   </p>
<!--   <p>
     <label>Foto:</label>
    
     <input type="file" name="foto" id="foto" />
   </p>-->
   <p>
     <label>Presentación:</label>
</p>
<textarea name="presentacion" cols="50" rows="2" id="presentacion"><? echo utf8_encode($row_d['presentacion']); ?></textarea>
<p>
  <label>Idiomas:</label>
  <textarea name="idiomas" cols="50" id="idiomas"><? echo utf8_encode($row_d['idiomas']); ?></textarea>
</p>
<p>
  <label>Descripción:</label>
</p>
<p>
  <textarea name="descripcion" cols="50" rows="2" id="descripcion"><? echo utf8_encode($row_d['descripcion']); ?></textarea><br />
</p>
</fieldset>
<fieldset style="float:left;">
  <legend><strong>Datos Clínica</strong></legend>
  <p>
    <label>Nombre: </label>
    <input name="nombre_c" type="text" id="nombre_c" size="40" value="<? echo utf8_encode($row_c['nombre']); ?>" />
  </p>
  <p>
    <label>Calle:</label>
    <span id="sprytextfield">
      <input name="calle" type="text" id="calle" size="40"  value="<? echo utf8_encode($row_c['calle']); ?>" />
      <span class="textfieldRequiredMsg">Obligatorio</span></span></p>
  <p>
    <label>Número: </label>
    <input name="numero" type="text" id="numero" size="15" value="<? echo $row_c['numero']; ?>" />
  </p>
   <p>
    <label>Número Int: </label>
    <input name="numeroint" type="text" id="numeroint" size="15" value="<? echo $row_c['numeroint']; ?>" />
  </p>
  <p>
    <label>Colonia:</label>
    <input type="text" name="colonia" id="colonia" value="<? echo utf8_encode($row_c['colonia']); ?>" />
  </p>
  <p>
    <label>Teléfono:</label>
    <input type="text" name="telefono_c" id="telefono_c" value="<? echo $row_c['telefono']; ?>" />
  </p>
  <p>
    <label>Latitud:&nbsp;</label>
    <input type="text" name="latitud" id="latitud" value="<? echo $row_c['latitud']; ?>" />
  </p>
  <p>
    <label>Longitud:&nbsp;</label>
    <input type="text" name="longitud" id="longitud" value="<? echo $row_c['longitud']; ?>" />
  </p>
  <p>
    <label>Tarjetas Aceptadas:</label>
   <label> <input type="checkbox" name="visa" value="1" id="visa" <? if($row_c['visa'] == 1){ ?> checked="checked" <? } ?> />
  Visa</label></p>
  <br />
  <p>
    <label>&nbsp;
    </label>
    <label><input type="checkbox" name="mastercard" value="1" id="mastercard" <? if($row_c['mastercard'] == 1){ ?> checked="checked" <? } ?> />
    Master Card</label></p>
   <br />
  <p>
    <label>&nbsp;</label><input type="checkbox" name="american" value="1" id="american" <? if($row_c['american'] == 1){ ?> checked="checked" <? } ?> />
    American Express</p>
<p>
  <label>&nbsp;</label>
  <iframe name="imagen" allowtransparency="true" style="border:none"  width="300px" height="50px" id="imagen" scrolling="Auto"> </iframe>
</p>
  <p>
    <label>&nbsp;</label>
    <input type="submit" name="guardar" id="guardar" value="Actualizar Información" />
    <br />
  </p>
</fieldset>
</form>

</body>
</html>
<? //} ?>