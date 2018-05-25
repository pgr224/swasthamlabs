<?php
/**
 * Green ink Theme Info Screen.
 *
 * @package Green Ink
 */

/**
 * Creates Theme info screen.
 *
 */
class Green_Ink_Theme_Info_Screen {

	/**
	 * Current theme object.
	 *
	 * @var object
	 */
	private $theme;

	/**
	 * Current theme URL.
	 *
	 * @var string
	 */
	private $theme_url;

	/**
	 * Current theme Author URL
	 *
	 * @var string
	 */
	private $theme_author_url;

	/**
	 * Current theme version.
	 *
	 * @var string
	 */
	private $version;

	/**
	 * Class Constructor.
	 */
	public function __construct() {

		$this->theme = wp_get_theme();
		$this->theme_url = $this->theme->get( 'ThemeURI' );
		$this->theme_author_url = $this->theme->get( 'AuthorURI' );
		$this->version = green_ink_get_version();

		add_action( 'admin_menu', array( $this, 'green_ink_theme_info_screen_register_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'green_ink_theme_info_screen_style' ) );

		add_action( 'green_ink_theme_info_screen', array( $this, 'green_ink_theme_info_screen_info' ), 10 );
		add_action( 'green_ink_theme_info_screen', array( $this, 'green_ink_theme_info_screen_tab_nav' ), 20 );

		add_action( 'green_ink_theme_info_screen_tabs', array( $this, 'green_ink_theme_info_screen_tab_title_features' ), 30 );
		add_action( 'green_ink_theme_info_screen_tabs', array( $this, 'green_ink_theme_info_screen_tab_title_plugins' ), 40 );
		add_action( 'green_ink_theme_info_screen_tabs', array( $this, 'green_ink_theme_info_screen_tab_title_support' ), 50 );

		if( class_exists('Green_Ink_Pro') ) {
			add_action( 'green_ink_theme_info_screen_tabs', array( $this, 'green_ink_theme_info_screen_tab_title_pro' ), 60 );
		}

		add_action( 'green_ink_theme_info_screen', array( $this, 'green_ink_theme_info_screen_tab_features' ), 70 );
		add_action( 'green_ink_theme_info_screen', array( $this, 'green_ink_theme_info_screen_tab_plugins' ), 80 );
		add_action( 'green_ink_theme_info_screen', array( $this, 'green_ink_theme_info_screen_tab_support' ), 90 );

		if( class_exists('Green_Ink_Pro') ) {
			add_action( 'green_ink_theme_info_screen', array( $this, 'green_ink_theme_info_screen_tab_pro' ), 100 );
		}

		add_action( 'green_ink_theme_info_screen_sidebar', array( $this, 'green_ink_theme_info_screen_sidebar_docs' ), 110 );
	}

	/**
	 * Enqueue theme info screen JS and CSS.
	 */
	public function green_ink_theme_info_screen_style() {
		$screen = get_current_screen();

		if( is_admin() && 'appearance_page_green_ink-getting-started' === $screen->base ) {
			wp_enqueue_style('green_ink-welcome-screen', get_template_directory_uri() . '/inc/welcome-screen/css/welcome-screen.css', $this->version);
			wp_enqueue_script('green-ink-welcome-screen', get_template_directory_uri() . '/inc/welcome-screen/js/welcome-screen.js', $this->version);
		}
	}

	/**
	 * Creates the dashboard page.
	 */
	public function green_ink_theme_info_screen_register_menu() {
		add_theme_page( esc_html__( 'Getting Started', 'green-ink' ), esc_html__( 'Getting Started', 'green-ink' ), 'read', 'green_ink-getting-started', array( $this, 'green_ink_theme_info_screen_screen' ) );
	}

	/**
	 * Theme Info Screen.
	 */
	public function green_ink_theme_info_screen_screen() {
		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );

		echo '<div class="wrap tp-theme-info">';

			do_action( 'green_ink_theme_info_screen' );

			echo '<div class="theme-info-sidebar">';

				do_action( 'green_ink_theme_info_screen_sidebar' );

			echo '</div>';

		echo '</div>';
	}

	/**
	 * Welcome screen intro.
	 */
	public function green_ink_theme_info_screen_info() {
		require_once( get_template_directory() . '/inc/welcome-screen/partials/intro.php' );
	}

	/**
	 * Welcome screen tabs.
	 */
	public function green_ink_theme_info_screen_tab_nav() {

		echo '<h2 class="nav-tab-wrapper tp-nav-tab-wrapper">';

			do_action( 'green_ink_theme_info_screen_tabs' );

		echo '</h2>';

	}

	/**
	 * Features Tab Title.
	 */
	public function green_ink_theme_info_screen_tab_title_features() {
		printf(
			'<a href="#features" class="nav-tab nav-tab-active">%s</a>',
			esc_html__( 'Features', 'green-ink' )
		);
	}

	/**
	 * Plugins Tab Title.
	 */
	public function green_ink_theme_info_screen_tab_title_plugins() {
		printf(
			'<a href="#plugins" class="nav-tab">%s</a>',
			esc_html__( 'Plugins', 'green-ink' )
		);
	}

	/**
	 * Support Tab Title.
	 */
	public function green_ink_theme_info_screen_tab_title_support() {
		printf(
			'<a href="#support" class="nav-tab">%s</a>',
			esc_html__( 'Support', 'green-ink' )
		);
	}

	/**
	 * Pro Tab Title.
	 */
	public function green_ink_theme_info_screen_tab_title_pro() {
		printf(
				'<a href="#pro" class="nav-tab nav-tab-pro">%1$s</a>',
				esc_html__( 'Green Ink Pro', 'green-ink' )
		);
	}

	/**
	 * Features Tab.
	 */
	public function green_ink_theme_info_screen_tab_features() {
		require_once( get_template_directory() . '/inc/welcome-screen/partials/tab-features.php' );
	}

	/**
	 * Plugins Tab.
	 */
	public function green_ink_theme_info_screen_tab_plugins() {
		require_once( get_template_directory() . '/inc/welcome-screen/partials/tab-plugins.php' );
	}

	/**
	 * Support Tab.
	 */
	public function green_ink_theme_info_screen_tab_support() {
		require_once( get_template_directory() . '/inc/welcome-screen/partials/tab-support.php' );
	}

	/**
	 * Pro Tab.
	 */
	public function green_ink_theme_info_screen_tab_pro() {
		require_once( get_template_directory() . '/inc/welcome-screen/partials/tab-pro.php' );
	}

	/**
	 * Sidebar Docs.
	 */
	public function green_ink_theme_info_screen_sidebar_docs() {
		require_once( get_template_directory() . '/inc/welcome-screen/partials/widget-docs.php' );
	}

	/**
	 * Checks if given plugin is installed.
	 *
	 * @param  string $path Path to the main plugin file relative to the 'plugins' folder.
	 *
	 * @return bool True if plugin is installed.
	 */
	public function green_ink_theme_info_screen_is_plugin_installed( $path ) {
		if ( $path ) {
			// Get the list of all plugins.
			$plugins = get_plugins();

			// Check if given plugin is in the list.
			if ( array_key_exists( $path, $plugins ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Displays the Install button for a plugin.
	 *
	 * @param  string $slug  The slug of the plugin.
	 * @param  string $path  Path to the main file of the plugin.
	 * @param  string $class Class name to check for.
	 */
	public function green_ink_theme_info_screen_plugin_install_button( $slug, $path, $class ) {

		// Check if plugin is installed or not.
		if ( $this->green_ink_theme_info_screen_is_plugin_installed( $path ) ) {
			// Check if plugin is activated or not.
			if ( is_plugin_inactive( $path ) ) {
				printf(
					'<p class="description">%s</p>',
					esc_html__( 'This plugin is installed but not activated. You need to go to the Plugins page and activate it.', 'green-ink' )
				);

				printf(
					'<p class="tp-theme-feature-buttons"><a href="%s" target="_blank" class="button">%s</a></p>',
					esc_url( self_admin_url( 'plugins.php' ) ),
					esc_html__( 'Go to Plugins Page and Activate', 'green-ink' )
				);

			} else {
				printf(
					'<p class="tp-theme-feature-buttons"><span class="button button-disabled">%s</span></p>',
					esc_html__( 'Installed & Activated', 'green-ink' )
				);
			}
		} else {
			printf(
				'<p class="tp-theme-feature-buttons"><a href="%s" target="_blank" class="button button-primary">%s</a></p>',
				esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=' . $slug ), 'install-plugin_' . $slug ) ),
				esc_html__( 'Install', 'green-ink' )
			);
		}
	}
}

$GLOBALS['Green_Ink_Theme_Info_Screen'] = new Green_Ink_Theme_Info_Screen();
