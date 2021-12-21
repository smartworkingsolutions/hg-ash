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

						$card_header   = 'btn btn-link collapsed';
						$card_body     = 'collapse';
						$aria_expanded = 'false';

						if ( 1 === $count ) {
							$card_header   = 'btn btn-link';
							$card_body     = 'collapse show';
							$aria_expanded = 'true';
						}

						printf(
							'<div class="card mb-3">
								<div class="card-header" id="heading%1$s">
									<h5 class="mb-0">
										<button class="%2$s" data-bs-toggle="collapse" data-bs-target="#collapse%1$s" aria-expanded="%3$s" aria-controls="collapse%1$s">%4$s</button></h5>
								</div>
								<div id="collapse%1$s" class="%5$s" aria-labelledby="heading%1$s" data-bs-parent="#accordion">
									<div class="card-body">%6$s</div>
								</div>
							</div>',
							$count, // phpcs:ignore
							esc_html( $card_header ),
							esc_html( $aria_expanded ),
							esc_html( get_the_title() ),
							esc_html( $card_body ),
							get_the_content() // phpcs:ignore
						);

						++$count;

					endwhile;

					echo '</div>';

				endif;
				?>
				<!-- <div id="accordion" class="accordion-style">
					<div class="card mb-3">
						<div class="card-header" id="headingOne">
							<h5 class="mb-0">
								<button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What should I include in my personal statement?</button></h5>
						</div>
						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
							<div class="card-body">
								It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.
							</div>
						</div>
					</div>
					<div class="card mb-3">
						<div class="card-header" id="headingTwo">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Do you support banking loan?</button></h5>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
							<div class="card-body">
								Neque porro quisquam est quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</div>
						</div>
					</div>
					<div class="card mb-3">
						<div class="card-header" id="headingThree">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">What do I get when my account is paid off?</button></h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
							<div class="card-body">
								It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
							</div>
						</div>
					</div>
					<div class="card mb-0">
						<div class="card-header" id="headingFour">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">How can I make a change to my application?</button></h5>
						</div>
						<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
							<div class="card-body">
								It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore.
							</div>
						</div>
					</div>
				</div> -->
			</div>
			<!-- <div class="col-lg-6">
				<div id="accordion1" class="accordion-style">
					<div class="card mb-3">
						<div class="card-header" id="headingFive">
							<h5 class="mb-0">
								<button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">Where can I find out about funding?</button>
							</h5>
						</div>
						<div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-bs-parent="#accordion1">
							<div class="card-body">
								The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
							</div>
						</div>
					</div>
					<div class="card mb-3">
						<div class="card-header" id="headingSix">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Do we really need a business plan?</button>
							</h5>
						</div>
						<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-bs-parent="#accordion1">
							<div class="card-body">
								Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose.
							</div>
						</div>
					</div>
					<div class="card mb-3">
						<div class="card-header" id="headingSeven">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Can I get a free trial before I purchase?</button>
							</h5>
						</div>
						<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-bs-parent="#accordion1">
							<div class="card-body">
								There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.
							</div>
						</div>
					</div>
					<div class="card mb-0">
						<div class="card-header" id="headingEight">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">What type of company is measured?</button>
							</h5>
						</div>
						<div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-bs-parent="#accordion1">
							<div class="card-body">
								Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College.
							</div>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</section>

<?php
get_footer();
