<?php
/**
 * PostTab widget class Doctor
 *
 * @since 2.8.0
 */
class Doctor_Widget_PostTab extends WP_Widget {

	public function __construct() {

		$widget_ops = array( 'classname' => 'widget_latestposts', 'description' => esc_html__( "Popular And Recent Post Tab", "doctor-toolkit" ) );

		parent::__construct('widget_latestposts', esc_html__('Doctor :: Popular And Recent Post Tab', "doctor-toolkit"), $widget_ops);

		$this->alt_option_name = 'widget_latestposts';
	}

	public function widget($args, $instance) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( '', "doctor-toolkit" );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;

		if ( ! $number ) {
			$number = 3;
		}

		/**
		 * Filter the arguments for the latest Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$recent_entries = new WP_Query( array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) );
		
		$popular_entries = new WP_Query( array(
			'orderby' 			  => 'comment_count',
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) );

		echo html_entity_decode( $args['before_widget'] );

		if ( $title ) {
			echo html_entity_decode( $args['before_title'] . $title . $args['after_title'] );
		}
		
			?>
			<div class="latest-detail-tab">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs wc-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#popular" role="tab" data-toggle="tab"><?php esc_html_e('Popular',"doctor-toolkit"); ?></a></li>
					<li role="presentation"><a href="#recent" role="tab" data-toggle="tab"><?php esc_html_e('Recent',"doctor-toolkit"); ?></a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="popular">
						<?php
							if ( $popular_entries->have_posts() ) :
								while ( $popular_entries->have_posts() ) : $popular_entries->the_post();
									$css = "";
									if( ! has_post_thumbnail() ) {
										$css = " no-post-thumbnail";
									}
									?>
									<div class="latest-content<?php echo esc_attr($css); ?>">
										<?php
											if( has_post_thumbnail() ) {
												?><a href="<?php the_permalink(); ?>"><i><?php the_post_thumbnail('doctor_100_100'); ?></i></a><?php
											}
										?>
										<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
										<span><a href="<?php the_permalink(); ?>" title="<?php echo get_the_date('j M Y'); ?>"><i class="fa fa-calendar-o"></i><?php echo get_the_date('j M Y'); ?></a></span>
									</div>
									<?php
								endwhile;
							endif;
						?>
					</div>
					
					<div role="tabpanel" class="tab-pane" id="recent">
						<?php
							if ( $recent_entries->have_posts() ) :
								while ( $recent_entries->have_posts() ) : $recent_entries->the_post();
									$css = "";
									if( ! has_post_thumbnail() ) {
										$css = " no-post-thumbnail";
									}
									?>
									<div class="latest-content<?php echo esc_attr($css); ?>">
										<?php
											if( has_post_thumbnail() ) {
												?><a href="<?php the_permalink(); ?>"><i><?php the_post_thumbnail('doctor_100_100'); ?></i></a><?php
											}
										?>
										<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
										<span><a href="<?php the_permalink(); ?>" title="<?php echo get_the_date('j M Y'); ?>"><i class="fa fa-calendar-o"></i><?php echo get_the_date('j M Y'); ?></a></span>
									</div>
									<?php
									endwhile;
								endif;
							?>
					</div>
				</div><!-- Tab panes /- -->
			</div>
			<?php
		
		echo html_entity_decode( $args['after_widget'] );

		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];

		return $instance;
	}

	public function form( $instance ) {

		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', "doctor-toolkit" ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', "doctor-toolkit" ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" />
		</p>
		<?php
	}
}
?>