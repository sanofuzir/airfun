<?php global $post; ?>
<?php $url = get_post_meta($post->ID, 'post_link_url', true); ?>
<div class="post-gallery link">
	<?php get_template_part( 'inc/postformats/post-dateauthor' ); ?>
	<h3><a href="<?php echo $url; ?>" title="<?php the_title(); ?>" target="_blank"><span><i class="icon-budicon-343"></i></span><?php echo thb_get_domain($url); ?></a></h3>
	<?php get_template_part( 'inc/postformats/post-meta' ); ?>
</div>