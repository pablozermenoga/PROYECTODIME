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
<article id="post-<?php the_ID(); ?>" <?php post_class($post_css); ?>>
	<div class="entry-cover">
		<?php
			if ( is_sticky() && is_home() ) {
				?><span class="sticky-post"><?php esc_html_e( 'Featured', "doctor" ); ?></span><?php 
			}
		?>
		<?php get_template_part("template-parts/format","gallery"); ?>

		<?php get_template_part("template-parts/format","video"); ?>

		<?php get_template_part("template-parts/format","audio"); ?>

		<?php
		if( has_post_thumbnail() && ( get_post_format() != "audio" && get_post_format() != "video" && get_post_format() != "gallery" ) ) {

			if( is_single() ) {
				the_post_thumbnail('full');
			}
			else {
				?><a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail('full'); ?></a><?php
			}
		}
		?>
		<div class="post-date-bg">
			<div class="post-date">
				<?php
				if(is_single()) {
					echo get_the_date('j');?><span><?php echo get_the_date('F'); ?></span><?php
				}
				else {
					?><a href="<?php the_permalink(); ?>"><?php echo get_the_date('j'); ?><span><?php echo get_the_date('F'); ?></span></a><?php
				}
				?>
			</div>
		</div>
	</div>
	<div class="latest-news-content">
		<div class="entry-header">
			<?php 
			if ( !is_single() ) {
				the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			}
			?>
			<div class="entry-meta">
				<div class="byline"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><i class="fa fa-user-o"></i><?php echo esc_html_e('by ',"doctor"); ?><?php the_author(); ?></a></div>
				<div class="post-time">
					<?php
						if(is_single()) {
							?><span><i class="fa fa-clock-o"></i><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) .  esc_html__( ' Ago', 'doctor' ); ?></span>
							<?php
						}
						else {
							?><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) .  esc_html__( ' Ago', 'doctor' ); ?></a>
							<?php
						}
					?>
				</div>
				<div class="post-comment">
					<a href="<?php comments_link(); ?>">
						<i class="fa fa-commenting-o"></i>
						<?php
							comments_number( 
								esc_html__('0 Comment',"doctor"),
								esc_html__('1 Comment',"doctor"),
								esc_html__('% Comments',"doctor")
							);
						?>
					</a>
				</div>
			</div>
		</div>
		<?php
			if( get_the_content() != "" ){
				?>
				<div class="entry-content">
					<?php
						if(is_single()) {
							/* translators: %s: Name of current post */
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
						}
						else {
							echo wpautop( wp_kses( wp_html_excerpt( strip_shortcodes( get_the_content() ), 150, ' [...]' ),doctor_allowhtmltags() ) );
						}
					?>
				</div>
				<?php
			}
			if(is_single()) {
				if( has_tag() && doctor_options('opt_post_tags') != "0" ) {
					?>
					<div class="entry-tags">
						<span><?php esc_html_e('Tags:',"doctor"); ?></span>
						<?php echo get_the_tag_list(' '); ?>
					</div>
					<?php
				}
				if( doctor_options('opt_post_category') != "0" ) {
					?>
					<div class="entry-categories">
						<span><?php esc_html_e('Categories :',"doctor"); ?></span>
						<?php the_category( '  ' ); ?>
					</div>
					<?php
				}
				if( doctor_options('opt_post_author') != "0" ) {
					if(get_the_author_meta('description') != '' && get_avatar( get_the_author_meta( 'ID' ) != '' ) ) {
						?>
						<div class="about-author">
							<?php echo get_avatar( get_the_author_meta( 'ID' ) , 80 ); ?>
							<div class="author-details">
								<div class="byline">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><i class="fa fa-user-o"></i><?php echo esc_html_e('Author: ',"doctor"); ?><?php the_author(); ?></a>
								</div>
								<?php echo wpautop( wp_kses( get_the_author_meta('description'), doctor_allowhtmltags() ) ); ?>
							</div>
						</div>
						<?php
					}
				}
			}
			else {
				?>
				<a href="<?php the_permalink(); ?>" title="<?php esc_html_e('Read More',"doctor"); ?>" class="read-more">
					<?php esc_html_e('Read More',"doctor"); ?>
				</a>
				<?php
			}
		?>
	</div>
</article>