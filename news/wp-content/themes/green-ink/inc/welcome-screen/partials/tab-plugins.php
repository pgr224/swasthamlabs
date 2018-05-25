<?php
/**
 * Plugins Tab on a welcome screen.
 *
 * @package Green Ink.
 */

?>

<div id="plugins" class="tp-tab-content card">

	<h2 class="tab-heading"><?php esc_html_e( 'Recommended Plugins', 'green-ink' ); ?></h2>

	<p><?php esc_html_e( 'Green Ink is built to work with the following plugins. We recommend installing at least Rolo Slider and King Composer to create beautiful pages. To replicate the demo, you can download the demo content from our website and import it.', 'green-ink' ); ?></p>
	
	<h3><?php esc_html_e('Rolo Slider', 'green-ink'); ?></h3>

	<p><?php esc_html_e( 'Adds very flexible and easy to use Slider to your website with ken burns effect and layer elements.', 'green-ink' ); ?></p>
	
	<?php $this->green_ink_theme_info_screen_plugin_install_button( 'rolo-slider', 'rolo-slider/init.php', 'Rolo_Slider' ); ?>

	<hr>

	<h3><?php esc_html_e('King Composer', 'green-ink'); ?></h3>

	<p><?php esc_html_e( 'Adds powerwull page builder whicj is easy to use. You can create beautifull pages stright away with drag and drop visual page builder.', 'green-ink' ); ?></p>

	<?php $this->green_ink_theme_info_screen_plugin_install_button( 'kingcomposer', 'kingcomposer/kingcomposer.php', 'Kingcomposer' ); ?>	

	<hr>

	<h3><?php esc_html_e('Winning Portfolio', 'green-ink'); ?></h3>

	<p><?php esc_html_e( 'Adds portfolio functionality to your website. You can list portfolios, and choose whether you want for your portfolios to link to the external page, or to lead to portfolio single page where some info will be disolayed, along with pictures.', 'green-ink' ); ?></p>

	<?php $this->green_ink_theme_info_screen_plugin_install_button( 'winning-portfolio', 'winning-portfolio/main.php', 'winning_portfolio' ); ?>

	<hr>
	
	<h3><?php esc_html_e('Contact Form 7', 'green-ink'); ?></h3>

	<p><?php esc_html_e( 'Creates contact forms that can be easily added to posts, pages, and widgets.', 'green-ink' ); ?></p>

	<?php $this->green_ink_theme_info_screen_plugin_install_button( 'contact-form-7', 'contact-form-7/wp-contact-form-7.php', 'WPCF7' ); ?>

	<hr>

	<h3><?php esc_html_e('WP-PageNavi', 'green-ink'); ?></h3>

	<p><?php esc_html_e( 'Adds numbered pagination to your blog page. If you want to display pagination instead of simple older/newer posts navigation on your blog list page, install this plugin.', 'green-ink' ); ?></p>

	<?php $this->green_ink_theme_info_screen_plugin_install_button( 'wp-pagenavi', 'wp-pagenavi/wp-pagenavi.php', 'wp_pagenavi' ); ?>

	<hr>

	<h3><?php esc_html_e('One Click Demo Import', 'green-ink'); ?></h3>

	<p><?php printf( '%s <a href="%s">%s</a>',
			esc_html__( 'Adds Demo import page. If you want to import demo content to have starting point, you can install this plugin and use the xml file from our website. You can download xml with the demo content', 'green-ink' ),
			esc_url('#'),
			esc_html__('HERE', 'green-ink')
		); ?></p>

	<?php $this->green_ink_theme_info_screen_plugin_install_button( 'one-click-demo-import', 'one-click-demo-import/one-click-demo-import.php', 'one-click-demo-import' ); ?>

</div>
