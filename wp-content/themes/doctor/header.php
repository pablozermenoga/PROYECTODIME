<?php
/**
 * The Header for our theme
 *
 *
 * @package WordPress
 * @subpackage Doctor
 * @since Doctor 1.0
 */

$rtl_onoff = "";
if( doctor_options('opt_rtl_switch') != "" ) { 
	$rtl_onoff = doctor_options('opt_rtl_switch');
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg"<?php if( $rtl_onoff != "" && $rtl_onoff == 1 ) { ?> dir="rtl"<?php } ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<div class="boxed-container">
		<?php
		
			$page_title = "";
			$page_title = get_post_meta( doctor_get_the_ID(), 'doctor_cf_page_title', true );

			if( doctor_options("opt_siteloader") != "0" ) {
				get_template_part("template-parts/siteloader");
			}
			
			if( doctor_options("opt_colorstyle_switch") == 1 ) {
				?>
				<!-- Style Switcher -->
				<div class="style-switcher" id="choose_style">
					<a href="#." class="picker_close">
						<i class="fa fa-gear fa-spin"></i>
					</a>
					<div class="style-picker">
						<h3><?php esc_html_e('Select Your Style',"doctor"); ?></h3>
						<div class="choose-switcher-box">
							<p><?php esc_html_e('Choose View Style',"doctor"); ?></p>
							<ul>
								<li><a href="#." class="full-view" id="full_view"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/full.png" alt="Full" /></a></li>
								<li><a href="#." class="box-view" id="box_view"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/boxed.png" alt="Boxed" /></a></li>
							</ul>
						</div>
						<div class="color-switcher-block">
							<p><?php esc_html_e('Choose Colour style',"doctor"); ?></p>
							<ul>
								<li><a href="#." class="skyblue" id="default"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/skyblue.jpg" alt="skyblue"/></a></li>
								<li><a href="#." class="green" id="green"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/green.jpg" alt="green"/></a></li>
								<li><a href="#." class="blue" id="blue"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/blue.jpg" alt="blue"/></a></li>
								<li><a href="#." class="coral" id="coral"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/coral.jpg" alt="coral"/></a></li>
								<li><a href="#." class="cyan" id="cyan"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/cyan.jpg" alt="cyan"/></a></li>
								<li><a href="#." class="eggplant" id="eggplant"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/eggplant.jpg" alt="eggplant"/></a></li>
								<li><a href="#." class="pink" id="pink"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/pink.jpg" alt="pink"/></a></li>
								<li><a href="#." class="slateblue" id="slateblue"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/slateblue.jpg" alt="slateblue"/></a></li>
								<li><a href="#." class="gold" id="gold"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/gold.jpg" alt="gold"/></a></li>
								<li><a href="#." class="red" id="red"><img src="<?php echo esc_url(DOCTOR_IMGURI); ?>/red.jpg" alt="red"/></a></li>
							</ul>
						</div>
					</div>
				</div><!-- Style Switcher /- -->
				<?php
			}
			
			$pheader_type = ""; 
			$pheader_type = get_post_meta( doctor_get_the_ID(), 'doctor_cf_header_style', true );
			$header_type = doctor_options("opt_headertype");
			
			if( $pheader_type != "" ) {
				$hdr_type = $pheader_type;
			}
			elseif( $header_type != "" ) {
				$hdr_type = $header_type;
			}
			else {
				$hdr_type = "0";
			}
			get_template_part("template-parts/header" . $hdr_type );
			
			?>
			
			<?php
			if( $page_title != "disable" || is_search() ) {
				get_template_part("template-parts/pageheader" );
			}
			?>