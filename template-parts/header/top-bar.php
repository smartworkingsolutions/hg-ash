<?php
/**
 * The template part for displaying Top bar in header.
 *
 * @package HGAsh
 */

if ( is_page_template( 'page-home.php' ) ) {
	return;
}
$number        = get_field( 'top_phone_number', 'option' );
$email         = get_field( 'top_email', 'option' );
// $facebook_url  = get_field( 'top_facebook_url', 'option' );
// $twitter_url   = get_field( 'top_twitter_url', 'option' );
// $instagram_url = get_field( 'top_instagram_url', 'option' );
// $linkedin_url  = get_field( 'top_linkedin_url', 'option' );
$icons = get_field( 'top_social_icons', 'options' );
$links = get_social_links();
?>

<div id="top-bar">
	<div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
		<div class="row">
			<div class="col-md-9 col-xs-12">
				<div class="top-bar-info">
					<ul class="ps-0">
						<?php
						if ( $number ) {
							echo '<li><i class="ti-mobile"></i>' . esc_html( $number ) . '</li>';
						}
						if ( $email ) {
							echo '<li class="d-none d-sm-inline-block"><i class="ti-email"></i>' . esc_html( $email ) . '</li>';
						}
						?>
						<!-- <li><i class="ti-mobile"></i>(+123) 456 7890</li> -->
						<!-- <li class="d-none d-sm-inline-block"><i class="ti-email"></i>addyour@emailhere</li> -->
					</ul>
				</div>
			</div>
			<div class="col-xs-12 col-md-3 d-none d-md-block">
				<ul class="top-social-icon ps-0">

					<?php
					foreach ( $icons as $icon ) {
						if ( 'facebook' === $icon && $links['facebook'] ) {
							echo '<li><a href="' . esc_url( $links['facebook'] ) . '"><i class="fab fa-facebook-f"></i></a></li>';
						}
						if ( 'twitter' === $icon && $links['twitter'] ) {
							echo '<li><a href="' . esc_url( $links['twitter'] ) . '"><i class="fab fa-twitter"></i></a></li>';
						}
						if ( 'instagram' === $icon && $links['instagram'] ) {
							echo '<li><a href="' . esc_url( $links['instagram'] ) . '"><i class="fab fa-instagram"></i></a></li>';
						}
						if ( 'linkedin' === $icon && $links['linkedin'] ) {
							echo '<li><a href="' . esc_url( $links['linkedin'] ) . '"><i class="fab fa-linkedin-in"></i></a></li>';
						}
					}
					?>

				</ul>
			</div>
		</div>
	</div>
</div>
