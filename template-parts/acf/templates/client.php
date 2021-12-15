<?php
/**
 * The template part for displaying Client in homepage.
 *
 * @package HGAsh
 */

$image = df_resize( get_sub_field( 'client_image' ), '', 660, 267, true, true );
$count = 1;
?>

<section>
	<div class="container">
		<div class="row align-items-center">

			<?php
			if ( $image ) {
				echo '<div class="col-md-6 bg-img cover-background px-lg-4 pt-6 pb-lg-4 mb-2-6 mb-md-0 wow fadeIn" data-wow-delay="200ms" data-overlay-dark="0" data-background="' . esc_url( $image['url'] ) . '">';
			}
			?>

				<div class="media d-block text-center">
					<?php
					if ( get_sub_field( 'client_number' ) ) {
						echo '<div class="client-count">';
						echo '<h3 class="text-secondary"><span class="countup">' . get_sub_field( 'client_number' ) . '</span><sup class="pe-2 text-secondary font-weight-500">+</sup></h3>';
						echo '</div>';
					}
					if ( get_sub_field( 'client_heading' ) ) {
						echo '<div class="media-body">';
						echo '<h4 class="mb-0">' .  get_sub_field( 'client_heading' ) . '</h3>';
						echo '</div>';
					}
					?>

				</div>
			</div>
			<div class="col-md-6 wow fadeIn" data-wow-delay="400ms">

				<?php
				// Check Process lists exists.
				if ( have_rows( 'client_lists' ) ) :

					echo '<div class="row text-center">';

					// Loop through rows.
					while ( have_rows( 'client_lists' ) ) :
						the_row();

						// Load sub field value.
						$logo = df_resize( get_sub_field( 'client_logo' ), '', 144, 44, true, true );

						$classes = 'col-6 col-md-4 border-bottom border-end py-4 py-lg-3';
						if ( 2 === $count ) {
							$classes = 'col-6 col-md-4 border-bottom border-md-end py-4 py-lg-3';
						}
						if ( 3 === $count ) {
							$classes = 'col-6 col-md-4 border-bottom borders-end border-color-light-black border-md-end-0 py-4 py-lg-3';
						}
						if ( 4 === $count ) {
							$classes = 'col-6 col-md-4 border-color-light-black borders-bottom border-md-bottom-0 border-md-end py-4 py-lg-3';
						}
						if ( 5 === $count ) {
							$classes = 'col-6 col-md-4 border-end py-4 py-lg-3';
						}
						if ( 6 === $count ) {
							$classes = 'col-6 col-md-4 py-4 py-lg-3';
						}
						// echo $count;
						
						printf(
							'<div class="%s">
								<div class="p-xl-4 p-md-2">
									<img src="%s" alt="...">
								</div>
							</div>',
							esc_html( $classes ),
							esc_url( $logo['url'] )
						);

						++$count;

					endwhile;

					echo '</div>';

				endif;
				?>

			</div>
		</div>
	</div>
</section>
