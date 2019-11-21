<?php
/* Define Constants */
define( 'DOCTOR_IMGURI', get_template_directory_uri() . '/assets/images' );

/**
 * Register three widget areas.
 *
 * @since Doctor 1.0
 */
if ( ! function_exists( 'doctor_widgets_init' ) ) {
	function doctor_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Right Sidebar (Default for Blog)', "doctor" ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "doctor" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Left Sidebar', "doctor" ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "doctor" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 1', "doctor" ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "doctor" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 2', "doctor" ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "doctor" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 3', "doctor" ),
			'id'            => 'sidebar-5',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "doctor" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
	}
	add_action( 'widgets_init', 'doctor_widgets_init' );
}

require_once( trailingslashit( get_template_directory() ) . 'include/nav_walker.php' );
require_once( trailingslashit( get_template_directory() ) . 'include/page_walker.php' );
require_once( trailingslashit( get_template_directory() ) . 'include/postlike/postlike.php' );