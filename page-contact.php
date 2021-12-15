<?php
/**
 * Template Name: Contact Page
 * The template for displaying contact page
 *
 * @package HGAsh
 */

get_header();
?>

	<div class="main-wrapper contact-page no-sidebar">

		<div class="container">

			<main id="primary" class="site-main">

				<div class="wrapper">

					<?php get_template_part( 'template-parts/contact/contact', 'form' ); ?>
					<?php get_template_part( 'template-parts/contact/address' ); ?>

				</div>

			</main><!-- #main -->

			<?php get_template_part( 'template-parts/contact/google', 'map' ); ?>

		</div>

	</div>

<?php
get_footer();
