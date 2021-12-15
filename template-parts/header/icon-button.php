<?php
/**
 * The template part for displaying search icon and button in header.
 *
 * @package HGAsh
 */

$button_text = get_field( 'header_button_text', 'option' ) ? get_field( 'header_button_text', 'option' ) : '';
$button_url  = get_field( 'header_button_url', 'option' ) ? get_field( 'header_button_url', 'option' ) : '';
?>

<div class="attr-nav align-items-lg-center ms-lg-auto main-font">
	<ul>
		<li class="search"><a href="#!"><i class="fas fa-search"></i></a></li>
		<?php
		if ( $button_text && $button_url ) {
			?>
			<li class="d-none d-lg-inline-block">
				<a href="<?php echo $button_url; ?>" class="butn-style1 fill medium text-white"><?php echo $button_text; ?></a>
			</li>
			<?php
		}
		?>
	</ul>
</div>
