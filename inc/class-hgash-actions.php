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

		global $wp_query;
		$post_id = $wp_query->get_queried_object_id();

		if ( ! has_post_thumbnail( $post_id ) ) {
			return;
		}

		$thumb_id = get_post_thumbnail_id( $post_id, 'hgash-testimonials', [ 'title' => '' ] );
		$image    = df_resize( $thumb_id, '', 1920, 600, true, true );

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
	 * Page Title
	 *
	 * @param int $id page id.
	 */
	public function get_page_title( $id ) {

		$title = '<div class="col-md-12"><h1>' . get_the_title( $id ) . '</div></h1>';
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
				<li><a href="#!"><?php echo wp_kses_post( get_the_title( $id ) ); ?></a></li>
			</ul>
		</div>
		<?php
	}

}

// Init.
new HGAsh_Actions();
