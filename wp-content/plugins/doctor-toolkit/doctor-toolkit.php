<?php
/**
 * Plugin Name:  Doctor Toolkit
 * Plugin URI:   http://www.onistaweb.com/
 * Description:  An easy to use theme plugin to add custom features to WordPress Theme.
 * Version:      1.1
 * Author:       Onista Web
 * Author URI:   http://www.onistaweb.com/
 * Author Email: onistaweb@gmail.com
 *
 * @package    DOCTOR_Theme_Toolkit
 * @since      1.0
 * @author     Onista Web
 * @copyright  Copyright (c) 2015-2016, Onista Web
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class DOCTOR_Theme_Toolkit {

	/**
	 * PHP5 constructor method.
	 *
	 * @since  1.0
	 */
	public function __construct() {

		// Set constant path to the plugin directory.
		add_action( 'plugins_loaded', array( &$this, 'doctor_constants' ), 1 );

		// Internationalize the text strings used.
		add_action( 'plugins_loaded', array( &$this, 'doctor_i18n' ), 2 );

		// Load the plugin functions files.
		add_action( 'plugins_loaded', array( &$this, 'doctor_includes' ), 3 );

		// Loads the admin styles and scripts.
		add_action( 'admin_enqueue_scripts', array( &$this, 'doctor_admin_scripts' ) );

		// Loads the frontend styles and scripts.
		add_action( 'wp_enqueue_scripts', array( &$this, 'doctor_frontend_scripts' ) ); 
	}

	/**
	 * Defines constants used by the plugin.
	 *
	 * @since  1.0
	 */
	public function doctor_constants() {

		// Set constant path to the plugin directory.
		define( 'DOCTOR_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

		// Set the constant path to the plugin directory URI.
		define( 'DOCTOR_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		// Set the constant path to the inc directory.
		define( 'DOCTOR_INC', DOCTOR_DIR . trailingslashit( 'includes' ) );

		// Set the constant path to the shortcodes directory.
		define( 'DOCTOR_SC', DOCTOR_DIR . trailingslashit( 'shortcodes' ) );

		// Set the constant path to the assets directory.
		define( 'DOCTOR_LIB', DOCTOR_URI . trailingslashit( 'lib' ) );
	}

	/**
	 * Loads the translation files.
	 *
	 * @since  0.1.0
	 */
	public function doctor_i18n() {
		load_plugin_textdomain( "doctor-toolkit", false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Loads the initial files needed by the plugin.
	 *
	 * @since  0.1.0
	 */
	public function doctor_includes() {

		// Load CPT, CMB, Widgets
		require_once( DOCTOR_INC . 'inc.php' );
		require_once( DOCTOR_SC . 'inc.php' );
	}

	/**
	 * Loads the admin styles and scripts.
	 *
	 * @since  0.1.0
	 */
	function doctor_admin_scripts() {
		
		// Loads the popup custom style.
		wp_enqueue_style( 'doctor-toolkit-admin', trailingslashit( DOCTOR_LIB ) . 'css/admin.css', array(), '1.0', 'all' );
		wp_enqueue_script( 'doctor-toolkit-admin' , trailingslashit( DOCTOR_LIB ) . 'js/admin.js', array( 'jquery' ), '1.0', false );
	}

	/**
	 * Loads the frontend styles and scripts.
	 *
	 * @since  0.1.0
	 */
	 
	function doctor_frontend_scripts() {
		/* Google Map */
		$map_api = "";
		
		if( function_exists('doctor_options') ) {
			$map_api = doctor_options("map_api");
		}
		if( $map_api != "" ) {
			wp_enqueue_script( 'gmap-api', 'https://maps.googleapis.com/maps/api/js?key='.$map_api.'&callback=initMap', array(), null, true );
		}
		else {			
			wp_enqueue_script( 'gmap-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array(), null, true );
		}
		wp_enqueue_style( 'doctor-toolkit', trailingslashit( DOCTOR_LIB ) . 'css/plugin.css', array(), '1.0', 'all' );
		wp_enqueue_script( 'doctor-toolkit' , trailingslashit( DOCTOR_LIB ) . 'js/plugin.js', array( 'jquery' ), '1.0', false );
	}
	
}

new DOCTOR_Theme_Toolkit;