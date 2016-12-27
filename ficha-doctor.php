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
$_SESSION['esp'];
$id = $_GET['id']; //doctor
$clinica = $_GET['clinica'];
conectar();
$sql = mysql_query("Select * From doctor, clinica Where doctor.id = clinica.id_doctor and doctor.id = ".$id." and clinica.id = ".$clinica."");
$row = mysql_fetch_array($sql);
$sql_g = mysql_query("Select * From galeria where id_doctor = ".$id."");
$row_g = mysql_fetch_array($sql_g);

desconectar();

//Email doctor
$_SESSION['email-dr'] = $row[9];

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
	
	$_SESSION['list-esp'] = $row[30];
	$_SESSION['list-seg'] = $row[13];
	
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
 
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Dox - Perfil del Médico</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="jquery/reveal.css">
<script type="text/javascript" src="jquery/jquery.reveal.js"></script>

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
     
<!--Inicia secuencia para modales-->     
     
<!-- Add jQuery library -->
	<script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />


	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	
  <!--Termina secuencia MODAL-->
     
     
</head>

<body >
<? 
if(isset($_SESSION['email']) and isset($_SESSION['contra']))
{
?>
<? } ?>
<input type="hidden" id="iddoctor_oculto" value='<?php echo $id; ?>'>
<input type="hidden" id="clinica_oculto" value='<?php echo $clinica; ?>'>
<div id="contenedor">
<?php include("cabeza.php"); ?>
		
<div style="clear:both;"></div>
<div id="ficha-doctor">
		
		
		
<div id="datos-ficha-doctor">
		
				<div id="img" style="width:165px; float:left;"><div id="featured" style="width:160px; ">
                <a href="#" title="Imagen Principal" onClick="return GB_showImageSet(image_set1, 1)"><? 
				$_SESSION['portada'] = $row_g['portada'];
				if($row_g['portada'] == '') { $img = "/visual/perfil/1.jpg"; } else { $img = "sinapsis/galeria_dr/".$row_g['portada']; }?> <img class="perfil"  src="<? echo $img; ?>"></a>

                
                
              </div>
				<div id="minis" style="width:160px;"><? if($row_g['img1_thumb'] != '') { $img = "../sinapsis/galeria_dr/".$row_g['img1_thumb']; ?>
				  <a href="#" onClick="return GB_showImageSet(image_set1, 2)"><img src="<? echo $img; ?>"  height="40px" style="margin-left:10px;"></a> 
			  <? } else { }?><? if($row_g['img2_thumb'] != '') { $img = "../sinapsis/galeria_dr/".$row_g['img2_thumb']; ?>
			  <a href="#" onClick="return GB_showImageSet(image_set1, 3)"><img src="<? echo $img; ?>"  height="40px" style="margin-left:10px;"></a> 
			  <? } else { }?><? if($row_g['img3_thumb'] != '') { $img = "../sinapsis/galeria_dr/".$row_g['img3_thumb']; ?>
			  <a href="#" onClick="return GB_showImageSet(image_set1, 4)"><img src="<? echo $img; ?>" height="40px" style="margin-left:10px;"></a> 
			  <? } else { }?></div></div>
				<div id="contenido-df-doctor">
                
				
					<div class="columna1">
					
						<div class="columna-nombre-doctor">
						<? $_SESSION['nom-doctor'] = $tit." ".$row[2]." ".$row[3]." ".$row[4];
						echo $_SESSION['nom-doctor']; ?>
						</div>
						<div class="columna-especialidad-doctor">
							<img class="corazon" src="visual/cardiologos_corazon.png">
							<span class="titulo-columna">
							<? echo $nom; ?>
							</span>
						
						</div>
									
						<div class="columna-direccion-doctor">
						
							
			<? 
			
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
			$_SESSION['dir1'] = $row["calle"]." ".$row["numero"]." int ".$row["numeroint"]."<br />"; 
			$_SESSION['dir2'] = $row["colonia"]."<br />";
			$_SESSION['dir3'] =  $c;
			echo $_SESSION['dir1'];
			echo $_SESSION['dir2'];
			echo $_SESSION['dir3'];
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
                           <img src="visual/iconos/efectivo.png" width="51" height="32" />
                                <? if($tar[0] == 1) {?><a href="#"><img src="visual/iconos/mastercard.png"></a><? } ?>
                                <? if($tar[1] == 1) {?><a href="#"><img src="visual/iconos/visa.png"></a><? } ?>
                                <? if($tar[2] == 1) {?><a href="#"><img src="visual/iconos/americanexpress.png"></a><? } ?>
                           
				
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
						?>
					
							<li><? echo $nom; ?></li>
                            <? 
						}
							?>
							
						</ul>
						<div class="columna2-seguros">
						
						Seguros Aceptados

						</div>
					
						<br />
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
					
							<img src="sinapsis/logo_seguro/<? echo $logo; ?>"  style="margin:2px;"/>
                            <? 
						}
							?>
						
					
					
					</div>
				
				
				</div>
		
		
			</div><!--- Aqui termina la ficha de doctor---->
			
			<div id="mapa-ficha-doctor1"><a class="fancybox fancybox.iframe" href="http://maps.google.com/maps?output=embed&q=<? echo $row["latitud"]; ?>,<? echo $row["longitud"]; ?>"> <img src="visual/ubicacion.png" width="300" height="143" /></a> </div><!--- Aqui termina el div del mapa de ficha de doctor -->
		
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
			
			<? echo $row['educacion']; ?>
			
			
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
			
			<? echo $row['certificaciones']; ?>
			
			</div>
	
			<div class="separador-datos"></div>
			
			<!-------------------------------------------------------------------------->
			
			
			<div class="cabecera-di-doctor" style="padding-bottom:15px">
			
				<img src="visual/hospitales.png">
				
				<span class="titulo-cabecera-di-doctor" >
					Hospitales y/o Clínicas
				</span>
			</div>
			
			<div class="abstract-cdi-doctor">
			
		<? echo $row['nombre']; ?>
			
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
	
	</div><!--- Aqui termina el contenedor de dox ---->
    <div class="empujador" style="padding-top:100px"></div>
    <?php include("pie.php"); ?>

</body>
</html>>>>>>>>>