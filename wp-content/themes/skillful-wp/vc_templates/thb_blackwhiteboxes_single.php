<?php function thb_blackwhiteboxes_single( $atts, $content = null) {
  extract(shortcode_atts(array(
     	'image'			=> '',
     	'title' 		=> ''
    ), $atts));
    
  $output = $out ='';
  
  $output .= '<div class="bw small-12 medium-4 columns grayscale">';
  if ($image) {
  	 $image_link = wp_get_attachment_image_src($image,'full');
  	 $image_src = aq_resize( $image_link[0], 391, 270, true, false);
  	 $output .= '<img src="'.$image_src[0].'" class="bw_image" />';
  }
  $output .= '<div class="content">';
  if ($title) {
  	$output .= '<div class="title">'.$title.'</div>';
  }
  $output .= wpautop($content);
  $output .= '</div></div>';
  return $output;

}
add_shortcode('thb_blackwhiteboxes_single', 'thb_blackwhiteboxes_single');
