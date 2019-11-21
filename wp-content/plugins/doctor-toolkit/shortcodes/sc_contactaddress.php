<?php
function doctor_cntaddress( $atts ) {
	
	extract( shortcode_atts( array( 'layout' =>'one', 'sc_phone_icon'=> '','sc_email_icon'=> '','sc_address_icon'=> '', 'sc_social_icon'=> '', 'sc_phone' =>'', 'sc_email'=>'','sc_address'=>'', 'fb_url'=>'', 'tw_url'=>'', 'ln_url'=>'', 'tumblr_url'=>'', 'vimeo_url'=>'', 'pinterest_url'=>'','instagram_url'=>'','dribbble_url'=>'', 'tumblr_url'=>'' ), $atts ) );
	
	ob_start();
	
	if( $layout == "one" ) {
		?>
		<div class="container">
			<div class="contact-us">
				<?php
					if($sc_phone != "") {
						?><div class="contact-call-box"><p><?php if( $sc_phone_icon != "" ) { ?><i class="<?php echo esc_attr( $sc_phone_icon ); ?>"></i><?php } ?><a href="tel:<?php echo esc_attr(str_replace(" ", "", $sc_phone ) ); ?>" title="<?php echo esc_attr($sc_phone); ?>"><?php echo esc_attr($sc_phone); ?></a></p></div><?php
					}
					if($sc_email != "") {
						?><div class="contact-call-box"><p><?php if( $sc_email_icon != "" ) { ?><i class="<?php echo esc_attr( $sc_email_icon ); ?>"></i><?php } ?><a href="mailto:<?php echo esc_attr( $sc_email ); ?>" title="<?php echo esc_attr($sc_email); ?>"><?php echo esc_attr($sc_email); ?></a></p></div><?php
					}
					if($sc_address != "") {
						?><div class="contact-call-box"><p><?php if( $sc_address_icon != "" ) { ?><i class="<?php echo esc_attr( $sc_address_icon ); ?>"></i><?php } ?><?php echo esc_attr( $sc_address ); ?></p></div><?php
					}
					if($fb_url != "" || $tw_url != "" || $ln_url != "" || $tumblr_url != "" || $vimeo_url != "" || $pinterest_url != "" || $instagram_url != "" || $dribbble_url != "" ) {
						?>
						<div class="contact-call-box">
							<?php if($sc_social_icon != "") { ?><p><i class="<?php echo esc_attr($sc_social_icon); ?>"></i></p><?php } ?>
							<ul>
								<?php if($fb_url != "") { ?><li><a href="<?php echo esc_url($fb_url); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
								<?php if($tw_url != "") { ?><li><a href="<?php echo esc_url($tw_url); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
								<?php if($ln_url != "") { ?><li><a href="<?php echo esc_url($ln_url); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php } ?>
								<?php if($tumblr_url != "") { ?><li><a href="<?php echo esc_url($tumblr_url); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li><?php } ?>
								<?php if($vimeo_url != "") { ?><li><a href="<?php echo esc_url($vimeo_url); ?>" target="_blank"><i class="fa fa-vimeo"></i></a></li><?php } ?>
								<?php if($pinterest_url != "") { ?><li><a href="<?php echo esc_url($pinterest_url); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li><?php } ?>
								<?php if($instagram_url != "") { ?><li><a href="<?php echo esc_url($instagram_url); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php } ?>
								<?php if($dribbble_url != "") { ?><li><a href="<?php echo esc_url($dribbble_url); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li><?php } ?>
							</ul>
						</div>
						<?php
					}
				?>
			</div>
		</div>
		<?php
	}
	elseif( $layout == "two" ) {
		?>
		<div class="contact-us2 contact-us">
			<div class="contact-deatil container-fluid no-left-padding no-right-padding">
				<div class="container">
					<div class="row">
						<?php
							if($sc_phone != "") {
								?>
								<div class="col-md-3 col-sm-6 col-xs-6">
									<div class="contact-call-box">
										<p><?php if( $sc_phone_icon != "" ) { ?><i class="<?php echo esc_attr( $sc_phone_icon ); ?>"></i><?php } ?> <a href="tel:<?php echo esc_attr(str_replace(" ", "", $sc_phone ) ); ?>" title="<?php echo esc_attr($sc_phone); ?>"><?php echo esc_attr($sc_phone); ?></a></p>
									</div>
								</div>
								<?php
							}
							if($sc_email != "") {
								?>
								<div class="col-md-3 col-sm-6 col-xs-6">
									<div class="contact-call-box">
										<p><?php if( $sc_email_icon != "" ) { ?><i class="<?php echo esc_attr( $sc_email_icon ); ?>"></i><?php } ?> <a href="mailto:<?php echo esc_attr($sc_email); ?>" title="<?php echo esc_attr($sc_email); ?>"><?php echo esc_attr($sc_email); ?></a></p>
									</div>
								</div>
								<?php
							}
							if($sc_address != "") {
								?>
								<div class="col-md-3 col-sm-6 col-xs-6">
									<div class="contact-call-box">
										<p><?php if( $sc_address_icon != "" ) { ?><i class="<?php echo esc_attr( $sc_address_icon ); ?>"></i><?php } ?> <?php echo esc_attr($sc_address); ?></p>
									</div>
								</div>
								<?php
							}
							if($fb_url != "" || $tw_url != "" || $ln_url != "" || $tumblr_url != "" || $vimeo_url != "" || $pinterest_url != "" || $instagram_url != "" || $dribbble_url != "" ) {
								?>
								<div class="col-md-3 col-sm-6 col-xs-6">
									<div class="contact-call-box">
										<?php if($sc_social_icon != "") { ?><p><i class="<?php echo esc_attr($sc_social_icon); ?>"></i></p><?php } ?>
										<ul>
											<?php if($fb_url != "") { ?><li><a href="<?php echo esc_url($fb_url); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
											<?php if($tw_url != "") { ?><li><a href="<?php echo esc_url($tw_url); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
											<?php if($ln_url != "") { ?><li><a href="<?php echo esc_url($ln_url); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php } ?>
											<?php if($tumblr_url != "") { ?><li><a href="<?php echo esc_url($tumblr_url); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li><?php } ?>
											<?php if($vimeo_url != "") { ?><li><a href="<?php echo esc_url($vimeo_url); ?>" target="_blank"><i class="fa fa-vimeo"></i></a></li><?php } ?>
											<?php if($pinterest_url != "") { ?><li><a href="<?php echo esc_url($pinterest_url); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li><?php } ?>
											<?php if($instagram_url != "") { ?><li><a href="<?php echo esc_url($instagram_url); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php } ?>
											<?php if($dribbble_url != "") { ?><li><a href="<?php echo esc_url($dribbble_url); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li><?php } ?>
										</ul>
									</div>
								</div>
								<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	return ob_get_clean();
}

add_shortcode('doctor_cntaddress', 'doctor_cntaddress');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_cntaddress',
		'name' => esc_html__( 'Contact Address', "doctor-toolkit" ),
		'class' => '',
		"category" => esc_html__("Doctor Theme", "doctor-toolkit"),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Layout Type', "doctor-toolkit" ),
				'param_name' => 'layout',
				'description' => esc_html__( 'Default Layout 1 Set', "doctor-toolkit" ),
				'value' =>array(
					esc_html__('Layout 1',"doctor-toolkit") => 'one',
					esc_html__('Layout 2',"doctor-toolkit") => 'two',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Select Icon For Contact Phone', "doctor-toolkit" ),
				'param_name' => 'sc_phone_icon',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Contact Phone', "doctor-toolkit" ),
				'param_name' => 'sc_phone',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Select Icon For Email Address', "doctor-toolkit" ),
				'param_name' => 'sc_email_icon',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Contact Email', "doctor-toolkit" ),
				'param_name' => 'sc_email',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Select Icon For Contact Address', "doctor-toolkit" ),
				'param_name' => 'sc_address_icon',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Contact Address', "doctor-toolkit" ),
				'param_name' => 'sc_address',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Select Icon For Social', "doctor-toolkit" ),
				'param_name' => 'sc_social_icon',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Facebook URL', "doctor-toolkit" ),
				'param_name' => 'fb_url',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Twitter URL', "doctor-toolkit" ),
				'param_name' => 'tw_url',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Linkedin URL', "doctor-toolkit" ),
				'param_name' => 'ln_url',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Tumblr URL', "doctor-toolkit" ),
				'param_name' => 'tumblr_url',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Vimeo URL', "doctor-toolkit" ),
				'param_name' => 'vimeo_url',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Pinterest URL', "doctor-toolkit" ),
				'param_name' => 'pinterest_url',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Instagram URL', "doctor-toolkit" ),
				'param_name' => 'instagram_url',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Dribbble URL', "doctor-toolkit" ),
				'param_name' => 'dribbble_url',
				"dependency" => Array('element' => "layout", 'value' => array( 'one','two' ) ),
			),
		),
	) );
}
?>