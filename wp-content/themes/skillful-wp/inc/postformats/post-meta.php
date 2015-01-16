<?php $post_meta = ot_get_option('blog_post_meta'); ?>
<aside class="post-meta cf">
	<ul>
		<?php if (in_array('comment',(!empty($post_meta) ? $post_meta : array()))) { ?>
		<li><?php comments_popup_link('<i class="icon-budicon-829"></i> 0 Comments', '<i class="icon-budicon-829"></i> 1 Comment', '<i class="icon-budicon-829"></i> % Comments', 'postcommentcount', '<i class="icon-budicon-829"></i> Comments Disabled'); ?></li>
		<?php } ?>
		<?php if (ot_get_option('like_system') == 'on') { ?>
		<li><?php echo thb_printLikes(get_the_ID()); ?> <?php _e( 'Likes', THB_THEME_NAME ); ?></li>
		<?php } ?>
		<?php if (in_array('category',(!empty($post_meta) ? $post_meta : array()))) { ?>
		<?php if(has_category()) { ?>
		<li><i class="icon-budicon-797"></i> <?php the_category(', '); ?></li>
		<?php } ?>
		<?php } ?>
	</ul>
</aside>