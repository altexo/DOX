<? 
 include("librerias/conexion.php");
 
 $email = $_GET['email'];
 $pass = $_GET['pass'];
 
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
  
	
	<h1>Médicos </h1>
  <p><a href="#" id="bnuevo">Crear nuevo</a></p>
  <p>&nbsp; </p>
  
 
  <!--EMPIEZAN ELEMENTOS DE MEDICOS-->
  <div id="envoltura">

    <div id="cabeza">
     <div class="envoltura2">
      <div class="ficha1">Ficha completa Doctor</div>
     </div>
    </div>
   
    <div class="envoltura2">
    <form action="update_ficha.php" method="post" enctype="multipart/form-data" name="form1" target="imagen" id="form1" >
      <p><span class="test3" style="font-weight:bold;  margin-bottom:20px; color:#004A8F;">NUEVO DOCTOR</span><br />
      </p>
      <p>&nbsp;</p>
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
        <label>Fecha de Nacimiento:</label>
        <select name="dia" id="dia">
        <option value="01">1</option>
        <option value="02">2</option>
        <option value="03">3</option>
        <option value="04">4</option>
        <option value="05">5</option>
        <option value="06">6</option>
        <option value="07">7</option>
        <option value="08">8</option>
        <option value="09">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        </select>
        <select name="mes" id="mes">
        <option value="01">Enero</option>
        <option value="02">Febrero</option>
        <option value="03">Marzo</option>
        <option value="04">Abril</option>
        <option value="05">Mayo</option>
        <option value="06">Junio</option>
        <option value="07">Julio</option>
        <option value="08">Agosto</option>
        <option value="09">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
        </select>
        <select name="ano" id="ano">
        <option value="1922">1922</option>
        <option value="1923">1923</option>
        <option value="1924">1924</option>
        <option value="1925">1925</option>
        <option value="1926">1926</option>
        <option value="1927">1927</option>
        <option value="1928">1928</option>
        <option value="1929">1929</option>
        <option value="1930">1930</option>
        <option value="1931">1931</option>
        <option value="1932">1932</option>
        <option value="1933">1933</option>
        <option value="1934">1934</option>
        <option value="1935">1935</option>
        <option value="1936">1936</option>
        <option value="1937">1937</option>
        <option value="1938">1938</option>
        <option value="1939">1939</option>
        <option value="1940">1940</option>
        <option value="1941">1941</option>
        <option value="1942">1942</option>
        <option value="1943">1943</option>
        <option value="1944">1944</option>
        <option value="1945">1945</option>
        <option value="1946">1946</option>
        <option value="1947">1947</option>
        <option value="1948">1948</option>
        <option value="1949">1949</option>
        <option value="1950">1950</option>
        <option value="1951">1951</option>
        <option value="1952">1952</option>
        <option value="1953">1953</option>
        <option value="1954">1954</option>
        <option value="1955">1955</option>
        <option value="1956">1956</option>
        <option value="1957">1957</option>
        <option value="1958">1958</option>
        <option value="1959">1959</option>
        <option value="1960">1960</option>
        <option value="1961">1961</option>
        <option value="1962">1962</option>
        <option value="1963">1963</option>
        <option value="1964">1964</option>
        <option value="1965" selected="selected">1965</option>
        <option value="1966">1966</option>
        <option value="1967">1967</option>
        <option value="1968">1968</option>
        <option value="1969">1969</option>
        <option value="1970">1970</option>
        <option value="1971">1971</option>
        <option value="1972">1972</option>
        <option value="1973">1973</option>
        <option value="1974">1974</option>
        <option value="1975">1975</option>
        <option value="1976">1976</option>
        <option value="1977">1977</option>
        <option value="1978">1978</option>
        <option value="1979">1979</option>
        <option value="1980">1980</option>
        <option value="1981">1981</option>
        <option value="1982">1982</option>
        <option value="1983">1983</option>
        <option value="1984">1984</option>
        <option value="1985">1985</option>
        <option value="1986">1986</option>
        <option value="1987">1987</option>
        <option value="1988">1988</option>
        <option value="1989">1989</option>
        <option value="1990">1990</option>
        </select>
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
      </p>
      <p>
        <label>Nextel:</label>
        <input type="text" name="nextel" id="nextel" />
      </p>
      <p>
        <label>Email:</label>
       
          <? echo $email; ?>&nbsp;<input name="email" id="email" type="hidden" value="<? echo $email; ?>" />
         </p>
      
      <p>
        <label>Contraseña:</label>
       
        <input type="text" name="pass" id="pass" value="<? echo $pass; ?>" />  &nbsp;
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
        <textarea class="mceEditor" name="educacion" cols="50" rows="2" id="educacion"></textarea>
      </p>
      <p>
        <label style="color:#4F91CD"><img src="../visual/2.png" width="40" height="40" /><strong>Idiomas:</strong></label>
        </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>
        <textarea class="mceEditor" name="idiomas" cols="50" id="idiomas"></textarea>
      </p>
      <p>
        <label style="color:#4F91CD; width:200px;"><img src="../visual/1.png" width="40" height="40" /><strong>Certificaciones:</strong></label>
        </p>
      <p>&nbsp;        </p>
      <p>&nbsp;</p>
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
            Visa <img src="../visual/visa.png" width="37" height="27" /></td>
          <td width="166"><input type="checkbox" name="mastercard" value="1" id="mastercard" />
            Master Card <img src="../visual/master.png" width="37" height="27" /></td>
          <td width="261"><input type="checkbox" name="american" value="1" id="american" />
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
    <input type="text" name="latitud" id="latitud"  />
  </p>
  <p>
    <label>Longitud:&nbsp;</label>
    <input type="text" name="longitud" id="longitud"  />
  </p>
  <p>
    <label>Ciudad:</label>
    <? conectar(); 
		$sql = mysql_query("Select * From ciudad order by id");
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
    <tr>
      <td height="26"><input type="checkbox" name="31" id="31" value="31" /> 
        Dentista
</td>
      <td><input type="checkbox" name="34" id="34" value="34" />
        Oftalmología</td>
      <td><input type="checkbox" name="37" id="37" value="37" />
        Podología</td>
    </tr>
    <tr>
      <td height="26"><input type="checkbox" name="32" id="32" value="32" />
        Odontopediatría</td>
      <td><input type="checkbox" name="35" id="35" value="35" />
        Nefrología</td>
      <td><input type="checkbox" name="38" id="38" value="38" />
        Medicina del sueño</td>
    </tr>
    <tr>
      <td height="26"><input type="checkbox" name="33" id="33" value="33" />
        Otorrinolaringología</td>
      <td><input type="checkbox" name="36" id="36" value="36" />
        Ortodoncia</td>
      <td><input type="checkbox" name="39" id="39" value="39" />
        Medicina del deporte</td>
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
