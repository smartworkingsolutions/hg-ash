<?php
/**
 * The ACF template part for displaying Why choose us.
 *
 * @package HGAsh
 */

$image         = df_resize( get_sub_field( 'why_us_video_image' ), '', 972, 670, true, true );
$video         = get_sub_field( 'why_us_video_url' );
$small_heading = get_sub_field( 'why_us_small_heading' );
$heading       = get_sub_field( 'why_us_heading' );
$content       = get_sub_field( 'why_us_content' );
?>

<section class="whychooseus1 py-0">
	<div class="row">
		<div class="col-lg-6 bg-img cover-background min-height p-0 wow fadeIn" data-wow-delay="200ms" data-overlay-dark="2" data-background="<?php echo esc_url( $image['url'] ); ?>">

			<?php
			if ( $video ) {
				?>
				<div class="h-100 story-video">
					<div class="d-table h-100 text-center mx-auto position-relative z-index-1">
						<div class="d-table-cell align-middle">
							<div class="d-inline-block align-middle z-index-1 text-start">
								<a class="video video_btn bg-secondary" href="<?php echo esc_url( $video ); ?>"><i class="fa fa-play"></i></a>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>

		<div class="col-lg-6 p-0 bg-primary wow fadeIn" data-wow-delay="400ms">
			<div class="p-1-9 p-sm-6 p-xxl-8">
				<div class="row justify-content-center">
					<div class="col-lg-12">

						<?php
						if ( $small_heading ) {
							echo '<span class="d-block mb-2 text-white text-uppercase fw-bold">' . $small_heading . '</span>';
						}
						if ( $heading ) {
							echo '<h2 class="mb-1-9 text-white">' . $heading . '</h2>';
						}
						if ( $content ) {
							echo '<p class="text-white mb-5 w-xxl-80">' . $content . '</p>';
						}
						?>

						<?php
						// Check Process lists exists.
						if ( have_rows( 'why_us_lists' ) ) :

							echo '<div class="small-box">';

							// Loop through rows.
							while ( have_rows( 'why_us_lists' ) ) :
								the_row();

								// Load sub field value.
								$icon    = get_sub_field( 'why_us_list_icon' );
								$title   = get_sub_field( 'why_us_list_title' );
								$content = get_sub_field( 'why_us_list_content' );

								printf(
									'<div class="media mb-1-9">
										<i class="%s text-primary me-3 me-lg-4"></i>
										<div class="media-body">
											<h4 class="h5 text-white">%s</h4>
											<p class="mb-0 text-white w-xxl-70 opacity9">%s</p>
										</div>
									</div>',
									esc_html( $icon ),
									esc_html( $title ),
									esc_html( $content )
								);

							endwhile;

							echo '</div>';

						endif;
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
