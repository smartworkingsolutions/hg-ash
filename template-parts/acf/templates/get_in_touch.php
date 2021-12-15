<?php
/**
 * The template part for displaying Get in touch in homepage.
 *
 * @package HGAsh
 */

$count = 1;
?>

<section class="bg-light">
	<div class="container">
		<div class="row g-0 justify-content-center">
			<div class="col-lg-7 wow fadeIn" data-wow-delay="200ms">
				<div class="bg-white p-1-9 p-xxl-6">
					<h2 class="mb-1-9">Get in touch</h2>
					<form class="quform main-form" action="quform/contact.php" method="post" enctype="multipart/form-data" onclick="">
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
											<textarea class="form-control h-100" id="message" name="message" rows="3" placeholder="Tell us a few words"></textarea>
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
													<img src="quform/images/captcha/courier-new-light.png" alt="...">
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End Captcha element -->

								<!-- Begin Submit button -->
								<div class="col-md-12">
									<div class="quform-submit-inner">
										<button class="butn-style1 fill" type="submit">Send Message</button>
									</div>
									<div class="quform-loading-wrap text-center"><span class="quform-loading"></span></div>
								</div>
								<!-- End Submit button -->

							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-4 wow fadeIn" data-wow-delay="400ms">
				<div class="bg-primary contact-us position-relative p-1-9 p-xxl-6 h-100">

					<?php
					if ( get_sub_field( 'contact_heading' ) ) {
						echo '<h2 class="mb-1-9 text-white">' . get_sub_field( 'contact_heading' ) . '</h2>';
					}

					if ( is_array( get_sub_field( 'contact_lists' ) ) ) {
						$count_row = count( get_sub_field( 'contact_lists' ) );
					}

					// Check Process lists exists.
					if ( have_rows( 'contact_lists' ) ) :

						// Loop through rows.
						while ( have_rows( 'contact_lists' ) ) :
							the_row();

							// Load sub field value.
							$icon     = get_sub_field( 'contact_icon' );
							$title    = get_sub_field( 'contact_title' );
							$content1 = get_sub_field( 'contact_content_1' );
							$content2 = get_sub_field( 'contact_content_2' );
							$classes  = 'media mb-4 border-bottom border-color-light-white pb-4';

							if ( $count === $count_row ) {
								$classes = 'media';
							}

							printf(
								'<div class="%s">
									<i class="%s text-white display-20"></i>
									<div class="media-body ms-3">
										<h4 class="h5 text-white">%s</h4>
										<p class="mb-0 text-white">%s</p>
										<p class="mb-0 text-white">%s</p>
									</div>
								</div>',
								esc_html( $classes ),
								esc_html( $icon ),
								esc_html( $title ),
								esc_html( $content1 ),
								esc_html( $content2 )
							);

							++$count;

						endwhile;

					endif;
					?>

					<img src="<?php echo get_template_directory_uri() . '/img/content/dots2.png'; ?>" class="position-absolute bottom-n40 right-n10 ani-top-bottom" alt="...">
				</div>
			</div>
		</div>
	</div>
</section>
