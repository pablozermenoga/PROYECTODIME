<?php
function doctor_contactform( $atts ) {
	
	extract( shortcode_atts( array( 'layout' =>'one', 'sc_icon'=>'', 'sc_title' => '', 'sc_desc' => '', 'id' => '', 'sc_formtitle'=> ''), $atts ) );
	
	ob_start();
	
	if($layout == 'one') {
		?>
		<div class="contact-us container-fluid no-left-padding no-right-padding">
			<!-- Container -->
			<div class="container">
				<?php
					if( $sc_title != "" || $sc_desc != "" ) {
						?>
						<div class="contact-header">
							<?php if($sc_title != "") { ?><h5><?php echo esc_attr($sc_title); ?></h5><?php } ?>
							<?php echo wpautop( wp_kses( $sc_desc, doctor_striptags() ) ); ?>
						</div>
						<?php
					}
					if( $id != "" ) {
						?>
						<div class="contact-form">
							<h5><?php echo esc_attr($sc_formtitle); ?></h5>
							<div class="row">
								<?php echo do_shortcode('[contact-form-7 id="'.esc_attr( $id ).'"]'); ?>
							</div>
						</div>
						<?php
					}
				?>
			</div>
		</div>
		<?php
	}
	elseif($layout == "two") {
		?>
		<!-- Contact Us2 -->
		<div class="contact-us contact-us2 container-fluid no-left-padding no-right-padding">
			<!-- Container -->
			<div class="container">
				<?php
					if( $sc_title != "" || $sc_desc != "" ) {
						?>
						<div class="contact-header">
							<?php if($sc_title != "") { ?><h5><?php echo esc_attr($sc_title); ?></h5><?php } ?>
							<?php echo wpautop( wp_kses( $sc_desc, doctor_striptags() ) ); ?>
						</div>
						<?php
					}
					if( $id != "" ) {
						?>
						<div class="contact-form">
							<?php if( $sc_formtitle != "" ) { ?><h5><?php echo esc_attr($sc_formtitle); ?></h5><?php } ?>
							<div class="row">
								<?php echo do_shortcode('[contact-form-7 id="'.esc_attr( $id ).'"]'); ?>
							</div>
						</div>
						<?php
					}
				?>
			</div><!-- Container /- -->
		</div>
		<?php
	}
	elseif($layout == 'three') {
		if($id != "") {
			?>
			<div class="clinic-form">
				<div class="appoinment-form">
					<?php if($sc_title != "") { ?><h5><i class="<?php echo esc_attr($sc_icon); ?>"></i><?php echo esc_attr($sc_title); ?></h5><?php } ?>
					<?php echo do_shortcode('[contact-form-7 id="'.esc_attr( $id ).'"]'); ?>
				</div>
			</div>
			<?php
		}
	}
	return ob_get_clean();
}

add_shortcode('doctor_contactform', 'doctor_contactform');

if( function_exists('vc_map') ) {
	
	/**
	 * Add Shortcode To Visual Composer
	*/
	$doctor_cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

	$doctor_contactforms = array();
	
	if ( $doctor_cf7 ) {
		foreach ( $doctor_cf7 as $cform ) {
			$doctor_contactforms[ $cform->post_title ] = $cform->ID;
		}
	} else {
		$doctor_contactforms[ esc_html__( 'No contact forms found', 'doctor-toolkit' ) ] = 0;
	}
	
	vc_map( array(
		'base' => 'doctor_contactform',
		'name' => esc_html__( 'Contact Form', "doctor-toolkit" ),
		'class' => '',
		"category" => esc_html__("Doctor Theme", "doctor-toolkit"),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Layout Type', "doctor-toolkit" ),
				'param_name' => 'layout',
				'description' => esc_html__( 'Default Layout 1 Set', "doctor-toolkit" ),
				'value' =>array(
					esc_html__('Layout 1 For Contact Form 1',"doctor-toolkit") => 'one',
					esc_html__('Layout 2 For Contact Form 2',"doctor-toolkit") => 'two',
					esc_html__('Layout 3 For Appointment Form',"doctor-toolkit") => 'three',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Select Icon', "doctor-toolkit" ),
				'param_name' => 'sc_icon',
				"dependency" => Array('element' => "layout", 'value' => array( 'three') ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', "doctor-toolkit" ),
				'param_name' => 'sc_title',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two','three') ),
				'holder' => 'div',
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Short Description', "doctor-toolkit" ),
				'param_name' => 'sc_desc',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Contact Form Title', "doctor-toolkit" ),
				'param_name' => 'sc_formtitle',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two') ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Select Contact Form', 'doctor-toolkit' ),
				'param_name' => 'id',
				'value' => $doctor_contactforms,
				'save_always' => true,
				'description' => esc_html__( 'Choose previously created contact form from the drop down list.', 'doctor-toolkit' ),
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two','three' ) ),
			),
		),
	) );
}
?>