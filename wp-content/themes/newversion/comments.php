<?php if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	 
	if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'wpzoom' ); ?></p>
<?php return;	} ?>

<?php if ( have_comments() ) : ?>
 
	<p class="title title-medium"><span><?php comments_number( __('No Comments', 'wpzoom'), __('1 Comment', 'wpzoom'), __('% Comments', 'wpzoom')); ?></span></p>

	<ul class="comment-list">
	<?php wp_list_comments('type=comment&avatar_size=50&callback=mytheme_comment');?>
	</ul>
	
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link( __('&larr; Previous Comments', 'wpzoom')); ?></div>
		<div class="alignright"><?php next_comments_link( __('Next Comments &rarr;', 'wpzoom')); ?></div>
	</div>
	<?php endif; // check for comment navigation ?>
	
	<?php else : // this is displayed if there are no comments so far ?>


	<?php if ('open' == $post->comment_status) : ?><!-- If comments are open, but there are no comments. -->
	
		
	<?php else : // comments are closed ?><!-- If comments are closed. -->
 
		<!--<h3 class="title title-medium"><?php _e('Comments are closed', 'wpzoom'); ?></h3>-->

	<?php endif; ?>
	
	
<?php endif; ?>
 

<?php if ('open' == $post->comment_status) : ?>
 
	<div class="cleaner">&nbsp;</div>
	<div id="respond">

		<p class="title title-medium"><span><?php comment_form_title( __('Add a comment', 'wpzoom' ), __('Leave a reply to %s', 'wpzoom')); ?></span></p>
		
		<div class="cancel-comment-reply"><?php cancel_comment_reply_link( __('Cancel reply', 'wpzoom')); ?></div>

			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			
			<p><?php _e('You must be', 'wpzoom') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in', 'wpzoom') ?></a> <?php _e('to post a comment.', 'wpzoom') ?></p>
 
			<?php else : ?>

 		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

			<?php if ( $user_ID ) : ?>
			
			<p><?php _e('Logged in as', 'wpzoom') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="<?php _e('Log out of this account', 'wpzoom') ?>"><?php _e('Logout', 'wpzoom') ?> &raquo;</a></p>
			
 
			<?php else : ?>

				<div id="formLabels">
 
					<p>
						<label for="author"><?php _e('Your Name', 'wpzoom') ?></label>
						<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="32" tabindex="1" />
						<?php if ($req) ?><span><?php _e('required', 'wpzoom'); ?></span><?php ; ?>
					</p>

 
					<p>
						<label for="email"><?php _e('Your Email', 'wpzoom') ?></label>
						<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="32" tabindex="2" />
						<?php if ($req) ?> <span><?php _e('required', 'wpzoom'); ?></span><?php ; ?>
					</p>

 
					<p>
						<label for="url"><?php _e('Website', 'wpzoom') ?></label>
						<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="32" tabindex="3" />
						<span><?php _e('optional', 'wpzoom'); ?></span>
					</p>
				
				</div>
				
				
			<?php endif; ?>
			
			<div id="formContent">
				<p>	
					<label for="comment"><?php _e('Comment', 'wpzoom') ?></label>
					<textarea name="comment" id="comment" tabindex="4" rows="7"></textarea><br />
				</p>
				<p>	
					<label>&nbsp;</label>
					<input name="submit" type="submit" class="submit"  tabindex="5" id="submit" value="<?php _e('Submit Comment', 'wpzoom') ?>" />
				</p>
			</div>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		
		</form>
		
	<?php endif; // If registration required and not logged in ?>
	
	</div>
	
<?php endif; // if you delete this the sky will fall on your head ?>