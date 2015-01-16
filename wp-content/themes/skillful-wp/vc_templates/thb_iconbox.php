<?php function thb_iconbox( $atts, $content = null ) {
    extract(shortcode_atts(array(
    		'type'			 => 'top type1',
       	'image'      => '',
       	'color'      => '',
       	'icon'			 => 'icon-budicon-534',
       	'icon_color' => false,
       	'content_color' => false,
       	'heading'		 => '',
       	'use_btn'				 => false,
       	'btn_color'      => '',
       	'btn_target_blank' => false,
       	'btn_link'       => '#',
       	'btn_size'			 => 'small',
       	'btn_icon'			 => false,
       	'btn_content'		 => false,
       	'btn_style'       => false,
       	'animation'	 => false
    ), $atts));
	$btn = '';
	
	// Image & Icon
	if ($image) {
		$img_id = preg_replace('/[^\d]/', '', $image);
		$img = wp_get_attachment_image($img_id, 'full', false, array(
			'alt'   => trim(strip_tags( get_post_meta($img_id, '_wp_attachment_image_alt', true) )),
		));
  } else {
  	$icon = '<i class="'.$icon.'"></i>';
  }
  
  // Button
  if ($use_btn) {
	  if($btn_icon) { $btn_content = '<span class="icon"><i class="'.$btn_icon.'"></i></span>'. $btn_content; }
	  
	  $btn = '<a class="btn '.$btn_color.' '.$btn_size.' '.$btn_style.'" href="'.$btn_link.'" ' . ($btn_target_blank ? ' target="_blank"' : '') .'>' .$btn_content. '</a>';
	}

	// Content
	
	$out = '<div class="iconbox '.$type.' '.$animation.'">';
	switch($type) {
		case 'top type1':
		case 'left type1':
		case 'right type1':
			$out .= '<span' . ($image ? ' class="img"' : '') .' >' . ($image ? $img : $icon) .'</span>';
			break;
		case 'top type2':
		case 'left type2':
		case 'right type2':
			$out .= '<span' . ($image ? ' class="img"' : '') .' >' . ($image ? $img : $icon) .'</span>';
			break;
		case 'top type3':
			$out .= '<span' . ($image ? ' class="img"' : '') .' ' . ($icon_color ? ' style="color: '.$icon_color.'"' : '') .'>' . ($image ? $img : $icon) .'</span>';
			break;
	}
		
		
	$out .= '<div class="content">';
	
	
	if ($type == 'top type3') {
	$out .= '<h6' . ($content_color ? ' style="color: '.$content_color.'"' : '').'>'.$heading.'</h6>';
	$out .='<div' . ($content_color ? ' style="color: '.$content_color.'"' : '').'>'.$content.'</div>';	
	} else {
	$out .= '<h6>'.$heading.'</h6>';
	$out .='<div>'.$content.'</div>';
	}
	$out .= $btn;
	$out .='</div>
	</div>';
  return $out;
}
add_shortcode('thb_iconbox', 'thb_iconbox');
