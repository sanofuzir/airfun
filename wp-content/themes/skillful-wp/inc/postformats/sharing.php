<?php $sharing_buttons = ot_get_option('sharing_buttons_content'); 
			$sharing_type =  ot_get_option('sharing_buttons');
?>
<?php if (is_singular('post')) {
	$type = 'blog';
} else if (is_singular('portfolio')) {
	$type = 'portfolio';
} else if (is_singular('product')) {
	$type = 'products';
}
?>
<?php if (in_array($type, (!empty($sharing_buttons) ? $sharing_buttons : array()))) { ?>
<aside id="product_share" data-fb="<?php echo (in_array('facebook',$sharing_type) ? 'true' : 'false' ); ?>" data-tw="<?php echo (in_array('twitter',$sharing_type) ? 'true' : 'false' ); ?>" data-pi="<?php echo (in_array('pinterest',$sharing_type) ? 'true' : 'false' ); ?>" data-li="<?php echo (in_array('linkedin',$sharing_type) ? 'true' : 'false' ); ?>">
	<h5><?php _e('Share: ',THB_THEME_NAME); ?></h5>
	<div class="placeholder" data-url="<?php the_permalink(); ?>" data-text="<?php the_title();?>"></div>
</aside>
<?php } ?>