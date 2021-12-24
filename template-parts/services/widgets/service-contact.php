<?php
/**
 * The template part for displaying Service contact widget in services details page.
 *
 * @package HGAsh
 */

?>

<?php
// Group.
if ( have_rows( 'contact_widget', 'option' ) ) :

	while ( have_rows( 'contact_widget', 'option' ) ) :
		the_row();

		$image       = '';
		$bg_image_id = get_sub_field( 'contact_widget_background_image' );
		if ( $bg_image_id ) {
			$image = $bg_image_id ? df_resize( $bg_image_id, '', 551, 304, true, true ) : '';
		}
		$main_icon = get_sub_field( 'contact_widget_icon' );
		$heading   = get_sub_field( 'contact_widget_title' );
		$bg_image  = get_sub_field( 'contact_widget_background_image' );
		?>

		<div class="bg-img theme-overlay cover-background rounded" data-overlay-dark="8" data-background="<?php echo $image ? esc_url( $image['url'] ) : ''; ?>">

			<div class="position-relative z-index-9 text-center py-5">

				<?php
				if ( $main_icon ) {
					echo '<i class="fas ' . esc_html( $main_icon ) . ' text-white mb-4 display-14"></i>';
				}
				if ( $heading ) {
					echo '<h5 class="text-white mb-4">' . esc_html( $heading ) . '</h5>';
				}
				?>
				<div class="separator-line-horrizontal-full bg-white opacity4 mb-4"></div>

				<?php
				if ( have_rows( 'details_lists', 'option' ) ) :

					echo '<ul class="text-center list-unstyled mb-0 ps-0">';

					while ( have_rows( 'details_lists', 'option' ) ) :
						the_row();

						$icon = get_sub_field( 'details_list_icon' );
						$text = get_sub_field( 'details_list_text' );
						$url  = get_sub_field( 'details_list_link' );

						printf(
							'<li class="text-white mb-2">
								<i class="fa %s small text-white me-2"></i>
								<a href="%s" class="text-white">%s</a>
							</li>',
							esc_html( $icon ),
							esc_url( $url ),
							esc_html( $text )
						);

					endwhile;

					echo '</ul>';

				endif;
				?>

			</div>

		</div>

		<?php
	endwhile;

endif;
?>
