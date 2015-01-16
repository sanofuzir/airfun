<?php function thb_location_single( $atts, $content = null ) {
    extract(shortcode_atts(array(
	   	'title'			=> '',
	   	'location_lat' 		=> '53.381129',
	   	'location_long' 		=> '-1.470085'
    ), $atts));
    
  $output = $out ='';
	$output .= '<div class="small-12 medium-3 columns">';
	$output .= '<a class="location" data-lat_long="'.$location_lat.', '.$location_long.'" data-title="'.$title.'">';
	if ($title) {
	$output .= '<h2>'. $title.'</h2>';
	}
	$output .= apply_filters('the_content', $content);
	$output .= '</a>';
	$output .= '</div>';
	return $output;

}
add_shortcode('thb_location_single', 'thb_location_single');
