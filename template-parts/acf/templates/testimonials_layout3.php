<?php
/**
 * The ACF template part for displaying Testimonials layout 3.
 *
 * @package HGAsh
 */

?>

<section>

	<div class="container">

		<?php
		// Check Process lists exists.
		if ( have_rows( 'testimonials_l3' ) ) :

			echo '<div class="row">';

			// Loop through rows.
			while ( have_rows( 'testimonials_l3' ) ) :
				the_row();

				// Load sub field value.
				$content = get_sub_field( 'testimonial_l3_text' );
				$name    = get_sub_field( 'testimonial_l3_name' );
				$job     = get_sub_field( 'testimonial_l3_job' );

				printf(
					'<div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card card-style3 border-0 h-100">
                            <div class="card-body p-xl-1-9 p-4">
							<i class="ti-quote-right text-primary display-4"></i>
                                <p class="mb-3">%s</p>
                            </div>
                            <div class="card-footer bg-white py-4 px-0 mx-4 mx-xl-1-9">
								<h6>%s <span class="mb-0 text-primary font-weight-400">- %s</span></h6>
                            </div>
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

</section>
