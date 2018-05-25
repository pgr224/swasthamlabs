<div id="entry-author-info">
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'green_ink_author_bio_avatar_size', 60 ) ); ?>
		<div class="author-title-wrap">
			<h4><?php printf( '%s %s', esc_attr__( 'About', 'green-ink' ), get_the_author() ); ?></h4>
		</div>
	</div><!-- #author-avatar -->

	<div id="author-description">
		<?php the_author_meta( 'description' ); ?>
		<div id="author-link">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
				<?php printf(
						'%s %s %s',
						esc_html__( 'View all posts by', 'green-ink' ),
						get_the_author(),
						'<span class="meta-nav">&rarr;</span>'
				); ?>
			</a>
		</div><!-- #author-link	-->
	</div><!-- #author-description -->
</div><!-- #entry-author-info -->
