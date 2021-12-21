<?php
/**
 * All custom actions here.
 *
 * @package HGAsh
 */

defined( 'WPINC' ) || exit;

/**
 * Main class for Actions
 */
class HGAsh_Actions {

	/**
	 * The Construct
	 */
	public function __construct() {
		$this->hooks();
	}

	/**
	 * Hooks and Filters.
	 */
	public function hooks() {
		add_action( 'hgash_after_header', [ $this, 'get_page_featured_section' ], 10 );
	}

	/**
	 * Page Title, Breadcrumb and Image.
	 */
	public function get_page_featured_section() {

		if ( is_page_template( 'page-home.php' ) ) {
			return;
		}

		global $wp_query;
		$post_id = $wp_query->get_queried_object_id();
		$image   = $this->get_page_featured_image( $post_id );

		?>
		<section class="page-title-section bg-img cover-background left-overlay-dark" data-overlay-dark="6" data-background="<?php echo $image ? esc_url( $image['url'] ) : ''; ?>">
			<div class="container position-unset">
				<div class="page-title mx-1-6 mx-lg-2-0 mx-xl-2-6 mx-xxl-2-9">
					<div class="row">

						<?php
						$this->get_page_title( $post_id );
						$this->get_breadcrumbs( $post_id );
						?>

					</div>
				</div>
			</div>
		</section>
		<?php
	}

	/**
	 * Page Title BG Image
	 *
	 * @param int $id page id.
	 */
	public function get_page_featured_image( $id ) {

		$thumb_id = '';

		if ( has_post_thumbnail( $id ) ) {
			$thumb_id = get_post_thumbnail_id( $id, 'hgash-testimonials', [ 'title' => '' ] );
		}
		if ( is_post_type_archive( 'faqs' ) ) {
			$thumb_id = get_field( 'faqs_featured_image', 'option' );
		}
		if ( is_post_type_archive( 'projects' ) ) {
			$thumb_id = get_field( 'projects_featured_image', 'option' );
		}

		$image = df_resize( $thumb_id, '', 1920, 600, true, true );

		return $image;

	}

	/**
	 * Page Title
	 *
	 * @param int $id page id.
	 */
	public function get_page_title( $id ) {

		$title = '<div class="col-md-12"><h1>' . get_the_title( $id ) . '</div></h1>';

		if ( is_post_type_archive( 'faqs' ) ) {
			$title = '<div class="col-md-12"><h1>' . get_field( 'faqs_small_heading', 'option' ) . '</div></h1>';
		}
		echo wp_kses_post( $title );

	}

	/**
	 * Breadcrumbs.
	 *
	 * @param int $id page id.
	 */
	public function get_breadcrumbs( $id ) {
		?>
		<div class="col-md-12">
			<ul class="ps-0">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'hgash' ); ?></a></li>
				<?php
				if ( is_post_type_archive( 'faqs' ) ) {
					echo '<li>' . esc_html( get_field( 'faqs_heading', 'option' ) ) . '</li>';
				} else {
					echo '<li>' . wp_kses_post( get_the_title( $id ) ) . '</li>';
				}
				?>
			</ul>
		</div>
		<?php
	}

}

// Init.
new HGAsh_Actions();
