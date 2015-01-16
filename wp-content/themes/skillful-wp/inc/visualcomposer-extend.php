<?php
$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;

// Shortcodes 
$shortcodes = THB_THEME_ROOT_ABS.'/vc_templates/';
$files = glob($shortcodes.'/thb_?*.php');
foreach ($files as $filename)
{
	require_once($shortcodes.basename($filename));
}

/* Visual Composer Mappings */

// Adding animation to columns
vc_add_param("vc_column", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Animation",
	"admin_label" => true,
	"param_name" => "animation",
	"value" => array(
		"None" => "",
		"Left" => "animation right-to-left",
		"Right" => "animation left-to-right",
		"Top" => "animation bottom-to-top",
		"Bottom" => "animation top-to-bottom",
		"Scale" => "animation scale",
		"Fade" => "animation fade-in"
	),
	"description" => ""
));

// Add parameters to rows
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"In Container" => "in_container",
		"Full Width Background" => "full_width_background",
		"Full Width Content" => "full_width_content"		
	)
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Enable parallax",
	"param_name" => "enable_parallax",
	"value" => array(
		"" => "false"
	)
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Parallax Speed",
	"param_name" => "parallax_speed",
	"value" => "1",
	"dependency" => array(
		"element" => "enable_parallax",
		"not_empty" => true
	),
	"description" => "A value between 0 and 1 is recommended"
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (mp4)",
	"param_name" => "bg_video_src_mp4",
	"value" => "",
	"description" => "You must include the ogv & the mp4 format to render your video with cross browser compatibility. OGV is optional. Video must be in a 16:9 aspect ratio. The row background image will be used as in mobile devices."
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (ogv)",
	"param_name" => "bg_video_src_ogv",
	"value" => ""
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (webm)",
	"param_name" => "bg_video_src_webm",
	"value" => ""
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Video Overlay Color",
	"param_name" => "bg_video_overlay_color",
	"value" => "",
	"description" => "If you want, you can select an overlay color."
));

vc_add_param("vc_tabs", array(
  "type" => "dropdown",
  "heading" => "Style",
  "param_name" => "style",
  "value" => array(
  	'Style 1' => "style1",
  	'Style 2' => "style2"
  ),
  "description" => "Style 1 is boxed and Style 2 is minimalistic"
));
vc_add_param("vc_tour", array(
  "type" => "dropdown",
  "heading" => "Style",
  "param_name" => "style",
  "value" => array(
  	'Style 1' => "style1",
  	'Style 2' => "style2"
  ),
  "description" => "Style 1 is boxed and Style 2 is minimalistic"
));
vc_add_param("vc_accordion", array(
  "type" => "dropdown",
  "heading" => "Style",
  "param_name" => "style",
  "value" => array(
  	'Style 1' => "style1",
  	'Style 2' => "style2"
  ),
  "description" => "Style 1 is boxed and Style 2 is minimalistic"
));
vc_add_param("vc_toggle", array(
  "type" => "dropdown",
  "heading" => "Style",
  "param_name" => "style",
  "value" => array(
  	'Style 1' => "style1",
  	'Style 2' => "style2"
  ),
  "description" => "Style 1 is boxed and Style 2 is minimalistic"
));

// Banner shortcode
vc_map( array(
	"name" => __("Banner", THB_THEME_NAME),
	"base" => "thb_banner",
	"icon" => "thb_vc_ico_banner",
	"class" => "thb_vc_sc_banner",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Select Background Image",
			"param_name" => "banner_bg",
			"description" => ""
		),
		array(
		  "type" => "textfield",
		  "heading" => "Banner Height",
		  "param_name" => "banner_height",
		  "description" => "Enter height of the banner in px."
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Banner Effect",
			"param_name" => "type",
			"value" => array(
				"Lily" => "effect-lily",
				"Sadie" => "effect-sadie",
				"Honey" => "effect-honey",
				"layla" => "effect-layla",
				"Marley" => "effect-marley",
				"Ruby" => "effect-ruby",
				"Roxy" => "effect-roxy",
				"Bubba" => "effect-bubba",
				"Romeo" => "effect-romeo",
				"Dexter" => "effect-dexter",
				"Sarah" => "effect-sarah",
				"Chico" => "effect-chico",
				"Milo" => "effect-milo"
			),
			"description" => "You can see the effects here: http://themes.fuelthemes.net/skillful/banners/"
		),

		array(
		  "type" => "textfield",
		  "heading" => "Title",
		  "param_name" => "title",
		  "admin_label" => true,
		),
		array(
		  "type" => "textfield",
		  "heading" => "Sub Title",
		  "param_name" => "subtitle"
		),
		array(
		  "type" => "textfield",
		  "heading" => "Link",
		  "param_name" => "overlay_link"
		)
	),
	"description" => "Display different banner styles"
) );

// Black & White Box Shortcode

vc_map( array(
	"name" => __("Black & White Boxes", THB_THEME_NAME),
	"base" => "thb_blackwhiteboxes",
	"icon" => "thb_vc_ico_blackwhiteboxes",
	"class" => "thb_vc_sc_blackwhiteboxes",
	"category" => "by Fuel Themes",
	"as_parent" => array('only' => 'thb_blackwhiteboxes_single'),
	"show_settings_on_create" => false,
	"content_element" => true,
	"js_view" => 'VcColumnView',
	"description" => "Display Black & White Content Boxes"
) );

vc_map( array(
  "name" => __("Black & White Box", THB_THEME_NAME),
  "base" => "thb_blackwhiteboxes_single",
  "icon" => "thb_vc_ico_blackwhiteboxes",
  "as_child" => array('only' => 'thb_blackwhiteboxes'),
  "content_element" => true,
  "params" => array(
  	array(
  		"type" => "attach_image", //attach_images
  		"class" => "",
  		"heading" => "Image",
  		"param_name" => "image",
  		"description" => "Image"
  	),
  	array(
  	  "type" => "textfield",
  	  "heading" => "Title",
  	  "param_name" => "title",
  	  "admin_label" => true,
  	  "description" => "Title"
  	),
    array(
      "type" => "textarea_html",
      "heading" => "Content",
      "param_name" => "content",
      "description" => "Content"
    )
  ),
  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35'),
  "description" => "Display Black & White Content Boxes"
));

class WPBakeryShortCode_Thb_Blackwhiteboxes extends WPBakeryShortCodesContainer { }
class WPBakeryShortCode_Thb_Blackwhiteboxes_Single extends WPBakeryShortCode { }

// Button shortcode
vc_map( array(
	"name" => __("Button", THB_THEME_NAME),
	"base" => "thb_button",
	"icon" => "thb_vc_ico_button",
	"class" => "thb_vc_sc_button",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Caption",
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Link URL",
			"param_name" => "link",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Icon",
			"param_name" => "icon",
			"value" => thb_getIconArray(),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Open link in",
			"param_name" => "target_blank",
			"value" => array(
				"Same window" => "",
				"New window" => "true"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Size",
			"param_name" => "size",
			"value" => array(
				"Small button" => "small",
				"Medium button" => "medium",
				"Big button" => "large"
			),
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Rounded?",
			"param_name" => "rounded",
			"value" => array(
				"" => "rounded"
			)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Style",
			"param_name" => "style",
			"value" => array(
				"Fill" => "",
				"Outline" => "outline"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Button color",
			"param_name" => "color",
			"value" => array(
				"Accent Color" => "accent",
				"Black" => "black",
				"White" => "white"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Animation",
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		)
	),
	"description" => "Add an animated button"
) );

// Clients shortcode
vc_map( array(
	"name" => __("Clients", THB_THEME_NAME),
	"base" => "thb_clients",
	"icon" => "thb_vc_ico_clients",
	"class" => "thb_vc_sc_clients",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_images", //attach_images
			"class" => "",
			"heading" => "Select Images",
			"param_name" => "images",
			"description" => "Add as many client images as possible.",
			"admin_label" => true,
		),
		array(
	    "type" => "dropdown",
	    "heading" => "Carousel",
	    "param_name" => "carousel",
	    "value" => array(
	    	'Yes' => "yes",
	    	'No' => "no",
	    	),
	    "description" => "Select yes to display the client images in a carousel."
		),
		array(
	    "type" => "dropdown",
	    "heading" => "Columns",
	    "param_name" => "columns",
	    "value" => array(
	    	'Six Columns' => "6",
	    	'Five Columns' => "5",
	    	'Four Columns' => "4",
	    	'Three Columns' => "3",
	    	'Two Columns' => "2"
	    ),
	    "description" => "Select the layout."
		),
	),
	"description" => "Show your clients proudly"
) );

// Content Carousel Shortcode
vc_map( array(
	"name" => __("Content Carousel", THB_THEME_NAME),
	"base" => "thb_content_carousel",
	"icon" => "thb_vc_ico_content_carousel",
	"class" => "thb_vc_sc_content_carousel",
	"as_parent" => array('except' => 'thb_content_carousel'),
	"category" => "by Fuel Themes",
	"show_settings_on_create" => true,
	"content_element" => true,
	"params" => array(
		array(
	    "type" => "dropdown",
	    "heading" => "Columns",
	    "param_name" => "columns",
	    "value" => array(
	    	'Six Columns' => "6",
	    	'Five Columns' => "5",
	    	'Four Columns' => "4",
	    	'Three Columns' => "3",
	    	'Two Columns' => "2"
	    ),
	    "description" => "Select the layout."
		),
	),
	"js_view" => 'VcColumnView',
	"description" => "Display your content in a carousel"
) );

class WPBakeryShortCode_Thb_Content_Carousel extends WPBakeryShortCodesContainer { }

// Contentbox shortcode
vc_map( array(
	"name" => __("Content Box", THB_THEME_NAME),
	"base" => "thb_contentbox",
	"icon" => "thb_vc_ico_contentbox",
	"class" => "thb_vc_sc_contentbox",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Style",
			"param_name" => "style",
			"value" => array(
				"Style 1" => "style1",
				"Style 2" => "style2"
			),
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "background",
			"value" => "",
			"description" => "Background color"
		),
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Background Image",
			"param_name" => "image",
			"description" => "",
			"dependency" => array(
				"element" => "style",
				"value" => array('style2')
			)
		),
		array(
		  "type" => "textfield",
		  "heading" => "Height",
		  "param_name" => "height",
		  "description" => "Enter height of the banner in px."
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Title",
			"param_name" => "title",
			"admin_label" => true,
			"description" => "Title to display on the front face"
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Link",
			"param_name" => "link",
			"description" => "Where to link the flipbox"
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => "Content",
			"param_name" => "content",
			"value" => "",
			"description" => "Content to display on the back face"
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color",
			"value" => "",
			"description" => "Title color"
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Text Color",
			"param_name" => "color",
			"value" => "",
			"description" => "Text color of the hover face"
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Hover Background Color",
			"param_name" => "hover_background",
			"value" => "",
			"description" => "Background color of the hover face"
		)
	),
	"description" => "Display your content in a box"
) );

// Counter
vc_map( array(
	"name" => __("Counter", THB_THEME_NAME),
	"base" => "thb_counter",
	"icon" => "thb_vc_ico_counter",
	"class" => "thb_vc_sc_counter",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Style",
			"param_name" => "style",
			"value" => array(
				"No Icon" => "style1",
				"Top Icon" => "style2",
				"Left Icon" => "style3"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Icon",
			"param_name" => "icon",
			"value" => thb_getIconArray(),
			"description" => "",
			"dependency" => array(
				"element" => "style",
				"value" => array('style2', 'style3')
			)
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Color",
			"param_name" => "color",
			"value" => "",
			"description" => "Leave empty to use default color"
		),
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Image",
			"param_name" => "image",
			"description" => "Use image instead of icon? Image uploaded should be 70*70 or 140*140 for retina."
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Number to count to",
			"param_name" => "content",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Speed of the counter animation",
			"param_name" => "speed",
			"value" => "",
			"description" => "Speed of the counter animation, default 1500"
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Heading",
			"param_name" => "heading",
			"value" => "",
			"admin_label" => true,
			"description" => ""
		)
	),
	"description" => "Count from 0 to your number"
) );

// Dial Shortcode
vc_map( array(
	"name" => __("Dials", THB_THEME_NAME),
	"base" => "thb_dial",
	"icon" => "thb_vc_ico_dial",
	"class" => "thb_vc_sc_dial",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
		    "type" => "dropdown",
		    "heading" => "Style",
		    "param_name" => "style",
		    "value" => array(
		    	'Light' => "light",
		    	'Dark' => "dark"
		    ),
		    "description" => "This changes the background color."
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Use Icon insted of value in the center?",
			"param_name" => "use_icon",
			"value" => array(
				"" => "true"
			)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Icon",
			"param_name" => "icon",
			"value" => thb_getIconArray(),
			"dependency" => array(
				"element" => "use_icon",
				"not_empty" => true
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Value",
			"param_name" => "value",
			"value" => "50",
			"description" => "This is a percentage, so you need to choose something between 0 - 100"
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Title",
			"param_name" => "title",
			"value" => "Title",
			"admin_label" => true,
			"description" => "Title to show below the dial"
		)
	),
	"description" => "Display dials with icons or counters"
) );

// Divider Shortcode
vc_map( array(
	"name" => __("Dividers", THB_THEME_NAME),
	"base" => "thb_dividers",
	"icon" => "thb_vc_ico_dividers",
	"class" => "thb_vc_sc_dividers",
	"category" => "by Fuel Themes",
	"show_settings_on_create" => true,
	"params" => array(
		array(
		    "type" => "dropdown",
		    "heading" => "Style",
		    "param_name" => "style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1' => "style1",
		    	'Style 2' => "style2",
		    	'Style 3' => "style3"
		    ),
		    "description" => "This changes the style of the dividers"
		),
	),
	"description" => "Divide your content with different divider styles."
) );

// Gap shortcode
vc_map( array(
	"name" => __("Gap", THB_THEME_NAME),
	"base" => "thb_gap",
	"icon" => "thb_vc_ico_gap",
	"class" => "thb_vc_sc_gap",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => "Gap Height",
		  "param_name" => "height",
		  "admin_label" => true,
		  "description" => "Enter height of the gap in px."
		)
	),
	"description" => "Add a gap to seperate elements"
) );

// Icon List shortcode
vc_map( array(
	"name" => __("Icon List", THB_THEME_NAME),
	"base" => "thb_iconlist",
	"icon" => "thb_vc_ico_iconlist",
	"class" => "thb_vc_sc_iconlist",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Icon",
			"param_name" => "icon",
			"value" => thb_getIconArray(),
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Icon color",
			"param_name" => "color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Animation",
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		),
		array(
			"type" => "exploded_textarea",
			"class" => "",
			"heading" => "List Items",
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => "Every new line will be treated as a list item"
		)
	),
	"description" => "Add lists with icons"
) );

// Iconbox shortcode
vc_map( array(
	"name" => __("Iconbox", THB_THEME_NAME),
	"base" => "thb_iconbox",
	"icon" => "thb_vc_ico_iconbox",
	"class" => "thb_vc_sc_iconbox",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Type",
			"param_name" => "type",
			"value" => array(
				"Top Icon - Type 1" => "top type1",
				"Top Icon - Type 2" => "top type2",
				"Top Icon - Type 3" => "top type3",
				"Left Icon - Type 1" => "left type1",
				"Left Icon - Type 2" => "left type2",
				"Left Icon - Type 3" => "left type3",
				"Right Icon - Type 1" => "right type1",
				"Right Icon - Type 2" => "right type2",
				"Right Icon - Type 3" => "right type3"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Icon",
			"param_name" => "icon",
			"value" => thb_getIconArray(),
			"description" => ""
		),
		array(
		  "type"              => "colorpicker",
		  "holder"            => "div",
		  "class"             => "",
		  "heading"           => "Icon Color",
		  "param_name"        => "icon_color",
		  "description"       => "",
		  "dependency" => Array('element' => "type", 'value' => array('top type3'))
		),
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Image",
			"param_name" => "image",
			"description" => "Use image instead of icon? Image uploaded should be 150*150 or 300*300 for retina. For small icons, 40*30 or 80*80 for retina."
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Heading",
			"param_name" => "heading",
			"value" => "",
			"admin_label" => true,
			"description" => ""
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => "Content",
			"param_name" => "content",
			"value" => "",
			"description" => ""
		),
		array(
		  "type"              => "colorpicker",
		  "holder"            => "div",
		  "class"             => "",
		  "heading"           => "Content Color",
		  "param_name"        => "content_color",
		  "description"       => "",
		  "dependency" => Array('element' => "type", 'value' => array('top type3'))
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Animation",
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Add Button?",
			"param_name" => "use_btn",
			"value" => array(
				"" => "true"
			),
			"description" => "Check if you want to add a button."
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Button Caption",
			"param_name" => "btn_content",
			"value" => "",
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Button Link URL",
			"param_name" => "btn_link",
			"value" => "",
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Button Icon",
			"param_name" => "btn_icon",
			"value" => thb_getIconArray(),
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Button Open link in",
			"param_name" => "btn_target_blank",
			"value" => array(
				"Same window" => "",
				"New window" => "true"
			),
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Button Size",
			"param_name" => "btn_size",
			"value" => array(
				"Small button" => "small",
				"Medium button" => "medium",
				"Big button" => "big"
			),
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Button Style",
			"param_name" => "btn_style",
			"value" => array(
				"Fill" => "",
				"Outline" => "outline"
			),
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Button color",
			"param_name" => "btn_color",
			"value" => array(
				"Accent" => "accent",
				"Black" => "black",
				"White" => "white"
			),
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		)
	),
	"description" => "Iconboxes with different animations"
) );

// Image shortcode
vc_map( array(
	"name" => "Image",
	"base" => "thb_image",
	"icon" => "thb_vc_ico_image",
	"class" => "thb_vc_sc_image",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Select Image",
			"param_name" => "image",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Animation",
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		),
		array(
		  "type" => "textfield",
		  "heading" => "Image size",
		  "param_name" => "img_size",
		  "description" => "Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size."
		),
		array(
		  "type" => "dropdown",
		  "heading" => "Image alignment",
		  "param_name" => "alignment",
		  "value" => array("Align left" => "left", "Align right" => "right", "Align center" => "center"),
		  "description" => "Select image alignment."
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Link to Full-Width Image?",
			"param_name" => "lightbox",
			"value" => array(
				"" => "true"
			)
		),
		array(
		  "type" => "textfield",
		  "heading" => "Image link",
		  "param_name" => "img_link",
		  "description" => "Enter url if you want this image to have link.",
		  "dependency" => Array('element' => "lightbox", 'is_empty' => true)
		),
		array(
		  "type" => "dropdown",
		  "heading" => "Link Target",
		  "param_name" => "img_link_target",
		  "value" => array(
		  	"Same window" => "",
		  	"New window" => "true"
		  ),
		  "dependency" => Array('element' => "lightbox", 'is_empty' => true)
		)
	),
	"description" => "Add an animated image"
) );

// Image Slider
vc_map( array(
	"name" => __("Image Slider", THB_THEME_NAME),
	"base" => "thb_slider",
	"icon" => "thb_vc_ico_slider",
	"class" => "thb_vc_sc_slider",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_images", //attach_images
			"class" => "",
			"heading" => "Select Images",
			"param_name" => "images",
			"admin_label" => true,
			"description" => ""
		),
		array(
		  "type" => "textfield",
		  "heading" => "Width",
		  "param_name" => "width",
		  "description" => "Enter the width of the images. The slider will fill the width of the container, so make sure you size the columns accordingly."
		),
		array(
		  "type" => "textfield",
		  "heading" => "Height",
		  "param_name" => "height",
		  "description" => "Enter the height of the images."
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Navigation Arrows",
			"param_name" => "navigation",
			"value" => array(
				"" => "true"
			),
			"description" => "Check this if you want to show navigation arrows."
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Bullets",
			"param_name" => "bullets",
			"value" => array(
				"" => "true"
			),
			"description" => "Check if you want to show bullets"
		)
	),
	"description" => "Add an image slider"
) );

// Job Application shortcode
vc_map( array(
	"name" => __("Job Application", THB_THEME_NAME),
	"base" => "thb_jobapplication",
	"icon" => "thb_vc_ico_jobapplication",
	"class" => "thb_vc_sc_jobapplication",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => "Job Title",
		  "param_name" => "title",
		  "admin_label" => true,
		  "description" => "Enter the job title"
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Job Icon",
			"param_name" => "icon",
			"value" => thb_getIconArray(),
			"description" => ""
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => "Job Description",
			"param_name" => "content",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Enable Application Form?",
			"param_name" => "enable_form",
			"value" => array(
				"" => "true"
			)
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Contact Form 7 ID",
			"param_name" => "contact_form_id",
			"value" => "1",
			"dependency" => array(
				"element" => "enable_form",
				"not_empty" => true
			),
			"description" => "You should enter the form ID created by Contact Form 7"
		)
	),
	"description" => "Ready to get new applications?"
) );

/* Large Icons */ 
vc_map( array(
		"name" => __("Large Circle Icons", THB_THEME_NAME),
		"base" => "thb_largecircleicons",
		"icon" => "thb_vc_ico_largecircleicons",
		"class" => "thb_vc_sc_largecircleicons",
		"category" => "by Fuel Themes",
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Icon",
				"param_name" => "icon",
				"value" => thb_getIconArray(),
				"description" => ""
			),
			array(
				"type"              => "textfield",
				"holder"            => "div",
				"class"             => "",
				"heading"           => "Link",
				"param_name"        => "link",
				"value"             => ""
			),
			array(
				"type"              => "dropdown",
				"holder"            => "div",
				"class"             => "",
				"heading"           => "Target",
				"param_name"        => "target",
				"value"             => array(
					"Self"          => "_self",
					"Blank"         => "_blank"
				),
				"description"       => ""
			),
			array(
        "type"              => "colorpicker",
        "holder"            => "div",
        "class"             => "",
        "heading"           => "Icon Color",
        "param_name"        => "icon_color",
        "description"       => ""
      ),
      array(
        "type"              => "colorpicker",
        "holder"            => "div",
        "class"             => "",
        "heading"           => "Icon Hover Color",
        "param_name"        => "icon_hover_color",
        "description"       => ""
      ),
			array(
				"type"              => "colorpicker",
				"holder"            => "div",
				"class"             => "",
				"heading"           => "Background Color",
				"param_name"        => "background_color",
				"description"       =>""
			),
      array(
        "type"              => "colorpicker",
        "holder"            => "div",
        "class"             => "",
        "heading"           => "Background Hover Color",
        "param_name"        => "background_hover_color",
        "description"       =>""
      ),
      array(
        "type"              => "textfield",
        "holder"            => "div",
        "class"             => "",
        "heading"           => "Background Color Transparency",
        "param_name"        => "background_color_transparency",
        "description"       =>"Value should be between 0 and 1"
      ),
			array(
				"type"              => "textfield",
				"holder"            => "div",
				"class"             => "",
				"heading"           => "Border Width",
				"param_name"        => "border_width"
			),
      array(
				"type"              => "colorpicker",
				"holder"            => "div",
				"class"             => "",
				"heading"           => "Border Color",
				"param_name"        => "border_color",
				"description"       => ""
			),
	    array(
        "type"              => "colorpicker",
        "holder"            => "div",
        "class"             => "",
        "heading"           => "Border Hover Color",
        "param_name"        => "border_hover_color",
        "description"       => ""
	    ),
	    array(
        "type"              => "textfield",
        "holder"            => "div",
        "class"             => "",
        "heading"           => "Icon Margin",
        "param_name"        => "icon_margin",
        "value"             => "",
        "description"       => "Margin should be set in a top right bottom left format"
	    ),
		),
		"description" => "Display large circle icons with links"
) );


// Masonry shortcode
vc_map( array(
	"name" => __("Masonry", THB_THEME_NAME),
	"base" => "thb_masonry",
	"icon" => "thb_vc_ico_masonry",
	"class" => "thb_vc_sc_masonry",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
	    "type" => "dropdown",
	    "heading" => "Type",
	    "param_name" => "type",
	    "value" => array(
	    	'Posts' => "post",
	    	'Portfolio' => "portfolio",
	    	),
	    "admin_label" => true,
	    "description" => "Would you like to display posts or portfolios?"
		),
		array(
		    "type" => "checkbox",
		    "heading" => "Categories",
		    "param_name" => "portfolio_categories",
		    "value" => thb_portfolioCategories(),
		    "description" => "Select which categories of portfolios you would like to display.",
		    "dependency" => array(
		    	"element" => "type",
		    	"value" => array('portfolio')
		    )
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Number of Items",
			"param_name" => "item_count",
			"description" => "Number of items to load initially"
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Number of Items to load each time",
			"param_name" => "retrieve",
			"description" => "Number of items to retrieve each time the Load More button is pressed"
		)
	),
	"description" => "Add masonry of blog posts or portfolios"
) );

// Notification shortcode
vc_map( array(
	"name" => __("Notification", THB_THEME_NAME),
	"base" => "thb_notification",
	"icon" => "thb_vc_ico_notification",
	"class" => "thb_vc_sc_notification",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Type",
			"param_name" => "type",
			"value" => array(
				"Information" => "information",
				"Success" => "success",
				"Warning" => "warning",
				"Error" => "error"
			),
			"description" => ""
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => "Content",
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => ""
		)
	),
	"description" => "Display Notifications"
) );

// Office Locations Shortcode
vc_map( array(
	"name" => __("Office Locations", THB_THEME_NAME),
	"base" => "thb_location",
	"icon" => "thb_vc_ico_location",
	"class" => "thb_vc_sc_location",
	"category" => "by Fuel Themes",
	"as_parent" => array('only' => 'thb_location_single'),
	"show_settings_on_create" => true,
	"content_element" => true,
	"params" => array(
	  array(
	    "type" => "textfield",
	    "heading" => "Map Center Latitude",
	    "param_name" => "map_center_lat",
	    "description" => "Please enter the latitude for the maps center point. "
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Map Center Longtitude",
	    "param_name" => "map_center_long",
	    "description" => "Please enter the longtitude for the maps center point. "
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Map Zoom",
	    "param_name" => "map_zoom",
	    "description" => "Map zoom amount. An integer between 1 and 18"
	  ),
	),
	"js_view" => 'VcColumnView',
	"description" => "Display your office locations"
) );

vc_map( array(
  "name" => __("Office Location", THB_THEME_NAME),
  "base" => "thb_location_single",
  "icon" => "thb_vc_ico_location_single",
  "as_child" => array('only' => 'thb_location'),
  "content_element" => true,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => "Title",
      "param_name" => "title",
      "admin_label" => true,
      "description" => "The location title"
    ),
    array(
      "type" => "textarea_html",
      "heading" => "Location Address",
      "param_name" => "content",
      "description" => "The location address"
    ),
    array(
      "type" => "textfield",
      "heading" => "Location Latitude",
      "param_name" => "location_lat",
      "description" => "Please enter the latitude for the location point. "
    ),
    array(
      "type" => "textfield",
      "heading" => "Location Longtitude",
      "param_name" => "location_long",
      "description" => "Please enter the longtitude for the location point. "
    )
  ),
  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35'),
  "description" => "Display your office locations"
));

class WPBakeryShortCode_Thb_Location extends WPBakeryShortCodesContainer { }
class WPBakeryShortCode_Thb_Location_Single extends WPBakeryShortCode { }

// Products
vc_map( array(
	"name" => __("Products", THB_THEME_NAME),
	"base" => "thb_product",
	"icon" => "thb_vc_ico_product",
	"class" => "thb_vc_sc_product",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => "Product Sort",
	      "param_name" => "product_sort",
	      "value" => array(
	      	'Best Sellers' => "best-sellers",
	      	'Latest Products' => "latest-products",
	      	'Top Rated' => "top-rated",
	      	'Sale Products' => "sale-products",
	      	'By Category' => "by-category",
	      	'By Product ID' => "by-id",
	      	),
	      "description" => "Select the order of the products you'd like to show."
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => "Product Category",
	      "param_name" => "cat",
	      "value" => thb_productCategories(),
	      "description" => "Select the order of the products you'd like to show.",
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-category'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => "Product IDs",
	      "param_name" => "product_ids",
	      "description" => "Enter the products IDs you would like to display seperated by comma",
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-id'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => "Carousel",
	      "param_name" => "carousel",
	      "value" => array(
	      	'Yes' => "yes",
	      	'No' => "no",
	      	),
	      "description" => "Select yes to display the products in a carousel."
	  ),
	  array(
	      "type" => "textfield",
	      "class" => "",
	      "heading" => "Number of Items",
	      "param_name" => "item_count",
	      "value" => "4",
	      "description" => "The number of products to show.",
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-category', 'sale-products', 'top-rated', 'latest-products', 'best-sellers'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => "Columns",
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => array(
	      	'Four Columns' => "4",
	      	'Three Columns' => "3",
	      	'Two Columns' => "2"
	      ),
	      "description" => "Select the layout of the products."
	  ),
	),
	"description" => "Add WooCommerce products"
) );

// Product List
vc_map( array(
	"name" => __("Product List", THB_THEME_NAME),
	"base" => "thb_product_list",
	"icon" => "thb_vc_ico_product_list",
	"class" => "thb_vc_sc_product_list",
	"category" => "by Fuel Themes",
	"params"	=> array(
		array(
		    "type" => "textfield",
		    "class" => "",
		    "heading" => "Title",
		    "param_name" => "title",
		    "value" => "",
		    "admin_label" => true,
		    "description" => "Title of the widget"
		),
	  array(
	      "type" => "dropdown",
	      "heading" => "Product Sort",
	      "param_name" => "product_sort",
	      "value" => array(
	      	'Best Sellers' => "best-sellers",
	      	'Latest Products' => "latest-products",
	      	'Top Rated' => "top-rated",
	      	'Sale Products' => "sale-products",
	      	'By Product ID' => "by-id"
	      	),
	      "admin_label" => true,
	      "description" => "Select the order of the products you'd like to show."
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => "Product IDs",
	      "param_name" => "product_ids",
	      "description" => "Enter the products IDs you would like to display seperated by comma",
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-id'))
	  ),
	  array(
	      "type" => "textfield",
	      "class" => "",
	      "heading" => "Number of Items",
	      "param_name" => "item_count",
	      "value" => "4",
	      "description" => "The number of products to show.",
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-category', 'sale-products', 'top-rated', 'latest-products', 'best-sellers'))
	  )
	),
	"description" => "Add WooCommerce products in a list"
) );

// Product Categories
vc_map( array(
	"name" => __("Product Categories", THB_THEME_NAME),
	"base" => "thb_product_categories",
	"icon" => "thb_vc_ico_product_categories",
	"class" => "thb_vc_sc_product_categories",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "checkbox",
	      "heading" => "Product Category",
	      "param_name" => "cat",
	      "value" => thb_productCategories(),
	      "description" => "Select the categories you would like to display"
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => "Carousel",
	      "param_name" => "carousel",
	      "value" => array(
	      	'Yes' => "yes",
	      	'No' => "no",
	      	),
	      "description" => "Select yes to display the categories in a carousel."
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => "Columns",
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => array(
	      	'Four Columns' => "4",
	      	'Three Columns' => "3",
	      	'Two Columns' => "2"
	      ),
	      "description" => "Select the layout of the products."
	  ),
	),
	"description" => "Add WooCommerce product categories"
) );

// Portfolio
vc_map( array(
	"name" => __("Portfolios", THB_THEME_NAME),
	"base" => "thb_portfolio",
	"icon" => "thb_vc_ico_portfolio",
	"class" => "thb_vc_sc_portfolio",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => "Carousel",
	      "param_name" => "carousel",
	      "value" => array(
	      	'Yes' => "yes",
	      	'No' => "no",
	      	),
	      "description" => "Select yes to display the portfolios in a carousel."
	  ),
	  array(
	      "type" => "textfield",
	      "class" => "",
	      "heading" => "Number of portfolios",
	      "param_name" => "item_count",
	      "value" => "4",
	      "description" => "The number of portfolios to show."
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => "Columns",
	      "param_name" => "columns",
	      "value" => array(
	      	'Six Columns' => "6",
	      	'Five Columns' => "5",
	      	'Four Columns' => "4",
	      	'Three Columns' => "3",
	      	'Two Columns' => "2"
	      ),
	      "admin_label" => true,
	      "description" => "Select the layout of the portfolios."
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => "Categories",
	      "param_name" => "categories",
	      "value" => thb_portfolioCategories(),
	      "description" => "Select which categories of portfolios you would like to display."
	  ),
	  array(
	  	"type" => "checkbox",
	  	"class" => "",
	  	"heading" => "Enable Margin?",
	  	"param_name" => "margin",
	  	"value" => array(
	  		"" => "true"
	  	),
	  	"dependency" => array(
	  		"element" => "carousel",
	  		"value" => array('no')
	  	)
	  ),
	  array(
	  	"type" => "checkbox",
	  	"class" => "",
	  	"heading" => "Enable Grayscale?",
	  	"param_name" => "grayscale",
	  	"value" => array(
	  		"" => "true"
	  	)
	  ),
	  array(
	  	"type" => "checkbox",
	  	"class" => "",
	  	"heading" => "Always show Titles",
	  	"param_name" => "titles",
	  	"value" => array(
	  		"" => "true"
	  	)
	  )
	),
	"description" => "Display Portfolios in columns"
) );

// Posts
vc_map( array(
	"name" => __("Posts", THB_THEME_NAME),
	"base" => "thb_post",
	"icon" => "thb_vc_ico_post",
	"class" => "thb_vc_sc_post",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => "Carousel",
	      "param_name" => "carousel",
	      "value" => array(
	      	'Yes' => "yes",
	      	'No' => "no",
	      	),
	      "description" => "Select yes to display the products in a carousel."
	  ),
	  array(
	      "type" => "textfield",
	      "class" => "",
	      "heading" => "Number of posts",
	      "param_name" => "item_count",
	      "value" => "4",
	      "description" => "The number of posts to show."
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => "Columns",
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => array(
	      	'Four Columns' => "4",
	      	'Three Columns' => "3",
	      	'Two Columns' => "2"
	      ),
	      "description" => "Select the layout of the posts."
	  ),
	),
	"description" => "Display Posts from your blog"
) );

// Progress Bar Shortcode
vc_map( array(
	"name" => __("Progress Bar", THB_THEME_NAME),
	"base" => "thb_progressbar",
	"icon" => "thb_vc_ico_progressbar",
	"class" => "thb_vc_sc_progressbar",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
		    "type" => "dropdown",
		    "heading" => "Style",
		    "param_name" => "style",
		    "value" => array(
		    	'Light' => "light",
		    	'Dark' => "dark"
		    ),
		    "description" => "This changes the background color and tooltip color."
		),
		array(
		  "type" => "exploded_textarea",
		  "heading" => "Graphic values",
		  "param_name" => "values",
		  "description" => 'Input graph values here. Divide values with linebreaks (Enter). Example: 90|Development',
		  "value" => "90|Development,80|Design,70|Marketing"
		),
		array(
		  "type" => "dropdown",
		  "heading" => "Bar color",
		  "param_name" => "bgcolor",
		  "value" => array(
		  	"Light Grey" => "lightgrey",
		  	"Black" => "black",
		  	"Blue" => "blue",
		  	"Green" => "green",
		  	"Yellow" => "yellow",
		  	"Orange" => "orange",
		  	"Pink" => "pink",
		  	"Petrol Green" => "petrol",
		  	"Gray" => "gray"
		  ),
		  "description" => "Select bar background color."
		)
	),
	"description" => "Display progress bars in different colors"
) );


// Pricing Column shortcode
vc_map( array(
	"name" => __("Pricing Column", THB_THEME_NAME),
	"base" => "thb_pricingcolumn",
	"icon" => "thb_vc_ico_pricingcolumn",
	"class" => "thb_vc_sc_pricingcolumn",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Featured Column?",
			"param_name" => "featured",
			"value" => array(
				"" => "true"
			),
			"description" => "Check if you want to make this a featured column"
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Column Name",
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Currency",
			"param_name" => "currency",
			"value" => "",
			"description" => "$ .."
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Price",
			"param_name" => "price",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Per",
			"param_name" => "per",
			"value" => "",
			"description" => "Per month, annually, etc.."
		),
		array(
			"type" => "exploded_textarea",
			"class" => "",
			"heading" => "Features",
			"param_name" => "content",
			"value" => "",
			"description" => "Every new line will be treated as a list item"
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Add Button?",
			"param_name" => "use_btn",
			"value" => array(
				"" => "true"
			),
			"description" => "Check if you want to add a button."
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Button Caption",
			"param_name" => "btn_caption",
			"value" => "",
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Button Link URL",
			"param_name" => "btn_link",
			"value" => "",
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Open Button link in",
			"param_name" => "target_blank",
			"value" => array(
				"Same window" => "",
				"New window" => "true"
			),
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		)
	),
	"description" => "Show your packages in pricing columns"
) );

// Styled Header
vc_map( array(
	"name" => __("Styled Header", THB_THEME_NAME),
	"base" => "thb_header",
	"icon" => "thb_vc_ico_styled",
	"class" => "thb_vc_sc_styled",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
		    "type" => "dropdown",
		    "heading" => "Style",
		    "param_name" => "style",
		    "value" => array(
		    	'Style 1' => "style1",
		    	'Style 2' => "style2"
		    ),
		    "description" => "Style 1 uses icons, Style 2 adds a line below title."
		),
		array(
		  "type" => "textfield",
		  "heading" => "Title",
		  "param_name" => "title",
		  "admin_label" => true,
		  "description" => "Title of the header"
		),
		array(
		  "type" => "textfield",
		  "heading" => "Sub-Title",
		  "param_name" => "sub_title",
		  "description" => "Sub - Title of the header."
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Icon",
			"param_name" => "icon",
			"value" => thb_getIconArray(),
			"description" => "",
			"dependency" => Array('element' => "style", 'value' => array('style1'))
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Use image instead of icon?",
			"param_name" => "is_image",
			"value" => array(
				"" => "true"
			),
			"description" => "20px width is recommended (40px) for retina.",
			"dependency" => Array('element' => "style", 'value' => array('style1'))
		),
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Select Image",
			"param_name" => "image",
			"description" => "",
			"dependency" => Array('element' => "is_image", 'not_empty' => true)
		)
	),
	"description" => "Add a title with icons"
) );

// Team Member shortcode
vc_map( array(
	"name" => "Team Member",
	"base" => "thb_teammember",
	"icon" => "thb_vc_ico_teammember",
	"class" => "thb_vc_sc_teammember",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Select Team Member Image",
			"param_name" => "image",
			"description" => "Minimum size is 270x270 pixels"
		),
		array(
		  "type" => "textfield",
		  "heading" => "Name",
		  "param_name" => "name",
		  "admin_label" => true,
		  "description" => "Enter name of the team member"
		),
		array(
		  "type" => "textfield",
		  "heading" => "Position",
		  "param_name" => "position",
		  "description" => "Enter position/title of the team member"
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Advanced Style?",
			"param_name" => "advanced",
			"value" => array(
				"" => "true"
			),
			"description" => "Enable to display a short text and social icons"
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => "Short text",
			"param_name" => "text",
			"value" => "",
			"dependency" => array(
				"element" => "advanced",
				"not_empty" => true
			),
			"description" => "Text to display on hover"
		),
		array(
		  "type" => "textfield",
		  "heading" => "Facebook",
		  "param_name" => "facebook",
		  "dependency" => array(
		  	"element" => "advanced",
		  	"not_empty" => true
		  ),
		  "description" => "Enter Facebook Link"
		),
		array(
		  "type" => "textfield",
		  "heading" => "Twitter",
		  "param_name" => "twitter",
		  "dependency" => array(
		  	"element" => "advanced",
		  	"not_empty" => true
		  ),
		  "description" => "Enter Twitter Link"
		),
		array(
		  "type" => "textfield",
		  "heading" => "Pinterest",
		  "param_name" => "pinterest",
		  "dependency" => array(
		  	"element" => "advanced",
		  	"not_empty" => true
		  ),
		  "description" => "Enter Pinterest Link"
		),
		array(
		  "type" => "textfield",
		  "heading" => "Linkedin",
		  "param_name" => "linkedin",
		  "dependency" => array(
		  	"element" => "advanced",
		  	"not_empty" => true
		  ),
		  "description" => "Enter Linkedin Link"
		)
	),
	"description" => "Display your team members in a stylish way"
) );

// Testimonials Shortcode
vc_map( array(
	"name" => "Testimonials",
	"base" => "thb_testimonials",
	"icon" => "thb_vc_ico_testimonials",
	"class" => "thb_vc_sc_testimonials",
	"category" => "by Fuel Themes",
	"as_parent" => array('only' => 'thb_testimonial_single'),
	"show_settings_on_create" => true,
	"content_element" => true,
	"js_view" => 'VcColumnView',
	"params" => array(
		array(
		    "type" => "dropdown",
		    "heading" => "Style",
		    "param_name" => "style",
		    "value" => array(
		    	'Light' => "light",
		    	'Dark' => "dark"
		    ),
		    "description" => "This changes the colors depending on the background color."
		),
	),
	"description" => "Display testimonials from your clients"
) );

vc_map( array(
  "name" => "Testimonial",
  "base" => "thb_testimonial_single",
  "icon" => "thb_vc_ico_testimonial_single",
  "as_child" => array('only' => 'thb_testimonials'),
  "content_element" => true,
  "params" => array(
    array(
      "type" => "textarea_html",
      "heading" => "Quote",
      "param_name" => "content",
      "admin_label" => true,
      "description" => "The testimonial quote"
    ),
    array(
      "type" => "textfield",
      "heading" => "Author",
      "param_name" => "author",
      "description" => "The testimonial author"
    ),
    array(
      "type" => "textfield",
      "heading" => "Author Title",
      "param_name" => "title",
      "description" => "The testimonial author title"
    ),
    array(
    	"type" => "attach_image", //attach_images
    	"class" => "",
    	"heading" => "Author Image",
    	"param_name" => "image",
    	"description" => "Minimum size is 130x130 pixels"
    )
  ),
  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35'),
  "description" => "Display testimonials from your clients"
));

class WPBakeryShortCode_Thb_Testimonials extends WPBakeryShortCodesContainer { }
class WPBakeryShortCode_Thb_Testimonial_Single extends WPBakeryShortCode { }

// Thumbnail Gallery Shortcode
vc_map( array(
	"name" => "Thumbnail Gallery",
	"base" => "thb_thumbnail_gallery",
	"icon" => "thb_vc_ico_thumbnail_gallery",
	"class" => "thb_vc_sc_thumbnail_gallery",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_images", //attach_images
			"class" => "",
			"heading" => "Select Images",
			"param_name" => "images",
			"admin_label" => true,
			"description" => ""
		)
	),
	"description" => "Add a thumbnail carousel"
) );