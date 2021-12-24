<?php
/**
 * The template for displaying all single posts
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

				<div class="col-lg-8 mb-1-9 mb-lg-0">

					<div class="row">
						<div class="col-lg-12 mb-2-3">

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'single' );

						endwhile;
						?>

						</div>
					</div>

				</div>

				<div class="col-lg-4">
					<?php get_sidebar(); ?>
				</div>

			</div>
		</div>
	</section>

<?php
get_footer();
