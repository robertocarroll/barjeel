<?php
/*
Template Name: Education page

*/
?>

<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php while ( have_posts() ) : the_post(); ?>

	<div class="exhibition-main">

		<div class="exhibition-text white padding-top-most">						

			<h1 class="entry-title-page no-margin-below"><?php the_title(); ?></h1>

				<div class="education-main-text">

					<?php the_content(); ?>
		
				</div><!-- .education-main-text -->

		</div><!-- .exhibition-text white -->	

</div><!-- .exhibition-main -->

<?php endwhile; // end of the loop. ?>

</article><!-- #post-<?php the_ID(); ?> -->

<div class="related-posts">

		<?php global $post;

		$asideone = get_post_meta($post->ID, 'aside-one', true);
						//Checking if anything exists for the first aside
						if ($asideone) { ?>
						<?php echo '<aside class="aside-one aside-right">'.$asideone.'</aside>'; ?>
					<?php } ?>

			<?php $asidetwo = get_post_meta($post->ID, 'aside-two', true);
						//Checking if anything exists for the first aside
						if ($asidetwo) { ?>
						<?php echo '<aside class="aside-two aside-right">'.$asidetwo.'</aside>'; ?>
					<?php } ?>	

			<?php $asidethree = get_post_meta($post->ID, 'aside-three', true);
						//Checking if anything exists for the first aside
						if ($asidethree) { ?>
						<?php echo '<aside class="aside-three aside-right">'.$asidethree.'</aside>'; ?>
					<?php } ?>			


</div><!-- .related-posts -->


<div style="clear:both;"></div>

<div class="article-row">

			<?php
			    $barjeel_style_classes = array('article-one column-one','article-two column-two','article-three column-three', 'article-four column-four');
			    $barjeel_styles_count = count($barjeel_style_classes);
			    $barjeel_style_index = 0;
			?>		
				
			<?php
				$args = array(
					'posts_per_page' => 3,
					'category_name' => 'news',
					 'news-themes' => 'education',
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


<?php get_footer(); ?>