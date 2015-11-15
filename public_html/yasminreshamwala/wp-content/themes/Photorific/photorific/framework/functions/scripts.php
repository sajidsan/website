<?php

/* Deregister jQuery included with WordPress */
if(!is_admin()) {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('jquerymenu', CADEN_JS . '/jquerymenu.js');
	wp_enqueue_script('cufon-yui', CADEN_JS . '/cufon-yui.js');
	wp_enqueue_script('supersized.3.1.2.min', CADEN_JS . '/supersized.3.1.3.min.js');
	wp_enqueue_script('jquery.backstretch.min', CADEN_JS . '/jquery.backstretch.min.js');
	
	$font = get_option('heading_font_family');
	if($font == "Nevis") {
		wp_enqueue_script('nevis_700.font', CADEN_JS . '/nevis_700.font.js');
	} elseif ($font == "Bebas Neue") {
		wp_enqueue_script('Bebas_Neue_400.font', CADEN_JS . '/Bebas_Neue_400.font.js');
	} elseif($font == "Myriad Pro") {
		wp_enqueue_script('Myriad_Pro_700-Myriad_Pro_700.font', CADEN_JS . '/Myriad_Pro_700-Myriad_Pro_700.font.js');
	} elseif($font == "PTF Nordic Std") { 
		wp_enqueue_script('PTF_NORDIC_Std_400.font', CADEN_JS . '/PTF_NORDIC_Std_400.font.js');
	} elseif($font == "League Gothic") {
		wp_enqueue_script('League_Gothic_400.font', CADEN_JS . '/League_Gothic_400.font.js');
	} elseif($font == "AW Conqueror Inline") {
		wp_enqueue_script('AW_Conqueror_Inline_400.font', CADEN_JS . '/AW_Conqueror_Inline_400.font.js');
	} elseif($font == "Franchise") {
		wp_enqueue_script('Franchise_700.font', CADEN_JS . '/Franchise_700.font.js');
	} else {
		wp_enqueue_script('Bebas_Neue_400.font', CADEN_JS . '/Bebas_Neue_400.font.js');
	}
	wp_enqueue_script('cufon.init', CADEN_JS . '/cufon.init.js');
	wp_enqueue_script('jquery.easing.1.3', CADEN_JS . '/jquery.easing.1.3.js');
	wp_enqueue_script('contact', CADEN_JS . '/contact.js');
	wp_enqueue_script('custom', CADEN_JS . '/custom.js');
	wp_enqueue_script('jquery.tools.min', CADEN_JS . '/jquery.tools.min.js');
	wp_enqueue_script('tools.init', CADEN_JS . '/tools.init.js');
	wp_enqueue_script('jquery.prettyPhoto', CADEN_JS . '/jquery.prettyPhoto.js');
}

?>