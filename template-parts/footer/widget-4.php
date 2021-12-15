<?php
/**
 * The template part for displaying Widget 4 in footer.
 *
 * @package HGAsh
 */

$widget = get_field( 'footer_widget_4', 'option' );

if ( ! $widget ) {
	return;
}
?>

<div class="col-sm-6 col-lg-3 mt-1-9 wow fadeIn" data-wow-delay="650ms">

	<?php
	if ( $widget['footer_widget_4_heading'] ) {
		echo '<h3 class="text-primary h5 mb-1-9">' . esc_html( $widget['footer_widget_4_heading'] ) . '</h3>';
	}
	if ( $widget['footer_widget_4_text'] ) {
		echo '<p class="text-white">' . esc_html( $widget['footer_widget_4_text'] ) . '</p>';
	}
	?>
	<!-- <h3 class="text-primary h5 mb-1-9">NewsLetter</h3> -->
	<!-- <p class="text-white">Subscribe to our newsletter for discounts and more.</p> -->
	<form class="quform newsletter-form" action="quform/newsletter-two.php" method="post" enctype="multipart/form-data" onclick="">

		<div class="quform-elements">

			<div class="row">

				<!-- Begin Text input element -->
				<div class="col-md-12">
					<div class="quform-element">
						<div class="quform-input">
							<input class="form-control" id="email_address" type="text" name="email_address" placeholder="Subscribe with us" />
						</div>
					</div>
				</div>
				<!-- End Text input element -->

				<!-- Begin Submit button -->
				<div class="col-md-12">
					<div class="quform-submit-inner">
						<button class="butn-style1 fill m-0 w-100" type="submit"><span>Subscribe <i class="fas fa-arrow-right ms-2"></i></span></button>
					</div>
					<div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
				</div>
				<!-- End Submit button -->

			</div>

		</div>

	</form>
</div>
