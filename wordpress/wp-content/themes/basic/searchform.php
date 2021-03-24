<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
	<input type="text" name="s" id="s" title="<?php _e( 'Search', 'themify' ); ?>" value="<?php echo get_search_query(); ?>" />
	<?php echo themify_get_icon('search','fa'); ?>
</form>