<?php
/**
 * The template for displaying archive projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HGAsh
 */

get_header();
?>

<section>
	<div class="container">

		<?php get_template_part( 'template-parts/projects/cat', 'filter' ); ?>

		<div class="row portfolio-gallery-isotope mt-4">

			<?php
			while ( have_posts() ) :
				the_post();

				$thumbnail_id = '';
				$slug         = '';
				$name         = '';

				$terms = get_the_terms( get_the_id(), 'project_category' );

				if ( has_post_thumbnail() ) {
					$thumbnail_id = get_post_thumbnail_id( get_the_id(), 'full', [ 'title' => '' ] );
					$image        = df_resize( $thumbnail_id, '', 551, 541, true, true );
				}

				foreach ( $terms as $term ) { // phpcs:ignore
					$slug = $term->slug;
					$name = $term->name;
				}

				?>
				<div class="col-sm-6 col-md-4 col-lg-3 mb-4 items <?php echo esc_html( $slug ); ?>">
					<div class="portfolio-box position-relative overflow-hidden">
						<div class="portfolio-img">
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="...">
						</div>
						<div class="portfolio-content d-flex justify-content-center text-center">
							<div class="me-4">
								<?php
								the_title( '<h3 class="h6 mb-0"><a href="' . esc_url( get_permalink() ) . '" class="text-primary">', '</a></h3>' );
								echo '<span class="text-white small">' . esc_html( $name ) . '</span>';
								?>
							</div>
						</div>
					</div>
				</div>
				<?php

			endwhile; // End of the loop.
			?>

		</div>

	</div>
</section>

<?php
get_footer();
