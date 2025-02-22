<?php
/**
 * The template part for displaying Widget 3 in footer.
 *
 * @package HGAsh
 */

$widget   = get_field( 'footer_widget_3', 'option' );
$post_num = get_sub_field( 'footer_number_of_posts', 'option' ) ? get_sub_field( 'footer_number_of_posts', 'option' ) : '3';

if ( ! $widget ) {
	return;
}
?>

<div class="col-sm-6 col-lg-3 mt-1-9 wow fadeIn" data-wow-delay="500ms">

	<?php
	if ( $widget['footer_widget_3_heading'] ) {
		echo '<h3 class="text-primary h5 mb-1-9">' . esc_html( $widget['footer_widget_3_heading'] ) . '</h3>';
	}

	$query = new WP_Query( // phpcs:ignore
		[ 'posts_per_page' => $post_num ]
	);

	while ( $query->have_posts() ) :
		$query->the_post();

		$thumbnail    = '';
		$thumbnail_id = '';

		if ( has_post_thumbnail() ) {

			$thumbnail_id = get_post_thumbnail_id( get_the_id() );
			$image        = df_resize( $thumbnail_id, '', 80, 80, true, true );

			$thumbnail = sprintf(
				'<img src="%1$s" class="rounded" alt="%2$s">',
				$image['url'],
				get_the_title(),
			);
		}

		printf(
			'<div class="media mb-1-9">
				%s
				<div class="media-body ms-4">
					<p class="text-white mb-2"><a href="%s" class="text-white text-primary-hover">%s</a></p>
					<small class="text-primary">%s</small>
				</div>
			</div>',
			$thumbnail, // phpcs:ignore
			esc_url( get_permalink() ),
			esc_html( get_the_title() ),
			esc_html( get_the_date() )
		);

	endwhile;

	wp_reset_postdata();
	?>

</div>
