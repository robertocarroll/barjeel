<?php get_header(); ?>
		

		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">

			<?php if ( have_posts() ) : ?>
			
				<div class="two columns">

				<header class="page-header">
					
					<h2 class="gamma">
						<?php
								printf( __( '%s', 'barjeel' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						?>
					</h2>
					
					<?php echo category_description(); ?>
					
				</header>
					
						<hr/>
					
					</div><!-- two columns-->	
				

				<?php rewind_posts(); ?>
			
				<div id="sort">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
		
							<div class="box-ms">
		
							<article <?php post_class(); ?>>
							
							<div class="center">						
							<?php
							if ( has_post_thumbnail() ){ ?>
								<?php $thumbID = get_post_thumbnail_id($post->ID); ?>
								<?php the_post_thumbnail('collection-thumb'); ?>
						<?php } ?>
						
						</div><!-- .center -->	
							
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		
							</article>
									
								</div>
					

				<?php endwhile; ?>
				</div>
				
				</div>
				
				

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>