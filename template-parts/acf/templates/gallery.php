<?php
/**
 * The ACF template part for displaying Gallery.
 *
 * @package HGAsh
 */

?>

<section>
	<div class="container">

		<div class="row wow fadeIn" data-wow-delay="200ms">
			<div class="col-lg-12 mb-3 mb-lg-0">

			<?php
			// Check lists exists.
			if ( have_rows( 'gallery_images' ) ) :

				echo '<div class="row main-gallery-isotope">';

				// Loop through rows.
				while ( have_rows( 'gallery_images' ) ) :
					the_row();

					// Load sub field value.
					$image = get_sub_field( 'gallery_image' );
					// $image = df_resize( get_sub_field( 'gallery_image' ), '', 856, 571, true, true );

					printf(
						'<div class="col-md-6 col-lg-4 mt-1-9 grid-item" data-src="%1$s">
							<img src="%1$s" alt="..." class="rounded" />
						</div>',
						esc_url( $image )
					);

				endwhile;

				echo '</div>';

			endif;
			?>

			</div>
		</div>
	</div>
</section>
