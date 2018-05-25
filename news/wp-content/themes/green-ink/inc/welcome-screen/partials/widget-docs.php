<?php
/**
 * Docs widget on a welcome screen.
 *
 * @package Green Ink.
 */

?>

<div class="welcome-screen-widget card">
	<h2><?php esc_html_e( 'Looking For Help?', 'green-ink' ); ?></h2>
	<p><?php esc_html_e( 'We have more docs and tutorials at our website. Check them out if you need more detailed information about the theme.', 'green-ink' ); ?></p>
	<?php
		printf(
			'<p><a href="%s" class="button button-primary">%s</a></p>',
			'http://docs.pressfore.com/green-ink/',
			esc_html__( 'View Documentation', 'green-ink' )
		);
	?>

</div>
