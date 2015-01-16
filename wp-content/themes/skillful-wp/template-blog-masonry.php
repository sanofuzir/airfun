<?php
/*
Template Name: Blog - Masonry
*/
?>
<?php get_header(); ?>
<?php $rand = rand(0,1000); ?>
<section class="blog-section masonry row" data-loadmore="#loadmore-<?php echo $rand; ?>">
  <?php 
  $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
  $args = array('offset'=> 0, 'paged'=>$paged);
  $all_posts = new WP_Query($args);
  if (have_posts()) :  while($all_posts->have_posts()) : $all_posts->the_post();?>
  	
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
	  
	  
  <?php endwhile; ?>
  	
  <?php else : ?>
    <p><?php _e( 'Please add posts from your WordPress admin page.', THB_THEME_NAME ); ?></p>
  <?php endif; ?>
  
</section>
<a class="masonry_btn" href="#" id="loadmore-<?php echo $rand; ?>" data-type="post" data-loading="<?php _e( 'Loading Posts', THB_THEME_NAME ); ?>" data-nomore="<?php _e( 'No More Posts to Show', THB_THEME_NAME ); ?>" data-initial="<?php echo get_option('posts_per_page');?>" data-count="<?php echo get_option('posts_per_page');?>"><?php _e( 'Load More', THB_THEME_NAME ); ?></a>
<?php get_footer(); ?>