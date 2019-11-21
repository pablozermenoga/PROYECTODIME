<?php
/* Page Metabox */
$page_subtitle = "";
$page_subtitle = get_post_meta( doctor_get_the_ID(), 'doctor_cf_page_subtitle', true );

$page_banner = "";
$page_banner  = get_post_meta( doctor_get_the_ID(), 'doctor_cf_page_header_img', true );

/* Page Banner */
$header_image = "";
if( $page_banner != "" ) {
	$header_image = $page_banner;
}
elseif( doctor_options("opt_pageheader_img", "url") != "" ) {
	$header_image = doctor_options("opt_pageheader_img", "url");
}
else {
	$header_image = DOCTOR_IMGURI . '/banner-bg.jpg';
}

if(is_search()) {
	if( doctor_options("opt_search_bg", "url") != "" ) {
		$header_image = doctor_options("opt_search_bg", "url");
	}
	else {
		$header_image = DOCTOR_IMGURI . '/banner-bg.jpg';
	}
}

if(is_404()) {
	if( doctor_options("opt_404_bg", "url") != "" ) {
		$header_image = doctor_options("opt_404_bg", "url");
	}
	else {
		$header_image = DOCTOR_IMGURI . '/banner-bg.jpg';
	}
}
?>
<!-- Page Banner -->
	<div class="page-banner container-fluid no-left-padding no-right-padding custombg_overlay" style="
		background-image: url(<?php echo esc_url( $header_image ); ?>);
		<?php if( doctor_options("opt_pageheader_height") != "" ) { ?> min-height: <?php echo doctor_options("opt_pageheader_height"); ?>px;<?php } ?>
		">
		<!-- Container -->
		<div class="container">
			<h3><?php
				if( is_home() ) {
					esc_html_e( 'Blog', "doctor" );
				}
				elseif( is_404() ) {
					esc_html_e( 'Page Not Found', "doctor" );
				}
				elseif( is_search() ) {
					printf( esc_html__( 'Search Results for: %s', "doctor" ), get_search_query() );
				}
				elseif( is_archive() ) {
					the_archive_title();
				}
				else {
					the_title();
				}
				if( $page_subtitle != "" ) { 
					?><span class="page-subtitle"><?php echo esc_attr($page_subtitle);?></span><?php 
				}
				?></h3>		
		</div><!-- Container /- -->		
		<?php
			if( function_exists( 'bcn_display' ) ) {
				?>
				<div class="breadcrumb">
					<div class="container">
						<div class="breadcrumb-content">
							<?php bcn_display(); ?>
						</div>
					</div>
				</div>
				<?php
			}
		?>
	</div>