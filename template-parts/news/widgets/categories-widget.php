<?php
/**
 * The template part for displaying Categories Widget in news sidebar.
 *
 * @package HGAsh
 */

$categories = get_field( 'news_category', 'options' );
?>

<div class="widget mb-1-9 p-4 wow fadeIn" data-wow-delay="600ms">
	<h3 class="mb-1-6 h5"><?php esc_html_e( 'Categories', 'hgash' ); ?></h3>
	<ul class="list-style5 mb-0 ps-0">

		<?php
		if ( $categories ) {
			foreach ( $categories as $category ) {

				$cat_name  = $category->name;
				$cat_link  = get_category_link( $category->term_id );
				$cat_count = $category->count;

				printf(
					'<li>
						<a href="%s"><i class="ti-angle-right text-primary me-2 display-32"></i>%s (%s)</a>
					</li>',
					esc_url( $cat_link ),
					esc_html( $cat_name ),
					esc_html( $cat_count )
				);

			}
		} else {
			echo '<p>No category found.</p>';
		}
		?>

	</ul>
</div>
