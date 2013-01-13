<?php
/**
 * The Template for displaying all single posts.
 *
 * @package barjeel
 * @since barjeel 1.0
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

					<?php 
					$format = get_post_format();
							
							if ( false === $format ) {
					?>
						<?php get_template_part( 'content', 'single' ); ?>
					<?php 
					}
					
					else  {
					?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php 
					}
					
					
					?>

			<?php endwhile; // end of the loop. ?>
			
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->


<?php get_footer(); ?>