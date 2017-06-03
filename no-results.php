<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package barjeel
 * @since barjeel 1.0
 */
?>

<article id="post-0" class="post no-results not-found exhibition-main">
  <div class="white pad-in padding-top padding-bottom">
		<h1 class="entry-title-page margin-below-half"><?php _e( 'Nothing Found', 'barjeel' ); ?></h1>
	<div class="entry-content">
		<?php if ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different terms.', 'barjeel' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'We can&rsquo;t find what you&rsquo;re looking for. Perhaps searching will help.', 'barjeel' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .entry-content -->
</div>
</article><!-- #post-0 .post .no-results .not-found -->
