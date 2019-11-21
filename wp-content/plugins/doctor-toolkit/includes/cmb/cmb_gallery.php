<?php
// Start with an underscore to hide fields from custom fields list
$prefix = 'doctor_cf_';

/* Post : doctor_gallery */
$cmb_gallery = new_cmb2_box( array(
	'id'            => $prefix . 'metabox_gallery',
	'title'         => esc_html__( 'Gallery Options', "doctor-toolkit" ),
	'object_types'  => array( 'doctor_gallery' ), // Post type
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true, // Show field names on the left
) );
$cmb_gallery->add_field( array(
    'name' => 'Gallery Sub Title Text',
    'desc' => 'Enter The Gallery Sub Title Text',
    'id'   => $prefix .'gallery_subtitle',
    'type' => 'text',
) );
$cmb_gallery->add_field( array(
    'name' => 'Embed Video URL',
    'desc' => 'Enter Embeds URL. Example For: vimeo.com/27209688',
    'id'   => $prefix .'gallery_video_embed',
    'type' => 'oembed',
) );
$cmb_gallery->add_field( array(
    'name' => 'Gallery Image',
    'desc' => 'Upload Multiple Image',
    'id'   => $prefix .'gallery_imglist',
    'type' => 'file_list',
) );

/*  Repeatable Group Field */
$cmb_grp_gallery = $cmb_gallery->add_field( array(
	'id'          => $prefix . 'gallery_grp',
	'type'        => 'group',
	'options'     => array(
		'group_title'   => esc_html__( 'Content Box {#}', 'doctor-toolkit' ), // {#} gets replaced by row number
		'add_button'    => esc_html__( 'Add Item', 'doctor-toolkit' ),
		'remove_button' => esc_html__( 'Remove Item', 'doctor-toolkit' ),
	),
) );
$cmb_gallery->add_group_field( $cmb_grp_gallery, array(
	'name' => 'Field Title Text',
	'id'   => 'grp_title',
	'type' => 'text',
) );

$cmb_gallery->add_group_field( $cmb_grp_gallery, array(
	'name' => 'Field Text',
	'id'   => 'grp_value',
	'type' => 'text',  
) );

$cmb_gallery->add_field( array(
	'name' => 'Title Text For Description',
	'id'   => 'info_title',
	'type' => 'text',  
) );
$cmb_gallery->add_field( array(
	'name' => esc_html__( 'Information Description', "doctor-toolkit" ),
	'id'   => $prefix . 'gallery_information',
	'type' => 'wysiwyg',
	'options' => array(
		'textarea_rows' => get_option('default_post_edit_rows', 5), // rows="..."
	),
) );
$cmb_gallery->add_field( array(
	'name' => 'Gallery Description Title',
	'id'   => 'desc_title',
	'type' => 'text',  
) );
$cmb_gallery->add_field( array(
	'name' => 'Title Text For Description',
	'id'   => 'conclusion_title',
	'type' => 'text',  
) );
$cmb_gallery->add_field( array(
	'name' => esc_html__( 'Conclusion Description', "doctor-toolkit" ),
	'id'   => $prefix . 'gallery_conclusion',
	'type' => 'wysiwyg',
	'options' => array(
		'textarea_rows' => get_option('default_post_edit_rows', 5), // rows="..."
	),
) );
?>