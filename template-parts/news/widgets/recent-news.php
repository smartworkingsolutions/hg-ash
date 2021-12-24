<?php
/**
 * The template part for displaying Widget 1 in news sidebar.
 *
 * @package HGAsh
 */

$widget   = get_field( 'recent_news_widget', 'option' );
$post_num = $widget['recent_news_number_of_post'] ? $widget['recent_news_number_of_post'] : '3';

if ( ! $widget ) {
	return;
}
?>

<div class="widget mb-1-9 p-4 wow fadeIn" data-wow-delay="400ms">

	<h3 class="mb-1-6 h5"><?php esc_html_e( 'Recent News', 'hgash' ); ?></h3>

	<?php
	$query = new WP_Query(
		[ 'posts_per_page' => $post_num ]
	);

	while ( $query->have_posts() ) :
		$query->the_post();

		$thumbnail = '';

		if ( has_post_thumbnail() ) {

			$thumb_id = get_post_thumbnail_id( get_the_id() );
			$image    = df_resize( $thumb_id, '', 80, 80, true, true );

			$thumbnail = $image ? sprintf(
				'<img src="%1$s" class="rounded" alt="%2$s">',
				$image['url'],
				get_the_title(),
			) : '';

		}

		printf(
			'<div class="media mb-4">
				%s
				<div class="media-body ms-3">
					<h4 class="h6"><a href="%s">%s</a></h4>
					<p class="mb-0 small">%s</p>
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
