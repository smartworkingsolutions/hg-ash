<?php
/**
 * The ACF template part for displaying Team.
 *
 * @package HGAsh
 */

?>

<section>
	<div class="container">
		<div class="row align-items-center mb-1-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">

			<?php
			if ( get_sub_field( 'team_small_heading' ) || get_sub_field( 'team_heading' ) ) {
				echo '<div class="col-lg-5 mb-3 mb-lg-0">';
				if ( get_sub_field( 'team_small_heading' ) ) {
					echo '<span class="d-block mb-2 text-secondary text-uppercase fw-bold">' . esc_html( get_sub_field( 'team_small_heading' ) ) . '</span>';
				}
				if ( get_sub_field( 'team_heading' ) ) {
					echo '<h2 class="mb-0">' . esc_html( get_sub_field( 'team_heading' ) ) . '</h2>';
				}
				echo '</div>';
			}

			if ( get_sub_field( 'team_content' ) ) {
				echo '<div class="col-lg-7">';
					echo '<p class="mb-0 border-lg-start border-width-4 border-secondary-color py-lg-4 ps-lg-6">' . esc_html( get_sub_field( 'team_content' ) ) . '</p>';
				echo '</div>';
			}
			?>

		</div>

		<?php
		// Check lists exists.
		if ( have_rows( 'team_lists' ) ) :

			echo '<div class="row mt-n1-9">';

			// Loop through rows.
			while ( have_rows( 'team_lists' ) ) :
				the_row();

				// Load sub field value.
				$image        = df_resize( get_sub_field( 'member_image' ), '', 551, 580, true, true );
				$name         = get_sub_field( 'member_name' );
				$link         = get_sub_field( 'member_link' );
				$job          = get_sub_field( 'member_job' );
				$facebook_url = get_sub_field( 'member_facebook_url' );
				$twitter_url  = get_sub_field( 'member_twitter_url' );
				$linkedin_url = get_sub_field( 'member_linkedin_url' );

				$name_html = '<h3 class="h5">' . $name . '</h3>';
				if ( $link && $name ) {
					$name_html = sprintf(
						'<a href="%1$s" alt="%2$s">
							<h3 class="h5">%2$s</h3>
						</a>',
						$link,
						$name
					);
				}

				$facebook_html = $facebook_url
					? sprintf( '<li><a href="%s"><i class="ti-facebook"></i></a></li>', esc_url( $facebook_url ) )
					: '';
				$twitter_html  = $twitter_url
					? sprintf( '<li><a href="%s"><i class="ti-twitter-alt"></i></a></li>', esc_url( $twitter_url ) )
					: '';
				$linkedin_html = $linkedin_url
					? sprintf( '<li><a href="%s"><i class="ti-linkedin"></i></a></li>', esc_url( $linkedin_url ) )
					: '';

				printf(
					'<div class="col-sm-6 col-lg-3 mt-1-9 wow fadeIn" data-wow-delay="200ms">
						<div class="card card-style3 border-0 text-center">
							<div class="card-img position-relative">
								<img src="%s" class="card-img-top" alt="...">
								<ul class="social-icon list-unstyled">
									%s
									%s
									%s
								</ul>
							</div>
							<div class="card-body p-1-9">
								%s
								<p class="text-primary mb-0">%s</p>
							</div>
						</div>
					</div>',
					esc_url( $image['url'] ),
					wp_kses_post( $facebook_html ),
					wp_kses_post( $twitter_html ),
					wp_kses_post( $linkedin_html ),
					wp_kses_post( $name_html ),
					esc_html( $job )
				);

			endwhile;

			echo '</div>';

		endif;
		?>

	</div>
</section>
