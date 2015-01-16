<?php
/*
Template Name: Blog - List Style
*/
?>
<?php get_header(); ?>
<?php $rand = rand(0,1000); ?>
<section class="list-image masonry" data-loadmore="#loadmore-<?php echo $rand; ?>">
  <?php 
  $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
  $args = array('offset'=> 0, 'paged'=>$paged);
  $query = new WP_Query($args);
  if (have_posts()) :  while($query->have_posts()) : $query->the_post();?>
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
  <?php endwhile; ?>
  <?php else : ?>
    <p><?php _e( 'Please add posts from your WordPress admin page.', THB_THEME_NAME ); ?></p>
  <?php endif; ?>
</section>
<a class="masonry_btn" href="#" id="loadmore-<?php echo $rand; ?>" data-type="post" data-loading="<?php _e( 'Loading Posts', THB_THEME_NAME ); ?>" data-nomore="<?php _e( 'No More Posts to Show', THB_THEME_NAME ); ?>" data-list="true" data-initial="<?php echo get_option('posts_per_page');?>" data-count="<?php echo get_option('posts_per_page');?>"><?php _e( 'Load More', THB_THEME_NAME ); ?></a>
<?php get_footer(); ?>