<?php
/**
 * The ACF template part for displaying About us.
 *
 * @package HGAsh
 */

// $image1 = df_resize( get_sub_field( 'about_image_1' ), '', 400, 600, true, true );
// $image2 = df_resize( get_sub_field( 'about_image_2' ), '', 300, 396, true, true );
?>

<section class="pt-0">
	<div class="container">
		<?php
		if ( get_sub_field( 'history_small_heading' ) || get_sub_field( 'history_heading' ) ) {
			echo '<div class="text-center mb-2-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">';
			if ( get_sub_field( 'history_small_heading' ) ) {
				echo '<span class="text-secondary mb-2 d-block fw-bold text-uppercase">' . esc_html( get_sub_field( 'history_small_heading' ) ) . '</span>';
			}
			if ( get_sub_field( 'history_heading' ) ) {
				echo '<h2 class="mb-0 h1">' . esc_html( get_sub_field( 'history_heading' ) ) . '</h2>';
			}
			echo '</div>';
		}
		?>
		<!-- <div class="text-center mb-2-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">
			<span class="text-secondary mb-2 d-block fw-bold text-uppercase">Great Story</span>
			<h2 class="mb-0 h1">We Have A Great History</h2>
		</div> -->

		<div class="row wow fadeIn" data-wow-delay="200ms">
			<div class="horizontaltab tab-style3">

				<?php
				// Tab Titles.
				if ( have_rows( 'history_tab_title_lists' ) ) :

					echo '<ul class="resp-tabs-list hor_1 text-center">';

					// Loop through rows.
					while ( have_rows( 'history_tab_title_lists' ) ) :
						the_row();

						// Load sub field value.
						$tab_title = get_sub_field( 'history_add_year' );

						printf(
							'<li>%s</li>',
							esc_html( $tab_title )
						);

					endwhile;

					echo '</ul>';

				endif;

				// Tab Contents.
				if ( have_rows( 'history_content_lists' ) ) :

					echo '<div class="resp-tabs-container hor_1 p-0">';

					// Loop through rows.
					while ( have_rows( 'history_content_lists' ) ) :
						the_row();

						// Load sub field value.
						$layout_style = get_sub_field( 'history_layout_style' );
						$heading      = get_sub_field( 'history_heading' );
						$text         = get_sub_field( 'history_text' );
						$list1        = get_sub_field( 'history_list1' );
						$list2        = get_sub_field( 'history_list2' );
						$list3        = get_sub_field( 'history_list3' );
						$list4        = get_sub_field( 'history_list4' );
						$button_text  = get_sub_field( 'history_button_text' );
						$button_url   = get_sub_field( 'history_button_url' );
						$image        = df_resize( get_sub_field( 'history_select_image' ), '', 696, 524, true, true );

						$list1_html = $list1 ? sprintf( '<li>%s</li>', esc_html( $list1 ) ) : '';
						$list2_html = $list2 ? sprintf( '<li>%s</li>', esc_html( $list2 ) ) : '';
						$list3_html = $list3 ? sprintf( '<li>%s</li>', esc_html( $list3 ) ) : '';
						$list4_html = $list4 ? sprintf( '<li>%s</li>', esc_html( $list4 ) ) : '';

						$button_html = $button_text && $button_url
							? sprintf(
								'<a href="#!" class="butn-style3 medium">Read More</a>',
								esc_url( $button_url ),
								esc_html( $button_text )
							)
							: '';

						if ( 'content' === $layout_style ) {
							printf(
								'<div>
									<div class="row align-items-center">
										<div class="col-lg-6 order-lg-1 order-2">
											<div class="pe-0 pe-lg-3 pe-xl-4">
												<h4 class="mb-3">%s</h4>
												<p>%s</p>
												<ul class="list-style1 mb-4">
													%s
													%s
													%s
													%s
												</ul>
												%s
											</div>
										</div>
										<div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0">
											<div class="box-shadow-large">
												<img src="%s">
											</div>
										</div>
									</div>
								</div>',
								esc_html( $heading ),
								esc_html( $text ),
								wp_kses_post( $list1_html ),
								wp_kses_post( $list2_html ),
								wp_kses_post( $list3_html ),
								wp_kses_post( $list4_html ),
								$button_html, // phpcs:ignore
								esc_url( $image['url'] )
							);
						}

						if ( 'image' === $layout_style ) {
							printf(
								'<div>
									<div class="row align-items-center">
										<div class="col-lg-6 mb-4 mb-lg-0">
											<div class="box-shadow-large">
												<img src="%s">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="ps-0 ps-lg-3 ps-xl-4">
												<h4 class="mb-3">%s</h4>
												<p>%s</p>
												<ul class="list-style1 mb-4">
													%s
													%s
													%s
													%s
												</ul>
												%s
											</div>
										</div>
									</div>
								</div>',
								esc_url( $image['url'] ),
								esc_html( $heading ),
								esc_html( $text ),
								wp_kses_post( $list1_html ),
								wp_kses_post( $list2_html ),
								wp_kses_post( $list3_html ),
								wp_kses_post( $list4_html ),
								$button_html // phpcs:ignore
							);
						}

					endwhile;

					echo '</div>';

				endif;
				?>
				<!-- <ul class="resp-tabs-list hor_1 text-center">
					<li>2000</li>
					<li>2004</li>
					<li>2008</li>
					<li>2012</li>
					<li>2016</li>
				</ul> -->
				<!-- <div class="resp-tabs-container hor_1 p-0">
					<div>
						<div class="row align-items-center">
							<div class="col-lg-6 order-lg-1 order-2">
								<div class="pe-0 pe-lg-3 pe-xl-4">
									<h4 class="mb-3">Established Secure</h4>
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>

									<ul class="list-style1 mb-4">
										<li>Life time supports</li>
										<li>Solve your problem with us</li>
										<li>We Provide Awesome Services</li>
										<li>Your business deserves best software</li>
									</ul>
									<a href="#!" class="butn-style3 medium">Read More</a>
								</div>
							</div>
							<div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0">
								<div class="box-shadow-large">
									<img src="img/about/history1.jpg" alt="...">
								</div>
							</div>
						</div>
					</div>

					<div>
						<div class="row align-items-center">
							<div class="col-lg-6 mb-4 mb-lg-0">
								<div class="box-shadow-large">
									<img src="img/about/history2.jpg" alt="...">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="ps-0 ps-lg-3 ps-xl-4">
									<h4 class="mb-3">Registered as a Company</h4>
									<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
									<ul class="list-style1 mb-4">
										<li>Life time supports</li>
										<li>Solve your problem with us</li>
										<li>We Provide Awesome Services</li>
										<li>Your business deserves best software</li>
									</ul>
									<a href="#!" class="butn-style3 medium">Read More</a>
								</div>
							</div>
						</div>
					</div>

					<div>
						<div class="row align-items-center">
							<div class="col-lg-6 order-lg-1 order-2">
								<div class="pe-0 pe-lg-3 pe-xl-4">
									<h4 class="mb-3">Launch a new branch</h4>
									<p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition</p>
									<ul class="list-style1 mb-4">
										<li>Life time supports</li>
										<li>Solve your problem with us</li>
										<li>We Provide Awesome Services</li>
										<li>Your business deserves best software</li>
									</ul>
									<a href="#!" class="butn-style3 medium">Read More</a>
								</div>
							</div>
							<div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0">
								<div class="box-shadow-large">
									<img src="img/about/history3.jpg" alt="...">
								</div>
							</div>
						</div>
					</div>

					<div>
						<div class="row align-items-center">
							<div class="col-lg-6 mb-4 mb-lg-0">
								<div class="box-shadow-large">
									<img src="img/about/history4.jpg" alt="...">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="ps-0 ps-lg-3 ps-xl-4">
									<h4 class="mb-3">Strategic plans</h4>
									<p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages.</p>
									<ul class="list-style1 mb-4">
										<li>Life time supports</li>
										<li>Solve your problem with us</li>
										<li>We Provide Awesome Services</li>
										<li>Your business deserves best software</li>
									</ul>
									<a href="#!" class="butn-style3 medium">Read More</a>
								</div>
							</div>
						</div>
					</div>

					<div>
						<div class="row align-items-center">
							<div class="col-lg-6 order-lg-1 order-2">
								<div class="pe-0 pe-lg-3 pe-xl-4">
									<h4 class="mb-3">Awards win</h4>
									<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined.</p>
									<ul class="list-style1 mb-4">
										<li>Life time supports</li>
										<li>Solve your problem with us</li>
										<li>We Provide Awesome Services</li>
										<li>Your business deserves best software</li>
									</ul>
									<a href="#!" class="butn-style3 medium">Read More</a>
								</div>
							</div>
							<div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0">
								<div class="box-shadow-large">
									<img src="img/about/history5.jpg" alt="...">
								</div>
							</div>
						</div>
					</div>

				</div> -->
			</div>
		</div>

	</div>
</section>
