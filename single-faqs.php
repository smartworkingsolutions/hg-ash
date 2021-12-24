<?php
/**
 * The template for displaying faqs single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

						the_title( '<h1 class="mb-4">', '</h1>' );

						the_content();

					endwhile; // End of the loop.
					?>

				</div>

			</div>
		</div>
	</section>

<?php
get_footer();
