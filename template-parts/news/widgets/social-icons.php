<?php
/**
 * The template part for displaying Social Icons Widget in news sidebar.
 *
 * @package HGAsh
 */

$icons = get_field( 'news_social_icons', 'options' );
$links = get_social_links();

if ( ! $icons ) {
	return;
}
?>

<div class="widget p-4 wow fadeIn" data-wow-delay="1000ms">
	<h3 class="mb-1-6 h5"><?php esc_html_e( 'Follow Us', 'hgash' ); ?></h3>
	<div>

	<?php
	foreach ( $icons as $icon ) {
		if ( 'facebook' === $icon && $links['facebook'] ) {
			echo '<a href="' . esc_url( $links['facebook'] ) . '" class="me-2"><i class="fab fa-facebook-f"></i></a>';
		}
		if ( 'twitter' === $icon && $links['twitter'] ) {
			echo '<a href="' . esc_url( $links['twitter'] ) . '" class="me-2"><i class="fab fa-twitter"></i></a>';
		}
		if ( 'instagram' === $icon && $links['instagram'] ) {
			echo '<a href="' . esc_url( $links['instagram'] ) . '" class="me-2"><i class="fab fa-instagram"></i></a>';
		}
		if ( 'youtube' === $icon && $links['youtube'] ) {
			echo '<a href="' . esc_url( $links['youtube'] ) . '" class="me-2"><i class="fab fa-youtube"></i></a>';
		}
		if ( 'linkedin' === $icon && $links['linkedin'] ) {
			echo '<a href="' . esc_url( $links['linkedin'] ) . '" class="me-2"><i class="fab fa-linkedin-in"></i></a>';
		}
	}
	?>

	</div>
</div>
