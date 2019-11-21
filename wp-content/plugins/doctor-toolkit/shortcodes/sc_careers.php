<?php
function doctor_career_outer( $atts, $content = null ) {

	extract( shortcode_atts( array( 'sc_title' => '' ), $atts ) );
	
	$title = "";
	if($sc_title != "") {
		$title .= "<div class='section-header'><h3>".esc_attr($sc_title)."</h3></div>"; 
	}
	
	Global $cnt;
	
	$cnt = 0;

	$result = "
		<!-- Carrier Section -->
		<div class='carrier-section container-fluid no-left-padding no-right-padding'>
			<!-- Container -->
			<div class='container'>";
				$result .= "$title";
				$result .= " 
				<div class='carrier-box-bg'>
					<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>
						".do_shortcode( $content )."
					</div>
				</div>
			</div><!-- Container /- -->
		</div><!-- Carrier Section /- -->";
	return $result;
}
add_shortcode( 'career_outer', 'doctor_career_outer' );

function doctor_career_inner( $atts, $content = null ) {

	extract( shortcode_atts( array( 'title' =>'', 'item_title' => '', 'item_desc' => '', 'item_subtitle' => '', 'textone' =>'', 'texttwo' =>'', 'btntxtone' => '','btnoneicon' => '', 'btntwoicon' => '', 'emailaddress' => '', 'btnurlone' => '' ), $atts ) );
	
	$carrer_title = "";
	if( $item_title != "" ) {
		$carrer_title .= "<h5 class='carrier-title'>".esc_attr($item_title)."</h5>";
	}
	
	$carrer_desc = "";
	if($item_desc != "" ) {
		$carrer_desc .= wpautop( wp_kses( $item_desc, doctor_striptags() ) );
	}
	
	$subtitle = "";
	if( $item_subtitle != "" ) {
		$subtitle .= "<h5 class='carrier-title'>".esc_attr($item_subtitle)."</h5>";
	}
	
	$button_one = "";
	if($btntxtone != "") {
		$button_one .= "<div class='col-md-6 col-sm-12 col-xs-12 sent-box-left'><div class='linked-bg'>";
		$button_one .= "<h5>".esc_attr($textone)."</h5>";
		$button_one .= "<a href='".esc_url($btnurlone)."'><i class='".esc_attr($btnoneicon)."'></i>".esc_attr($btntxtone)."</a>";
		$button_one .= "</div></div>";
	}
	
	$button_two = "";
	if($emailaddress != "") {
		$button_two .= "<div class='col-md-6 col-sm-12 col-xs-12 sent-box-right'><div class='linked-bg cv-bg'>";
		$button_two .= "<h5>".esc_attr($texttwo)."</h5>";
		$button_two .= "<a href='mailto:".esc_attr($emailaddress)."'><i class='".esc_attr($btntwoicon)."'></i>".esc_attr($emailaddress)."</a>";
		$button_two .= "</div></div>";
	}
	
	$display_or = "";
	if($emailaddress != "" ) {
		$display_or .= "<span class='sent-box-char'>".esc_html__('or',"doctor-toolkit")."</span>";
	}
	
	Global $cnt;
	
	$cnt++;
	
	$addclass = "";
	
	if($cnt == 2) {
		$addclass = " in";
	}
	else {
		$addclass = "";
	}
	
	$activeclass = "";
	if($cnt == 2){
		$activeclass = "";
	}
	else{
		$activeclass = "collapsed";
	}
	
	$randomcountnumber = "";
	$randomcountnumber = rand(0,10000);
	
	$result = "
		<div class='panel panel-default'>
			<div class='panel-heading' role='tab' id='faqheading".esc_attr($randomcountnumber)."'>
				<h4 class='panel-title'>
					<a class='".esc_attr($activeclass)."' role='button' data-toggle='collapse' data-parent='#accordion' href='#faqcontent".esc_attr($randomcountnumber)."' aria-expanded='true'>".esc_attr($title)."</a>
				</h4>
			</div>
			<div id='faqcontent".esc_attr($randomcountnumber)."' class='panel-collapse collapse ".esc_attr($addclass)."' role='tabpanel' aria-labelledby='faqheading".esc_attr($randomcountnumber)."'>
				<div class='panel-body'>
					<div class='row'>
						<div class='col-md-8 col-sm-12 col-xs-12 job-summary'>";
							$result .= "$carrer_title";
							$result .= "$carrer_desc";
							$result .= "
							<div class='responsibilities-list'>";
								$result .= "$subtitle";
								$result .= "
								<ul>";
									foreach( vc_param_group_parse_atts( $atts['plan_feature'] ) as $key => $value ) {
										if( !empty( $value['feature_name'] ) ) {
											$result .= "<li>".$value['feature_name']."</li>";
										}
										else {
											$result .= "";
										}
									}
									$result .= "</ul>
							</div>
						</div>
						<div class='col-md-4 col-sm-12 col-xs-12 summary-detail'>
							<ul>";
								foreach( vc_param_group_parse_atts( $atts['plan_featuretwo'] ) as $key => $value ) {
									if( !empty( $value['detail_title'] ) && !empty($value['detail_value'] ) ) {
										$result .= "<li><span>".$value['detail_title']."".esc_html__(' : ',"doctor-toolkit")."</span>".$value['detail_value']."</li>";
									}
									else {
										$result .= "";
									}
								}
								$result .= "</ul>
						</div>
						<div class='sent-box'>";
							$result .= "$button_one";
							$result .= "$button_two";
							$result .= "$display_or";
							$result .= "
						</div>
					</div>
				</div>
			</div>
		</div>";
	return $result;
}
add_shortcode( 'career_inner', 'doctor_career_inner' );

// Parent Element
function vc_career_outer() {

	// Register "container" content element. It will hold all your inner (child) content elements
	vc_map( array(
		"name" => esc_html__("Career", "doctor-toolkit"),
		"base" => "career_outer",
		"category" => esc_html__('Doctor Theme', 'doctor-toolkit'),
		"as_parent" => array('only' => 'career_inner'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		"content_element" => true,
		"show_settings_on_create" => true,
		"is_container" => true,
		"params" => array(
			// add params same as with any other content element
			array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "doctor-toolkit"),
				"param_name" => "sc_title",
				"holder" => "div",
			),
		),
		"js_view" => 'VcColumnView'
	) );
}
add_action( 'vc_before_init', 'vc_career_outer' );

// Nested Element
function vc_career_inner() {

	vc_map( array(
		"name" => esc_html__("Career Item", "doctor-toolkit"),
		"base" => "career_inner",
		"category" => esc_html__('Doctor Theme', 'doctor-toolkit'),
		"content_element" => true,
		"as_child" => array('only' => 'career_outer'), // Use only|except attributes to limit parent (separate multiple values with comma)
		"params" => array(
			// add params same as with any other content element
			array(
				"type" => "textfield",
				"heading" => esc_html__("Careers Title", "doctor-toolkit"),
				"param_name" => "title",
				"holder" => "div",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "doctor-toolkit"),
				"param_name" => "item_title",
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("Description Text", "doctor-toolkit"),
				"param_name" => "item_desc",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Title For Description List", "doctor-toolkit"),
				"param_name" => "item_subtitle",
			),
			
			/* Repetable Entry List */
			array(
				'type' => 'param_group',
				'value' => '',
				'param_name' => 'plan_feature',
				'params' => array(
					array(
						'type' => 'textfield',
						'value' => '',
						'heading' => 'Feature Name',
						'param_name' => 'feature_name',
					),
				)
			),
			/* Repetable Entry Width Details */
			array(
				'type' => 'param_group',
				'value' => '',
				'param_name' => 'plan_featuretwo',
				'params' => array(
					array(
						'type' => 'textfield',
						'value' => '',
						'heading' => 'Feature Name',
						'param_name' => 'detail_title',
					),
					array(
						'type' => 'textfield',
						'value' => '',
						'heading' => 'Feature Detail',
						'param_name' => 'detail_value',
					),
				)
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Button 1 Information Text", "doctor-toolkit"),
				"param_name" => "textone",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Button Text", "doctor-toolkit"),
				"param_name" => "btntxtone",
			),
			array(
				"type" => "iconpicker",
				"heading" => esc_html__("Button 1 Icon", "doctor-toolkit"),
				"param_name" => "btnoneicon",
			),
						array(
				"type" => "textfield",
				"heading" => esc_html__("Button 1 URL", "doctor-toolkit"),
				"param_name" => "btnurlone",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Button 2 Information Text", "doctor-toolkit"),
				"param_name" => "texttwo",
			),
			array(
				"type" => "iconpicker",
				"heading" => esc_html__("Button 2 Icon", "doctor-toolkit"),
				"param_name" => "btntwoicon",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Email Address", "doctor-toolkit"),
				"param_name" => "emailaddress",
			),
		)
	) );
}
add_action( 'vc_before_init', 'vc_career_inner' );

// Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

    class WPBakeryShortCode_Career_Outer extends WPBakeryShortCodesContainer {
	}
}

if ( class_exists( 'WPBakeryShortCode' ) ) {

    class WPBakeryShortCode_Career_Inner extends WPBakeryShortCode {
    }
}
?>