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
<header class="header_s header_default<?php echo esc_attr($sticky_menu); ?>">
	<!-- Container -->
	<div class="container">
	
		<!-- Top Header -->
		<div class="default-top row">
			<div class="logo-block">
				<?php
					if( $plogo != "" ) { 
						?>
						<a class="navbar-brand mobile-hide image-logo full-view-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( $plogo ); ?>" alt=""  />
						</a>
						<?php
					}
					elseif( doctor_options('opt_logotype') == "2" && $limg != "" ) { // Logo - Image
						?>
						<a class="navbar-brand mobile-hide image-logo full-view-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php if( $logo_w != "px" && $logo_h != "px" ) { ?>style="<?php if( $logo_w != "px" ) { ?>max-width: <?php echo esc_attr( $logo_w ); ?>; <?php } ?> <?php if( $logo_h != "px" ) { ?>max-height: <?php echo esc_attr( $logo_h ); ?>;<?php } ?>"<?php } ?>>
							<img src="<?php echo esc_url( $limg ); ?>" alt=""/>
						</a>
						<?php
					}
					elseif( doctor_options('opt_logotype') == "1" && $lsitetitle != "" ) { // Logo - Site Title
						?>
						<a class="navbar-brand mobile-hide site-title full-view-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
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
						<a class="navbar-brand mobile-hide custom-txt full-view-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
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
						<a class="navbar-brand site-title mobile-hide full-view-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
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
			<?php if( doctor_options("opt_header_contact") != "") { ?><a href="tel:<?php echo esc_attr(str_replace(" ", "", doctor_options("opt_header_contact") ) ); ?>" title="<?php echo esc_attr( doctor_options("opt_header_contact") ); ?>" class="phone-call"><i class="fa fa-phone-square"></i><?php echo esc_attr( doctor_options("opt_header_contact") ); ?></a><?php } ?>
		</div><!-- Top Header /- -->
		
	</div><!-- Container /- -->
	
	<!-- Ownavigation -->
	<nav class="navbar ownavigation nav_absolute">
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
						<a class="navbar-brand desktop-hide image-logo mobile-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( $plogo ); ?>" alt="" />
						</a>
						<?php
					}
					elseif( doctor_options('opt_logotype') == "2" && $limg != "" ) { // Logo - Image
						?>
						<a class="navbar-brand desktop-hide image-logo mobile-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php if( $logo_w != "px" && $logo_h != "px" ) { ?>style="<?php if( $logo_w != "px" ) { ?>max-width: <?php echo esc_attr( $logo_w ); ?>; <?php } ?> <?php if( $logo_h != "px" ) { ?>max-height: <?php echo esc_attr( $logo_h ); ?>;<?php } ?>"<?php } ?>>
							<img src="<?php echo esc_url( $limg ); ?>" alt=""/>
						</a>
						<?php
					}
					elseif( doctor_options('opt_logotype') == "1" && $lsitetitle != "" ) { // Logo - Site Title
						?>
						<a class="navbar-brand desktop-hide site-title mobile-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
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
						<a class="navbar-brand desktop-hide custom-txt mobile-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
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
						<a class="navbar-brand desktop-hide site-title mobile-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
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
							'menu_class' => 'nav navbar-nav menubar',
							'walker' => new doctor_nav_walker
						));
					}
					elseif( has_nav_menu('doctor_primary_nav') ) {
						wp_nav_menu( array(
							'theme_location' => 'doctor_primary_nav',
							'container' => false,
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth' => 10,
							'menu_class' => 'nav navbar-nav menubar',
							'walker' => new doctor_nav_walker
						));
					}
					else {
						?><h3 class="menu-setting-info"><a href="<?php echo esc_url( home_url("/wp-admin/nav-menus.php") ); ?>"><?php esc_html_e( 'Set The Menu', "doctor" );?></a></h3><?php
					}
				?>
			</div>
		</div><!-- Container /- -->
	</nav><!-- Ownavigation /- -->
</header>