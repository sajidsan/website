<?php
function gallery_posttype() {
	register_post_type( 'gallerycpt',
		array(
			'labels' => array(
			'name' => __('Gallery'),
			'singular_name' => __('Gallery Item'),
			'add_new_item' => __('Add New'),
            'edit_item' => __('Edit'),
            'new_item' => __('Add New'),
            'view_item' => __('View'),
		),
		'public' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes'),
		'capability_type' => 'post',
		'register_meta_box_cb' => 'add_gallery_metaboxes'
		)
	);
}
add_action('init', 'gallery_posttype');

register_taxonomy( 'gallery_category',
    array( 'gallerycpt' ),
    array(
    	'hierarchical' => true,
        'labels' => array( 'name' => __( 'Gallery Categories' ),
        'singular_name' => __( 'Category' ) ),
        'public' => true,
        'rewrite' => array('slug'=>'gallery'),
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_ui' => true
	)
);

// Add custom options (meta boxes) for portfolio
function add_gallery_metaboxes() {
	add_meta_box('gallery_options', 'Lightbox Options', 'gallery_options', 'gallerycpt', 'normal', 'high');
}

function gallery_options() {
	global $post;
	
	// Noncename to verify where the data originated
	echo '<input type="hidden" name="gallerymeta_noncename" id="gallerymeta_noncename" value="' .wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	// Get options data if its already entered
	$lburl = get_post_meta($post->ID, '_lburl', true);
	$lbtitle = get_post_meta($post->ID, '_lbtitle', true);
	
	// Echo the field
	echo '
	<table class="customoptions" cellpadding="0" cellspacing="0" border="0">
	<tr>
	<td><label>Lightbox Image/Video URL:</label></td>
	<td><input type="text" name="_lburl" value="' .$lburl. '" class="widefat" />
	<small>Enter the URL of the image/video that you want to show when this portfolio item is clicked.</small></td>
	</tr>
	<tr>
	<td><label>Lightbox Image Title:</label></td>
	<td><input type="text" name="_lbtitle" value="' .$lbtitle. '" class="widefat" />
	<small>Put the title of the image that you want to display when this portfolio item is clicked and the lightbox pops up.</small></td>
	</tr>
	</table>';
}

function save_gallery_options($post_id, $post) {
	
	if(!wp_verify_nonce( $_POST['gallerymeta_noncename'], plugin_basename(__FILE__))) {
		return $post->ID;
	}
	
	if(!current_user_can('edit_post', $post->ID))
	return $post->ID;
	
	$portfolio_meta['_lburl'] = $_POST['_lburl'];
	$portfolio_meta['_lbtitle'] = $_POST['_lbtitle'];
	
	foreach($portfolio_meta as $key => $value) {
		if($post->post_type == 'revision' ) return;
		$value = implode(',', (array)$value);
		
		if(get_post_meta($post->ID, $key, FALSE)) {
			update_post_meta($post->ID, $key, $value);
		} else {
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
	}
}
add_action('save_post', 'save_gallery_options', 1, 2);
?>