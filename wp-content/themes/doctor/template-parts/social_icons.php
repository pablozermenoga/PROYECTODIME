<?php
$social_icons = "";
$social_icons = doctor_options("opt_social_icons");
if( $social_icons != "" ) {
	?>
	<div class="header-social">
		<ul>
		<?php
			foreach( $social_icons as $single_item ) {
				if( $single_item["textOne"] != "" ) {
					?>
					<li>
						<a href="<?php echo esc_url( $single_item["url"] ); ?>" target="_blank"><i class="<?php echo esc_attr( $single_item["textOne"] ); ?>"></i></a>
					</li>
					<?php 
				}
			}
			?>
		</ul>
	</div>
	<?php
}
?>

