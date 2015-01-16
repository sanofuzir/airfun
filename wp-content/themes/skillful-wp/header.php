<?php global $woocommerce, $yith_wcwl; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta http-equiv="cleartype" content="on">
	<meta name="HandheldFriendly" content="True">
	<?php if( $favicon = ot_get_option('favicon')){ ?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>">
	<?php } else {?>
	<link rel="shortcut icon" href="<?php echo THB_THEME_ROOT; ?>/assets/img/favicon.ico">
	<?php } ?>
	<?php do_action( 'thb_handhelded_devices' ); ?>
	<?php 
				$id = get_queried_object_id();
				$page_menu = (get_post_meta($id, 'page_menu', true) !== '' ? get_post_meta($id, 'page_menu', true) : 'nav-menu');
				$mobile_menu_style = (isset($_GET['mobile_menu_style']) ? htmlspecialchars($_GET['mobile_menu_style']) : ot_get_option('mobile_menu_style', 'style1'));
				$boxed = (isset($_GET['boxed']) ? htmlspecialchars($_GET['boxed']) : ot_get_option('boxed'));
				$header_style = ot_get_option('header_style','style1');
				$fixed_style = (isset($_GET['header_fixed_animation']) ? htmlspecialchars($_GET['header_fixed_animation']) : ot_get_option('header_fixed_animation', 'swing'));
				$logo_position = (isset($_GET['header_logo_position']) ? htmlspecialchars($_GET['header_logo_position']) : ot_get_option('header_logo_position')); 
				$logo_class = $logo_position .'_logo';
				$header_grid = (ot_get_option('header_grid') != 'off' ? '' : 'notgrid');
				$tofix = (ot_get_option('header_fixed') != 'off' ? 'tofixed' : '');  ?>
	<?php
		$class = array();
		if($boxed == 'on') { 
			array_push($class, 'boxed');
	 	}
	?>
	<?php 
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head(); 
	?>
</head>
<body <?php body_class($class); ?> data-url="<?php echo home_url(); ?>" data-cart-count="<?php if($woocommerce) { echo $woocommerce->cart->cart_contents_count; } ?>" data-sharrreurl="<?php echo THB_THEME_ROOT; ?>/inc/sharrre.php">
<?php if ($mobile_menu_style == 'style1') { ?>
	<!-- Start Mobile Menu -->
	<section id="sidr-main">
		<a href="#" id="sidr-close"><?php _e('Close',THB_THEME_NAME); ?></a>
		<?php if(has_nav_menu('mobile-menu')) { ?>
		  <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'depth' => 2, 'container' => false, 'menu_class' => 'mobile-menu', 'walker'          => new thb_mobileDropdown ) ); ?>
		<?php } else { ?>
			<ul class="sf-menu">
				<li><a href="<?php echo get_admin_url().'nav-menus.php'; ?>">Please assign a menu from Appearance -> Menus</a></li>
			</ul>
		<?php } ?>
	</section>
	<!-- End Mobile Menu -->
<?php } else { ?>
	<!-- Start Mobile Menu - Style 2-->
	<section id="mobile-full">
		<div>
			<a href="#" class="close"><i class="icon-budicon-465"></i></a>
			<?php if(has_nav_menu('mobile-menu')) { ?>
			  <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'depth' => 1, 'container' => false, 'menu_class' => 'mobile-full-menu' ) ); ?>
			<?php } else { ?>
				<ul>
					<li><a href="<?php echo get_admin_url().'nav-menus.php'; ?>">Please assign a menu from Appearance -> Menus</a></li>
				</ul>
			<?php } ?>
		</div>
	</section>
	<!-- End Mobile Menu -->
<?php } ?>

<div id="wrapper">
<!-- Start Header -->
<?php if (ot_get_option('subheader') != 'off') { ?>
<div id="subheader" class="hide-for-small <?php echo $header_style; ?>">
	<div class="row <?php echo $header_grid; ?>">
		<div class="small-6 columns">
			<p><?php echo do_shortcode(ot_get_option('subheader_text')); ?></p>
		</div>
		<div class="small-6 columns">
			<aside class="social">
			<?php if (ot_get_option('fb_link')) { ?>
			<a href="<?php echo ot_get_option('fb_link'); ?>" class="boxed-icon facebook icon-1x"><i class="icon-budicon-834"></i></a>
			<?php } ?>
			<?php if (ot_get_option('pinterest_link')) { ?>
			<a href="<?php echo ot_get_option('pinterest_link'); ?>" class="boxed-icon pinterest icon-1x"><i class="icon-budicon-817"></i></a>
			<?php } ?>
			<?php if (ot_get_option('twitter_link')) { ?>
			<a href="<?php echo ot_get_option('twitter_link'); ?>" class="boxed-icon twitter icon-1x"><i class="icon-budicon-841"></i></a>
			<?php } ?>
			<?php if (ot_get_option('linkedin_link')) { ?>
			<a href="<?php echo ot_get_option('linkedin_link'); ?>" class="boxed-icon linkedin icon-1x"><i class="icon-budicon-802"></i></a>
			<?php } ?>
			<?php if (ot_get_option('instragram_link')) { ?>
			<a href="<?php echo ot_get_option('instragram_link'); ?>" class="boxed-icon instagram icon-1x"><i class="icon-budicon-833"></i></a>
			<?php } ?>
			</aside>
			<?php if (ot_get_option('header_ls') != 'off') { do_action( 'thb_language_switcher' ); } ?>
			<?php if (ot_get_option('header_search') != 'off') { ?><aside class="headersearch"><span><i class="icon-budicon-545"></i> <?php get_search_form(); ?></span></aside><?php } ?>
			
		</div>
	</div>
</div>
<?php } ?>
<header class="header <?php echo $header_style.' '.$logo_class.' '.$tofix. ' '.$fixed_style; ?>" data-offset="<?php echo ot_get_option('header_fixed_offset', '400'); ?>" data-stick-class="header--<?php echo $fixed_style; ?>" data-unstick-class="header--un<?php echo $fixed_style; ?>">
	<div class="row <?php echo $header_grid; ?>" data-equal=">.columns">
		<div class="<?php if ($logo_position == 'center') { echo 'small-12'; } else if ($logo_position == 'right') { echo 'large-push-8 small-7 large-4'; } else { echo 'small-7 large-4'; } ?> columns logo">
			<?php if (ot_get_option('logo')) { $logo = ($header_style == 'style1' ? ot_get_option('logo') : ot_get_option('logo_dark')); } else { $logo = THB_THEME_ROOT. '/assets/img/'.($header_style == 'style1' ? 'logo-light.png' : 'logo-dark.png'); } ?>
			
			<?php if (ot_get_option('logo_mobile')) { $fixedlogo = ot_get_option('logo_mobile'); } else { $fixedlogo = THB_THEME_ROOT. '/assets/img/logo-dark-fixed.png'; } ?>
			<a href="<?php echo home_url(); ?>" class="logolink">
				<img src="<?php echo $logo; ?>" class="logoimg" alt="<?php bloginfo('name'); ?>"/>
				<?php if ($fixedlogo) { ?><img src="<?php echo $fixedlogo; ?>" class="logoimg fixedlogo" alt="<?php bloginfo('name'); ?>"/><?php } ?>
			</a>
		</div>
		<div class="<?php if ($logo_position == 'center') { echo 'small-12'; } else if ($logo_position == 'right') { echo 'large-pull-4 small-5 large-8'; } else { echo 'small-5 large-8'; } ?> columns menu-holder">
			<div class="show-for-large-up">
				<?php if ($logo_position == 'right') { ?><?php if (ot_get_option('header_cart') != 'off') { do_action( 'thb_quick_cart' ); } ?><?php } ?>
				<nav id="nav">
					<?php if ($page_menu) { ?>
						<?php wp_nav_menu( array( 'menu' => $page_menu, 'depth' => 3, 'container' => false, 'menu_class' => 'sf-menu', 'walker' => new thb_MegaMenu  ) ); ?>
					<?php } else if (has_nav_menu('nav-menu')) { ?>
					  <?php wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'sf-menu', 'walker' => new thb_MegaMenu  ) ); ?>
					<?php } else { ?>
						<ul class="sf-menu">
							<li><a href="<?php echo get_admin_url().'nav-menus.php'; ?>">Please assign a menu from Appearance -> Menus</a></li>
						</ul>
					<?php } ?>
				</nav>
				<?php if ($logo_position != 'right') { ?><?php if (ot_get_option('header_cart') != 'off') { do_action( 'thb_quick_cart' ); } ?><?php } ?>
			</div>
			<div class="hide-for-large-up">
				<?php if (ot_get_option('header_cart') != 'off') { do_action( 'thb_quick_cart' ); } ?>
				<a href="#mobile-toggle" class="mobile-toggle <?php echo $mobile_menu_style; ?>">
					<i class="icon-budicon-0"></i>
				</a>
			</div>
		</div>
	</div>
</header>
<!-- End Header -->
<?php get_template_part('template-breadcrumbs'); ?>
<?php if (is_page()) {
		$rev_slider_alias = get_post_meta($post->ID, 'rev_slider_alias', true);
		if ($rev_slider_alias) {?>
<div id="home-slider">
	<?php putRevSlider($rev_slider_alias); ?>
</div>
<?php  }
	}
?>

<div role="main">