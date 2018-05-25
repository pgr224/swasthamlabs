<?php
/**
 * Support Tab on a welcome screen.
 *
 * @package Green Ink.
 */

?>

<div id="support" class="tp-tab-content card">

<h2 class="tab-heading"><?php esc_html_e( 'Support', 'green-ink' ); ?></h2>

<h3><?php esc_html_e( 'Priority Support $59', 'green-ink' ); ?></h3>

<p><?php esc_html_e( 'Priority support is a huge time-saver. On top of the basic plan, it includes answers to the more technical questions, faster responses, and theme and demo data installation. Priority Support can be provided for our free themes as well. It lasts for 45 days from the day of purchase.', 'green-ink' ); ?></p>

<p class="tp-theme-feature-buttons">
	<?php
		// Details button.
		printf(
			'<a href="%s" class="button">%s</a> ',
			esc_url( $this->theme_author_url . 'support' ),
			esc_html__( 'Details', 'green-ink' )
		);

		// Purchase Premium Support Button.
		printf(
			'<a href="%s" class="button button-primary">%s</a> ',
			esc_url( $this->theme_author_url . 'support' ),
			esc_html__( 'Purchase Priority Support', 'green-ink' )
		);
	?>
</p>

<hr>

<h3><?php esc_html_e( 'Free Support', 'green-ink' ); ?></h3>

<p><?php esc_html_e( 'Please be advised that, even though, Green Ink is free, we can not guarantee free support for it. Consider purchasing Priority Support plan to get access to our friendly dedicated support!', 'green-ink' ); ?></p>

<p><?php esc_html_e( 'We do however encourage you to tell us if something went wrong through support forum. We do our best to provide timely support there but do not guarantee it.', 'green-ink' ); ?></p>

</div>
