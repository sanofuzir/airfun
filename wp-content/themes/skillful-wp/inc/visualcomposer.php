<?php
add_action('init', 'TheShortcodesForVC');
function TheShortcodesForVC() {
	
	if (!class_exists('WPBakeryVisualComposerAbstract')) { // or using plugins path function
	
		return;
	}
	// Remove Front End 
	vc_disable_frontend();
	
	// Set as Theme
	WPBakeryVisualComposerAbstract::$config['USER_DIR_NAME'] = 'inc/shortcodes';
	WPBakeryVisualComposerAbstract::$config['default_post_types'] = Array('post', 'page', 'portfolio', 'product');
	vc_set_as_theme(true);
	
	// Removing Default shortcodes
	vc_remove_element("vc_widget_sidebar");
	vc_remove_element("vc_wp_search");
	vc_remove_element("vc_wp_meta");
	vc_remove_element("vc_wp_recentcomments");
	vc_remove_element("vc_wp_calendar");
	vc_remove_element("vc_wp_pages");
	vc_remove_element("vc_wp_tagcloud");
	vc_remove_element("vc_wp_custommenu");
	vc_remove_element("vc_wp_text");
	vc_remove_element("vc_wp_posts");
	vc_remove_element("vc_wp_links");
	vc_remove_element("vc_wp_categories");
	vc_remove_element("vc_wp_archives");
	vc_remove_element("vc_wp_rss");
	vc_remove_element("vc_teaser_grid");
	vc_remove_element("vc_button");
	vc_remove_element("vc_button2");
	vc_remove_element("vc_cta_button");
	vc_remove_element("vc_message");
	vc_remove_element("vc_progress_bar");
	vc_remove_element("vc_pie");
	vc_remove_element("vc_posts_slider");
	vc_remove_element("vc_posts_grid");
	vc_remove_element("vc_images_carousel");
	vc_remove_element("vc_carousel");
	vc_remove_element("vc_gallery");
	vc_remove_element("vc_single_image");
	vc_remove_element("vc_facebook");
	vc_remove_element("vc_tweetmeme");
	vc_remove_element("vc_googleplus");
	vc_remove_element("vc_pinterest");
	vc_remove_element("vc_single_image");
	vc_remove_element("vc_cta_button2");
	vc_remove_element("vc_gmaps");
	vc_remove_element("vc_raw_js");
	vc_remove_element("vc_flickr");
	vc_remove_element("vc_separator");
	vc_remove_element("vc_text_separator");
	add_action( 'admin_head', 'remove_my_meta_box' );
	
	function remove_my_meta_box() {
		remove_meta_box("vc_teaser", "portfolio", "side");
		remove_meta_box("vc_teaser", "page", "side"); 
		remove_meta_box("vc_teaser", "product", "side"); 
	}
	
	// Shortcodes 
	require_once('visualcomposer-extend.php');
	
	/* Columns */
	function thb_translateColumnWidthToSpan($width) {
	  switch ( $width ) {
	    case "1/6" :
	      $w = "small-12 medium-2";
	      break;    
	    case "1/4" :
	      $w = "small-12 medium-3";
	      break;
	    case "1/3" :
	      $w = "small-12 medium-4";
	      break;
	    case "2/4" :
	      $w = "small-12 medium-6";
	    case "1/2" :
	      $w = "small-12 medium-6";
	      break;
	    case "4/6" :
	    	$w = "small-12 medium-8";
	    	break;
	    case "2/3" :
	      $w = "small-12 medium-8";
	      break;    
	    case "3/4" :
	      $w = "small-12 medium-9";
	      break;
	    case "10/12" :
	    	$w = "small-12 medium-10";
	    	break;   
	    case "5/6" :
	      $w = "small-12 medium-10";
	      break;    
	    case "1/1" :
	      $w = "small-12";
	      break;
	    case "1/12" :
	      $w = "small-1";
	      break;
	    case "2/12" :
	      $w = "small-12 medium-2";
	      break;
	    case "5/12" :
	      $w = "small-12 medium-5";
	      break;
	    case "7/12" :
	      $w = "small-12 medium-7";
	      break;
	    default :
	      $w = $width;
	  }
	  return $w.' columns';
	}
}