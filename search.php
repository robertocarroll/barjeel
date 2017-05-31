<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package barjeel
 * @since barjeel 1.0
 */

get_header(); ?>

		<section id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

					<h2 class="zeta light gray margin-bottom">
            <?php $key = wp_specialchars($s, 1); echo 'Your search for <span class="bold uppercase">' . $key . ' </span>received ' . $wp_query->found_posts . ' results'; ?></h2>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<div style="clear:both;"></div>

				<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>

					<?php } ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'search' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->


<?php get_footer(); ?>
