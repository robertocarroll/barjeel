<?php get_header(); ?>

		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">

					<div class="white pad-in padding-top padding-bottom filter-sort-menu-wide">
					
				<h1 class="entry-title-page margin-below-half">
						<?php
								printf( __( '%s', 'barjeel' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						?>
				</h1>	

				<?php echo '<p>'.category_description( $category_id ).'</p>'; ?>

				</div>	
<div class="article-row">
			
		<?php
			    $barjeel_style_classes = array('article-one column-one','article-two column-two','article-three column-three', 'article-four column-four');
			    $barjeel_styles_count = count($barjeel_style_classes);
			    $barjeel_style_index = 0;
			?>	

																
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>

					<div class="<?php echo $barjeel_style_classes[$barjeel_style_index++ % $barjeel_styles_count]; ?>">		

							<article>	

								<div class="square">&nbsp;</div>

								<?php	$fpw_img_tag = MultiPostThumbnails::get_the_post_thumbnail('post', 'feature-image-2', NULL,  'cropped-thumb');	?>

								<?php if (!empty($fpw_img_tag)) {

									echo '<a href="'.get_permalink().'"><div class="vignette-square">'.$fpw_img_tag.'</div></a>';
								}
								?>
																
								<h1 class="delta bold article-list"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

								<?php $dates = get_post_meta($post->ID, 'Dates', true);
									//Checking if anything exists for the dates
									if ($dates) { ?>
									<?php echo '<h2 class="date epsilon e-date">'.$dates.'</h2>'; ?>
								<?php } ?>
										 				
							</article>

					</div>

				<?php endwhile; ?>

	</div><!-- .article-row -->

				
					<div style="clear:both;"></div>
				
				<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>
					
					<?php } ?>		

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>		

		<?php wp_reset_query(); ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>