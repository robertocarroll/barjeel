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

			<div class="article-row">

			<?php
			    $barjeel_style_classes = array('article-one column-one','article-two column-two','article-three column-three', 'article-four column-four');
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
							
					<div class="<?php echo $barjeel_style_classes[$barjeel_style_index++ % $barjeel_styles_count]; ?>">		

						<article>	

							<div class="square">&nbsp;</div>

							<?php	$fpw_img_tag = MultiPostThumbnails::get_the_post_thumbnail('post', 'feature-image-2', NULL,  'cropped-thumb');	?>

							<?php if (!empty($fpw_img_tag)) {

								echo '<a href="'.get_permalink().'"><div class="vignette-square">'.$fpw_img_tag.'</div></a>';
							}
							?>
															
							<h1 class="gamma bold article-list"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

							<?php $dates = get_post_meta($post->ID, 'Dates', true);
								//Checking if anything exists for the dates
								if ($dates) { ?>
								<?php echo '<h2 class="date epsilon e-date">'.$dates.'</h2>'; ?>
							<?php } ?>
									 				
						</article>

					</div>
						
					<?php endwhile; ?>

					<?php wp_reset_query(); ?>  		

				</div>	<!-- .article-row -->

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

	

<?php get_footer(); ?>