<div class="entry-utility">

<?php if( is_single() ): ?>

	<?php green_ink_posted_in(); ?>
	<?php edit_post_link( esc_html__( 'Edit', 'green-ink' ), '<span class="edit-link">', '</span>' ); ?>

<?php else: ?>

	<?php if ( count( get_the_category() ) ) : ?>
		<span class="cat-links">
			<?php printf( '<span class="%1$s">%2$s</span> <i class="fa fa-folder"></i> %3$s', 
				'entry-utility-prep entry-utility-prep-cat-links',
					esc_html__('Posted in', 'green-ink'),
				get_the_category_list( ', ' ) 
			); ?>
		</span>
		<span class="meta-sep">|</span>
	<?php endif; ?>
	<?php
		$tags_list = get_the_tag_list( '', ', ' );

		if ( $tags_list ):
	?>
		<span class="tag-links">
			<?php printf(
				'<span class="%1$s">%2$s</span> <i class="fa fa-tags"></i> %3$s',
				'entry-utility-prep entry-utility-prep-tag-links',
				esc_html__( 'Tagged', 'green-ink' ),
				wp_kses($tags_list, array(
					'a' => array(
						'href' => true,
						'rel'  => true
					)
				) )
			);
			?>
		</span>
		<span class="meta-sep">|</span>
	<?php endif; ?>
	<span class="comments-link"><i class="fa fa-comments-o"></i> <?php comments_popup_link( esc_html__( 'Leave a comment', 'green-ink' ), esc_html__( '1 Comment', 'green-ink' ), esc_html__( '% Comments', 'green-ink' ) ); ?></span>
	<?php edit_post_link( esc_html__( 'Edit', 'green-ink' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>

<?php endif; ?>

</div><!-- .entry-utility -->