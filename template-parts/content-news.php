<?php
/**
 * The template part for displaying Content in news page.
 *
 * @package HGAsh
 */

?>

<div class="col-12 mt-1-9 wow fadeIn" data-wow-delay="200ms">
	<article class="card card-style3 border-0 h-100">

		<?php
		if ( has_post_thumbnail() ) {
			$thumbnail_id = get_post_thumbnail_id( get_the_id(), 'full', [ 'title' => '' ] );
			$image        = df_resize( $thumbnail_id, '', 856, 514, true, true );
			?>
			<div class="card-img position-relative">
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_title(); ?>">
			</div>
			<?php
		}
		?>

		<div class="card-body p-xl-1-9 p-4">
			<?php
			the_title( '<h3 class="h5 mb-3"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
			the_excerpt();
			printf(
				'<a href="%s" class="fw-bold text-primary text-secondary-hover">%s</a>',
				esc_url( get_permalink() ),
				esc_html__( 'read more', 'hgash' )
			);
			?>
		</div>

		<div class="card-footer bg-white py-4 px-0 mx-4 mx-xl-1-9">
			<div class="d-flex justify-content-between">
				<span class="display-30"><i class="ti-calendar me-1 text-primary"></i> <?php echo get_the_date(); ?></span>
			</div>
		</div>
	</article>
</div>
