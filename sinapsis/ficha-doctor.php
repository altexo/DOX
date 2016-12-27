<?
include("librerias/conexion.php");


$id = $_GET['id'];
$clinica = $_GET['clinica'];
conectar();
$sql = mysql_query("Select * From doctor, clinica Where doctor.id = clinica.id_doctor and doctor.id = ".$id."");
$row = mysql_fetch_array($sql);

$sql_g = mysql_query("Select * From galeria where id_doctor = ".$id."");
$row_g = mysql_fetch_array($sql_g);

desconectar();
switch($row[1])
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
	
	
	$esp = explode(",", $row[30]);
	
	$seg = explode(",", $row[13]);
	
switch($esp[1])
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
	case 13: $nom = "Gastroenterología-Endoscopía 	"; break;
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
	case 26: $nom = "Radiología y Ultrasonografista"; break;
	case 27: $nom = "Reumatología"; break;
	case 28: $nom = "Sexología"; break;
	case 29: $nom = "Traumatología y Ortopedia"; break;
	case 30: $nom = "Urología"; break;
} 
 
	?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Nombre Doctor - Dox</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="magic/magic-script.js"></script>
<script type="text/javascript" src="date.js"></script>
<script type="text/javascript">
        var GB_ROOT_DIR = "greybox/";
</script>

<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript"> 
var image_set1 = [
				  
				
<? if($row_g['portada'] != '') {?>{'caption': 'Portada', 'url': '../sinapsis/galeria_dr/<? echo $row_g['portada'];?>'}, <? } ?>
<? if($row_g['img1'] != '') {?>{'caption': 'Galería', 'url': '../sinapsis/galeria_dr/<? echo $row_g['img1'];?>'}, <? } ?>
<? if($row_g['img2'] != '') {?>{'caption': 'Galería', 'url': '../sinapsis/galeria_dr/<? echo $row_g['img2'];?>'}, <? } ?>
<? if($row_g['img3'] != '') {?>{'caption': 'Galería', 'url': '../sinapsis/galeria_dr/<? echo $row_g['img3'];?>'} <? } ?>

					
				  ];
      
     </script>

</head>

<body class="bg_int2">
<input type="hidden" id="iddoctor_oculto" value='<?php echo $id; ?>'>
<input type="hidden" id="clinica_oculto" value='<?php echo $clinica; ?>'>
	<div id="contenedor">
	
	<div id="cabecera-dox">

			<div id="logo-cabecera-dox">
	
				
								
			</div><!-- Aqui termina el div del logo -->
				
				
			<div id="navegacion-cabecera-dox">
			
				<div id="social-navegacion-cabecera-dox">
					
					<ul>
						<li><a href="#"><img src="visual/social/facebook2.png"></a></li>
						<li><a href="#"><img src="visual/social/twitter2.png"></a></li>
						<li><a href="#"><img src="visual/social/rss2.png"></a></li>
					</ul>
			
				<div style="clear:both;"></div>
			
				</div><!-- Aqui termina la cabecera de social de dox -->
			
				<div id="menu-navegacion-cabecera-dox">
							
					<ul>
						<li><a href="#">Regístrate</a></li>
						<li><a href="#">Mis Citas</a></li>
						<li><a href="#">Búsquedas</a></li>
						<li><a class="seleccionado" href="#">Inicio</a></li>
					</ul>
				
				<div style="clear:both;"></div>
				
				</div><!-- A qui termina el div del menu de navegacion --->
			
			</div><!--Aqui termnina el div referente a la cabecera de dox en las opciones -->
				
			<div style="clear:both;"></div>
	
	
		<div id="ficha-doctor">
		
		
		
			<div id="datos-ficha-doctor">
		
				<div id="img" style="width:165px; float:left;"><div id="featured" style="width:160px; height:210px;">
                <a href="#" title="Imagen Principal" onClick="return GB_showImageSet(image_set1, 1)"><? if($row_g['portada_thumb'] == '') { $img = "/visual/perfil/1.jpg"; } else { $img = "sinapsis/galeria_dr/".$row_g['portada_thumb']; }?> <img class="perfil"  src="<? echo $img; ?>"></a>

                
                
              </div>
				<div id="minis" style="width:160px; height:50px;"><? if($row_g['img1_thumb'] != '') { $img = "../sinapsis/galeria_dr/".$row_g['img1_thumb']; ?><img src="<? echo $img; ?>" width="40px" height="40px" style="margin-left:10px;"> <? } else { }?><? if($row_g['img2_thumb'] != '') { $img = "../sinapsis/galeria_dr/".$row_g['img2_thumb']; ?><img src="<? echo $img; ?>" width="40px" height="40px" style="margin-left:10px;"> <? } else { }?><? if($row_g['img3_thumb'] != '') { $img = "../sinapsis/galeria_dr/".$row_g['img3_thumb']; ?><img src="<? echo $img; ?>" width="40px" height="40px" style="margin-left:10px;"> <? } else { }?></div></div>
				<div id="contenido-df-doctor">
                
				
					<div class="columna1">
					
						<div class="columna-nombre-doctor">
						<? echo utf8_encode($tit." ".$row[2]." ".$row[3]." ".$row[4]); ?>
						</div>
						<div class="columna-especialidad-doctor">
							<img class="corazon" src="visual/cardiologos_corazon.png">
							<span class="titulo-columna">
							<? echo $nom; ?>
							</span>
						
						</div>
									
						<div class="columna-direccion-doctor">
						
							
			<? 
			echo utf8_encode($row["calle"]." ".$row["numero"]." int ".$row["numeroint"])."<br />";
			echo utf8_encode($row["colonia"])."<br />";
			switch($row["id_ciudad"])
			{
				case 1: $c = "Culiacán, Sinaloa."; break;
				case 2: $c = "Tijuana, Baja California."; break;
				case 3: $c = "La Paz, Baja California Sur."; break;
				case 4: $c = "Los Mochis, Sinaloa."; break;
				case 5: $c = "Hermosillo, Sonora."; break;
				case 6: $c = "Mazatlán, Sinaloa."; break;
				case 7: $c = "Tepic, Nayarit."; break;
				case 8: $c = "Guadalajara, Jalisco."; break;
				case 9: $c = "DF"; break;
				case 10: $c = "Monterrey, Nuevo León."; break;
				case 11: $c = "Chihuahua, Chihuahua."; break;
				case 12: $c = "Torreón, Coahuila."; break;
				case 13: $c = "León, Guanajuato."; break;
			}
			
			echo $c;
			?>
						
						
						</div>
						
						
						<div class="columna-tarjetas">
						
							<div class="titulo-columna-tarjetas">
							Aceptamos							
							</div>
							
							<br>
							<? 
							$tar = explode(",", $row['tarjetas']);
			
			
							?>
                            
                                <? if($tar[0] == 1) {?><a href="#"><img src="visual/master.png"></a><? } ?>
                                <? if($tar[1] == 1) {?><a href="#"><img src="visual/visa.png"></a><? } ?>
                                <? if($tar[2] == 1) {?><a href="#"><img src="visual/american.png"></a><? } ?>
                           
				
						</div>
						
						
					</div>
					
					
					<div class="columna2">
					
						<div class="columna2-especialidad">
						
						Especialidad
						</div><ul>
                        <? 
						$num = count($esp);
						
						for($i = 1; $i < $num - 1; $i++)
						{
						
						switch($esp[$i])
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
							case 13: $nom = "Gastroenterología-Endoscopía 	"; break;
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
							case 26: $nom = "Radiología y Ultrasonografista"; break;
							case 27: $nom = "Reumatología"; break;
							case 28: $nom = "Sexología"; break;
							case 29: $nom = "Traumatología y Ortopedia"; break;
							case 30: $nom = "Urología"; break;
						} 
						?>
					
							<li><? echo $nom; ?></li>
                            <? 
						}
							?>
							
						</ul>
						<div class="columna2-seguros">
						
						Seguros Aceptados
						</div>
					
						<ul>
							<? 
						$num = count($seg);
						
						for($i = 1; $i < $num - 1; $i++)
						{
						
						switch($seg[$i])
						{
							case 1: $nom = "Mapfre-Tepeyac"; $logo = "mapfre_80.png"; break;
							case 2: $nom = "GNP"; $logo = "GNP_80.png"; break;
							case 3: $nom = "Allianz"; $logo = "allianz_80.png"; break;
							case 4: $nom = "AXA"; $logo = "axa_80.png"; break;
							case 5: $nom = "Met Life"; $logo = "met_80.png"; break;
							case 6: $nom = "Seguros Monterrey New York Life"; $logo = "seguros-monterrey_80.png"; break;
							
						} 
						?>
					
							<li><img src="sinapsis/logo_seguro/<? echo $logo; ?>" width="168" height="100" /></li>
                            <? 
						}
							?>
						</ul>
					
					
					</div>
				
				
				</div>
		
		
			</div><!--- Aqui termina la ficha de doctor---->
			
			<div id="mapa-ficha-doctor">
		
		
		
			</div><!--- Aqui termina el div del mapa de ficha de doctor -->
		
		</div><!--- Aqui termina el div de la ficha del doctor -->
	
		<div style="clear:both;"></div>
	
		<div id="informacion-doctor">
		
		<div id="datos-informacion-doctor">
		
			<div class="cabecera-di-doctor">
			
				<img src="visual/educacion.png">
				
				<span class="titulo-cabecera-di-doctor">
					Educación
				</span>
			</div>
			
			<div class="abstract-cdi-doctor">
			
			<? echo utf8_encode($row['educacion']); ?>
			
			
			</div>
	
			<div class="separador-datos"></div>
			
			
			<!------------------------------------------------------>
			
			
			
			<div class="cabecera-di-doctor">
			
				<img src="visual/certificaciones.png">
				
				<span class="titulo-cabecera-di-doctor">
					Certificaciones
				</span>
			</div>
			
			<div class="abstract-cdi-doctor">
			
			<? echo utf8_encode($row['certificaciones']); ?>
			
			</div>
	
			<div class="separador-datos"></div>
			
			<!-------------------------------------------------------------------------->
			
			
			<div class="cabecera-di-doctor">
			
				<img src="visual/hospitales.png">
				
				<span class="titulo-cabecera-di-doctor">
					Hospitales y/o Clínicas
				</span>
			</div>
			
			<div class="abstract-cdi-doctor">
			
		<? echo utf8_encode($row['nombre']); ?>
			
			</div>
	
			<div class="separador-datos"></div>
			
			<!------------------------------------------------------------------------>
	
	
		</div><!---- Aqui termina el div de datos-informacion-doctor-->

		<div id="slide-informacion-doctor">
		
			<div id="reservacion-i-doctor">
		
				<div class="titulo-reservacion-i-doctor">
					Realiza tu cita con anticipación
				</div>
			
			</div>
		
			<div id="consultorio-sid">
			
				<div class="consultorio-sid">
			
					Consultorio
			
				</div>
				
				<div class="direccion-consultorio-sid">
				
						
				
				</div>
			</div>
		
		

		<div style="clear:both;"></div>
	<span  id="restar"><button><<</button></span>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
	<span id="hoy"><button>Hoy</button></span>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
	<span id="sumar"><button>>></button></span>
	

	<br><br>
	<span id="dia1" class="columna_azul"></span>
	<span id="dia2"></span>
	<span id="dia3"></span>
	<span id="dia4"></span>
	<span id="dia5"></span>
	<span id="dia6"></span>
	<span id="dia7"></span>
		

	<div style="clear:both;"></div>

	<br>
	
	
		<div id="horas_consulta"></div>
		<!--- Aqui es donde se insertara la informacion de las horas por medio de ajax -->




		</div><!-- Aqui termina el div de slide de informacion de doctor ------------>

		<div style="clear:both;"></div>
		
		</div><!---- Aqui termina el di de informacion de doctor ---->
	
	
	</div><!--- Aqui termina el div contenedor ------>
	
	
	
	
		
		<div id="footer">
	<div class="footer">
	Powered By Mente Interactiva : New Agency 2011 <br>
	Dox 2011 Derechos Reservados &nbsp;
	</div>
	
	<div style="clear:both;"></div>
	
	</div>
	
	
	
	</div><!--- Aqui termina el contenedor de dox ---->

</body>
</html>

		>>>>