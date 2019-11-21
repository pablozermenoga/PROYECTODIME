<?php
/**
 * ContactInfo widget class Doctor
 *
 * @since 2.8.0
 */
class Doctor_Widget_ContactInfo extends WP_Widget {

	public function __construct() {
	
		$widget_ops = array( 'classname' => 'widget_info', 'description' => esc_html__( "Contact Info", "doctor-toolkit" ) );
		
		parent::__construct('widget-info', esc_html__('Doctor :: Contact Info', "doctor-toolkit"), $widget_ops);
		
		$this->alt_option_name = 'widget_info';
	}

	public function widget( $args, $instance ) {

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Contact Info', "doctor-toolkit" );
		
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo html_entity_decode( $args['before_widget'] ); // Widget starts to print information

		if ( $title ) {
			echo html_entity_decode( $args['before_title'] . $title . $args['after_title'] );
		}
		
		$con_no = empty( $instance['con_no'] ) ? '' : $instance['con_no'];
		$con_eamil = empty( $instance['con_eamil'] ) ? '' : $instance['con_eamil'];
		$con_address = empty( $instance['con_address'] ) ? '' : $instance['con_address'];
		$fb_url = empty( $instance['fb_url'] ) ? '' : $instance['fb_url'];
		$tw_url = empty( $instance['tw_url'] ) ? '' : $instance['tw_url'];
		$ln_url = empty( $instance['ln_url'] ) ? '' : $instance['ln_url'];
		$tum_url = empty( $instance['tum_url'] ) ? '' : $instance['tum_url'];
		$vimeo_url = empty( $instance['vimeo_url'] ) ? '' : $instance['vimeo_url'];
		$pin_url = empty( $instance['pin_url'] ) ? '' : $instance['pin_url'];
		
		?>
		<div class="contact-information">
			<?php if( $con_no != "" ) { ?><p><i class="fa fa-phone"></i><a href="tel:<?php echo esc_attr(str_replace(" ", "", $con_no ) ); ?>" title="<?php echo esc_attr($con_no); ?>"><?php echo esc_attr($con_no); ?></a></p><?php } ?>
			<?php if( $con_eamil != "" ) { ?><p><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr($con_eamil); ?>" title="<?php echo esc_attr($con_eamil); ?>"><?php echo esc_attr($con_eamil); ?></a></p><?php } ?>
			<?php if( $con_address != "" ) { ?><p><i class="fa fa-map-marker"></i><?php echo esc_attr($con_address); ?></p><?php } ?>
			<div class="footer-social">
				<i class="fa fa-heart"></i>
				<ul>
					<?php if( $fb_url != "" ) { ?><li><a href="<?php echo esc_url($fb_url); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
					<?php if( $tw_url != "" ) { ?><li><a href="<?php echo esc_url($tw_url); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
					<?php if( $ln_url != "" ) { ?><li><a href="<?php echo esc_url($ln_url); ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
					<?php if( $tum_url != "" ) { ?><li><a href="<?php echo esc_url($tum_url); ?>"><i class="fa fa-tumblr"></i></a></li><?php } ?>
					<?php if( $vimeo_url != "" ) { ?><li><a href="<?php echo esc_url($vimeo_url); ?>"><i class="fa fa-vimeo"></i></a></li><?php } ?>
					<?php if( $pin_url != "" ) { ?><li><a href="<?php echo esc_url($pin_url); ?>"><i class="fa fa-pinterest-p"></i></a></li><?php } ?>
				</ul>
			</div>
	    </div>
		<?php
		echo html_entity_decode( $args['after_widget'] );
	}
	
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$new_instance = wp_parse_args( ( array ) $new_instance, array('title' => '') );

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['con_no'] = ( ! empty( $new_instance['con_no'] ) ) ? strip_tags( $new_instance['con_no'] ) : '';
		$instance['con_eamil'] = ( ! empty( $new_instance['con_eamil'] ) ) ? strip_tags( $new_instance['con_eamil'] ) : '';
		$instance['con_address'] = ( ! empty( $new_instance['con_address'] ) ) ? strip_tags( $new_instance['con_address'] ) : '';
		$instance['fb_url'] = ( ! empty( $new_instance['fb_url'] ) ) ? strip_tags( $new_instance['fb_url'] ) : '';
		$instance['tw_url'] = ( ! empty( $new_instance['tw_url'] ) ) ? strip_tags( $new_instance['tw_url'] ) : '';
		$instance['ln_url'] = ( ! empty( $new_instance['ln_url'] ) ) ? strip_tags( $new_instance['ln_url'] ) : '';
		$instance['tum_url'] = ( ! empty( $new_instance['tum_url'] ) ) ? strip_tags( $new_instance['tum_url'] ) : '';
		$instance['vimeo_url'] = ( ! empty( $new_instance['vimeo_url'] ) ) ? strip_tags( $new_instance['vimeo_url'] ) : '';
		$instance['pin_url'] = ( ! empty( $new_instance['pin_url'] ) ) ? strip_tags( $new_instance['pin_url'] ) : '';
		
		return $instance;
	}
	
	public function form( $instance ) {

		$instance = wp_parse_args( ( array ) $instance, array( 'title' => '' ) );

		$title = $instance['title'];
		$con_no = empty( $instance['con_no'] ) ? '' : $instance['con_no'];
		$con_eamil = empty( $instance['con_eamil'] ) ? '' : $instance['con_eamil'];
		$con_address = empty( $instance['con_address'] ) ? '' : $instance['con_address'];
		$fb_url = empty( $instance['fb_url'] ) ? '' : $instance['fb_url'];
		$tw_url = empty( $instance['tw_url'] ) ? '' : $instance['tw_url'];
		$ln_url = empty( $instance['ln_url'] ) ? '' : $instance['ln_url'];
		$tum_url = empty( $instance['tum_url'] ) ? '' : $instance['tum_url'];
		$vimeo_url = empty( $instance['vimeo_url'] ) ? '' : $instance['vimeo_url'];
		$pin_url = empty( $instance['pin_url'] ) ? '' : $instance['pin_url'];
		
		?>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('title') ); ?>" name="<?php echo esc_html( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('con_no') ); ?>"><?php esc_html_e('Contact Number:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('con_no') ); ?>" name="<?php echo esc_html( $this->get_field_name('con_no') ); ?>" type="text" value="<?php echo esc_attr( $con_no ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('con_eamil') ); ?>"><?php esc_html_e('Contact Email:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('con_eamil') ); ?>" name="<?php echo esc_html( $this->get_field_name('con_eamil') ); ?>" type="text" value="<?php echo esc_attr( $con_eamil ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('con_address') ); ?>"><?php esc_html_e('Contact Address:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('con_address') ); ?>" name="<?php echo esc_html( $this->get_field_name('con_address') ); ?>" type="text" value="<?php echo esc_attr( $con_address ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('fb_url') ); ?>"><?php esc_html_e('Facebook URL:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('fb_url') ); ?>" name="<?php echo esc_html( $this->get_field_name('fb_url') ); ?>" type="text" value="<?php echo esc_attr( $fb_url ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('tw_url') ); ?>"><?php esc_html_e('Twitter URL:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('tw_url') ); ?>" name="<?php echo esc_html( $this->get_field_name('tw_url') ); ?>" type="text" value="<?php echo esc_attr( $tw_url ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('ln_url') ); ?>"><?php esc_html_e('Linkedin URL:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('ln_url') ); ?>" name="<?php echo esc_html( $this->get_field_name('ln_url') ); ?>" type="text" value="<?php echo esc_attr( $ln_url ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('tum_url') ); ?>"><?php esc_html_e('Tumblr URL:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('tum_url') ); ?>" name="<?php echo esc_html( $this->get_field_name('tum_url') ); ?>" type="text" value="<?php echo esc_attr( $tum_url ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('vimeo_url') ); ?>"><?php esc_html_e('Vimeo URL:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('vimeo_url') ); ?>" name="<?php echo esc_html( $this->get_field_name('vimeo_url') ); ?>" type="text" value="<?php echo esc_attr( $vimeo_url ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('pin_url') ); ?>"><?php esc_html_e('Pinterest URL:', "doctor-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('pin_url') ); ?>" name="<?php echo esc_html( $this->get_field_name('pin_url') ); ?>" type="text" value="<?php echo esc_attr( $pin_url ); ?>" /></label></p>
		
		<?php
	}
}