<?php
/**
 * The template part for displaying Widget 1 in footer.
 *
 * @package HGAsh
 */

$widget = get_field( 'footer_widget_1', 'option' );
$icons  = $widget['footer_social_icons'];
$links  = get_social_links();

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
		foreach ( $icons as $icon ) {
			if ( 'facebook' === $icon && $links['facebook'] ) {
				echo '<li class="d-inline-block me-2"><a href="' . esc_url( $links['facebook'] ) . '"><i class="fab fa-facebook-f"></i></a></li>';
			}
			if ( 'twitter' === $icon && $links['twitter'] ) {
				echo '<li class="d-inline-block me-2"><a href="' . esc_url( $links['twitter'] ) . '"><i class="fab fa-twitter"></i></a></li>';
			}
			if ( 'youtube' === $icon && $links['youtube'] ) {
				echo '<li class="d-inline-block me-2"><a href="' . esc_url( $links['youtube'] ) . '"><i class="fab fa-youtube"></i></a></li>';
			}
			if ( 'linkedin' === $icon && $links['linkedin'] ) {
				echo '<li class="d-inline-block me-2"><a href="' . esc_url( $links['linkedin'] ) . '"><i class="fab fa-linkedin-in"></i></a></li>';
			}
		}
		?>
	</ul>
</div>
