<?php $post_meta = ot_get_option('blog_post_meta'); ?>
<aside class="post-meta masonry-meta cf">
	<ul>
		<?php if (in_array('category',(!empty($post_meta) ? $post_meta : array()))) { ?>
		<?php if(has_category()) { ?>
		<li><?php the_category(', '); ?></li>
		<?php } ?>
		<?php } ?>
		<?php if (in_array('date',(!empty($post_meta) ? $post_meta : array()))) { ?>
		<li class="right"><time class="date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time></li>
		<?php } ?>
	</ul>
</aside>