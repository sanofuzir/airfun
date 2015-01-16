<?php get_header(); ?>
<?php $fullwidth = (isset($_GET['blog_fullwidth_posts']) ? htmlspecialchars($_GET['blog_fullwidth_posts']) : ot_get_option('blog_fullwidth_posts')); ?>
<?php if ($fullwidth == 'on') { ?>
<section class="full_width_posts">
  <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
	  <article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post blog-post'); ?> id="post-<?php the_ID(); ?>" role="article">
	    <?php
	      get_template_part( 'inc/postformats/editorial' );
	    ?>
	    <?php get_template_part( 'inc/postformats/post-meta' ); ?>
	    <div class="post-content">
	    		<div class="row">
	    			<div class="small-12 medium-8 small-centered columns">
				    	<?php the_content(); ?>
				    	<?php if ( is_single()) { wp_link_pages(); } ?>
	    			</div>
	    		</div>
	    </div>
	  </article>
  <?php endwhile; else : endif; ?>
  <div class="row">
  	<div class="small-12 medium-8 small-centered columns">
  		<?php get_template_part( 'inc/postformats/post-social' ); ?>
  	</div>
  </div>
</section>
<!-- Start #comments -->
<section id="comments" class="cf full">
  <?php comments_template('', true ); ?>
</section>
<!-- End #comments -->
<?php } else { ?>
<div class="row">
<section class="small-12 medium-8 columns blog-section">
  <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
	  <article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post blog-post'); ?> id="post-<?php the_ID(); ?>" role="article">
	    <?php
	      // The following determines what the post format is and shows the correct file accordingly
	      $format = get_post_format();
	      if ($format) {
	      $masonry = 0;
	      include(locate_template( 'inc/postformats/'.$format.'.php' ));
	      } else {
	      include(locate_template( 'inc/postformats/standard.php' ));
	      }
	    ?>
	    <?php if (!in_array($format, array('quote', 'link'))) { ?>
	    	<?php get_template_part( 'inc/postformats/post-dateauthor' ); ?>
	    <?php } ?>
	    <header class="post-title">
	    	<h1 itemprop="headline"><?php the_title(); ?></h1>
	    </header>
	    <?php if (!in_array($format, array('quote', 'link'))) { ?>
	    	<?php get_template_part( 'inc/postformats/post-meta' ); ?>
	    <?php } ?>
	    <div class="post-content">
	    	<?php the_content(); ?>
	    	<?php if ( is_single()) { wp_link_pages(); } ?>
	    </div>
	    
	  </article>
  <?php endwhile; else : endif; ?>
  <?php get_template_part( 'inc/postformats/post-social' ); ?>
  <!-- Start #comments -->
  <section id="comments" class="cf">
    <?php comments_template('', true ); ?>
  </section>
  <!-- End #comments -->
</section>
<?php get_sidebar('single'); ?>
</div>
<?php } ?>
<?php get_footer(); ?>