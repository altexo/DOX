<?
//in(select id from doctor where id=".$_POST['nombre'].")
session_start();

include("conexion.php");

	
	conectar();
	
	
	$datos = mysql_query("select * from datos where iddoctor = ".$_GET['id']."");
	$num_row = mysql_num_rows($datos);
	mysql_query('SET CHARACTER SET utf8');
	
	
	$s = "Select * from doctor where id = '".$_GET['id']."'";
	$sql = mysql_query($s);
	$num = mysql_num_rows($sql);
	mysql_query('SET CHARACTER SET utf8');
	$row = mysql_fetch_array($sql);
	
	switch($row['titulo'])
	{
		case 1: $tit = "Dr"; break;
		case 2: $tit = "Dra"; break;
		case 3: $tit = "Psic"; break;
		case 4: $tit = "Sr"; break;
		case 5: $tit = "Sra"; break;
		case 6: $tit = "Srita"; break;
		case 7: $tit = "MC"; break;
		case 8: $tit = "Lic"; break;
		case 9: $tit = "Ing"; break;
	}
	
	
	$mensaje = "Bienvenido ".$tit." ".$row['nombre']." ".$row['a_paterno']." ".$row['a_materno'];





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DOX Calendar - <? echo $tit." ".$row['nombre']." ".$row['a_paterno']." ".$row['a_materno']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel='stylesheet' type='text/css' href='reset.css' />
	<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css' />
	<link rel='stylesheet' type='text/css' href='../jquery.weekcalendar.css' />
	<link rel='stylesheet' type='text/css' href='demo.css' />
	<style type="text/css">
	.botonclinica {
	background-color: #14B9D6;
	border-bottom-left-radius: 2px;
	border-bottom-right-radius: 2px;
	border-top-left-radius: 2px;
	border-top-right-radius: 2px;
	color: #FFFFFF;
	display: block;
	float: left;
	height: 30px;
	line-height: 30px;
	margin-top: 10px;
	text-align: center;
	text-decoration: none;
	padding: 4px;
	padding-left:10px;
	padding-right:10px;
	margin-right: 4px;
	margin-bottom: 4px;
}
.botonclinica:hover {
	color: #FF9;
	text-decoration: none;
}
    h1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
	color: #004C91;
	margin: 0px;
	padding: 0px;
}
    body {
	margin: 10px;
	background-color: #E6F9FF;
}
#cajainfo {
	clear: both;
	width: 100%;
	margin-right: auto;
	margin-left: auto;
	background-color: #E6F9FF;
	padding-top: 40px;
}
    #caja1 {
	float: left;
	width: 30%;
}
    #caja2 {
	width: 300px;
	float: left;
}
#cajacentro {
	width: 960px;
	margin-right: auto;
	margin-left: auto;
	padding-bottom: 40px;
}
    #mitabla {
	border: 1px solid #15B9D6;
	background-color: #FFF;
}
    #mitabla tr th, #mitabla tr td {
	padding: 5px;
}
#mitabla tr th{
	background-color: #15B9D6;
	color: #FFF;
}
    #mitabla tr td {
	padding-top: 5px;
	padding-bottom: 5px;
}
    .clave {
	background-color: #DEEFFF;
	display: block;
	height: 30px;
	width: 60px;
	color: #14B5D2;
	font-size: 16px;
	line-height: 30px;
	text-align: center;
}
    .bagenda {
	background-color: #15B9D6;
	height: 30px;
	display: inline-block;
	float: left;
	margin-right: 10px;
	margin-left: 10px;
	font-size: 12px;
	color: #FFF;
	line-height: 30px;
	text-decoration: none;
	padding-right: 10px;
	padding-left: 10px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
#mandar {
	background-color: #15B9D6;
	height: 30px;
	display: block;
	margin-right: auto;
	margin-left: auto;
	font-size: 12px;
	color: #FFF;
	line-height: 30px;
	text-decoration: none;
	padding-right: 10px;
	padding-left: 10px;
	width: 50%;
}
#mandar:hover , .bagenda:hover{
	background-color: #1EC3E9;
	font-size: 12px;
}
    #cabeza {
	background-color: #FFF;
	width: 100%;
}
#monto , #concepto, #email{
	text-decoration: none;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	background-color: #F1F0F3;
	width: 400px;
}
    </style>
	<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
	<link href="../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js'></script>
	<script type='text/javascript' src='../jquery.weekcalendar.js'></script>
	<script type='text/javascript' src='fechas.js'></script>
	<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<script src="../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
	
	
	
</head>
<body> 
<? 
conectar();
$sql2 = mysql_query("Select * From doctor, clinica where doctor.id = clinica.id_doctor and doctor.id = ".$_GET['id']."");
desconectar();

?><div id="cabeza"><div id="caja1">
<img src="../../visual/iconos/dox-calendar.png" alt="" width="190" height="68" /></div><div id="caja2">
<h1><? if(isset($mensaje)){echo $mensaje;} ?> </h1>
   <? while($row2 = mysql_fetch_array($sql2)) {?> 
   <a href="http://www.dox.mx/ficha-doctor.php?id=<? echo $row['id']; ?>&clinica=<? echo $row2[19]; ?>" target="_blank"  class="botonclinica">Mi ficha</a>
  
  <a href="http://www.dox.mx/calendar/a/calendar-u.php?id=<? echo $row['id']; ?>" target="_self"  class="botonclinica">Mi Agenda</a>
  
  <a class="botonclinica" href="http://www.dox.mx/ficha-doctor.php?id=<? echo $row['id']; ?>&clinica=<? echo $row2[19]; ?>" target="_blank">Clínica <? echo $row2[21]; ?></a><? } ?>
   </div><div style="clear:both"></div>
   </div>
	<!--<div id="about_button_container">
	<button type="button" id="refresh">Actualizar</button>	<button type="button" id="about_button">Acerca de DOX</button>
	</div>-->
<div id="cajainfo">
    
    <div id="cajacentro">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" id="mitabla">
        <tr>
          <th width="15%" scope="col">Fecha</th>
          <th width="15%" scope="col">Hora</th>
          <th width="16%" scope="col">Paciente</th>
          <th width="10%" scope="col">Clave Reserva</th>
          <th scope="col">&nbsp;</th>
        </tr>
        
        <? 
		conectar();
		
		
		$sql = mysql_query("SELECT * FROM datos where id = '".$_GET['iddato']."'  ORDER BY inicio DESC, hinicio DESC limit 0,10")or die("ERROR: Problemas con la Base de Datos. Contacte al Webmaster.");
mysql_query('SET CHARACTER SET utf8');
while($row2 = mysql_fetch_array($sql)) {
		
		
		
		?>
        <tr>
          <td scope="col"><? echo $row2['inicio']?></td>
          <td scope="col"><? echo $row2['hinicio']?> - <? echo $row2['hfinal']?></td>
          <td scope="col"><? echo $row2['titulo']?></td>
          <td scope="col"><span class="clave"><? echo $row2['clavereserva']?></span></td>
          <td scope="col">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5" align="center" scope="col">
          <form action="mis-facturas-autorizar-autorizada.php" method="get" id="forma">
          <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" scope="col"><input name="iddato" type="hidden" id="iddato" value="<? echo $_GET['iddato'];?>" />
                <input name="id" type="hidden" id="id" value="<? echo $_GET['id'];?>" />
                Monto:</td>
            </tr>
            <tr>
              <td align="left"><span id="sprytextfield1">
              <input type="text" name="monto" id="monto" />
             <br /> <span class="textfieldRequiredMsg">Se requiere un valor.</span><span class="textfieldInvalidFormatMsg">Formato incorrecto.</span></span></td>
            </tr>
            <tr>
              <td align="left">Concepto:</td>
            </tr>
            <tr>
              <td align="left"><p><span id="sprytextarea1">
                <textarea name="concepto" id="concepto" cols="45" rows="5"></textarea>
               <br /> <span class="textareaRequiredMsg">Se requiere llene con descripción de concepto.</span></span></p></td>
            </tr>
            <tr>
              <td align="left">Email:</td>
            </tr>
            <tr>
              <td align="left"><span id="sprytextfield2">
              <input type="text" name="email" id="email" />
             <br /> <span class="textfieldRequiredMsg">Se requiere este dato.</span><span class="textfieldInvalidFormatMsg">Formato incorrecto :(</span></span></td>
            </tr>
          </table>
          <p>
            <input type="submit" name="mandar" id="mandar" value="Los datos están correctos, deseo autorizar esta factura" />
          </p>
          </form></td>
        </tr>
       <?
	   }
	   desconectar();
	   ?>
      </table>
</div></div>
	
	<div id="about">
	  <h2>DOX</h2>
		<p>
			En este calendario podrás definir los espacios de tiempo que tendrás disponible para reservar citas, así como indicar el tiempo no disponible.
		</p>
		<p>
			También aparecerán todas las citas realizadas a través de <a href="http://www.dox.mx" target="_blank">DOX</a>
		</p>
		<h2>Instrucciones</h2>
		<p>
			Para indicar el espacio disponible debes hacer lo siguiente:
		</p>
		<ul class="formatted">
			<li>Hacer clic en el calendario en la hora y día que deseas abrir espacio para una cita.</li>
			<li>Aparecerá un menú donde podrás indicar la hora de inicio y final.</li>
			<li>Y hacer clic en el botón de GUARDAR. </li>
			
		</ul>
        <p>
			Para indicar el espacio no disponible debes hacer lo siguiente:
		</p>
		<ul class="formatted">
			<li>Seguir los mismos pasos que en ejemplo anterior sólo que hacer clic en el botón de BLOQUEAR CITA.</li>
		</ul>
        
        <h2>Cada color representa una situación</h2>
        <p>
			
            Azul: Espacio disponible para una cita.</br>
            Rojo: Espacio no disponible para una cita.</br>
            Verde: Cita realizada vía web.</br>
            Morado: Cita cancelada via web.</br>
            Gris: Cita anterior.</br>
            Naranja: Cita creada por el doctor.
		</p>
	</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "currency", {validateOn:["blur"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email");
</script>
</body>
</html>
