<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Doctor
* @since Doctor 1.0
*/
get_header(); ?>

<?php 
$error_image = "";
if( doctor_options("opt_error_img", "url") != "" ) {
	$error_image = doctor_options("opt_error_img", "url");
}
else {
	$error_image = DOCTOR_IMGURI . '/404.jpg';
}
?>
<main id="main" class="site-main">
	<!-- Container -->
	<div class="container">
		<div class="error-block container-fluid text-center">
			<?php
				if( doctor_options("opt_error_title") != "" ) {
					?><h2><?php echo esc_attr( doctor_options("opt_error_title") ); ?></h2><?php
				}
				else {
					?><h2><?php esc_html_e('404',"doctor"); ?></h2><?php
				}
				if( doctor_options("opt_error_subtitle") != "" ) {
					?><h3><?php echo esc_attr( doctor_options("opt_error_subtitle") ); ?></h3><?php
				}
				else {
					?><h3><?php esc_html_e('Oops Error ! This Page Not Found',"doctor"); ?></h3><?php
				}
			?>
			<div class="searh-block">
				<?php get_search_form(); ?>
			</div>
			<img src="<?php echo esc_url($error_image); ?>" alt="" />
		</div>
	</div><!-- Container /- -->
</main><!-- .site-main -->
<?php get_footer(); ?>