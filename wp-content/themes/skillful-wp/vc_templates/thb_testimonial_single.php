<?php function thb_testimonial_single( $atts, $content = null ) {
    extract(shortcode_atts(array(
	   	'image'			=> '',
	   	'author' 		=> '',
	   	'title'			=> ''
    ), $atts));
    
  $output = $out ='';
	
	$output .= '<blockquote class="testimonial">';
	$output .= '<p>'. $content.'</p>';
	if ($image) {
		 $image_link = wp_get_attachment_image_src($image,'full');
		 $image_src = aq_resize( $image_link[0], 65, 65, true, false);
		 $output .= '<img src="'.$image_src[0].'" class="author" />';
	}
	if ($author) {
		$output .= '<small>'.$author.'</small>';
	}
	if ($title) {
		$output .= '<span class="author-title">'.$title.'</span>';
	}
	$output .= '</blockquote>';
	return $output;

}
add_shortcode('thb_testimonial_single', 'thb_testimonial_single');
