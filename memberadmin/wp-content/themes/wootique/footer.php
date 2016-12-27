<?php global $woo_options; ?>

	<?php
		$total = $woo_options[ 'woo_footer_sidebars' ]; if (!isset($total)) $total = 4;
		if ( ( woo_active_sidebar( 'footer-1') ||
			   woo_active_sidebar( 'footer-2') ||
			   woo_active_sidebar( 'footer-3') ||
			   woo_active_sidebar( 'footer-4') ) && $total > 0 ) :

  	?>
	<div id="footer-widgets" class="col-full col-<?php echo $total; ?>">

		<?php $i = 0; while ( $i < $total ) : $i++; ?>
			<?php if ( woo_active_sidebar( 'footer-'.$i) ) { ?>

		<div class="block footer-widget-<?php echo $i; ?>">
        	<?php woo_sidebar( 'footer-'.$i); ?>
		</div>

	        <?php } ?>
		<?php endwhile; ?>

		<div class="fix"></div>

	</div><!-- /#footer-widgets  -->
    <?php endif; ?>
    
    <?php woo_content_after(); ?>
    
  </div><!--/#container-->

	<div style="clear:both"></div>
</div><!-- /#wrapper -->

<div style="background-color:#636363;">
<div id="footer" class="col-full">

		<div id="copyright" class="col-left">
		<?php if( $woo_options[ 'woo_footer_left' ] == 'true' ) {

				echo stripslashes( $woo_options['woo_footer_left_text'] );

		} else { ?>
			<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'Todos los derechos reservados.', 'woothemes' ); ?></p>
		<?php } ?>
		</div>

		<div id="credit" class="col-right">
        <?php if( $woo_options[ 'woo_footer_right' ] == 'true' ){

        	echo stripslashes( $woo_options['woo_footer_right_text'] );

		} else { ?>
			<p>Powered by Mente Interactiva</p>
		<?php } ?>
		</div>

	</div><!-- /#footer  -->

</div>
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>