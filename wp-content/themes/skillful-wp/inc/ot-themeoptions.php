<?php
/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'sections'        => array(
      array(
        'title'       => 'General',
        'id'          => 'general'
      ),
      array(
        'title'       => 'Shop Settings',
        'id'          => 'shop'
      ),
      array(
        'title'       => 'Blog Settings',
        'id'          => 'blog'
      ),
      array(
        'title'       => 'Header Settings',
        'id'          => 'header'
      ),
      array(
        'title'       => 'Footer Settings',
        'id'          => 'footer'
      ),
      array(
        'title'       => 'Customization',
        'id'          => 'customization'
      ),
      array(
        'title'       => 'Contact Page Settings',
        'id'          => 'contact'
      ),
      array(
        'title'       => 'Misc',
        'id'          => 'misc'
      ),
      array(
        'title'       => 'Demo Content',
        'id'          => 'import'
      )
    ),
    'settings'        => array(
    	array(
    	  'id'          => 'general_tab1',
    	  'label'       => 'Main',
    	  'type'        => 'tab',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Boxed Layout',
    	  'id'          => 'boxed',
    	  'type'        => 'on_off',
    	  'desc'        => 'The content is contained and the body background is visible from the sides.',
    	  'std'         => 'off',
    	  'section'     => 'general'
    	),
    	array(
    		'label'       => 'Boxed Layout Drop Shadow',
    	  'id'          => 'overlay_opacity',
    	  'desc'        => 'Set the opacity of the Boxed Layout drop shadow. You must set a value between 0.0 and 1.0 <small>For example, 0.75</small>',
    	  'std'         => '0.80',
    	  'type'        => 'numeric-slider',
    	  'section'     => 'general',
    	  'std'					=> '0.40',
    	  'min_max_step'=> '0,1,0.05',
    	  'condition'   => 'boxed:is(on)'
    	),
    	array(
    	  'label'       => 'Mobile Menu Style',
    	  'id'          => 'mobile_menu_style',
    	  'type'        => 'radio',
    	  'desc'        => 'Which mobile menu style would you like to use?<small>Style 1 is sliding left menu, and style 2 is fullscreen</small>',
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
    	  'section'     => 'general'
    	),
      array(
        'id'          => 'general_tab2',
        'label'       => 'Social Sharing',
        'type'        => 'tab',
        'section'     => 'general'
      ),
      array(
        'label'       => 'Display sharing buttons',
        'id'          => 'sharing_buttons_content',
        'type'        => 'checkbox',
        'desc'        => 'You can choose to display the sharing buttons on different content',
        'choices'     => array(
          array(
            'label'       => 'Blog Posts',
            'value'       => 'blog'
          ),
          array(
            'label'       => 'Portfolio Posts',
            'value'       => 'portfolio'
          ),
          array(
            'label'       => 'Products',
            'value'       => 'products'
          )
        ),
        'section'     => 'general'
      ),
      array(
        'label'       => 'Sharing buttons',
        'id'          => 'sharing_buttons',
        'type'        => 'checkbox',
        'desc'        => 'You can choose which social networks to display',
        'choices'     => array(
          array(
            'label'       => 'Facebook',
            'value'       => 'facebook'
          ),
          array(
            'label'       => 'Twitter',
            'value'       => 'twitter'
          ),
          array(
            'label'       => 'Pinterest',
            'value'       => 'pinterest'
          ),
          array(
            'label'       => 'Linkedin',
            'value'       => 'linkedin'
          )
        ),
        'section'     => 'general'
      ),
      array(
        'id'          => 'header_tab1',
        'label'       => 'Header Settings',
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Header Style',
        'id'          => 'header_style',
        'type'        => 'radio',
        'desc'        => 'Which header style would you like to use? <small>This changes the text color and logo</small>',
        'choices'     => array(
          array(
            'label'       => 'Light Background',
            'value'       => 'style1'
          ),
          array(
            'label'       => 'Dark Background',
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Header in Grid',
        'id'          => 'header_grid',
        'type'        => 'on_off',
        'desc'        => 'If Off is selected, the header contents will be full width.',
        'std'         => 'on',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Header shopping cart',
        'id'          => 'header_cart',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display the shopping cart inside the header?',
        'section'     => 'header',
        'std'         => 'on'
      ),
      array(
        'id'          => 'header_tab5',
        'label'       => 'Fixed Header Settings',
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Fixed Header',
        'id'          => 'header_fixed',
        'type'        => 'on_off',
        'desc'        => 'You can enable/disable the fixed header functionality here.',
        'std'         => 'on',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Fixed Header Animation',
        'id'          => 'header_fixed_animation',
        'type'        => 'radio',
        'desc'        => 'Which animation would you like to use for the fixed header?',
        'choices'     => array(
          array(
            'label'       => 'Swing',
            'value'       => 'swing'
          ),
          array(
            'label'       => 'Bounce',
            'value'       => 'bounce'
          ),
          array(
            'label'       => 'Slide',
            'value'       => 'slide'
          )
        ),
        'std'         => 'swing',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Fixed Header Offset',
        'id'          => 'header_fixed_offset',
        'type'        => 'text',
        'desc'        => 'Number of pixels to scroll before the fixed header is shown. <small>Default is 400</small>',
        'std'         => '400',
        'section'     => 'header',
        'condition'   => 'header_fixed:is(on)'
      ),
      array(
        'id'          => 'header_tab2',
        'label'       => 'Sub Header Settings',
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Display Sub - Header',
        'id'          => 'subheader',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display the Sub-Header?',
        'std'         => 'on',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Sub-Header Text',
        'id'          => 'subheader_text',
        'type'        => 'textarea_simple',
        'desc'        => 'You can display your custom text on the sub-header',
        'section'     => 'header',
        'rows'				=> '2'
      ),
      array(
        'label'       => 'Header Search',
        'id'          => 'header_search',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display the search icon in the header?',
        'section'     => 'header',
        'std'         => 'on'
      ),
      array(
        'label'       => 'Header Language Switcher',
        'id'          => 'header_ls',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display the language switcher in the header? <small>Requires that you have WPML installed</small>',
        'section'     => 'header',
        'std'         => 'on'
      ),
      array(
        'label'       => 'Facebook Link',
        'id'          => 'fb_link',
        'type'        => 'text',
        'desc'        => 'Facebook profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Pinterest Link',
        'id'          => 'pinterest_link',
        'type'        => 'text',
        'desc'        => 'Pinterest profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Twitter Link',
        'id'          => 'twitter_link',
        'type'        => 'text',
        'desc'        => 'Twitter profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Linkedin Link',
        'id'          => 'linkedin_link',
        'type'        => 'text',
        'desc'        => 'Linkedin profile/page link',
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab3',
        'label'       => 'Logo Settings',
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Logo Position',
        'id'          => 'header_logo_position',
        'type'        => 'radio',
        'desc'        => 'Where would you like to display the logo?',
        'choices'     => array(
          array(
            'label'       => 'Left',
            'value'       => 'left'
          ),
          array(
            'label'       => 'Center',
            'value'       => 'center'
          ),
          array(
            'label'       => 'Right',
            'value'       => 'right'
          )
        ),
        'std'         => 'left',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Logo Upload <small>on light backgrounds</small>',
        'id'          => 'logo',
        'type'        => 'upload',
        'desc'        => 'You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double size image.</strong> The image should be maximum 100 pixels in height.',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Logo Dark Upload <small>on dark backgrounds</small>',
        'id'          => 'logo_dark',
        'type'        => 'upload',
        'desc'        => 'You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double size image.</strong> The image should be maximum 100 pixels in height.',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Sticky Menu Logo Upload',
        'id'          => 'logo_mobile',
        'type'        => 'upload',
        'desc'        => 'You can upload your own mobile logo here.  The image should be maximum 80 pixels in height. <small>Smaller version of your logo for mobile screens</small>',
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab4',
        'label'       => 'Global Page Title Settings',
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'id'          => 'pagetitle_text',
        'label'       => 'About Page Title Settings',
        'desc'        => 'These settings applies to all breadcrumbs/page titles used throughout the theme. You can override them on individual pages.',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Page Title Style',
        'id'          => 'pagetitle_style',
        'type'        => 'radio',
        'desc'        => 'Which page title style would you like to use? <small>Style 1 is simple, whereas Style 1 uses image background</small>',
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
        'section'     => 'header'
      ),
      array(
        'id'          => 'pagetitle_padding',
        'label'       => 'Page Title Padding',
        'desc'        => 'Page Title Padding value. Default is 35px for style1, and 65px for style2.',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Page Title Background',
        'id'          => 'pagetitle_background',
        'type'        => 'background',
        'desc'        => 'Background setting for the breadcrumb',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Catalog Mode',
        'id'          => 'shop_catalog_mode',
        'type'        => 'on_off',
        'desc'        => 'If enabled, this will hide add to cart buttons and prices along the site.',
        'section'     => 'shop',
        'std'         => 'off'
      ),
      array(
        'label'       => 'Shop Header',
        'id'          => 'shop_header',
        'type'        => 'textarea',
        'desc'        => 'This content appears on top of the shop page. You can use your shortcodes here. <small>You can create your content using visual composer and then copy its text here</small>',
        'rows'        => '4',
        'section'     => 'shop'
      ),
      array(
        'label'       => 'Shop Sidebar',
        'id'          => 'shop_sidebar',
        'type'        => 'radio',
        'desc'        => 'Would you like to display sidebar on shop main and category pages?',
        'choices'     => array(
          array(
            'label'       => 'No Sidebar',
            'value'       => 'no'
          ),
          array(
            'label'       => 'Right Sidebar',
            'value'       => 'right'
          ),
          array(
            'label'       => 'Left Sidebar',
            'value'       => 'left'
          )
        ),
        'std'         => 'no',
        'section'     => 'shop'
      ),
      array(
        'label'       => 'Products per Page',
        'id'          => 'shop_product_count',
        'type'        => 'text',
        'desc'        => 'Number of products to show on shop pages.',
        'std'         => '12',
        'section'     => 'shop'
      ),
      array(
        'label'       => 'Prices inside Variation dropdowns',
        'id'          => 'variation_dropdown_prices',
        'type'        => 'on_off',
        'desc'        => 'If selected, this will display variation prices inside the dropdowns.',
        'section'     => 'shop',
        'std'         => 'off'
      ),
      array(
        'label'       => 'Disable dropdowns on "Out-of-Stock" variable products?',
        'id'          => 'variation_dropdown_soldout',
        'type'        => 'on_off',
        'desc'        => 'If selected, this will disable the dropdowns on out-of-stock variable products.',
        'section'     => 'shop',
        'std'         => 'off'
      ),
      array(
        'id'          => 'blog_tab1',
        'label'       => 'Main',
        'type'        => 'tab',
        'section'     => 'blog'
      ),
      array(
        'label'       => 'Full Width Post Pages',
        'id'          => 'blog_fullwidth_posts',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display full-width post detail pages?',
        'section'     => 'blog',
        'std'         => 'off'
      ),
      array(
        'label'       => 'Post Sidebar Position',
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
        'section'     => 'blog',
        'std'         => 'right',
        'condition'   => 'blog_fullwidth_posts:is(off)'
      ),
      array(
        'id'          => 'blog_tab2',
        'label'       => 'Blog Meta Settings',
        'type'        => 'tab',
        'section'     => 'blog'
      ),
      array(
        'label'       => 'Display post information for',
        'id'          => 'blog_post_meta',
        'type'        => 'checkbox',
        'desc'        => 'You can choose to display the sharing buttons on different content',
        'choices'     => array(
          array(
            'label'       => 'Post Date',
            'value'       => 'date'
          ),
          array(
            'label'       => 'Post Author',
            'value'       => 'author'
          ),
          array(
            'label'       => 'Post Category',
            'value'       => 'category'
          ),
          array(
            'label'       => 'Post Comment Count',
            'value'       => 'comment'
          ),
        ),
        'section'     => 'blog'
      ),
      array(
        'id'          => 'misc_tab1',
        'label'       => 'General',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Like System',
        'id'          => 'like_system',
        'type'        => 'on_off',
        'desc'        => 'Do you want to the like functionality for posts & portfolios?',
        'section'     => 'misc',
        'std'         => 'on'
      ),
      array(
        'label'       => 'Login Logo Upload',
        'id'          => 'loginlogo',
        'type'        => 'upload',
        'desc'        => 'You can upload a custom logo for your wp-admin login page here',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Copyright Text',
        'id'          => 'copyright',
        'type'        => 'text',
        'desc'        => 'Copyright Text at the bottom left',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Favicon Upload',
        'id'          => 'favicon',
        'type'        => 'upload',
        'desc'        => 'You can upload your own favicon here.',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Extra CSS',
        'id'          => 'extra_css',
        'type'        => 'css',
        'desc'        => 'Any CSS that you would like to add to the theme',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Google Analytics',
        'id'          => 'ga',
        'type'        => 'textarea-simple',
        'desc'        => 'Google analytics field. Your GA code will be entered at the bottom of the theme',
        'rows'        => '5',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab2',
        'label'       => 'Twitter OAuth',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'twitter_text',
        'label'       => 'About the Twitter Settings',
        'desc'        => 'You should fill out these settings if you want to use the Twitter Widget inside Apperance -> Widgets',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Twitter Username',
        'id'          => 'twitter_bar_username',
        'type'        => 'text',
        'desc'        => 'Username to pull tweets for',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Consumer Key',
        'id'          => 'twitter_bar_consumerkey',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Consumer Secret',
        'id'          => 'twitter_bar_consumersecret',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Access Token',
        'id'          => 'twitter_bar_accesstoken',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Access Token Secret',
        'id'          => 'twitter_bar_accesstokensecret',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab3',
        'label'       => 'Create Additional Sidebars',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'sidebars_text',
        'label'       => 'About the sidebars',
        'desc'        => 'All sidebars that you create here will appear both in the Widgets Page(Appearance > Widgets), from where you will have to configure them, and in the pages, where you will be able to choose a sidebar for each page',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Create Sidebars',
        'id'          => 'sidebars',
        'type'        => 'list-item',
        'desc'        => 'Please choose a unique title for each sidebar!',
        'section'     => 'misc',
        'settings'    => array(
          array(
            'label'       => 'ID',
            'id'          => 'id',
            'type'        => 'text',
            'desc'        => 'Please write a lowercase id, with <strong>no spaces</strong>'
          )
        )
      ),
      array(
        'id'          => 'misc_tab4',
        'label'       => 'Handheld Device Icons',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => '60x60 px (old iPhone)',
        'id'          => 'handheld_old_iphone',
        'type'        => 'upload',
        'desc'        => '',
        'section'     => 'misc'
      ),
      array(
        'label'       => '76x76 px (old iPad)',
        'id'          => 'handheld_old_ipad',
        'type'        => 'upload',
        'desc'        => '',
        'section'     => 'misc'
      ),
      array(
        'label'       => '120x120 px (retina iPhone)',
        'id'          => 'handheld_retina_iphone',
        'type'        => 'upload',
        'desc'        => '',
        'section'     => 'misc'
      ),
      array(
        'label'       => '152x152 px (retina iPhad)',
        'id'          => 'handheld_retina_ipad',
        'type'        => 'upload',
        'desc'        => '',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'demo_import',
        'label'       => 'About Importing Demo Content',
        'desc'        => '<div class="format-setting-label"><h3 class="label">About Importing Demo Content</h3></div><p>Depending on your server connection, it might take a while to import all the data and images. Please make sure that:</p>
        <ul>
         <li>- WooCommerce and other necessary plugins installed & activated before pressing the button.</li>
         <li>- You have setup the theme using the instructions in documentation</li>
         <li>- WooCommerce image sizes are set</li>
        </ul>
        <p><strong style="text-transform: uppercase;">Page will refresh after importing is done, so please wait</strong></p><p>This will not import Revolution Sliders. You can import them seperately</p><br><br><a class="button button-primary" id="import-demo-content" href="#">Import Demo Content</a>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'import'
      ),
      array(
        'id'          => 'customization_tab1',
        'label'       => 'Colors',
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Accent Color',
        'id'          => 'accent_color',
        'type'        => 'colorpicker',
        'desc'        => 'Change the accent color used throughout the theme',
        'section'     => 'customization',
        'std'					=> ''
      ),
      array(
        'label'       => 'Overlay Color',
        'id'          => 'overlay_color',
        'type'        => 'colorpicker',
        'desc'        => 'This changes the overlay color that you see when you hover over the images.',
        'section'     => 'customization'
      ),
      array(
      	'label'       => 'Overlay Opacity',
        'id'          => 'overlay_opacity',
        'desc'        => 'Opacity of the overlay color. You must set a value between 0.0 and 1.0 <small>For example, 0.75</small>',
        'std'         => '0.80',
        'type'        => 'numeric-slider',
        'section'     => 'customization',
        'std'					=> '0.80',
        'min_max_step'=> '0,1,0.05'
      ),
      array(
        'id'          => 'customization_tab2',
        'label'       => 'Typography',
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Title Typography',
        'id'          => 'title_type',
        'type'        => 'typography',
        'desc'        => 'Font Settings for the titles',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Body Text Typography',
        'id'          => 'body_type',
        'type'        => 'typography',
        'desc'        => 'Font Settings for general body font',
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab3',
        'label'       => 'Backgrounds',
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Sub-Header Background',
        'id'          => 'subheader_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the sub-header.',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Header - Light Background',
        'id'          => 'header_style1_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the Style 1 header.',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Header - Dark Background',
        'id'          => 'header_style2_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the Style 2 header.',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Footer Background',
        'id'          => 'footer_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the footer.',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Display Footer',
        'id'          => 'footer',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display the Footer?',
        'std'         => 'on',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Footer Columns',
        'id'          => 'footer_columns',
        'type'        => 'radio-image',
        'desc'        => 'You can change the layout of footer columns here',
        'std'         => 'fourcolumns',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Footer Style',
        'id'          => 'footer_style',
        'type'        => 'radio',
        'desc'        => 'Which footer style would you like to use?',
        'choices'     => array(
          array(
            'label'       => 'Regular',
            'value'       => 'style1'
          ),
          array(
            'label'       => 'Unfold',
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Footer in Grid',
        'id'          => 'footer_grid',
        'type'        => 'on_off',
        'desc'        => 'If Off is selected, the footer contents will be full width.',
        'std'         => 'on',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Site-wide Call to Action button?',
        'id'          => 'sitewide_cta',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display a site-wide call to action button above footer?',
        'section'     => 'footer',
        'std'         => 'on'
      ),
      array(
        'label'       => 'Call to Action Text',
        'id'          => 'sitewide_cta_text',
        'type'        => 'text',
        'desc'        => 'Text to dipsplay inside the CTA button',
        'std'					=> 'Go and get grab your copy now!',
        'section'     => 'footer',
        'condition'   => 'sitewide_cta:is(on)'
      ),
      array(
        'label'       => 'Call to Action URL',
        'id'          => 'sitewide_cta_url',
        'type'        => 'text',
        'desc'        => 'URL to link to from CTA button',
        'std'					=> 'http://themeforest.net/?ref=fuelthemes',
        'section'     => 'footer',
        'condition'   => 'sitewide_cta:is(on)'
      ),
      array(
        'id'          => 'twitter_text',
        'label'       => 'About Contact Page Settings',
        'desc'        => 'These settings will be used for the map inside Contact page template.',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'contact'
      ),
		  array(
		  	'label'       => 'Map Zoom Amount',
		    'id'          => 'contact_zoom',
		    'desc'        => 'Value should be between 1-18, 1 being the entire earth and 18 being right at street level.',
		    'std'         => '17',
		    'type'        => 'numeric-slider',
		    'section'     => 'contact',
		    'min_max_step'=> '1,18,1'
		  ),
		  array(
		    'label'       => 'Map Pin Image',
		    'id'          => 'map_pin_image',
		    'type'        => 'upload',
		    'desc'        => 'If you would like to use your own pin, you can upload it here',
		    'section'     => 'contact'
		  ),
		  array(
		    'label'       => 'Map Center Latitude',
		    'id'          => 'map_center_lat',
		    'type'        => 'text',
		    'desc'        => 'Please enter the latitude for the maps center point. <small>You can get lat-long coordinates using <a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Latlong.net</a></small>',
		    'section'     => 'contact'
		  ),
		  array(
		    'label'       => 'Map Center Longtitude',
		    'id'          => 'map_center_long',
		    'type'        => 'text',
		    'desc'        => 'Please enter the longitude for the maps center point.',
		    'section'     => 'contact'
		  ),
		  array(
		    'label'       => 'Google Map Pin Locations',
		    'id'          => 'map_locations',
		    'type'        => 'list-item',
		    'desc'        => 'Coordinates to shop on the map',
		    'settings'    => array(
		      array(
		        'label'       => 'Coordinates',
		        'id'          => 'lat_long',
		        'type'        => 'text',
		        'desc'        => 'Coordinates of this location separated by comma. <small>You can get lat-long coordinates using <a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Latlong.net</a></small>',
		        'rows'        => '1'
		      )
		    ),
		    'section'     => 'contact'
		  )
    )
  );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
  /**
   * Portfolio Select option type.
   *
   * See @ot_display_by_type to see the full list of available arguments.
   *
   * @param     array     An array of arguments.
   * @return    string
   *
   * @access    public
   * @since     2.0
   */
  if ( ! function_exists( 'ot_type_portfolio_select' ) ) {
    
    function ot_type_portfolio_select( $args = array() ) {
  
      /* turns arguments array into variables */
      extract( $args );
      
      /* verify a description */
      $has_desc = $field_desc ? true : false;
      
      /* format setting outer wrapper */
      echo '<div class="format-setting type-page-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
        
        /* description */
        echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
        
        /* format setting inner wrapper */
        echo '<div class="format-setting-inner">';
        
          /* build page select */
          echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . $field_class . '">';
          
          /* query pages array */
          $query = new WP_Query( array( 'meta_query' => array(
                  array(
                      'key' => '_wp_page_template',
                      'value' => array('template-portfolio.php', 'template-portfolio-shapes.php', 'template-portfolio-paginated.php'),
                      'compare' => 'IN'
                  ),
              ), 'post_type' => array( 'page' ), 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ) );
          
          /* has pages */
          if ( $query->have_posts() ) {
            echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
            while ( $query->have_posts() ) {
              $query->the_post();
              echo '<option value="' . esc_attr( get_the_ID() ) . '"' . selected( $field_value, get_the_ID(), false ) . '>' . esc_attr( get_the_title() ) . '</option>';
            }
          } else {
            echo '<option value="">' . __( 'No Pages Found', 'option-tree' ) . '</option>';
          }
          echo '</select>';
          
        echo '</div>';
  
      echo '</div>';
      
    }
    
  }
  
  // Add Revolution Slider select option
  function add_revslider_select_type( $array ) {

    $array['revslider-select'] = 'Revolution Slider Select';
    return $array;

  }
  add_filter( 'ot_option_types_array', 'add_revslider_select_type' ); 

  // Show RevolutionSlider select option
  function ot_type_revslider_select( $args = array() ) {
    extract( $args );
    $has_desc = $field_desc ? true : false;
    echo '<div class="format-setting type-revslider-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
    echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
      echo '<div class="format-setting-inner">';
      // Add This only if RevSlider is Activated
      if ( class_exists( 'RevSliderAdmin' ) ) {
        echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . $field_class . '">';

        /* get revolution array */
        $slider = new RevSlider();
        $arrSliders = $slider->getArrSlidersShort();

        /* has slides */
        if ( ! empty( $arrSliders ) ) {
          echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
          foreach ( $arrSliders as $rev_id => $rev_slider ) {
            echo '<option value="' . esc_attr( $rev_id ) . '"' . selected( $field_value, $rev_id, false ) . '>' . esc_attr( $rev_slider ) . '</option>';
          }
        } else {
          echo '<option value="">' . __( 'No Sliders Found', 'option-tree' ) . '</option>';
        }
        echo '</select>';
      } else {
          echo '<span style="color: red;">' . __( 'Sorry! Revolution Slider is not Installed or Activated', 'ventus' ). '</span>';
      }
      echo '</div>';
    echo '</div>';
  }
}

/**
 * Menu Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_menu_select' ) ) {
  
  function ot_type_menu_select( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;
    
    /* format setting outer wrapper */
    echo '<div class="format-setting type-category-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
      
      /* description */
      echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
      
      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';
      
        /* build category */
        echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . $field_class . '">';
        
        /* get category array */
        $menus = get_terms( 'nav_menu');
        
        /* has cats */
        if ( ! empty( $menus ) ) {
          echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
          foreach ( $menus as $menu ) {
            echo '<option value="' . esc_attr( $menu->slug ) . '"' . selected( $field_value, $menu->slug, false ) . '>' . esc_attr( $menu->name ) . '</option>';
          }
        } else {
          echo '<option value="">' . __( 'No Menus Found', 'option-tree' ) . '</option>';
        }
        
        echo '</select>';
      
      echo '</div>';
    
    echo '</div>';
    
  }
  
}