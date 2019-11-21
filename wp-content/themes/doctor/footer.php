<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Doctor
 * @since Doctor 1.0
 */

		$footer_image = "";
		if( doctor_options("opt_footer_bg", "url") != "" ) {
			$footer_image = doctor_options("opt_footer_bg", "url");
		}
		else {
			$footer_image = DOCTOR_IMGURI . '/footer-bg.jpg';
		}
		
		if( is_active_sidebar('sidebar-3') || 
			is_active_sidebar('sidebar-4') || 
			is_active_sidebar('sidebar-5') 
		) {
			?>
			<!-- Footer Main -->
			<footer id="footer-main" class="footer-main container-fluid no-left-padding no-right-padding" style="background-image: url(<?php echo esc_url( $footer_image ); ?>);">
				<!-- Container -->
				<div class="container">
					<div class="row">
						<?php
							if(is_active_sidebar('sidebar-3') ) {
								?>
								<div class="col-md-4 col-sm-6 col-xs-6 contact-info">
									<?php dynamic_sidebar('sidebar-3'); ?>
								</div>
								<?php
							}
							if(is_active_sidebar('sidebar-4') ) {
								?>
								<div class="col-md-4 col-sm-6 col-xs-6">
									<?php dynamic_sidebar('sidebar-4'); ?>
								</div>
								<?php
							}
							if(is_active_sidebar('sidebar-5') ) {
								?>
								<div class="col-md-4 col-sm-6 col-xs-6 contact-form">
									<?php dynamic_sidebar('sidebar-5'); ?>
								</div>
								<?php
							}
						?>
					</div>
				</div><!-- Container /- -->
			</footer><!-- Footer Main /- -->
			<?php
		}
		?>
		<div class="footer-bottom">
			<!-- Container -->
			<div class="container">
				<?php 
				if( function_exists('doctor_copyright') && doctor_options("opt_footer_copyright") != "" ) {
					echo doctor_copyright();
				}
				else {
					?><p><?php esc_html_e('&copy;',"doctor"); ?>
						<?php echo date('Y'); ?>
						<?php esc_html_e('Doctor Theme. All Rights Reserved',"doctor"); ?>
					</p><?php
				}
				?>
			</div><!-- Container /- -->
		</div>
		<?php wp_footer(); ?>
	</div>
</body>
</html>