<?php
/**
 * The template part for displaying Sidebar in services details page.
 *
 * @package HGAsh
 */

?>

<div class="col-lg-4 order-2 order-lg-1 wow fadeIn" data-wow-delay="200ms">
	<div class="sidebar pe-xl-4">

		<?php get_template_part( 'template-parts/services/widgets/service', 'links' ); ?>

		<?php get_template_part( 'template-parts/services/widgets/service', 'address' ); ?>

		<?php get_template_part( 'template-parts/services/widgets/service', 'contact' ); ?>

	</div>
</div>
