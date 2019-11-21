<?php
function doctor_welcome( $atts ) {
	
	extract( shortcode_atts( array(), $atts ) );
	
	ob_start();
	
	?>
	<!-- Welcome Section -->
	<div class="welcome-section other-services container-fluid no-left-padding no-right-padding">
		<!-- Container -->
		<div class="container">
			<?php	
				if( doctor_options("opt_welcome") != "" ) {
					?>	
					<div class="row">
						<div class="our-clinic">
							<div class="row welcome-left">
								<?php
									foreach( doctor_options("opt_welcome") as $single_item ) {
										if( $single_item["textOne"] != "" || $single_item["title"] != "" || $single_item["description"] != "" ) {
											?>
											<div class="col-md-6 col-sm-6 col-xs-6">
												<div class="other-services-block">
													<?php
														if( $single_item["textOne"] != "" ) {
															?>
															<div class="services-block-icon">
																<i class="<?php echo esc_attr($single_item["textOne"]); ?>"></i>
															</div>
															<?php
														}
													?>
													<div class="other-services-content">
														<?php 
															if( $single_item["title"] != "" ) {
																?><h5><?php echo esc_attr( $single_item["title"] ); ?></h5><?php
															}
															echo wpautop( wp_kses( $single_item["description"], doctor_striptags() ) );
														?>
													</div>
												</div>
											</div>
											<?php
										}
									}
								?>
							</div>
						</div>
					</div>
					<?php
				}
			?>
		</div><!-- Container /- -->
	</div><!-- Welcome Section /- -->
	<?php
	
	return ob_get_clean();
}

add_shortcode('doctor_welcome', 'doctor_welcome');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_welcome',
		'name' => esc_html__( 'Welcome Clinic', "doctor-toolkit" ),
		'class' => '',
		"category" => esc_html__("Doctor Theme", "doctor-toolkit"),
		'params' => array(
			array(
				'type' => 'label',
				'heading' => esc_html__( 'No Need To Setting', "doctor-toolkit" ),
				'param_name' => 'doctor_welcome',
			),
		),
	) );
}
?>