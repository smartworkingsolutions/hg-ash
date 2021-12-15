<?php
/**
 * Menu Walker.
 *
 * @package HGAsh
 */

defined( 'WPINC' ) || exit;

/**
 * Main class
 */
class HGAsh_Menu_Walker {

	public $menu_id = ''; 
	public $data = [];
	
	public function __construct( $menu_id ) {
		$this->menu_id = $menu_id;
		$cache = new get_menu_cache( $this->menu_id );
		$this->data = $cache->data; 
	}

	/**
	 * Build the mega menu with one tier drop downs
	 * Needs to be wrapped in a container/nav tag when 
	 * output in template
	 *
	 * @return $html
	 */
	public function build_menu() {

		global $options;

		$menu_html = '<ul class="navbar-nav ms-auto" id="nav" style="display: none;">';
		
		foreach( $this->data as $link ) {

			$target = "";
			if ( $link['target'] != "" ) {
				$target = ' target="'.$link['target'].'" ';
			}

			$menu_html .= "<li>";

			$menu_html .= "<a href=".$link['url']." ".$target." class='footerTop__links__link' >".$link['title']."</a>";

			if ( ! empty( $link['children'] ) && is_array( $link['children'] ) ) {
				$menu_html .= '<ul>';
			}

			foreach($link['children'] as $child) {
				$menu_html .= "<li>";
				if ( empty( $child['children'] ) ) {
					$menu_html .= "<a href=".$child['url'].">".$child['title']." </a>";
				}
				$menu_html .= "</li>";
			}

			if ( ! empty( $link['children'] ) && is_array( $link['children'] ) ) {
				$menu_html .= '</ul>';
			}

			$menu_html .= "</li>"; 

		}

		$menu_html .= "</ul>";

		return $menu_html;

	}

}

// Init
// new HGAsh_Menu_Walker();
