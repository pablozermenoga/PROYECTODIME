<?php
function doctor_googlemap( $atts ) {
	
	extract( shortcode_atts( array( 'layout' =>'one','vc_map_lati' => '','vc_map_longi' => '', 'vc_address' => '', 'vc_marker' => '', 'vc_zoomlevel' => '' ), $atts ) );
	
	if( '' === $vc_zoomlevel ) :
		$vc_zoomlevel = 10;		
	endif;
	
	ob_start();
	
	if($layout == "one") {
		if($vc_map_lati != "" && $vc_map_longi != "") {
			?>
			<!-- Map Section -->
			<div class="container">
				<div class="map map-section-one">
					<div class="map-canvas" id="map-canvas-contact" data-lat="<?php echo esc_attr( $vc_map_lati ); ?>" data-lng="<?php echo esc_attr( $vc_map_longi ); ?>" data-string="<?php echo esc_attr( $vc_address ); ?>" data-marker="<?php if($vc_marker != "" ){ echo esc_url(wp_get_attachment_url($vc_marker,"full")); } else { echo esc_url( DOCTOR_LIB ).'images/marker.png'; }?>" data-zoom="<?php echo esc_attr( $vc_zoomlevel ); ?>"></div>
				</div><!--  Map Section /- -->
			</div>
			<?php
		}
	}
	else if($layout == "two") {
		if($vc_map_lati != "" && $vc_map_longi != "") {
			?>
			<!-- Map Section -->
			<div class="map container-fluid no-left-padding no-right-padding map-section-two">
				<div class="map-canvas-contact-1" id="map-canvas-contact-1" data-lat="<?php echo esc_attr( $vc_map_lati ); ?>" data-lng="<?php echo esc_attr( $vc_map_longi ); ?>" data-string="<?php echo esc_attr( $vc_address ); ?>." data-marker="<?php if($vc_marker != "" ){ echo esc_url(wp_get_attachment_url($vc_marker,"full")); } else { echo esc_url( DOCTOR_LIB ).'images/marker.png'; }?>" data-zoom="<?php echo esc_attr( $vc_zoomlevel ); ?>"></div>
			</div><!--  Map Section /- -->
			<?php
		}
	}
	
	return ob_get_clean();
}

add_shortcode('doctor_googlemap', 'doctor_googlemap');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_googlemap',
		'name' => esc_html__( 'Google Map', "doctor-toolkit" ),
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
				'type' => 'textfield',
				'heading' => esc_html__( 'Map Latitute', "doctor-toolkit" ),
				'param_name' => 'vc_map_lati',
				"description" => esc_html("e.g : -37.817214", "doctor-toolkit"),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Map Longitute', "doctor-toolkit" ),
				'param_name' => 'vc_map_longi',
				"description" => esc_html("e.g : 144.955925", "doctor-toolkit"),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Marker Address', "doctor-toolkit" ),
				'param_name' => 'vc_address',
				"description" => esc_html("e.g : Washington Square park, NY, United states.", "doctor-toolkit"),
				'holder' => 'div',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Map ZoomLevel", "doctor-toolkit"),
				"description" => esc_html("Maximum upto 10 Level", "doctor-toolkit"),
				"param_name" => "vc_zoomlevel",
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Marker Image', "doctor-toolkit" ),
				'param_name' => 'vc_marker',
			),
		),
	) );
}
?>