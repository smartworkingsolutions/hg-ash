<?php
/**
 * The template part for displaying categories filter in project archive page.
 *
 * @package HGAsh
 */

$terms = get_terms(
	[
		'taxonomy'   => 'project_category',
		'hide_empty' => false,
	]
);

if ( ! $terms ) {
	return;
}
?>
<div class="row">
	<div class="filtering col-sm-12 text-center">

		<span data-filter='*' class="active">View All</span>

		<?php
		foreach ( $terms as $term ) { // phpcs:ignore
			printf(
				'<span data-filter=".%s">%s</span>',
				esc_html( $term->slug ),
				esc_html( $term->name )
			);
		}
		?>

	</div>
</div>
