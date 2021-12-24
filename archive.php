<?php
/**
 * The template for displaying archives
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

				<div class="col-lg-8 mb-1-9 mb-lg-0">

					<div class="row mt-n1-9">

						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', 'news' );

							endwhile;

							bootstrap_pagination();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>

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
