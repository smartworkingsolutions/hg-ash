<?php
/**
 * The template part for displaying Top search form in header.
 *
 * @package HGAsh
 */

?>

<div class="top-search bg-secondary">
	<div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
		<form class="search-form" method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>" accept-charset="utf-8">
			<div class="input-group">
				<span class="input-group-addon cursor-pointer">
					<button class="search-form_submit fas fa-search text-white" type="submit"></button>
				</span>
				<input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter..." value="<?php echo get_search_query(); ?>">
				<span class="input-group-addon close-search mt-1"><i class="fas fa-times"></i></span>
			</div>
		</form>
	</div>
</div>
