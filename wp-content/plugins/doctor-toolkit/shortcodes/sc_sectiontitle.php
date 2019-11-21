<?php
function doctor_sectiontitle( $atts ) {
	
	extract( shortcode_atts( array( 'sc_title' =>'' ), $atts ) );
	
	ob_start();
	
	if( $sc_title != "" ) {
		?>
		<!-- Container -->
		<div class="section-header-box">
			<div class="container">
				<!-- Section Header -->
				<div class="section-header">
					<h3><?php echo esc_attr($sc_title); ?></h3>
				</div><!-- Section Header /- -->
			</div>
		</div>
		<?php
	}
	
	return ob_get_clean();
}

add_shortcode('doctor_sectiontitle', 'doctor_sectiontitle');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_sectiontitle',
		'name' => esc_html__( 'Section Heading Title', "doctor-toolkit" ),
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