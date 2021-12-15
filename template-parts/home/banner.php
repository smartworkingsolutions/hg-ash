<?php
/**
 * The template part for displaying Banner in homepage.
 *
 * @package HGAsh
 */

?>

<section class="p-0 top-position1">

	<?php
	// Check Categories lists exists.
	if ( have_rows( 'banner_lists', 'option' ) ) :

		echo '<div class="slider-fade owl-carousel owl-theme w-100">';

		// Loop through rows.
		while ( have_rows( 'banner_lists', 'option' ) ) :
			the_row();

			// Load sub field value.
			$image         = get_sub_field( 'banner_image', 'option' );
			$small_title   = get_sub_field( 'banner_small_title', 'option' );
			$title         = get_sub_field( 'banner_title', 'option' );
			$content       = get_sub_field( 'banner_content', 'option' );
			$button_text_1 = get_sub_field( 'banner_button_text_1', 'option' );
			$button_url_1  = get_sub_field( 'banner_button_url_1', 'option' );
			$button_text_2 = get_sub_field( 'banner_button_text_2', 'option' );
			$button_url_2  = get_sub_field( 'banner_button_url_2', 'option' );
			
			$button_html_1 = $button_text_1 && $button_url_1
				? sprintf(
						'<a href="%s" class="butn-style1 fill me-2 my-1 my-sm-0">%s</a>',
						esc_url( $button_url_1 ),
						esc_html( $button_text_1 )
					)
				: '';

			$button_html_2 = $button_text_2 && $button_url_2
				? sprintf(
						'<a href="%s" class="butn-style1 my-1 my-sm-0">%s</a>',
						esc_url( $button_url_2 ),
						esc_html( $button_text_2 )
					)
				: '';

			printf(
				'<div class="text-start item bg-img cover-background pt-6 pb-14 py-md-16 py-lg-20 py-xxl-24 rounded-lg left-overlay-dark" data-overlay-dark="85" data-background="%s">
					<div class="container pt-6 pt-md-0">
						<div class="row align-items-center">
							<div class="col-md-10 col-lg-8 col-xl-7 col-xxl-6 mb-1-9 mb-lg-0 py-5">
								<span class="text-primary mb-3 d-block fw-bold display-md-28">%s</span>
								<h1 class="text-white display-21 display-sm-19 display-md-17 display-lg-8 mb-4">%s</h1>
								<p class="text-white mb-2-3 opacity8 display-md-28 w-lg-80">%s</p>
								%s
								%s
							</div>
						</div>
					</div>
				</div>',
				esc_url( $image ),
				esc_html( $small_title ),
				esc_html( $title ),
				esc_html( $content ),
				$button_html_1, // phpcs:ignore
				$button_html_2 // phpcs:ignore
			);

		endwhile;

		echo '</div>';

	endif;
	?>

</section>
