<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 * Template for the exhibitions posts 
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
					$example_product = get_post_meta($post->ID, 'slideshow', true);
					if ($example_product)
						echo get_royalslider($example_product);
	
				?>	
	
	<div class="exhibition-text white">

		<h1 class="alpha bold main-title gray"><?php the_title(); ?></h1>

					<?php $dates = get_post_meta($post->ID, 'Dates', true);
						//Checking if anything exists for the dates
						if ($dates) { ?>
						<?php echo '<h2 class="exhibition-meta e-date">'.$dates.'</h2>'; ?>
					<?php } ?>	

					<?php $location = get_post_meta($post->ID, 'Location', true);
						//Checking if anything exists for the location
						if ($location) { ?>
						<?php echo '<h2 class="exhibition-meta">'.$location.'</h2>'; ?>
					<?php } ?>	
	
		<div class="exhibition-main-text">

			<?php the_content(); ?>
		
		</div><!-- .exhibition-main-text -->	

		<!-- Artists - from custom field called artists -->
		
	<?php $artists = get_post_meta($post->ID, 'artists', false); ?>
	
	<?php if ( $artists ) { ?>	

	<div class="artist-list">
	
		<ul class = "nav  nav--stacked">
			<?php foreach($artists as $artist) {
				echo '<li>'.$artist.'</li>';
				} ?>
		</ul>

	</div><!-- .artist-list -->	


	<?php } ?>

	</article><!-- #post-<?php the_ID(); ?> -->


	<!-- Related posts - manually chosen posts  -->

			
			<?php
			    $barjeel_style_classes = array('article-one','article-two','article-three', 'article-four');
			    $barjeel_styles_count = count($barjeel_style_classes);
			    $barjeel_style_index = 0;
			?>
			
			<?php
				
				if ( !function_exists( 'p2p_register_connection_type' ) )
				
				return;
	
				global $wp_query;
				
				p2p_type( 'related-articles' )->each_connected( $wp_query );	

					global $post;
					if( isset( $post->connected ) && !empty( $post->connected ) ):

						echo '<div class="related-posts">';
						

						echo '<div class="<?php echo $barjeel_style_classes[$barjeel_style_index++ % $barjeel_styles_count]; ?>">	';
						
						$count = 1;
						
						foreach( $post->connected as $related ):
							

							if( $count < 3 ) {	?>

						<article>	

							<div class="square">&nbsp;</div>
															
							<h1 class="gamma bold">

								<?php	

									echo '<a href="' . get_permalink( $related->ID ) . '">' . $related->post_title . '</a>';

								?>	

							</h1>

							<?php $dates = get_post_meta($post->ID, 'Dates', true);
								//Checking if anything exists for the dates
								if ($dates) { ?>
								<?php echo '<h2 class="date epsilon e-date">'.$dates.'</h2>'; ?>
							<?php } ?>
									 
							<?php the_excerpt(); ?>

								<a href="<?php the_permalink(); ?>">	
	 
								 <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'feature-image-2', NULL,  'cropped-thumb'); 

								 endif; ?>			

								</a>												
					
						</article>
								

						<?php		
								$count++;
							

							}
						endforeach;
					
						echo '</div>';

					echo '</div>';	
					
					endif;


?>

	<div style="clear:both;"></div>
	

<!-- Artwork - looks for posts with a category collection and a taxonomy exhibition -->
		
		<?php global $post;
			$artwork['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'terms' => array('collection'),
					'field' => 'slug',
				),
				array(
					'taxonomy' => 'exhibition',
					'terms' => array($post->post_name),
					'field' => 'slug',
				),
			);
			?>
			
				<?php $artwork_query = new WP_Query( $artwork ); ?>
				
				<?php /* Start the Loop */ ?>
				
				<?php if( $artwork_query->have_posts() ) : ?>
				
				<h2 class="related-title">Artwork from <?php the_title(); ?> </h2>
				
				<div id="sort">
				
				<?php while ( $artwork_query->have_posts() ) : $artwork_query->the_post(); ?>
		
					<?php get_template_part('catalogue'); ?>
				
				<?php endwhile; ?>
				
				</div>
				
				<?php endif; ?>	
				
				<?php /* Reset query */ wp_reset_postdata(); ?>





