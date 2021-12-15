<?php
/**
 * The ACF template part for displaying Services.
 *
 * @package HGAsh
 */

?>

<section class="service-block pt-0">
	<div class="container position-relative z-index-1">
		<div class="row align-items-center mb-1-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">

			<?php
			if ( get_sub_field( 'services_small_heading' ) || get_sub_field( 'services_heading' ) ) {
				echo '<div class="col-lg-5 mb-3 mb-lg-0">';
				if ( get_sub_field( 'services_small_heading' ) ) {
					echo '<span class="d-block mb-2 text-secondary text-uppercase fw-bold">' . esc_html( get_sub_field( 'services_small_heading' ) ) . '</span>';
				}
				if ( get_sub_field( 'services_heading' ) ) {
					echo '<h2 class="mb-0">' . esc_html( get_sub_field( 'services_heading' ) ) . '</h2>';
				}
				echo '</div>';
			}

			if ( get_sub_field( 'services_content' ) ) {
				echo '<div class="col-lg-7">';
					echo '<p class="mb-0 border-lg-start border-width-4 border-secondary-color py-lg-4 ps-lg-6">' . esc_html( get_sub_field( 'services_content' ) ) . '</p>';
				echo '</div>';
			}
			?>

		</div>

		<?php
		// Check Process lists exists.
		if ( have_rows( 'services_lists' ) ) :

			echo '<div class="row mt-n1-9">';

			// Loop through rows.
			while ( have_rows( 'services_lists' ) ) :
				the_row();

				// Load sub field value.
				$icon          = get_sub_field( 'service_icon' );
				$service_title = get_sub_field( 'service_title' );
				$content       = get_sub_field( 'service_content' );

				printf(
					'<div class="col-md-6 col-lg-4 col-xl-3 mt-1-9 wow fadeIn" data-wow-delay="200ms">
						<a href="service-details.html" class="card card-style2 border-0 h-100">
							<div class="card-body px-1-9 py-5 py-sm-6 text-center">
								<i class="%s display-10 mb-4 d-block"></i>
								<h3 class="h5 mb-3">%s</h3>
								<p class="mb-0">%s</p>
							</div>
						</a>
					</div>',
					esc_html( $icon ),
					esc_html( $service_title ),
					esc_html( $content )
				);

			endwhile;

			echo '</div>';

		endif;
		?>

	</div>
	<img src="<?php echo get_template_directory_uri() . '/img/content/dots1.png'; //phpcs:ignore ?>" class="position-absolute bottom-n40 right d-none d-lg-block wow fadeIn ani-left-right" data-wow-delay="200ms" alt="...">
</section>
