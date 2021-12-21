<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HGAsh
 */

?>
	<?php do_action( 'hgash_before_footer' ); ?>

	<?php theme_footer_html(); ?>

</div><!-- #page, .main-wrapper -->

<!-- start scroll to top -->
<a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<!-- end scroll to top -->

<?php wp_footer(); ?>

</body>
</html>
