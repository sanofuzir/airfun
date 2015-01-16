<?php
/*-----------------------------------------------------------------------------------*/
/*  Begin processing our comments
/*-----------------------------------------------------------------------------------*/

$comment_style = (isset($_GET['blog_fullwidth_posts']) ? htmlspecialchars($_GET['blog_fullwidth_posts']) : ot_get_option('blog_fullwidth_posts'));
?>
<header id="commentsheader">
	<?php if ($comment_style == 'on') { ?><div class="row"><div class="small-12 medium-8 small-centered columns"><?php } ?>
	<div class="row">
		<div class="small-12 medium-8 columns">
			<span>
				<?php comments_number(__('<strong>0</strong> Comments', THB_THEME_NAME), __('<strong>1</strong> Comment', THB_THEME_NAME), __('<strong>%</strong> Comments', THB_THEME_NAME) ); ?>
			</span>
		</div>
		<div class="small-12 medium-4 columns">
			<a href="#" id="commenttoggle"><?php _e( 'Leave a Reply', THB_THEME_NAME ); ?></a>
		</div>
	</div>
	<?php if ($comment_style == 'on') { ?></div></div><?php } ?>
</header>
<?php if ($comment_style == 'on') { ?><div class="row"><div class="small-12 medium-8 small-centered columns"><?php } ?>
<?php
	// Comment Form
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? ' aria-required="true" data-required="true"' : '' );
	
	$defaults = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
	
		'author' => '<div class="row"><div class="small-12 medium-6 columns"><label>' . __( 'Name <span>*</span>', THB_THEME_NAME ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' class="full" /></div>',
		
		'email'  => '<div class="small-12 medium-6 columns"><label>' . __( 'Email <span>*</span>', THB_THEME_NAME ) . '</label><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' class="full" /></div>',
		
		'url'    => '<div class="small-12 columns"><label>' . __( 'Website', THB_THEME_NAME ) . '</label><input name="url" size="30" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" type="text" class="full" /></div></div>' ) ),
		
		'comment_field' => '<div class="row"><div class="small-12 columns"><label>' . __( 'Your Comment', THB_THEME_NAME ) . '</label><textarea name="comment" id="comment"' . $aria_req . ' rows="10" cols="58" class="full"></textarea></div></div>',
		
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', THB_THEME_NAME ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', THB_THEME_NAME ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published. Required fields are marked *', THB_THEME_NAME ) . '</p>',
		'comment_notes_after' => '',
		'id_form' => 'form-comment',
		'id_submit' => 'submit',
		'title_reply' => false,
		'title_reply_to' => __( 'Leave a Reply to %s', THB_THEME_NAME ),
		'cancel_reply_link' => __( 'Cancel reply', THB_THEME_NAME ),
		'label_submit' => __( 'Submit Comment', THB_THEME_NAME ),
	); 
comment_form($defaults); 
?>
<?php wp_enqueue_script('parsley'); ?>
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e("This post is password protected. Enter the password to view any comments.", THB_THEME_NAME); ?></p>
			</div><!-- #comments -->
<?php
	return;
	endif;
?>
<?php if ($comment_style == 'on') { ?></div></div><?php } ?>
<?php if ($comment_style == 'on') { ?><div class="comment-container"><div class="row"><div class="small-12 medium-8 small-centered columns"><?php } ?>
<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link(); ?></div>
				<div class="nav-next"><?php next_comments_link(); ?></div>
			</div><!-- .navigation -->
<?php endif; ?>

<?php else : 
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e("Comments are closed", THB_THEME_NAME); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>
<?php if ($comment_style == 'on') { ?></div></div></div><?php } ?>