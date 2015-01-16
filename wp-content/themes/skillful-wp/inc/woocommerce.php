<?php
add_theme_support( 'woocommerce' );

/* Header Cart */
function thb_quick_cart() {
 if(class_exists('woocommerce')) {
 ?>
	<div id="quick_cart">
		<a id="mycartbtn" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart',THB_THEME_NAME); ?>">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 width="40px" height="45px" viewBox="0 0 40 45" enable-background="new 0 0 40 45" xml:space="preserve">
			<g>
				<g>
					<g>
						<path class="path" d="M14.498,12.056c0-2.979,2.469-5.403,5.503-5.403s5.503,2.424,5.503,5.403v0.527h2.197v-0.527
							c0-4.169-3.454-7.561-7.7-7.561s-7.7,3.391-7.7,7.561v0.527h2.197V12.056z M31.165,14.785H8.836
							c-1.009,0-1.831,0.807-1.831,1.798v22.124c0,0.991,0.822,1.798,1.831,1.798h22.328c1.009,0,1.83-0.807,1.83-1.798V16.583
							C32.995,15.591,32.173,14.785,31.165,14.785z M31.267,38.786H8.734V16.5h22.533V38.786z"/>
					</g>
				</g>
			</g>
			</svg>
			<span class="float_count"><?php echo WC()->cart->cart_contents_count; ?></span>
		</a>
			<div class="cart_holder">
				<ul class="cart_details">
				<?php if (sizeof(WC()->cart->cart_contents)>0) : foreach (WC()->cart->cart_contents as $cart_item_key => $cart_item) :
				    $_product = $cart_item['data'];                                            
				    if ($_product->exists() && $cart_item['quantity']>0) :?>
					<li>
						<figure>
							<?php   echo '<a class="cart_list_product_img" href="'.get_permalink($cart_item['product_id']).'">' . $_product->get_image().'</a>'; ?>
						</figure>
						
						<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">×</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __('Remove this item',THB_THEME_NAME) ), $cart_item_key ); ?>
						
						<div class="list_content">
							<?php 
							 $product_title = $_product->get_title();
						       echo '<h5><a href="'.get_permalink($cart_item['product_id']).'">' . apply_filters('woocommerce_cart_widget_product_title', $product_title, $_product) . '</a></h5>';
						       echo '<div class="quantity">'.$cart_item['quantity'].'</div><span class="cross">×</span>';
						       echo '<div class="price">'.woocommerce_price($_product->get_price()).'</div>';
							?>
						</div>
					</li>
				<?php endif; endforeach; ?>
					<div class="subtotal">                                        
					    <?php _e('subtotal', THB_THEME_NAME); ?><span><?php echo WC()->cart->get_cart_total(); ?></span>                                   
					</div>
					
					<a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="btn small outline"><?php _e('View Shopping Bag', THB_THEME_NAME); ?></a>   
					
					<a href="<?php echo esc_url( WC()->cart->get_checkout_url() ); ?>" class="btn small"><span class="icon"><i class="icon-budicon-423"></i></span><?php _e('Checkout', THB_THEME_NAME); ?></a>
					
				<?php else: echo '<p class="empty">'.__('You have no products in your shopping bag.','woocommerce').'</p>'; endif; ?>
			</ul>
			</div>
	</div>
<?php }
}
add_action( 'thb_quick_cart', 'thb_quick_cart',3 );


/* WOOCOMMERCE CART LINK */	
function thb_woocomerce_ajax_cart_update($fragments) {
	if(class_exists('woocommerce')) {
		
		ob_start();
		?>
		<div id="quick_cart">
			<a id="mycartbtn" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart',THB_THEME_NAME); ?>">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="40px" height="45px" viewBox="0 0 40 45" enable-background="new 0 0 40 45" xml:space="preserve">
				<g>
					<g>
						<g>
							<path class="path" d="M14.498,12.056c0-2.979,2.469-5.403,5.503-5.403s5.503,2.424,5.503,5.403v0.527h2.197v-0.527
								c0-4.169-3.454-7.561-7.7-7.561s-7.7,3.391-7.7,7.561v0.527h2.197V12.056z M31.165,14.785H8.836
								c-1.009,0-1.831,0.807-1.831,1.798v22.124c0,0.991,0.822,1.798,1.831,1.798h22.328c1.009,0,1.83-0.807,1.83-1.798V16.583
								C32.995,15.591,32.173,14.785,31.165,14.785z M31.267,38.786H8.734V16.5h22.533V38.786z"/>
						</g>
					</g>
				</g>
				</svg>
				<span class="float_count"><?php echo WC()->cart->cart_contents_count; ?></span>
			</a>
				<div class="cart_holder">
					<ul class="cart_details">
					<?php if (sizeof(WC()->cart->cart_contents)>0) : foreach (WC()->cart->cart_contents as $cart_item_key => $cart_item) :
					    $_product = $cart_item['data'];                                            
					    if ($_product->exists() && $cart_item['quantity']>0) :?>
						<li>
							<figure>
								<?php   echo '<a class="cart_list_product_img" href="'.get_permalink($cart_item['product_id']).'">' . $_product->get_image().'</a>'; ?>
							</figure>
							
							<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">×</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __('Remove this item',THB_THEME_NAME) ), $cart_item_key ); ?>
							
							<div class="list_content">
								<?php 
								 $product_title = $_product->get_title();
							       echo '<h5><a href="'.get_permalink($cart_item['product_id']).'">' . apply_filters('woocommerce_cart_widget_product_title', $product_title, $_product) . '</a></h5>';
							       echo '<div class="quantity">'.$cart_item['quantity'].'</div><span class="cross">×</span>';
							       echo '<div class="price">'.woocommerce_price($_product->get_price()).'</div>';
								?>
							</div>
						</li>
					<?php endif; endforeach; ?>
						<div class="subtotal">                                        
						    <?php _e('subtotal', THB_THEME_NAME); ?><span><?php echo WC()->cart->get_cart_total(); ?></span>                                   
						</div>
						
						<a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="btn small outline"><?php _e('View Shopping Bag', THB_THEME_NAME); ?></a>   
						
						<a href="<?php echo esc_url( WC()->cart->get_checkout_url() ); ?>" class="btn small"><span class="icon"><i class="icon-budicon-423"></i></span><?php _e('Checkout', THB_THEME_NAME); ?></a>
						
					<?php else: echo '<p class="empty">'.__('You have no products in your shopping bag.','woocommerce').'</p>'; endif; ?>
				</ul>
				</div>
		</div>
		<script type="text/javascript">// <![CDATA[
		jQuery(function($){
			window.favicon.badge(<?php echo WC()->cart->cart_contents_count; ?>);
		});// ]]>
		</script>
		<?php	
		$fragments['#quick_cart'] = ob_get_clean();
		return $fragments;
	}
}
add_filter('add_to_cart_fragments', 'thb_woocomerce_ajax_cart_update');


/* The Quickview Ajax Output */
function quickview() {
	global $post, $product;
	$id =  $_POST["id"];
	$post = get_post($id);
	$product = get_product($id);

	ob_start();
	
	woocommerce_get_template( 'content-single-product-lightbox.php');
	
	$output = ob_get_contents();
	ob_end_clean();
	echo $output;
	die();
}
add_action('wp_ajax_quickview', 'quickview');
add_action('wp_ajax_nopriv_quickview', 'quickview');

/* Image Dimensions */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'thb_woocommerce_image_dimensions', 1 );

function thb_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '270',	// px
		'height'	=> '370',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '570',	// px
		'height'	=> '700',	// px
		'crop'		=> 1 		// true
	);

	$thumbnail = array(
		'width' 	=> '90',	// px
		'height'	=> '90',	// px
		'crop'		=> 1 		// false
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

/* Products per Page */
function thb_ppp_setup() {
	
	if( isset( $_GET['show_products']) ){ 
		$getproducts = $_GET['show_products'];
		if ($getproducts == "all") {
	    	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return -1;' ) );
	    } else {
	    	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$getproducts.';' ) );
	    }
	} else {
	    $products_per_page = ot_get_option('shop_product_count', 12);
	    add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . $products_per_page . ';' ), 20 );
	}
}
add_action( 'after_setup_theme', 'thb_ppp_setup' );

/* Product Page - Move Tabs/Accordion next to image */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 30 );

/* Product Page - Remove breadcrumbs */
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

/* Product Page - Remove Sale Flash */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' , 10);

/* Product Page - Remove Tabs */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs' , 10);

/* Product Page - Move Related Product to bottom */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 60 );

/* Product Page - Move Upsells */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display', 70 );

/* Product Page - Catalog Mode */
function thb_catalog_setup() {
	$catalog_mode = ot_get_option('shop_catalog_mode', 'off');
	if ($catalog_mode == 'on') { 
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	}
}
add_action( 'after_setup_theme', 'thb_catalog_setup' );

/* Custom Metabox for Category Pages */
if(function_exists('get_term_meta')){
	function thb_taxonomy_meta_field($term) {
	
		$t_id = $term->term_id;
		$term_meta = get_term_meta($t_id,'cat_meta');
		if(!$term_meta){$term_meta = add_term_meta($t_id, 'cat_meta', '');}
		 ?>
		<tr>
		<th scope="row" valign="top"><label for="term_meta[cat_header]"><?php _e( 'Category Header', THB_THEME_NAME ); ?></label></th>
			<td>				
					<?php 
					$content = esc_attr( $term_meta[0]['cat_header'] ) ? esc_attr( $term_meta[0]['cat_header'] ) : '';
					
					wp_editor( 
					  $content, 
					  "term_meta[cat_header]", 
					  array(
					    'wpautop'       => true,
					    'media_buttons' => true,
					    'textarea_name' => "term_meta[cat_header]",
					    'textarea_rows' => "6",
					    'tinymce'       => true
					  ) 
					);
				  ?>
				<p class="description"><?php _e( 'This content will be displayed at the top of this category. You can use your shortcodes here. <small>You can create your content using visual composer and then copy its text here</small>',THB_THEME_NAME ); ?></p>
			</td>
		</tr>
	<?php
	}
	add_action( 'product_cat_edit_form_fields', 'thb_taxonomy_meta_field', 10, 2 );
	
	/* Save Custom Meta Data */
	function thb_save_taxonomy_custom_meta( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_term_meta($t_id,'cat_meta');
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			update_term_meta($term_id, 'cat_meta', $term_meta);
	
		}
	}  
	add_action( 'edited_product_cat', 'thb_save_taxonomy_custom_meta', 10, 2 );
}

/* Redirect to Homepage when customer log out */
function thb_vp_setup() {
	if ( ot_get_option('variation_dropdown_prices') == 'on') {
		add_filter('logout_url', 'new_logout_url', 10, 2);
		function new_logout_url($logouturl, $redir) {
			$redirect = get_option('siteurl');
			return $logouturl . '&amp;redirect_to=' . urlencode($redirect);
		}
		
		/* Add Prices inside variation dropdown */
		
		//Add prices to variations
		add_filter( 'woocommerce_variation_option_name', 'display_price_in_variation_option_name' );
		
		function display_price_in_variation_option_name( $term ) {
			global $wpdb, $product;
			
			$result = $wpdb->get_col( "SELECT slug FROM {$wpdb->prefix}terms WHERE name = '$term'" );
			
			$term_slug = ( !empty( $result ) ) ? $result[0] : $term;
			
			$query = "SELECT postmeta.post_id AS product_id
			FROM {$wpdb->prefix}postmeta AS postmeta
			LEFT JOIN {$wpdb->prefix}posts AS products ON ( products.ID = postmeta.post_id )
			WHERE postmeta.meta_key LIKE 'attribute_%'
			AND postmeta.meta_value = '$term_slug'
			AND products.post_parent = $product->id";
			
			$variation_id = $wpdb->get_col( $query );
			
			$parent = wp_get_post_parent_id( $variation_id[0] );
			
			if ( $parent > 0 ) {
				$_product = new WC_Product_Variation( $variation_id[0] );
				
				//this is where you can actually customize how the price is displayed
				return $term . ' (' . woocommerce_price( $_product->get_price() ) . ')';
			}
			return $term;
		
		}
	}
}
add_action( 'after_setup_theme', 'thb_vp_setup' );

/* Disable Variations when Sold out? */
function thb_dd_setup() {
	if ( ot_get_option('variation_dropdown_soldout') == 'on') {
		add_action( 'woocommerce_after_add_to_cart_form', 'woocommerce_sold_out_filter' );
		function woocommerce_sold_out_filter() {
		  ?>
		<script type="text/javascript">
		(function($) {
		   // disable and add 'sold out' to product variations 
			var product_variations = $('form.variations_form').data('product_variations');
			if (product_variations) {
				var attribute_name = $('form.variations_form').find('select').attr('name');
				$.each(product_variations, function(key, value) {
					if (!value.is_in_stock) {
						var variation_text = $(".variations option[value='" + value.attributes[attribute_name] + "']").text();
						$(".variations option[value='" + value.attributes[attribute_name] + "']").attr('disabled', 'disabled').text(variation_text + ' - Sold Out');
					}
				});
			}
		})(jQuery);
		</script><?php
		}
	}
}
add_action( 'after_setup_theme', 'thb_dd_setup' );

/* Remove Review Tab */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
 		unset( $tabs['reviews'] );
 		
 		$tabs['description'] = array(
 			'title'    => __( 'Description',THB_THEME_NAME ),
 			'priority' => 10,
 			'callback' => 'woocommerce_product_description_tab'
 		);
    return $tabs;
 
}
add_action('woocommerce_after_single_product', create_function( '$args', 'call_user_func(\'comments_template\');'), 14);
?>