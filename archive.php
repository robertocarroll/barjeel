<?php get_header(); ?>
		
		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">	

			<?php if ( have_posts() ) : ?>
					
				<h1 class="gamma bold gray">
						<?php
								printf( __( '%s', 'barjeel' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						?>
				</h1>	

				<?php rewind_posts(); ?>
			
			
					<?php /* Start the Loop */ ?>
					
						<?php while ( have_posts() ) : the_post(); ?>						

						<?php get_template_part('news');?> 
							
						<?php endwhile; ?>
								
				<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>
					
					<?php } ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>