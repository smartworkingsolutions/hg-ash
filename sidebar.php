<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HGAsh
 */

?>

<div class="sidebar ps-xl-4">
	<?php get_template_part( 'template-parts/news/widgets/recent', 'news' ); ?>
	<?php get_template_part( 'template-parts/news/widgets/categories', 'widget' ); ?>
	<?php get_template_part( 'template-parts/news/widgets/tags', 'widget' ); ?>
	<?php get_template_part( 'template-parts/news/widgets/social', 'icons' ); ?>
</div><!-- .sidebar -->
