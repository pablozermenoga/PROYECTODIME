<?php
function doctor_medicalservice( $atts ) {
	
	extract( shortcode_atts( array( 'sc_title' =>'', 'sc_desc' =>'', 'sc_image' =>'', 'sc_btntxtone' =>'', 'sc_btntxttwo' =>'', 'sc_btnurlone' =>'', 'sc_btnurltwo' =>'' ), $atts ) );
	
	ob_start();
	
	?>
	<!-- Services Section -->
	<div class="services-section container-fluid no-left-padding no-right-padding">
		<!-- Container -->
		<div class="container">
			<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="service-content">
					<?php
						if( $sc_title != "" ) {
							?><h5><?php echo esc_attr($sc_title); ?></h5><?php
						}
						echo wpautop( wp_kses( $sc_desc, doctor_striptags() ) );
						
						if ( isset( $atts['plan_feature'] ) ) {
							?>
							<div class="medical-services">
								<?php
									$result = "";
									$cnt = 1;
									foreach( vc_param_group_parse_atts( $atts['plan_feature'] ) as $key => $value ) {
										if( !empty( $value['feature_icon'] ) || !empty( $value['feature_name'] ) ) {
											$result .="<div class='col-md-4 col-sm-4 col-xs-4 medical-box'>";
											$result .="<i class='".$value['feature_icon']."'></i>";
											$result .="<p>".$value['feature_name']."</p>";
											$result .="</div>";
										}
										$cnt++;
									}
									echo html_entity_decode ($result);
								?>
							</div>
							<?php
						}
						if( $sc_btntxtone != "" ) {
							?><a href="<?php echo esc_url($sc_btnurlone); ?>" class="learn-more" title="<?php echo esc_attr($sc_btntxtone); ?>"><?php echo esc_attr($sc_btntxtone); ?></a><?php
						}
						if( $sc_btntxtone != "" || $sc_btntxttwo != "" ) {
							?><span><?php esc_html_e('Or',"doctor-toolkit"); ?></span><?php
						}
						if( $sc_btntxttwo != "" ) {
							?><a href="<?php echo esc_url($sc_btnurltwo); ?>" class="learn-more appointment" title="<?php echo esc_attr($sc_btntxttwo); ?>"><?php echo esc_attr($sc_btntxttwo); ?></a><?php
						}
					?>
				</div>
			</div>
			<?php
				if( $sc_image != "" ) {
					?>
					<div class="col-md-5 col-sm-12 col-xs-12 services-img">
						<?php echo wp_get_attachment_image($sc_image,'doctor_458_532'); ?>
					</div>
					<?php
				}
			?>
		</div><!-- Container /- -->
	</div><!-- Services Section -->
	<?php
	
	return ob_get_clean();
}

add_shortcode('doctor_medicalservice', 'doctor_medicalservice');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_medicalservice',
		'name' => esc_html__( 'Medical Service', "doctor-toolkit" ),
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
				'type' => 'param_group',
				'value' => '',
				'param_name' => 'plan_feature',
				'params' => array(
					array(
						'type' => 'textfield',
						'value' => '',
						'heading' => 'Feature Icon',
						'param_name' => 'feature_icon',
					),
					array(
						'type' => 'textfield',
						'value' => '',
						'heading' => 'Feature Name',
						'param_name' => 'feature_name',
					),
				)
			),
			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Button Text 1', "doctor-toolkit" ),
				'param_name' => 'sc_btntxtone',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Button URL 1', "doctor-toolkit" ),
				'param_name' => 'sc_btnurlone',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Button Text 2', "doctor-toolkit" ),
				'param_name' => 'sc_btntxttwo',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Button URL 2', "doctor-toolkit" ),
				'param_name' => 'sc_btnurltwo',
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', "doctor-toolkit" ),
				'param_name' => 'sc_image',
			),
		),
	) );
}
?>