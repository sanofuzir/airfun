<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', '_custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */


function _custom_meta_boxes() {

  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $post_meta_box_gallery = array(  
    'id'          => 'post_meta_gallery',
    'title'       => 'Gallery Type',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => 'How would you like to display your gallery?',
        'id'          => 'gallery-type',
        'type'        => 'radio',
        'desc'        => 'We suggest using 8 images for Thumbnail type.',
        'choices'     => array(
          array(
            'label'       => '1 Column',
            'value'       => '1'
          ),
          array(
            'label'       => '2 Columns',
            'value'       => '2'
          ),
          array(
            'label'       => '3 Columns',
            'value'       => '3'
          )
        ),
        'std'         => '1'
      )
    )
  );
  $post_meta_box_video = array(
    
    'id'          => 'post_meta_video',
    'title'       => 'Video Settings',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => 'Video URL',
        'id'          => 'post_video',
        'type'        => 'textarea-simple',
        'desc'        => 'Video URL. You can find a list of websites you can embed here: <a href="http://codex.wordpress.org/Embeds">Wordpress Embeds</a>',
        'std'         => '',
        'rows'        => '5'
      ),
      array(
        'label'       => 'Is this a Vimeo video?',
        'id'          => 'post_video_vimeo',
        'desc'        => 'This adjustes the widescreen height so that vimeo vidoes are displayed correctly.',
        'std'         => '',
        'type'        => 'checkbox',
        'choices'     => array( 
          array(
            'value'       => 'vimeo',
            'label'       => 'This is a Vimeo video. '
          )
        )
      )
    )
  );
  
  $post_meta_box_quote = array(
    'id'          => 'post_meta_quote',
    'title'       => 'Quote Settings',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => 'Quote',
        'id'          => 'post_quote',
        'type'        => 'textarea-simple',
        'desc'        => 'Quote Text. Works only if this is a quote post.',
        'std'         => '',
        'rows'        => '3'
      )
    )
  );
  
  $post_meta_box_link = array(
    'id'          => 'post_meta_link',
    'title'       => 'Link Settings',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => 'Link URL',
        'id'          => 'post_link_url',
        'type'        => 'text',
        'desc'        => 'Link URL. Works only if this is a link post.',
        'std'         => '',
        'rows'        => '1'
      )
    )
  );
  
  $post_meta_box_audio = array(
    'id'          => 'post_meta_audio',
    'title'       => 'Audio Settings',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => 'MP3 File URL',
        'id'          => 'post_audio_mp3',
        'type'        => 'upload',
        'desc'        => 'The URL to the .mp3 audio file',
        'std'         => '',
        'rows'        => '1'
      ),
      array(
        'label'       => 'Song title',
        'id'          => 'post_audio_title',
        'type'        => 'text',
        'desc'        => 'Title of the song to be displayed on the player',
        'std'         => '',
        'rows'        => '1'
      )
    )
  );
  
  $post_meta_box_sidebar_gallery = array(
    'id'        => 'meta_box_sidebar_gallery',
    'title'     => 'Gallery',
    'pages'     => array('post', 'portfolio'),
    'context'   => 'side',
    'priority'  => 'low',
    'fields'    => array(
      array(
        'id' => 'pp_gallery_slider',
        'type' => 'gallery',
        'desc' => '',
        'post_type' => 'post'
      )
     )
   );
   
  $page_metabox = array(
    'id'          => 'post_metaboxes_combined',
    'title'       => 'Page Settings',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'id'          => 'tab1',
        'label'       => 'Page Title',
        'type'        => 'tab'
      ),
      array(
        'label'       => 'Display Page Title Area',
        'id'          => 'display_pagetitle_area',
        'type'        => 'on_off',
        'desc'        => 'You can choose to display page title area',
        'std'         => 'on',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'PageTitle Style',
        'id'          => 'pagetitle_style',
        'type'        => 'radio',
        'desc'        => 'Which page title style would you like to use? <small>Overrides the global setting inside Theme Options</small>',
        'choices'     => array(
          array(
            'label'       => 'Style 1',
            'value'       => 'style1'
          ),
          array(
            'label'       => 'Style 2',
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'condition'   => 'display_pagetitle_area:is(on)'
      ),
      array(
        'label'       => 'Display Breadcrumbs',
        'id'          => 'pagetitle_breadcrumbs',
        'type'        => 'on_off',
        'desc'        => 'You can choose to display the breadcrumbs',
        'std'         => 'on',
        'condition'   => 'display_pagetitle_area:is(on)'
      ),
      array(
        'id'          => 'pagetitle_padding',
        'label'       => 'Page Title Padding',
        'desc'        => 'Page Title Padding value. <small>Overrides the global setting inside Theme Options</small>',
        'std'         => '',
        'type'        => 'measurement',
        'condition'   => 'display_pagetitle_area:is(on)'
      ),
      array(
        'label'       => 'Page Title Background',
        'id'          => 'pagetitle_background',
        'type'        => 'background',
        'desc'        => 'Background setting for the breadcrumb <small>Overrides the global setting inside Theme Options</small>',
        'condition'   => 'display_pagetitle_area:is(on)'
      ),
      array(
        'label'       => 'Sub Pages',
        'id'          => 'pagetitle_subpages',
        'type'        => 'list-item',
        'desc'        => 'You can add a submenu to your page title',
        'section'     => 'misc',
        'settings'    => array(
          array(
            'label'       => 'Link',
            'id'          => 'link',
            'type'        => 'text',
            'desc'        => 'Please write the url of the page'
          )
        ),
        'condition'   => 'display_pagetitle_area:is(on),pagetitle_style:is(style2)'
      ),
      array(
        'id'          => 'tab2',
        'label'       => 'Sidebar',
        'type'        => 'tab'
      ),
      array(
        'id'          => 'sidebar_set',
        'label'       => 'Sidebar',
        'type'        => 'sidebar_select',
        'desc'        => 'Select a sidebar to display inside the page. <small>Blog pages automatically display the Blog sidebar</small>'
      ),
      array(
        'label'       => 'Sidebar Position',
        'id'          => 'sidebar_position',
        'type'        => 'radio',
        'desc'        => 'Select where the sidebar should be positioned',
        'choices'     => array(
        	array(
        	  'label'       => 'Left',
        	  'value'       => 'left'
        	),
          array(
            'label'       => 'Right',
            'value'       => 'right'
          )
          
        ),
        'std'         => 'no',
        'condition'   => 'sidebar_set:not()'
      ),
      array(
        'id'          => 'tab3',
        'label'       => 'Portfolio Page',
        'type'        => 'tab'
      ),
      array(
        'label'       => 'Portfolio Columns',
        'id'          => 'portfolio_columns',
        'type'        => 'radio-image',
        'desc'        => 'If this is a portfolio page, you can change the number of columns here. <br><small>Only works if you select the Portfolio template</small>',
        'std'         => 'three'
      ),
      array(
        'label'       => 'Portfolio Categories',
        'id'          => 'portfolio_categories',
        'type'        => 'taxonomy-checkbox',
        'desc'        => 'If this is a portfolio page, which portfolio categories would you like to display?<small>Select at least one</small>',
        'taxonomy'    => 'project-category'
      ),
      array(
        'label'       => 'Portfolio Items per Page',
        'id'          => 'portfolio_pagecount',
        'type'        => 'text',
        'desc'        => 'If this is a paginated portfolio, how man items would you like to show per page? <small>Enter -1 for unlimited</small>',
        'rows'        => '1',
        'std'					=> '-1'
      ),
      array(
        'label'       => 'Portfolio margins',
        'id'          => 'portfolio_margin',
        'type'        => 'on_off',
        'desc'        => 'If you want, you can separate the portfolio items with margin.',
        'std'         => 'off'
      ),
      array(
        'label'       => 'Grayscale?',
        'id'          => 'grayscale',
        'type'        => 'on_off',
        'desc'        => 'If you want, you can make the images grayscale',
        'std'         => 'off'
      ),
      array(
        'label'       => 'Always Show Titles?',
        'id'          => 'titles',
        'type'        => 'on_off',
        'desc'        => 'If you want, you can always show the portfolio titles',
        'std'         => 'off'
      ),
      array(
        'id'          => 'tab4',
        'label'       => 'Revolution Slider',
        'type'        => 'tab'
      ),
      array(
        'label'       => 'Revolution Slider Alias',
        'id'          => 'rev_slider_alias',
        'type'        => 'revslider-select',
        'desc'        => 'If you would like to display Revolution Slider on top of this page, please enter the slider alias',
        'std'         => '',
        'rows'        => '1'
      ),
      array(
        'id'          => 'tab5',
        'label'       => 'Page Primary Menu',
        'type'        => 'tab'
      ),
      array(
        'label'       => 'Select Page Primary Menu',
        'id'          => 'page_menu',
        'type'        => 'menu_select',
        'desc'        => 'If you select a menu here, it will override the main navigation menu.'
      )
    )
  );


	$product_meta_box_settings = array(
	  'id'          => 'product_settings',
	  'title'       => 'Product Page Settings',
	  'pages'       => array( 'product' ),
	  'context'     => 'normal',
	  'priority'    => 'high',
	  'fields'      => array(
		  array(
		    'label'       => 'Related Posts',
		    'id'          => 'related_products',
		    'type'        => 'on_off',
		    'desc'        => 'You can disable related products from here',
		    'std'         => 'on'
		  ),
		  array(
		    'label'       => 'Enable Product Zoom',
		    'id'          => 'product_zoom',
		    'type'        => 'on_off',
		    'desc'        => 'You can enable product zoom here. Make sure your original images are at least 2x the size of the displayed image. <small>This will disable the lightbox feature</small>',
		    'std'         => 'off'
		  )
		)
	);

  $portfolio_meta_box = array(
    'id'          => 'portfolio_settings',
    'title'       => 'Portfolio Settings',
    'pages'       => array( 'portfolio' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
    	array(
    	  'id'          => 'portfolio_layout',
    	  'label'       => 'Portfolio Layout',
    	  'type'        => 'radio',
    	  'desc'        => 'You can select between different layouts for the portfolio item.',
    	  'choices'     => array(
    	    array(
    	      'label'       => 'Layout 1',
    	      'value'       => 'layout1'
    	    ),
    	    array(
    	      'label'       => 'Layout 2',
    	      'value'       => 'layout2'
    	    )
    	  ),
    	  'std'         => 'layout1'
    	),
    	array(
    	  'label'       => 'Header Background',
    	  'id'          => 'portfolio_header_background',
    	  'type'        => 'background',
    	  'desc'        => 'Background for the header.',
    	  'condition'   => 'portfolio_layout:is(layout2)'
    	),
    	array(
    	  'label'       => 'Portfolio Sub Text',
    	  'id'          => 'portfolio_subtext',
    	  'type'        => 'text',
    	  'desc'        => 'This is the subtext that is shown under the portfolio title.',
    	  'rows'        => '2',
    	  'std'					=> ''
    	),
      array(
        'label'       => 'Main Portfolio Page',
        'id'          => 'portfolio_main',
        'type'        => 'portfolio-select',
        'desc'        => 'Main Portfolio Page for this portfolio item. This is useful if you have multiple portfolios and have different child portfolio items.'
      ),
      array(
        'id'          => 'portfolio_type',
        'label'       => 'Portfolio Type',
        'type'        => 'radio',
        'desc'        => 'What type of portfolio item is this? Always upload an image and set it as the featured image even if its a video portfolio.',
        'choices'     => array(
          array(
            'label'       => 'Standard',
            'value'       => 'standard'
          ),
          array(
            'label'       => 'Image',
            'value'       => 'image'
          ),
          array(
            'label'       => 'Gallery',
            'value'       => 'gallery'
          ),
          array(
            'label'       => 'Video',
            'value'       => 'video'
          ),
          array(
            'label'       => 'Link',
            'value'       => 'link'
          )
        ),
        'std'         => 'standard'
      ),
      array(
        'label'       => 'Revolution Slider Alias',
        'id'          => 'rev_slider_alias',
        'type'        => 'revslider-select',
        'desc'        => 'If you would like, you can display a revolution slider rather than a slider.',
        'std'         => '',
        'rows'        => '1',
        'condition'   => 'portfolio_type:is(gallery)'
      ),
      array(
        'label'       => 'Video URL',
        'id'          => 'portfolio_video',
        'type'        => 'textarea-simple',
        'desc'        => 'Video URL. Works only if this is a video portfolio item.',
        'std'         => '',
        'rows'        => '1',
        'condition'   => 'portfolio_type:is(video)'
      ),
      array(
        'label'       => 'Is this a Vimeo video?',
        'id'          => 'portfolio_video_vimeo',
        'desc'        => 'This adjustes the widescreen height so that vimeo vidoes are displayed correctly.',
        'std'         => '',
        'type'        => 'checkbox',
        'condition'   => 'portfolio_type:is(video)',
        'choices'     => array( 
          array(
            'value'       => 'vimeo',
            'label'       => 'This is a Vimeo video. '
          )
        )
      ),
      array(
        'label'       => 'Link',
        'id'          => 'portfolio_link',
        'type'        => 'text',
        'desc'        => 'Link to the live project if this is a Link type portfolio',
        'rows'        => '1',
        'condition'   => 'portfolio_type:is(link)'
      ),
      array(
        'label'       => 'Portfolio Attributes',
        'id'          => 'portfolio_attributes',
        'type'        => 'list-item',
        'desc'        => 'Please add attributes for this portfolio. Ex: Client name, Client URL, etc.',
        'settings'    => array(
          array(
            'label'       => 'Value',
            'id'          => 'attribute_value',
            'type'        => 'text',
            'desc'        => 'Value of this attribute',
            'rows'        => '1'
          )
        )
      )
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
   
   
	ot_register_meta_box( $post_meta_box_video );
	ot_register_meta_box( $post_meta_box_gallery );
	ot_register_meta_box( $post_meta_box_quote );
	ot_register_meta_box( $post_meta_box_link );
	ot_register_meta_box( $post_meta_box_audio );
	ot_register_meta_box( $post_meta_box_sidebar_gallery);
	ot_register_meta_box( $page_metabox );
	ot_register_meta_box( $product_meta_box_settings);
  ot_register_meta_box( $portfolio_meta_box );
  
}