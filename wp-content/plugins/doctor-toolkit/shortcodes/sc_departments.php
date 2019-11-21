<?php
function doctor_departments( $atts ) {
	
	extract( shortcode_atts( array( 'sc_title' =>'','btntxt' => '', 'btnurl' => '' ), $atts ) );
	
	ob_start();
	
	?>
	<!-- Department Section -->
	<div class="department-section container-fluid no-left-padding no-right-padding">
		<!-- Container -->
		<div class="container">
			<?php 
				if( $sc_title != "" ) {
					?>
					<div class="department-header">
						<h5><?php echo esc_attr($sc_title); ?></h5>
					</div>
					<?php
				}
				if( doctor_options("opt_department") != "" ) {
					?>	
					<div class="row">
						<?php 
							foreach( doctor_options("opt_department") as $single_item ) {
								if( $single_item["attachment_id"] != "" || $single_item["title"] != "" ) {
									?>
									<div class="col-md-2 col-sm-6 col-xs-6 department-box">
										<div class="department-img-block">
											<?php
												echo wp_get_attachment_image( $single_item["attachment_id"],'full' );
												if( $single_item["title"] != "" ) {
													?><a href="<?php echo esc_url( $single_item["url"] ); ?>" title="<?php echo esc_attr( $single_item["title"] ); ?>"><?php echo esc_attr( $single_item["title"] ); ?></a><?php
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
				if($btntxt != "") {
					?>
					<div class="show-all">
						<a href="<?php echo esc_url($btnurl); ?>" title="<?php echo esc_attr($btntxt); ?>"><?php echo esc_attr($btntxt); ?></a>
					</div>
					<?php
				}
			?>
		</div><!-- Container /- -->
	</div><!-- Department Section -->
	<?php
	
	return ob_get_clean();
}

add_shortcode('doctor_departments', 'doctor_departments');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_departments',
		'name' => esc_html__( 'Departments', "doctor-toolkit" ),
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
				'type' => 'textfield',
				'heading' => esc_html__( 'Button Text', "doctor-toolkit" ),
				'param_name' => 'btntxt',
			),
			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Button URL', "doctor-toolkit" ),
				'param_name' => 'btnurl',
			),
		),
	) );
}
?>