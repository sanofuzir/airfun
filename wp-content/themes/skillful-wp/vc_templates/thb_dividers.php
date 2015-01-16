<?php function thb_dividers( $atts, $content = null ) {
extract(shortcode_atts(array(
		'style'			=> 'style1'
), $atts));

if ($style == 'style1') {
	$style = 'style1 full-width-section';	
}
$out = '<aside class="styled_dividers '.$style.' "><span></span></aside>';

return $out;
}
add_shortcode('thb_dividers', 'thb_dividers');
