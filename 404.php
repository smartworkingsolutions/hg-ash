<?php
/**
 * The template for displaying error(404) page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HGAsh
 */

get_header();

$image        = df_resize( get_field( 'error_image', 'option' ), '', 468, 327, true, true );
$heading      = get_field( 'error_title', 'option' );
$text         = get_field( 'error_content', 'option' );
$contact_link = get_field( 'contact_page_link', 'option' );

?>

<section class="p-0 bg-dark">
	<div class="container-fluid d-flex flex-column">
		<div class="row align-items-center justify-content-center min-vh-100">
			<div class="col-md-9 col-lg-6">
				<div class="text-center my-1-6">

					<?php
					if ( $image ) {
						echo '<img src="' . esc_url( $image['url'] ) . '" class="mb-4 mb-md-4 mb-lg-7" alt="404 - Error">';
					}
					if ( $heading ) {
						echo '<h2 class="mb-4 text-white">' . esc_html( $heading ) . '</h2>';
					}
					if ( $text ) {
						echo '<p class="w-sm-80 w-lg-60 mx-auto mb-4 text-white opacity6">' . esc_html( $text ) . '</p>';
					}
					?>

					<div>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="butn-style3 me-2 my-1 my-sm-0"><?php esc_html_e( 'Return Home', 'hgash' ); ?></a>
						<?php
						if ( $contact_link ) {
							printf(
								'<a href="%s" class="butn-style3 secondary my-1 my-sm-0">%s</a>',
								esc_url( $contact_link ),
								esc_html__( 'Contact Us', 'hgash' )
							);
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
