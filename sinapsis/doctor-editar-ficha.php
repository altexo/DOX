
<!-- include("librerias/conexion.php");-->
 
<?php require_once('../Connections/dox.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_medico = "-1";
if (isset($_GET['id'])) {
  $colname_medico = $_GET['id'];
}
mysql_select_db($database_dox, $dox);
$query_medico = sprintf("SELECT * FROM doctor WHERE id = %s", GetSQLValueString($colname_medico, "int"));
$medico = mysql_query($query_medico, $dox) or die(mysql_error());
$row_medico = mysql_fetch_assoc($medico);
$totalRows_medico = mysql_num_rows($medico);

$colname_clinica = "-1";
if (isset($_GET['id'])) {
  $colname_clinica = $_GET['id'];
}
mysql_select_db($database_dox, $dox);
$query_clinica = sprintf("SELECT * FROM clinica WHERE id_doctor = %s", GetSQLValueString($colname_clinica, "int"));
$clinica = mysql_query($query_clinica, $dox) or die(mysql_error());
$row_clinica = mysql_fetch_assoc($clinica);
$totalRows_clinica = mysql_num_rows($clinica);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DOX</title>


<link href="_css/sinapsis_novo.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script type="text/javascript" src="../tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">

tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
    editor_selector : "mceEditor",
    editor_deselector : "mceNoEditor",
	
      plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
      theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect,bullist,numlist",
      theme_advanced_buttons2 : "undo,redo,|,link,unlink,image,code,|,forecolor,backcolor,tablecontrols",
      theme_advanced_buttons3 : "sub,sup,|,fullscreen,attribs,outdent,indent,|,hr,visualaid",
    
      theme_advanced_toolbar_location : "external",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      theme_advanced_resizing : false
});
</script>

<style type="text/css">
<!--
p {
	margin-top: 10px;
	margin-right: 5px;
	margin-bottom: 5px;
	margin-left: 5px;
}
fieldset {
	font-family:Eurostyle;;
	font-size: 15px;
	border-color:#666;
	width:550px; 
	margin-left:10px;
	color:#999;
}
label {
	display: block;
	width: 150px;
	float: left;
}


-->


.test3 {
	font-family:Eurostyle;
	font-size: 20px;
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

@font-face
{
	font-family:Eurostyle;
	src:url('../fuentes/Eurostile.eot');
	

}
@font-face
{
	font-family:Eurostyle;
	src:url('../fuentes/Eurostile.ttf');
	
	
}
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>



<div id="encabezado"><img src="_assets/logo.png" width="200" height="73" /></div>
<div id="menu">
  <p>Seleccione una opción</p>
  <a href="doctor.php" class="navi">Médicos</a><a href="seguros.php" class="navi">Seguros Médicos</a>
  <p style="clear:both">&nbsp;</p>
</div>
<div id="contenido">
  
	
	<h1>Médicos  </h1>
  <p>&nbsp; </p>
  
 
  <!--EMPIEZAN ELEMENTOS DE MEDICOS-->
  <div id="envoltura">



   
    <div class="envoltura2">
    <form action="update_ficha.php" method="post" enctype="multipart/form-data" name="form1" target="imagen" id="form1" >
      <p><span class="test3" style="font-weight:bold; margin-bottom:20px; color:#004A8F;">EDITAR DOCTOR</span><br />
      </p>
      <fieldset style="float:left;">
        <legend style="color:#4F91CD;"><strong>Datos Doctor</strong></legend>
      <p>
        <label>Título: </label>
        <select name="titulo" id="titulo">
          <option value="1" selected="selected">Dr</option>
          <option value="2">Dra</option>
          <option value="3">Psic</option>
          <option value="4">Sr</option>
          <option value="5">Sra</option>
          <option value="6">Srita</option>
          <option value="7">MC</option>
          <option value="8">Lic</option>
          <option value="9">Ing</option>
        </select>
      </p>
      <p>
        <label>Nombre(s): </label>
        <input name="nombre" type="text" id="nombre" value="<?php echo utf8_encode($row_medico['nombre']); ?>" size="40" />
      </p>
      <p>
        <label>Apellido Paterno:</label>
        <span id="sprytextfield2">
          <input name="a_paterno" type="text" id="a_paterno" value="<?php echo utf8_encode($row_medico['a_paterno']); ?>" size="40" />
          <span class="textfieldRequiredMsg">Obligatorio</span></span></p>
      <p>
        <label>Apellido Materno: </label>
        <input name="a_materno" type="text" id="a_materno" value="<?php echo utf8_encode($row_medico['a_materno']); ?>" size="40" />
      </p>
      <p>
        <label>Fecha de Nacimiento:</label>
        <input name="nacimiento" type="text" id="nacimiento" value="<?php echo $row_medico['fecha_nacimiento']; ?>" />
      </p>
      <p>
        <label>Cédula Profesional:</label>
        <input name="cedula" type="text" id="cedula" value="<?php echo $row_medico['cedula']; ?>" />
      </p>
      <p>
        <label>Cédula Especialidad:</label>
        <textarea class="mceEditor" name="cedula_esp" cols="30" rows="2" id="cedula_esp"><?php echo utf8_encode($row_medico['cedula_esp']); ?></textarea>
      </p>
      <p>
        <label>Teléfono:</label>
        <input name="telefono" type="text" id="telefono" value="<?php echo $row_medico['telefono']; ?>" />
      </p>
      <p>
        <label>Celular:</label>
        <input name="celular" type="text" id="celular" value="<?php echo $row_medico['celular']; ?>" />
      </p>
      <p>
        <label>Nextel:</label>
        <input name="nextel" type="text" id="nextel" value="<?php echo $row_medico['nextel']; ?>" />
      </p>
      <p>
        <label>Email:</label>
       
         <?php echo $row_medico['email']; ?>&nbsp;<input name="email" id="email" type="hidden" value="<? echo $row_medico['email']; ?>" />
         </p>
      
      <p>
        <label>Contraseña:</label>
       
        <input type="text" name="pass" id="pass" value="<?php echo $row_medico['pass']; ?>" />  &nbsp;
          </p>
      <!--   <p>
     <label>Foto:</label>
    
     <input type="file" name="foto" id="foto" />
   </p>-->
      <p>
        <label style="color:#4F91CD;"><img src="../visual/0.png" width="40" height="40" /><strong><span style="margin-bottom:10px;">Educación:</span></strong></label>
        </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>
        <textarea class="mceEditor" name="educacion" cols="50" rows="3" id="educacion"><?php echo utf8_encode($row_medico['educacion']); ?></textarea>
      </p>
      <p>
        <label style="color:#4F91CD"><img src="../visual/2.png" width="40" height="40" /><strong>Idiomas:</strong></label>
        </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>
        <textarea class="mceEditor" name="idiomas" cols="50" id="idiomas"><?php echo utf8_encode($row_medico['idiomas']); ?></textarea>
      </p>
      <p>
        <label style="color:#4F91CD; width:200px;"><img src="../visual/1.png" width="40" height="40" /><strong>Certificaciones:</strong></label>
        </p>
      <p>&nbsp;        </p>
      <p>&nbsp;</p>
      <p>
        <textarea class="mceEditor" name="certificaciones" cols="50" rows="2" id="certificaciones"><?php echo utf8_encode($row_medico['certificaciones']); ?></textarea>
      </p>
      <p>
        <label style="color:#4F91CD;"><strong>Tarjetas Aceptadas:</strong></label>
        </p>
      <p>&nbsp;</p>
      <table width="540" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="113">
          <?php  $tar = explode(",", $row_medico['tarjetas']); ?>
          <input type="checkbox" name="visa" value="1" id="visa" <?php if($tar[0] == 1) { ?> checked="checked" <?php } ?> />
            Visa <img src="../visual/visa.png" width="37" height="27" /></td>
          <td width="166"><input type="checkbox" name="mastercard" value="1" id="mastercard" <?php if($tar[1] == 1) { ?> checked="checked" <?php } ?> />
            Master Card <img src="../visual/master.png" width="37" height="27" /></td>
          <td width="261"><input type="checkbox" name="american" value="1" id="american" <?php if($tar[2] == 1) { ?> checked="checked" <?php } ?> />
            American Express <img src="../visual/american.png" width="37" height="27" /></td>
          </tr>
        </table>
      <p><br />
        </p>
      <p>
        <label style="color:#4F91CD;"><strong>Seguros Aceptados:</strong></label>
        </p>
      <p>&nbsp;</p>
      <table width="550" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="151"><?php $seg = explode(",", $row_medico['seguros']); ?><input type="checkbox" name="s1" value="1" id="s1" <?php if($seg[0] == 1||$seg[1] == 1||$seg[2] == 1||$seg[3] == 1||$seg[4] == 1||$seg[5] == 1||$seg[6] == 1||$seg[7] == 1) { ?> checked="checked" <?php } ?> />
            Mapfre-Tepeyac</td>
          <td width="117"><input type="checkbox" name="s2" value="2" id="s2" <?php if($seg[0] == 2||$seg[1] == 2||$seg[2] == 2||$seg[3] == 2||$seg[4] == 2||$seg[5] == 2||$seg[6] == 2||$seg[7] == 2) { ?> checked="checked" <?php } ?> />
            GNP</td>
          <td width="282"><input type="checkbox" name="s3" value="3" id="s3" <?php if($seg[0] == 3||$seg[1] == 3||$seg[2] == 3||$seg[3] == 3||$seg[4] == 3||$seg[5] == 3||$seg[6] == 3||$seg[7] == 3) { ?> checked="checked" <?php } ?> />
            Allianz</td>
          </tr>
        <tr>
          <td height="22"><input type="checkbox" name="s4" value="4" id="s4" <?php if($seg[0] == 4||$seg[1] == 4||$seg[2] == 4||$seg[3] == 4||$seg[4] == 4||$seg[5] == 4||$seg[6] == 4||$seg[7] == 4) { ?> checked="checked" <?php } ?> />
            AXA</td>
          <td><input type="checkbox" name="s5" value="5" id="s5" <?php if($seg[0] == 5||$seg[1] == 5||$seg[2] == 5||$seg[3] == 5||$seg[4] == 5||$seg[5] == 5||$seg[6] == 5||$seg[7] == 5) { ?> checked="checked" <?php } ?> />
            Met Life</td>
          <td><input type="checkbox" name="s6" value="6" id="s6" <?php if($seg[0] == 64||$seg[1] == 6||$seg[2] == 6||$seg[3] == 6||$seg[4] == 6||$seg[5] == 6||$seg[6] == 6||$seg[7] == 6) { ?> checked="checked" <?php } ?> />
            Seguros Monterrey New York Life</td>
          </tr>
        </table>
      <p>Publicar
        <input type="checkbox" name="publicar" id="publicar" <?php if($row_medico['publicar']==1) {?> checked="checked" <?php } ?> value="1" />
        </p>
  </fieldset>
    <fieldset style="float:left;">
  <legend style="color:#4F91CD;"><strong>Datos Clínica</strong></legend>
  <p>
    <label>Nombre: </label>
    <input name="nombre_c" type="text" id="nombre_c" value="<?php echo utf8_encode($row_clinica['nombre']); ?>" size="40" />
  </p>
  <p>
    <label>Calle:</label>
    <span id="sprytextfield">
      <input name="calle" type="text" id="calle" value="<?php echo utf8_encode($row_clinica['calle']); ?>" size="40" />
      <span class="textfieldRequiredMsg">Obligatorio</span></span></p>
  <p>
    <label>Número Ext: </label>
    <input name="numero" type="text" id="numero" value="<?php echo $row_clinica['numero']; ?>" size="15" />
  </p>
  <p>
    <label>Número Int: </label>
    <input name="numeroint" type="text" id="numeroint" value="<?php echo $row_clinica['numeroint']; ?>" size="15" />
  </p>
  <p>
    <label>Colonia:</label>
    <input name="colonia" type="text" id="colonia" value="<?php echo utf8_encode($row_clinica['colonia']); ?>" />
  </p>
  <p>
    <label>Teléfono:</label>
    <input name="telefono_c" type="text" id="telefono_c" value="<?php echo $row_clinica['telefono']; ?>" />
  </p>






	

	

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
     <script>
     	window.onload = function(){
     	mapa();	
      document.getElementById("localizador").addEventListener("click",direccion_input,false);
     }
     var geocoder;
      var map;  
     	function mapa(){
     		
     		 var latlng = new google.maps.LatLng(<?php echo $row_clinica['latitud']; ?>,<?php echo $row_clinica['longitud']; ?>);
			   geocoder = new google.maps.Geocoder();

			 	var myOptions = {
      zoom: 15,
      center: latlng,
      backgroundColor:'#dcdcdc',
      mapTypeId: google.maps.MapTypeId.ROADMAP
      };
   map = new google.maps.Map(document.getElementById("mapa"), myOptions);
	
	var marcador = new google.maps.Marker({
      position: latlng,
      map: map,
      draggable:true,
	  title:"Te Esperamos"
  });

         
    google.maps.event.addListener(map,'dblclick',function(event){cambiarPosicion(event.latLng.lat(),event.latLng.lng(),event.latLng);});       
    google.maps.event.addListener(marcador,'dragend',function(event){cambiarPosicion(event.latLng.lat(),event.latLng.lng(),event.latLng);});
   
       function cambiarPosicion(latitud,longitud,posicion){
       	
       	marcador.position = posicion;
       	document.getElementById("latitud").value= latitud;
		document.getElementById("longitud").value= longitud;       	

       }
}


       function direccion_input(e){
   
      var direccion = document.getElementById("direccion").value;
        if (geocoder) {
      geocoder.geocode( { 'address': direccion}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
        //document.getElementById("coordenadas").innerHTML = results[0].geometry.location;
        } else {
          alert("La búsqueda no puede ser mostrada por: " + status);
        }
      });
    }


    
  }

 

  
     </script>



  
	<div id="contenedor" style="text-align:left; margin-top:20px;">


	<div id="mapa" style="left:0px; width:250px; height:250px; float:left; margin-bottom:20px;"></div>
	<div style="float:right; width:250px; height:250px;">
	  <p>Para ubicar el marcador en su domicilio puede arrastrarlo hasta la dirección, o bien ubicar el punto y hacer doble clic para posicionarlo en el lugar deseado.</p>
	  <p>&nbsp;</p>
	  <p>Para buscar una dirección se recomienda poner colonia y ciudad. </p>
	</div>
  <br><br><div style="clear:both;"> </div>

  <input type="text" name="adress" id="direccion"> <button id="localizador">Localizar</button>
	<div id="coordenadas"></div>

	<br>
	</div>
    <p>
    <label>Latitud:&nbsp;</label>
    <input name="latitud" type="text" id="latitud" value="<?php echo $row_clinica['latitud']; ?>"  />
  </p>
  <p>
    <label>Longitud:&nbsp;</label>
    <input name="longitud" type="text" id="longitud" value="<?php echo $row_clinica['longitud']; ?>"  />
  </p>
  <p>
    <label>Ciudad:</label>
    <? 
		$sql = mysql_query("Select * From ciudad order by id");
	?>
    <select name="ciudad" id="ciudad">
      <? while($row=mysql_fetch_array($sql)){ ?>
      <option value="<? echo utf8_encode($row['id']); ?>"><? echo utf8_encode($row['nombre']); ?></option>
      <? } 
	
	 ?>
    </select>
    </p>
  <p>&nbsp;</p>
  <p>
    <label style="color:#4F91CD;"><strong>Especialidad(es):</strong></label>
    </p>

  <p>
  <?php $esp = explode(",", $row_clinica['especialidad']); ?>
  
 </p>
  <table width="540" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="203" height="28"><input type="checkbox" name="1" id="1" value="1" <?php if($esp[0] == 1||$esp[1] == 1||$esp[2] == 1||$esp[3] == 1||$esp[4] == 1||$esp[5] == 1||$esp[6] == 1||$esp[7] == 1) { ?> checked="checked" <?php } ?> />
        Alergología</td>
      <td width="153"><input type="checkbox" name="2" id="2" value="2" <?php if($esp[0] == 2||$esp[1] == 2||$esp[2] == 2||$esp[3] == 2||$esp[4] == 2||$esp[5] == 2||$esp[6] == 2||$esp[7] == 2) { ?> checked="checked" <?php } ?> />
        Anestesiología</td>
      <td width="134"><input type="checkbox" name="3" id="3" value="3" <?php if($esp[0] == 3||$esp[1] == 3||$esp[2] == 3||$esp[3] == 3||$esp[4] == 3||$esp[5] == 3||$esp[6] == 3||$esp[7] == 3) { ?> checked="checked" <?php } ?> />
        Angiología</td>
    </tr>
    <tr>
      <td height="27"><input type="checkbox" name="4" id="4" value="4" <?php if($esp[0] == 4||$esp[1] == 4||$esp[2] == 4||$esp[3] == 4||$esp[4] == 4||$esp[5] == 4||$esp[6] == 4||$esp[7] == 4) { ?> checked="checked" <?php } ?> />
        Biología de la reproducción</td>
      <td><input type="checkbox" name="5" id="5" value="5" <?php if($esp[0] == 5||$esp[1] == 5||$esp[2] == 5||$esp[3] == 5||$esp[4] == 5||$esp[5] == 5||$esp[6] == 5||$esp[7] == 5) { ?> checked="checked" <?php } ?> />
        Cardiología</td>
      <td><input type="checkbox" name="6" id="6" value="6" <?php if($esp[0] == 6||$esp[1] == 6||$esp[2] == 6||$esp[3] == 6||$esp[4] == 6||$esp[5] == 6||$esp[6] == 6||$esp[7] == 6) { ?> checked="checked" <?php } ?> />
        Cirugía Bariátrica</td>
    </tr>
    <tr>
      <td height="26"><input type="checkbox" name="7" id="7" value="7" <?php if($esp[0] == 7||$esp[1] == 7||$esp[2] == 7||$esp[3] == 7||$esp[4] == 7||$esp[5] == 7||$esp[6] == 7||$esp[7] == 7) { ?> checked="checked" <?php } ?> />
        Cirugía General</td>
      <td><input type="checkbox" name="8" id="8" value="8"  <?php if($esp[0] == 8||$esp[1] == 8||$esp[2] == 8||$esp[3] == 8||$esp[4] == 8||$esp[5] == 8||$esp[6] == 8||$esp[7] == 8) { ?> checked="checked" <?php } ?> />
        Cirugía Maxilofacial</td>
      <td><input type="checkbox" name="9" id="9" value="9" <?php if($esp[0] == 9||$esp[1] == 9||$esp[2] == 9||$esp[3] == 9||$esp[4] == 9||$esp[5] == 9||$esp[6] == 9||$esp[7] == 9) { ?> checked="checked" <?php } ?> />
        Cirugía Plástica</td>
    </tr>
    <tr>
      <td height="22"><input type="checkbox" name="10" id="10" value="10" <?php if($esp[0] == 10||$esp[1] == 10||$esp[2] == 10||$esp[3] == 10||$esp[4] == 10||$esp[5] == 10||$esp[6] == 10||$esp[7] == 10) { ?> checked="checked" <?php } ?> />
        Coloproctología</td>
      <td><input type="checkbox" name="11" id="11" value="11" <?php if($esp[0] == 11||$esp[1] == 11||$esp[2] == 11||$esp[3] == 11||$esp[4] == 11||$esp[5] == 11||$esp[6] == 11||$esp[7] == 11) { ?> checked="checked" <?php } ?> />
        Dermatología</td>
      <td><input type="checkbox" name="12" id="12" value="12" <?php if($esp[0] == 12||$esp[1] == 12||$esp[2] == 12||$esp[3] == 12||$esp[4] == 12||$esp[5] == 12||$esp[6] == 12||$esp[7] == 12) { ?> checked="checked" <?php } ?> />
        Endocrinología</td>
    </tr>
    <tr>
      <td height="27"><input type="checkbox" name="13" id="13" value="13" <?php if($esp[0] == 13||$esp[1] == 13||$esp[2] == 13||$esp[3] == 13||$esp[4] == 13||$esp[5] == 13||$esp[6] == 13||$esp[7] == 13) { ?> checked="checked" <?php } ?> />
        Gastroenterología-Endoscopía</td>
      <td><input type="checkbox" name="14" id="14" value="14" <?php if($esp[0] == 14||$esp[1] == 14||$esp[2] == 14||$esp[3] == 14||$esp[4] == 14||$esp[5] == 14||$esp[6] == 14||$esp[7] == 14) { ?> checked="checked" <?php } ?> />
        Genética</td>
      <td><input type="checkbox" name="15" id="15" value="15" <?php if($esp[0] == 15||$esp[1] == 15||$esp[2] == 15||$esp[3] == 15||$esp[4] == 15||$esp[5] == 15||$esp[6] == 15||$esp[7] == 15) { ?> checked="checked" <?php } ?> />
        Geriatría</td>
    </tr>
    <tr>
      <td height="26"><input type="checkbox" name="16" id="16" value="16" <?php if($esp[0] == 16||$esp[1] == 16||$esp[2] == 16||$esp[3] == 16||$esp[4] == 16||$esp[5] == 16||$esp[6] == 16||$esp[7] == 16) { ?> checked="checked" <?php } ?> />
        Ginecología - Obstetricia</td>
      <td><input type="checkbox" name="17" id="17" value="17" <?php if($esp[0] == 17||$esp[1] == 17||$esp[2] == 17||$esp[3] == 17||$esp[4] == 17||$esp[5] == 17||$esp[6] == 17||$esp[7] == 17) { ?> checked="checked" <?php } ?> />
        Hematología</td>
      <td><input type="checkbox" name="18" id="18" value="18" <?php if($esp[0] == 18||$esp[1] == 18||$esp[2] == 18||$esp[3] == 18||$esp[4] == 18||$esp[5] == 18||$esp[6] == 18||$esp[7] == 18) { ?> checked="checked" <?php } ?> />
        Infectología</td>
    </tr>
    <tr>
      <td height="27"><input type="checkbox" name="19" id="19" value="19" <?php if($esp[0] == 19||$esp[1] == 19||$esp[2] == 19||$esp[3] == 19||$esp[4] == 19||$esp[5] == 19||$esp[6] == 19||$esp[7] == 19) { ?> checked="checked" <?php } ?> />
        Medicina de Rehabilitación</td>
      <td><input type="checkbox" name="20" id="20" value="20" <?php if($esp[0] == 20||$esp[1] == 20||$esp[2] == 20||$esp[3] == 20||$esp[4] == 20||$esp[5] == 20||$esp[6] == 20||$esp[7] == 20) { ?> checked="checked" <?php } ?> />
        Medicina Interna</td>
      <td><input type="checkbox" name="21" id="21" value="21" <?php if($esp[0] == 21||$esp[1] == 21||$esp[2] == 21||$esp[3] == 21||$esp[4] == 21||$esp[5] == 21||$esp[6] == 21||$esp[7] == 21) { ?> checked="checked" <?php } ?> />
        Neumología</td>
    </tr>
    <tr>
      <td height="27"><input type="checkbox" name="22" id="22" value="22" <?php if($esp[0] == 22||$esp[1] == 22||$esp[2] == 22||$esp[3] == 22||$esp[4] == 22||$esp[5] == 22||$esp[6] == 22||$esp[7] == 22) { ?> checked="checked" <?php } ?> />
        Neurología - Neurocirugía</td>
      <td><input type="checkbox" name="23" id="23" value="23" <?php if($esp[0] == 23||$esp[1] == 23||$esp[2] == 23||$esp[3] == 23||$esp[4] == 23||$esp[5] == 23||$esp[6] == 23||$esp[7] == 23) { ?> checked="checked" <?php } ?> />
        Nutrición</td>
      <td><input type="checkbox" name="24" id="24" value="24" <?php if($esp[0] == 24||$esp[1] == 24||$esp[2] == 24||$esp[3] == 24||$esp[4] == 24||$esp[5] == 24||$esp[6] == 24||$esp[7] == 24) { ?> checked="checked" <?php } ?> />
        Pediatría</td>
    </tr>
    <tr>
      <td height="27"><input type="checkbox" name="26" id="26" value="26" <?php if($esp[0] == 26||$esp[1] == 26||$esp[2] == 26||$esp[3] == 26||$esp[4] == 26||$esp[5] == 26||$esp[6] == 26||$esp[7] == 26) { ?> checked="checked" <?php } ?> />
        Radiología y Ultrasonografista</td>
      <td><input type="checkbox" name="25" id="25" value="25" <?php if($esp[0] == 25||$esp[1] == 25||$esp[2] == 25||$esp[3] == 25||$esp[4] == 25||$esp[5] == 25||$esp[6] == 25||$esp[7] == 25) { ?> checked="checked" <?php } ?> />
        Psiquiatría-Psicología</td>
      <td><input type="checkbox" name="27" id="27" value="27" <?php if($esp[0] == 27||$esp[1] == 27||$esp[2] == 27||$esp[3] == 27||$esp[4] == 27||$esp[5] == 27||$esp[6] == 27||$esp[7] == 27) { ?> checked="checked" <?php } ?> />
        Reumatología</td>
    </tr>
    <tr>
      <td height="26"><input type="checkbox" name="29" id="29" value="29" <?php if($esp[0] == 29||$esp[1] == 29||$esp[2] == 29||$esp[3] == 29||$esp[4] == 29||$esp[5] == 29||$esp[6] == 29||$esp[7] == 29) { ?> checked="checked" <?php } ?> />
        Traumatología y Ortopedia</td>
      <td><input type="checkbox" name="28" id="28" value="28" <?php if($esp[0] == 28||$esp[1] == 28||$esp[2] == 28||$esp[3] == 28||$esp[4] == 28||$esp[5] == 28||$esp[6] == 28||$esp[7] == 28) { ?> checked="checked" <?php } ?> />
        Sexología</td>
      <td><input type="checkbox" name="30" id="30" value="30" <?php if($esp[0] == 30||$esp[1] == 30||$esp[2] == 30||$esp[3] == 30||$esp[4] == 30||$esp[5] == 30||$esp[6] == 30||$esp[7] == 30) { ?> checked="checked" <?php } ?> />
        Urología</td>
    </tr>
    <tr>
      <td height="26"><input type="checkbox" name="31" id="31" value="31" <?php if($esp[0] == 31||$esp[1] == 31||$esp[2] == 31||$esp[3] == 31||$esp[4] == 31||$esp[5] == 31||$esp[6] == 31||$esp[7] == 31) { ?> checked="checked" <?php } ?> />
        Dentista </td>
      <td><input type="checkbox" name="34" id="34" value="34" <?php if($esp[0] == 34||$esp[1] == 34||$esp[2] == 34||$esp[3] == 34||$esp[4] == 34||$esp[5] == 34||$esp[6] == 34||$esp[7] == 34) { ?> checked="checked" <?php } ?> />
        Oftalmología</td>
      <td><input type="checkbox" name="37" id="37" value="37" <?php if($esp[0] == 37||$esp[1] == 37||$esp[2] == 37||$esp[3] == 37||$esp[4] == 37||$esp[5] == 37||$esp[6] == 37||$esp[7] == 37) { ?> checked="checked" <?php } ?> />
        Podología</td>
    </tr>
    <tr>
      <td height="26"><input type="checkbox" name="32" id="32" value="32" <?php if($esp[0] == 32||$esp[1] == 32||$esp[2] == 32||$esp[3] == 32||$esp[4] == 32||$esp[5] == 32||$esp[6] == 32||$esp[7] == 32) { ?> checked="checked" <?php } ?> />
        Odontopediatría</td>
      <td><input type="checkbox" name="35" id="35" value="35" <?php if($esp[0] == 35||$esp[1] == 35||$esp[2] == 35||$esp[3] == 35||$esp[4] == 35||$esp[5] == 35||$esp[6] == 35||$esp[7] == 35) { ?> checked="checked" <?php } ?> />
        Nefrología</td>
      <td><input type="checkbox" name="38" id="38" value="38" <?php if($esp[0] == 38||$esp[1] == 38||$esp[2] == 38||$esp[3] == 38||$esp[4] == 38||$esp[5] == 38||$esp[6] == 38||$esp[7] == 38) { ?> checked="checked" <?php } ?> />
        Medicina del sueño</td>
    </tr>
    <tr>
      <td height="26"><input type="checkbox" name="33" id="33" value="33" <?php if($esp[0] == 33||$esp[1] == 33||$esp[2] == 33||$esp[3] == 33||$esp[4] == 33||$esp[5] == 33||$esp[6] == 33||$esp[7] == 33) { ?> checked="checked" <?php } ?> />
        Otorrinolaringología</td>
      <td><input type="checkbox" name="36" id="36" value="36" <?php if($esp[0] == 36||$esp[1] == 36||$esp[2] == 36||$esp[3] == 36||$esp[4] == 36||$esp[5] == 36||$esp[6] == 36||$esp[7] == 36) { ?> checked="checked" <?php } ?> />
        Ortodoncia</td>
      <td><input type="checkbox" name="39" id="39" value="39" <?php if($esp[0] == 39||$esp[1] == 39||$esp[2] == 39||$esp[3] == 39||$esp[4] == 39||$esp[5] == 39||$esp[6] == 39||$esp[7] == 39) { ?> checked="checked" <?php } ?> />
        Medicina del deporte</td>
    </tr>
    </table>
  <p>&nbsp;</p>
  <p>
    <input type="submit" name="guardar" id="guardar" value="Actualizar datos" />
 </p>
 <p>
   <iframe name="imagen" allowtransparency="true" style="border:none"  width="300px" height="40px" id="imagen" scrolling="Auto"> </iframe>
</p>
</fieldset>
    <p>&nbsp;</p>
   <p>&nbsp;</p>
     <p>&nbsp;</p>
    <div style="clear:both;"></div>
      
    </form>
    </div>
        <div style="clear:both"></div>  
    
  </div>
      <!--TERMINAN ELEMENTOS DE MEDICOS-->
    <div style="clear:both"></div>
</div>
  
 
</div>
<br />
<br />
<br />

<div id="pie">Powered by Mente Interactiva's Sinapsis</div>

</body>
</html>
<?php
mysql_free_result($medico);

mysql_free_result($clinica);
?>
