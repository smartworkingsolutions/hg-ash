<?php
/**
 * The template part for displaying Service address widget in services details page.
 *
 * @package HGAsh
 */

$count = 1;

// Group.
if ( have_rows( 'address_widget', 'option' ) ) :

	while ( have_rows( 'address_widget', 'option' ) ) :
		the_row();

		if ( is_array( get_sub_field( 'address_widget_lists', 'option' ) ) ) {
			$count_row = count( get_sub_field( 'address_widget_lists', 'option' ) );
		}

		// Repeater.
		if ( have_rows( 'address_widget_lists', 'option' ) ) :

			echo '<div class="widget mb-1-9 p-2-2">';

			// Loop through rows.
			while ( have_rows( 'address_widget_lists', 'option' ) ) :
				the_row();

				// Load sub field value.
				$icon    = get_sub_field( 'address_widget_icon', 'option' );
				$heading = get_sub_field( 'address_widget_title', 'option' );
				$content = get_sub_field( 'address_widget_text', 'option' );
				$classes = 'media mb-4';

				if ( $count === $count_row ) {
					$classes = 'media';
				}

				printf(
					'<div class="%s">
						<i class="%s text-primary display-23"></i>
						<div class="ms-3">
							<h4 class="mb-1 h6">%s</h4>
							<span>%s</span>
						</div>
					</div>',
					esc_html( $classes ),
					esc_html( $icon ),
					esc_html( $heading ),
					esc_html( $content )
				);

				++$count;

			endwhile;

			echo '</div>';

		endif;

	endwhile;

endif;
