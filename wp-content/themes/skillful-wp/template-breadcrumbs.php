<?php global $woocommerce;
			$id = $wp_query->get_queried_object_id();
			$postspage_id = get_option('page_for_posts');
			$display_pagetitle_area = get_post_meta($id, 'display_pagetitle_area', true);
			$pagetitle_breadcrumbs = get_post_meta($id, 'pagetitle_breadcrumbs', true);
			$pagetitle_subpages = get_post_meta($id, 'pagetitle_subpages', true);
			$pagetitle_style = (get_post_meta($id, 'pagetitle_style', true) ? get_post_meta($id, 'pagetitle_style', true) : ot_get_option('pagetitle_style')); 
?>
<?php if( !is_single() && !is_singular('portfolio') && !is_singular('product') && ($display_pagetitle_area != 'off') && !is_404()) { ?>
<!-- Start Breadcrumbs -->
<div id="pagetitle" class="<?php echo $pagetitle_style; ?><?php if ($pagetitle_style == 'style2') { ?> scroll_fade<?php } ?>">
	<div class="row">
		<?php if ($pagetitle_style == 'style1') { ?>
			<?php if (is_rtl()) { ?>
				<div class="small-6 columns hide-for-small">
					<?php if ($pagetitle_breadcrumbs != 'off') { ?>
						<?php if($woocommerce && is_woocommerce()) {
										$defaults = array(
										    'delimiter'  => '<span>/</span>',
										    'wrap_before'  => '<aside class="breadcrumb">',
										    'wrap_after' => '</aside>',
										    'before'   => '',
										    'after'   => '',
										    'home'    => __("Home", THB_THEME_NAME )
										);
										$args = wp_parse_args($defaults);
										woocommerce_get_template( 'global/breadcrumb.php', $args );
									} else {
										echo thb_breadcrumb();
									}
						?>
					<?php } ?>
				</div>
				<div class="small-12 medium-6 columns">
					<h1>
						<?php if($woocommerce && is_woocommerce()) {
										woocommerce_page_title(); 
									} else if (is_archive()|| is_search()){
										echo thb_title(array('title' => thb_which_archive())); 
									} else if (is_singular('post')) {
										echo thb_title(false,$postspage_id); 
									} else {
										echo thb_title(); 
									}
						?>
					
					</h1>
				</div>
			<?php } else { ?>
				<div class="small-12 medium-6 columns">
					<h1>
						<?php if($woocommerce && is_woocommerce()) {
										woocommerce_page_title(); 
									} else if (is_archive()|| is_search()){
										echo thb_title(array('title' => thb_which_archive())); 
									} else if (is_singular('post')) {
										echo thb_title(false,$postspage_id); 
									} else {
										echo thb_title(); 
									}
						?>
					
					</h1>
				</div>
				<div class="small-6 columns hide-for-small">
					<?php if ($pagetitle_breadcrumbs != 'off') { ?>
						<?php if($woocommerce && is_woocommerce()) {
										$defaults = array(
										    'delimiter'  => '<span>/</span>',
										    'wrap_before'  => '<aside class="breadcrumb">',
										    'wrap_after' => '</aside>',
										    'before'   => '',
										    'after'   => '',
										    'home'    => __("Home", THB_THEME_NAME )
										);
										$args = wp_parse_args($defaults);
										woocommerce_get_template( 'global/breadcrumb.php', $args );
									} else {
										echo thb_breadcrumb();
									}
						?>
					<?php } ?>
				</div>
			<?php } ?>
		<?php } elseif ($pagetitle_style == 'style2') { ?>
		<div class="small-12 columns">
			<?php if ($pagetitle_breadcrumbs != 'off') { ?>
				<?php if($woocommerce && is_woocommerce()) {
								$defaults = array(
								    'delimiter'  => '<span>/</span>',
								    'wrap_before'  => '<aside class="breadcrumb">',
								    'wrap_after' => '</aside>',
								    'before'   => '',
								    'after'   => '',
								    'home'    => __("Home", THB_THEME_NAME )
								);
								$args = wp_parse_args($defaults);
								woocommerce_get_template( 'global/breadcrumb.php', $args );
							} else {
								echo thb_breadcrumb();
							}
				?>
			<?php } ?>
			<h1>
				<?php if($woocommerce && is_woocommerce()) {
								woocommerce_page_title(); 
							} else if (is_archive()|| is_search()){
								echo thb_title(array('title' => thb_which_archive())); 
							} else if (is_singular('post')) {
								echo thb_title(false,$postspage_id); 
							} else {
								echo thb_title(); 
							}
				?>
			</h1>
			<?php if($pagetitle_subpages) { ?>
			<ul class="pagetitle_subpages">
				<?php foreach($pagetitle_subpages as $subpage) { ?>
				<?php $active = (($subpage['link'] == get_the_permalink()) ? ' active' : ''); ?> 
					<li><a href="<?php echo $subpage['link']; ?>" class="btn rounded outline small white<?php echo $active; ?>" title="<?php echo $subpage['title']; ?><"><?php echo $subpage['title']; ?></a></li>
				<?php } ?>
			</ul>
			<?php } ?>
			
		</div>
		<?php } ?>
	</div>
</div>
<!-- End Breadcrumbs -->
<?php } ?>