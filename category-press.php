<?php get_header(); ?>
		
		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">	


   
				<?php if ( have_posts() ) : ?>
					
				<h1 class="gamma">
						<?php
								printf( __( '%s', 'barjeel' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						?>
				</h1>	


				<?php rewind_posts(); ?>
			
			
					<?php /* Start the Loop */ ?>
					
						<?php while ( have_posts() ) : the_post(); ?>
		
						
							<!-- Gets the cropped image -->
				
							<div class="page-image">	

								<a href="<?php the_permalink(); ?>">	
	 
								 <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'feature-image-2', NULL,  'page-big'); 

								 endif; ?>			

								</a>	

							</div>	

							<div class="page-text">

									<li><?php the_time('j F Y'); ?></li>

									<h1 class="alpha bold main-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

							</div>

							<div style="clear:both;"></div>
							
						<?php endwhile; ?>
				


					
				
				<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>
					
					<?php } ?>


				

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>