<?php
if( !function_exists('doctor_sc_setup') ) {
	
	function doctor_sc_setup() {
		add_image_size( 'doctor_100_100', 100, 100 ,true  ); /* Blog Post Tab Widget for Popilar And Recent */
		add_image_size( 'doctor_370_461', 370, 461 ,true  ); /* About Us */
		add_image_size( 'doctor_240_274', 240, 274 ,true  ); /* Team */
		add_image_size( 'doctor_120_120', 120, 120 ,true  ); /* Testimonial */
		add_image_size( 'doctor_458_532', 458, 532 ,true  ); /* Medical Service */
		add_image_size( 'doctor_126_138', 126, 138 ,true  ); /* Tab Service */
		add_image_size( 'doctor_384_384', 384, 384 ,true  ); /* Gallery Layout 1 && 2 */
		add_image_size( 'doctor_570_340', 570, 340 ,true  ); /* Blog Section */
	}
	add_action( 'after_setup_theme', 'doctor_sc_setup' );
}

function doctor_currentYear() {
    return date('Y');
}
add_shortcode( 'year', 'doctor_currentYear' );

if( function_exists('vc_map') ) {

	vc_add_param("vc_row", array(
		"type" => "dropdown",
		"group" => "Page Layout",
		"class" => "",
		"heading" => "Type",
		"param_name" => "type",
		'value' => array(
			esc_html__( 'Default', "doctor-toolkit" ) => 'default-layout',
			esc_html__( 'Fixed', "doctor-toolkit" ) => 'container',
		),
	));
	
	vc_add_param("vc_row", array(
		"type" => "dropdown",
		"group" => "Page Layout",
		"class" => "",
		"heading" => "Section Padding",
		"param_name" => "spadding",
		'value' => array(
			esc_html__( 'No', "doctor-toolkit" ) => 'no',
			esc_html__( 'Yes', "doctor-toolkit" ) => 'yes',
		),
	));

	/* Include all individual shortcodes. */
	$prefix_sc = "sc_";

	require_once( $prefix_sc . "aboutus.php");
	require_once( $prefix_sc . "blogpost.php");
	require_once( $prefix_sc . "careers.php");
	require_once( $prefix_sc . "contactaddress.php");
	require_once( $prefix_sc . "contactform.php");
	require_once( $prefix_sc . "tabservicecnt.php");
	require_once( $prefix_sc . "departments.php");
	require_once( $prefix_sc . "extraservice.php");
	require_once( $prefix_sc . "gallery.php");
	require_once( $prefix_sc . "googlemap.php");
	require_once( $prefix_sc . "medicalservice.php");
	require_once( $prefix_sc . "offer.php");
	require_once( $prefix_sc . "otherservice.php");
	require_once( $prefix_sc . "partners.php");
	require_once( $prefix_sc . "team.php");
	require_once( $prefix_sc . "testimonial.php");
	require_once( $prefix_sc . "welcomeclinic.php");
	require_once( $prefix_sc . "sectiontitle.php");
}
?>