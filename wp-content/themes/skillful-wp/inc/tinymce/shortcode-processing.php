<?php

/* Inline Label Shortcodes */
function tags($atts, $content = null ) {
    extract(shortcode_atts(array(
    	'color'      => 'gray'
    ), $atts));

	$out = '<span class="highlight '.$color.'">' .$content. '</span>';
	
    return $out;
}
add_shortcode('tags', 'tags');

/* Blockquote */
function blockquotes( $atts, $content = null ) {
    extract(shortcode_atts(array(
       	'pull'      => '',
       	'author'    => ''
    ), $atts));
	$content = remove_invalid_tags($content, array('p'));
	$content = remove_invalid_tags($content, array('br'));
	$authorhtml = '';
	if ($author) {
		$authorhtml = '<cite>'. $author. '</cite>';
	}
	$out = '<blockquote class="styled '.$pull.'"><p>' .$content. $authorhtml. '</p></blockquote>';
    return $out;
}
add_shortcode('blockquote', 'blockquotes');

/* Icons */
function icons( $atts, $content = null ) {
    extract(shortcode_atts(array(
       	'type'      => '',
       	'url'				=> '',
       	'box'				=> '',
       	'size'			=> 'icon-1x'
    ), $atts));
 
		$out = '<i class="'.$type.'"></i>';

  	if ($box) {

  		$class = '';
  		
  		switch ($type) {
  			case 'icon-budicon-834':
  				$class = 'facebook';
  				break;
  			case 'icon-budicon-841':
	  			$class = 'twitter';
	  			break;
	  		case 'icon-budicon-817':
	  			$class = 'pinterest';
	  			break;
	  		case 'icon-budicon-802':
	  			$class = 'linkedin';
	  			break;
	  		case 'icon-budicon-833':
	  			$class = 'instagram';
	  			break;
  		}
  		if ($type == 'fa-facebook' || $type == 'fa-twitter' || $type == 'fa-google-plus' || $type == 'fa-pinterest' || $type == 'fa-linkedin') {
  			$class = substr($type, 3);
  		}
  		$out = '<a href="'.$url.'" class="boxed-icon '.$class.' '. $size.'">'.$out.'</a>';
  	}	else {
  		$out = '<span class="inline-icon '. $size.' no-link"><i class="'.$type.' '. $size.'"></i></span>';
  	}
  	
  	return $out;
}
add_shortcode('icon', 'icons');

/* Dropcap */
function dropcap( $atts, $content = null ) {
    extract(shortcode_atts(array(
       	'boxed'      => 'accent'
    ), $atts));
 		
		$out = '<span class="dropcap '.$boxed.'">'.$content.'</span>';
  	
  	return $out;
}
add_shortcode('dropcap', 'dropcap');

?>