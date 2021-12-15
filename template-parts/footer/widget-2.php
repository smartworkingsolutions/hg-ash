<?php
/**
 * The template part for displaying Widget 2 in footer.
 *
 * @package HGAsh
 */

$widget = get_field( 'footer_widget_2', 'option' );

if ( ! $widget ) {
	return;
}
?>

<div class="col-sm-6 col-lg-2 mt-1-9 wow fadeIn" data-wow-delay="350ms">

	<?php
	if ( $widget['footer_widget_2_heading'] ) {
		echo '<h3 class="text-primary h5 mb-1-9">' . esc_html( $widget['footer_widget_2_heading'] ) . '</h3>';
	}

	// Links.
	if ( have_rows( 'footer_widget_2', 'option' ) ) :

		while ( have_rows( 'footer_widget_2', 'option' ) ) :
			the_row();

			echo '<ul class="footer-list ps-0">';

			if ( have_rows( 'footer_links', 'option' ) ) :
				while ( have_rows( 'footer_links', 'option' ) ) :
					the_row();

					$links = get_sub_field( 'footer_link' );

					printf(
						'<li>
							<a href="#!">Life insurance</a>
						</li>',
						esc_url( $links['url'] ),
						esc_html( $links['title'] )
					);

				endwhile;

			endif;

			echo '</ul>';

		endwhile;

	endif;
	?>

</div>
