<?php
/*
Template Name: Home Page

*/
?>

<?php get_header(); ?>
		
			
		
	<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php 
					 // Custom widget Area Start
					 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage-main') ) : ?>
					<?php endif;
					// Custom widget Area End
					?>		

			

			<?php
			    $barjeel_style_classes = array('first-column','second-column','third-column', 'fourth-column');
			    $barjeel_styles_count = count($barjeel_style_classes);
			    $barjeel_style_index = 0;
			?>		

				
			<?php
				$args = array(
					'posts_per_page' => 4,
					'post__in'  => get_option( 'sticky_posts' ),
					'ignore_sticky_posts' => 1,
				);
				
				query_posts( $args ); ?>
					
					<?php while (have_posts()) : the_post(); ?>
							
					<div class="<?php echo $barjeel_style_classes[$barjeel_style_index++ % $barjeel_styles_count]; ?> center">		

						<article>	

							<div class="square"></div>
															
							<h1 class="omega"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									 
							<?php the_excerpt(); ?> 												
					
						</article>

					</div>
						
					<?php endwhile; ?>

					<?php wp_reset_query(); ?>  		



			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

	

<?php get_footer(); ?>