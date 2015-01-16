<?php $post_meta = ot_get_option('blog_post_meta'); ?>
<div class="dateandauthor">
	<?php if (in_array('date',(!empty($post_meta) ? $post_meta : array()))) { ?>
	<time class="author" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time><?php } ?>
	<?php if (in_array('author',(!empty($post_meta) ? $post_meta : array()))) { ?>
	<?php _e("by", THB_THEME_NAME); ?> <?php the_author_posts_link(); ?><?php } ?>
</div>