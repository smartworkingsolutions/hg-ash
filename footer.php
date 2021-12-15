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

	<!-- FOOTER
	================================================== -->
	<footer class="pt-6 pt-md-8">
		<div class="container">
			<div class="row mb-6 mb-md-8 mt-n1-9">

				<?php
				/**
				 * Widgets here
				 */
				get_template_part( 'template-parts/footer/widget', '1' );
				get_template_part( 'template-parts/footer/widget', '2' );
				get_template_part( 'template-parts/footer/widget', '3' );
				get_template_part( 'template-parts/footer/widget', '4' );
				?>

			</div>
		</div>
		<?php
		/**
		 * Copyrights
		 */
		get_template_part( 'template-parts/footer/copyrights' );
		?>
	</footer>

</div><!-- #page, .main-wrapper -->

<!-- start scroll to top -->
<a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<!-- end scroll to top -->

<?php wp_footer(); ?>

</body>
</html>
