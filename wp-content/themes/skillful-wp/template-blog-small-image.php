<?php
/*
Template Name: Blog - Small Images
*/
?>
<?php get_header(); ?>
<div class="row">
<section class="small-12 columns blog-section small-image">
  <?php 
  $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
  $args = array('offset'=> 0, 'paged'=>$paged);
  $query = new WP_Query($args);
  if (have_posts()) :  while($query->have_posts()) : $query->the_post();?>
  	<?php $format = get_post_format(); ?>
  	<?php if( !in_array($format, array('quote', 'link', 'audio'))) { ?>
  		<article <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
  			<div class="row">
  				<div class="small-12 medium-5 columns">
  					<?php 
	  					$format = get_post_format();
	  					if ($format) {
	  					$gallery_columns = 1;
	  					$masonry = 0;
	  					include(locate_template( 'inc/postformats/'.$format.'.php' ));
	  					} else {
	  					include(locate_template( 'inc/postformats/standard.php' ));
	  					}
	  				?>
  				</div>
					<div class="small-12 medium-7 columns">
						<?php get_template_part( 'inc/postformats/post-dateauthor' ); ?>
						<header class="post-title">
							<h2 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						</header>
							<?php get_template_part( 'inc/postformats/post-meta' ); ?>
						<div class="post-content">
							<?php echo thb_excerpt(300, '...'); ?>
							<a href="<?php the_permalink(); ?>" class="more-link"><span><i class="icon-budicon-447"></i></span> <?php _e( 'Read More', THB_THEME_NAME ); ?></a>
						</div>
					</div>
  			</div>
  		</article>
  	<?php } else { ?>
  		<article <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
  			<?php get_template_part( 'inc/postformats/'.$format ); ?>
  		</article>
  	<?php } ?>
	  
  <?php endwhile; ?>
  	<?php theme_pagination($query->max_num_pages, 3, false); ?>
  <?php else : ?>
    <p><?php _e( 'Please add posts from your WordPress admin page.', THB_THEME_NAME ); ?></p>
  <?php endif; ?>
</section>
</div>
<?php get_footer(); ?>