<?php function thb_portfolio( $atts, $content = null ) {
    extract(shortcode_atts(array(
       	'carousel' => 'no',
       	'item_count' => '9',
       	'columns' => '4',
       	'categories' => false,
       	'margin' => false,
       	'grayscale' => false,
       	'titles' => false
    ), $atts));
    
	$args = array(
		'showposts' => $item_count, 
		'nopaging' => 0, 
		'post_type'=>'portfolio', 
		'post_status' => 'publish', 
		'ignore_sticky_posts' => 1,
		'no_found_rows' => true,
		'tax_query' => array(
				array(
		    'taxonomy' => 'project-category',
		    'field' => 'id',
		    'terms' => explode(',',$categories),
		    'operator' => 'IN'
		   )
		 ) 
	);
	$grayscale = $grayscale ? ' grayscale' : '';
	$titles = $titles ? ' show-titles' : '';
	$posts = new WP_Query( $args );
 	
 	ob_start();
 	
	if ( $posts->have_posts() ) { ?>
	  <?php switch($columns) {
	  	case 2:
	  		$col = 'medium-6';
	  		$w = '590';
	  		$h = '295';
	  		break;
	  	case 3:
	  		$col = 'medium-4';
	  		$w = '390';
	  		$h = '295';
	  		break;
	  	case 4:
	  		$col = 'medium-3';
	  		$w = '290';
	  		$h = '295';
	  		break;
	  	case 5:
	  		$col = 'thb-five';
	  		$w = '234';
	  		$h = '195';
	  		break;
	  	case 6:
	  		$col = 'medium-2';
	  		$w = '195';
	  		$h = '195';
	  		break;
	  } ?>
		<?php if ($carousel == "yes") { ?>
			
			<div class="carousel-container thb-portfolio shortcode">
				<div class="carousel owl row" data-columns="<?php echo $columns; ?>" data-navigation="false">				
					
					<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
						<?php 
						$id = get_the_ID();
						$image_id = get_post_thumbnail_id();
						$image_link = wp_get_attachment_image_src($image_id,'full');
						$image = aq_resize( $image_link[0], $w, $h, true, false);
						$image_title = esc_attr( get_the_title($id) );
						$type = get_post_meta($id, 'portfolio_type', true);
						$meta = get_the_term_list( $id, 'project-category', '<span>', '</span>, <span>', '</span>' ); 
						$meta = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $meta);
						?>
						<article <?php post_class('post small-6 '.$col.' columns' .$grayscale.'' .$titles.''); ?> id="post-<?php the_ID(); ?>">
							<figure class="post-gallery fresco">
								<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" title="<?php echo $image_title; ?>" />
								<?php 
										if ($type == "video") {
											$video_url = get_post_meta($id, 'portfolio_video', TRUE);
										}
								?>
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
											<a href="<?php echo $image_link[0]; ?>" class="zoom" rel="magnific" title="<?php the_title(); ?>"><?php _e( '<i class="icon-budicon-545"></i>', THB_THEME_NAME ); ?></a></div>
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
								<?php if ($titles == '') { ?>
									<div class="overlay-title">
										<h4><?php if ($type != 'link') { ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><?php } else { the_title(); } ?></h4>
										<aside class="post_categories"><?php echo $meta; ?></aside>
									</div>
								<?php } ?>
								</div>
								<?php if ($titles !== '') { ?>
									<div class="overlay-title">
										<h4><?php if ($type != 'link') { ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><?php } else { the_title(); } ?></h4>
										<aside class="post_categories"><?php echo $meta; ?></aside>
									</div>
								<?php } ?>
							</figure>
						</article>
					<?php endwhile; // end of the loop. ?>	 
										
				</div>
			</div>
			
		<?php } else {  ?> 
		<div class="row thb-portfolio shortcode<?php if($margin) { echo ' margin'; } ?>">
		
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php 
				$id = get_the_ID();
				$image_id = get_post_thumbnail_id();
				$image_link = wp_get_attachment_image_src($image_id,'full');
				$image = aq_resize( $image_link[0], $w, 295, true, false);
				$image_title = esc_attr( get_the_title($id) );
				$type = get_post_meta($id, 'portfolio_type', true);
				$meta = get_the_term_list( $id, 'project-category', '<span>', '</span>, <span>', '</span>' ); 
				$meta = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $meta);
				?>
				<article <?php post_class('post small-12 '.$col.' columns' .$grayscale.'' .$titles.''); ?> id="post-<?php the_ID(); ?>">
					<figure class="post-gallery fresco">
						<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" title="<?php echo $image_title; ?>" />
						<?php 
								if ($type == "video") {
									$video_url = get_post_meta($id, 'portfolio_video', TRUE);
								}
						?>
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
									<a href="<?php echo $image_link[0]; ?>" class="zoom" rel="magnific" title="<?php the_title(); ?>"><?php _e( '<i class="icon-budicon-545"></i>', THB_THEME_NAME ); ?></a></div>
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
							<?php if ($titles == '') { ?>
								<div class="overlay-title">
									<h4><?php if ($type != 'link') { ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><?php } else { the_title(); } ?></h4>
									<aside class="post_categories"><?php echo $meta; ?></aside>
								</div>
							<?php } ?>
						</div>
						<?php if ($titles !== '') { ?>
							<div class="overlay-title">
								<h4><?php if ($type != 'link') { ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><?php } else { the_title(); } ?></h4>
								<aside class="post_categories"><?php echo $meta; ?></aside>
							</div>
						<?php } ?>
					</figure>
				</article>
			<?php endwhile; // end of the loop. ?>
		 
		</div>
		
		<?php } ?>
	   
	<?php }

   $out = ob_get_contents();
   if (ob_get_contents()) ob_end_clean();
   
   wp_reset_query();
   wp_reset_postdata();
     
  return $out;
}
add_shortcode('thb_portfolio', 'thb_portfolio');
