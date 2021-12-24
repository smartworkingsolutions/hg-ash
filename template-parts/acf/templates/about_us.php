<?php
/**
 * The ACF template part for displaying About us.
 *
 * @package HGAsh
 */

$image        = '';
$author_image = '';
if ( get_sub_field( 'about_image' ) ) {
	$image = df_resize( get_sub_field( 'about_image' ), '', 696, 816, true, true );
}
$number        = get_sub_field( 'about_number' );
$number_text   = get_sub_field( 'about_number_text' );
$small_heading = get_sub_field( 'about_small_heading' );
$heading       = get_sub_field( 'about_heading' );
$content1      = get_sub_field( 'about_content_1' );
$content2      = get_sub_field( 'about_content_2' );
if ( get_sub_field( 'author_image' ) ) {
	$author_image = df_resize( get_sub_field( 'author_image' ), '', 80, 80, true, true );
}
$author_name       = get_sub_field( 'author_name' );
$author_job        = get_sub_field( 'author_job' );
$about_button_text = get_sub_field( 'about_button_text' );
$about_button_url  = get_sub_field( 'about_button_url' );
?>

<section class="aboutus">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 mb-2-2 mb-lg-0 wow fadeIn" data-wow-delay="200ms">
				<div class="pe-lg-1-9 pe-xl-2-9 position-relative z-index-1">

					<?php
					if ( $image ) {
						echo '<img src="' . $image['url'] . '" class="rounded">';
					}
					?>

					<div class="box-left py-4 px-4 px-sm-4 px-md-5">
						<?php
						if ( $number ) {
							echo '<h3 class="text-secondary"><span class="countup">' . $number . '</span>+</h3>';
						}
						if ( $number_text ) {
							echo '<p class="lead mb-0 fw-bold text-dark">' . $number_text . '</p>';
						}
						?>
					</div>
					<span class="about-img d-none d-lg-inline-block">
						<img src="<?php echo get_template_directory_uri() . '/img/content/dots1.png'; ?>" alt="..." class="position-absolute left-n25 bottom-n20 z-index-minus2 ani-left-right">
					</span>
				</div>
			</div>
			<div class="col-lg-6 wow fadeIn" data-wow-delay="400ms">
				<div class="about-title">
					<?php
					if ( $small_heading ) {
						echo '<span class="text-secondary mb-2 d-block fw-bold text-uppercase">' . $small_heading . '</span>';
					}
					if ( $heading ) {
						echo '<h2 class="mb-1-6">' . $heading . '</h2>';
					}
					if ( $content1 ) {
						echo '<p class="fst-italic font-weight-600">' . $content1 . '</p>';
					}
					if ( $content2 ) {
						echo '<p>' . $content2 . '</p>';
					}

					// Check lists exists.
					if ( have_rows( 'about_lists' ) ) :

						echo '<ul class="list-style1 mb-4">';

						// Loop through rows.
						while ( have_rows( 'about_lists' ) ) :
							the_row();

							printf(
								'<li>%s</li>',
								esc_html( get_sub_field( 'about_list' ) )
							);

						endwhile;

						echo '</ul>';

					endif;
					?>

				</div>
				<div class="d-sm-flex justify-content-sm-between align-items-center border-top pt-4 mt-4 border-color-light-gray">
					<div class="media align-items-center mb-3 mb-sm-0">

						<?php
						if ( $author_image ) {
							echo '<img src="' . $author_image['url'] . '" alt="..." class="rounded-circle">';
						}

						if ( $author_name || $author_job ) {
							echo '<div class="media-body ms-4">';
							if ( $author_name ) {
								echo '<h4 class="mb-1 h6">' . $author_name . '</h4>';
							}
							if ( $author_job ) {
								echo '<p class="mb-0">' . $author_job . '</p>';
							}
							echo '</div>';
						}
						?>

					</div>
					<?php
					if ( $about_button_text || $about_button_url ) {
						printf(
							'<div>
								<a class="butn-style1" href="%s">%s</a>
							</div>',
							esc_url( $about_button_url ),
							esc_html( $about_button_text )
						);
					}
					?>

				</div>
			</div>
		</div>
	</div>
</section>
