<?
include("librerias/conexion.php");

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nuevo Doctor</title>

<!--<script type="text/javascript" src="../fecha_prueba/mootools.v1.11.js" ></script>
<script type="text/javascript" src="../fecha_prueba/DatePicker.js" ></script>-->
<script type="text/javascript" src="../tiny_mce/tiny_mce.js"></script>
<script src="../js/jquery-1.3.1.min.js" type="text/javascript" charset="utf-8"></script>
<!--<script type="text/javascript">

// The following should be put in your external js file,
// with the rest of your ondomready actions.

window.addEvent('domready', function(){

	$$('input.DatePicker').each( function(el){
		new DatePicker(el);
	});

});


</script>-->
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

function MM_openBrWindow(theURL,winName,features) { //v2.0



  window.open(theURL,winName,features);



}

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
<p><span class="test3" style="font-weight:bold; margin-left:10px; margin-bottom:10px">NUEVO DOCTOR</span></p>
<form action="insert_doc.php" method="post" enctype="multipart/form-data" name="form1" target="imagen" id="form1" >

<fieldset style="float:left;">
  <legend><strong>Datos Doctor</strong> </legend>
  <p>
    <label>Título: </label><select name="titulo" id="titulo">
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
    <label>Especialidad: </label>
    <? conectar(); 
		$sql = mysql_query("Select * From especialidad");
	?>
    <select name="especialidad" id="especialidad">
      <? while($row=mysql_fetch_array($sql)){ ?> 
      <option value="<? echo utf8_encode($row['id']); ?>"><? echo utf8_encode($row['nombre']); ?></option> <? } 
	 desconectar();
	 ?>
    </select>
  </p>
  <p>
    <label>Nombre(s): </label>
   
    <input name="nombre" type="text" id="nombre" size="40" />
    </p>
  <p>
    <label>Apellido Paterno:</label>
    <span id="sprytextfield2">
    <input name="a_paterno" type="text" id="a_paterno" size="40" />
    <span class="textfieldRequiredMsg">Obligatorio</span></span></p>
  <p>
    <label>Apellido Materno: </label>
    <input name="a_materno" type="text" id="a_materno" size="40" />
  </p>
  <p>
  
    <label>Fecha de Nacimiento:</label><? $fecha_ad = date("m/d/1990"); ?>
    <input id="fecha" name="fecha" type="text" class="DatePicker" tabindex="1" value="<? echo $fecha_ad; ?>" />
  </p>
  <p>
    <label>Ciudad:</label>
     <? conectar(); 
		$sql = mysql_query("Select * From ciudad");
	?>
    <select name="ciudad" id="ciudad">
     <? while($row=mysql_fetch_array($sql)){ ?> 
     <option value="<? echo utf8_encode($row['id']); ?>"><? echo utf8_encode($row['nombre']); ?></option> <? } 
	 desconectar();
	 ?>
    </select>
  </p>
  <p>
    <label>Teléfono:</label>
    
    <input type="text" name="telefono" id="telefono" />
  </p>

   <p>
    <label>Celular:</label>
     
       <input type="text" name="celular" id="celular" />
    </p>   <p>
     <label>Nextel:</label>
     
     <input type="text" name="nextel" id="nextel" />
   </p>
   <p>
     <label>Email:</label>
     <input type="text" name="email" id="email" />
   </p>
<!--   <p>
     <label>Foto:</label>
    
     <input type="file" name="foto" id="foto" />
   </p>-->
   <p>
     <label>Educación:</label>
</p>
<textarea class="mceEditor" name="presentacion" cols="50" rows="2" id="presentacion"></textarea>
<p>
  <label>Idiomas:</label>
  <textarea class="mceEditor" name="idiomas" cols="50" id="idiomas"></textarea>
</p>
<p>
  <label>Certificaciones:</label>
</p>
<p>
  <textarea class="mceEditor" name="descripcion" cols="50" rows="2" id="descripcion"></textarea>
</p>
</fieldset>
<fieldset style="float:left;">
  <legend><strong>Datos Clínica</strong></legend>
  <p>
    <label>Nombre: </label>
    <input name="nombre_c" type="text" id="nombre_c" size="40" />
  </p>
  <p>
    <label>Calle:</label>
    <span id="sprytextfield">
      <input name="calle" type="text" id="calle" size="40" />
      <span class="textfieldRequiredMsg">Obligatorio</span></span></p>
  <p>
    <label>Número Ext: </label>
    <input name="numero" type="text" id="numero" size="15" />
  </p>
  <p>
    <label>Número Int: </label>
    <input name="numeroint" type="text" id="numeroint" size="15" />
  </p>
  <p>
    <label>Colonia:</label>
    <input type="text" name="colonia" id="colonia" />
  </p>
  <p>
    <label>Teléfono:</label>
    <input type="text" name="telefono_c" id="telefono_c" />
  </p>
    <p>
    <label>Latitud:&nbsp;</label>
    <input type="text" name="latitud" id="latitud" />
  </p>
  <p>
    <label>Longitud:&nbsp;</label>
    <input type="text" name="longitud" id="longitud" />
  </p>
  <p>
    <label>Tarjetas Aceptadas:</label>
   <label> <input type="checkbox" name="visa" value="1" id="visa" />
  Visa</label></p>
  <br />
  <p>
    <label>&nbsp;
    </label>
    <label><input type="checkbox" name="mastercard" value="1" id="mastercard" />
    Master Card</label></p>
   <br />
  <p>
    <label>&nbsp;</label><input type="checkbox" name="american" value="1" id="american" />
    American Express</p>
  <br />

    <p>
    <label>Seguros Aceptadas:</label>
   <label> <input type="checkbox" name="s1" value="1" id="s1" />
     Mapfre-Tepeyac</label>
    </p>
  <br />
  <p>
    <label>&nbsp;
    </label>
    <label><input type="checkbox" name="s2" value="2" id="s2" />
      GNP</label>
  </p>
   <br />
 <p>
    <label>&nbsp;
    </label>
    <label><input type="checkbox" name="s3" value="3" id="s3" />
      Allianz</label>
  </p>
  <br />
 <p>
    <label>&nbsp;
    </label>
    <label><input type="checkbox" name="s4" value="4" id="s4" />
      AXA</label>
  </p>
  <br />
 <p>
    <label>&nbsp;
    </label>
    <label><input type="checkbox" name="s5" value="5" id="s5" />
      Met Life</label>
  </p>
  <br />
 <p>
    <label>&nbsp;
    </label>
    <label><input type="checkbox" name="s6" value="6" id="s6" />
      Seguros Monterrey New York Life</label>
  </p>
  <br />
 <p>&nbsp;</p>
 <p>
   <label>&nbsp;</label>
   <input type="submit" name="guardar" id="guardar" value="Guardar Información" />
 </p>
 <p>
   <label>&nbsp;</label>
   <iframe name="imagen" allowtransparency="true" style="border:none"  width="300px" height="40px" id="imagen" scrolling="Auto"> </iframe>
</p>
</fieldset>
</form>

</body>
</html>
<? //} ?>