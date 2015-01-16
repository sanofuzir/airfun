<!-- Start Related Posts -->
<?php global $post; 
      $postId = $post->ID;
      $format = get_post_meta($postId, 'portfolio_type', true); 
      $layout = get_post_meta($postId, 'portfolio_layout', true); 
      $type = get_post_meta($postId, 'portfolio_type', true);
      
      if (is_singular('post')) {
      	$query = get_blog_posts_related_by_category($postId); 
      } elseif (is_singular('portfolio')) {
      	$query = get_posts_related_by_taxonomy($postId, 'project-category');
      }
?>
<?php if ($query->have_posts()) : ?>
<aside class="related">
	<aside class="styled_header style2"><h6><?php _e( 'Related Works', THB_THEME_NAME ); ?></h6></aside>
	<div class="row relatedposts hide-on-print">
	  <?php while ($query->have_posts()) : $query->the_post(); ?>             
	    <div class="small-4 columns">
	      <article <?php post_class('post cf show-titles'); ?> id="post-<?php the_ID(); ?>">
	        <figure class="post-gallery fresco">
	        			<?php
	        					$type = get_post_meta($post->ID, 'portfolio_type', true);
	        			    $image_id = get_post_thumbnail_id();
	        			    $image_url = wp_get_attachment_image_src($image_id,'full');
	        			    $image_title = esc_attr( get_the_title($post->ID) );
	        			?>
	        			<?php $image = aq_resize( $image_url[0], 270, 190, true, false); ?>
	        			<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $image_title; ?>" />
	            	<?php switch($type) {
	            		
	            			case "link": ?>
	            				<?php $link = get_post_meta($id, 'portfolio_link', TRUE); ?>
	            				<div class="overlay">
	            					<div class="buttons"><a href="<?php echo $link; ?>" class="details" target="blank"><?php _e( '<i class="icon-budicon-343"></i>', THB_THEME_NAME ); ?></a></div>
	            			<?php break;
	            			
	            			case "image":
	            			case "standard": ?>
	            				<div class="overlay">
	            					<div class="buttons"><a href="<?php the_permalink(); ?>" class="details"><?php _e( '<i class="icon-budicon-496"></i>', THB_THEME_NAME ); ?></a>
	            					<a href="<?php echo $image_url[0]; ?>" class="zoom" rel="magnific" title="<?php the_title(); ?>"><?php _e( '<i class="icon-budicon-545"></i>', THB_THEME_NAME ); ?></a></div>
	            			<?php break;
	            			
	            			case "gallery": ?>
	            				<div class="overlay">
	            					<div class="buttons"><a href="<?php the_permalink(); ?>" class="details"><?php _e( '<i class="icon-budicon-496"></i>', THB_THEME_NAME ); ?></a></div>
	            			<?php break;
	            			
	            			case "video": ?>
	            				<div class="overlay">
	            					<div class="buttons"><a href="<?php the_permalink(); ?>" class="details"><?php _e( '<i class="icon-budicon-496"></i>', THB_THEME_NAME ); ?></a>
	            					<a href="<?php echo $video_url; ?>" class="zoom video" rel="magnific" title="<?php the_title(); ?>"><?php _e( '<i class="icon-budicon-189"></i>', THB_THEME_NAME ); ?></a></div>
	            				
	            			<?php break;
	            		}?>
	            			
	            		</div>
	            		<div class="overlay-title">
	            			<h4><?php if ($type != 'link') { ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><?php } else { the_title(); } ?></h4>
	            		</div>
	            	</figure>   
	      </article>
	    </div>
	    <?php endwhile; ?>
	</div>
</aside>
<?php endif; ?>
<?php wp_reset_query(); ?>
<!-- End Related Posts -->