<?php
$sidebarlayout = "";
$sidebarlayout_css = "";
$dsidebarlayout_css = "";
$dsidebarlayout = "";
$widgetarea = "";
$pid = "";
$dwidgetarea = "";

$pid = doctor_get_the_ID();

$sidebarlayout_css = "sidebar-right";

$dwidgetarea = "sidebar-1";

if( doctor_options("layout_sidebar") != "" ) {

	$dsidebarlayout = doctor_options("layout_sidebar");

	if( $dsidebarlayout == "right_sidebar" ) {
		$dsidebarlayout_css = "sidebar-right";
	}
	elseif( $dsidebarlayout == "left_sidebar" ) {
		$dsidebarlayout_css = "sidebar-left";
	}
	elseif( $dsidebarlayout == "no_sidebar" ) {
		$dsidebarlayout_css = "no-sidebar";
	}
	else { /* Do Nothing.. */ }
}
else {
	$dsidebarlayout = "right_sidebar";
}

if( $pid != "" && !is_search() ) {

	/* Sidebar Layout */
	if( get_post_meta( $pid, 'doctor_cf_sidebar_owlayout', true ) != "" ) {

		$sidebarlayout = get_post_meta( $pid, 'doctor_cf_sidebar_owlayout', true );
		
		if( $sidebarlayout == "right_sidebar" ) {
			$sidebarlayout_css = "sidebar-right";
		}
		elseif( $sidebarlayout == "left_sidebar" ) {
			$sidebarlayout_css = "sidebar-left";
		}
		elseif( $sidebarlayout == "no_sidebar" ) {
			$sidebarlayout_css = "no-sidebar";
		}
		else {
			$sidebarlayout_css = $dsidebarlayout_css;
			$sidebarlayout = $dsidebarlayout;
		}
	}

	/* Widget Area */
	if( get_post_meta( $pid, 'doctor_cf_widget_area', true ) != "" ) {
		$widgetarea = get_post_meta( $pid, 'doctor_cf_widget_area', true );
	}
	else {
		$widgetarea = $dwidgetarea;
	}
}
else {

	$widgetarea = $dwidgetarea;
	$sidebarlayout_css = $dsidebarlayout_css;
}
 
if( ! is_page_template() && $sidebarlayout != "no_sidebar" ) {
	?>
	<div class="widget-area col-md-4 col-sm-4 col-xs-12 <?php echo esc_attr( $sidebarlayout_css . " " . $widgetarea ); ?>">
		<?php
		if( is_active_sidebar( $widgetarea ) ) {
			dynamic_sidebar( $widgetarea );
		}
		else {
			dynamic_sidebar("sidebar-1");
		} ?>
	</div><!-- End Sidebar -->
	<?php	
}