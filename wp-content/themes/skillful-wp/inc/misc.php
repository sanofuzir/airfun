<?php

/* Custom Background Support */
$args = array(
	'default-color' => 'ffffff'
);
add_theme_support( 'custom-background', $args );


/* Add SoundCloud oEmbed */
function add_oembed_soundcloud(){
	wp_oembed_add_provider( 'http://soundcloud.com/*', 'http://soundcloud.com/oembed' );
}
add_action('init','add_oembed_soundcloud');

/* Get Portfolio Page Link */
function get_portfolio_page_link($post_id) {
    global $wpdb;
	
    $results = $wpdb->get_results("SELECT post_id FROM $wpdb->postmeta
    WHERE meta_key='_wp_page_template' AND meta_value='template-portfolio.php' OR meta_value='template-portfolio-shapes.php' OR meta_value='template-portfolio-paginated.php'");

    foreach ($results as $result) 
    {
        $page_id = $result->post_id;
    }
	
    return get_page_link($page_id);
} 

/* Required Settings */
if(!isset($content_width)) $content_width = 1170;
add_theme_support( 'automatic-feed-links' );

/* Read More class */
add_filter( 'the_content_more_link', 'add_morelink_classes' );
function add_morelink_classes( $more_link_html ) {
	$more_link_html = str_replace( 'class="more-link">', 'class="more-link"><span><i class="icon-budicon-447"></i></span> ', $more_link_html );

	return $more_link_html;
}

/* Remove WP default inline CSS for ".recentcomments a" from header */
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

/* Remove Unwanted Tags */
function remove_invalid_tags($str, $tags) 
{
    foreach($tags as $tag)
    {
    	$str = preg_replace('#^<\/'.$tag.'>|<'.$tag.'>$#', '', $str);
    }

    return $str;
}

/* Category Rel Fix */
function remove_category_list_rel( $output ) {
    return str_replace( ' rel="category tag"', '', $output );
}
 
add_filter( 'wp_list_categories', 'remove_category_list_rel' );
add_filter( 'the_category', 'remove_category_list_rel' );

/* Editor Styling */
add_editor_style();

/* Add Twitter oEmbed */
add_filter('oembed_result','twitter_no_width',10,3);
function twitter_no_width($html, $url, $args) {
    if (false !== strpos($url, 'twitter.com')) {
        $html = str_replace('width="550"','',$html);
    }
    return $html;
}

/* Fix Image Margins */
class fixImageMargins{
    public $xs = 0; //change this to change the amount of extra spacing

    public function __construct(){
        add_filter('img_caption_shortcode', array(&$this, 'fixme'), 10, 3);
    }
    public function fixme($x=null, $attr, $content){

        extract(shortcode_atts(array(
                'id'    => '',
                'align'    => 'alignnone',
                'width'    => '',
                'caption' => ''
            ), $attr));

        if ( 1 > (int) $width || empty($caption) ) {
            return $content;
        }

        if ( $id ) $id = 'id="' . $id . '" ';

    return '<div ' . $id . 'class="wp-caption ' . $align . '" style="width: ' . ((int) $width + $this->xs) . 'px">'
    . $content . '<p class="wp-caption-text"><i class="fa fa-picture"></i> ' . $caption . '</p></div>';
    }
}
$fixImageMargins = new fixImageMargins();

/* Handheld Device Images */
function thb_handhelded_devices() {

	$icon_link = '<link rel="apple-touch-icon"%2$s href="%1$s">';

	$old_iphone_icon = ot_get_option('handheld_old_iphone');
	if ( $old_iphone_icon ) {
		printf( $icon_link, esc_url( $old_iphone_icon ), '' );
	}

	$old_ipad_icon = ot_get_option('handheld_old_ipad');
	if ( $old_ipad_icon ) {
		printf( $icon_link, esc_url( $old_ipad_icon ), ' sizes="76x76"' );
	}

	$retina_iphone_icon = ot_get_option('handheld_retina_iphone');
	if ( $retina_iphone_icon ) {
		printf( $icon_link, esc_url( $retina_iphone_icon ), ' sizes="120x120"' );
	}

	$retina_ipad_icon = ot_get_option('handheld_retina_ipad');
	if ( $retina_ipad_icon ) {
		printf( $icon_link, esc_url( $retina_ipad_icon ), ' sizes="152x152"' );
	}

}

add_action( 'thb_handhelded_devices', 'thb_handhelded_devices',3 );

/* Author FB, TW & G+ Links */
function my_new_contactmethods( $contactmethods ) {
// Add Twitter
$contactmethods['twitter'] = 'Twitter URL';
// Add Facebook
$contactmethods['facebook'] = 'Facebook URL';
// Add Google+
$contactmethods['googleplus'] = 'Google Plus URL';

return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);

/* Font Awesome Array */
if (!function_exists('file_get_contents_curl')){
	function file_get_contents_curl($url) {
	    $ch = curl_init();
	
	    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
	
	    $data = curl_exec($ch);
	    curl_close($ch);
	
	    return $data;
	}
}
function thb_getIconArray(){
	$pattern = '/\.(icon-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
	
	if( ini_get('allow_url_fopen') ) {
	//$subject = file_get_contents(THB_THEME_ROOT.'/assets/css/icons.css');
	} else {
	$subject = file_get_contents_curl(THB_THEME_ROOT.'/assets/css/icons.css');	
	}
	preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
	
	$icons = array();
	$icons[''] = '';
	foreach($matches as $match){
    $icons[$match[1]] = $match[1];
	}
	
  return $icons;
}

/* Get Top-Level Domain */
function thb_get_domain($url) {
  $pieces = parse_url($url);
  $domain = isset($pieces['host']) ? $pieces['host'] : '';
  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    return $regs['domain'];
  }
  return false;
}

/* Product Categories Array */
function thb_productCategories(){
	if(class_exists('woocommerce')) {
		
		$args = array(
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => '0'
		);
		
		$product_categories = get_terms( 'product_cat', $args );
		//var_dump($product_categories);
		$out = array();
		if ($product_categories) {
			foreach($product_categories as $product_category) {
				$out[$product_category->name] = $product_category->slug;
			}
		}
		return $out;
	}
	
}

/* Portfolio Categories Array */
function thb_portfolioCategories(){
	$portfolio_categories = get_categories(array('taxonomy'=>'project-category'));
	$out = array();
	foreach($portfolio_categories as $portfolio_category) {
		$out[$portfolio_category->cat_name] = $portfolio_category->term_id;
	}
	return $out;
}

/* Out of Stock Check */
function thb_out_of_stock() {
  global $post;
  $id = $post->ID;
  $status = get_post_meta($id, '_stock_status',true);
  
  if ($status == 'outofstock') {
  	return true;
  } else {
  	return false;
  }
}

/* Get WishList Count */
function thb_wishlist_count() {
	if ( is_user_logged_in() ) {
	    $user_id = get_current_user_id();
	}
	
	$count = array();
	if ( class_exists( 'YITH_WCWL_UI' ) )  {
		if( is_user_logged_in() ) {
		    $count = $wpdb->get_results( $wpdb->prepare( 'SELECT COUNT(*) as `cnt` FROM `' . YITH_WCWL_TABLE . '` WHERE `user_id` = %d', $user_id  ), ARRAY_A );
		    $count = $count[0]['cnt'];
		} elseif( yith_usecookies() ) {
		    $count[0]['cnt'] = count( yith_getcookie( 'yith_wcwl_products' ) );
		} else {
		    $count[0]['cnt'] = count( $_SESSION['yith_wcwl_products'] );
		}
		
		if (is_array($count)) {
			$count = 0;
		}
	}
	return $count;
}

/* WishList Button*/
function thb_wishlist_button() {

	global $product, $yith_wcwl; 
	
	if ( class_exists( 'YITH_WCWL_UI' ) )  {
		$url = $yith_wcwl->get_wishlist_url();
		$product_type = $product->product_type;
		$exists = $yith_wcwl->is_product_in_wishlist( $product->id );
		
		$classes = get_option( 'yith_wcwl_use_button' ) == 'yes' ? 'class="add_to_wishlist single_add_to_wishlist button alt"' : 'class="add_to_wishlist"';
		
		$html  = '<div class="yith-wcwl-add-to-wishlist">'; 
		    $html .= '<div class="yith-wcwl-add-button';  // the class attribute is closed in the next row
		    
		    $html .= $exists ? ' hide" style="display:none;"' : ' show"';
		    
		    $html .= '><a href="' . htmlspecialchars($yith_wcwl->get_addtowishlist_url()) . '" data-product-id="' . $product->id . '" data-product-type="' . $product_type . '" ' . $classes . ' ><i class="icon-budicon-476"></i><span class="text">'.__( "Add to wishlist", THB_THEME_NAME ).'</span></a>';
		    $html .= '</div>';
		
		$html .= '<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> <a href="' . $url . '" class="add_to_wishlist"><i class="icon-budicon-476"></i><span class="text">'.__( "Added to wishlist", THB_THEME_NAME ).'</span></a></div>';
		$html .= '<div class="yith-wcwl-wishlistexistsbrowse ' . ( $exists ? 'show' : 'hide' ) . '" style="display:' . ( $exists ? 'block' : 'none' ) . '"><a href="' . $url . '" class="add_to_wishlist"><i class="icon-budicon-476"></i><span class="text">'.__( "Added to wishlist", THB_THEME_NAME ).'</span></a></div>';
		$html .= '<div style="clear:both"></div><div class="yith-wcwl-wishlistaddresponse"></div>';
		
		$html .= '</div>';
		
		return $html;
		
	}

}

/* Prev/Next Post Links - http://wordpress.org/plugins/previous-and-next-post-in-same-taxonomy/ */
function be_previous_post_link($format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
	be_adjacent_post_link($format, $link, $in_same_cat, $excluded_categories, true, $taxonomy);
}
function be_next_post_link($format, $link='%title', $in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
	be_adjacent_post_link($format, $link, $in_same_cat, $excluded_categories, false, $taxonomy);
}
function be_adjacent_post_link($format, $link='%title', $in_same_cat = false, $excluded_categories = '', $previous = true, $taxonomy = 'category') {
	if ( $previous && is_attachment() )
		$post = & get_post($GLOBALS['post']->post_parent);
	else
		$post = be_get_adjacent_post($in_same_cat, $excluded_categories, $previous, $taxonomy);

	if ( !$post )
		return;

	$title = $post->post_title;

	if ( empty($post->post_title) )
		$title = $previous ? __('Previous Post', THB_THEME_NAME) : __('Next Post', THB_THEME_NAME);
	
	$title = thb_ShortenText(get_the_title($post->ID), 35);
	
	$image_id = get_post_thumbnail_id($post->ID);
	$image_link = wp_get_attachment_image_src($image_id,'full');
	$image = aq_resize( $image_link[0], 100, 100, true, false);
	$image_title = esc_attr( get_the_title($post->ID) );
	$image = '<img src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'" title="'.$image_title.'" />';
	$date = mysql2date(get_option('date_format'), $post->post_date);
	$rel = $previous ? 'prev' : 'next';
	$string = '<a href="'.get_permalink($post).'" rel="'.$rel.'" data-id="'.$post->ID.'" class="'.$rel.'">';
	$link = str_replace('%title', $title, $link);
	$link = str_replace('%image', $image, $link);
	$link = $string . $link . '</a>';

	$format = str_replace('%link', $link, $format);

	$adjacent = $previous ? 'previous' : 'next';
	echo apply_filters( "{$adjacent}_post_link", $format, $link );
}
function be_get_adjacent_post( $in_same_cat = false, $excluded_categories = '', $previous = true, $taxonomy = 'category' ) {
	global $post, $wpdb;

	if ( empty( $post ) )
		return null;

	$current_post_date = $post->post_date;

	$join = '';
	$posts_in_ex_cats_sql = '';
	if ( $in_same_cat || ! empty( $excluded_categories ) ) {
		$join = " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";

		if ( $in_same_cat ) {
			$cat_array = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
			$join .= " AND tt.taxonomy = '$taxonomy' AND tt.term_id IN (" . implode(',', $cat_array) . ")";
		}

		$posts_in_ex_cats_sql = "AND tt.taxonomy = '$taxonomy'";
		if ( ! empty( $excluded_categories ) ) {
			if ( ! is_array( $excluded_categories ) ) {
				// back-compat, $excluded_categories used to be IDs separated by " and "
				if ( strpos( $excluded_categories, ' and ' ) !== false ) {
					_deprecated_argument( __FUNCTION__, '3.3', sprintf( __( 'Use commas instead of %s to separate excluded categories.', THB_THEME_NAME ), "'and'" ) );
					$excluded_categories = explode( ' and ', $excluded_categories );
				} else {
					$excluded_categories = explode( ',', $excluded_categories );
				}
			}

			$excluded_categories = array_map( 'intval', $excluded_categories );
				
			if ( ! empty( $cat_array ) ) {
				$excluded_categories = array_diff($excluded_categories, $cat_array);
				$posts_in_ex_cats_sql = '';
			}

			if ( !empty($excluded_categories) ) {
				$posts_in_ex_cats_sql = " AND tt.taxonomy = '$taxonomy' AND tt.term_id NOT IN (" . implode($excluded_categories, ',') . ')';
			}
		}
	}

	$adjacent = $previous ? 'previous' : 'next';
	$op = $previous ? '<' : '>';
	$order = $previous ? 'DESC' : 'ASC';

	$join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
	$where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type = %s AND p.post_status = 'publish' $posts_in_ex_cats_sql", $current_post_date, $post->post_type), $in_same_cat, $excluded_categories );
	$sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

	$query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";
	$query_key = 'adjacent_post_' . md5($query);
	$result = wp_cache_get($query_key, 'counts');
	if ( false !== $result )
		return $result;

	$result = $wpdb->get_row("SELECT p.* FROM $wpdb->posts AS p $join $where $sort");
	if ( null === $result )
		$result = '';

	wp_cache_set($query_key, $result, 'counts');
	return $result;
}

/* Human time */
function thb_human_time_diff_enhanced( $duration = 60 ) {

	$post_time = get_the_time('U');
	$human_time = '';

	$time_now = date('U');

	// use human time if less that $duration days ago (60 days by default)
	// 60 seconds * 60 minutes * 24 hours * $duration days
	if ( $post_time > $time_now - ( 60 * 60 * 24 * $duration ) ) {
		$human_time = sprintf( __( '%s ago', THB_THEME_NAME), human_time_diff( $post_time, current_time( 'timestamp' ) ) );
	} else {
		$human_time = get_the_date();
	}

	return $human_time;

}

/* Portfolio Navigation */
function thb_portfolio_navigation($portfolio_link) {
 ?>
	<div class="portfolio_nav">
		<?php previous_post_link('%link', '<i class="icon-budicon-439"></i>'); ?>
		<a href="<?php echo $portfolio_link; ?>" class="gotoportfolio"><i class="icon-budicon-384"></i></a>
		<?php next_post_link('%link', '<i class="icon-budicon-447"></i>'); ?>
	</div>
<?php
}
add_action( 'thb_portfolio_navigation', 'thb_portfolio_navigation', 1 );
?>