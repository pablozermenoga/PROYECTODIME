<?php
$sticky_menu = "";
if( doctor_options("opt_sticky_menu") != "0") {
	$sticky_menu = " menusticky";
}
else {
	$sticky_menu = " no-menusticky";
}

$plogo = $limg = $lsitetitle = $lcustomtxt = $logo_w = $logo_h = "";

$plogo = get_post_meta( doctor_get_the_ID(), "doctor_cf_custom_logo", true );
$limg = doctor_options('opt_logoimg','url');
$lsitetitle = get_bloginfo('name');
$lcustomtxt = doctor_options('opt_customtxt');

$logo_w = doctor_options('opt_logo_size',"width");
$logo_h = doctor_options('opt_logo_size','height');
?>
<header class="header_s header_s1 header_s11 header_s13 header_s14<?php echo esc_attr($sticky_menu); ?>">
	<?php
		if( doctor_options("opt_header_contactsec") != "" || doctor_options("opt_header_email") != "" || doctor_options("opt_social_icons") != "" ) {
			?>
			<!-- SidePanel -->
			<div id="slidepanel">
				<!-- Top Header -->
				<div class="top-header container-fluid no-left-padding no-right-padding">
					<!-- Container -->
					<div class="container">
						<?php
							if( doctor_options("opt_header_contactsec") != "" || doctor_options("opt_header_email") != "" ) {
								?>
								<div class="call-info">
									<?php if( doctor_options("opt_header_contactsec") != "" ) { ?><p><a href="tel:<?php echo esc_attr(str_replace(" ", "", doctor_options("opt_header_contactsec") ) ); ?>" title="<?php echo esc_attr(str_replace(" ", "", doctor_options("opt_header_contactsec") ) ); ?>" class="phone"><i class="fa fa-phone"></i><?php echo esc_attr( doctor_options("opt_header_contactsec") ); ?></a></p><?php } ?>
									<?php if( doctor_options("opt_header_email") != "" ) { ?><p><a href="mailto:<?php echo esc_attr( doctor_options("opt_header_email") ); ?>" title="<?php echo esc_attr(doctor_options("opt_header_email") ); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_attr( doctor_options("opt_header_email") ); ?></a></p><?php } ?>
								</div>
								<?php
							}
							if( doctor_options("opt_social_icons") != "" ) {
								get_template_part("template-parts/social_icons");
							}
						?>
					</div><!-- Container /- -->
				</div><!-- Top Header /- -->
			</div><!-- SidePanel /- -->
			<?php
		}
	?>
	<!-- Ownavigation -->
	<nav class="navbar ownavigation">
		<!-- Container -->
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only"><?php esc_html_e('Toggle navigation',"doctor"); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php
					if( $plogo != "" ) { 
						?>
						<a class="navbar-brand image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( $plogo ); ?>" alt=""  />
						</a>
						<?php
					}
					elseif( doctor_options('opt_logotype') == "2" && $limg != "" ) { // Logo - Image
						?>
						<a class="navbar-brand image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php if( $logo_w != "px" && $logo_h != "px" ) { ?>style="<?php if( $logo_w != "px" ) { ?>max-width: <?php echo esc_attr( $logo_w ); ?>; <?php } ?> <?php if( $logo_h != "px" ) { ?>max-height: <?php echo esc_attr( $logo_h ); ?>;<?php } ?>"<?php } ?>>
							<img src="<?php echo esc_url( $limg ); ?>" alt=""/>
						</a>
						<?php
					}
					elseif( doctor_options('opt_logotype') == "1" && $lsitetitle != "" ) { // Logo - Site Title
						?>
						<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php 
								if( doctor_options("opt_menuicon_switch") != "0" ) {
									if( doctor_options("opt_logo_icon") != "" ) {
										?><i class="<?php echo esc_attr( doctor_options("opt_logo_icon") ); ?>"></i>
										<?php 
									} 
									else {
										?><i class="fa fa-heartbeat"></i><?php
									}
								}
								echo get_bloginfo( $lsitetitle );
							?>
						</a>
						<?php
					}
					elseif( doctor_options('opt_logotype') == "3" && $lcustomtxt != "" ) { // Logo - Custom Text
						?>
						<a class="navbar-brand custom-txt" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php 
								if( doctor_options("opt_menuicon_switch") != "0" ) {
									if( doctor_options("opt_logo_icon") != "" ) {
										?><i class="<?php echo esc_attr( doctor_options("opt_logo_icon") ); ?>"></i>
										<?php 
									} 
									else {
										?><i class="fa fa-heartbeat"></i><?php
									}
								}
								echo esc_attr( $lcustomtxt );
							?>
						</a>
						<?php
					} 
					else {
						?>
						<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php 
								if( doctor_options("opt_menuicon_switch") != "0" ) {
									if( doctor_options("opt_logo_icon") != "" ) {
										?><i class="<?php echo esc_attr( doctor_options("opt_logo_icon") ); ?>"></i>
										<?php 
									} 
									else {
										?><i class="fa fa-heartbeat"></i><?php
									}
								}
								echo get_bloginfo( $lsitetitle );
							?>
						</a>
						<?php
					}
				?>
			</div>
			<div class="navbar-collapse collapse" id="navbar">
				<?php
					$nav = "";
					$nav = get_post_meta( doctor_get_the_ID(), 'doctor_cf_page_navmenu', true );
					if( $nav != "" && $nav != "0" ) {
						wp_nav_menu( array(
							'menu' => $nav,
							'theme_location' => 'doctor_primary_nav',
							'container' => false,
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth' => 10,
							'menu_class' => 'nav navbar-nav menubar navbar-right',
							'walker' => new doctor_nav_walker
						));
					}
					elseif( has_nav_menu('doctor_primary_nav') ) {
						wp_nav_menu( array(
							'theme_location' => 'doctor_primary_nav',
							'container' => false,
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth' => 10,
							'menu_class' => 'nav navbar-nav menubar navbar-right',
							'walker' => new doctor_nav_walker
						));
					}
					else {
						?><h3 class="menu-setting-info"><a href="<?php echo esc_url( home_url("/wp-admin/nav-menus.php") ); ?>"><?php esc_html_e( 'Set The Menu', "doctor" );?></a></h3><?php
					}
				?>
			</div>
			<?php
				if( doctor_options("opt_header_contactsec") != "" || doctor_options("opt_header_email") != "" || doctor_options("opt_social_icons") != "" ) {
					?>
					<div id="loginpanel" class="desktop-hide">
						<div class="right" id="toggle">
							<a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
							<a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
						</div>
					</div>
					<?php
				}
			?>
		</div><!-- Container /- -->
	</nav><!-- Ownavigation /- -->
</header>