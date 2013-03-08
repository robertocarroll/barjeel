<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 */
?>


	<nav class="next-previous column-two-three-four">

		<ul class="nav uppercase no-margin-below">
			<li class="previous">
		<?php 

					$prev_post = get_previous_post(true);

					if  (!empty( $prev_post )) {

						previous_post_link('%link', 'Previous post', TRUE);
					}

					else {

						echo '<div class="no-link">Previous post</div>';
					}

					?>

			</li>		
			<li class="next"><?php 

					$next_post = get_next_post(true);

					if  (!empty( $next_post )) {

						next_post_link('%link', 'Next post', TRUE); 
					}

					else {

						echo '<div class="no-link">Next post</div>';
					}

					?>

			</li>
		 </ul>

	</nav>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<div class="news-main">	

				<?php
				$royal_slideshow = get_post_meta($post->ID, 'slideshow', true);
				if ($royal_slideshow)
				{
				
			?>

				<?php echo '<div class="exhibition-slideshow">' ?>

					<?php echo get_new_royalslider($royal_slideshow); ?>

				<?php echo '</div>' ?>

				<?php } 

				else {

				?>


					
					<?php
						if ( has_post_thumbnail() ){ ?>
						<div class="featured-image center">
							<?php $thumbID = get_post_thumbnail_id($post->ID); ?>
							<?php the_post_thumbnail('collection-big'); ?>
						</div><!-- .featured-image -->				
							<?php } 

					}		?>
					

					<div class="news-entry white">	

						<?php if (!$royal_slideshow)
							
						{
 

						 if ( has_post_thumbnail() ) {?>

							<div class="light-italic gray zeta center">

								<?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>

							</div>	

							<?php } 

						}	?>

						<h2 class="date zeta exhibition-title e-date"><?php the_time('j F Y'); ?></h2>	
							
						<h1 class="entry-title-page margin-below-half"><?php the_title(); ?></h1>					
						
						<?php the_content(); ?>

						<ul class="light uppercase meta-news nav">		

								<?php echo get_the_term_list( get_the_ID(), 'news-themes', '<li class="meta-link">', '</li><li class="meta-link">', '</li>') ?>	

									</ul>		

					</div><!-- .news-text -->
		
	</div><!-- .news-main -->


</article><!-- #post-<?php the_ID(); ?> -->

	<div class="related-news">
	
		<?php related_posts();?>

	</div>	

	