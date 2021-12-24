<?php
/**
 * The template part for displaying Widget 4 in footer.
 *
 * @package HGAsh
 */

$widget = get_field( 'footer_widget_4', 'option' );

if ( ! $widget ) {
	return;
}
?>

<div class="col-sm-6 col-lg-3 mt-1-9 wow fadeIn" data-wow-delay="650ms">

	<?php
	if ( $widget['footer_widget_4_heading'] ) {
		echo '<h3 class="text-primary h5 mb-1-9">' . esc_html( $widget['footer_widget_4_heading'] ) . '</h3>';
	}
	if ( $widget['footer_widget_4_text'] ) {
		echo '<p class="mb-1-9 text-white opacity9">' . esc_html( $widget['footer_widget_4_text'] ) . '</p>';
	}

	// Group.
	if ( have_rows( 'footer_widget_4', 'option' ) ) :

		while ( have_rows( 'footer_widget_4', 'option' ) ) :
			the_row();

			echo '<ul class="footer-link list-unstyled mb-0">';

			if ( have_rows( 'footer_address_lists', 'option' ) ) :
				while ( have_rows( 'footer_address_lists', 'option' ) ) :
					the_row();

					$icon = get_sub_field( 'footer_address_icon' );
					$text = get_sub_field( 'footer_address_text' );

					printf(
						'<li class="mb-3 text-white">
							<i class="%s display-28 align-middle text-primary pe-3"></i>%s
						</li>',
						esc_html( $icon ),
						esc_html( $text )
					);

				endwhile;

			endif;

			echo '</ul>';

		endwhile;

	endif;
	?>

</div>
