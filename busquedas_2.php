<? 
session_start();

include("librerias/conexion.php");
$especialidad = $_POST['especialidad'];
$ciudad = $_POST['ciudad'];
$seguro = $_POST['seguro'];


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
$sq = "SELECT doctor.id, doctor.titulo, doctor.nombre, doctor.a_paterno, doctor.a_materno, doctor.seguros, doctor.tarjetas, clinica.id_doctor, clinica.nombre, clinica.calle, clinica.numero, clinica.numeroint, clinica.colonia, clinica.id_ciudad, clinica.especialidad, galeria.id_doctor, galeria.portada_thumb, clinica.id, doctor.publicar FROM doctor, clinica, galeria Where doctor.id = clinica.id_doctor  ".$sq_esp." ".$sq_ciu." ".$sq_seg." and doctor.id = galeria.id_doctor and doctor.publicar = '1' order by RAND()";
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
}

function despegar($parametro){
		if($parametro == 0)
		{
		$fecha = date("Y/m/d");
		$fecha_array = explode("/",$fecha);
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
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Busquedas - Dox</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>
</head>

<body onload="iniciar_mapa(),fechas_busquedas()" class="bg_int">

	<div id="contenedor">


<?php include("cabeza.php"); ?>

		<div style="clear:both;"></div>
		
		<div id="contenedor-degradado">
		
		<div id="busqueda-resultados">

			<div id="pasos-busqueda-resultado">
			
					&raquo; &nbsp; Elige tu Doctor &nbsp; &raquo; &nbsp; Realiza una Cita &nbsp; &raquo; &nbsp; Confirma Cita 

			</div>

		<div id="datos-busqueda-resultados">
		
			<div class="titular-datos-busqueda-resultados">
			
						<img src="visual/logo-cardiologo.png"/>
						<div class="dato-tdatos-busqueda-resultados">
						<div class="titulo1-datos">Resultados de la búsqueda: <span class="titulo2-datos"><? echo $nom; ?></span></div>
						<div class="titulo3-datos">Estos datos estan sujetos a cambios
						</div>
						</div>
			
			</div><!-- Aquitermina titular datos bsuqueda resultados -->
			
		
			<div id="cantidad-busqueda-resultados">
			
				<div class="separador1"></div>
			
				<div class="numero-cb-resultados">
				
				<? echo $num; ?>
				
				</div>
				
				<div class="numero-dato-cb-resultados">
				Doctores 
				
				<br>
				
				Encontrados
				</div>
			
			</div>
			
			<br><br><br>
			
			<!--<div id="busquedas-relacionadas-dbr">
			
				<span id="busquedas-relacionadas">
				Búsquedas Relacionadas
				</span>
			
			</div>-->
		
		
		</div><!--- Aqui termina el div de datos-bsuqueda-resultados -->
			
		<div id="busquedas-mapeo">
		
			<div id="cabecera-busquedas-mapeo">
		
			<span class="opcion-busquedas-mapeo">
			Mapa
			</span>
			
			<span class="opcion-busquedas-mapeo">
			Búsqueda
			</span>
		
			</div>
			
			
			<div id="seccion1-busquedas-mapeo">
		
			<div id="mapa"></div>
				
		
			</div>
		
		</div>
		
		
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
		
		<div id="cabecera-titulo-carrera">
		
		
		<img src="visual/cardiologos_corazon.png">
		
		<span class="titulo1-datos"><? echo $nom; ?></span>
		
		</div>
		
		
		<div id="cabecera-medicos">
		
		
		
		
		</div>		
		
		
		<div class="separador-doctores"></div>
		
		<!---- ***************************** Doctor ******************************--->
		<? 
		while($row = mysql_fetch_array($sql))
		{
		

		


		?>
		<div class="doctor-fechas">
		
		
		<div class="doctor-perfil">
        <img src="visual/marker.png" width="32" height="32" class="marcador">
		
		 <? 
		if($row[16] == '')
		{
			$foto = "visual/perfil/1.jpg";
			$medida = "height='208px' width='152px'";
		}
		else
		{
			$foto = "sinapsis/galeria_dr/".$row[16];
			$medida = "";
		}
		?>
		
			<img <? echo $medida; ?>  src="<? echo $foto; ?>" class="imagen">
		
		
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
	echo utf8_encode($tit." ".$row[2]." ".$row[3]." ".$row[4])
	?>
			</div>
			<div class="direccion-doctor">
			
			<? 
			echo utf8_encode($row[8])."<br />"; 
			echo utf8_encode($row[9]." ".$row[10])."<br />";
			echo utf8_encode($row[12])."<br />";
			
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
					<? if($tar[0] == 1) {?><li><a href="#"><img src="visual/master.png"></a></li><? } ?>
					<? if($tar[1] == 1) {?><li><a href="#"><img src="visual/visa.png"></a></li><? } ?>
					<? if($tar[2] == 1) {?><li><a href="#"><img src="visual/american.png"></a></li><? } ?>
				</ul>
				
				
			
			
			</div>
		
		
			
			
			
			<a href="ficha-doctor.php?id=<? echo $row[0]; ?>&clinica=<? echo $row[17]; ?>" class="agendar-doctor">&nbsp;</a>
			
			
		
		
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
			and status='cita-web' order by hinicio");	

			while($bd = mysql_fetch_array($horarios))
			{
			echo "<a href='ficha-doctor.php?id=".$bd['iddoctor']."
			&clinica=".$bd['clinica']."'>".separar_hora($bd['hinicio'])."<br>";
			}//Aqui termina la impresion de horas .. se puede poner 'ver mas'
				
			echo "</div>";

			}
				
			
			echo "</div>";

		?>

		
		<!-- <div class="citas">
		
			<div class="blanco">
		
		b
			</div>
		
			<div class="azul">
		a
			</div>
		
			<div class="blanco">
		
		b
			</div>
		
			<div class="azul">
		a
			</div>
		
			<div class="blanco">
		
		b
			</div>
		
			<div class="azul">
		a
			</div>
		
			<div class="blanco">
		b
			</div>
		
		</div><!--- Aui termina el div citas ---->  
		
		</div><!--- Aqui termina el doctor ----->
		
		<div class="separador-doctores"></div>
		
		<? } ?>
	<!--- ***********************************+ Aqui termina el doctor **************************-->	
	
	
	
	
	<!---- ***************************** Doctor ******************************--->
		
		<!--<div class="doctor-fechas">
		
		
		<div class="doctor-perfil">
		
		
			<img src="visual/perfil/5.jpg">
		
			<br>
		
			<div class="nombre-doctor">
				Dr. Solovino Perez Sanchez
			</div>
			<div class="direccion-doctor">
			
			108 NORTH COLUMBUS STREET <br>
			Alexandria VA 22315 <br>
			Culiacan, Sinaloa
			
			</div>
			<div class="tarjetas-doctor">
			
				<ul>
					<li><a href="#"><img src="visual/master.png"></a></li>
					<li><a href="#"><img src="visual/visa.png"></a></li>
					<li><a href="#"><img src="visual/american.png"></a></li>
				</ul>
				
				
			
			
			</div>
		
		
			
			<div class="agendar-doctor">
			
				<a href="#">Agendar Cita</a>
			
			</div>
		
		
		<div style="clear:both;"></div>
		
		</div>
		
		
		
		<div class="citas">
		
			<div class="blanco">
		
		b
			</div>
		
			<div class="azul">
		a
			</div>
		
			<div class="blanco">
		
		b
			</div>
		
			<div class="azul">
		a
			</div>
		
			<div class="blanco">
		
		b
			</div>
		
			<div class="azul">
		a
			</div>
		
			<div class="blanco">
		b
			</div>
		
		</div><!--- Aui termina el div citas ---->
		
		<!---</div> Aqui termina el doctor ----->
		
		<div class="separador-doctores"></div>
		
		
	<!--- ***********************************+ Aqui termina el doctor **************************-->	

	
	
	</div><!---- Aqui termina el degradado--->
	
	</div><!--- Aqui termina el contenedor de dox ---->
<?php include("pie.php"); ?>
	
</body>
</html>
	
		