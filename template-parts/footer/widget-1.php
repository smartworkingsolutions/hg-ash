<?php
/**
 * The template part for displaying Widget 1 in footer.
 *
 * @package HGAsh
 */

$widget = get_field( 'footer_widget_1', 'option' );

if ( ! $widget ) {
	return;
}
?>

<div class="col-sm-6 col-lg-4 pe-5 mt-1-9 wow fadeIn" data-wow-delay="200ms">

	<?php

	if ( $widget['footer_logo'] ) {
		echo '<img src="' . esc_url( $widget['footer_logo'] ) . '" class="mb-1-9" alt="Footer Logo">';
	}

	if ( $widget['footer_text'] ) {
		echo '<p class="mb-1-6 text-white">' . esc_html( $widget['footer_text'] ) . '</p>';
	}

	?>

	<ul class="social-icon-style1 mb-0 d-inline-block list-unstyled">
		<?php
		if ( $widget['facebook_url'] ) {
			echo '<li class="d-inline-block me-2"><a href="' . esc_url( $widget['facebook_url'] ) . '"><i class="fab fa-facebook-f"></i></a></li>';
		}
		if ( $widget['twitter_url'] ) {
			echo '<li class="d-inline-block me-2"><a href="' . esc_url( $widget['twitter_url'] ) . '"><i class="fab fa-twitter"></i></a></li>';
		}
		if ( $widget['youtube_url'] ) {
			echo '<li class="d-inline-block me-2"><a href="' . esc_url( $widget['youtube_url'] ) . '"><i class="fab fa-youtube"></i></a></li>';
		}
		if ( $widget['linkedin_url'] ) {
			echo '<li class="d-inline-block"><a href="' . esc_url( $widget['linkedin_url'] ) . '"><i class="fab fa-linkedin-in"></i></a></li>';
		}
		?>

	</ul>
</div>
