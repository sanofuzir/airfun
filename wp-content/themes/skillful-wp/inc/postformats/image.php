<?php global $post; ?>
<?php if (is_singular('portfolio')) {
				$layout = get_post_meta($post->ID, 'portfolio_layout', true);
			} else {
				$layout = false;
			}?>
<figure class="post-gallery fresco">
	<?php
	    $image_id = get_post_thumbnail_id();
	    $image_link = wp_get_attachment_image_src($image_id,'full');
	    $image_title = esc_attr( get_the_title($post->ID) );
	?>
	<?php
		if ($masonry == 1) {
			$image = aq_resize( $image_link[0], 370, null, true, false);  // Masonry
		} else {
			
			if ($layout == 'layout1') {
				$image = aq_resize( $image_link[0], 1282, 600, true, false);  // Portfolio - Large
			} else if (is_page_template('template-blog-center-image.php')){ 
				$image = aq_resize( $image_link[0], 1170, 450, true, false);  // Center Blog
			} else {
				$image = aq_resize( $image_link[0], 755, 385, true, false);  // Blog
			}
		}
	?>
	<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $image_title; ?>" />
  <div class="overlay">
  	<div class="buttons"><a href="<?php echo $image_link[0]; ?>" class="zoom" rel="magnific" title="<?php the_title(); ?>"><?php _e( '<i class="icon-budicon-545"></i>', THB_THEME_NAME ); ?></a></div>
  </div>
</figure>