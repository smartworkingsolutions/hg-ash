<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HGAsh
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- PAGE LOADING
================================================== -->
<!-- <div id="preloader"></div> -->

<div id="page" class="main-wrapper">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'hgash' ); ?></a>

	<?php theme_header_html(); ?>

	<?php
	/**
	 * Add content after header.
	 *
	 * @hooked get_page_featured_section - 10
	 * (outputs Featured image, title and breadcrumbs)
	 */
	do_action( 'hgash_after_header' );
	?>
