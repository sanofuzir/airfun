<?php global $post; ?>
<?php $gallery_columns = !empty($gallery_columns) ? $gallery_columns : get_post_meta($post->ID, 'gallery-type', TRUE);
			$attachments = get_post_meta($post->ID, 'pp_gallery_slider', TRUE);
			$attachment_array = explode(',', $attachments);
			$rev_slider_alias = get_post_meta($post->ID, 'rev_slider_alias', TRUE);
			if (is_singular('portfolio')) {
				$portfolio = true;
				$layout = get_post_meta($post->ID, 'portfolio_layout', true);
			} else {
				$portfolio = false;
				$layout = false;
			}
			?>
<?php if ($rev_slider_alias) {?>
	<div class="post-gallery">
		<?php putRevSlider($rev_slider_alias); ?>
	</div>
<?php  } else { ?>
	<div class="post-gallery">
		<div class="carousel-container" rel="gallery">
			<div class="carousel owl post-carousel" data-columns="<?php echo $gallery_columns; ?>" data-navigation="true">
				<?php foreach ($attachment_array as $attachment) : ?>
				    <?php
				        $image_link = wp_get_attachment_image_src($attachment,'full');
				        $image_title = esc_attr( get_the_title($post->ID) );
				    ?>
				    <?php
				    		if ($masonry == 1) {
					        $image = aq_resize( $image_link[0], 370, 245, true, false, true);  // Masonry
				    		} else {
				    			
				    			if ($gallery_columns == 1) {
				    				$image = aq_resize( $image_link[0], 755, 385, true, false, true); 
				    			} else if ($gallery_columns == 2) {
				    				$image = aq_resize( $image_link[0], 585, 420, true, false, true); 
				    			} else {
				    				$image = aq_resize( $image_link[0], 390, 420, true, false, true); 
				    			}
				    			
				    			if ($layout == 'layout1') {
				    				$image = aq_resize( $image_link[0], 1282, 600, true, false, true);  // Portfolio - Large
				    			} else if($layout == 'layout2') {
				    				$image = aq_resize( $image_link[0], 670, 725, true, false, true);  // Portfolio - Small
				    			}
				    		}
				    ?>
				    
				    <figure>
				    		<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $image_title; ?>" />
				    </figure>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php } ?>