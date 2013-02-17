<?php get_header(); ?>
		
		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">	


   
				<?php if ( have_posts() ) : ?>
					
				<h1 class="gamma bold gray">
						<?php
								printf( __( '%s', 'barjeel' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						?>
				</h1>	

				<?php
						//list terms in a given taxonomy
						$taxonomy = 'news-themes';
						$tax_terms = get_terms($taxonomy);
				?>
						<ul class="nav meta-news">
							<?php
							foreach ($tax_terms as $tax_term) {
							echo '<li class="meta-link">' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a></li>';
							}
							?>							
						</ul>

				<div>
		
				<?php rewind_posts(); ?>
			
			
					<?php /* Start the Loop */ ?>
					
						<?php while ( have_posts() ) : the_post(); ?>						

						<article>

							<div class="news-item">	
				
							<!-- Gets the cropped image -->
			
							<div class="news-image">	

								<a href="<?php the_permalink(); ?>">	
	 
								 <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'feature-image-2', NULL,  'news-cropped-thumb'); 

								 endif; ?>			

								</a>	

							</div>	

							
							<div class="news-text">

									<h3 class="epsilon light no-margin-below"><?php the_time('j F Y'); ?></h3>

									<h1 class="gamma bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

							</div>
									
									<ul class="entry-meta-news light uppercase meta-news nav">		

								<?php echo get_the_term_list( get_the_ID(), 'news-themes', '<li class="meta-link">', '</li><li class="meta-link">', '</li>') ?>	

									</ul>						

							</div>

						</article>

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