<?php function thb_location( $atts, $content = null) {
    extract(shortcode_atts(array(
       	'map_center_lat'      => '',
       	'map_center_long'      => '',
       	'map_zoom'						=> '15'
    ), $atts));
	$output = $out ='';
	$id = 'map-'.rand(0,1000);
	wp_enqueue_script('gmapdep');
	wp_enqueue_script('gmap');
	
	$output .= '<div class="location-container">';
	$output .= '<div class="location_map full-width-content" id="'.$id.'" data-map-center-lat="'.$map_center_lat.'" data-map-center-long="'.$map_center_long.'" data-map-zoom="'.$map_zoom.'" data-pin-image="'.ot_get_option("map_pin_image", THB_THEME_ROOT. "/assets/img/pin.png").'"></div>';
	$output .= '<div class="row">'.do_shortcode($content).'</div>';
	$output .= '</div>';
	
	return $output;

}
add_shortcode('thb_location', 'thb_location');
