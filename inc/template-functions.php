<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package HGAsh
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function hgash_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'hgash_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function hgash_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'hgash_pingback_header' );


/**
 * Get svg file content.
 *
 * @param string $path path of the SVG file.
 * @param string $echo print|return.
 *
 * @return string
 */
function get_svg( $path, $echo = true ) {

	$file = get_template_directory() . '/images/' . $path . '.svg';

	if ( ! file_exists( $file ) ) {
		return;
	}

	$svg = file_get_contents( $file ); // phpcs:ignore

	if ( $echo ) {
		echo $svg; // phpcs:ignore
	} else {
		return $svg;
	}
}

/**
 * Get Social Icons links.
 */
function get_social_links() {

	$social_urls   = [];
	$facebook_url  = get_field( 'facebook_url', 'options' );
	$twitter_url   = get_field( 'twitter_url', 'options' );
	$instagram_url = get_field( 'instagram_url', 'options' );
	$youtube_url   = get_field( 'youtube_url', 'options' );
	$linkedin_url  = get_field( 'linkedin_url', 'options' );

	$social_urls = [
		'facebook'  => $facebook_url ? $facebook_url : '',
		'twitter'   => $twitter_url ? $twitter_url : '',
		'instagram' => $instagram_url ? $instagram_url : '',
		'youtube'   => $youtube_url ? $youtube_url : '',
		'linkedin'  => $linkedin_url ? $linkedin_url : '',
	];

	return $social_urls;
}
