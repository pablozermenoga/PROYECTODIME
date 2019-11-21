<?php
function doctor_partners( $atts ) {
	
	extract( shortcode_atts( array( 'sc_title' =>'' ), $atts ) );
	
	ob_start();
	
	?>
	<!-- Clients -->
	<div class="clients container-fluid no-left-padding no-right-padding">
		<!-- Container -->
		<div class="container">
			<?php
				if($sc_title != "") {
					?>
					<!-- Section Header -->
					<div class="section-header">
						<h3><?php echo esc_attr($sc_title); ?></h3>
					</div>
					<?php
				}
				if( doctor_options("opt_partner") != "") {
					?>
					<div class="clients-carousel">
						<?php
							foreach( doctor_options("opt_partner") as $single_item ) {
								if( $single_item["attachment_id"] != "" ) {
									?>
									<div class="col-md-12 item">
										<?php 
											if( $single_item["url"] != "" && $single_item["attachment_id"] != "" ) {
												?><a href="<?php echo esc_url($single_item["url"]); ?>"><?php echo wp_get_attachment_image($single_item["attachment_id"],'full'); ?></a><?php
											}
											elseif( $single_item["attachment_id"] != "" ) {
												echo wp_get_attachment_image($single_item["attachment_id"],'full');
											}
										?>
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
	</div><!-- Clients /- -->
	<?php
	
	return ob_get_clean();
}

add_shortcode('doctor_partners', 'doctor_partners');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_partners',
		'name' => esc_html__( 'Partners', "doctor-toolkit" ),
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