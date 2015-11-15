<?php

// Define Directory Constants 
define('CADEN_FRAME', TEMPLATEPATH . '/framework');
define('CADEN_ADMIN', CADEN_FRAME . '/admin');
define('CADEN_FUNCTIONS', CADEN_FRAME . '/functions');
define('CADEN_INCLUDES', TEMPLATEPATH . '/includes');
define('CADEN_CLASSES', CADEN_FRAME . '/classes');
define('CADEN_JS', get_template_directory_uri() . '/js');
define('TEMPLATEPATH', get_template_directory_uri());

// Load Admin Options
require_once(CADEN_ADMIN . '/options.php');

// Load Admin Interface
require_once(CADEN_ADMIN . '/theme.php');

// Load Shortcodes 
require_once(CADEN_FUNCTIONS . '/shortcodes.php');

/* Load Custom Post Types */
// Portfolio Items
require_once(CADEN_ADMIN . '/types/portfolio.php');

// Gallery Items
require_once(CADEN_ADMIN . '/types/gallery.php');

// Homepage Slider
require_once(CADEN_ADMIN . '/types/slider.php');

// Meta Boxes for all post types
require_once(CADEN_ADMIN . '/types/meta_box.php');
require_once(CADEN_ADMIN . '/types/images_meta_box.php');

// Load Header Javascript Files
require_once(CADEN_FUNCTIONS . '/scripts.php');

// Load Custom Widgets
require_once(CADEN_FUNCTIONS . '/widgets.php');

// Load WP-PageNavi Advanced Pagination
require_once(CADEN_INCLUDES . '/wp-pagenavi/wp-pagenavi.php');

// Load Image/Thumb Resizing Script
require_once(CADEN_INCLUDES . '/thumb.php');

//Load Sidebar Generator Plugin
include(CADEN_INCLUDES . '/sidebar-generator.php');

// Add support for thumbnails and menus
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

/*************************** Register the nav menu in the header */
register_nav_menus( array(
		'primary-menu' => __( 'Header Navigation', 'primary-menu' ),
) );

/*************************** Exclude Portfolio/Sliders from search */
function excludePages($query) {
if ($query->is_search) {
	$query->set('post_type', 'post');
}
	return $query; 
} 
add_filter('pre_get_posts','excludePages'); 

if ( function_exists('register_sidebar') ) {
	register_sidebar(array('name' => 'Default Sidebar','before_widget' => '','after_widget' => '<div class="divider"></div>','before_title' => '<h3>','after_title' => '</h3>'));

}

/* Excerpts */
function excerpt_readmore($more) {
	return '...';
}
add_filter('excerpt_more', 'excerpt_readmore');


function cg_get_posts($query) {
	
	// Limit # of Items on Gallery/Portfolio Pages
$max = get_option('max_portfolio');
if($max == "") {
	$max = 12;
}
$maxg = get_option('max_gallery');
if($maxg == "") {
	$maxg = 12;
}

    if (is_admin()) {
        return $query;
    }
    if (is_tax('portfolio_category')) {
        $query -> set('posts_per_page', $max);
    }
	if (is_tax('gallery_category')) {
		$query -> set ('posts_per_page', $maxg);
	}
    return $query;
}
add_filter('pre_get_posts', 'cg_get_posts');





?>