<?php
/**
 * Theme functions and definitions
*/

/* Include Core */
require_once( trailingslashit( get_template_directory() ) . 'include/inc.php' );
require_once( trailingslashit( get_template_directory() ) . 'admin/inc.php' );

/* ************************************************************************ */

if( !function_exists('doctor_get_the_ID') ) :

	function doctor_get_the_ID() {

		if( class_exists( 'WooCommerce' ) && wc_get_page_id('shop') != "-1" && is_shop() ) {
			$post_id = wc_get_page_id('shop');
		}
		else {
			$post_id = get_the_ID();
		}

		return ! empty( $post_id ) ? $post_id : false;
	}
endif;

/* ************************************************************************ */

/* Redux Options */
if( !function_exists('doctor_options') ) :

	function doctor_options( $option, $arr = null ) {

		global $doctor_option;

		if( $arr ) {

			if( isset( $doctor_option[$option][$arr] ) ) {
				return $doctor_option[$option][$arr];
			}
		}
		else {
			if( isset( $doctor_option[$option] ) ) {
				return $doctor_option[$option];
			}
		}
	}

endif;

/* ************************************************************************ */

if( ! function_exists('doctor_allowhtmltags') ) :

	// Create function which allows more tags within comments
	function doctor_allowhtmltags() {

		global $doctor_allowedtags;

		$doctor_allowedtags['h1'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['h2'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['h3'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['h4'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['h5'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['h6'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['em'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['i'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['li'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['button'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['ul'] = array( 'class' => array(), 'style' => array() );		
		$doctor_allowedtags['ol'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['pre'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['blockquote'] = array( 'style' => array() );
		$doctor_allowedtags['<!--more-->'] = array();
		$doctor_allowedtags['p'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['del'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['span'] = array( 'class' => array(), 'style' => array() );
		$doctor_allowedtags['code'] = array( 'class' => array());
		$doctor_allowedtags['strong'] = array( 'class'=> array(), 'style' => array() );
		$doctor_allowedtags['ins'] = array( 'datetime' => array() );
		$doctor_allowedtags['img'] = array( 'class' => array(), 'src' => array(), 'alt' => array(), 'style' => array() );
		$doctor_allowedtags['a'] = array( 'class' => array(), 'href' => array(), 'target' => array(), 'title' => array(), 'style' => array() );

		return $doctor_allowedtags;
	}
endif;

/* ************************************************************************ *

/**
 * Filters all menu item URLs for a #placeholder#.
 *
 * @param WP_Post[] $menu_items All of the nave menu items, sorted for display.
 *
 * @return WP_Post[] The menu items with any placeholders properly filled in.
 */
function doctor_dynamic_menu_items( $menu_items ) {

    foreach ( $menu_items as $menu_item ) {

		$url = substr( $menu_item->url, 0, 1);

        if ( '#' === $url && !is_front_page() ) {
			$menu_item->url = trailingslashit( home_url() ) . $menu_item->url;
        }
    }

    return $menu_items;
}
add_filter( 'wp_nav_menu_objects', 'doctor_dynamic_menu_items' );



/* ************************************************************************ */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see doctor_content_width()
 *
 * @since Doctor 1.0
 */
if ( ! isset( $content_width ) ) { $content_width = 474; }


/**
 * Adjust content_width value for image attachment template.
 *
 * @since Doctor 1.0
 */
if( !function_exists('doctor_content_width') ) :

	function doctor_content_width() {
		if ( is_attachment() && wp_attachment_is_image() ) { $GLOBALS['content_width'] = 810; }
	}
	add_action( 'template_redirect', 'doctor_content_width' );
endif;

/* ************************************************************************ */

/**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Doctor 1.0
 */
if( !function_exists('doctor_theme_setup') ) :

	function doctor_theme_setup() {

		/* load theme languages */
		load_theme_textdomain( "doctor", get_template_directory() . '/languages' );

		/* Image Sizes */
		set_post_thumbnail_size( 851, 350, true ); /* Default Featured Image */
		
		add_image_size( 'doctor_230_190', 230, 190,true ); /* Galley Thumb */
		add_image_size( 'doctor_1170_500', 1170, 500,true ); /* Galley Image */

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'doctor_primary_nav'   => esc_html__( 'Primary Menu', "doctor" ),	
			'doctor_submenu_nav'   => esc_html__( 'Sub Menu', "doctor" ),	
		) );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'doctor_theme_setup' );
endif;

/* ************************************************************************ */

/* Google Font */
if( !function_exists('doctor_fonts_url') ) :

	function doctor_fonts_url() {

		$fonts_url = '';
		
		$lato = _x( 'on', 'Lato font: on or off', "doctor" );
		$montserrat_alternates = _x( 'on', 'Montserrat Alternates font: on or off', "doctor" );
		$montserrat = _x( 'on', 'Montserrat font: on or off', "doctor" );
		$open_sans = _x( 'on', 'Open Sans font: on or off', "doctor" );
		$playfair_display = _x( 'on', 'Playfair Display font: on or off', "doctor" );
		$poppins = _x( 'on', 'Poppins font: on or off', "doctor" );
		$quattrocento = _x( 'on', 'Quattrocento font: on or off', "doctor" );
		$raleway = _x( 'on', 'Raleway font: on or off', "doctor" );
		$roboto = _x( 'on', 'Roboto font: on or off', "doctor" );
	
		if ( 'off' !== $lato || 'off' !== $montserrat_alternates || 'off' !== $montserrat || 'off' !== $open_sans || 'off' !== $playfair_display || 'off' !== $poppins ||  'off' !== $quattrocento ||  'off' !== $raleway ||  'off' !== $roboto) {

			$font_families = array();

			if ( 'off' !== $lato ) {
				$font_families[] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i';
			}
			
			if ( 'off' !== $montserrat_alternates ) {
				$font_families[] = 'Montserrat Alternates:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
			}
			
			if ( 'off' !== $montserrat ) {
				$font_families[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
			}
			if ( 'off' !== $open_sans ) {
				$font_families[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
			}
			if ( 'off' !== $playfair_display ) {
				$font_families[] = 'Playfair Display:400,400i,700,700i,900,900i';
			}
			if ( 'off' !== $poppins ) {
				$font_families[] = 'Poppins:300,400,500,600,700';
			}
			if ( 'off' !== $quattrocento ) {
				$font_families[] = 'Quattrocento:400,700';
			}
			if ( 'off' !== $raleway ) {
				$font_families[] = 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
			}
			if ( 'off' !== $roboto ) {
				$font_families[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
			}
			
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;

/* ************************************************************************ */

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Doctor 1.0
 */
if( !function_exists('doctor_enqueue_scripts') ) :

	function doctor_enqueue_scripts() {

		$theme = wp_get_theme("doctor");
		$version = $theme['Version'];

		// Load the html5 shiv.
		wp_enqueue_script( 'respond.min', get_template_directory_uri() . '/assets/js/html5/respond.min.js', array(), '3.7.3' );
		wp_script_add_data( 'respond.min', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		/* Google Font */
		if( function_exists('doctor_fonts_url') ) :
			wp_enqueue_style( 'doctor-fonts', doctor_fonts_url() );
		endif;

		wp_enqueue_style( 'dashicons' );

		/* Lib */
		wp_enqueue_style( 'doctor-lib', get_template_directory_uri() . '/assets/css/lib.css');
		wp_enqueue_style( 'doctor-slick', get_template_directory_uri() . '/assets/js/slick/slick.css');
		wp_enqueue_style( 'doctor-slick-theme', get_template_directory_uri() . '/assets/js/slick/slick-theme.css');
		wp_enqueue_script( 'doctor-lib', get_template_directory_uri() . '/assets/js/lib.js', array( 'jquery' ), $version, true );
		wp_enqueue_script( 'slick.min', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array( 'jquery' ), $version, true );

		wp_add_inline_script( 'doctor-lib', '
			var templateUrl = "'.esc_url( get_template_directory_uri() ).'";
			var WPAjaxUrl = "'.admin_url( 'admin-ajax.php' ).'";
		');

		/* Main Style */
		wp_enqueue_style( 'doctor-plugins', get_template_directory_uri() . '/assets/css/plugins.css');
		wp_enqueue_style( 'doctor-elements', get_template_directory_uri() . '/assets/css/elements.css');
		wp_enqueue_style( 'doctor-header', get_template_directory_uri() . '/assets/css/header.css');
		wp_enqueue_style( 'doctor-wordpress', get_template_directory_uri() . '/assets/css/wordpress.css');

		/* RTL Style */
		if( doctor_options('opt_rtl_switch') == '1' ) {	 
			wp_enqueue_style( 'doctor-rtl', get_template_directory_uri() . '/assets/css/rtl.css');
		}

		if( doctor_options('opt_select_stylesheet') != "" ) :
			$current_style = doctor_options('opt_select_stylesheet');
		else :
			$current_style = 'default'; 
		endif;
		
		wp_enqueue_style( 'doctor-theme-color', get_template_directory_uri() . '/assets/css/color-schemes/'.$current_style.'.css', array(), '3.2' );
		
		wp_enqueue_script( 'doctor-functions', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), $version, true );
		wp_enqueue_style( 'doctor-stylesheet', get_template_directory_uri() . '/style.css' );

		/* Custom CSS */
		$custom_css = "
			@media (min-width: 992px) {
				".doctor_options("custom_css_desktop")."
			}
			@media (max-width: 991px) {
				".doctor_options("custom_css_tablet")."
			}
			@media (max-width: 767px) {
				".doctor_options("custom_css_mobile")."
			}			
		";
		wp_add_inline_style( 'doctor-stylesheet', $custom_css );
		
	}
	add_action( 'wp_enqueue_scripts', 'doctor_enqueue_scripts' );
endif;

/* ************************************************************************ */
/**
 * Extend the default WordPress body classes.
 *
 * @since Doctor 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
if( !function_exists('doctor_body_classes') ) :

	function doctor_body_classes( $classes ) {

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = "singular";
		}

		if( is_front_page() && !is_home() ) {
			$classes[] = "front-page";
		}

		if( is_404() ) {
			$classes[] = "404-template";
		}
		
		if( get_post_meta( doctor_get_the_ID(), 'doctor_cf_bodylayout', true ) == "pagefull" ) {
			$classes[] = "full-viewpage";
		}
		elseif( get_post_meta( doctor_get_the_ID(), 'doctor_cf_bodylayout', true ) == "pagebox" ) {
			$classes[] = "boxed-layout";
		}
			
		return $classes;

	}
	add_filter( 'body_class', 'doctor_body_classes' );

endif;


/* ************************************************************************ */

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Doctor 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
if( !function_exists('doctor_post_classes') ) :

	function doctor_post_classes( $classes ) {
		if ( ! is_attachment() && has_post_thumbnail() ) { $classes[] = 'has-post-thumbnail'; }
		return $classes;
	}
	add_filter( 'post_class', 'doctor_post_classes' );

endif;

if( !function_exists ("doctor_bg_image") ) {
	function doctor_bg_image() {
		$bodybg = "";
		if( doctor_options("opt_boxedlayout_bg", "url") != "" ) {
			$bodybg .= "body.boxed-layout:before { background-image: url(" . esc_url( doctor_options("opt_boxedlayout_bg", "url") ) . "); }"; 
		}
		else {
			$bodybg .= "body.boxed-layout:before { background-image: url(" . esc_url( DOCTOR_IMGURI . '/box-layout-bg.jpg' ) . "); }"; 
		}
		echo '<style  type="text/css">'. $bodybg . '</style>';
	}
	add_filter( 'wp_head', 'doctor_bg_image' );
}

/* Visual Composer - Plugin Update Setting */
if( function_exists('vc_set_as_theme') ) {
	vc_set_as_theme();
}
?>