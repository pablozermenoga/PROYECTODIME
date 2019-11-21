<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Doctor
* @since Doctor 1.0
*/
?>

<?php get_template_part("template-parts/blog","before"); ?>

<?php
if ( have_posts() ) :

	// Start the loop.
	while ( have_posts() ) : the_post();

		// Include the page content template.
		get_template_part( 'template-parts/content' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) : comments_template(); endif;

	// End the loop.
	endwhile;

	// Previous/next page navigation.
	the_posts_pagination( array(
		'prev_text'          => wp_kses( __( '<i class="fa fa-angle-double-left"></i> Prev', "doctor" ), array( 'i' => array( 'class' => array() ) ) ),
		'next_text'          => wp_kses( __( 'Next <i class="fa fa-angle-double-right"></i>', "doctor" ), array( 'i' => array( 'class' => array() ) ) ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', "doctor" ) . ' </span>',
	) );

// If no content, include the "No posts found" template.
else :
	get_template_part( 'template-parts/content', 'none' );

endif;
?>

<?php get_template_part("template-parts/blog","after"); ?>