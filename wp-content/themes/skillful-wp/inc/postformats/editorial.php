<?php
    $image_id = get_post_thumbnail_id();
    $image_link = wp_get_attachment_image_src($image_id,'full');
    $image_title = esc_attr( get_the_title($post->ID) );
?>
<?php 
		$image = aq_resize( $image_link[0], 1170, 580, true, false);  // Portfolio - Large
?>
<figure class="post-gallery editorial parallax_bg scroll_fade" data-parallax-speed="4" style="background-image: url('<?php echo $image[0]; ?>');">
  <div class="darkoverlay"></div>
  <div class="header-container row">
  	<div class="small-12 medium-10 small-centered columns">
  		<header class="post-title">
  			<h1 itemprop="headline"><?php the_title(); ?></h1>
  			<?php echo get_avatar( get_the_author_meta( 'ID' ), 62); ?>
  			<strong><?php the_author_posts_link(); ?></strong>
  			<p><?php the_author_meta('description'); ?></p>
  		</header>
  	</div>
  </div>
</figure>