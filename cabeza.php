<div id="cabecera-dox">

			<a href="index.php"><div id="logo-cabecera-dox">
	
				
								
			</div></a><!-- Aqui termina el div del logo ----->
				
				
  <div id="navegacion-cabecera-dox">
			
				<div id="social-navegacion-cabecera-dox">
					
					<ul>
						<li><a href="#"><img src="visual/social/facebook3.png" ></a></li>
						<li><a href="#"><img src="visual/social/twitter3.png" ></a></li>
					</ul>
			
				<div style="clear:both;"></div>
			
				</div><!-- Aqui termina la cabecera de social de dox -->
			
				<div id="menu-navegacion-cabecera-dox">
							
					<ul>
						<!--<li><a href="usuario-panel.php">Registrarme</a></li>-->
                        <? 
if(isset($_SESSION['email']) and isset($_SESSION['contra']))
{
?>
<li><a href="panel.php"><? echo $rw['nombre']; ?></a> <?php /*?><a href="<?php echo $logoutAction ?>">Cerrar Sesión</a><?php */?></li>
<? } 
else {
?>

						<li><a href="panel.php">Inicio de sesión</a></li><? } ?>
						<li><a class="seleccionado" href="index.php">Buscar especialistas</a></li>
					</ul>
				
				<div style="clear:both;"></div>
				
				</div><!-- A qui termina el div del menu de navegacion --->
			
			</div><!--Aqui termnina el div referente a la cabecera de dox en las opciones --->
				
			<div style="clear:both;"></div>
				
			
			
		</div>