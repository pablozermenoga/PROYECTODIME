<?php
function doctor_testimonial( $atts ) {
	
	extract( shortcode_atts( array( 'sc_title' =>'' ), $atts ) );
	
	ob_start();
	
	?>
	<!-- Testimonial Section -->
	<div class="testimonial-section container-fluid no-left-padding no-right-padding">
		<?php
			if( $sc_title != "" ) {
				?>
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3><?php echo esc_attr($sc_title); ?></h3>
					</div><!-- Section Header /- -->	
				</div>
				<?php
			}
			if( doctor_options("opt_testimonial") != "" ) {
				?>
				<div class="testimonial-slider">		
					<?php
						foreach( doctor_options("opt_testimonial") as $single_item ) {
							if( $single_item["attachment_id"] != "" || $single_item["title"] != "" || $single_item["description"] != "" ) {
								?>
								<div class="testimonial-box">
									<div class="testimonial-content">
										<?php
											if( $single_item["attachment_id"] != "" ) {
												?><i><?php echo wp_get_attachment_image($single_item["attachment_id"],'doctor_120_120'); ?></i><?php
											}
											if( $single_item["title"] != "" ) {
												?><h5><?php echo esc_attr($single_item["title"]); ?></h5><?php
											}
											echo wpautop( wp_kses( $single_item["description"], doctor_striptags() ) );
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
	</div><!-- Testimonial Section /- -->
	<?php
	
	return ob_get_clean();
}

add_shortcode('doctor_testimonial', 'doctor_testimonial');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_testimonial',
		'name' => esc_html__( 'Testimonial', "doctor-toolkit" ),
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