<?php
function doctor_gallery( $atts ) {
	
	extract( shortcode_atts( array( 'layout' =>'one','sc_title' => '', 'posts_display' => '' ), $atts ) );
	
	$ow_post_type = 'doctor_gallery';
	$ow_post_tax = 'doctor_gallery_tax';
	
	$tax_args = array(
		'hide_empty' => false
	);

	if( '' === $posts_display ) :
		$posts_display = 9;		
	endif;
	
	$qry = new WP_Query( array(
		'post_type' => $ow_post_type,
		'posts_per_page' => $posts_display,
	) );
	
	$unexpected_str = array(" ","&","amp;",",",".","/");
	$terms = get_terms( $ow_post_tax, $tax_args );
	
	ob_start();
	
	if($layout == "one") {
		?>
		<!-- Gallery Section -->
		<div id="gallery-section" class="gallery-section container-fluid no-left-padding no-right-padding">
			<!-- Container -->
			<div class="container">
				<?php
					if($sc_title != ""){
						?>
						<!-- Section Header -->
						<div class="section-header">
							<h3><?php echo esc_attr($sc_title); ?></h3>
						</div>
						<?php
					}
				?>
				<ul id="filters" class="portfolio-categories no-left-padding">
					<li><a data-filter="*" class="active" href="#"><?php esc_html_e('Show All',"doctor-toolkit"); ?></a></li>
					<?php
					if (is_array( $terms ) ) {
						foreach ( $terms as $term ) {
							$termname = str_replace( $unexpected_str, '-', strtolower($term->name) );
							?><li><a data-filter=".<?php echo esc_attr( $termname ); ?>" href="#" title="<?php echo esc_attr ( $term->name ); ?>"><?php echo esc_attr ( $term->name ); ?></a></li><?php
						}
					}
					?>
				</ul>
				<ul class="portfolio-list">
					<?php
						while ( $qry->have_posts() ) : $qry->the_post();
							$taxonomies = "";
							$terms = get_the_terms( get_the_ID(), $ow_post_tax );
							$termsname = array();
							$terms_dashed = array();
							if ( is_array( $terms ) ) {
								foreach ( $terms as $term ) {
									$termsname[] = strtolower( $term->name );
									$unexpected_str = array(" ","&","amp;",",",".","/");
									$terms_dashed[] = str_replace( $unexpected_str, '-', strtolower( $term->name ) );
								}
								$taxonomies = implode(" ", $terms_dashed );
								$taxonomies_plus = implode(" + ", $termsname );
							}
							?>
							<li class="col-md-4 col-sm-4 col-xs-6 <?php echo esc_attr($taxonomies); ?>">
								<div class="content-image-block">
									<?php
										$url = "";
										$url = get_post_meta( get_the_ID(), 'doctor_cf_gallery_video_embed', true );
										
										if($url != "" ) {
											echo wp_oembed_get( esc_url ( get_post_meta( get_the_ID(), 'doctor_cf_gallery_video_embed', true ) ) );
											
										}
										else {
											the_post_thumbnail("doctor_384_384");
										}
									?>
									<div class="content-block-hover">
										<?php 
											if(get_post_meta( get_the_ID(), 'doctor_cf_gallery_subtitle', true ) != "") { 
												?><p><?php echo esc_attr( get_post_meta( get_the_ID(), 'doctor_cf_gallery_subtitle', true ) ); ?></p><?php 
											}
											the_title('<h5>','</h5>');
											if( function_exists('doctor_get_simple_likes_button') ) { 
												echo doctor_get_simple_likes_button( get_the_ID() );
											}
											if($url != "" ) {
												?><a class="popup-video" href="<?php echo esc_url( get_post_meta( get_the_ID(), 'doctor_cf_gallery_video_embed', true ) ); ?>" title="<?php the_title(); ?>"><i class="fa fa-expand"></i></a><?php
											}
											else {
												?><a class="zoom-in" href="<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>"><i class="fa fa-expand"></i></a><?php
											}
										?>
										<a href="<?php the_permalink(); ?>"><i class="fa fa-file-text-o"></i></a>
									</div>
								</div>
							</li>
							<?php
						endwhile;
						
						/* Reset Post Data */
						wp_reset_postdata();
					?>
				</ul>
			</div><!-- Container /- -->
		</div><!-- Gallery Section -->
		<?php
	}
	else if($layout == "two") {
		?>
		<!-- Gallery Section -->
		<div class="gallery-section gallery-section1 container-fluid no-left-padding no-right-padding">
			<!-- Container -->
			<div class="container">
				<ul id="filters" class="portfolio-categories no-left-padding">
					<li><a data-filter="*" class="active" href="#"><?php esc_html_e('Show All',"doctor-toolkit"); ?></a></li>
					<?php
						if ( is_array( $terms ) ) {
							foreach ( $terms as $term ) {
								$termname = str_replace( $unexpected_str, '-', strtolower($term->name) );
								?><li><a data-filter=".<?php echo esc_attr( $termname ); ?>" href="#" title="<?php echo esc_attr ( $term->name ); ?>"><?php echo esc_attr ( $term->name ); ?></a></li><?php
							}
						}
					?>
				</ul>
				<div class="gallery-img-list">
					<ul class="portfolio-list no-left-padding">
						<?php
						
							$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
							
							$qry_args = array( 'post_type' => $ow_post_type );
							
							doctor_wp_query( $qry_args );
							
							while ( have_posts() ) : the_post();
								$taxonomies = "";
								$terms = get_the_terms( get_the_ID(), $ow_post_tax );
								if ( is_array( $terms ) ) {
									foreach ( $terms as $term ) {
										$termsname[] = strtolower( $term->name );								
										$terms_dashed[] = str_replace( $unexpected_str, '-', strtolower( $term->name ) );
									}
									$taxonomies = implode(" ", $terms_dashed );
									$taxonomies_plus = implode(" + ", $termsname );
								}
								?>
								<li class="col-md-4 col-sm-4 col-xs-6 <?php echo esc_attr($taxonomies); ?>">
									<div class="content-image-block">
										<?php
											$url = "";
											$url = get_post_meta( get_the_ID(), 'doctor_cf_gallery_video_embed', true );
											
											if($url != "" ) {
												echo wp_oembed_get( esc_url ( get_post_meta( get_the_ID(), 'doctor_cf_gallery_video_embed', true ) ) );
												
											}
											else {
												 the_post_thumbnail("doctor_384_384");
											}
										?>
										<div class="content-block-hover">
											<?php 
												if(get_post_meta( get_the_ID(), 'doctor_cf_gallery_subtitle', true ) != "") { 
													?><span><?php echo esc_attr( get_post_meta( get_the_ID(), 'doctor_cf_gallery_subtitle', true ) ); ?></span><?php 
												}
												the_title('<h5>','</h5>');
												if( function_exists('doctor_get_simple_likes_button') ) { 
													echo doctor_get_simple_likes_button( get_the_ID() );
												}
												if($url != "" ) {
													?><a class="popup-video" href="<?php echo esc_url( get_post_meta( get_the_ID(), 'doctor_cf_gallery_video_embed', true ) ); ?>" title="<?php the_title(); ?>"><i class="fa fa-expand"></i></a><?php
												}
												else {
													?><a class="zoom-in" href="<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>"><i class="fa fa-expand"></i></a><?php
												}
											?>
											<a href="<?php the_permalink(); ?>"><i class="fa fa-file-text-o"></i></a>
										</div>
									</div>
								</li>
								<?php
							endwhile;
							
							?><li><?php
							// Previous/next page navigation.				
							the_posts_pagination( array(
								'prev_text'          => wp_kses( __( '<i class="fa fa-angle-double-left"></i> Prev', "doctor-toolkit" ), array( 'i' => array( 'class' => array() ) ) ),
								'next_text'          => wp_kses( __( 'Next <i class="fa fa-angle-double-right"></i>', "doctor-toolkit" ), array( 'i' => array( 'class' => array() ) ) ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', "doctor-toolkit" ) . ' </span>',
							) );?></li><?php
						
						// Restore original Post Data
						wp_reset_query();
						?>
					</ul>
				</div>
			</div><!-- Container /- -->
		</div><!-- Gallery Section -->
		<?php
	}
	return ob_get_clean();
}

add_shortcode('doctor_gallery', 'doctor_gallery');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_gallery',
		'name' => esc_html__( 'Gallery', "doctor-toolkit" ),
		'class' => '',
		"category" => esc_html__("Doctor Theme", "doctor-toolkit"),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Layout Type', "doctor-toolkit" ),
				'param_name' => 'layout',
				'description' => esc_html__( 'Default Layout 1 Set', "doctor-toolkit" ),
				'value' =>array(
					esc_html__('Layout 1',"doctor-toolkit") => 'one',
					esc_html__('Layout 2',"doctor-toolkit") => 'two',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', "doctor-toolkit" ),
				'param_name' => 'sc_title',
				'holder' => 'div',
				"dependency" => Array('element' => "layout", 'value' => array( 'one') ),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Post Per Page Display", "doctor-toolkit"),
				"param_name" => "posts_display",
				"holder" => "div",
				"dependency" => Array('element' => "layout", 'value' => array( 'one' ) ),
			),
		),
	) );
}
?>