<?php
/**
 * The ACF template part for displaying Process.
 *
 * @package HGAsh
 */

$count = 1;
?>

<section class="p-0 overflow-visible">
	<div class="container">
		<div class="bg-white process rounded p-1-9 p-sm-2-9">

		<?php
		// Check Process lists exists.
		if ( have_rows( 'process_lists' ) ) :

			echo '<div class="row">';

			// Loop through rows.
			while ( have_rows( 'process_lists' ) ) :
				the_row();

				// Load sub field value.
				$text = get_sub_field( 'process_text' );

				$classes = 'col-md-6 col-lg-4 mb-2-2 mb-lg-0';
				if ( $count % 3 == 0 ) {
					$classes = 'col-md-6 col-lg-4';
				}

				printf(
					'<div class="%s">
						<div class="media process-block">
							<h4 class="mb-0"><span>%s</span></h4>
							<div class="media-body ms-4">
								<p class="mb-0 w-85 w-sm-60 w-md-100 w-xl-80">%s</p>
							</div>
						</div>
					</div>',
					esc_html( $classes ),
					sprintf('%02d', $count),
					esc_html( $text )
				);

				++$count;

			endwhile;

			echo '</div>';

		endif;
		?>

		</div>
	</div>
</section>
