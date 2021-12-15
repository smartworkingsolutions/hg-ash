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

<?php
$header_classes = 'header-style1 menu_area-light';
$nav_classes    = 'navbar-default border-bottom border-color-light-white';

if ( ! is_page_template( 'page-home.php' ) ) {
	$header_classes = 'header-style3';
	$nav_classes    = 'navbar-default';
}
?>

<div id="page" class="main-wrapper">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'hgash' ); ?></a>

	<!-- HEADER
	================================================== -->
	<header class="<?php echo esc_html( $header_classes ); ?>">

		<!-- Top bar -->
		<?php get_template_part( 'template-parts/header/top', 'bar' ); ?>

		<div class="<?php echo esc_html( $nav_classes ); ?>">

			<!-- Top search -->
			<?php get_template_part( 'template-parts/header/top', 'searchform' ); ?>

			<div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
				<div class="row align-items-center">
					<div class="col-12 col-lg-12">
						<div class="menu_area alt-font">

							<nav class="navbar navbar-expand-lg navbar-light p-0">

								<!-- Logo -->
								<?php theme_logo(); ?>

								<!-- Menu -->
								<div class="navbar-toggler"></div>
								<?php
								$nav = new HGAsh_Menu_Walker( 'main-menu' );
								echo $nav->build_menu(); // phpcs:ignore
								?>

								<!-- Search icon and button -->
								<?php get_template_part( 'template-parts/header/icon', 'button' ); ?>

							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>

	<?php
	/**
	 * Add content after header.
	 *
	 * @hooked get_page_featured_section - 10
	 * (outputs Featured image, title and breadcrumbs)
	 */
	do_action( 'hgash_after_header' );
	?>
