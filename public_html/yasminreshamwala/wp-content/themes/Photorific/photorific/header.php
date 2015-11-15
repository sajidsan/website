<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php if(get_option('site_favicon')) { ?><link rel="shortcut icon" href="<?php echo get_option('site_favicon'); ?>" /> <?php } ?>
<style type="text/css" media="screen">
@import url( <?php bloginfo('template_url'); ?>/style/prettyPhoto.css );
@import url( <?php bloginfo('template_url'); ?>/style/supersized.css );
@import url( <?php bloginfo('stylesheet_url');?> );
<?php 
$nav_style = get_option('nav_style');
if($nav_style == "White") { ?>
	@import url( <?php bloginfo('template_url'); ?>/style/nav_white.css );
<?php } ?>
@import url( <?php bloginfo('template_url'); ?>/style/skin.php );

<?php if(get_option('custom_css')) { echo get_option('custom_css'); } ?>
</style>

<!--[if IE 7]>
<style type="text/css">
@import url(<?php bloginfo('template_url'); ?>/style/ie7style.css);
</style>
<![endif]-->
<!--[if IE 8]>
<style type="text/css">
@import url(<?php bloginfo('template_url'); ?>/style/ie8style.css);
</style>
<![endif]-->

<?php wp_head(); ?>

<script type="text/javascript">
<?php
$lightbox_theme = get_option('lightbox_theme');
$show_lb_title = get_option('show_lb_title');
$allow_resize = get_option('allow_resize');
$animation_speed = get_option('lb_animation_speed');
$opacity = get_option('opacity');
$default_width = get_option('default_width');
$default_height = get_option('default_height');
if($default_width == "") {
	$default_width = "600";
}
if($default_height == "") {
	$default_height = "400";
}
if($opacity == "") {
	$opacity = "0.8";
}
if($lightbox_theme == "Dark Rounded") {
	$theme = "dark_rounded";
} elseif($lightbox_theme == "Dark Square") {
	$theme = "dark_square";
} elseif($lightbox_theme == "Facebook") {
	$theme = "facebok";
} elseif($lightbox_theme == "Light Rounded") {
	$theme = "light_rounded";
} elseif($lightbox_theme == "Light Square") {
	$theme = "light_square";
} else {
	$theme = "dark_rounded";
}
?>
$(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto({
		theme: '<?php echo $theme; ?>',
		animation_speed: '<?php echo $animation_speed; ?>',
		allow_resize: <?php if(!$allow_resize) { echo "true"; } else { echo "false"; } ?>,
		show_title: <?php if(!$show_lb_title) { echo "true"; } else { echo "false"; }?>,
		default_height: <?php echo $default_height; ?>,
		default_width: <?php echo $default_width; ?>,
		opacity: <?php echo $opacity; ?>
	});
});
jQuery(function($){
	$.supersized({
	<?php 
	// Get slideshow settings
	$slideshow_onoff = get_option('slideshow_onoff');
	$start_slide = get_option('start_slide');
	$random_images = get_option('random_images');
	$pause_slideshow = get_option('pause_slideshow');
	$transition_effect = get_option('transition_effect');
	$transition_time = get_option('transition_time');
	$slide_interval = get_option('slide_interval');
	$keyboard_nav = get_option('keyboard_nav');
	$image_protect = get_option('image_protect');
	$performance = get_option('performance');
	
	// Get transition effect selected
	if($transition_effect == "Fade") {
		$teffect = 1;
	} elseif($transition_effect == "Slide Top") {
		$teffect = 2;
	} elseif($transition_effect == "Slide Right") {
		$teffect = 3;
	} elseif($transition_effect == "Slide Bottom") {
		$teffect = 4;
	} elseif($transition_effect == "Slide Left") {
		$teffect = 5;
	} elseif($transition_effect == "Carousel Right") {
		$teffect = 6;
	} elseif($transition_effect == "Carousel Left") {
		$teffect = 7;
	} else {
		$teffect = 1;
	}
	
	// Get performance settings
	if($performance == "Normal") {
		$performance = 0;
	} elseif($performance == "Hybrid speed/quality") {
		$performance = 1;
	} elseif($performance == "Optimize image quality") {
		$performance = 2;
	} elseif($performance == "Optimize transition speed (firefox/IE, not webkit)") {
		$performance = 3;
	} else {
		$performance = 0;
	}
	
	// Get interval time
	if($slide_interval == "") {
		$slide_interval = 4000;
	}
	
	// Get transition time
	if($transition_time == "") {
		$transition_time = 1000;
	}
	?>
	//Functionality
	slideshow               :   <?php if(!$slideshow_onff) { echo 1; } else { echo 0; } ?>,		//Slideshow on/off
	autoplay				:	1,		//Slideshow starts playing automatically
	start_slide             :   <?php if(!$start_slide) { echo 1; } else { echo 0; } ?>,		//Start slide (0 is random)
	random					: 	<?php if(!$random_images) { echo 1; } else { echo 0; } ?>,		//Randomize slide order (Ignores start slide)
	slide_interval          :   <?php echo $slide_interval; ?>,	//Length between transitions
	transition              :   <?php echo $teffect; ?>, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
	transition_speed		:	<?php echo $transition_time; ?>,	//Speed of transition
	pause_hover             :   <?php if(!$pause_slideshow) { echo 1; } else { echo 0; } ?>,		//Pause slideshow on hover
	keyboard_nav            :   <?php if(!$keyboard_nav) { echo 1; } else { echo 0; } ?>,		//Keyboard navigation on/off
	performance				:	<?php echo $performance; ?>,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
	image_protect			:	<?php if(!$image_protect) { echo 1; } else { echo 0; } ?>,		//Disables image dragging and right click with Javascript
	slides 				:  	[		//Slideshow Images
	<?php 
	$bg_images = get_post_meta(get_the_id(), 'cg_bg_image', false);
	$default_image = get_post_meta(get_the_id(), 'cg_default_image', true);
	$default_bg_image = get_option('default_bg_image');
	
	/* Get image/slideshow settings to 
	display on the homepage */
	if(is_home()) {
		
		$cg_home_image = get_post_meta(get_the_id(), 'cg_home_image', true);
        query_posts(array('post_type' => 'homepage_slider'));
        $c=0;    //FH: new, 13.04.2011
        while(have_posts()) {
        the_post();
            $content = strip_tags(get_the_content());
        	echo ($c > 0) ? ',' : '';         // FH: new, 13.04.2011
            echo "{image : '".$content."'}";    //   echo "{image : '".$content."'},";
        	$c++;                // FH: new, 13.04.2011
        }

		wp_reset_query();
		
	} else /*If not homepage */ {

		if($default_image == "y") {
			if($default_bg_image != "") {
				echo "{image : '".$default_bg_image."'}";
			} 
		} elseif($default_image == "") {
			echo "{image : '".$default_bg_image."'}";
		} else {
			$nb = count($bg_images);
			$i = 0;
			foreach ($bg_images as $bg_image) {
    			$i++;
   				echo "{image : '".$bg_image."'}";
    			echo ($i != $nb) ? ',' : '';
			}
		}
	}
	?>
	]						
	});
});
</script>

</head>
<body>

<div id="header">
<div id="header_top">
</div>
<div id="header_content">
		<?php
		$custom_logo = get_option('custom_logo'); 
		$site_name = get_option('site_name');
		if($site_name) { ?>
			<div id="sitename">
				<a href="<?php echo get_option('home'); ?>"><?php echo get_bloginfo('name'); ?></a>
			</div>
		<?php } else { ?>
			<?php if($custom_logo) { ?>
				<div id="logo">
					<a href="<?php echo get_option('home'); ?>"><img src="<?php echo $custom_logo; ?>" /></a>
				</div>
			<?php } else { ?>
				<div id="sitename">
					<a href="<?php echo get_option('home'); ?>"><?php echo get_bloginfo('name'); ?></a>
				</div>
			<?php } ?>
		<?php } ?>
		<div id="sf-menu" class="jqueryslidemenu">
        	<div class="sidebar_divider"></div>
			<?php
	$primary = '';
	$primary = wp_nav_menu( array( 'container' => 'ul', 'theme_location' => 'primary-menu', 'fallback_cb' => '', 'menu_class' => 'sf-menu', 'echo' => false, 'link_before' => '<strong>', 'link_after' => '</strong><span>&nbsp;</span>' ) );
	$primary = preg_replace('/(<a[^>]+>)([^\/]+)\/([^<]+)<\/strong><span>&nbsp;<\/span>(<\/a>)/','$1$2</strong><span>$3&nbsp;</span>$4', $primary);
	if($primary <> "") {
		echo($primary);
	} else { ?>
		<ul id="menu-navigation" class="sf-menu">
			<li><a href="<?php bloginfo("home"); ?>" title="<?php echo wp_specialchars( get_bloginfo('name'), 1 ) ?>" rel="home"><strong>Home </strong><span> homepage&nbsp;</span></a></li>
			<?php foreach ( (get_pages('sort_column=menu_order') ) as $page ) { if ( $page->post_parent == '0' ) { ?>
			<li>
				<a href="<?php echo get_page_link($page->ID); ?>"><strong><?php echo $page->post_title; ?> </strong><span> <?php echo get_post_meta($page->ID, "subtitle", true); ?>&nbsp;</span></a>
            	<?php
				$child_pages = get_pages('child_of='.$page->ID);
				if (get_page_children($page->ID, $child_pages) ) { ?>
					<ul><?php wp_list_pages('title_li=&child_of=' . $page->ID ); ?></ul>
				<?php } ?>
			</li>
			<?php } } ?>
		</ul>
	<?php } ?>
		</div>
        
        <?php
        $show_search = get_option('show_search');
		if(!$show_search) {
		?>
        <div id="search">
    	<form method="get" action="<?php echo get_option('home'); ?>">
    	<input type="text" class="searchinput" value="Search the site..." onfocus="if (this.value == 'Search the site...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search the site...';}" name="s" /><input type="submit" value="" class="searchsubmit" />
        </form>
    </div>
    <?php } ?>
    </div>
    <div id="header_bottom">
    </div>
</div>
