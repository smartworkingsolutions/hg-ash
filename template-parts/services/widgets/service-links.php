<?php
/**
 * The template part for displaying Service links widget in services details page.
 *
 * @package HGAsh
 */

$obj_id      = get_queried_object_id();
$current_url = get_permalink( $obj_id );

$data = get_field( 'services_links_widget', 'option' );
if ( empty( $data['widget_services_links'] ) ) {
	return;
}
?>

<div class="widget mb-1-9 p-4">
	<div class="list-style3">

		<?php
		while ( have_rows( 'services_links_widget', 'option' ) ) :
			the_row();

			echo '<ul class="list-unstyled mb-0">';

			if ( have_rows( 'widget_services_links', 'option' ) ) :
				while ( have_rows( 'widget_services_links', 'option' ) ) :
					the_row();

					$links = get_sub_field( 'widget_service_link' );
					$class = '';

					if ( $current_url === $links['url'] ) {
						$class = ' class="active"';
					}

					printf(
						'<li%s>
							<a href="%s">%s</a>
						</li>',
						$class, // phpcs:ignore
						esc_url( $links['url'] ),
						esc_html( $links['title'] )
					);

				endwhile;

			endif;

			echo '</ul>';

		endwhile;
		?>

	</div>
</div>
