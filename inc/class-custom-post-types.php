<?php
/**
 * Register Custom Post Types
 *
 * @package HGAsh
 */

defined( 'WPINC' ) || exit;

/**
 * Main class of Custom Post Types
 */
class Custom_Post_Types {

	/**
	 * The Construct
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'projects_custom_post_type' ] );
		add_action( 'init', [ $this, 'projects_custom_taxonomy' ] );
		add_action( 'init', [ $this, 'faqs_custom_post_type' ] );
	}

	/**
	 * Projects CPT
	 */
	public function projects_custom_post_type() {

		// Set UI labels for Custom Post Type.
		$labels = [
			'name'               => _x( 'Projects', 'Post Type General Name', 'hgash' ),
			'singular_name'      => _x( 'Project', 'Post Type Singular Name', 'hgash' ),
			'menu_name'          => __( 'Projects', 'hgash' ),
			'parent_item_colon'  => __( 'Parent Project', 'hgash' ),
			'all_items'          => __( 'All Projects', 'hgash' ),
			'view_item'          => __( 'View Project', 'hgash' ),
			'add_new_item'       => __( 'Add New Project', 'hgash' ),
			'add_new'            => __( 'Add New', 'hgash' ),
			'edit_item'          => __( 'Edit Project', 'hgash' ),
			'update_item'        => __( 'Update Project', 'hgash' ),
			'search_items'       => __( 'Search Project', 'hgash' ),
			'not_found'          => __( 'Not Found', 'hgash' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'hgash' ),
		];

		// Set other options for Custom Post Type.
		$args = [
			'label'               => __( 'projects', 'hgash' ),
			'menu_icon'           => 'dashicons-book-alt',
			'description'         => __( 'Project posts', 'hgash' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor.
			'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ],
			// You can associate this CPT with a taxonomy or custom taxonomy.
			'taxonomies'          => [ 'project_category' ],
			/**
			 * A hierarchical CPT is like Pages and can have
			 * Parent and child items. A non-hierarchical CPT
			 * is like Posts.
			 */
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			// 'show_in_rest'        => true,

		];

		// Registering your Custom Post Type.
		register_post_type( 'projects', $args );

	}

	/**
	 * Create a custom taxonomy named 'project_category' for Projects CPT.
	 */
	public function projects_custom_taxonomy() {

		$labels = [
			'name'              => _x( 'Categories', 'taxonomy general name', 'hgash' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'hgash' ),
			'search_items'      => __( 'Search Categories', 'hgash' ),
			'all_items'         => __( 'All Categories', 'hgash' ),
			'parent_item'       => __( 'Parent Category', 'hgash' ),
			'parent_item_colon' => __( 'Parent Category: ', 'hgash' ),
			'edit_item'         => __( 'Edit Category', 'hgash' ), 
			'update_item'       => __( 'Update Category', 'hgash' ),
			'add_new_item'      => __( 'Add New Category', 'hgash' ),
			'new_item_name'     => __( 'New Category Name', 'hgash' ),
			'menu_name'         => __( 'Categories', 'hgash' ),
		];

		register_taxonomy(
			'project_category',
			[ 'projects' ],
			[
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => [ 'slug' => 'project_category' ],
				'show_in_rest'      => true,
			]
		);
	}

	/**
	 * FAQs CPT
	 */
	public function faqs_custom_post_type() {

		// Set UI labels for Custom Post Type.
		$labels = [
			'name'               => _x( 'FAQs', 'Post Type General Name', 'hgash' ),
			'singular_name'      => _x( 'FAQ', 'Post Type Singular Name', 'hgash' ),
			'menu_name'          => __( 'FAQs', 'hgash' ),
			'parent_item_colon'  => __( 'Parent FAQ', 'hgash' ),
			'all_items'          => __( 'All FAQs', 'hgash' ),
			'view_item'          => __( 'View FAQ', 'hgash' ),
			'add_new_item'       => __( 'Add New FAQ', 'hgash' ),
			'add_new'            => __( 'Add New', 'hgash' ),
			'edit_item'          => __( 'Edit FAQ', 'hgash' ),
			'update_item'        => __( 'Update FAQ', 'hgash' ),
			'search_items'       => __( 'Search FAQ', 'hgash' ),
			'not_found'          => __( 'Not Found', 'hgash' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'hgash' ),
		];

		// Set other options for Custom Post Type.
		$args = [
			'label'               => __( 'FAQs', 'hgash' ),
			'menu_icon'           => 'dashicons-format-quote',
			'description'         => __( 'FAQ posts', 'hgash' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor.
			'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
			/**
			 * A hierarchical CPT is like Pages and can have
			 * Parent and child items. A non-hierarchical CPT
			 * is like Posts.
			 */
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			// 'show_in_rest'        => true,

		];

		// Registering your Custom Post Type.
		register_post_type( 'faqs', $args );
	}

}

/**
 * Init
 */
new Custom_Post_Types();
