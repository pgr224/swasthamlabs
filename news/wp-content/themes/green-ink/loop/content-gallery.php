<article id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>

	<?php 
		/**
		* Main hook that will add single post markup
		*
		*/
		do_action( 'green_ink_single_post_markup' );
	?>	

</article><!-- #post-## -->

<?php 
	/**
	* After single template action
	*
	*/
	do_action( 'green_ink_single_after' );
?>	