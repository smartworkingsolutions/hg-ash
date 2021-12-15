<?php
/**
 * ACF Options Panel
 *
 * @package HGAsh
 */

defined( 'WPINC' ) || exit;

/**
 * Main Class.
 */
class ACF_Options_Panel {

	/**
	 * The Constructor
	 */
	public function __construct() {
		add_action( 'acf/init', [ $this, 'acf_op_init' ] );
	}

	/**
	 * ACF Options panel init.
	 */
	public function acf_op_init() {

		// Check function exists.
		if ( function_exists( 'acf_add_options_page' ) ) {

			// Add parent.
			$parent = acf_add_options_page(
				[
					'page_title' => __( 'Theme Settings', 'hgash' ),
					'menu_title' => __( 'Theme Settings', 'hgash' ),
					'icon_url'   => 'dashicons-admin-settings',
					'position'   => '5.3',
				]
			);

			// Add sub page.
			$child = acf_add_options_page(
				[
					'page_title'  => __( 'General Settings', 'hgash' ),
					'menu_title'  => __( 'General', 'hgash' ),
					'parent_slug' => $parent['menu_slug'],
				]
			);

			// Add sub page.
			$child = acf_add_options_page(
				[
					'page_title'  => __( 'Homepage Settings', 'hgash' ),
					'menu_title'  => __( 'Homepage', 'hgash' ),
					'parent_slug' => $parent['menu_slug'],
				]
			);
		}
	}

}

new ACF_Options_Panel();
