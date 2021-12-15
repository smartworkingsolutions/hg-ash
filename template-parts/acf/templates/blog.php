<?php
/**
 * The ACF template part for displaying Blog.
 *
 * @package HGAsh
 */

$post_num = get_sub_field( 'blog_number_of_posts' ) ? get_sub_field( 'blog_number_of_posts' ) : '3';
?>

<section class="pt-0">
	<div class="container">
		<div class="row align-items-center mb-1-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">

			<?php
			if ( get_sub_field( 'blog_small_heading' ) || get_sub_field( 'blog_heading' ) ) {
				echo '<div class="col-lg-5 mb-3 mb-lg-0">';
				if ( get_sub_field( 'blog_small_heading' ) ) {
					echo '<span class="d-block mb-2 text-secondary text-uppercase fw-bold">' . esc_html( get_sub_field( 'blog_small_heading' ) ) . '</span>';
				}
				if ( get_sub_field( 'blog_heading' ) ) {
					echo '<h2 class="mb-0">' . esc_html( get_sub_field( 'blog_heading' ) ) . '</h2>';
				}
				echo '</div>';
			}

			if ( get_sub_field( 'blog_content' ) ) {
				echo '<div class="col-lg-7">';
					echo '<p class="mb-0 border-lg-start border-width-4 border-secondary-color py-lg-4 ps-lg-6">' . esc_html( get_sub_field( 'blog_content' ) ) . '</p>';
				echo '</div>';
			}
			?>

		</div>

		<?php

		echo '<div class="row mt-n1-9 g-xl-5">';

		global $wp_query;
		$wp_query = new WP_Query( // phpcs:ignore
			[ 'posts_per_page' => $post_num ]
		);

		while ( have_posts() ) :
			the_post();

			$thumbnail     = '';
			$comment_count = sprintf( _n( '1 Comment', '%1$s Comments', get_comments_number() ) ); // phpcs:ignore

			if ( has_post_thumbnail() ) {
				$thumbnail = sprintf(
					'<div class="card-img position-relative">
						<img src="%1$s" alt="%2$s">
					</div>',
					get_the_post_thumbnail_url( $wp_query->ID, 'hgash-blog', [ 'title' => '' ] ),
					get_the_title(),
				);
			}

			printf(
				'<div class="col-md-6 col-lg-4 mt-1-9 wow fadeIn" data-wow-delay="200ms">
					<article class="card card-style3 border-0 h-100">
						%1$s
						<div class="card-body p-xl-1-9 p-4">
							<h3 class="h5 mb-3"><a href="blog-details.html">%2$s</a></h3>
							<a href="%3$s" class="fw-bold text-primary text-secondary-hover">%4$s</a>
						</div>
						<div class="card-footer bg-white py-4 px-0 mx-4 mx-xl-1-9">
							<div class="d-flex justify-content-between">
								<span class="display-30"><i class="ti-calendar me-1 text-primary"></i> %5$s</span>
								<a href="#!" class="display-30"><i class="ti-heart me-1 text-primary"></i> %6$s</a>
							</div>
						</div>
					</article>
				</div>',
				$thumbnail, // phpcs:ignore
				esc_html( get_the_title() ),
				esc_url( get_permalink() ),
				esc_html__( 'read more', 'hgash' ),
				esc_html( get_the_date() ),
				$comment_count // phpcs:ignore
			);

		endwhile;

		wp_reset_postdata();

		echo '</div>';

		?>

	</div>
</section>
