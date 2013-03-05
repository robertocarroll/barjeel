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

							$taxonomy     = 'news-themes';
							$orderby      = 'name'; 
							$show_count   = 0;      // 1 for yes, 0 for no
							$pad_counts   = 0;      // 1 for yes, 0 for no
							$hierarchical = 0;      // 1 for yes, 0 for no
							$title        = '';

							$args = array(
							  'taxonomy'     => $taxonomy,
							  'orderby'      => $orderby,
							  'show_count'   => $show_count,
							  'pad_counts'   => $pad_counts,
							  'hierarchical' => $hierarchical,
							  'title_li'     => $title
							);
							?>
							<span class="list-title uppercase small top-menu">Categories</span>

							<ul class="nav light uppercase small top-menu">
								<?php wp_list_categories( $args ); ?>
							</ul>
		
				<?php rewind_posts(); ?>

				<div style="clear:both"></div>
			
			
					<?php /* Start the Loop */ ?>
					
				<div class="news-list">
					
						<?php while ( have_posts() ) : the_post(); ?>				
						
							<?php get_template_part('news');?> 
							
						<?php endwhile; ?>				
								
				<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>
					
					<?php } ?>

				</div><!-- .news-list -->	

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			<?php wp_reset_query(); ?>  

				<!-- Related posts - news with the tag featured -->


			<?php
			    $barjeel_style_classes = array('article-one','article-two','article-three', 'article-four');
			    $barjeel_styles_count = count($barjeel_style_classes);
			    $barjeel_style_index = 0;
			?>
			
			<div class="related-posts">

			<?php
				$args = array(
					'posts_per_page' => 4,
					'tag' => 'news-featured',
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

				</div><!-- #related -->

					<?php wp_reset_query(); ?>  

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>