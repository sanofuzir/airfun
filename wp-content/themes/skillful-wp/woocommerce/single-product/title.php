<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post, $product;
?>
<header class="post-title">
<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
	<span class="sku_wrapper"><?php _e( 'SKU:',THB_THEME_NAME ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A',THB_THEME_NAME ); ?></span>.</span>
<?php endif; ?>
<h1 itemprop="name" class="entry-title"><?php the_title(); ?></h1>
</header>