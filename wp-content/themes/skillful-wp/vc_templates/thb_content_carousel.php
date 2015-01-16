<?php function thb_content_carousel( $atts, $content = null ) {
    extract(shortcode_atts(array(
       	'columns'		 => '2'
    ), $atts));
	$output = $out ='';
	$output .= '<div class="carousel-container"><div class="owl carousel content-carousel" data-columns="'.$columns.'" data-navigation="false" data-pagination="true">';
	$output .= do_shortcode($content);
	$output .= '</div></div>';
	
	return $output;
}
add_shortcode('thb_content_carousel', 'thb_content_carousel');
