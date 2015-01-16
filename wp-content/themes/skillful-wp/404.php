<?php global $woocommerce, $yith_wcwl; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta http-equiv="cleartype" content="on">
	<meta name="HandheldFriendly" content="True">
	<?php if( $favicon = ot_get_option('favicon')){ ?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>">
	<?php } else {?>
	<link rel="shortcut icon" href="<?php echo THB_THEME_ROOT; ?>/assets/img/favicon.ico">
	<?php } ?>

	<?php 
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head(); 
	?>
</head>
<body <?php body_class(); ?> data-url="<?php echo home_url(); ?>" data-cart-count="<?php echo $woocommerce->cart->cart_contents_count; ?>" data-sharrreurl="<?php echo THB_THEME_ROOT; ?>/inc/sharrre.php">
<?php $home = get_home_url(); ?>
<div class="row">
<section class="small-12 medium-7 columns notfound">
	<div class="content404">
		<h3><?php _e( "We are sorry :(", THB_THEME_NAME ); ?></h3>
	  <h4><?php _e( "But the page you're looking<br>for cannot be found.", THB_THEME_NAME ); ?></h4>
	  
	  <p><?php _e( 'You might try searching our site or visit the <strong><a href="'.$home.'">homepage</a></strong>.', THB_THEME_NAME ); ?></p>
	  <?php get_search_form(); ?> 
	  <h6><?php _e( "Get in Touch", THB_THEME_NAME ); ?></h6>
	  <?php if (ot_get_option('fb_link')) { ?>
	  <a href="<?php echo ot_get_option('fb_link'); ?>" class="facebook boxed-icon icon-1x"><i class="icon-budicon-834"></i></a>
	  <?php } ?>
	  <?php if (ot_get_option('pinterest_link')) { ?>
	  <a href="<?php echo ot_get_option('pinterest_link'); ?>" class="pinterest boxed-icon icon-1x"><i class="icon-budicon-817"></i></a>
	  <?php } ?>
	  <?php if (ot_get_option('twitter_link')) { ?>
	  <a href="<?php echo ot_get_option('twitter_link'); ?>" class="twitter boxed-icon icon-1x"><i class="icon-budicon-841"></i></a>
	  <?php } ?>
	  <?php if (ot_get_option('googleplus_link')) { ?>
	  <a href="<?php echo ot_get_option('googleplus_link'); ?>" class="google-plus boxed-icon icon-1x"><i class="fa fa-google-plus"></i></a>
	  <?php } ?>
	  <?php if (ot_get_option('linkedin_link')) { ?>
	  <a href="<?php echo ot_get_option('linkedin_link'); ?>" class="linkedin boxed-icon icon-1x"><i class="icon-budicon-802"></i></a>
	  <?php } ?>
	  <?php if (ot_get_option('instragram_link')) { ?>
	  <a href="<?php echo ot_get_option('instragram_link'); ?>" class="instagram boxed-icon icon-1x"><i class="icon-budicon-833"></i></a>
	  <?php } ?>
	  <?php if (ot_get_option('xing_link')) { ?>
	  <a href="<?php echo ot_get_option('xing_link'); ?>" class="xing boxed-icon icon-1x"><i class="fa fa-xing"></i></a>
	  <?php } ?>
	  <?php if (ot_get_option('tumblr_link')) { ?>
	  <a href="<?php echo ot_get_option('tumblr_link'); ?>" class="tumblr boxed-icon icon-1x"><i class="fa fa-tumblr"></i></a>
	  <?php } ?>
  </div>
</section>
</div>
<?php echo ot_get_option('ga'); ?>
<?php 
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	 wp_footer(); 
?>
</body>
</html>