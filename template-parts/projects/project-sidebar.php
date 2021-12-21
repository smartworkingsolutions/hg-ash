<?php
/**
 * The template part for displaying categories filter in project archive page.
 *
 * @package HGAsh
 */

$heading = get_field( 'project_sidebar_heading' );
$date    = get_field( 'project_date' );
$client  = get_field( 'project_client' );
$address = get_field( 'project_address' );
$budget  = get_field( 'project_budgets' );

if ( ! $heading && ! $date && ! $client && ! $address && ! $budget ) {
	return;
}
?>
<div class="col-lg-4 wow fadeIn" data-wow-delay="400ms">
	<div class="bg-light p-4 p-xl-5">
		<?php
		if ( $heading ) {
			echo '<div class="title mb-1-9 text-start">';
				echo '<h3 class="h4 text-primary">' . esc_html( $heading ) . '</h3>';
			echo '</div>';
		}
		?>

		<ul class="mb-0 list-unstyled ps-0">
			<?php
			if ( $date ) {
				echo '<li class="mb-3">';
					echo '<span class="text-dark font-weight-700"><i class="ti-timer text-primary me-1"></i> Date:</span> <span class="float-end display-30">' . esc_html( $date ) . '</span>';
				echo '</li>';
			}
			if ( $client ) {
				echo '<li class="mb-3">';
					echo '<span class="text-dark font-weight-700"><i class="ti-user text-primary me-1"></i> Client:</span> <span class="float-end display-30">' . esc_html( $client ) . '</span>';
				echo '</li>';
			}

			while ( have_posts() ) :
				the_post();

				$term_name = '';
				$terms     = get_the_terms( get_the_id(), 'project_category' );

				foreach ( $terms as $term ) { // phpcs:ignore
					$term_name = $term->name;
				}

				echo '<li class="mb-3">';
					echo '<span class="text-dark font-weight-700"><i class="ti-vector text-primary me-1"></i> Category:</span> <span class="float-end display-30">' . esc_html( $term_name ) . '</span>';
				echo '</li>';

			endwhile; // End of the loop.

			if ( $address ) {
				echo '<li class="mb-3">';
					echo '<span class="text-dark font-weight-700"><i class="ti-location-pin text-primary me-1"></i> Address:</span> <span class="float-end display-30">' . esc_html( $address ) . '</span>';
				echo '</li>';
			}
			if ( $budget ) {
				echo '<li class="mb-0">';
					echo '<span class="text-dark font-weight-700"><i class="ti-id-badge text-primary me-1"></i> Budgets:</span> <span class="float-end display-30">' . esc_html( $budget ) . '</span>';
				echo '</li>';
			}
			?>

		</ul>
	</div>
</div>
