<?php
/**
 * WorkingTime widget class Doctor
 *
 * @since 2.8.0
 */
class Doctor_Widget_WorkingTime extends WP_Widget {

	public function __construct() {
	
		$widget_ops = array( 'classname' => 'widget_workinghours', 'description' => esc_html__( "Working Time", "doctor-toolkit" ) );
		
		parent::__construct('widget-workinghours', esc_html__('Doctor :: Working Time', "doctor-toolkit"), $widget_ops);
		
		$this->alt_option_name = 'widget_workinghours';
	}

	public function widget( $args, $instance ) {

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Working Hours', "doctor-toolkit" );
		
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo html_entity_decode( $args['before_widget'] ); // Widget starts to print information

		if ( $title ) {
			echo html_entity_decode( $args['before_title'] . $title . $args['after_title'] );
		}
		
		$monday = empty( $instance['monday'] ) ? '' : $instance['monday'];
		$tuesday = empty( $instance['tuesday'] ) ? '' : $instance['tuesday'];
		$wednesday = empty( $instance['wednesday'] ) ? '' : $instance['wednesday'];
		$thursday = empty( $instance['thursday'] ) ? '' : $instance['thursday'];
		$friday = empty( $instance['friday'] ) ? '' : $instance['friday'];
		$saturday = empty( $instance['saturday'] ) ? '' : $instance['saturday'];
		$sunday = empty( $instance['sunday'] ) ? '' : $instance['sunday'];
		
		?>
		<ul>
			<?php if($monday != "" ) { ?><li><span><?php esc_html_e('Monday',"doctor-toolkit"); ?></span> <b><?php echo esc_attr($monday); ?></b></li><?php } ?>
			<?php if($tuesday != "" ) { ?><li><span><?php esc_html_e('tuesday',"doctor-toolkit"); ?></span> <b><?php echo esc_attr($tuesday); ?></b></li><?php } ?>
			<?php if($wednesday != "" ) { ?><li><span><?php esc_html_e('wednesday',"doctor-toolkit"); ?></span> <b><?php echo esc_attr($wednesday); ?></b></li><?php } ?>
			<?php if($thursday != "" ) { ?><li><span><?php esc_html_e('thursday',"doctor-toolkit"); ?></span> <b><?php echo esc_attr($thursday); ?></b></li><?php } ?>
			<?php if($friday != "" ) { ?><li><span><?php esc_html_e('friday',"doctor-toolkit"); ?></span> <b><?php echo esc_attr($friday); ?></b></li><?php } ?>
			<?php if($saturday != "" ) { ?><li><span><?php esc_html_e('Saturday',"doctor-toolkit"); ?></span> <b><?php echo esc_attr($saturday); ?></b></li><?php } ?>
			<?php if($sunday != "" ) { ?><li><span><?php esc_html_e('Sunday',"doctor-toolkit"); ?></span> <b><?php echo esc_attr($sunday); ?></b></li><?php } ?>
		</ul>

		<?php
		echo html_entity_decode( $args['after_widget'] );
	}
	
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$new_instance = wp_parse_args( ( array ) $new_instance, array('title' => '') );

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['monday'] = ( ! empty( $new_instance['monday'] ) ) ? strip_tags( $new_instance['monday'] ) : '';
		$instance['tuesday'] = ( ! empty( $new_instance['tuesday'] ) ) ? strip_tags( $new_instance['tuesday'] ) : '';
		$instance['wednesday'] = ( ! empty( $new_instance['wednesday'] ) ) ? strip_tags( $new_instance['wednesday'] ) : '';
		$instance['thursday'] = ( ! empty( $new_instance['thursday'] ) ) ? strip_tags( $new_instance['thursday'] ) : '';
		$instance['friday'] = ( ! empty( $new_instance['friday'] ) ) ? strip_tags( $new_instance['friday'] ) : '';
		$instance['saturday'] = ( ! empty( $new_instance['saturday'] ) ) ? strip_tags( $new_instance['saturday'] ) : '';
		$instance['sunday'] = ( ! empty( $new_instance['sunday'] ) ) ? strip_tags( $new_instance['sunday'] ) : '';
		
		return $instance;
	}
	
	public function form( $instance ) {

		$instance = wp_parse_args( ( array ) $instance, array( 'title' => '' ) );

		$title = $instance['title'];
		$monday = empty( $instance['monday'] ) ? '' : $instance['monday'];
		$tuesday = empty( $instance['tuesday'] ) ? '' : $instance['tuesday'];
		$wednesday = empty( $instance['wednesday'] ) ? '' : $instance['wednesday'];
		$thursday = empty( $instance['thursday'] ) ? '' : $instance['thursday'];
		$friday = empty( $instance['friday'] ) ? '' : $instance['friday'];
		$saturday = empty( $instance['saturday'] ) ? '' : $instance['saturday'];
		$sunday = empty( $instance['sunday'] ) ? '' : $instance['sunday'];
		
		?>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('title') ); ?>" name="<?php echo esc_html( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('monday') ); ?>"><?php esc_html_e('Monday Time:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('monday') ); ?>" name="<?php echo esc_html( $this->get_field_name('monday') ); ?>" type="text" value="<?php echo esc_attr( $monday ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('tuesday') ); ?>"><?php esc_html_e('Tuesday Time:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('tuesday') ); ?>" name="<?php echo esc_html( $this->get_field_name('tuesday') ); ?>" type="text" value="<?php echo esc_attr( $tuesday ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('wednesday') ); ?>"><?php esc_html_e('Wednesday Time:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('wednesday') ); ?>" name="<?php echo esc_html( $this->get_field_name('wednesday') ); ?>" type="text" value="<?php echo esc_attr( $wednesday ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('thursday') ); ?>"><?php esc_html_e('Thursday Time:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('thursday') ); ?>" name="<?php echo esc_html( $this->get_field_name('thursday') ); ?>" type="text" value="<?php echo esc_attr( $thursday ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('friday') ); ?>"><?php esc_html_e('Friday Time:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('friday') ); ?>" name="<?php echo esc_html( $this->get_field_name('friday') ); ?>" type="text" value="<?php echo esc_attr( $friday ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('saturday') ); ?>"><?php esc_html_e('Saturday Time:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('saturday') ); ?>" name="<?php echo esc_html( $this->get_field_name('saturday') ); ?>" type="text" value="<?php echo esc_attr( $saturday ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('sunday') ); ?>"><?php esc_html_e('Sunday Time:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('sunday') ); ?>" name="<?php echo esc_html( $this->get_field_name('sunday') ); ?>" type="text" value="<?php echo esc_attr( $sunday ); ?>" /></label></p>
		
		<?php
	}
}