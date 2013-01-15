<?php get_header(); ?>
		

		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">

			<?php

				/* Get all sticky posts */
				$sticky = get_option( 'sticky_posts' );

				/* Sort the stickies with the newest ones at the top */
				rsort( $sticky );

				/* Get the 5 newest stickies (change 5 for a different number) */
				$sticky = array_slice( $sticky, 0, 1 );

				$stickyexhibition = array(
					'posts_per_page' => 1,
					'post__in'  => $sticky,
					'ignore_sticky_posts' => 1,
					'category_name' => 'exhibitions'
				);
				
			 ?>
				
	
				<?php $stickyexhibition_query = new WP_Query( $stickyexhibition ); ?>
				
				<?php /* Start the Loop */ ?>
				
				<?php if( $stickyexhibition_query->have_posts() ) : ?>		
			
				<?php while ( $stickyexhibition_query->have_posts() ) : $stickyexhibition_query->the_post(); ?>
					
					<article>

						<!-- Gets the featured image -->
				
							<?php if (has_post_thumbnail( $post->ID ) ): ?>

								<div class="page-image">
						
									<?php the_post_thumbnail ('page-big'); ?>	
								
								</div><!-- .page-image -->
							
							<?php endif; ?>	

					<div class="page-text white">		

			
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							
							<ul class="post-info">
								<li><?php the_time('j F Y'); ?></li>
							</ul>

					</div>		
					
					</article>
								 
							
				<?php endwhile; ?>

				<?php endif; ?>	
				
				<?php /* Reset query */ wp_reset_postdata(); ?>
			
			<?php
			    $barjeel_style_classes = array('article-one','article-two','article-three', 'article-four');
			    $barjeel_styles_count = count($barjeel_style_classes);
			    $barjeel_style_index = 0;
			?>	

		<?php 
													
			query_posts(array("post__not_in" =>get_option("sticky_posts"), 'category_name' => 'exhibitions', 'paged' => get_query_var('paged'), 'posts_per_page' => 2)); ?>
				
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>

							<div class="<?php echo $barjeel_style_classes[$barjeel_style_index++ % $barjeel_styles_count]; ?>">		

						<article>	

							<div class="square">&nbsp;</div>
															
							<h1 class="gamma bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
									 
							<?php the_excerpt(); ?>

								<a href="<?php the_permalink(); ?>">	
	 
								 <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'feature-image-2', NULL,  'cropped-thumb'); 

								 endif; ?>			

								</a>	
																
						</article>

					</div>

				<?php endwhile; ?>

				<div style="clear:both;"></div>
				
				<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>
					<div class="navigation clearfix">
						<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
						<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
					</div>
					<?php } ?>
				
				
				<?php endif; ?>			

		<?php wp_reset_query(); ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>