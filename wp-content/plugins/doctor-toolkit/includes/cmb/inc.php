<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

if( ! function_exists("doctor_get_sidebars") ) {

	function doctor_get_sidebars() {

		global $wp_registered_sidebars;

		$sidebar_options = array();

		$dwidgetarea = array( "" => "Select an Option" );

		foreach ( $wp_registered_sidebars as $sidebar ) {
			$sidebar_options[$sidebar['id']] = $sidebar['name'];
		}
		return array_merge( $dwidgetarea, $sidebar_options );
	}
}
add_action( 'cmb2_init', 'register_doctor_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function register_doctor_metabox() {
	
	$navmenu_select = array();
	
	$doctor_navmenu = wp_get_nav_menus();
	
	$dnavmenu = array( "" => "Select an Option" );
	
	foreach( $doctor_navmenu as $navmenu ) {
		$navmenu_select[$navmenu->slug] = $navmenu->name;
	}
	
	$fnavmenu_select = array_merge( $dnavmenu, $navmenu_select);

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'doctor_cf_';

	/* ## Page/Post Options ---------------------- */

	/* - Page Description */
	$cmb_page = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page',
		'title'         => esc_html__( 'Page Options', "doctor-toolkit" ),
		'object_types'  => array( 'page', 'post','doctor_gallery' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$cmb_page->add_field( array(
		'name'             => 'Content Area Padding',
		'desc'             => 'If your content section need to have just after header area without space, please select an option Off',
		'id'               => $prefix . 'content_padding',
		'type'             => 'select',
		'default'          => 'on',
		'options'          => array(
			'on' => esc_html__( 'On', "doctor-toolkit" ),
			'off'   => esc_html__( 'Off', "doctor-toolkit" ),
		),
	) );

	$cmb_page->add_field( array(
		'name'             => 'Page Layout',
		'desc'             => 'Select an option',
		'id'               => $prefix . 'page_owlayout',
		'type'             => 'radio',
		'default'          => 'none',
		'options'          => array(
			'none' =>  '<img title="Default" src="'. DOCTOR_LIB .'/images/none.png" />',
			'fixed' =>  '<img title="Fixed" src="'. DOCTOR_LIB .'/images/boxed.png" />',
			'fluid' =>  '<img title="Fluid" src="'. DOCTOR_LIB .'/images/full.png" />'
		),
	) );
	
	$cmb_page->add_field( array(
		'name'             => 'Sidebar Position',
		'desc'             => 'Select an option',
		'id'               => $prefix . 'sidebar_owlayout',
		'type'             => 'radio',
		'default'          => 'none',
		'options'          => array(
			'none' =>  '<img src="'. DOCTOR_LIB .'/images/none.png" />',
			'right_sidebar' =>  '<img src="'. DOCTOR_LIB .'/images/right_side.png" />',
			'left_sidebar' =>  '<img src="'. DOCTOR_LIB .'/images/left_side.png" />',
			'no_sidebar' =>  '<img src="'. DOCTOR_LIB .'/images/no_side.png" />',
		),
	) );
	
	$cmb_page->add_field( array(
		'name'             => 'Widget Area',
		'desc'             => 'Select an option',
		'id'               => $prefix . 'widget_area',
		'type'             => 'select',
		'options'          => doctor_get_sidebars(),
	) );
	
	$cmb_page->add_field( array(
		'name'             => 'Select Header Style',
		'id'               => $prefix . 'header_style',
		'type'             => 'select',
		'default'          => 'default',
		'options'          => array(
			'' => esc_html__( 'Select Style', "doctor-toolkit" ),
			'1'   => esc_html__( 'Style 1', "doctor-toolkit" ),
			'2'   => esc_html__( 'Style 2', "doctor-toolkit" ),
			'3'   => esc_html__( 'Style 3', "doctor-toolkit" ),
			'4'   => esc_html__( 'Style 4', "doctor-toolkit" ),
			'5'   => esc_html__( 'Style 5', "doctor-toolkit" ),
			'6'   => esc_html__( 'Style 6', "doctor-toolkit" ),
			'7'   => esc_html__( 'Style 7', "doctor-toolkit" ),
			'8'   => esc_html__( 'Style 8', "doctor-toolkit" ),
			'9'   => esc_html__( 'Style 9', "doctor-toolkit" ),
			'10'   => esc_html__( 'Style 10', "doctor-toolkit" ),
			'11'   => esc_html__( 'Style 11', "doctor-toolkit" ),
			'12'   => esc_html__( 'Style 12', "doctor-toolkit" ),
			'13'   => esc_html__( 'Style 13', "doctor-toolkit" ),
			'14'   => esc_html__( 'Style 14', "doctor-toolkit" ),
			'15'   => esc_html__( 'Style 15', "doctor-toolkit" ),
			'16'   => esc_html__( 'Style 16', "doctor-toolkit" ),
			'17'   => esc_html__( 'Style 17', "doctor-toolkit" ),
			'18'   => esc_html__( 'Style 18', "doctor-toolkit" ),
			'19'   => esc_html__( 'Style 19', "doctor-toolkit" ),
			'20'   => esc_html__( 'Style 20', "doctor-toolkit" ),
		),
	) );
	
	$cmb_page->add_field( array(
		'name'             => 'Select Menu',
		'id'               => $prefix . 'page_navmenu',
		'type'             => 'select',
		'options'          => $fnavmenu_select,
		
	) );
	
	$cmb_page->add_field( array(
		'name'             => 'Body Content Layout',
		'id'               => $prefix . 'bodylayout',
		'type'             => 'select',
		'default'          => 'pagefull',
		'options'          => array(
			'pagefull' => esc_html__( 'Full View', "doctor-toolkit" ),
			'pagebox'   => esc_html__( 'Boxed View', "doctor-toolkit" ),
		),
	) );
	
	$cmb_page->add_field( array(
		'name' => esc_html__( 'Page Specific Image Logo', "doctor-toolkit" ),
		'id'   => $prefix . 'custom_logo',
		'type' => 'file',
	) );
	
	$cmb_page->add_field( array(
		'name'             => 'Page Header',
		'desc'             => 'Select an option',
		'id'               => $prefix . 'page_title',
		'type'             => 'select',
		'default'          => 'enable',
		'options'          => array(
			'enable' => esc_html__( 'Enable', "doctor-toolkit" ),
			'disable'   => esc_html__( 'Disable', "doctor-toolkit" ),
		),
	) );

	$cmb_page->add_field( array(
		'name' => esc_html__( 'Header Image', "doctor-toolkit" ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', "doctor-toolkit" ),
		'id'   => $prefix . 'page_header_img',
		'type' => 'file',
	) );

	$cmb_page->add_field( array(
		'name' => esc_html__( 'Sub Title', "doctor-toolkit" ),
		'id'   => $prefix . 'page_subtitle',
		'type' => 'text',
	) );
	
	$prefix_cmb = "cmb_";

	/* ## Post Options ---------------------- */
	require_once( $prefix_cmb . "post.php");

	/* ## Gallery Options ---------------------- */
	require_once( $prefix_cmb . "gallery.php");	
}
?>