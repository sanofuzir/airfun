<?php get_header(); ?>
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
	<?php $layout = get_post_meta($post->ID, 'portfolio_layout', true);
				$subtext = get_post_meta($post->ID, 'portfolio_subtext', true); 
				$format = get_post_meta($post->ID, 'portfolio_type', true); 
				$portfolio_main = get_post_meta($post->ID, 'portfolio_main', TRUE);
				$meta = get_the_term_list( $post->ID, 'project-category', '<span>', '</span>, <span>', '</span>' ); 
				$meta = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $meta); 
				$attributes = get_post_meta($post->ID, 'portfolio_attributes', TRUE);
				$sharing_buttons = ot_get_option('sharing_buttons_content');
				?>
	<?php 
		if ($portfolio_main) {
			$portfolio_link = get_permalink($portfolio_main);
		} else {
			$portfolio_link = get_portfolio_page_link(get_the_ID()); 
		}
		
	?>
	<?php if ($layout == 'layout2') { ?>
	<header class="portfolio-header scroll_fade">
		<div class="row">
			<div class="small-12 columns">
				<?php do_action( 'thb_portfolio_navigation', $portfolio_link ); ?>
				<h1><?php the_title(); ?></h1>
				<?php if ($subtext) { ?><h3><?php echo $subtext; ?></h3><?php } ?>
				<?php if($attributes) { ?>
				<ul>
					<?php foreach($attributes as $attribute) { ?>
						<li><strong><?php echo $attribute['title']; ?>:</strong> <span><?php echo $attribute['attribute_value']; ?></span></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</header>
	<div class="row">
		<div class="small-12 columns">
			<article <?php post_class('post blog-post portfolio-post '. $layout .' '); ?> id="post-<?php the_ID(); ?>">
				<div class="row">
					<div class="small-12 columns">
						<div class="post-content">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</article>
			<?php get_template_part( 'inc/postformats/post-related' ); ?>
		</div>
	</div>
	<?php } else { ?>
	  <article <?php post_class('post blog-post portfolio-post '. $layout .' '); ?> id="post-<?php the_ID(); ?>">
	  	<div class="row portfolio-large">
	  		<div class="small-12 columns">
	  			<?php
	  			  // The following determines what the post format is and shows the correct file accordingly
	  			  if ($format) {
	  			  $gallery_columns = 1;
	  			  $masonry = 0;
	  			  include(locate_template( 'inc/postformats/'.$format.'.php' ));
	  			  } else {
	  			  include(locate_template( 'inc/postformats/standard.php' ));
	  			  }
	  			?>
	  		</div>
	  	</div>
	   
	    <div class="row">
	    	<div class="small-12 medium-5 large-4 columns">
	    		<header class="post-title portfolio-title <?php if($format != 'video') { echo 'margin';} ?>">
	    			<h1><?php the_title(); ?></h1>
	    			<?php if ($subtext) { ?><h3><?php echo $subtext; ?></h3><?php } ?>
	    			<?php do_action( 'thb_portfolio_navigation', $portfolio_link ); ?>
	    		</header>
	    		<?php if($attributes) { ?>
	    		<ul class="portfolio_attributes">
		    		<?php foreach($attributes as $attribute) { ?>
		    			<li>
		    				<label><?php echo $attribute['title']; ?></label>
		    				<p><?php echo $attribute['attribute_value']; ?></p>
		    			</li>
		    		<?php }?>
	    		</ul>
	    		<?php } ?>
	    	</div>
	    	<div class="small-12 medium-7 large-8 columns">
	    		<div class="post-content">
	    			<?php the_content(); ?>
	    		</div>
	    	</div>
	    </div>
	  </article>
	  <?php get_template_part( 'inc/postformats/post-related' ); ?>
  <?php } ?>
<?php endwhile; else : endif; ?>
<?php get_footer(); ?>