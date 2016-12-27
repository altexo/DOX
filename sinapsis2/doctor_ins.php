<?
include("librerias/conexion.php");

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nuevo Doctor</title>


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



}

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
	border-color:#EEE;
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
	src:url('fuentes/Eurostile.eot');
	

}
@font-face
{
	font-family:Eurostyle;
	src:url('fuentes/Eurostile.ttf');
	
	
}
</style>




		<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>


<body>
<? 
function assign_rand_value($num)
{
// accepts 1 - 36
  switch($num)
  {
    case "1":
     $rand_value = "a";
    break;
    case "2":
     $rand_value = "b";
    break;
    case "3":
     $rand_value = "c";
    break;
    case "4":
     $rand_value = "d";
    break;
    case "5":
     $rand_value = "e";
    break;
    case "6":
     $rand_value = "f";
    break;
    case "7":
     $rand_value = "g";
    break;
    case "8":
     $rand_value = "h";
    break;
    case "9":
     $rand_value = "i";
    break;
    case "10":
     $rand_value = "j";
    break;
    case "11":
     $rand_value = "k";
    break;
    case "12":
     $rand_value = "l";
    break;
    case "13":
     $rand_value = "m";
    break;
    case "14":
     $rand_value = "n";
    break;
    case "15":
     $rand_value = "o";
    break;
    case "16":
     $rand_value = "p";
    break;
    case "17":
     $rand_value = "q";
    break;
    case "18":
     $rand_value = "r";
    break;
    case "19":
     $rand_value = "s";
    break;
    case "20":
     $rand_value = "t";
    break;
    case "21":
     $rand_value = "u";
    break;
    case "22":
     $rand_value = "v";
    break;
    case "23":
     $rand_value = "w";
    break;
    case "24":
     $rand_value = "x";
    break;
    case "25":
     $rand_value = "y";
    break;
    case "26":
     $rand_value = "z";
    break;
    case "27":
     $rand_value = "0";
    break;
    case "28":
     $rand_value = "1";
    break;
    case "29":
     $rand_value = "2";
    break;
    case "30":
     $rand_value = "3";
    break;
    case "31":
     $rand_value = "4";
    break;
    case "32":
     $rand_value = "5";
    break;
    case "33":
     $rand_value = "6";
    break;
    case "34":
     $rand_value = "7";
    break;
    case "35":
     $rand_value = "8";
    break;
    case "36":
     $rand_value = "9";
    break;
  }
return $rand_value;
}

function get_rand_id($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,36);
   $rand_id .= assign_rand_value($num);
   }
  }
return $rand_id;
}

?>
<p><span class="test3" style="font-weight:bold; margin-left:10px; margin-bottom:10px; color:#004A8F;">NUEVO DOCTOR</span></p>
<form action="insert_doc.php" method="post" enctype="multipart/form-data" name="form1" target="imagen" id="form1" >

<fieldset style="float:left;">
  <legend style="color:#4F91CD;"><strong>Datos Doctor</strong> </legend>
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
    <input id="fecha" name="fecha" type="text"  tabindex="1" value="<? echo $fecha_ad; ?>" />
  </p>
  
  <p>
    <label>Cédula Profesional:</label>
    <input type="text" name="cedula" id="cedula" />
  </p>
  <p>
    <label>Cédula Especialidad:</label>
    <textarea class="mceEditor" name="cedula_esp" cols="30" rows="2" id="cedula_esp"></textarea>
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
     <span id="sprytextfield1">
     <input type="text" name="email" id="email" />
     <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></p>
   <? $hola =  get_rand_id(10); ?>
   <p>
     <label>Contraseña:</label>
     <span id="sprytextfield3">
     <input type="text" name="pass" id="pass" value="<? echo $hola; ?>" />
     <span class="textfieldRequiredMsg">Campo Obligatorio.</span></span></p>
 
<!--   <p>
     <label>Foto:</label>
    
     <input type="file" name="foto" id="foto" />
   </p>-->
   <p>
     <label style="color:#4F91CD;"><img src="../../visual/0.png" width="40" height="40" /><strong><span style="margin-bottom:10px;">Educación:</span></strong></label>

<textarea class="mceEditor" name="educacion" cols="50" rows="2" id="educacion"></textarea></p>
<p>
  <label style="color:#4F91CD"><img src="../../visual/2.png" width="40" height="40" /><strong>Idiomas:</strong></label>
  <textarea class="mceEditor" name="idiomas" cols="50" id="idiomas"></textarea>
</p>
<p>
  <label style="color:#4F91CD; width:200px;"><img src="../../visual/1.png" width="40" height="40" /><strong>Certificaciones:</strong></label>
</p>
<p>
  <textarea class="mceEditor" name="certificaciones" cols="50" rows="2" id="certificaciones"></textarea>
</p>
<p>
  <label style="color:#4F91CD;"><strong>Tarjetas Aceptadas:</strong></label>
  </p>

<p>&nbsp;</p>
<table width="540" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="113"><input type="checkbox" name="visa" value="1" id="visa" />
      Visa <img src="../../visual/visa.png" width="37" height="27" /></td>
    <td width="166"><input type="checkbox" name="mastercard" value="1" id="mastercard" />
      Master Card <img src="../../visual/master.png" width="37" height="27" /></td>
    <td width="261"><input type="checkbox" name="american" value="1" id="american" />
      American Express <img src="../../visual/american.png" width="37" height="27" /></td>
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
    <td width="151"><input type="checkbox" name="s1" value="1" id="s1" />
      Mapfre-Tepeyac</td>
    <td width="117"><input type="checkbox" name="s2" value="2" id="s2" />
      GNP</td>
    <td width="282"><input type="checkbox" name="s3" value="3" id="s3" />
      Allianz</td>
  </tr>
  <tr>
    <td height="22"><input type="checkbox" name="s4" value="4" id="s4" />
      AXA</td>
    <td><input type="checkbox" name="s5" value="5" id="s5" />
      Met Life</td>
    <td><input type="checkbox" name="s6" value="6" id="s6"  />
      Seguros Monterrey New York Life</td>
  </tr>
</table>
<p>Publicar 
  <input type="checkbox" name="publicar" id="publicar" value="1" />
</p>
</fieldset>
<fieldset style="float:left;">
  <legend style="color:#4F91CD;"><strong>Datos Clínica</strong></legend>
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
     		
     		 var latlng = new google.maps.LatLng(24.818299282293847,-107.3738157749176);
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
    <input type="text" name="latitud" id="latitud" disabled="disabled" />
  </p>
  <p>
    <label>Longitud:&nbsp;</label>
    <input type="text" name="longitud" id="longitud" disabled="disabled" />
  </p>
  <p>
    <label>Ciudad:</label>
    <? conectar(); 
		$sql = mysql_query("Select * From ciudad");
	?>
    <select name="ciudad" id="ciudad">
      <? while($row=mysql_fetch_array($sql)){ ?>
      <option value="<? echo utf8_encode($row['id']); ?>"><? echo utf8_encode($row['nombre']); ?></option>
      <? } 
	 desconectar();
	 ?>
    </select>
    </p>
  <p>&nbsp;</p>
  <p>
    <label style="color:#4F91CD;"><strong>Especialidad(es):</strong></label>
    </p>

  <p>&nbsp;</p>
  <table width="540" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="203" height="28"><input type="checkbox" name="1" id="1" value="1" />
        Alergología</td>
      <td width="153"><input type="checkbox" name="2" id="2" value="2" />
        Anestesiología</td>
      <td width="134"><input type="checkbox" name="3" id="3" value="3" />
        Angiología</td>
    </tr>
    <tr>
      <td height="27"><input type="checkbox" name="4" id="4" value="4" />
        Biología de la reproducción</td>
      <td><input type="checkbox" name="5" id="5" value="5" />
        Cardiología</td>
      <td><input type="checkbox" name="6" id="6" value="6" />
        Cirugía Bariátrica</td>
    </tr>
    <tr>
      <td height="26"><input type="checkbox" name="7" id="7" value="7" />
        Cirugía General</td>
      <td><input type="checkbox" name="8" id="8" value="8" />
        Cirugía Maxilofacial</td>
      <td><input type="checkbox" name="9" id="9" value="9" />
        Cirugía Plástica</td>
    </tr>
    <tr>
      <td height="22"><input type="checkbox" name="10" id="10" value="10" />
        Coloproctología</td>
      <td><input type="checkbox" name="11" id="11" value="11" />
        Dermatología</td>
      <td><input type="checkbox" name="12" id="12" value="12" />
        Endocrinología</td>
    </tr>
    <tr>
      <td height="27"><input type="checkbox" name="13" id="13" value="13" />
        Gastroenterología-Endoscopía</td>
      <td><input type="checkbox" name="14" id="14" value="14" />
        Genética</td>
      <td><input type="checkbox" name="15" id="15" value="15" />
        Geriatría</td>
    </tr>
    <tr>
      <td height="26"><input type="checkbox" name="16" id="16" value="16" />
        Ginecología - Obstetricia</td>
      <td><input type="checkbox" name="17" id="17" value="17" />
        Hematología</td>
      <td><input type="checkbox" name="18" id="18" value="18" />
        Infectología</td>
    </tr>
    <tr>
      <td height="27"><input type="checkbox" name="19" id="19" value="19" />
        Medicina de Rehabilitación</td>
      <td><input type="checkbox" name="20" id="20" value="20" />
        Medicina Interna</td>
      <td><input type="checkbox" name="21" id="21" value="21" />
        Neumología</td>
    </tr>
    <tr>
      <td height="27"><input type="checkbox" name="22" id="22" value="22" />
        Neurología - Neurocirugía</td>
      <td><input type="checkbox" name="23" id="23" value="23" />
        Nutrición</td>
      <td><input type="checkbox" name="24" id="24" value="24" />
        Pediatría</td>
    </tr>
    <tr>
      <td height="27"><input type="checkbox" name="26" id="26" value="26" />
        Radiología y Ultrasonografista</td>
      <td><input type="checkbox" name="25" id="25" value="25" />
        Psiquiatría-Psicología</td>
      <td><input type="checkbox" name="27" id="27" value="27" />
        Reumatología</td>
    </tr>
    <tr>
      <td height="26"><input type="checkbox" name="29" id="29" value="29" />
        Traumatología y Ortopedia</td>
      <td><input type="checkbox" name="28" id="28" value="28" />
        Sexología</td>
      <td><input type="checkbox" name="30" id="30" value="30" />
        Urología</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>
    <input type="submit" name="guardar" id="guardar" value="Guardar Información" />
 </p>
 <p>
   <iframe name="imagen" allowtransparency="true" style="border:none"  width="300px" height="40px" id="imagen" scrolling="Auto"> </iframe>
</p>
</fieldset>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
//-->
</script>
</body>
</html>
<? //} ?>