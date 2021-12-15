<?php
/**
 * The ACF template part for displaying Testimonials.
 *
 * @package HGAsh
 */

$image = df_resize( get_sub_field( 'testimonials_background' ), '', 1920, 600, true, true );
?>

<section class="z-index-9">

	<?php
	if ( $image ) {
		echo '<div class="bg-img section-bg" data-overlay-dark="6" data-background="' . esc_url( $image['url'] ) . '"></div>';
	}
	?>

	<div class="container position-relative z-index-9">

		<?php
		if ( get_sub_field( 'testimonials_small_heading' ) || get_sub_field( 'testimonials_heading' ) ) {
			echo '<div class="mb-2-6 mb-lg-6 text-center wow fadeIn" data-wow-delay="100ms">';
			if ( get_sub_field( 'testimonials_small_heading' ) ) {
				echo '<span class="d-block mb-2 text-white text-uppercase fw-bold">' . get_sub_field( 'testimonials_small_heading' ) . '</span>';
			}
			if ( get_sub_field( 'testimonials_heading' ) ) {
				echo '<h2 class="text-white mb-0 h1">' . get_sub_field( 'testimonials_heading' ) . '</h2>';
			}
			echo '</div>';
		}
		?>

		<div class="bg-primary p-1-9 p-lg-6 testimonial-style1 position-relative rounded wow fadeIn" data-wow-delay="200ms">
			<img src="<?php echo get_template_directory_uri() . '/img/content/dots2.png'; ?>" class="position-absolute bottom-n60 right-n10 ani-left-right" alt="...">

			<?php
			// Check Process lists exists.
			if ( have_rows( 'testimonials_lists' ) ) :

				echo '<div class="testimonial-carousel owl-carousel owl-theme">';

				// Loop through rows.
				while ( have_rows( 'testimonials_lists' ) ) :
					the_row();

					// Load sub field value.
					$content = get_sub_field( 'testimonial_content' );
					$name    = get_sub_field( 'testimonial_name' );
					$job     = get_sub_field( 'testimonial_job' );

					printf(
						'<div class="text-center row justify-content-center">
							<div class="col-md-10">
								<i class="ti-quote-right text-white display-3"></i>
								<p class="mb-1-6 text-center mt-3 mt-lg-2-3 lead text-white">%s</p>
								<h6 class="mb-1 text-white font-weight-400">%s</h6>
								<p class="mb-0 text-white opacity8 small">%s</p>
							</div>
						</div>',
						esc_html( $content ),
						esc_html( $name ),
						esc_html( $job )
					);

				endwhile;

				echo '</div>';

			endif;
			?>

		</div>
	</div>
</section>
