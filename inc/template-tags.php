<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package HGAsh
 */

/**
 * Prints HTML of logo.
 */
function theme_logo() {
	?>
	<div class="navbar-header navbar-header-custom">
	<?php
	if ( has_custom_logo() ) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image          = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		$image_url      = $image[0];
		$page_logo      = get_theme_mod( 'page_logo' );

		if ( ! is_page_template( 'page-home.php' ) ) {
			$image_url = $page_logo;
		}

		printf(
			'<a href="%s" class="navbar-brand">
			<img src="%s">
			</a>',
			esc_url( get_home_url() ),
			esc_url( $image_url )
		);
	} else {
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php
	}
	?>
	</div>
	<?php
}

if ( ! function_exists( 'hgash_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function hgash_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'hgash' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'hgash_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function hgash_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'hgash' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'hgash_author_avatar' ) ) :
	/**
	 * Prints HTML with author image for the current author.
	 *
	 * @param string $size size of avatar image.
	 */
	function hgash_author_avatar( $size = '100' ) {
		if ( function_exists( 'get_avatar' ) ) :
			echo get_avatar( get_the_author_meta( 'email' ), $size );
		endif;
	}
endif;

if ( ! function_exists( 'hgash_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function hgash_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'hgash' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'hgash' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'hgash' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'hgash' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'hgash' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'hgash' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'hgash_post_title' ) ) {
	/**
	 * Displays an optional post title.
	 */
	function hgash_post_title() {

		if ( is_singular() && ! is_front_page() ) :
			the_title( '<h1 class="page-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

	}
}

if ( ! function_exists( 'hgash_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @param string $thumb cuustom thumb size.
	 */
	function hgash_post_thumbnail( $thumb = 'post-thumbnail' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						$thumb,
						[
							'alt' => the_title_attribute(
								[
									'echo' => false,
								]
							),
						]
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Prints HTML of header.
 */
function theme_header_html() {

	if ( is_404() ) {
		return;
	}

	$header_classes = 'header-style1 menu_area-light';
	$nav_classes    = 'navbar-default border-bottom border-color-light-white';

	if ( ! is_page_template( 'page-home.php' ) ) {
		$header_classes = 'header-style3';
		$nav_classes    = 'navbar-default';
	}
	?>

	<header class="<?php echo esc_html( $header_classes ); ?>">

	<!-- Top bar -->
	<?php get_template_part( 'template-parts/header/top', 'bar' ); ?>

	<div class="<?php echo esc_html( $nav_classes ); ?>">

		<!-- Top search -->
		<?php get_template_part( 'template-parts/header/top', 'searchform' ); ?>

		<div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
			<div class="row align-items-center">
				<div class="col-12 col-lg-12">
					<div class="menu_area alt-font">

						<nav class="navbar navbar-expand-lg navbar-light p-0">

							<!-- Logo -->
							<?php theme_logo(); ?>

							<!-- Menu -->
							<div class="navbar-toggler"></div>
							<?php
							$nav = new HGAsh_Menu_Walker( 'main-menu' );
							echo $nav->build_menu(); // phpcs:ignore
							?>

							<!-- Search icon and button -->
							<?php get_template_part( 'template-parts/header/icon', 'button' ); ?>

						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>

	</header>

	<?php
}

/**
 * Prints HTML of footer.
 */
function theme_footer_html() {

	if ( is_404() ) {
		return;
	}
	?>

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

	<?php
}
