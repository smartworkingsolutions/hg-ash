<?php
/**
 * The template part for displaying Tags Widget in news sidebar.
 *
 * @package HGAsh
 */

$tags = get_field( 'news_tag', 'options' );
?>

<div class="widget mb-1-9 p-4 wow fadeIn" data-wow-delay="600ms">
	<h3 class="mb-1-6 h5"><?php esc_html_e( 'Tags', 'hgash' ); ?></h3>
	<div class="tags">

		<?php
		if ( $tags ) {

			foreach ( $tags as $tag ) { // phpcs:ignore

				$tag_name = $tag->name;
				$tag_link = get_tag_link( $tag->term_id );

				printf(
					'<a href="%s">%s</a>',
					esc_url( $tag_link ),
					esc_html( $tag_name )
				);

			}
		} else {
			echo '<p>No tag found.</p>';
		}
		?>

	</div>
</div>
