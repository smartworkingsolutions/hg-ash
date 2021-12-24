<?php
/**
 * The ACF template part for displaying About us.
 *
 * @package HGAsh
 */

$image1 = '';
$image2 = '';
if ( get_sub_field( 'about_image_1' ) ) {
	$image1 = df_resize( get_sub_field( 'about_image_1' ), '', 400, 600, true, true );
}
if ( get_sub_field( 'about_image_2' ) ) {
	$image2 = df_resize( get_sub_field( 'about_image_2' ), '', 300, 396, true, true );
}
?>

<section class="about-section">
	<div class="container mt-lg-3 mt-xl-0">
		<div class="row clearfix align-items-xl-center">
			<div class="col-lg-6 text-column mb-2-9 mb-lg-0 wow fadeIn" data-wow-delay="200ms">
				<div class="pe-xl-2-9">

					<?php
					if ( get_sub_field( 'about_l2_heading' ) ) {
						echo '<h2 class="h1 mb-4">' . esc_html( get_sub_field( 'about_l2_heading' ) ) . '</h2>';
					}
					if ( get_sub_field( 'about_l2_text' ) ) {
						echo '<p class="pb-3">' . esc_html( get_sub_field( 'about_l2_text' ) ) . '</p>';
					}

					// Check lists exists.
					if ( have_rows( 'about_l2_lists' ) ) :

						echo '<div class="clearfix d-sm-flex align-items-center mb-2-6"><ul class="list-style1 mb-1-9 mb-sm-0">';

						// Loop through rows.
						while ( have_rows( 'about_l2_lists' ) ) :
							the_row();

							// Load sub field value.
							$list = get_sub_field( 'about_list' );

							printf(
								'<li>%s</li>',
								esc_html( $list )
							);

						endwhile;

						echo '</ul></div>';

					endif;

					printf(
						'<div>
							<a class="butn-style3 medium" href="%s">%s</a>
						</div>',
						esc_url( get_sub_field( 'about_link_url' ) ),
						esc_html( get_sub_field( 'about_link_text' ) )
					);
					?>

				</div>
			</div>

			<div class="col-lg-6 position-relative wow fadeIn" data-wow-delay="400ms">
				<div class="row align-items-center ps-lg-1-9 position-relative z-index-9">

					<?php
					if ( $image1 ) {
						echo '<div class="col-sm-7 d-none d-sm-block">';
						echo '<img src="' . esc_html( $image1['url'] ) . '" class="rounded" alt="About image">';
						echo '</div>';
					}
					?>

					<div class="col-sm-5 text-center text-sm-start">

						<?php
						if ( $image2 ) {
							echo '<img src="' . esc_html( $image2['url'] ) . '" class="rounded" alt="About image">';
						}
						if ( get_sub_field( 'about_link_text' ) && get_sub_field( 'about_link_url' ) ) {
							echo '<div class="text-center mt-4">';
							printf(
								'<a href="%s" class="text-dark text-primary-hover font-weight-600">%s<i class="ti-arrow-right ms-2 align-middle display-30"></i></a>',
								esc_url( get_sub_field( 'about_link_url' ) ),
								esc_html( get_sub_field( 'about_link_text' ) )
							);
							echo '</div>';
						}
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="circle-md left-10 top-15 border-secondary-color d-none d-xl-block"></div>
	<div class="bg-img bg-stripes right-25 top-15 ani-left-right d-none d-xl-block" data-background="<?php echo get_template_directory_uri() . '/img/content/bg-stripes.png'; ?>"></div>
</section>
