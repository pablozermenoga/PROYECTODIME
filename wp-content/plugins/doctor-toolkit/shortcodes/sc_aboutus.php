<?php
function doctor_aboutus( $atts ) {
	
	extract( shortcode_atts( array( 'sc_title' => '', 'sc_desc' => '', 'sc_image' => '' ), $atts ) );
	
	ob_start();
	
	?>
	<!-- About Section -->
	<div class="about-section container-fluid no-left-padding no-right-padding">
		<!-- Container -->
		<div class="container">
			<div class="row">
				<?php
					if( $sc_title != "" || $sc_desc != "" ) {
						?>
						<div class="col-md-8 col-sm-7 col-xs-12">
							<div class="about-content">
								<?php 
									if($sc_title != "") {
										?><h5><?php echo esc_attr($sc_title); ?></h5>
										<?php
									}		
									echo wpautop( wp_kses( $sc_desc, doctor_striptags() ) );
								?>
							</div>
						</div>
						<?php
					}
					if( $sc_image != "" ) {
						?>
						<div class="col-md-4 col-sm-5 col-xs-12 about-img">
							<?php echo wp_get_attachment_image($sc_image,'doctor_370_461'); ?>
						</div>
						<?php
					}
				?>
			</div>
		</div><!-- Container /- -->
	</div><!-- About Section -->
	<?php
	
	return ob_get_clean();
}

add_shortcode('doctor_aboutus', 'doctor_aboutus');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_aboutus',
		'name' => esc_html__( 'Content Block', "doctor-toolkit" ),
		'class' => '',
		"category" => esc_html__("Doctor Theme", "doctor-toolkit"),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', "doctor-toolkit" ),
				'param_name' => 'sc_title',
				'holder' => 'div',
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Short Description', "doctor-toolkit" ),
				'param_name' => 'sc_desc',
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Content Image', "doctor-toolkit" ),
				'param_name' => 'sc_image',
			),
		),
	) );
}
?>