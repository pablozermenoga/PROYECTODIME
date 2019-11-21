<?php
function doctor_otherservice( $atts ) {
	
	extract( shortcode_atts( array( 'sc_title' =>'' ), $atts ) );
	
	ob_start();
	
	?>
	<!-- Other Services -->
	<div class="other-services container-fluid no-left-padding no-right-padding">
		<!-- Container -->
		<div class="container">
			<?php
				if( $sc_title != "" ) {
					?>
					<!-- Section Header -->
					<div class="section-header">
						<h3><?php echo esc_attr($sc_title); ?></h3>
					</div><!-- Section Header /- -->
					<?php
				}
				if( doctor_options("opt_otherservice") != "" ) {
					?>
					<div class="row srv-box">
						<?php
							foreach( doctor_options("opt_otherservice") as $single_item ) {
								if( $single_item["textOne"] != "" || $single_item["title"] != "" || $single_item["description"] != "" || $single_item["textTwo"] != "" ) {
									?>
									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="other-services-block">
											<?php
												if( $single_item["textOne"] != "" ) {
													?>
													<div class="services-block-icon">
														<i class="<?php echo esc_attr( $single_item["textOne"] ); ?>"></i>
													</div>
													<?php
												}
											?>
											<div class="other-services-content">
												<?php
													if( $single_item["title"] != "" ) {
														?><h5><?php echo esc_attr($single_item["title"] ); ?></h5><?php
													}
													
													echo wpautop( wp_kses( $single_item["description"], doctor_striptags() ) );
													
													if( $single_item["textTwo"] != "" ) {
														?><a href="<?php echo esc_url($single_item["url"] ); ?>" title="<?php echo esc_attr($single_item["textTwo"] ); ?>"><?php echo esc_attr($single_item["textTwo"] ); ?></a><?php
													}
												?>
											</div>
										</div>
									</div>
									<?php
								}
							}
						?>
					</div>
					<?php
				}
			?>
		</div><!-- Container /- -->
	</div><!-- Other Services -->
	<?php
	
	return ob_get_clean();
}

add_shortcode('doctor_otherservice', 'doctor_otherservice');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_otherservice',
		'name' => esc_html__( 'Other Service', "doctor-toolkit" ),
		'class' => '',
		"category" => esc_html__("Doctor Theme", "doctor-toolkit"),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', "doctor-toolkit" ),
				'param_name' => 'sc_title',
				'holder' => 'div',
			),
		),
	) );
}
?>