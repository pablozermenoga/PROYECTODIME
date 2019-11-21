<?php
function doctor_tabservice( $atts ) {
	
	extract( shortcode_atts( array( ), $atts ) );
	
	ob_start();
	
	if( doctor_options("opt_tabservice") != "" ) {
		?>
		<!-- Tab Section -->
		<div class="tab-section container-fluid no-left-padding no-right-padding">
			<!-- Container -->
			<div class="container">
				<div class="tab-detail">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs services-tabs" role="tablist">
						<?php
							$countcnt = 1;
							foreach(doctor_options("opt_tabservice") as $single_item) {
								?><li role="presentation" class="<?php if( $countcnt == 1 ) { echo 'active'; } ?>"><a href="#tab-<?php echo esc_attr( $countcnt ); ?>" role="tab" data-toggle="tab"><?php echo esc_attr( $single_item["title"] ); ?></a></li><?php
							$countcnt++;
							}
						?>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<?php
							$countcontent = 1;
							foreach( doctor_options("opt_tabservice") as $single_item ) {
								?>
								<div role="tabpanel" class="tab-pane<?php if($countcontent == 1) { echo " active"; } ?>" id="tab-<?php echo esc_attr( $countcontent ); ?>">
									<?php if( $single_item["attachment_id"] != "" ) { ?><i><?php echo wp_get_attachment_image( $single_item["attachment_id"],'doctor_126_138'); ?></i><?php } ?>
									<?php if( $single_item["title"] != "" ) { ?><h5><?php echo esc_attr( $single_item["title"] ); ?><?php esc_html_e(' Services',"doctor-toolkit"); ?></h5><?php } ?>
									<?php echo wpautop( wp_kses( $single_item["description"], doctor_striptags() ) ); ?>
								</div>
								<?php
							$countcontent++;
							}
						?>
					</div><!-- Tab panes /- -->
				</div>
			</div><!-- Container /- -->
		</div><!-- Tab Section -->
		<?php
	}
	return ob_get_clean();
}

add_shortcode('doctor_tabservice', 'doctor_tabservice');

if( function_exists('vc_map') ) {
	
	vc_map( array(
		'base' => 'doctor_tabservice',
		'name' => esc_html__( 'Service Tab Content', "doctor-toolkit" ),
		'class' => '',
		"category" => esc_html__("Doctor Theme", "doctor-toolkit"),
		'params' => array(
			array(
				'type' => 'label',
				'heading' => esc_html__( 'No Need To Settings', "doctor-toolkit" ),
				'param_name' => 'doctor_tabservice',
			),
		),
	) );
}
?>