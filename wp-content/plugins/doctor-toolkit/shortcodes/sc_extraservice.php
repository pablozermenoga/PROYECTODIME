<?php
function doctor_extraservice( $atts ) {
	
	extract( shortcode_atts( array( 'sc_title' =>'', 'sc_bg' => '' ), $atts ) );
	
	if($sc_bg != ""){
		$style = " style='background-image: url(".wp_get_attachment_url( $sc_bg ).");'";
	}
	else {
		$style = "";
	}
	
	ob_start();
	
	?>
	<!-- Extra Services -->
	<div class="extra-services container-fluid no-left-padding no-right-padding"<?php echo html_entity_decode( $style ); ?>>
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
				if( doctor_options("opt_extraservice") != "" ) {
					?>
					<div class="row">
						<?php
							foreach( doctor_options("opt_extraservice") as $single_item ) {
								if( $single_item["textOne"] != "" || $single_item["title"] != "" || $single_item["description"] != "" || $single_item["textTwo"] != "" ) {
									?>
									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="extra-box">
											<?php
												if( $single_item["textOne"] != "" ) {
													?><i class="<?php echo esc_attr($single_item["textOne"]); ?>"></i><?php
												}
												if( $single_item["title"] != "" ) {
													?><h5><?php echo esc_attr($single_item["title"]); ?></h5><?php
												}
												echo wpautop( wp_kses( $single_item["description"], doctor_striptags() ) );
												
												if( $single_item["textTwo"] != "" ) {
													?><a href="<?php echo esc_url($single_item["url"]); ?>" title="<?php echo esc_attr($single_item["textTwo"]); ?>"><?php echo esc_attr($single_item["textTwo"]); ?></a><?php
												}
											?>
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
	</div><!-- Extra Services /- -->
	<?php
	
	return ob_get_clean();
}

add_shortcode('doctor_extraservice', 'doctor_extraservice');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'doctor_extraservice',
		'name' => esc_html__( 'Extra Service', "doctor-toolkit" ),
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
				'type' => 'attach_image',
				'heading' => esc_html__( 'Background Image', "doctor-toolkit" ),
				'param_name' => 'sc_bg',
			),
		),
	) );
}
?>