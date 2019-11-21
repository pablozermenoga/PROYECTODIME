<?php
if( !function_exists('doctor_copyright') ) :

	function doctor_copyright() {
		echo do_shortcode( wpautop( wp_kses( doctor_options("opt_footer_copyright"), doctor_allowhtmltags() ) ) );
	}
endif;

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

/**
 * Do the work to pagination work on custom post types listing pages.
 *
 * @param array $query args array, as it works on wordpress (dont use it as string)
 * @return array set global $posts and return it as well
 */
if( ! function_exists("doctor_wp_query") ) {

	function doctor_wp_query( array $qry_args = array() ) {

		global $wp_query;

		wp_reset_query();

		$paged = get_query_var('paged') ? get_query_var('paged') : 1;

		$defaults = array(
			'paged'	=> $paged,
			'posts_per_page' => 10
		);

		$qry_args += $defaults;

		$wp_query = new WP_Query( $qry_args );
	}
}

/* WPAUTOP Allow Html Tags */
if( ! function_exists('doctor_striptags') ) {
	
	function doctor_striptags() {

		$doctor_allowed_tags = array(
			'a' => array( 'class' => array(),'href'  => array(), 'rel'   => array(), 'title' => array(), ),
			'abbr' => array( 'title' => array(),),
			'b' => array(),
			'blockquote' => array( 'cite'  => array(),),
			'cite' => array('title' => array(),),
			'code' => array(),
			'del' => array( 'datetime' => array(), 'title' => array(),
			),
			'dd' => array(),
			'dl' => array(),
			'dt' => array(),
			'em' => array(),
			'h1' => array(),
			'h2' => array(),
			'h3' => array(),
			'h4' => array(),
			'h5' => array(),
			'h6' => array(),
			'i' => array(),
			'img' => array( 'alt'    => array(), 'class'  => array(), 'height' => array(),'src'    => array(),'width'  => array(),),
			'li' => array('class' => array(),),
			'ol' => array( 'class' => array(),),
			'p' => array('class' => array(),),
			'q' => array( 'cite' => array(), 'title' => array(), ),
			'span' => array( 'class' => array(), 'title' => array(), 'style' => array(),),
			'strong' => array(),
			'ul' => array( 'class' => array(), ),
		);
		
		return $doctor_allowed_tags;
	}
}
?>