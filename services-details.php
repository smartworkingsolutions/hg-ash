<?php
/**
 * Template Name: Service Details
 * The template for displaying service details single page.
 *
 * @package HGAsh
 */

get_header();
?>

<section>
	<div class="container">
		<div class="row">

			<?php get_template_part( 'template-parts/services/service', 'sidebar' ); ?>
			<?php get_template_part( 'template-parts/services/service', 'content' ); ?>

		</div>
	</div>
</section>

<?php
get_footer();
