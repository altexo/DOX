<?php
error_reporting(0);
include("librerias/conexion.php");

 session_start();
 
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['email'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['email']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
} 
 
 //Viene del loggin
if(isset($_SESSION['email']) and isset($_SESSION['contra']))
{
	$email = $_SESSION['email'];//$_POST['email_registrado'];
	$contra = $_SESSION['contra'];//$_POST['contra_registrado'];
	
	//$pass = $_POST['contra_registrado'];
	$cadena = "Select * from paciente where email = '".$email."' and contrasena = '".$contra."'";
	
}
else if(isset($_GET['id'])) //Viene de mi usuario
{
	$id = 	$_GET['id'];
	$cadena = "Select * from paciente where id = ".$id."";
}

conectar();
$sq = mysql_query($cadena);
$rw = mysql_fetch_array($sq);
$hoy = date("Y-m-d");

$hola = "Select * from datos where idpaciente = ".$rw['id']." and status ='cita-hecha' and inicio >= '".$hoy."' order by inicio desc";
$idpaciente=$rw['id'];
$sql = mysql_query($hola);

desconectar();
?>

<? 
$especialidad = $_GET['especialidad'];
$ciudad = $_GET['ciudad'];
$seguro = $_GET['seguro'];


$_SESSION['esp'] = $especialidad;

if($especialidad != '0')
	$sq_esp = "and clinica.especialidad like '%,".$especialidad.",%'";
else
	$sq_esp = " ";

if($ciudad != '0')
	$sq_ciu = "and clinica.id_ciudad = '".$ciudad."'";
else
	$sq_ciu = " ";
	
if($seguro != '0')
	$sq_seg = "and doctor.seguros like '%,".$seguro.",%'";
else
	$sq_seg = " ";
	

conectar();
$sq = "SELECT doctor.id, doctor.titulo, doctor.nombre, doctor.a_paterno, doctor.a_materno, doctor.seguros, doctor.tarjetas, clinica.id_doctor, clinica.nombre, clinica.calle, clinica.numero, clinica.numeroint, clinica.colonia, clinica.id_ciudad, clinica.especialidad, galeria.id_doctor, galeria.portada, clinica.id, doctor.publicar FROM doctor, clinica, galeria Where doctor.id = clinica.id_doctor  ".$sq_esp." ".$sq_ciu." ".$sq_seg." and doctor.id = galeria.id_doctor and doctor.publicar = '1' order by RAND()";
$sql = mysql_query($sq);
$num = mysql_num_rows ($sql);


switch($especialidad)
{
	case 0: $nom = "Todas"; break;
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
	case 13: $nom = "Gastroenterología - Endoscopía"; break;
	case 14: $nom = "Genética"; break;
	case 15: $nom = "Geriatría"; break;
	case 16: $nom = "Ginecología - Obstetricia"; break;
	case 17: $nom = "Hematología"; break;
	case 18: $nom = "Infectología"; break;
	case 19: $nom = "Medicina de Rehabilitación"; break;
	case 20: $nom = "Medicina Interna"; break;
	case 21: $nom = "Neumología"; break;
	case 22: $nom = "Neurología - Neurocirugía"; break;
	case 23: $nom = "Nutrición"; break;
	case 24: $nom = "Pediatría"; break;
	case 25: $nom = "Psiquiatría - Psicología"; break;
	case 26: $nom = "Radiología y Ultrasonografista"; break;
	case 27: $nom = "Reumatología"; break;
	case 28: $nom = "Sexología"; break;
	case 29: $nom = "Traumatología y Ortopedia"; break;
	case 30: $nom = "Urología"; break;
	case 31: $nom = "Dentista"; break;
	case 32: $nom = "Odontopediatría"; break;
	case 33: $nom = "Otorrinolaringología"; break;
	case 34: $nom = "Oftalmología"; break;
	case 35: $nom = "Nefrología"; break;
	case 36: $nom = "Ortodoncia"; break;
	case 37: $nom = "Podología"; break;
	case 38: $nom = "Medicina del sueño"; break;
	case 39: $nom = "Medicina del deporte"; break;
}

function despegar($parametro){
		if($parametro == 0)
		{
		$fecha = date("Y/m/d");
		$fecha_array = explode("X",$fecha);
		$fecha_final = $fecha_array[0]."-".$fecha_array[1]."-".$fecha_array[2];
		
		}else{
			$tomorrow = mktime(0,0,0,date("m"),date("d")+$parametro,date("Y"));
			$fecha = date("Y/m/d",$tomorrow);
			$fecha_array = explode("/",$fecha);
			$fecha_final = $fecha_array[0]."-".$fecha_array[1]."-".$fecha_array[2];
		}
		
		return $fecha_final;
					
	}


	function separar_hora($hora)
	{		
		 $hora_arreglo = explode(":",$hora);
		
		 $hora_final = $hora_arreglo[0].":".$hora_arreglo[1];
			
		return $hora_final; 
		
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>DOX - Resultados de su búsqueda</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="jquery/reveal.css">
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
<script type="text/javascript" src="js/jquery.clickable.min.js"></script>


<script type="text/javascript">

$(function () {
   
    // caja 1
    $('.miCaja').clickable('a.cita');
	
	 $('.miCaja').clickable('a.cita:last', {
        hoverClass: 'miCajaFX',
        changeCursor: false
    });
	

   
});

</script>

<style type="text/css">

.miCaja {z-index:9999;}
a.button {
	background-color: #2d96de;
	text-decoration: none;
	border-radius: 4px;
	-moz-border-radius: 4px;
	border: 1px solid #1376ba;
	box-shadow: 0px 4px 0px #1376ba;
	-moz-box-shadow: 0px 4px 0px #1376ba;
	-webkit-box-shadow: 0px 4px 0px #1376ba;
	-webkit-transition: background-color 0.5s ease-in;
	-moz-transition: background-color 0.5s ease-in;
	-o-transition: background-color 0.5s ease-in;
	transition: background-color 0.5s ease-in;
	line-height: 36px;
	text-align: center;
	color: #FFF;
	font-size: 16px;
	margin-top: 5px;
	margin-left: 0px;
	height: 46px;
	width: 190px;
	cursor: pointer;
	display: block;
	position: relative;
	top: 45px;
	left: 180px;
}
a.button:hover {
	background-color: #58b4f3;
	border-radius: 4px;
	-moz-border-radius: 4px;
	border: 1px solid #1376ba;
	text-decoration: none;
}

</style>


</head>

<body onload="fechas_busquedas()" >
<? 
if(isset($_SESSION['email']) and isset($_SESSION['contra']))
{
?>
<? } ?>
	<div id="contenedor">


<?php include("cabeza.php"); ?>

<div style="clear:both;"></div>
		
		<div id="contenedor-degradado">
		
		<div id="busqueda-resultados">

<div >
			
					
					<div id="datos-busqueda-resultados">
					  <div class="titular-datos-busqueda-resultados"> <img src="visual/logo-cardiologo3.png"/>
					    <div class="dato-tdatos-busqueda-resultados">
					      <div class="titulo1-datos">Resultados de la búsqueda: <span class="titulo2-datos"><? echo $nom; ?></span></div>
					      <div class="titulo3-datos"><br />
				          Estos datos estan sujetos a cambios</div>
				        </div>
				      </div>
                      
                       <?
					 if ($num!=0)
		{
		?>
					
                      <div id="cantidad-busqueda-resultados">
					    <div class="separador1"></div>
					    <div class="numero-cb-resultados"> <? echo $num; ?> </div>
					    <div class="numero-dato-cb-resultados"> Especialistas <br />
					      Encontrados </div>
				      </div>
                      <?
		}
		
					  ?>
                      
					  <!-- Aquitermina titular datos bsuqueda resultados -->
					 
                    


					 
					  <!--<div id="busquedas-relacionadas-dbr">
			
				<span id="busquedas-relacionadas">
				Búsquedas Relacionadas
				</span>
			
			</div>-->
  </div>
  <?
if ($num==0)
{
?>
<div style="clear:both">
  <p>&nbsp;</p>
  <p><span class="titulo1-datos">No se encontraron registros con estas especificaciones. </span></p>
  <p>  <span class="titulo1-datos">Nos encontramos trabajando para ampliar nuestro directorio de especialistas. </span></p>
  <p><br />
    <a href="index2.php"><br />
      Haz click para realizar otra búsqueda. </a>
  </p>
</div>
<?
}
?>

</div><!--- Aqui termina el div de datos-bsuqueda-resultados -->
		<!--
            <? 
		
		if ($num!=0)
		{
		?>
		<div id="busquedas-mapeo">
		
			
            <div id="cabecera-busquedas-mapeo">
		
			
		
			</div>
          
			
			
			<div id="seccion1-busquedas-mapeo">
		
			<!--<div id="mapa"></div> 
				
		
			</div>
		
		</div>
		<? 
		
		}
		?>
		  -->
		<div style="clear:both;"></div>
			
				
<!--		<div id="busquedas-relacionadas-opciones">
		
			<ul>
				<li><a href="#">Ginecólogos</a><li>
				<li><a href="#">Cardiología</a><li>
				<li><a href="#">Traumatología</a><li>
				<li><a href="#">Cirugía</a><li>
				
				<div style="clear:both;"></div>
				
			</ul>
		
		
		</div>--><!--- Aui termina el div de las busqeudas relacionadas---->
		
		
		</div><!--- Aqui termina el div de resultados --->
		
		
		<div style="clear:both;"></div>
		<? 
		
		if ($num!=0)
		{
		?>
		<div id="cabecera-titulo-carrera">
		
		
		<img src="visual/cardiologos_corazon.png">
		
		<span class="titulo1-datos"><? echo $nom; ?></span>
		
		</div>
		
        	<script type="text/javascript">

				jQuery(function() {

					jQuery('#prueba').jScroll({ top : 0, speed : 0 });

				});

			</script>
		<div id="prueba" style="position:absolute; height:40px; z-index:400;  background-color:#137fbe; width:990px">
         <div style="float:left; width:420px; line-height:40px; color:#FFF">&nbsp; </div>
       <div style="float:left; line-height:40px; color:#FFF">
       <?php

			

			for($d = 1;$d<=7;$d++)
			{
				echo "<div class='b'><span id='diab".$d."'></span></div>";
			}

		
			for($co = 0;$co<=6;$co = $co +1)
			{
				$fecha = despegar($co);


			
}
			
				
			
			

		?>
       
       
        </div>
		</div>
		
		<div id="cabecera-medicos">
		
		
		
		
		</div>		
		
		
		<div class="separador-doctores"></div>
		
		<!---- ***************************** Doctor ******************************--->
		<? 
		while($row = mysql_fetch_array($sql))
		{
		

		


		?>
		<div class="doctor-fechas" style="margin-top:30px">
		
		
		<div class="doctor-perfil miCaja">
      <!--  <img src="visual/marker.png" width="32" height="32" class="marcador">-->
		
		 <? 
		if($row[16] == '')
		{
			$foto = "visual/perfil/1.jpg";
			$medida = "height='208px' width='152px'";
		}
		else
		{
			$foto = "sinapsis/galeria_dr/".$row[16];
			
		}
		?>
		
			<img src="<? echo $foto; ?>" class="imagen">
		
		
			<br>
		
			<div class="nombre-doctor">
				<? switch($row[1])
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
	echo $tit." ".$row[2]." ".$row[3]." ".$row[4]
	?>
			</div>
			<div class="direccion-doctor">
			
			<? 
			echo $row[8]."<br />"; 
			echo $row[9]." ".$row[10]."<br />";
			echo $row[12]."<br />";
			
			switch($row[13])
			{
				case 1: $cd = "Culiacán"; break;
				case 2: $cd = "Tijuana"; break;
				case 3: $cd = "La Paz"; break;
				case 4: $cd = "Los Mochis"; break;
				case 5: $cd = "Hermosillo"; break;
				case 6: $cd = "Mazatlán"; break;
				case 7: $cd = "Tepic"; break;
				case 8: $cd = "Guadalajara"; break;
				case 9: $cd = "DF"; break;
				case 10: $cd = "Monterrey"; break;
				case 11: $cd = "Chihuahua"; break;
				case 12: $cd = "Torreón"; break;
				case 13: $cd = "León"; break;
				default: $cd = "";
				
			}
			echo $cd;
			?>
			
			
			</div>
			<div class="tarjetas-doctor">
			<? 
			$tar = explode(",", $row[6]);
			
			
			?>
				<ul>
                <li>
                 <img src="visual/iconos/efectivo.png" width="51" height="32" />
                 </li>
					<? if($tar[0] == 1) {?><li><a href="#"><img src="visual/iconos/mastercard.png"></a></li><? } ?>
					<? if($tar[1] == 1) {?><li><a href="#"><img src="visual/iconos/visa.png"></a></li><? } ?>
					<? if($tar[2] == 1) {?><li><a href="#"><img src="visual/iconos/americanexpress.png"></a></li><? } ?>
				</ul>
				
				
			
			
			</div>
		
		
			
			
			 <span style="width:300px;">
			<a href="ficha-doctor.php?id=<? echo $row[0]; ?>&clinica=<? echo $row[17]; ?>" class="nuevo-boton-cita cita clearfix">Realizar Cita</a></span>
			
			
		
		
		<div style="clear:both;"></div>
		
		</div>
		
		

		<?php

			echo "<div class='citas'>";

			for($d = 1;$d<=7;$d++)
			{
				echo "<div class='b'><span id='diab".$d."'></span></div>";
			}

		
			for($co = 0;$co<=6;$co = $co +1)
			{
				$fecha = despegar($co);
				if($co == 0 || $co == 2 || $co == 4 ||$co == 6){
					
					echo "<div class='blanco'>";
				}else{
					echo "<div class='azul'>";	
				}

			$horarios = mysql_query("select * from datos where iddoctor 
			in(select id from doctor where id=".$row[0].") and inicio='".$fecha."' 
			and status='cita-web' and titulo='' order by hinicio limit 0,13");	

			while($bd = mysql_fetch_array($horarios))
			{
			if($co==0) // checa solo el primer registro! :) 
			{
				
 $ahora=date(" H:i", time()+3600);
 $prueba=separar_hora($bd['hinicio']);
 $st_time    =   strtotime($prueba);
$cur_time   =   strtotime($ahora);


if($st_time < $cur_time)
{ 
   
}
else{
  echo "<a href='ficha-doctor.php?id=".$bd['iddoctor']."
			&clinica=".$bd['clinica']."'>".separar_hora($bd['hinicio'])."<br>";
}
				
				 }
			else
			{	
			echo "<a href='ficha-doctor.php?id=".$bd['iddoctor']."
			&clinica=".$bd['clinica']."'>".separar_hora($bd['hinicio'])."<br>";
			}
			}//Aqui termina la impresion de horas .. se puede poner 'ver mas'
			
			
			
			
			echo "</div>";
			
			;

			}
				
			
			echo "</div>";

		?>

		
		
		
		</div><!--- Aqui termina el doctor ----->
		
		<div class="separador-doctores"></div>
		
		<? } ?>
	
		
		<div class="separador-doctores"></div>
		
		
	<!--- ***********************************+ Aqui termina el doctor **************************-->	

	<? } ?>
	
	</div><!---- Aqui termina el degradado--->
	
	</div>
    <div class="empujador" style="padding-top:80px"></div>
    <!--- Aqui termina el contenedor de dox ---->
<?php include("pie.php"); ?>
	
</body>
</html>
>>