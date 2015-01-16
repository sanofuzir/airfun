<?php function thb_jobapplication( $atts, $content = null ) {
    extract(shortcode_atts(array(
       	'title'      => '',
       	'icon'			 => '',
       	'enable_form'	 => '',
       	'contact_form_id' => ''
    ), $atts));
	

	// Content
	$out = '<div class="job_application">';
	$out .= '<div class="row">';
		$out .= '<div class="twelve columns"><a href="#" class="title"><span><i class="'.$icon.'"></i></span>'.$title.'</a></div>';
		
		
	$out .= '<div class="small-12 medium-9 medium-centered large-7 columns">';
		$out .= '<div class="content">'.$content.' '.($enable_form ? '<p><a href="#" class="job_form btn">'.__("APPLY", THB_THEME_NAME).'</a></p>' : '').'</div>';
	
	if ($enable_form) {
		$out .= '<div class="contact-form"><a href="#" class="close"></a>'.do_shortcode("[contact-form-7 id='".$contact_form_id."']").'</div>';
	}
	
	$out .= '</div>
		</div>
	</div>';
  return $out;
}
add_shortcode('thb_jobapplication', 'thb_jobapplication');
