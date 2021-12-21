<?php
/**
 * The template for displaying projects single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HGAsh
 */

$description = get_field( 'project_description' );
$button_text = get_field( 'project_button_text' );
$button_link = get_field( 'project_button_link' );

get_header();
?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-2 wow fadeIn" data-wow-delay="200ms">
					<?php
					// Check lists exists.
					if ( have_rows( 'project_carousel' ) ) :

						echo '<div class="owl-carousel owl-theme text-center">';

						// Loop through rows.
						while ( have_rows( 'project_carousel' ) ) :
							the_row();

							// Load sub field value.
							$image = df_resize( get_sub_field( 'project_carousel_image' ), '', 1296, 765, true, true );

							printf(
								'<div class="item"><img src="%s" alt="..." class="rounded" /></div>',
								esc_url( $image['url'] )
							);

						endwhile;

						echo '</div>';

					endif;

					if ( $description ) {
						echo '<p class="w-95 w-md-85 mt-4">' . esc_html( $description ) . '</p>';
					}
					?>

				</div>
				<div class="col-lg-8 mb-1-9 mb-lg-0 wow fadeIn" data-wow-delay="200ms">
					<div>
						<?php
						while ( have_posts() ) :
							the_post();

							the_title( '<h2 class="mb-4">', '</h2>' );

							the_content();

						endwhile; // End of the loop.

						if ( $button_text && $button_link ) {
							printf(
								'<a href="%s" class="butn-style3"><span>%s</span></a>',
								esc_url( $button_link ),
								esc_html( $button_text )
							);
						}
						?>

					</div>
				</div>

				<!-- Sidebar -->
				<?php get_template_part( 'template-parts/projects/project', 'sidebar' ); ?>

			</div>
		</div>
	</section>

<?php
get_footer();
