<?php
/**
 * The template for displaying search form.
 *
 * @package streamline
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'streamline' ) ?></span>
		<input type="search" class="search-form__field"
			placeholder='<?php echo esc_attr_x( "I'm looking for....", "placeholder", "streamline" ) ?>'
			value="<?php echo get_search_query() ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label', 'streamline' ) ?>" />
	</label>
	<button type="submit" class="search-form__submit btn"><span class="search-btn-txt"><?php esc_html_e( 'Search', 'streamline' ); ?></span><i class="material-icons">search</i></button>
</form>