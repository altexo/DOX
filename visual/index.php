<?
include("respaldo/librerias/conexion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Inicio - Dox</title>

<link rel="stylesheet" type="text/css" href="colors/estilo_dox1.css"/>
<link rel="stylesheet" type="text/css" href="colors/estilo_dox2.css"/>
<script type="text/javascript" src="magic/magic-script.js"></script>
</head>

<body class="fondo-portada">

	<div id="contenedor">



		<div id="cabecera-dox">

			<div id="logo-cabecera-dox">
	
				
								
			</div><!-- Aqui termina el div del logo ----->
				
				
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
			
			</div><!--Aqui termnina el div referente a la cabecera de dox en las opciones --->
				
			<div style="clear:both;"></div>
				
			
			
		</div><!--Aqui termina la cabecera de dox ----->

		<div style="clear:both;"></div>
		
		<div id="contenedor-degradado">
		<div id="principal">
		  <form id="form1" name="form1" method="post" action="busquedas.php">
		    <div class="listbox-principal">
		      <div class="titulo1-listbox">Encuentra tu mejor opción Médica</div>
		      <? conectar(); 
		$sql = mysql_query("Select * From especialidad");
	?>
		      <select id="especialidad" name="especialidad" class="form">
		        <option selected="selected">Especialidad</option>
		        <? while($row=mysql_fetch_array($sql)){ ?>
		        <option value="<? echo utf8_encode($row['id']); ?>"><? echo utf8_encode($row['nombre']); ?></option>
		        <? } 
	 desconectar();
	 ?>
	          </select>
		      <br />
		      <br />
		      <? conectar(); 
		$sql = mysql_query("Select * From ciudad");
	?>
		      <select id="ciudad" name="ciudad" class="form">
		        <option selected="selected">Ciudad</option>
		        <? while($row=mysql_fetch_array($sql)){ ?>
		        <option value="<? echo utf8_encode($row['id']); ?>"><? echo utf8_encode($row['nombre']); ?></option>
		        <? } 
	 desconectar();
	 ?>
	          </select>
		      <br />
		      <br />
		      <? conectar(); 
		$sql = mysql_query("Select * From seguro");
	?>
		      <select id="seguro" name="seguro" class="form">
		        <option selected="selected">Aseguradora</option>
                 <option value="0">Todos</option>
		        <? while($row=mysql_fetch_array($sql)){ ?>
		        <option value="<? echo utf8_encode($row['id']); ?>"><? echo utf8_encode($row['nombre']); ?></option>
		        <? } 
	 desconectar();
	 ?>
	          </select>
		      <div id="boton-busqueda">
		        <button></button>
	          </div>
	        </div>
	      </form>
		  <!--- Aqui termina el div de listbox-principal --->
			
<div id="slide-principal">
		
					<ul class="imagenes-slide-principal">
					
						<li><img src="visual/slide/1.jpg"></li>
						<li><img src="visual/slide/2.jpg"></li>
						<li><img src="visual/slide/3.jpg"></li>
						<li><img src="visual/slide/4.jpg"></li>
										
					</ul>
		
		
			</div><!-- Aqui termina el slide de principal ---->
		
		
		
		</div><!--- Aqui termina el banner principal ----->
		
		
		<div style="clear:both;"></div>
		
		<div id="beneficios">
		
			<!--- *************************** BENEFICIO ********************************* --->
			<div class="beneficio">
				<br>
				<img src="visual/folder.png">
				<div class="titulo-beneficio folder">Gran Cat&aacute;logo M&eacute;dico</div>
				<div class="abstract-beneficio">
				Los mejores m&eacute;dicos de todas las especialidades 
				en un solo lugar.
				
				</div>
			</div>
		
			<!---- *********************************** FIN BENEFEICIO *********************** --->
		
			<!--- *************************** BENEFICIO ********************************* --->
			<div class="beneficio">
				<br>
				<img src="visual/reloj.png">
				<div class="titulo-beneficio reloj">R&aacute;pido y f&aacute;cil</div>
				<div class="abstract-beneficio">
				Consulta, r&eacute;gistrate y realiza tu cita médica en segundos de la manera más fácil.
				
				</div>
			</div>
		
			<!---- *********************************** FIN BENEFEICIO *********************** --->
		
			<!--- *************************** BENEFICIO ********************************* --->
			<div class="beneficio">
				<br>
				<img src="visual/candado.png">
				<div class="titulo-beneficio candado">Seguridad y Confianza</div>
				<div class="abstract-beneficio">
				Tus datos de registro,b&uacute;squedas y citas se mantendr&aacute;n protegidos.
				
				</div>
			</div>
		
			<!---- *********************************** FIN BENEFEICIO *********************** --->
		
		<div style="clear:both;"></div>
		
		</div><!--- Aqui termina el div de beneficios ---->
		
		<div style="clear:both;"></div>
		
		
		<div id="seguridad-unete">
		
			<img src="visual/unete.png">
			
			<img src="visual/seguridad.png">
		
		
		
		</div>
		
		
	</div><!--- Aqui termina el contenedor-degradado--->
	
	</div><!--- Aqui termina el contenedor de dox ---->

	
	
	<div id="bolsita-footer">
	
	<div id="footer">
	<div class="footer">
	Powered By Mente Interactiva : New Agency 2011 <br>
	Dox 2011 Derechos Reservados &nbsp;
	</div>
	
	<div style="clear:both;"></div>
	
	</div>
	
	</div>
	
</body>
</html>
		