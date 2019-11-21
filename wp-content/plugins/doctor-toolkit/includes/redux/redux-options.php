<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "doctor_option";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters( 'doctor_option/opt_name', $opt_name );

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	// TYPICAL -> Change these values as you need/desire
	'opt_name'             => $opt_name,
	// This is where your data is stored in the database and also becomes your global variable name.
	'display_name'         => $theme->get( 'Name' ),
	// Name that appears at the top of your panel
	'display_version'      => $theme->get( 'Version' ),
	// Version that appears at the top of your panel
	'menu_type'            => 'menu',
	//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
	'allow_sub_menu'       => true,
	// Show the sections below the admin menu item or not
	'menu_title'           => esc_html__( 'Doctor Options', "doctor-toolkit" ),
	'page_title'           => esc_html__( 'Doctor Options', "doctor-toolkit" ),
	// You will need to generate a Google API key to use this feature.
	// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
	'google_api_key'       => '',
	// Set it you want google fonts to update weekly. A google_api_key value is required.
	'google_update_weekly' => false,
	// Must be defined to add google fonts to the typography module
	'async_typography'     => true,
	// Use a asynchronous font on the front end or font string
	//'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
	'admin_bar'            => true,
	// Show the panel pages on the admin bar
	'admin_bar_icon'       => 'dashicons-portfolio',
	// Choose an icon for the admin bar menu
	'admin_bar_priority'   => 50,
	// Choose an priority for the admin bar menu
	'global_variable'      => '',
	// Set a different name for your global variable other than the opt_name
	'dev_mode'             => false,
	// Show the time the page took to load, etc
	'update_notice'        => true,
	// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
	'customizer'           => true,
	// Enable basic customizer support
	//'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
	//'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

	// OPTIONAL -> Give you extra features
	'page_priority'        => null,
	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_parent'          => 'themes.php',
	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	'page_permissions'     => 'manage_options',
	// Permissions needed to access the options panel.
	'menu_icon'            => '',
	// Specify a custom URL to an icon
	'last_tab'             => '',
	// Force your panel to always open to a specific tab (by id)
	'page_icon'            => 'icon-themes',
	// Icon displayed in the admin panel next to your menu_title
	'page_slug'            => '',
	// Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
	'save_defaults'        => true,
	// On load save the defaults to DB before user clicks save or not
	'default_show'         => false,
	// If true, shows the default value next to each field that is not the default value.
	'default_mark'         => '',
	// What to print by the field's title if the value shown is default. Suggested: *
	'show_import_export'   => true,
	// Shows the Import/Export panel when not used as a field.

	// CAREFUL -> These options are for advanced use only
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
	'output_tag'           => true,
	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
	// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	'database'             => '',
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'use_cdn'              => true,
	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

	// HINTS
	'hints'                => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	)
);

Redux::setArgs( $opt_name, $args );

// If Redux is running as a plugin, this will remove the demo notice and links
add_action( 'redux/loaded', 'doctor_remove_demo' );

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'General Settings', "doctor-toolkit" ),
	'icon'         => 'fa fa-cogs',
	'id'         => 'general_settings',
	'fields'     => array(
		array(
			'id'       => 'info_siteloader',
			'type'     => 'info',
			'title'    => esc_html__( 'Site Loader', 'doctor-toolkit' ),
		),
		array(
			'id'       => 'opt_siteloader',
			'type'     => 'switch',
			'title'    => esc_html__( 'Site Loader', 'doctor-toolkit' ),
			'default'  => "1",
			'on'       => 'On',
			'off'      => 'Off',
		),
		array(
			'id'       => 'info_rtl',
			'type'     => 'info',
			'title'    => esc_html__( 'RTL Setting', 'doctor-toolkit' ),
		),
		array(
			'id'       => 'opt_rtl_switch',
			'type'     => 'switch',
			'title'    => esc_html__( 'RTL', 'doctor-toolkit' ),
			'default'  => "0",
			'on'       => 'On',
			'off'      => 'Off',
		),
		
		array(
			'id'       => 'info_sticky',
			'type'     => 'info',
			'title'    => esc_html__( 'Sticky Menu', 'doctor-toolkit' ),
		),
		array(
			'id'       => 'opt_sticky_menu',
			'type'     => 'switch',
			'title'    => esc_html__( 'Sticky Menu', 'doctor-toolkit' ),
			'default'  => "1",
			'on'       => 'On',
			'off'      => 'Off',
		),
		
		array(
			'id'       => 'info_boxedlayout',
			'type'     => 'info',
			'title'    => esc_html__( 'Boxed Layout Background Image', 'doctor-toolkit' ),
		),

		array(
			'id'       => 'opt_boxedlayout_bg',
			'type'     => 'media',
			'url'      => true,
			'title'          => esc_html__( 'Page Boxed Layout Background Image( Default )', 'doctor-toolkit' ),
			'default'  => array( 'url' => esc_url( DOCTOR_LIB )  . 'images/box-layout-bg.jpg' ),
		),

		array(
			'id'       => 'info_switcher',
			'type'     => 'info',
			'title'    => esc_html__( 'Switcher', 'doctor-toolkit' ),
		),
		array(
			'id'       => 'opt_colorstyle_switch',
			'type'     => 'switch',
			'title'    => esc_html__( 'Color Scheme  & Page Layout', 'doctor-toolkit' ),
			'default'  => "0",
			'on'       => 'On',
			'off'      => 'Off',
		),
		
		array(
			'id'       => 'opt_select_stylesheet',
			'type'     => 'image_select',
			'icon'     => 'fa fa-tasks',
			'title'    => esc_html__( 'Color Scheme', "doctor-toolkit" ),
			'subtitle' => esc_html__( 'Select your themes alternative color scheme.', "doctor-toolkit" ),

			// Must provide key => value(array:title|img) pairs for radio options
			'options'  => array(
				'default' => array(
					'alt' => 'Default Color',
					'img' => esc_url( DOCTOR_LIB ) . 'images/color/skyblue.jpg'
				),
				'green' => array(
					'alt' => 'Green',
					'img' => esc_url( DOCTOR_LIB ) . 'images/color/green.jpg'
				),
				'blue' => array(
					'alt' => 'blue',
					'img' => esc_url( DOCTOR_LIB ) . 'images/color/blue.jpg'
				),
				'coral' => array(
					'alt' => 'coralt',
					'img' => esc_url( DOCTOR_LIB ) . 'images/color/coral.jpg'
				),
				'cyan' => array(
					'alt' => 'cyan',
					'img' => esc_url( DOCTOR_LIB ) . 'images/color/cyan.jpg'
				),
				'eggplant' => array(
					'alt' => 'eggplant',
					'img' => esc_url( DOCTOR_LIB ) . 'images/color/eggplant.jpg'
				),
				'pink' => array(
					'alt' => 'Pink',
					'img' => esc_url( DOCTOR_LIB ) . 'images/color/pink.jpg'
				),
				'slateblue' => array(
					'alt' => 'slateblue',
					'img' => esc_url( DOCTOR_LIB ) . 'images/color/slateblue.jpg'
				),
				'gold' => array(
					'alt' => 'gold',
					'img' => esc_url( DOCTOR_LIB ) . 'images/color/gold.jpg'
				),
				'red' => array(
					'alt' => 'red',
					'img' => esc_url( DOCTOR_LIB ) . 'images/color/red.jpg'
				),
			),
			'default'  => 'default'
		),
	),
));

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Page Header', "doctor-toolkit" ),
	'icon'         => 'fa fa-credit-card-alt',
	'id'         => 'page_header',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'opt_pageheader_img',
			'type'     => 'media',
			'url'      => true,
			'title'          => esc_html__( 'Page Header Image( Default )', 'doctor-toolkit' ),
			'default'  => array( 'url' => esc_url( DOCTOR_LIB )  . 'images/banner-bg.jpg' ),
		),
		array(
			'id'       => 'opt_pageheader_color',
			'type'     => 'color',
			'url'      => true,
			'title'          => esc_html__( 'Title Text Color', 'doctor-toolkit' ),
			'output'   => array( '.page-banner h3'),
		),
		array(
			'id'       => 'opt_pageheadersubtxt_color',
			'type'     => 'color',
			'url'      => true,
			'title'          => esc_html__( 'Sub Title Text Color', 'doctor-toolkit' ),
			'output'   => array( '.page-banner h3 span'),
		),
		array(
			'id'       => 'opt_pageheaderbg_overlay',
			'type'     => 'color_rgba',
			'title'   => esc_html__( 'Background Overlay', "doctor-toolkit" ),
			'subtitle' => esc_html__( 'Pick a color.', "doctor-toolkit" ),
			'options' => array(
				'show_alpha_only'    => true
			),
			'output'   => array( "background-color" => ".page-banner.custombg_overlay:before" ),
		),
		array(
			'id'        => 'opt_pageheader_height',
			'type'      => 'slider',
			'title'     => esc_html__('Page Header Height', 'doctor-toolkit'),
			'subtitle'       => esc_html__( 'Allow your users to choose minimum height of page header', 'doctor-toolkit' ),
			"default"   => 320,
			"min"       => 320,
			"step"      => 1,
			"max"       => 500,
			'display_value' => 'label'
		),
	),
));

Redux::setSection( $opt_name, array(
	'title'      => esc_html( 'Social Icons', "doctor-toolkit" ),
	'icon'         => 'fa fa-share-alt',
	'id'         => 'social_icons',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'info_social_icon',
			'type'     => 'info',
			'title'          => esc_html__( 'Social Icons', 'doctor-toolkit' ),
		),
		array(
			'id'             => 'opt_social_icons',
			'type'           => 'ow_repeater',
			'textOne'        => true,
			'image'          => false,
			'title'          => esc_html__( 'Social Icon Entries', 'doctor-toolkit' ),
			'subtitle'       => __( '<u>Here you can use css class like following :</u><br><br>- Elegant Icons( "<b>social_facebook</b>" )<br>- Stroke Gap( "<b>icon icon-Like</b>" )<br>- Font Awesome( "<b>fa fa-facebook</b>" )', 'doctor-toolkit' ),
			'placeholder'    => array(
				'textOne'  => "Font Icon CSS Class",
			)
		),
	),
));

/* Google Map */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Google Map', "doctor-toolkit" ),
	'icon' => 'fa fa-map',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'=>'map_api',
			'type' => 'text',
			'title' => esc_html__( 'API Key', "doctor-toolkit" ),
			'desc' => wp_kses( __( '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Get Api Key</a>', "doctor-toolkit" ), array( 'a' => array( 'target' => array(), 'href' => array() ) ) ),
		),
		/* Fields /- */
	),
) );

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Layout Settings', "doctor-toolkit" ),
	'icon'         => 'fa fa-desktop',
	'id'         => 'layout_settings',
	'fields'     => array(
		
	),
));

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Body Layout', "doctor-toolkit" ),
	'icon'         => 'fa fa-desktop',
	'id'         => 'body_layout',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'info_layout_body',
			'type'     => 'info',
			'title'    => esc_html__( 'Body Layout', 'doctor-toolkit' ),
		),
		array(
			'id'       => 'layout_body',
			'type'     => 'image_select',
			'icon'     => 'fa fa-tasks',
			'title'    => esc_html__( 'Body Layout', "doctor-toolkit" ),
			'options'  => array(
				'fixed' => array(
					'alt' => 'Boxed',
					'img' => esc_url( DOCTOR_LIB ) . 'images/layout/boxed.png'
				),
				'fluid' => array(
					'alt' => 'Full',
					'img' => esc_url( DOCTOR_LIB ) . 'images/layout/full.png'
				),
			),			
			'default'  => 'fixed'
		),
		
		array(
			'id'       => 'info_sidebar_layout',
			'type'     => 'info',
			'title'    => esc_html__( 'Sidebar Layout', 'doctor-toolkit' ),
		),
		array(
			'id'       => 'layout_sidebar',
			'type'     => 'image_select',
			'icon'     => 'fa fa-tasks',
			'title'    => esc_html__( 'Sidebar Settings', "doctor-toolkit" ),
			'options'  => array(
				'right_sidebar' => array(
					'alt' => 'Right Sidebar',
					'img' => esc_url( DOCTOR_LIB ) . 'images/layout/right_side.png'
				),
				'left_sidebar' => array(
					'alt' => 'Left Sidebar',
					'img' => esc_url( DOCTOR_LIB ) . 'images/layout/left_side.png'
				),
				'no_sidebar' => array(
					'alt' => 'No Sidebar',
					'img' => esc_url( DOCTOR_LIB ) . 'images/layout/no_side.png'
				),
			),			
			'default'  => 'right_sidebar'
		),
	),
));

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Header/Footer', "doctor-toolkit" ),
	'icon'         => 'fa fa-archive',
	'id'         => 'site_headerfooter',
	'fields'     => array(
	),
));

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Header', "doctor-toolkit" ),
	'icon'         => 'fa fa-credit-card',
	'subsection' => true,
	'id'         => 'site_header',
	'fields'     => array(
		
		array(
			'id'       => 'info_headertype',
			'type'     => 'info',
			'notice' => true,
			'style' => 'critical',
			'icon' => 'fa fa-bars',
			'title'    => esc_html__( 'Header Type', 'doctor-toolkit' ),
			'subtitle' => esc_html__( 'Choose Header Type', 'doctor-toolkit' ),
		),
	
		array(
			'id'       => 'opt_headertype',
			'type'     => 'select',
			'title'    => esc_html__( 'Header Style', "doctor-toolkit" ),
			'options'  => array(
				'0' => 'Default',
				'1' => 'Header 1',
				'2' => 'Header 2',
				'3' => 'Header 3',
				'4' => 'Header 4',
				'5' => 'Header 5',
				'6' => 'Header 6',
				'7' => 'Header 7',
				'8' => 'Header 8',
				'9' => 'Header 9',
				'10' => 'Header 10',
				'11' => 'Header 11',
				'12' => 'Header 12',
				'13' => 'Header 13',
				'14' => 'Header 14',
				'15' => 'Header 15',
				'16' => 'Header 16',
				'17' => 'Header 17',
				'18' => 'Header 18',
				'19' => 'Header 19',
				'20' => 'Header 20',
			),
			'default'  => '0',
		),
		
		/* Logo */
		array(
			'id'       => 'info_sitelogo',
			'type'     => 'info',
			'notice' => true,
			'style' => 'critical',
			'icon' => 'fa fa-cube',
			'title'    => esc_html__( 'Site Logo', 'doctor-toolkit' ),
			'subtitle' => esc_html__( 'Choose Logo Type', 'doctor-toolkit' ),
		),
		
		array(
			'id'       => 'opt_menuicon_switch',
			'type'     => 'switch',
			'title'    => esc_html__( 'Logo Icon', 'doctor-toolkit' ),
			'default'  => "1",
			'on'       => 'On',
			'off'      => 'Off',
		),
		
		array(
			'id'       => 'opt_logo_icon',
			'type'     => 'text',
			'title'    => esc_html__( 'Logo Icon Class', "doctor-toolkit" ),
			'default'  => 'fa fa-heartbeat',
			'desc' => wp_kses( __( '<a href="https://fontawesome.io/icons" target="_blank">Icon Here!</a>', "doctor-toolkit" ), array( 'a' => array( 'target' => array(), 'href' => array() ) ) ),
		),
		
		array(
			'id'       => 'opt_logotype',
			'type'     => 'select',
			'title'    => esc_html__( 'Logo Type', "doctor-toolkit" ),
			'options'  => array(
				'1' => 'Site Title',
				'2' => 'Image',
				'3' => 'Custom Text',
			),
			'default'  => '3',
		),
		array(
			'id'             => 'opt_logo_size',
			'type'           => 'dimensions',
			'units'          => array( 'px' ),    // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true',  // Allow users to select any type of unit
			'title'          => esc_html__( 'Logo (Width/Height) Option', "doctor-toolkit" ),
			'required' => array( 'opt_logotype', '=', '2' ),
		),
		array(
			'id'=>'opt_logoimg',
			'type' => 'media',
			'title' => esc_html__('Logo Upload', "doctor-toolkit" ),
			'required' => array( 'opt_logotype', '=', '2' ),
		),
		array(
			'id'=>'opt_customtxt',
			'type' => 'text',
			'title' => esc_html__('Custom Text', "doctor-toolkit" ),
			'required' => array( 'opt_logotype', '=', '3' ),
			'default'  => "Doctor"
		),
		/* Logo /- */
	
		/* Header Contact Details */
		array(
			'id'       => 'info_header',
			'type'     => 'info',
			'notice' => true,
			'style' => 'critical',
			'icon' => 'fa fa-cube',
			'title'    => esc_html__( 'Contact Details', 'doctor-toolkit' ),
		),
		
		array(
			'id'       => 'opt_header_contact',
			'type'     => 'text',
			'title'    => esc_html__( 'Contact Number 1', "doctor-toolkit" ),
			'default'  => '+386 489 550 686',
		),
		
		array(
			'id'       => 'opt_header_contactsec',
			'type'     => 'text',
			'title'    => esc_html__( 'Contact Number 2', "doctor-toolkit" ),
			'default'  => '1234 - 5678 - 9012',
		),
		array(
			'id'       => 'opt_header_email',
			'type'     => 'text',
			'title'    => esc_html__( 'Email Address', "doctor-toolkit" ),
			'default'  => 'test@example.com',
		),
		/* Header Contact Details /- */
		array(
			'id'       => 'info_menushow',
			'type'     => 'info',
			'notice' => true,
			'style' => 'critical',
			'icon' => 'fa fa-cube',
			'title'    => esc_html__( 'Menu List Item Hide And Show', 'doctor-toolkit' ),
			'required' => array( 'opt_headertype', '=', '10' ),
		),

		array(
			'id'       => 'opt_menu_show',
			'type'     => 'switch',
			'title'    => esc_html__( 'Menu List Hide And Show', 'doctor-toolkit' ),
			'default'  => "1",
			'on'       => 'On',
			'off'      => 'Off',
			'required' => array( 'opt_headertype', '=', '10' ),
		),
	),
));

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Footer', "doctor-toolkit" ),
	'icon'         => 'fa fa-window-maximize',
	'id'         => 'site_footer',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'info_footerbg',
			'type'     => 'info',
			'notice' => true,
			'style' => 'critical',
			'icon' => 'fa fa-cube',
			'title'    => esc_html__( 'Footer Background Image', 'doctor-toolkit' ),
		),
		array(
			'id'       => 'opt_footer_bg',
			'type'     => 'media',
			'url'      => true,
			'title'          => esc_html__( 'Footer Background Image( Default )', 'doctor-toolkit' ),
			'default'  => array( 'url' => esc_url( DOCTOR_LIB ) . 'images/footer-bg.jpg' ),
		),
		array(
			'id'       => 'info_coyright',
			'type'     => 'info',
			'notice' => true,
			'style' => 'critical',
			'icon' => 'fa fa-cube',
			'title'    => esc_html__( 'Footer Copyright', 'doctor-toolkit' ),
		),
		
		array(
			'id'       => 'opt_copyright_bg',
			'type'     => 'background',
			'background-size'     => false,
			'background-repeat'     => false,
			'background-position'     => false,
			'background-image'     => false,
			'background-attachment'     => false,
			'output'   => array( '.footer-bottom' ),
			'title'    => esc_html__( 'Background Color', "doctor-toolkit" ),
		),
		
		array(
			'id'       => 'opt_copyright_txtclr',
			'type'     => 'color',
			'output'   => array( '.footer-bottom p' ),
			'title'    => esc_html__('Pick a Copyright Text color for the theme.', "doctor-toolkit"),
		),
		
		array(
			'id'       => 'opt_footer_copyright',
			'type'     => 'editor',
			'title'    => esc_html__( 'Copyright Text', "doctor-toolkit" ),
			'subtitle' => esc_html__( 'Use any of the features of WordPress editor inside your panel!', "doctor-toolkit" ),
			'default'  => '&copy; [year] Doctor Theme. All Rights Reserved',
			 'args'   => array(
				'teeny'            => true,
				'textarea_rows'    => 10
			)
		),
		/* Fields /- */
	),
));

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Other Pages', "doctor-toolkit" ),
	'icon'         => 'el el-file',
	'id'         => 'other_pages',
	'fields'     => array(),
));

/* Blog Single Post */
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Blog Single Post Options', "doctor-toolkit" ),
	'icon'         => 'fa fa-commenting-o',
	'id'         => 'blog_post',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'opt_post_tags',
			'type'     => 'switch',
			'title'    => esc_html__( 'Tags', 'doctor-toolkit' ),
			'default'  => "1",
			'on'       => 'On',
			'off'      => 'Off',
		),
		array(
			'id'       => 'opt_post_category',
			'type'     => 'switch',
			'title'    => esc_html__( 'Categories', 'doctor-toolkit' ),
			'default'  => "1",
			'on'       => 'On',
			'off'      => 'Off',
		),
		array(
			'id'       => 'opt_post_author',
			'type'     => 'switch',
			'title'    => esc_html__( 'Author Details', 'doctor-toolkit' ),
			'default'  => "1",
			'on'       => 'On',
			'off'      => 'Off',
		),
	),
));

/* Search Page */
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Search Page', "doctor-toolkit" ),
	'icon'         => 'fa fa-search',
	'id'         => 'page_search',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'opt_search_bg',
			'type'     => 'media',
			'url'      => true,
			'title'          => esc_html__( 'Search Page Header Background Image( Default )', 'doctor-toolkit' ),
			'default'  => array( 'url' => esc_url( DOCTOR_LIB ) . 'images/banner-bg.jpg' ),
		),
	),
));

/* 404 Page */
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( '404 Page', "doctor-toolkit" ),
	'icon'         => 'fa fa-exclamation-triangle',
	'id'         => 'page_error',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'opt_error_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Title', "doctor-toolkit" ),
			'default'  => '404',
		),
		array(
			'id'       => 'opt_error_subtitle',
			'type'     => 'text',
			'title'    => esc_html__( 'Sub Title', "doctor" ),
			'default'  => 'Oops Error ! This Page Not Found',
		),
		array(
			'id'       => 'opt_error_img',
			'type'     => 'media',
			'url'      => true,
			'title'          => esc_html__( '404 Image( Default )', 'doctor-toolkit' ),
			'default'  => array( 'url' => esc_url( DOCTOR_LIB ) . 'images/404.jpg' ),
		),
		
		array(
			'id'       => 'opt_404_bg',
			'type'     => 'media',
			'url'      => true,
			'title'          => esc_html__( '404 Page Header Background Image( Default )', 'doctor-toolkit' ),
			'default'  => array( 'url' => esc_url( DOCTOR_LIB ) . 'images/banner-bg.jpg' ),
		),
	),
));

/* Admin Login */
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Admin Login Page', "doctor-toolkit" ),
	'icon'         => 'fa fa-lock',
	'id'         => 'page_admin',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'opt_adminlogo',
			'type'     => 'media',
			'title'    => esc_html__( 'Logo Image', "doctor-toolkit" ),
		),
		array(
			'id'       => 'opt_adminbg_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Background Color', "doctor-toolkit" ),
		),
		array(
			'id'       => 'opt_adminbg_img',
			'type'     => 'media',
			'title'    => esc_html__( 'Background Image', "doctor-toolkit" ),
		),
		array(
			'id'       => 'opt_admincolor',
			'type'     => 'color',
			'title'    => esc_html__( 'Text Color', "doctor-toolkit" ),
		),
	),
));

/* Shortcodes */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Shortcodes', "doctor-toolkit" ),
	'id'    => 'shortcode_options',
	'icon'  => 'el el-credit-card',
	'subsection' => false,
	'fields'     => array(
	)
) );

/* Welcome Clinic */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Welcome Clinic', "doctor-toolkit"),
	'icon'         => 'fa fa-handshake-o',
	'id'         => 'welcome',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_welcome',
			'type'     => 'ow_repeater', 
			'title'    => esc_html__('Welcome Clinic Data', "doctor-toolkit" ),
			'image'    => false,
			'url'    => false,
			'description'    => true,
			'textOne'    => true,
			'placeholder'    => array(
				'title'    => esc_html__('Title', "doctor-toolkit" ),
				'textOne'    => esc_html__('Font Awesome Icon Class', "doctor-toolkit" ),
				'description'    => esc_html__('Description Text', "doctor-toolkit" ),
			),
		),
		/* Fields /- */
	)
));

/* Department */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Department', "doctor-toolkit"),
	'icon'         => 'fa fa-life-ring',
	'id'         => 'department',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_department',
			'type'     => 'ow_repeater', 
			'title'    => esc_html__('Department', "doctor-toolkit" ),
			'image'    => true,
			'url'    => true,
			'placeholder'    => array(
				'title'    => esc_html__('Title', "doctor-toolkit" ),
				'url'    => esc_html__('URL', "doctor-toolkit" ),
			),
		),
		/* Fields /- */
	)
));

/* Extra Services */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Extra Service', "doctor-toolkit"),
	'icon'         => 'fa fa-tasks',
	'id'         => 'extra_service',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_extraservice',
			'type'     => 'ow_repeater', 
			'title'    => esc_html__('Extra Service', "doctor-toolkit" ),
			'image'    => false,
			'url'    => true,
			'textOne'    => true,
			'textTwo'    => true,
			'description'    => true,
			'placeholder'    => array(
				'title'    => esc_html__('Title', "doctor-toolkit" ),
				'textOne'    => esc_html__('Font Awesome Icon Class', "doctor-toolkit" ),
				'description'    => esc_html__('Short Description Text', "doctor-toolkit" ),
				'textTwo'    => esc_html__('Button Text', "doctor-toolkit" ),
				'url'    => esc_html__('Button URL', "doctor-toolkit" ),
			),
		),
		/* Fields /- */
	)
));

/* Other Services */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Other Service', "doctor-toolkit"),
	'icon'         => 'fa fa-tasks',
	'id'         => 'other_service',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_otherservice',
			'type'     => 'ow_repeater', 
			'title'    => esc_html__('Other Service', "doctor-toolkit" ),
			'image'    => false,
			'url'    => true,
			'textOne'    => true,
			'textTwo'    => true,
			'description'    => true,
			'placeholder'    => array(
				'title'    => esc_html__('Title', "doctor-toolkit" ),
				'textOne'    => esc_html__('Font Awesome Icon Class', "doctor-toolkit" ),
				'description'    => esc_html__('Short Description Text', "doctor-toolkit" ),
				'textTwo'    => esc_html__('Button Text', "doctor-toolkit" ),
				'url'    => esc_html__('Button URL', "doctor-toolkit" ),
			),
		),
		/* Fields /- */
	)
));

/* Tab Services Content */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Tab Service Content', "doctor-toolkit"),
	'icon'         => 'fa fa-tasks',
	'id'         => 'tab_service',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_tabservice',
			'type'     => 'ow_repeater', 
			'title'    => esc_html__('Tab Service Item ', "doctor-toolkit" ),
			'image'    => true,
			'url'    => false,
			'description'    => true,
			'placeholder'    => array(
				'title'    => esc_html__('Title', "doctor-toolkit" ),
				'description'    => esc_html__('Description Text', "doctor-toolkit" ),
			),
		),
		/* Fields /- */
	)
));

/* Service Offer */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Offer', "doctor-toolkit"),
	'icon'         => 'fa fa-thumbs-o-up',
	'id'         => 'offer_service',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_offer',
			'type'     => 'ow_repeater', 
			'title'    => esc_html__('Offer Item ', "doctor-toolkit" ),
			'image'    => false,
			'textOne'    => true,
			'textTwo'    => true,
			'url'    => true,
			'description'    => true,
			'placeholder'    => array(
				'title'    => esc_html__('Title', "doctor-toolkit" ),
				'textOne'    => esc_html__('Font Awesome ICon', "doctor-toolkit" ),
				'textTwo'    => esc_html__('Button Text', "doctor-toolkit" ),
				'description'    => esc_html__('Description Text', "doctor-toolkit" ),
				'url'    => esc_html__('Button URL', "doctor-toolkit" ),
			),
		),
		/* Fields /- */
	)
));

/* Testimonial */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Testimonial', "doctor-toolkit"),
	'icon'         => 'fa fa-quote-left',
	'id'         => 'testimonail',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_testimonial',
			'type'     => 'ow_repeater', 
			'title'    => esc_html__('Testimonial', "doctor-toolkit" ),
			'image'    => true,
			'url'    => false,
			'description'    => true,
			'placeholder'    => array(
				'title'    => esc_html__('Title', "doctor-toolkit" ),
				'description'    => esc_html__('Description Text', "doctor-toolkit" ),
			),
		),
		/* Fields /- */
	)
));

/* Team */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Our Team', "doctor-toolkit"),
	'icon'         => 'fa fa-user',
	'id'         => 'team',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_team',
			'type'     => 'ow_repeater', 
			'title'    => esc_html__('Our Team', "doctor-toolkit" ),
			'image'    => true,
			'url'    => false,
			'textOne'    => true,
			'placeholder'    => array(
				'title'    => esc_html__('Title', "doctor-toolkit" ),
				'textOne'    => esc_html__('Designation', "doctor-toolkit" ),
			),
		),
		/* Fields /- */
	)
));

/* Partner */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Partner', "doctor-toolkit"),
	'icon'         => 'fa fa-shield',
	'id'         => 'other_partner',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_partner',
			'type'     => 'ow_repeater', 
			'title'    => esc_html__('Partner', "doctor-toolkit" ),
			'image'    => true,
			'url'    => true,
		),
		/* Fields /- */
	)
));

/* Custom Css */
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Accordion Widget', "doctor-toolkit" ),
	'icon'         => 'fa fa-caret-square-o-down',
	'id'         => 'accordion_wid',
	'subsection' => false,
	'fields'     => array(
	
		/* Fields */
		array(
			'id'       => 'opt_accordion',
			'type'     => 'ow_repeater', 
			'title'    => esc_html__('Accordion Widget Item', "doctor-toolkit" ),
			'image'    => false,
			'url'    => false,
			'description'    => true,
			'placeholder'    => array(
				'title'    => esc_html__('Title', "doctor-toolkit" ),
				'description'    => esc_html__('Description Text', "doctor-toolkit" ),
			),
		),
		/* Fields /- */
	),
));

/* Custom Css */
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Custom CSS', "doctor-toolkit" ),
	'icon'         => 'fa fa-code',
	'id'         => 'custom_css',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'        => 'custom_css_desktop',
			'type'      => 'ace_editor',
			'title'     => esc_html__('Custom CSS for 992 to Larger Screen Resolution (iPad Landscape & Desktop)', 'doctor-toolkit'),
			'subtitle'  => esc_html__('Paste your CSS code here.', 'doctor-toolkit'),
			'mode'      => 'css',
			'theme'     => 'monokai',
		),
		array(
			'id'        => 'custom_css_tablet',
			'type'      => 'ace_editor',
			'title'     => esc_html__('Custom CSS for 768px to 991px Screen Resolution (iPad Portrait)', 'doctor-toolkit'),
			'subtitle'  => esc_html__('Paste your CSS code here.', 'doctor-toolkit'),
			'mode'      => 'css',
			'theme'     => 'monokai',
		),
		array(
			'id'        => 'custom_css_mobile',
			'type'      => 'ace_editor',
			'icon'     => "fa fa-tasks",
			'title'     => esc_html__('Custom CSS for 767px to Lower Screen Resolution (iPhone Landscape)', 'doctor-toolkit'),
			'subtitle'  => esc_html__('Paste your CSS code here.', 'doctor-toolkit'),
			'mode'      => 'css',
			'theme'     => 'monokai',
		),
	),
));

/* Typography Css */
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Typography', "doctor-toolkit" ),
	'icon'         => 'fa fa-text-height ',
	'id'         => 'site_typography',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'info_body_font',
			'type'     => 'info',
			'title'    => esc_html__( 'Body Font Settings', 'doctor-toolkit' ),
		),
		array(
			'id'          => 'opt_body_font',
			'type'        => 'typography', 
			'title'       => esc_html__('Body Style', 'doctor-toolkit'),
			'google'      => true, 
			'font-backup' => false,
			'subsets'      => false,
			'text-align'      => false,
			'line-height'      => false,
			'output'      => array('body'),
			'units'       =>'px',
			'subtitle'    => esc_html__('Body Style', 'doctor-toolkit'),
		),
		array(
			'id' => 'notice_critical11',
			'type' => 'info',
			'notice' => true,
			'style' => 'critical',
			'icon' => 'fa fa-font',
			'title' => esc_html__('H1 to H6 Styling', 'doctor-toolkit'),
			'subtitle' => esc_html__('Typography settings H1 to H6 Tags', 'doctor-toolkit'),
		),
		array(
			'id' => 'h1-font',
			'type' => 'typography',
			'title' => esc_html__('H1', 'doctor-toolkit'),
			'subtitle' => esc_html__('Specify the Heading font properties.', 'doctor-toolkit'),
			'google' => true,
			'text-align' =>false,
			'output' => 'h1',
		),
		array(
			'id' => 'h2-font',
			'type' => 'typography',
			'title' => esc_html__('H2', 'doctor-toolkit'),
			'subtitle' => esc_html__('Specify the Heading font properties.', 'doctor-toolkit'),
			'google' => true,
			'text-align' =>false,
			'output' => 'h2',
		),
		array(
			'id' => 'h3-font',
			'type' => 'typography',
			'title' => esc_html__('H3', 'doctor-toolkit'),
			'subtitle' => esc_html__('Specify the Heading font properties.', 'doctor-toolkit'),
			'google' => true,
			'text-align' =>false,
			'output' => 'h3',
		),
		array(
			'id' => 'h4-font',
			'type' => 'typography',
			'title' => esc_html__('H4', 'doctor-toolkit'),
			'subtitle' => esc_html__('Specify the Heading font properties.', 'doctor-toolkit'),
			'google' => true,
			'text-align' =>false,
			'output' => 'h4',			
		),
		array(
			'id' => 'h5-font',
			'type' => 'typography',
			'title' => esc_html__('H5', 'doctor-toolkit'),
			'subtitle' => esc_html__('Specify the Heading font properties.', 'doctor-toolkit'),
			'google' => true,
			'text-align' =>false,
			'output' => 'h5',			
		),
		array(
			'id' => 'h6-font',
			'type' => 'typography',
			'title' => esc_html__('H6', 'doctor-toolkit'),
			'subtitle' => esc_html__('Specify the Heading font properties.', 'doctor-toolkit'),
			'google' => true,
			'text-align' =>false,
			'output' => 'h6',
		),
	),
));

/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if ( ! function_exists( 'doctor_remove_demo' ) ) {
	function doctor_remove_demo() {
		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
		if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
			remove_filter( 'plugin_row_meta', array(
				ReduxFrameworkPlugin::instance(),
				'plugin_metalinks'
			), null, 2 );

			// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
			remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
		}
	}
}