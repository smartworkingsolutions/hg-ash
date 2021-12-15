<?php
/**
 * The ACF template part for displaying Testimonials layout 2.
 *
 * @package HGAsh
 */

$count         = 1;
$small_heading = get_sub_field( 'testimonials_l2_small_heading' );
$heading       = get_sub_field( 'testimonials_l2_heading' );
$section_image = df_resize( get_sub_field( 'testimonials_l2_image' ), '', 696, 524, true, true );
?>

<section class="p-0 testimonials-four bg-light">
	<div class="container">
		<div class="row align-items-stretch">
			<div class="col-lg-6 py-8 py-xl-10">

				<?php
				if ( $small_heading || $heading ) {
					echo '<div class="mb-2-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">';
					if ( $small_heading ) {
						echo '<span class="text-secondary mb-2 d-block fw-bold text-uppercase">' . esc_html( $small_heading ) . '</span>';
					}
					if ( $heading ) {
						echo '<h2 class="mb-0 h1">' . esc_html( $heading ) . '</h2>';
					}
					echo '</div>';
				}
				?>

				<?php
				if ( is_array( get_sub_field( 'testimonials_l2_lists' ) ) ) {
					$count_row = count( get_sub_field( 'testimonials_l2_lists' ) );
				}

				// Check lists exists.
				if ( have_rows( 'testimonials_l2_lists' ) ) :

					// Testimonials author images.
					echo '<div class="testimonials3 owl-thumbs mb-1-9 mb-lg-5 wow fadeIn" data-wow-delay="200ms" data-slider-id="1">';

					// Loop through rows.
					while ( have_rows( 'testimonials_l2_lists' ) ) :
						the_row();

						// Load sub field value.
						$image   = df_resize( get_sub_field( 'testimonials_l2_author_image' ), '', 80, 80, true, true );
						$classes = 'owl-thumb-item rounded-circle me-2 border-width-3 border border-color-white';

						if ( $count === $count_row ) {
							$classes = 'owl-thumb-item rounded-circle border-width-3 border';
						}

						printf(
							'<button class="%s">
								<img src="%s" class="rounded-circle w-60px" alt="..." />
							</button>',
							esc_html( $classes ),
							esc_url( $image['url'] )
						);

						++$count;

					endwhile;

					echo '</div>';

					// Testimonials content.
					echo '<div class="testimonial-carousel3 owl-carousel owl-theme wow fadeIn" data-wow-delay="300ms" data-slider-id="1">';

					// Loop through rows.
					while ( have_rows( 'testimonials_l2_lists' ) ) :
						the_row();

						// Load sub field value.
						$testimonial = get_sub_field( 'l2_testimonial' );
						$name        = get_sub_field( 'testimonials_l2_name' );
						$job         = get_sub_field( 'testimonials_l2_job' );

						printf(
							'<div>
								<p class="lh-lg mb-2-6 w-lg-90 w-xl-80">%s</p>
								<h5>%s <span class="mb-0 text-primary font-weight-400 h6">- %s</span></h5>
							</div>',
							esc_html( $testimonial ),
							esc_html( $name ),
							esc_html( $job )
						);

					endwhile;

					echo '</div>';

				endif;
				?>

			</div>

			<div class="col-lg-5 offset-lg-1 wow fadeIn" data-wow-delay="100ms">

				<?php
				if ( $section_image ) {
					echo '<div class="position-relative h-100 vw-lg-50 bg-img cover-background overflow-visible py-8 py-xl-10" data-overlay-dark="0" data-background="' . esc_url( $section_image['url'] ) . '">';
				}
				?>

					<?php
					// Check lists exists.
					if ( have_rows( 'testimonials_service_lists' ) ) :

						echo '<div class="left-negative-margin mt-lg-6">';

						// Loop through rows.
						while ( have_rows( 'testimonials_service_lists' ) ) :
							the_row();

							// Load sub field value.
							$icon    = get_sub_field( 'testimonials_l2_icon' );
							$number  = get_sub_field( 'testimonials_l2_number' );
							$service = get_sub_field( 'testimonials_l2_service' );

							printf(
								'<div class="media py-1-9 px-4 px-sm-2-6 mb-3 rounded wow fadeInUp" data-wow-delay="200ms">
									<div class="icon-box mb-0">
										<i class="%s text-secondary z-index-9 position-relative"></i>
										<div class="box-circle"></div>
									</div>
									<div class="media-body">
										<h3 class="mb-1 countup">%s</h3>
										<p class="mb-0">%s</p>
									</div>
								</div>',
								esc_html( $icon ),
								esc_html( $number ),
								esc_html( $service )
							);

						endwhile;

						echo '</div>';

					endif;
					?>

				</div>
			</div>
		</div>
	</div>
</section>
