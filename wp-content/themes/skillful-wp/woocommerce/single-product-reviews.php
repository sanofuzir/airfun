<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
global $woocommerce, $product;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<?php if ( comments_open() ) : ?>
<div id="reviews">
	<div class="row">
		<div class="small-12 medium-8 small-centered columns"><?php

	echo '<div id="comments">';
	
	$commenter = wp_get_current_commenter();
	
	if ( have_comments() ) :?>
		<aside class="styled_header style2"><h6><?php comments_number(__('Reviews <strong>(0)</strong>', THB_THEME_NAME), __('Reviews <strong>(1)</strong>', THB_THEME_NAME), __('Reviews <strong>(%)</strong>', THB_THEME_NAME) ); ?></h6></aside>
		<?php
		echo '<ol class="commentlist">';

		wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) );

		echo '</ol>';

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Previous',THB_THEME_NAME ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Next <span class="meta-nav">&rarr;</span>',THB_THEME_NAME ) ); ?></div>
			</div>
		<?php endif;

	endif;
	
	echo '<a href="#comment_popup" id="comments_popup_link" rel="inline" data-class="review-popup">'. __( 'Add Review',THB_THEME_NAME ) .'</a>';
	
	$comment_form = array(
			'title_reply' => __( 'Add a Review', THB_THEME_NAME ),
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => array(
				'author' => '<div class="row"><div class="small-12 medium-6 columns">' . '<label for="author">' . __( 'Name',THB_THEME_NAME ) . ' <span class="required">*</span></label> ' .
				            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" class="full" /></div>',
				'email'  => '<div class="small-12 medium-6 columns"><label for="email">' . __( 'Email',THB_THEME_NAME ) . ' <span class="required">*</span></label> ' .
				            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" class="full" /></div></div>',
			),
			'label_submit' => __( 'Submit Review',THB_THEME_NAME ),
			'logged_in_as' => '',
			'comment_field' => ''
			
		);
	
		if ( get_option('woocommerce_enable_review_rating') == 'yes' ) {
	
			$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Rating',THB_THEME_NAME ) .'</label><select name="rating" id="rating">
				<option value="">'.__( 'Rate&hellip;',THB_THEME_NAME ).'</option>
				<option value="5">'.__( 'Perfect',THB_THEME_NAME ).'</option>
				<option value="4">'.__( 'Good',THB_THEME_NAME ).'</option>
				<option value="3">'.__( 'Average',THB_THEME_NAME ).'</option>
				<option value="2">'.__( 'Not that bad',THB_THEME_NAME ).'</option>
				<option value="1">'.__( 'Very Poor',THB_THEME_NAME ).'</option>
			</select></p>';
	
		}
	
		$comment_form['comment_field'] .= '<div class="row"><div class="twelve columns"><label for="comment">' . __( 'Your Review',THB_THEME_NAME ) . '</label><textarea id="comment" name="comment" cols="45" rows="22" aria-required="true" class="full"></textarea></div></div>' . wp_nonce_field( 'woocommerce-comment_rating', '_wpnonce', true, false );
	
		echo '</div>';
		
	
		

?>
				<aside id="comment_popup" class="mfp-hide">
					<div class="row">
						<div class="small-12 columns">
							<?php comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) ); ?>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</div>
<?php endif; ?>