<?php
/**
 * The template for displaying search forms in barjeel
 *
 * @package barjeel
 * @since barjeel 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'barjeel' ); ?></label>
		<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search', 'barjeel' ); ?>" />

    <input class="submit" type="submit" value="Search">
	</form>
