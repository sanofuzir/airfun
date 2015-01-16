<?php function thb_dial( $atts, $content = null ) {
    extract(shortcode_atts(array(
    		'use_icon'	=> '',
    		'icon' 			=>	'',
    		'width' 		=> '170',
       	'value'     => '50',
       	'title'			=>'',
       	'style'			=> 'light'
    ), $atts));
	$output = $out ='';
	$accent = ot_get_option('accent_color', '#137fc4');
	if ($style == 'light') {
		$bgcolor = "#eaeaea";	
	} else {
		$bgcolor = "#303030";
	}
	wp_enqueue_script('knob');
	$out .= '<figure class="knob '.$style.'" style="width:'.$width.'px; min-height:'.$width.'px;">';
	if ($use_icon) {
			$out .= '<span class="icon" style="color: '.$accent.'"><i class="'.$icon.'"></i></span>';
	}
	$out .= '<input class="dial '.($use_icon ? "hidden" : "").'" data-fg="'.$accent.'" data-bg="'.$bgcolor.'" data-value="'.$value.'" data-width="'.$width.'" value="'.$value.'" data-linecap="round" /><strong>'.$title.'</strong></figure>';
	
	return $out;
}
add_shortcode('thb_dial', 'thb_dial');

