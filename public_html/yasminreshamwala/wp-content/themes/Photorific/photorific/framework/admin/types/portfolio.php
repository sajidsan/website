<?php
function portfolio_posttype() {
	register_post_type( 'portfoliocpt',
		array(
			'labels' => array(
			'name' => __('Portfolio'),
			'singular_name' => __('Portfolio'),
			'add_new_item' => __('Add New'),
            'edit_item' => __('Edit'),
            'new_item' => __('Add New'),
            'view_item' => __('View'),
		),
		'public' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes'),
		'capability_type' => 'post',
		'register_meta_box_cb' => 'add_portfolio_metaboxes'
		)
	);
}
add_action('init', 'portfolio_posttype');

register_taxonomy('portfolio_category','portfoliocpt',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Portfolio Categories', 'taxonomy general name', 'striking_admin' ),
			'singular_name' => _x( 'Portfolio Category', 'taxonomy singular name', 'striking_admin' ),
			'search_items' =>  __( 'Search Categories', 'striking_admin' ),
			'popular_items' => __( 'Popular Categories', 'striking_admin' ),
			'all_items' => __( 'All Categories', 'striking_admin' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Portfolio Category', 'striking_admin' ), 
			'update_item' => __( 'Update Portfolio Category', 'striking_admin' ),
			'add_new_item' => __( 'Add New Portfolio Category', 'striking_admin' ),
			'new_item_name' => __( 'New Portfolio Category Name', 'striking_admin' ),
			'separate_items_with_commas' => __( 'Separate Portfolio category with commas', 'striking_admin' ),
			'add_or_remove_items' => __( 'Add or remove portfolio category', 'striking_admin' ),
			'choose_from_most_used' => __( 'Choose from the most used portfolio category', 'striking_admin' )
		),
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug'=>'portfolio'),
	));
	


// Add custom options (meta boxes) for portfolio
function add_portfolio_metaboxes() {
	add_meta_box('lightbox_options', 'Lightbox Options', 'lightbox_options', 'portfoliocpt', 'normal', 'high');
}

function lightbox_options() {
	global $post;
	
	// Noncename to verify where the data originated
	echo '<input type="hidden" name="portfoliometa_noncename" id="portfoliometa_noncename" value="' .wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
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

function save_lightbox_options($post_id, $post) {
	
	if(!wp_verify_nonce( $_POST['portfoliometa_noncename'], plugin_basename(__FILE__))) {
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
add_action('save_post', 'save_lightbox_options', 1, 2);
?>