<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HGAsh
 */

get_header();
?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-2 wow fadeIn" data-wow-delay="200ms">

					<?php
					while ( have_posts() ) :
						the_post();

						the_title( '<h2 class="mb-4">', '</h2>' );

						the_content();

					endwhile; // End of the loop.
					?>

				</div>

			</div>
		</div>
	</section>

<?php
get_footer();
