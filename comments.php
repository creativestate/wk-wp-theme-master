<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="wk-comments">
	<div>
		<?php if ( have_comments() ) : ?>
			<h2 class="comments-title">
				<?php
					printf(_n('One response on &ldquo;<span>%2$s</span>&rdquo;', '%1$s responses on &ldquo;<span>%2$s</span>&rdquo;', get_comments_number(), ZS_THEME_TEXT_DOMAIN), number_format_i18n(get_comments_number()), get_the_title());
				?>
			</h2>

			<?php the_comments_navigation(); ?>

			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 64,
					) );
				?>
			</ol><!-- .comment-list -->

			<?php the_comments_navigation(); ?>

		<?php endif; // Check for have_comments(). ?>

		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'twentysixteen' ); ?></p>
		<?php endif; ?>

		<?php
			$commenter = wp_get_current_commenter();
			$req = get_option('require_name_email');
			$fields = array(
				'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Name') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
				'<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" maxlength="245" aria-required="true" required="required"/></p>',
				'email' => '<p class="comment-form-email"><label for="email">' . __('Email') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
				'<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" maxlength="100" aria-describedby="email-notes" aria-required="true" required="required"/></p>',
				'url' => '',
			);
			
			$comment_args = array(
				'fields' => $fields,
			);
			
			comment_form($comment_args);
		?>
	</div>
</div><!-- .comments-area -->
