<?php
/**
 * BoldGrid Source Code
 *
 * @package Boldgrid_Inspirations_Attribution
 * @copyright BoldGrid.com
 * @version $Id$
 * @author BoldGrid.com <wpb@boldgrid.com>
 */

/**
 * The BoldGrid Attribution class.
 */
class Boldgrid_Inspirations_Attribution {

	/**
	 * An array of assets, the boldgrid_asset option.
	 *
	 * @since 1.3.1
	 * @var array
	 */
	public $assets;

	/**
	 * Language strings.
	 *
	 * @since 1.2.9
	 * @var array
	 */
	public $lang;

	/**
	 * An array of license details.
	 *
	 * @since 1.3.1
	 * @var array
	 */
	public $license_details;

	/**
	 * Constructor
	 *
	 * @param array $settings
	 */
	public function __construct( ) {
		// Define our language strings.
		$this->lang = $this->get_lang();

		$this->set_license_details();

		$this->assets = get_option( 'boldgrid_asset', array() );
	}

	/**
	 * Add hooks.
	 */
	public function add_hooks() {
		if ( is_admin() ) {
			add_action( 'save_post', array( $this, 'save_post' ) );
		}
	}

	/**
	 * Add frontend hooks.
	 *
	 * @since 1.1.2
	 */
	public function add_wp_hooks() {
		/*
		 * Add a noindex meta tag to the attribution page.
		 *
		 * This action is intended to add 'noindex' to the attribution page so it is not picked up
		 * by search engines. This however is not yet ready for launch, so we'll return and abort.
		 */
		return;
		add_action( 'wp_head',
			array(
				$this,
				'noindex',
			)
		);
	}

	/**
	 * Build our attribution page.
	 *
	 * @since 1.0
	 */
	public function build_attribution_page() {
		// Get our attribution page. If it doesn't exist, this function will also create it.
		$attribution_page = Boldgrid_Inspirations_Attribution_Page::get();

		// Loop through each asset and determine if it needs attribution.
		$this->flag_needs_attribution();

		// Create the html of the attribution page.
		$this->save_attribution_html( $attribution_page );
	}

	/**
	 * Add 'noindex' to attribution page.
	 *
	 * @since 1.1.2
	 * @see Boldgrid_Inspirations_Attribution::current_page_is_attribution_page().
	 * @link https://support.google.com/webmasters/answer/93710?hl=en
	 */
	public function noindex() {
		/*
		 * todo: When this feature is enabled again, it needs to use
		 * Boldgrid_Inspirations_Attribution_Page::is_current()
		 */
		if ( $this->current_page_is_attribution_page() ) {
			echo "\n<meta name='robots' content='noindex'>\n";
		}
	}

	/**
	 * Loop through each asset and determine if it needs attribution.
	 *
	 * @since 1.0
	 */
	public function flag_needs_attribution() {
		$attribution_asset = new Boldgrid_Inspirations_Attribution_Asset();

		// If we don't have any images, abort.
		if( empty( $this->assets['image'] ) ) {
			return;
		}

		foreach( $this->assets['image'] as $asset_key => $asset ) {
			if( true === $attribution_asset->needs_attribution( $asset, 'image' ) ) {
				$this->assets['image'][$asset_key]['needs_attribution'] = true;
			}
		}
	}

	/**
	 * Return our lang array.
	 *
	 * @since 1.3.1
	 */
	public static function get_lang() {
		return array(
			// Used for the page title.
			'Attribution' => __( 'Attribution', 'boldgrid-inspirations' ),
			// Used for the page slug.
			'attribution' => __( 'attribution', 'boldgrid-inspirations' ),
			'post_type' => 'bg_attribution',
		);
	}

	/**
	 * Generate the HTML of the Attribution page and save it into the Attribution page.
	 *
	 * @since 1.0
	 *
	 * @param object $attribution_page Our Attribution page object.
	 */
	public function save_attribution_html( $attribution_page ) {
		include BOLDGRID_BASE_DIR . '/pages/attribution.php';

		$image_attribution_html = '';

		$image_attribution_array = array();

		$html = $attribution_heading;

		$column_css = 'col-xs-12 col-sm-3 col-md-3 col-lg-3 attributed';

		$style = '
			<style>
				.attributed{height:250px;overflow:hidden;}
				.attributed img{max-height:180px;}
			</style>
			<div class="row">
		';

		/*
		 * Create an array of html markup that provides attribution per image.
		 */

		if ( ! empty( $this->assets['image'] ) ) {
			foreach ( $this->assets['image'] as $asset ) {

				if ( isset( $asset['needs_attribution'] ) && true === $asset['needs_attribution'] ) {

					$attribution_details = array(
						'thumbnail' => wp_get_attachment_image_src( $asset['attachment_id'] ),
						'details' => json_decode( $asset['attribution'] ),
					);

					$image_attribution_array[] = $this->create_attribution_html( $attribution_details );
				}
			}

			if ( count( $image_attribution_array ) > 0 ) {
				$image_attribution_html .= $style;

				foreach ( $image_attribution_array as $array_key => $single_image_html ) {
					$image_attribution_html .= sprintf(
						'<div class="%s"> %s </div>',
						$column_css,
						$single_image_html
					);
				}

				$image_attribution_html .= '</div>';
			}
		}

		// If we have HTML to attribute our images, then update $html to include it.
		if ( ! empty( $image_attribution_html ) ) {
			$html .= $attribution_image_heading . $image_attribution_html;

			$in_addition_this = 'In addition, this ';
		} else {
			$in_addition_this = 'This ';
		}

		// Add attribution to WordPress and Inspirations.
		$html .= '<hr />' . sprintf( $attribution_wordpress_and_inspirations, $in_addition_this );

		// Add attribution for additional plugins.
		$html .= $attribution_additional_plugins;

		// Allow the <style> tag on the attribution page.
		add_filter( 'wp_kses_allowed_html',
			array(
				$this,
				'attribution_wp_kses_allowed_html',
			), 1
		);

		$attribution_page->post_content = $html;
		wp_update_post( $attribution_page );
	}

	/**
	 * Allow the <style> tag on the attribution page.
	 *
	 * @since 1.0
	 */
	public function attribution_wp_kses_allowed_html( $tags ) {
		if ( ! isset( $tags['style'] ) ) {
			$tags['style'] = array ();
		}

		return $tags;
	}

	/**
	 * When saving a post, flag that the Attribution page needs to be rebuild.
	 *
	 * @since 1.3.1
	 */
	public function save_post( $post_id ) {
		update_option( 'boldgrid_attribution_rebuild', true );
		return;
	}

	/**
	 * Set attribution HTML for one item.
	 *
	 * @param array $attribution_details Attribution details array.
	 *
	 * @return string
	 */
	public function create_attribution_html( $attribution_details ) {
		if ( isset( $attribution_details['details']->license ) && is_numeric( $attribution_details['details']->license ) ) {
			$license_id = $attribution_details['details']->license;
		}

		// Create the image to show.
		if ( isset( $attribution_details['thumbnail'][0] ) ) {
			$image_tag = "<img src='" . $attribution_details['thumbnail'][0] . "' />";
		} else {
			$image_tag = "<img src='http://placehold.it/300x150&text=Image%20not%20available' />";
		}

		// Create the link to the image's homepage.
		if ( isset( $attribution_details['details']->image_homepage ) ) {
			$image_tag = sprintf(
				'<a href="%s" target="_blank">%s</a>',
				$attribution_details['details']->image_homepage,
				$image_tag
			);
		}

		// Create the link to the author.
		$author = '<strong>' . __( 'Author', 'boldgrid-inspirations' ) . '</strong>: ';
		if ( isset( $attribution_details['details']->author_username ) ) {
			if ( isset( $attribution_details['details']->author_url ) ) {
				$author .= sprintf(
					'<a href="%s" target="_blank">%s</a>',
					$attribution_details['details']->author_url,
					$attribution_details['details']->author_username
				);
			} else {
				$author .= $attribution_details['details']->author_username;
			}
		} else {
			$author .= '<em>' . __( 'Unknown', 'boldgrid-inspirations' ) . '</em>';
		}

		// Create the link to the license.
		$license = '<strong>' . __( 'License', 'boldgrid-inspirations' ) . '</strong>: ';
		if ( isset( $license_id ) && isset( $this->license_details[$license_id] ) ) {
			$license .= sprintf(
				'<a href="%s" target="_blank"><img src="%s" title="%s" /></a>',
				$this->license_details[$license_id]['url'],
				$this->license_details[$license_id]['icon'],
				$this->license_details[$license_id]['name']
			);
		} else {
			$license .= '<em>' . __( 'Unknown license', 'boldgrid-inspirations' ) . '</em>';
		}

		return $image_tag . "<br />" . $author . "<br />" . $license;
	}

	/**
	 * Flickr license id's: https://www.flickr.com/services/api/flickr.photos.licenses.getInfo.html .
	 *
	 * Create Commons icons: https://licensebuttons.net/l/.
	 *
	 * @since 1.0
	 */
	public function set_license_details() {
		$this->license_details = array(
			'4' => array(
				'name' => 'Attribution License',
				'icon' => 'https://licensebuttons.net/l/by/2.0/80x15.png',
				'url' => 'http://creativecommons.org/licenses/by/2.0/',
			),
			'5' => array(
				'name' => 'Attribution-ShareAlike License',
				'icon' => 'https://licensebuttons.net/l/by-sa/2.0/80x15.png',
				'url' => 'http://creativecommons.org/licenses/by-sa/2.0/',
			),
			'6' => array(
				'name' => 'Attribution-NoDerivs License',
				'icon' => 'https://licensebuttons.net/l/by-nd/2.0/80x15.png',
				'url' => 'http://creativecommons.org/licenses/by-nd/2.0/',
			)
		);
	}
}
