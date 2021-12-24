<?php
/**
 * The ACF template part for displaying Services layout 2.
 *
 * @package HGAsh
 */

?>

<section class="service-block pt-0">
	<div class="container position-relative z-index-1">
		<div class="row align-items-center mb-1-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">

			<?php
			if ( get_sub_field( 'services_small_heading' ) || get_sub_field( 'services_heading' ) ) {
				echo '<div class="text-center mb-2-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">';
				if ( get_sub_field( 'services_small_heading' ) ) {
					echo '<span class="text-secondary mb-2 d-block fw-bold text-uppercase">' . esc_html( get_sub_field( 'services_small_heading' ) ) . '</span>';
				}
				if ( get_sub_field( 'services_heading' ) ) {
					echo '<h2 class="mb-0 h1">' . esc_html( get_sub_field( 'services_heading' ) ) . '</h2>';
				}
				echo '</div>';
			}
			?>

		</div>

		<?php
		// Check lists exists.
		if ( have_rows( 'services_l2_lists' ) ) :

			echo '<div class="row mt-n1-6">';

			// Loop through rows.
			while ( have_rows( 'services_l2_lists' ) ) :
				the_row();

				// Load sub field value.
				$image_html  = '';
				$hover_image = '';
				$icon        = get_sub_field( 'service_l2_icon' );
				if ( get_sub_field( 'service_l2_hover_image' ) ) {
					$hover_image = df_resize( get_sub_field( 'service_l2_hover_image' ), '', 551, 537, true, true );
				}
				$service_title = get_sub_field( 'service_l2_title' );
				$service_link  = get_sub_field( 'service_l2_link' );
				$content       = get_sub_field( 'service_l2_content' );

				if ( get_sub_field( 'service_l2_hover_image' ) && $hover_image ) {
					$image_html = sprintf(
						'<div class="hover-bg"><img src="%s" alt="%s"></div>',
						esc_url( $hover_image['url'] ),
						esc_html( $service_title )
					);
				}

				printf(
					'<div class="col-md-6 col-lg-4 mt-1-6 wow fadeIn" data-wow-delay="200ms">
						<div class="card card-style1 border-color-light-black h-100">
							<div class="card-body text-center px-4 px-xl-5 py-5 py-md-6">
								%s
								<div class="service-icon text-center display-20">
									<i class="%s display-25 display-sm-22 display-lg-20 position-relative"></i>
								</div>
								<h3 class="h5 mb-3 mt-2 position-relative"><a href="%s">%s</a></h3>
								<p class="mb-0 position-relative">%s</p>
							</div>
						</div>
					</div>',
					wp_kses_post( $image_html ),
					esc_html( $icon ),
					esc_html( $service_link ),
					esc_html( $service_title ),
					esc_html( $content )
				);

			endwhile;

			echo '</div>';

		endif;
		?>

	</div>
</section>
