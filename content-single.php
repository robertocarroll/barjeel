<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<div class="news-main">	
					
					<?php
						if ( has_post_thumbnail() ){ ?>
						<div class="featured-image center">
							<?php $thumbID = get_post_thumbnail_id($post->ID); ?>
							<?php the_post_thumbnail('collection-big'); ?>
						</div><!-- .featured-image -->				
							<?php } ?>
					

					<div class="news-entry white">	

						<?php if ( has_post_thumbnail() ) {?>

							<div class="light-italic gray zeta">

								<?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>

							</div>	

							<?php } ?>

							
						<h1 class="alpha bold exhibition-title gray"><?php the_title(); ?></h1>

						<h2 class="date epsilon e-date"><?php the_time('j F Y'); ?></h2>
						
						<?php the_content(); ?>

						<ul class="light uppercase meta-news nav">		

								<?php echo get_the_term_list( get_the_ID(), 'news-themes', '<li class="meta-link">', '</li><li class="meta-link">', '</li>') ?>	

									</ul>		

					</div><!-- .news-text -->
		
	</div><!-- .news-main -->


</article><!-- #post-<?php the_ID(); ?> -->


	<div class="nextprevious">
		<ul>
			<li class="prev"><?php previous_post_link('%link', '<div class="previousproject">Previous post</div>', TRUE); ?></li>
			<li class="next"><?php next_post_link('%link', '<div class="nextproject">Next post</div>', TRUE); ?> </li>
		</ul>
	</div>