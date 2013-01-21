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

						<!-- Gets the cropped image -->
				
							<div class="page-image">	

								<a href="<?php the_permalink(); ?>">	
	 
								 <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'feature-image-2', NULL,  'page-big'); 

								 endif; ?>			

								</a>	

							</div>	
										

					<div class="page-text white">

						<div class="exhibition-tease">

						<?php $status = get_post_meta($post->ID, 'Status', true);
						//Checking if anything exists for the intro
						if ($status) { ?>
						<?php echo '<h2 class="date epsilon">'.$status.'</h2>'; ?>
					<?php } ?>		
			
						<h1 class="alpha bold main-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

						<?php $dates = get_post_meta($post->ID, 'Dates', true);
						//Checking if anything exists for the dates
						if ($dates) { ?>
						<?php echo '<h2 class="date epsilon e-date">'.$dates.'</h2>'; ?>
					<?php } ?>	

					<?php $location = get_post_meta($post->ID, 'Location', true);
						//Checking if anything exists for the location
						if ($location) { ?>
						<?php echo '<h2 class="date epsilon">'.$location.'</h2>'; ?>
					<?php } ?>	

						<div class="light">
							<?php the_excerpt(); ?>
						</div>	
						
						</div>

					</div>		
					
					</article>
								 
							
				<?php endwhile; ?>

				<?php endif; ?>	
				
				<?php /* Reset query */ wp_reset_postdata(); ?>

				<div style="clear:both;"></div>

				<div class="article-row">
			
		<?php
			    $barjeel_style_classes = array('article-one column-one','article-two column-two','article-three column-three', 'article-four column-four');
			    $barjeel_styles_count = count($barjeel_style_classes);
			    $barjeel_style_index = 0;
			?>	

		<?php 
													
			query_posts(array("post__not_in" =>get_option("sticky_posts"), 'category_name' => 'exhibitions', 'paged' => get_query_var('paged'), 'posts_per_page' => 8)); ?>
				
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>

							<div class="<?php echo $barjeel_style_classes[$barjeel_style_index++ % $barjeel_styles_count]; ?>">		

					<article>	

							<div class="square">&nbsp;</div>
															
							<h1 class="gamma bold article-list"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

							<?php $dates = get_post_meta($post->ID, 'Dates', true);
								//Checking if anything exists for the dates
								if ($dates) { ?>
								<?php echo '<h2 class="date epsilon bold e-date">'.$dates.'</h2>'; ?>
							<?php } ?>
									 
									<a href="<?php the_permalink(); ?>">	
	 
								 <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'feature-image-2', NULL,  'cropped-thumb'); 

								 endif; ?>			

								</a>												
					
						</article>

					</div>

				<?php endwhile; ?>

			</div><!-- .article-row -->

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