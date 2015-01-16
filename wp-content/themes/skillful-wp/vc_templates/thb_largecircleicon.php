<?php function thb_largecircleicons($atts, $content = null) {
    $args = array(
        "icon"                              => "",
        "link"                              => "",
        "target"                            => "",
        "icon_color"                        => "",
        "icon_margin"												=> "",
        "icon_hover_color"                  => "",
        "background_color"                  => "",
        "background_hover_color"            => "",
        "background_color_transparency"     => "",
        "border_width"                      => "",
        "border_color"                      => "",
        "border_hover_color"                => ""
    );

    extract(shortcode_atts($args, $atts));

    $html               = "";
    $thb_holder_styles  = "";
    $icon_styles        = "";
    $data_attr          = "";

    $background_color = $background_color != "" ? $background_color : "#e3e3e3";

    if(!empty($background_color_transparency) && ($background_color_transparency >= 0 && $background_color_transparency <= 1)) {
        $rgb = thb_hex2rgb($background_color);

        $background_color = 'rgba('.$rgb.', '.$background_color_transparency.')';
    }

    $thb_holder_styles .= "background-color: {$background_color};";


    if($border_color != "") {
        $thb_holder_styles .= "border-color: ".$border_color.";";
    }

    if($border_width != "") {
        $thb_holder_styles .= "border-width: ".$border_width."px;";
    }

    if($icon_color != ""){
        $icon_styles .= "color: ".$icon_color.";";
    }
		
		if($icon_margin != "") {
		    $icon_styles .= "margin: ".$icon_margin;
		}
		
    if($background_hover_color != "") {
        $data_attr .= "data-hover-background-color=".$background_hover_color." ";
    }

    if($border_hover_color != "") {
        $data_attr .= "data-hover-border-color=".$border_hover_color." ";
    }

    if($icon_hover_color != "") {
        $data_attr .= "data-hover-color=".$icon_hover_color;
    }

    $html .= '<figure class="thb_largecircleicons" '.$data_attr.'>';

    if($link != ""){
        $html .= "<a href='".$link."' target='".$target."'>";
    }

    $html .= "<span style='".$thb_holder_styles."'>";
    $html .= "<i class='".$icon."' style='".$icon_styles."'></i>";
    $html .= "</span>";

    if($link != ""){
        $html .= "</a>";
    }

    $html .= "</figure>";
    return $html;
}
add_shortcode('thb_largecircleicons', 'thb_largecircleicons');
