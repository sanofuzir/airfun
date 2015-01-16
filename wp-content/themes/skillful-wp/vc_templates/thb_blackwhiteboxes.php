<?php function thb_blackwhiteboxes( $atts, $content = null) {
    extract(shortcode_atts(array(
       	'columns'      => '3'
    ), $atts));
	$output = $out ='';
	$output .= '<div class="bw_container row">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	
	return $output;

}
add_shortcode('thb_blackwhiteboxes', 'thb_blackwhiteboxes');
