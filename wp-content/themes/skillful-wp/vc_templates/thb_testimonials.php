<?php function thb_testimonials( $atts, $content = null) {
    extract(shortcode_atts(array(
       	'style'      => 'dark'
    ), $atts));
	$output = $out ='';
	
	$test_style = ($style == 'light' ? 'light-testimonial' : '');
	$output .= '<div class="carousel-container '.$test_style.'"><div class="owl carousel testimonials" data-columns="1" data-navigation="true" data-transition="fade">';
	$output .= do_shortcode($content);
	$output .= '</div></div>';
	
	return $output;

}
add_shortcode('thb_testimonials', 'thb_testimonials');