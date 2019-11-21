<?php
/**
 * Accordion widget class Doctor
 *
 * @since 2.8.0
 */
class Doctor_Widget_Accordion extends WP_Widget {

	public function __construct() {
	
		$widget_ops = array( 'classname' => 'widget_accordion', 'description' => esc_html__( "Accordion", "doctor-toolkit" ) );
		
		parent::__construct('widget-accordion', esc_html__('Doctor :: Accordion', "doctor-toolkit"), $widget_ops);
		
		$this->alt_option_name = 'widget_accordion';
	}

	public function widget( $args, $instance ) {

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Accordion', "doctor-toolkit" );
		
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo html_entity_decode( $args['before_widget'] ); // Widget starts to print information

		if ( $title ) {
			echo html_entity_decode( $args['before_title'] . $title . $args['after_title'] );
		}
		
		if( doctor_options("opt_accordion") != "" ) {
			?>
			<div class="accordion-box">
				<div class="panel-group" id="accordion-1" role="tablist" aria-multiselectable="true">
						<?php
						$countcnt = 1;
						foreach( doctor_options("opt_accordion") as $single_item ) {
							$randomcount = "";
							$randomcount = rand(0,10000);
							if( $single_item["title"] != "" || $single_item["description"] != "" ) {
								?>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="faqheading-<?php echo esc_attr($randomcount); ?>">
										<h4 class="panel-title">
											<a class="<?php if($countcnt == 2 ) { echo ""; } else { echo "collapsed"; } ?>" role="button" data-toggle="collapse" data-parent="#accordion-1" href="#faqcontent-<?php echo esc_attr($randomcount); ?>" aria-expanded="true"><?php echo esc_attr( $single_item["title"] ); ?></a>
										</h4>
									</div>
									<div id="faqcontent-<?php echo esc_attr($randomcount); ?>" class="panel-collapse collapse<?php if($countcnt == 2) { echo " in"; } ?>" role="tabpanel" aria-labelledby="faqheading-<?php echo esc_attr($randomcount); ?>">
										<div class="panel-body">
											<?php echo wpautop( wp_kses( $single_item["description"], doctor_striptags() ) ); ?>
										</div>
									</div>
								</div>
								<?php
							}
						$countcnt++;
						}
					?>
				</div>
			</div>
			<?php
		}
		
		echo html_entity_decode( $args['after_widget'] );
	}
	
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$new_instance = wp_parse_args( ( array ) $new_instance, array('title' => '') );

		$instance['title'] = strip_tags( $new_instance['title'] );
		
		return $instance;
	}
	
	public function form( $instance ) {

		$instance = wp_parse_args( ( array ) $instance, array( 'title' => '' ) );

		$title = $instance['title'];
		
		?>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('title') ); ?>" name="<?php echo esc_html( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
		
		<?php
	}
}