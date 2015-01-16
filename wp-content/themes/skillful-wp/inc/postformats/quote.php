<?php global $post; ?>
<?php $quote = get_post_meta($post->ID, 'post_quote', true); ?>
<?php $author = get_post_meta($post->ID, 'post_quote_author', true); ?>
<div class="post-gallery quote">
	<?php get_template_part( 'inc/postformats/post-dateauthor' ); ?>
	<blockquote>
		<a href="<?php the_permalink(); ?>"><?php if($quote) { echo '<p>'.$quote.'</p>'; } else { echo 'Please enter a quote using the metaboxes'; } ?></a>
	</blockquote>
	<?php get_template_part( 'inc/postformats/post-meta' ); ?>
</div>