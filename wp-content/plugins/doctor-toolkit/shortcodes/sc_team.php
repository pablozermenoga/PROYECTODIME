<?php
function doctor_team( $atts ) {
	
	extract( shortcode_atts( array( 'sc_title' =>'' ), $atts ) );
	
	ob_start();
	
	?>
	<!-- Team Section -->
	<div id="team-section" class="team-section container-fluid no-left-padding no-right-padding">
		<!-- Container -->
		<div class="container">
			<?php
				if( $sc_title != "" ) {
					?>
					<!-- Section Header -->
					<div class="section-header">
						<h3><?php echo esc_attr($sc_title); ?></h3>
					</div>
					<?php
				}
				if( doctor_options("opt_team") != "" ) {
					?>
					<div class="team-carousel">
						<?php
							foreach( doctor_options("opt_team") as $single_item ) {
								if( $single_item["attachment_id"] != "" || $single_item["title"] != "" || $single_item["textOne"] != "" ) {
									?>
									<div class="col-md-12">
										<div class="team-content">
											<div class="team-box">
												<?php 
													echo wp_get_attachment_image( $single_item["attachment_id"],'doctor_240_274');
													if( $single_item["title"] != "" ) {
														?><h5><?php echo esc_attr( $single_item["title"] ); ?></h5><?php
													}
												?>
											</div>
											<?php if( $single_item["textOne"] != "" ) { ?><span class="team-catagory"><?php echo esc_attr( $single_item["textOne"] ); ?></span><?php } ?>
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
	</div><!-- Team Section /- -->
	<?php
	
	return ob_get_clean();
}

add_shortcode('doctor_team', 'doctor_team');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_team',
		'name' => esc_html__( 'Our Team', "doctor-toolkit" ),
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