<?php function thb_contentbox( $atts, $content = null ) {
    extract(shortcode_atts(array(
    		'style'							=> '',
    		'background'				=> '',
    		'image'							=> '',
       	'title'     				=> 'Title',
       	'title_color'				=> '',
       	'link'							=> '#',
       	'color'							=> '',
       	'hover_background'				=> '',
       	'height'						=> '120'
    ), $atts));
	$out = '';
	if ($image) {
		$img_id = preg_replace('/[^\d]/', '', $image);
		$img = wp_get_attachment_image_src($img_id, 'full');
	}
	if ($style == 'style1') {
		$out .= '<a href="'.$link.'" class="fliplink"><aside class="flipbox" style="height:'.$height.'px;">';
		$out .= '<div class="flip front" style="height:'.$height.'px; background-color: '.$background.'"><div><h2 style="color:'.$title_color.';">'.$title.'</h2></div></div>';
		$out .= '<div class="flip back" style="height:'.$height.'px; background:'.$hover_background.';"><div><p style="color:'.$color.';">'.$content.'</p></div></div>';
	  $out .= '</aside></a>';
	} else {
		$out .= '<a href="'.$link.'" class="contentlink"><aside class="contentbox" style="height:'.$height.'px; background-color:'.$background.'; '.($image ? 'background-image: url('.$img[0].');' : '').'">';
		$out .= '<div class="overlay" style="background:'.$hover_background.';"></div>';
		$out .= '<div class="text" style="top: '.($height/2).'px;"><h3 style="color:'.$title_color.';">'.$title.'</h3>';
		$out .= '<div class="span" style="color:'.$color.';">'.$content.'</div>';
		$out .= '</div>';
		$out .= '</aside></a>';
	}
  return $out;
}
add_shortcode('thb_contentbox', 'thb_contentbox');
