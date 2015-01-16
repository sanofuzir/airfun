<?php function thb_masonry( $atts, $content = null ) {
    extract(shortcode_atts(array(
       	'type' => 'post',
       	'item_count' => '4',
       	'retrieve' => '3',
       	'portfolio_categories' => false
    ), $atts));
  wp_enqueue_script('isotope_theme');
  wp_enqueue_script('jplayer'); 
  
  $rand = rand(0,1000);
  ob_start();
  
  if ($type == 'post') {
  	$args = array(
  		'showposts' => $item_count, 
  		'nopaging' => 0, 
  		'post_type'=>'post', 
  		'post_status' => 'publish', 
  		'ignore_sticky_posts' => 1,
  		'no_found_rows' => true
  	);
  	
  	$posts = new WP_Query( $args );
  		
  		
  	if ( $posts->have_posts() ) { ?>
  		
  		<section class="blog masonry row" data-loadmore="#loadmore-<?php echo $rand; ?>">
  		
  			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
  				<article <?php post_class('small-4 columns post item'); ?> id="post-<?php the_ID(); ?>">
  				  <?php
  				    // The following determines what the post format is and shows the correct file accordingly
  				    $format = get_post_format();
  				    if ($format) {
  				    $gallery_columns = 1;
  				    $masonry = 1;
  				    include(locate_template( 'inc/postformats/'.$format.'.php' ));
  				    } else {
  				    include(locate_template( 'inc/postformats/standard.php' ));
  				    }
  				  ?>
  				  <?php if( !in_array($format, array('quote', 'link'))) { ?>
  				    <div class="post-title">
  				    	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
  				    </div>
  				    <div class="post-content">
  				    	<?php echo thb_ShortenText(get_the_content(), 200); ?>
  				    </div>
  				  	<?php get_template_part( 'inc/postformats/post-meta-masonry' ); ?>
  					<?php } ?>
  				</article>
  			<?php endwhile; // end of the loop. ?>
  		  
  		  
  		</section>
  		<a class="masonry_btn" href="#" id="loadmore-<?php echo $rand; ?>" data-type="<?php echo $type; ?>" data-loading="<?php _e( 'Loading Posts', THB_THEME_NAME ); ?>" data-nomore="<?php _e( 'No More Posts to Show', THB_THEME_NAME ); ?>" data-initial="<?php echo $item_count; ?>" data-count="<?php echo $retrieve; ?>"><?php _e( 'Load More', THB_THEME_NAME ); ?></a>
  	<?php }
  } else if ($type == 'portfolio') {
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
			    'terms' => explode(',',$portfolio_categories),
			    'operator' => 'IN'
			   )
			 ) 
		);
		
		$posts = new WP_Query( $args );

		if ( $posts->have_posts() ) { ?>
			
			<section class="thb-portfolio masonry row" data-loadmore="#loadmore-<?php echo $rand; ?>">
			
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
					<?php 
					$id = get_the_ID();
					$image_id = get_post_thumbnail_id();
					$image_link = wp_get_attachment_image_src($image_id,'full');
					$image = aq_resize( $image_link[0], 390, null, true, false);
					$image_title = esc_attr( get_the_title($id) );
					$portfolio_type = get_post_meta($id, 'portfolio_type', true);
					$meta = get_the_term_list( $id, 'project-category', '<span>', '</span>, <span>', '</span>' ); 
					$meta = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $meta);
					?>
					<article <?php post_class('post small-12 medium-4 columns item'); ?> id="post-<?php the_ID(); ?>">
						<figure class="post-gallery fresco">
							<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" title="<?php echo $image_title; ?>" />
							<?php 
									if ($portfolio_type == "video") {
										$video_url = get_post_meta($id, 'portfolio_video', TRUE);
									}
							?>
							<?php switch($portfolio_type) {
							
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
								<div class="overlay-title">
									<h4><?php if ($portfolio_type != 'link') { ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><?php } else { the_title(); } ?></h4>
									<aside class="post_categories"><?php echo $meta; ?></aside>
								</div>
							</div>
						</figure>
					</article>
				<?php endwhile; // end of the loop. ?>
			  
			  
			</section>
			<a class="masonry_btn" href="#" id="loadmore-<?php echo $rand; ?>" data-type="<?php echo $type; ?>" data-loading="<?php _e( 'Loading Posts', THB_THEME_NAME ); ?>" data-nomore="<?php _e( 'No More Posts to Show', THB_THEME_NAME ); ?>" data-initial="<?php echo $item_count; ?>" data-count="<?php echo $retrieve; ?>" data-categories="<?php echo$portfolio_categories; ?>"><?php _e( 'Load More', THB_THEME_NAME ); ?></a>
		<?php }
  }
   $out = ob_get_contents();
   if (ob_get_contents()) ob_end_clean();
   
   wp_reset_query();
   wp_reset_postdata();
     
  return $out;
}
add_shortcode('thb_masonry', 'thb_masonry');
