<?php function thb_teammember( $atts, $content = null ) {
    extract(shortcode_atts(array(
       	'image' 			=> '',
       	'name'			=> '',
       	'position'	=> '',
       	'text'		=> '',
       	'advanced'	=> '',
       	'facebook'	=> '',
       	'twitter'	=> '',
       	'pinterest'	=> '',
       	'linkedin'	=> ''
    ), $atts));
	
	$out = '';
	
	$img_id = preg_replace('/[^\d]/', '', $image);
	$img = wp_get_attachment_image_src($img_id, 'full');
	$resized = aq_resize( $img[0], 270, 270, true, false);
  $out .= '<aside class="team_member">';
  $out .= '<figure class="fresco">';
  $out .= '<img src="'.$resized[0].'" width="'.$resized[1].'" height="'.$resized[2].'" alt="'.$name.'" />';
  $out .= '<div class="overlay"><div class="text '.($advanced ? 'advanced' : '').'">';
  if ($advanced) {
  	$out .= ($text ? '<strong>'.$text.'</strong>' : '');
  } else {
  	$out .= ($name ? '<h5>'.$name.'</h5>' : '');
  	$out .= ($position ? '<h6>'.$position.'</h6>' : '');
  }
  $out .= '</div></div>';
  $out .= '</figure>';
  if ($advanced) {
  	$out .= ($name ? '<h5>'.$name.'</h5>' : '');
  	$out .= ($position ? '<h6>'.$position.'</h6>' : '');
		if ($facebook || $pinterest || $twitter || $linkedin) {
			$out .= '<div class="social_links">';
			if ($facebook) {
				$out .= '<a href="'.$facebook.'" class="facebook boxed-icon rounded"><i class="icon-budicon-834"></i></a>';
			}
			if ($twitter) {
				$out .= '<a href="'.$twitter.'" class="twitter boxed-icon rounded"><i class="icon-budicon-841"></i></a>';
			}
			if ($pinterest) {
				$out .= '<a href="'.$pinterest.'" class="pinterest boxed-icon rounded"><i class="icon-budicon-817"></i></a>';
			}
			if ($linkedin) {
				$out .= '<a href="'.$linkedin.'" class="linkedin boxed-icon rounded"><i class="icon-budicon-802"></i></a>';
			}
			$out .= '</div>';
  	}
  }
  $out .= '</aside>';
  return $out;
}
add_shortcode('thb_teammember', 'thb_teammember');
