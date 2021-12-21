<?php
/**
 * HGAsh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HGAsh
 */

if ( ! defined( 'THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'THEME_VERSION', '1.0.0' );
}

if ( ! function_exists( 'hgash_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hgash_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on HGAsh, use a find and replace
		 * to change 'hgash' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hgash', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 856, 514, true );
		add_image_size( 'hgash-slider', 1920, 900, true ); // Slider.
		add_image_size( 'hgash-about', 696, 816, true ); // About us image.
		add_image_size( 'hgash-author', 80, 80, true ); // Author thumb.
		add_image_size( 'hgash-why-us', 972, 670, true ); // Why us image.
		add_image_size( 'hgash-team', 551, 580, true ); // Team image.
		add_image_size( 'hgash-testimonials', 1920, 600, true ); // Testimonials BG image.
		add_image_size( 'hgash-blog', 856, 514, true ); // Blog image.
		add_image_size( 'hgash-blog-thumb', 69, 70, true ); // Blog thumb image.

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			[
				'main-menu' => esc_html__( 'Primary', 'hgash' ),
			]
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			]
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'hgash_custom_background_args',
				[
					'default-color' => 'ffffff',
					'default-image' => '',
				]
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			[
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			]
		);
	}
endif;
add_action( 'after_setup_theme', 'hgash_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hgash_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hgash_content_width', 640 );
}
add_action( 'after_setup_theme', 'hgash_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hgash_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Sidebar', 'hgash' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hgash' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);
}
add_action( 'widgets_init', 'hgash_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hgash_scripts() {

	$version = CUSTOMCACHE_VERSION;
	$path    = get_template_directory_uri();

	/**
	 * Styles
	 */
	// Plugins.
	wp_enqueue_style( 'hgash-plugins', $path . '/css/plugins.css', [], $version );

	// Search css.
	wp_enqueue_style( 'hgash-search', $path . '/css/search.css', [], $version );

	// Quform css.
	wp_enqueue_style( 'hgash-quform-base', $path . '/css/quform/base.css', [], $version );

	// Main style css.
	wp_enqueue_style( 'hgash-style', get_stylesheet_uri(), [], $version );

	// Custom css.
	wp_enqueue_style( 'hgash-custom', $path . '/css/custom.css', [], $version );

	/**
	 * Scripts
	 */

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Theme's scrips.
	wp_enqueue_script( 'hgash-popper', $path . '/js/popper.js', [], $version, true );
	wp_enqueue_script( 'hgash-bootstrap', $path . '/js/bootstrap.min.js', [], $version, true );
	wp_enqueue_script( 'hgash-scrollIt', $path . '/js/scrollIt.min.js', [], $version, true );
	wp_enqueue_script( 'hgash-search', $path . '/js/search.js', [], $version, true );
	wp_enqueue_script( 'hgash-nav-menu', $path . '/js/nav-menu.js', [], $version, true );
	wp_enqueue_script( 'hgash-easy-responsive-tabs', $path . '/js/easy.responsive.tabs.js', [], $version, true );
	wp_enqueue_script( 'hgash-owl-carousel', $path . '/js/owl.carousel.js', [], $version, true );
	wp_enqueue_script( 'hgash-owl-carousel-thumbs', $path . '/js/owl.carousel.thumbs.js', [], $version, true );
	wp_enqueue_script( 'hgash-counterup', $path . '/js/jquery.counterup.min.js', [], $version, true );
	wp_enqueue_script( 'hgash-stellar', $path . '/js/jquery.stellar.min.js', [], $version, true );
	wp_enqueue_script( 'hgash-waypoints', $path . '/js/waypoints.min.js', [], $version, true );
	wp_enqueue_script( 'hgash-countdown', $path . '/js/jquery.countdown.js', [], $version, true );
	wp_enqueue_script( 'hgash-magnific-popup', $path . '/js/jquery.magnific-popup.min.js', [], $version, true );
	wp_enqueue_script( 'hgash-lightgallery-all', $path . '/js/lightgallery-all.js', [], $version, true );
	wp_enqueue_script( 'hgash-mousewheel', $path . '/js/jquery.mousewheel.min.js', [], $version, true );
	wp_enqueue_script( 'hgash-wow', $path . '/js/wow.js', [], $version, true );
	wp_enqueue_script( 'hgash-isotope-pkgd', $path . '/js/isotope.pkgd.min.js', [], $version, true );
	wp_enqueue_script( 'hgash-main', $path . '/js/main.js', [ 'jquery' ], $version, true );
	wp_enqueue_script( 'hgash-quform-plugins', $path . '/js/quform/plugins.js', [], $version, true );
	wp_enqueue_script( 'hgash-quform-scripts', $path . '/js/quform/scripts.js', [], $version, true );

	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$sticky_logo    = get_theme_mod( 'sticky_header_logo' );
	$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
	$image_url      = $logo[0];
	$page_logo      = get_theme_mod( 'page_logo' );

	if ( ! is_page_template( 'page-home.php' ) ) {
		$image_url = $page_logo;
	}

	// WP Localize.
	wp_localize_script(
		'hgash-main',
		'hgash_local',
		[
			'logo'       => $logo ? $image_url : '',
			'stickylogo' => $sticky_logo ? $sticky_logo : '',
		]
	);

}
add_action( 'wp_enqueue_scripts', 'hgash_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * All classes here
 */
require get_template_directory() . '/inc/class-hgash-menu-walker.php';
require get_template_directory() . '/inc/class-hgash-actions.php';
require get_template_directory() . '/inc/class-custom-post-types.php';

/**
 * Load ACF Options panel.
 */
require get_template_directory() . '/inc/class-acf-options-panel.php';

/**
 * ACF content filter preview path.
 */
function get_acf_preview_path() {
	return 'template-parts/acf/images';
}
add_filter( 'acf-flexible-content-preview.images_path', 'get_acf_preview_path' );
