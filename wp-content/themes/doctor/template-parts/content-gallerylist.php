<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Doctor
 * @since Doctor 1.0
 */ 

$ary_imgs =  "";
$gallery_details =  "";
$ary_imgs = get_post_meta( doctor_get_the_ID(), 'doctor_cf_gallery_imglist', true );
$gallery_details = get_post_meta( doctor_get_the_ID(), 'doctor_cf_gallery_grp', true );
?>
<!-- Gallery Single Section -->
<div class="gallery-single-section">
	<!-- Container -->
	<div class="container no-padding">
		<?php
			if( get_post_meta( get_the_ID(), 'doctor_cf_gallery_imglist', true ) != "" ) {
				?>
				<div class="flexslider gallery-details-full">
					<ul class="slides">
						<?php
							foreach ( (array) $ary_imgs as $attachment_id => $attachment_url ) {
								?><li><?php echo wp_get_attachment_image( $attachment_id, "doctor_1170_500" ); ?></li><?php
							}
						?>
					</ul>
				</div>
				<div class="flexslider gallery-details-thumb">
					<ul class="slides">
						<?php
							foreach ( (array) $ary_imgs as $attachment_id => $attachment_url ) {
								?><li><?php echo wp_get_attachment_image( $attachment_id, "doctor_230_190" ); ?></li><?php
							}
						?>
					</ul>
				</div>
				<?php
			}
		?>
		<div class="row">
			<?php
				if( get_post_meta( doctor_get_the_ID(), 'doctor_cf_gallery_grp', true ) != "" ) {
					?>
					<div class="col-md-4 col-sm-5 col-xs-6">
						<div class="info-box">
							<?php
								if( count( $gallery_details ) > 0 && is_array( $gallery_details ) ) {
									foreach ( (array) $gallery_details as $key => $value ) {
										if( isset( $value['grp_title'] ) && isset ($value['grp_value']) ){
											?>
											<div class="project-details">
												<h3><?php echo esc_attr( $value['grp_title'] ); ?><?php esc_html_e(':',"doctor"); ?></h3>
												<span><?php echo esc_attr( $value['grp_value'] );?></span>
											</div>
											<?php
										}
									}
								}
							?>
						</div>
					</div>
					<?php
				}
				if( get_post_meta( doctor_get_the_ID(), 'doctor_cf_gallery_information', true ) != "" ) {
					?>
					<div class="col-md-8 col-sm-7 col-xs-6">
						<div class="info-content">
							<?php
								if( get_post_meta( doctor_get_the_ID(), 'doctor_cf_info_title', true ) != "" ) {
									?><h3><?php echo esc_attr( get_post_meta( doctor_get_the_ID(), 'doctor_cf_info_title', true ) ); ?></h3><?php
								}
								else {
									?><h3><?php esc_html_e('information',"doctor");?></h3><?php
								}
								echo wpautop( wp_kses( get_post_meta( doctor_get_the_ID(), 'doctor_cf_gallery_information', true ), doctor_allowhtmltags() ) );
							?>
						</div>
					</div>
					<?php
				}
			?>
			<div class="gallery-info-content">
				<?php
					if(get_the_content() != "") {
						?>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="info-content">
								<?php
									if( get_post_meta( doctor_get_the_ID(), 'doctor_cf_desc_title', true ) != "" ) {
										?><h3><?php echo esc_attr( get_post_meta( doctor_get_the_ID(), 'doctor_cf_desc_title', true ) ); ?></h3><?php
									}
									else {
										?><h3><?php esc_html_e('DESCRIPTION',"doctor");?></h3><?php
									}
									the_content( sprintf(
										esc_html__( 'Continue reading %s', "doctor" ),
										the_title( '<span class="screen-reader-text">', '</span>', false )
									) );
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', "doctor" ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
										'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', "doctor" ) . ' </span>%',
										'separator'   => '<span class="screen-reader-text">, </span>',
									) );
								?>
							</div>
						</div>
						<?php
					}
					if( get_post_meta( doctor_get_the_ID(), 'doctor_cf_gallery_conclusion', true ) != "" ) {
						?>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="info-content">
								<?php
									if( get_post_meta( doctor_get_the_ID(), 'doctor_cf_conclusion_title', true ) != "" ) {
										?><h3><?php echo esc_attr( get_post_meta( doctor_get_the_ID(), 'doctor_cf_conclusion_title', true ) ); ?></h3><?php
									}
									else {
										?><h3><?php esc_html_e('CONCLUSION',"doctor");?></h3><?php
									}
									echo wpautop( wp_kses( get_post_meta( doctor_get_the_ID(), 'doctor_cf_gallery_conclusion', true ), doctor_allowhtmltags() ) );
								?>
							</div>
						</div>
						<?php
					}
				?>
			</div>
		</div>
	</div><!-- Container /- -->
</div><!-- Gallery Single Section /- -->