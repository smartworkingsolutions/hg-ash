<?php
/**
 * The template for displaying archive projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HGAsh
 */

get_header();

$count = 1;
?>

<section>
	<div class="container">
		<div class="text-center mb-2-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">

			<?php
			if ( get_field( 'faqs_small_heading', 'option' ) ) {
				echo '<span class="text-secondary mb-2 d-block fw-bold text-uppercase">' . esc_html( get_field( 'faqs_small_heading', 'option' ) ) . '</span>';
			}
			if ( get_field( 'faqs_heading', 'option' ) ) {
				echo '<h2 class="mb-0 h1">' . esc_html( get_field( 'faqs_heading', 'option' ) ) . '</h2>';
			}
			?>

		</div>
		<div class="row wow fadeIn" data-wow-delay="200ms">
			<div class="col-lg-12 mb-3 mb-lg-0">

				<?php
				if ( have_posts() ) :

					echo '<div id="accordion" class="accordion-style">';

					while ( have_posts() ) :
						the_post();

						$card_header    = 'btn btn-link collapsed';
						$card_body      = 'collapse';
						$aria_expanded  = 'false';
						$read_more_html = '';

						if ( 1 === $count ) {
							$card_header   = 'btn btn-link';
							$card_body     = 'collapse show';
							$aria_expanded = 'true';
						}
						if ( get_field( 'faqs_enable_read_more' ) ) {
							$read_more_html = sprintf(
								'<a href="%s" class="btn btn-link text-primary">%s</a>',
								get_permalink(),
								esc_html__( 'Read more', 'hgash' )
							);
						}

						printf(
							'<div class="card mb-3">
								<div class="card-header" id="heading%1$s">
									<h5 class="mb-0">
										<button class="%2$s" data-bs-toggle="collapse" data-bs-target="#collapse%1$s" aria-expanded="%3$s" aria-controls="collapse%1$s">%4$s</button></h5>
								</div>
								<div id="collapse%1$s" class="%5$s" aria-labelledby="heading%1$s" data-bs-parent="#accordion">
									<div class="card-body">%6$s%7$s</div>
									
								</div>
							</div>',
							$count, // phpcs:ignore
							esc_html( $card_header ),
							esc_html( $aria_expanded ),
							esc_html( get_the_title() ),
							esc_html( $card_body ),
							get_the_excerpt(), // phpcs:ignore
							wp_kses_post( $read_more_html )
						);

						++$count;

					endwhile;

					echo '</div>';

				endif;
				?>

		</div>
	</div>
</section>

<section class="bg-light">
	<div class="container">
		<div class="text-center mb-2-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">
			<span class="text-secondary mb-2 d-block fw-bold text-uppercase">Contact Us</span>
			<h2 class="mb-0 h1">Get In Touch</h2>
		</div>

		<div class="row">
			<div class="col-lg-8 mb-5 mb-lg-0 mb-md-5 mx-auto">
				<div class="form2 bg-white p-4 p-md-5">
					<form class="quform" action="quform/contact.php" method="post" enctype="multipart/form-data" onclick="">
						<div class="quform-elements">
							<div class="row">
								<!-- Begin Text input element -->
								<div class="col-md-6">
									<div class="quform-element form-group">
										<label for="name">Your Name <span class="quform-required">*</span></label>
										<div class="quform-input">
											<input class="form-control" id="name" type="text" name="name" placeholder="Your name here" />
										</div>
									</div>
								</div>
								<!-- End Text input element -->

								<!-- Begin Text input element -->
								<div class="col-md-6">
									<div class="quform-element form-group">
										<label for="email">Your Email <span class="quform-required">*</span></label>
										<div class="quform-input">
											<input class="form-control" id="email" type="text" name="email" placeholder="Your email here" />
										</div>
									</div>
								</div>
								<!-- End Text input element -->

								<!-- Begin Text input element -->
								<div class="col-md-6">
									<div class="quform-element form-group">
										<label for="subject">Your Subject <span class="quform-required">*</span></label>
										<div class="quform-input">
											<input class="form-control" id="subject" type="text" name="subject" placeholder="Your subject here" />
										</div>
									</div>
								</div>
								<!-- End Text input element -->

								<!-- Begin Text input element -->
								<div class="col-md-6">
									<div class="quform-element form-group">
										<label for="phone">Contact Number</label>
										<div class="quform-input">
											<input class="form-control" id="phone" type="text" name="phone" placeholder="Your phone here" />
										</div>
									</div>
								</div>
								<!-- End Text input element -->

								<!-- Begin Textarea element -->
								<div class="col-md-12">
									<div class="quform-element form-group">
										<label for="message">Message <span class="quform-required">*</span></label>
										<div class="quform-input">
											<textarea class="form-control h-auto" id="message" name="message" rows="3" placeholder="Tell us a few words"></textarea>
										</div>
									</div>
								</div>
								<!-- End Textarea element -->

								<!-- Begin Captcha element -->
								<div class="col-md-12">
									<div class="quform-element">
										<div class="form-group">
											<div class="quform-input">
												<input class="form-control" id="type_the_word" type="text" name="type_the_word" placeholder="Type the below word" />
											</div>
										</div>
										<div class="form-group">
											<div class="quform-captcha">
												<div class="quform-captcha-inner">
													<img src="<?php echo get_template_directory_uri() . '/img/content/courier-new-light.png'; // phpcs:ignore ?>" alt="...">
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End Captcha element -->

								<!-- Begin Submit button -->
								<div class="col-md-12">
									<div class="quform-submit-inner">
										<button class="butn-style3" type="submit"><span>Send Message</span></button>
									</div>
									<div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
								</div>
								<!-- End Submit button -->

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
