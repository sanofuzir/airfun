<?php
function load_more_posts() {
	$initial = $_POST['initial'];
	$count = $_POST['count'];
	$page = $_POST['page']; 
	$type = $_POST['type']; 
	$list = isset($_POST['list']) ? $_POST['list'] : false;
	$categories =  isset($_POST['categories']) ? $_POST['categories'] : '';
	$offset = (($page - 1) * $count) + $initial;
	
	
	if ($type == 'post') {
	  $args = array(
	  		'offset' 				 => $offset,
	  		'posts_per_page'	 => $count,
	      'orderby'        => 'post_date',
	      'order'          => 'DESC',
	      'ignore_sticky_posts' => '1'
	  );
	
		$query = new WP_Query( $args );
		
		if ( $query->have_posts() ) {
		    while ( $query->have_posts() ) { $query->the_post(); ?>
		    	<?php if ($list) { ?>
		    		<?php
		    		    $image_id = get_post_thumbnail_id();
		    		    $image_link = wp_get_attachment_image_src($image_id,'full');
		    				$image = aq_resize( $image_link[0], 755, 385, true, false);  // Blog
		    		?>
		    		<article <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
		    			<div class="hover-image" style="background-image:url('<?php echo $image[0]; ?>');"></div>
		    			<div class="row center-text">
		    			 <div class="small-12 medium-8 medium-centered columns">
		    					<?php get_template_part( 'inc/postformats/post-dateauthor' ); ?>
		    					<header class="post-title">
		    						<h2 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		    					</header>
		    					<?php get_template_part( 'inc/postformats/post-meta' ); ?>
		    				
		    					<div class="post-content center-text">
		    						<?php echo thb_excerpt(300, '...'); ?>
		    						<div class="center-text">
		    							<a href="<?php the_permalink(); ?>" class="more-link"><span><i class="icon-budicon-447"></i></span> <?php _e( 'Read More', THB_THEME_NAME ); ?></a>
		    						</div>
		    					</div>
		    				</div>
		    			</div>
		    		</article>
		    	<?php } else { ?>
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
		    	<?php } ?>
		    <?php
		    }
		}
	} else if ($type == 'portfolio') {
		$args = array(
			'offset' 				 => $offset,
			'posts_per_page'	 => $count,
			'post_type'=>'portfolio', 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => 1,
			'tax_query' => array(
					array(
			    'taxonomy' => 'project-category',
			    'field' => 'id',
			    'terms' => explode(',',$categories),
			    'operator' => 'IN'
			   )
			 ) 
		);
		
		$query = new WP_Query( $args );
		
		if ( $query->have_posts() ) {
		    while ( $query->have_posts() ) { $query->the_post(); ?>
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
			    <article <?php post_class('post small-4 columns item'); ?> id="post-<?php the_ID(); ?>">
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
		    
 				<?php
 		    }
 		}
	}
	die();
}
add_action("wp_ajax_nopriv_thb_ajax", "load_more_posts");
add_action("wp_ajax_thb_ajax", "load_more_posts");
 ?>