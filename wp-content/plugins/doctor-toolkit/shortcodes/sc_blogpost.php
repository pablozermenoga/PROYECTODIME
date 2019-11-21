<?php
function doctor_blogpost( $atts ) {
	
	extract( shortcode_atts( array( 'layout' =>'one','sc_title' => '', 'posts_display' => ''  ), $atts ) );
	
	$ow_post_type = 'post';

	if( '' === $posts_display ) :
		$posts_display = 2;		
	endif;
	
	$qry = new WP_Query( array(
		'post_type' => $ow_post_type,
		'posts_per_page' => $posts_display,
	) );
	
	ob_start();
	
	if($layout == "one") {
		?>
		<!-- Latest News -->
		<div class="latest-news container-fluid no-left-padding no-right-padding">
			<!-- Container -->
			<div class="container">
				<?php
					if($sc_title != "") {
						?>
						<!-- Section Header -->
						<div class="section-header">
							<h3><?php echo esc_attr($sc_title); ?></h3>
						</div><!-- Section Header /- -->
						<?php
					}
				?>
				<div class="row">
					<div class="news-carousel">
						<?php
							while ( $qry->have_posts() ) : $qry->the_post();
								$css = "";
								if( ! has_post_thumbnail() ) {
									$css = "no-post-thumbnail";
								}

								$css_content = "";
								if(get_the_content() != "" ){
									$css_content = "";
								}
								else {
									$css_content = " no-post-content";
								}
								$post_css = $css.$css_content;
								?>
								<div class="col-md-12">
									<article id="post-<?php the_ID(); ?>" <?php post_class($post_css); ?>>
										<div class="entry-cover">
											<?php
												if( get_post_format() == "gallery" && count( get_post_meta( get_the_ID(), 'doctor_cf_post_gallery', 1 ) ) > 0 && is_array( get_post_meta( get_the_ID(), 'doctor_cf_post_gallery', 1 ) ) ) {
													?>
													<div class="entry-cover">
														<!-- Carousel -->
														<div id="blog-carousel-<?php echo the_ID(); ?>" class="carousel slide" data-ride="carousel">
															<div class="carousel-inner" role="listbox">
																<?php
																$active=1;
																foreach ( (array) get_post_meta( get_the_ID(), 'doctor_cf_post_gallery', 1 ) as $attachment_id => $attachment_url ) {
																	?>
																	<div class="item<?php if( $active == 1 ) { echo ' active'; } ?>">
																		<?php echo wp_get_attachment_image( $attachment_id, 'doctor_570_340' ); ?>
																	</div>
																	<?php
																	$active++;
																} ?>
															</div>
															<a title="Previous" class="left carousel-control" href="#blog-carousel-<?php echo the_ID(); ?>" role="button" data-slide="prev">
																<span class="fa fa-chevron-left" aria-hidden="true"></span>
															</a>
															<a title="Next" class="right carousel-control" href="#blog-carousel-<?php echo the_ID(); ?>" role="button" data-slide="next">
																<span class="fa fa-chevron-right" aria-hidden="true"></span>
															</a>
														</div><!-- /.carousel -->
													</div>
													<?php
												}
											if( get_post_format() == "audio" ) {
												if( get_post_meta( get_the_ID(), 'doctor_cf_post_audio_source', 1 ) == "soundcloud_link" && get_post_meta( get_the_ID(), 'doctor_cf_post_soundcloud_url', 1 ) != "" ) {
													?>
													<iframe src="<?php echo esc_url( get_post_meta( get_the_ID(), 'doctor_cf_post_soundcloud_url', 1 ) ); ?>"></iframe>
													<?php
												}
												elseif( get_post_meta( get_the_ID(), 'doctor_cf_post_audio_source', 1 ) == "audio_upload_local" && get_post_meta( get_the_ID(), 'doctor_cf_post_audio_local', 1 ) != "" ) {
													?>
													<audio controls>
														<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'doctor_cf_post_audio_local', 1 ) ); ?>" type="audio/mpeg">
														<?php esc_html_e("Your browser does not support the audio element.","doctor-toolkit"); ?>
													</audio>
													<?php
												}
											}
											if( get_post_format() == "video" ) {
												if( get_post_meta( get_the_ID(), 'doctor_cf_post_video_source', 1 ) == "video_link" && get_post_meta( get_the_ID(), 'doctor_cf_post_video_link', 1 ) != "" ) {
													echo wp_oembed_get( esc_url( get_post_meta( get_the_ID(), 'doctor_cf_post_video_link', true ) ) );
												}
												elseif( get_post_meta( get_the_ID(), 'doctor_cf_post_video_source', 1 ) == "video_embed_code" && get_post_meta( get_the_ID(), 'doctor_cf_post_video_embed', 1 ) != "" ) {
													echo get_post_meta( get_the_ID(), 'doctor_cf_post_video_embed', 1 );
												}
												elseif( get_post_meta( get_the_ID(), 'doctor_cf_post_video_source', 1 ) == "video_upload_local" && get_post_meta( get_the_ID(), 'doctor_cf_post_video_local', 1 ) != "" ) {
													?>
													<video controls>
														<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'doctor_cf_post_video_local', 1 ) ); ?>" type="video/mp4">
														<?php esc_html_e("Your browser does not support the video tag.","doctor-toolkit"); ?>
													</video> 
													<?php			
												}
											}
											if( has_post_thumbnail() && ( get_post_format() != "audio" && get_post_format() != "video" && get_post_format() != "gallery" ) ) {
												?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('doctor_570_340'); ?></a><?php
											}	
											?>
											<div class="post-date-bg">
												<div class="post-date">
													<a href="<?php the_permalink(); ?>"><?php echo get_the_date('j'); ?> <span><?php echo get_the_date('F'); ?></span></a>
												</div>
											</div>
										</div>
										<div class="latest-news-content">
											<div class="entry-header">
												<h3 class="entry-title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<div class="entry-meta">
													<div class="byline"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><i class="fa fa-user-o"></i><?php esc_html_e('by ',"doctor-toolkit"); ?><?php the_author(); ?></a></div>
													<div class="post-time"><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) .  esc_html__( ' Ago', 'doctor-toolkit' ); ?></a></div>
													<div class="post-comment">
														<a href="<?php comments_link(); ?>">
														<i class="fa fa-commenting-o"></i>
														<?php
															comments_number( 
																esc_html__('0 Comment',"doctor-toolkit"),
																esc_html__('1 Comment',"doctor-toolkit"),
																esc_html__('% Comments',"doctor-toolkit")
															);
														?>
														</a>
													</div>
												</div>
											</div>
											<?php 
												if( get_the_content() != "" ) {
													?>
													<div class="entry-content">
														<?php  echo wpautop( wp_kses( wp_html_excerpt( strip_shortcodes( get_the_content() ), 100, ' [...]' ), doctor_striptags() ) ); ?>
													</div>
													<?php
												}
											?>
											<a href="<?php the_permalink(); ?>" title="<?php esc_html_e('Read More',"doctor-toolkit"); ?>" class="read-more">
												<?php esc_html_e('Read More',"doctor-toolkit"); ?>
											</a>
										</div>
									</article>
								</div>
								<?php
							endwhile;
							// Reset Post Data
							wp_reset_postdata();
						?>
					</div>
				</div>
			</div><!-- Container /- -->
		</div><!-- Latest News /- -->
		<?php
	}
	else if($layout == "two") {
		
		query_posts('posts_per_page='.get_option('posts_per_page').'&paged='. get_query_var('paged') );
		
		?>
		<div class="latest-news blog-2column">
			<!-- Container -->
			<div class="container">
				<div class="row">
					<?php
						while ( have_posts() ) : the_post();
							$css = "";
							if( ! has_post_thumbnail() ) {
								$css = "no-post-thumbnail";
							}

							$css_content = "";
							if(get_the_content() != "" ){
								$css_content = "";
							}
							else {
								$css_content = " no-post-content";
							}
							$post_css = $css.$css_content;
							?>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<article id="post-<?php the_ID(); ?>" <?php post_class($post_css); ?>>
									<div class="entry-cover">
										<?php
											if ( is_sticky() && is_home() ) {
												?><span class="sticky-post"><?php esc_html_e( 'Featured', "doctor" ); ?></span><?php 
											}
											if( get_post_format() == "gallery" && count( get_post_meta( get_the_ID(), 'doctor_cf_post_gallery', 1 ) ) > 0 && is_array( get_post_meta( get_the_ID(), 'doctor_cf_post_gallery', 1 ) ) ) {
												?>
												<div class="entry-cover">
													<!-- Carousel -->
													<div id="blog-carousel-<?php echo the_ID(); ?>" class="carousel slide" data-ride="carousel">
														<div class="carousel-inner" role="listbox">
															<?php
															$active=1;
															foreach ( (array) get_post_meta( get_the_ID(), 'doctor_cf_post_gallery', 1 ) as $attachment_id => $attachment_url ) {
																?>
																<div class="item<?php if( $active == 1 ) { echo ' active'; } ?>">
																	<?php echo wp_get_attachment_image( $attachment_id, 'doctor_570_340' ); ?>
																</div>
																<?php
																$active++;
															} ?>
														</div>
														<a title="Previous" class="left carousel-control" href="#blog-carousel-<?php echo the_ID(); ?>" role="button" data-slide="prev">
															<span class="fa fa-chevron-left" aria-hidden="true"></span>
														</a>
														<a title="Next" class="right carousel-control" href="#blog-carousel-<?php echo the_ID(); ?>" role="button" data-slide="next">
															<span class="fa fa-chevron-right" aria-hidden="true"></span>
														</a>
													</div><!-- /.carousel -->
												</div>
												<?php
											}
											if( get_post_format() == "audio" ) {
												if( get_post_meta( get_the_ID(), 'doctor_cf_post_audio_source', 1 ) == "soundcloud_link" && get_post_meta( get_the_ID(), 'doctor_cf_post_soundcloud_url', 1 ) != "" ) {
													?>
													<iframe src="<?php echo esc_url( get_post_meta( get_the_ID(), 'doctor_cf_post_soundcloud_url', 1 ) ); ?>"></iframe>
													<?php
												}
												elseif( get_post_meta( get_the_ID(), 'doctor_cf_post_audio_source', 1 ) == "audio_upload_local" && get_post_meta( get_the_ID(), 'doctor_cf_post_audio_local', 1 ) != "" ) {
													?>
													<audio controls>
														<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'doctor_cf_post_audio_local', 1 ) ); ?>" type="audio/mpeg">
														<?php esc_html_e("Your browser does not support the audio element.","doctor-toolkit"); ?>
													</audio>
													<?php
												}
											}
											if( get_post_format() == "video" ) {
												if( get_post_meta( get_the_ID(), 'doctor_cf_post_video_source', 1 ) == "video_link" && get_post_meta( get_the_ID(), 'doctor_cf_post_video_link', 1 ) != "" ) {
													echo wp_oembed_get( esc_url( get_post_meta( get_the_ID(), 'doctor_cf_post_video_link', true ) ) );
												}
												elseif( get_post_meta( get_the_ID(), 'doctor_cf_post_video_source', 1 ) == "video_embed_code" && get_post_meta( get_the_ID(), 'doctor_cf_post_video_embed', 1 ) != "" ) {
													echo get_post_meta( get_the_ID(), 'doctor_cf_post_video_embed', 1 );
												}
												elseif( get_post_meta( get_the_ID(), 'doctor_cf_post_video_source', 1 ) == "video_upload_local" && get_post_meta( get_the_ID(), 'doctor_cf_post_video_local', 1 ) != "" ) {
													?>
													<video controls>
														<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'doctor_cf_post_video_local', 1 ) ); ?>" type="video/mp4">
														<?php esc_html_e("Your browser does not support the video tag.","doctor-toolkit"); ?>
													</video> 
													<?php			
												}
											}
											if( has_post_thumbnail() && ( get_post_format() != "audio" && get_post_format() != "video" && get_post_format() != "gallery" ) ) {
												?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('doctor_570_340'); ?></a><?php
											}	
										?>
										<div class="post-date-bg">
											<div class="post-date">
												<a href="<?php the_permalink(); ?>"><?php echo get_the_date('j'); ?> <span><?php echo get_the_date('F'); ?></span></a>
											</div>
										</div>
									</div>
									<div class="latest-news-content">
										<div class="entry-header">
											<h3 class="entry-title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="entry-meta">
												<div class="byline"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><i class="fa fa-user-o"></i><?php esc_html_e('by ',"doctor-toolkit"); ?><?php the_author(); ?></a></div>
												<div class="post-time"><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) .  esc_html__( ' Ago', 'doctor-toolkit' ); ?></a></div>
												<div class="post-comment">
													<a href="<?php comments_link(); ?>">
														<i class="fa fa-commenting-o"></i>
														<?php
															comments_number( 
																esc_html__('0 Comment',"doctor-toolkit"),
																esc_html__('1 Comment',"doctor-toolkit"),
																esc_html__('% Comments',"doctor-toolkit")
															);
														?>
													</a>
												</div>
											</div>
										</div>
										<?php 
											if( get_the_content() != "" ) {
												?>
												<div class="entry-content">
													<?php  echo wpautop( wp_kses( wp_html_excerpt( strip_shortcodes( get_the_content() ), 100, ' [...]' ), doctor_striptags() ) ); ?>
												</div>
												<?php
											}
										?>
										<a href="<?php the_permalink(); ?>" title="<?php esc_html_e('Read More',"doctor-toolkit"); ?>" class="read-more">
											<?php esc_html_e('Read More',"doctor-toolkit"); ?>
										</a>
									</div>
								</article>
							</div>
							<?php
						endwhile;
							
						// Previous/next page navigation.				
						the_posts_pagination( array(
							'prev_text'          => wp_kses( __( '<i class="fa fa-angle-double-left"></i> Prev', "doctor-toolkit" ), array( 'i' => array( 'class' => array() ) ) ),
							'next_text'          => wp_kses( __( 'Next <i class="fa fa-angle-double-right"></i>', "doctor-toolkit" ), array( 'i' => array( 'class' => array() ) ) ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', "doctor-toolkit" ) . ' </span>',
						) );
						
						// Reset Query
						wp_reset_query();
					?>
				</div>
			</div>
		</div>
		<?php
	}
	else if($layout == 'three') {
		query_posts('posts_per_page='.get_option('posts_per_page').'&paged='. get_query_var('paged') );
		
		if ( have_posts() ) {
			?>
			<div class="blog-listing">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( "template-parts/content",get_post_format());

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				// End the loop.
				endwhile;
				
				// Previous/next page navigation.				
				the_posts_pagination( array(
					'prev_text'          => wp_kses( __( '<i class="fa fa-angle-double-left"></i> Prev', "doctor-toolkit" ), array( 'i' => array( 'class' => array() ) ) ),
					'next_text'          => wp_kses( __( 'Next <i class="fa fa-angle-double-right"></i>', "doctor-toolkit" ), array( 'i' => array( 'class' => array() ) ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', "doctor-toolkit" ) . ' </span>',
				) );		
				
				// Restore original Post Data
				wp_reset_query();
				
				?>
			</div>
			<?php
		}
	}
	return ob_get_clean();
}

add_shortcode('doctor_blogpost', 'doctor_blogpost');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'doctor_blogpost',
		'name' => esc_html__( 'Blog Post', "doctor-toolkit" ),
		'class' => '',
		"category" => esc_html__("Doctor Theme", "doctor-toolkit"),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Layout Type', "doctor-toolkit" ),
				'param_name' => 'layout',
				'description' => esc_html__( 'Default Layout 1 Set', "doctor-toolkit" ),
				'value' =>array(
					esc_html__('Layout 1 Blog Crousal',"doctor-toolkit") => 'one',
					esc_html__('Layout 2 Blog 2 Column Page',"doctor-toolkit") => 'two',
					esc_html__('Layout 3 Blog Page',"doctor-toolkit") => 'three',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', "doctor-toolkit" ),
				'param_name' => 'sc_title',
				'holder' => 'div',
				"dependency" => Array('element' => "layout", 'value' => array( 'one' ) ),
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