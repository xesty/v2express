<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
	<div class="box" id="comments">
                <div class="cell">
					<div class="fr"><a href="#respond">我想说两句</a></div>
					<span class="fade">目前，共收到 <?php comments_number('0', '1', '%' );?> 条回复</span>
				</div>
				
				<?php foreach ($comments as $comment) : ?>
                <div id="comment">
					<div class="cell comment from_<?php comment_ID() ?>" id="comment-<?php comment_ID() ?>">
						<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tbody>
								<tr>
									<td width="48" valign="top"><?php echo get_avatar( $comment, 48 ); ?></td>
									<td width="10"></td>
									<td width="auto" valign="top">
										<div class="fr" id="reply_17345_buttons">
											<strong><small class="snow"><?php comment_date('Y.m.d') ?> <?php comment_time() ?></small></strong>
										</div>
										<div class="sep3"></div>
										<strong><?php comment_author_link() ?></strong>
										<div class="sep5"></div>
										<div class="content reply_content"><?php comment_text(); ?></div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
                </div>
				<?php endforeach; /* end for each comment */ ?>
                
    </div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
		<div class="glass" align="center"><div class="inner"><span class="fade">目前尚无回复</span></div></div>
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<div class="glass" align="center"><div class="inner"><span class="fade">评论已关闭</span></div></div>
	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>
	<div class="sep20"></div>
	<div class="box" id="respond">
		<div class="cell">
			<?php if ( is_user_logged_in() ) : ?>
				<div class="fr">
					<span class="fade">当前登录为 <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">注销 &raquo;</a></span>
				</div>
			<?php endif ?>
			<span class="fade"><?php comment_form_title( '我要加盖一层', '我要加盖一层' ); ?></span>
		</div>
		<div class="inner">
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
			
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( !is_user_logged_in() ) : ?>
				<p><input type="text" class="sl" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

				<p><input type="text" class="sl" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

				<p><input type="text" class="sl"  name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
				<label for="url"><small>Website</small></label></p>

			<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" tabindex="4" class="mll"></textarea></p>

<p><input name="submit" type="submit" class="super normal button" id="submit" tabindex="5" value="发表评论" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
