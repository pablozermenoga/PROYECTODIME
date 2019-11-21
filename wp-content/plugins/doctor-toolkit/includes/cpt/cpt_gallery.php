<?php
/* CPT : Gallery */
if ( ! function_exists('doctor_cpt_gallery') ) {

	add_action( 'init', 'doctor_cpt_gallery', 0 );

	function doctor_cpt_gallery() {

		$labels = array(
			'name' =>  esc_html__('Gallery', "doctor-toolkit" ),
			'singular_name' => esc_html__('Gallery', "doctor-toolkit" ),
			'add_new' => esc_html__('Add New', "doctor-toolkit" ),
			'add_new_item' => esc_html__('Add New Gallery', "doctor-toolkit" ),
			'edit_item' => esc_html__('Edit Gallery', "doctor-toolkit" ),
			'new_item' => esc_html__('New Gallery', "doctor-toolkit" ),
			'all_items' => esc_html__('All Gallery', "doctor-toolkit" ),
			'view_item' => esc_html__('View Gallery', "doctor-toolkit" ),
			'search_items' => esc_html__('Search Gallery', "doctor-toolkit" ),
			'not_found' =>  esc_html__('No Gallery found', "doctor-toolkit" ),
			'not_found_in_trash' => esc_html__('No Gallery found in Trash', "doctor-toolkit" ),
			'parent_item_colon' => '',
			'menu_name' => esc_html__('Gallery', "doctor-toolkit")
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'supports' => array( 'title','thumbnail','editor' ),
			'rewrite'  => array( 'slug' => 'gallery-item' ),
			'has_archive' => false, 
			'capability_type' => 'post', 
			'hierarchical' => false,
			'menu_position' => 106,
			'menu_icon' => 'dashicons-images-alt2',
		);
		register_post_type( 'doctor_gallery', $args );
	}
}
/* Register Custom Taxonomy */
add_action( 'init', 'doctor_tax_gallery', 1 );
function doctor_tax_gallery() {

	$labels = array(
		'name'                       => _x( 'Gallery Categories', 'Taxonomy General Name', 'doctor-toolkit' ),
		'singular_name'              => _x( 'Gallery Categories', 'Taxonomy Singular Name', 'doctor-toolkit' ),
		'menu_name'                  => esc_html__( 'Gallery Category', 'doctor-toolkit' ),
		'all_items'                  => esc_html__( 'All Items', 'doctor-toolkit' ),
		'parent_item'                => esc_html__( 'Parent Item', 'doctor-toolkit' ),
		'parent_item_colon'          => esc_html__( 'Parent Item:', 'doctor-toolkit' ),
		'new_item_name'              => esc_html__( 'New Item Name', 'doctor-toolkit' ),
		'add_new_item'               => esc_html__( 'Add New Item', 'doctor-toolkit' ),
		'edit_item'                  => esc_html__( 'Edit Item', 'doctor-toolkit' ),
		'update_item'                => esc_html__( 'Update Item', 'doctor-toolkit' ),
		'view_item'                  => esc_html__( 'View Item', 'doctor-toolkit' ),
		'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'doctor-toolkit' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove items', 'doctor-toolkit' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'doctor-toolkit' ),
		'popular_items'              => esc_html__( 'Popular Items', 'doctor-toolkit' ),
		'search_items'               => esc_html__( 'Search Items', 'doctor-toolkit' ),
		'not_found'                  => esc_html__( 'Not Found', 'doctor-toolkit' ),
		'items_list'                 => esc_html__( 'Items list', 'doctor-toolkit' ),
		'items_list_navigation'      => esc_html__( 'Items list navigation', 'doctor-toolkit' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'doctor_gallery_tax', array( 'doctor_gallery' ), $args );
}
?>