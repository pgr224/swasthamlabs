<?php
/**
 * The loop that displays an attachment.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-attachment.php.
 *
 * @package Green Ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 */
?>

<?php if ( ! empty( $post->post_parent ) ) : ?>
	<p class="page-title">
		<a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php esc_attr( printf( '%s %s', esc_html__('Return to', 'green-ink' ), get_the_title( $post->post_parent ) ) ); ?>" rel="gallery">
		<?php printf( '<span class="meta-nav">&larr;</span> %s', get_the_title( $post->post_parent ) );?>
		</a>
	</p>

<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="entry-title"><?php the_title(); ?></h2>
	<div class="entry-meta">
	<?php
		printf( '<span class="%1$s">%2$s</span> %3$s',
			'meta-prep meta-prep-author',
			esc_html__( 'By', 'green-ink'),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				sprintf( '%s %s', esc_attr__( 'View all posts by', 'green-ink' ), get_the_author() ),
				get_the_author()
			)
		);
	?>
	<span class="meta-sep">|</span>
	<?php printf( '<span class="%1$s">%2$s</span> %3$s',
		'meta-prep meta-prep-entry-date',
		esc_html__( 'Published', 'green-ink' ),
		sprintf( '<span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span>',
			esc_attr( get_the_time() ),
			get_the_date()
			)
		);
		if ( wp_attachment_is_image() ) {
			echo ' <span class="meta-sep">|</span> ';
			$metadata = wp_get_attachment_metadata();
			printf(
				'%s %s %s',
				esc_html__( 'Full size is', 'green-ink' ),
				sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
					wp_get_attachment_url(),
					esc_attr( __( 'Link to full-size image', 'green-ink' ) ),
					esc_attr( $metadata['width'] ),
					esc_attr( $metadata['height'] )
				),
				esc_html__( 'pixels', 'green-ink' )
			);
		}
		?>
		<?php edit_post_link( __( 'Edit', 'green-ink' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-meta -->

	<div class="entry-content">
		<div class="entry-attachment">
			<?php if ( wp_attachment_is_image() ) :
				$attachments = array_values( get_children( array(
					'post_parent' => $post->post_parent,
					'post_status' => 'inherit',
					'post_type' => 'attachment',
					'post_mime_type' => 'image',
					'order' => 'ASC',
					'orderby' => 'menu_order ID'
					))
				);
				foreach ( $attachments as $k => $attachment ) {
					if ( $attachment->ID == $post->ID )
						break;
				}
				$k++;
				// If there is more than 1 image attachment in a gallery
				if ( count( $attachments ) > 1 ) {
					if ( isset( $attachments[ $k ] ) )
						// get the URL of the next image attachment
						$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
					else
						// or get the URL of the first image attachment
						$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
				} else {
					// or, if there's only 1 image attachment, get the URL of the image
					$next_attachment_url = wp_get_attachment_url();
				}
			?>
			<p class="attachment"><a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
				$attachment_width  = apply_filters( 'green_ink_attachment_size', 900 );
				$attachment_height = apply_filters( 'green_ink_attachment_height', 900 );
				echo wp_get_attachment_image( $post->ID, array( $attachment_width, $attachment_height ) ); // filterable image width with, essentially, no limit for image height.
			?></a></p>

			<?php do_action('green_ink_page_navi'); ?>

			<?php else : ?>

				<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>

			<?php endif; ?>

		</div><!-- .entry-attachment -->

		<div class="entry-caption"><?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?></div>
			<?php the_content(
					sprintf(
						'%s %s',
						esc_html__( 'Continue reading', 'green-ink'),
						'<span class="meta-nav">&rarr;</span>'
					)
			); ?>

			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'green-ink' ), 'after' => '</div>' ) ); ?>

		</div><!-- .entry-content -->

		<div class="entry-utility">
			<?php green_ink_posted_in(); ?>
			<?php edit_post_link( esc_html__( 'Edit', 'green-ink' ), ' <span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-utility -->
		
</article><!-- #post-## -->

<?php comments_template(); ?>