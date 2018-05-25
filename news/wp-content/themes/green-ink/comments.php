<?php
/**
 * @package green ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
*/

if ( post_password_required() ) {
	return;
}

?>
<div id="comments">

<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>

	<h2><?php $comments_number = get_comments_number();
		if ( '1' === $comments_number ) {
			printf(
					/* translators: %s: post title */
					'%s &ldquo;%s&rdquo;',
					_x( 'One Reply to', 'comments title', 'green-ink' ),
					get_the_title()
			);
		} else {
			printf(
				/* translators: 1: number of comments, 2: post title */
				_nx(
					'%1$s Reply to &ldquo;%2$s&rdquo;',
					'%1$s Replies to &ldquo;%2$s&rdquo;',
					$comments_number,
					'comments title',
					'green-ink'
				),
				number_format_i18n( $comments_number ),
				get_the_title()
			);
		}
	?></h2>

	<ul class="commentlist">
	<?php wp_list_comments("callback=green_ink_comments"); ?>
	</ul>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>


<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php
$aria_req = ( $req ? " aria-required='true'" : '' );
$comment_args = array(
		'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<p class="comment-form-author">' .
					( $req ? '<span class="required">*</span>' : '' ) .
					'<label for="author">' . esc_html__( 'Your Name','green-ink' ) . '</label> <br />' .
					'<input id="author" name="author" type="text" value="' .
					esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
					'</p>',
    			'email'  => '<p class="comment-form-email">' .
    				( $req ? '<span class="required">*</span>' : '' ) .
    				'<label for="email">' . esc_html__( 'Your Email','green-ink' ) . '</label> <br />' .
    				'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
    				'</p>',
    			'url' =>
    				'<p class="comment-form-url"><label for="url">' .
    				esc_html__( 'Website', 'green-ink' ) . '</label> <br />' .
    				'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>' ) ),
				'comment_field' => '<p class="comment-form-comment">' .
					'<label for="comment"><span class="required">*</span>' . esc_html__( 'Comment:','green-ink' ) . '</label><br />' .
					'<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
					'</p>',
				'comment_notes_after' => ''
			);
if ( get_option('comment_registration') && ! is_user_logged_in() ) : ?>
	<?php $login_url = wp_login_url( get_permalink() ); ?>
	<p> <a href="<?php echo esc_url($login_url); ?>"><?php esc_html_e('You must be logged in to post a comment.','green-ink');?></a> </p>
<?php else : comment_form($comment_args); ?>
<?php endif; // If registration required and not logged in ?>
<?php endif;?>
</div>
