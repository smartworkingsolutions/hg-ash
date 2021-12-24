<?php
/**
 * The template part for displaying Content in services details page.
 *
 * @package HGAsh
 */

$count = 1;
?>

<div class="col-lg-8 order-1 order-lg-2 mb-2-9 mb-lg-0 wow fadeIn" data-wow-delay="400ms">
	<div class="row">
		<div class="col-12 mb-2-9">

			<?php
			// Check lists exists.
			if ( have_rows( 'services_carousel' ) ) :

				echo '<div class="owl-carousel owl-theme text-center">';

				// Loop through rows.
				while ( have_rows( 'services_carousel' ) ) :
					the_row();

					// Load sub field value.
					$image = '';
					if ( get_sub_field( 'carousel_image' ) ) {
						$image = df_resize( get_sub_field( 'carousel_image' ), '', 856, 571, true, true );
					}

					printf(
						'<div class="item"><img src="%s" class="rounded" /></div>',
						esc_url( $image['url'] )
					);

				endwhile;

				echo '</div>';

			endif;
			?>

		</div>

		<div class="col-12 mb-2-9">

			<?php
			if ( get_field( 'services_d_title' ) ) {
				echo '<h2 class="mb-3">' . esc_html( get_field( 'services_d_title' ) ) . '</h2>';
			}
			if ( get_field( 'services_d_content' ) ) {
				echo wp_kses_post( get_field( 'services_d_content' ) );
			}

			// Check lists exists.
			if ( have_rows( 'services_d_bullets' ) ) :

				echo '<ul class="list-style1 mb-0">';

				// Loop through rows.
				while ( have_rows( 'services_d_bullets' ) ) :
					the_row();

					// Load sub field value.
					$bullet = get_sub_field( 'services_d_bullet' );

					printf(
						'<li>%s</li>',
						esc_html( $bullet )
					);

				endwhile;

				echo '</ul>';

			endif;
			?>

		</div>

		<div class="col-lg-12 mb-2-9">

			<?php
			// Check lists exists.
			if ( have_rows( 'services_d_accordion' ) ) :

				echo '<div id="accordion" class="accordion-style">';

				// Loop through rows.
				while ( have_rows( 'services_d_accordion' ) ) :
					the_row();

					// Load sub field value.
					$accordion_title   = get_sub_field( 'services_d_accordion_title' );
					$accordion_content = get_sub_field( 'services_d_accordion_content' );
					$card_header       = 'btn btn-link collapsed';
					$card_body         = 'collapse';
					$aria_expanded     = 'false';

					if ( 1 === $count ) {
						$card_header   = 'btn btn-link';
						$card_body     = 'collapse show';
						$aria_expanded = 'true';
					}

					printf(
						'<div class="card mb-3">
							<div class="card-header" id="heading%1$s">
								<h5 class="mb-0">
									<button class="%2$s" data-bs-toggle="collapse" data-bs-target="#collapse%1$s" aria-expanded="%3$s" aria-controls="collapse%1$s">%4$s</button></h5>
							</div>
							<div id="collapse%1$s" class="%5$s" aria-labelledby="heading%1$s" data-bs-parent="#accordion">
								<div class="card-body">
									%6$s
								</div>
							</div>
						</div>',
						$count, // phpcs:ignore
						esc_html( $card_header ),
						esc_html( $aria_expanded ),
						esc_html( $accordion_title ),
						esc_html( $card_body ),
						esc_html( $accordion_content )
					);

					++$count;

				endwhile;

				echo '</div>';

			endif;
			?>

		</div>

		<?php
		// Check lists exists.
		if ( have_rows( 'more_services' ) ) :

			// Loop through rows.
			while ( have_rows( 'more_services' ) ) :
				the_row();

				// Load sub field value.
				$icon            = get_sub_field( 'more_service_icon' );
				$service_title   = get_sub_field( 'more_service_title' );
				$service_content = get_sub_field( 'more_service_content' );

				printf(
					'<div class="col-md-6 mb-2-9">
						<div class="media">
							<i class="%s display-23 text-primary"></i>
							<div class="media-body ps-3 ps-ms-4">
								<h4 class="h5 mb-2">%s</h4>
								<p class="mb-0">%s</p>
							</div>
						</div>
					</div>',
					esc_html( $icon ),
					esc_html( $service_title ),
					esc_html( $service_content )
				);

				++$count;

			endwhile;

		endif;
		?>

	</div>
</div>
