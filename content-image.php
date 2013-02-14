<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<div class="entry-content">
		
							
			<?php if (has_post_thumbnail( $post->ID ) ): ?>

			<!-- Gets the featured image -->

			<div class="featured-image center">
		
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'collection-big' ); ?>	

				<!-- This is for the zoom - gets an even bigger image and adds it to the data attribute data-okimage -->
				<?php $imagezoom = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'collection-zoom' ); ?>
				
				<img src="<?php echo $image[0]; ?>" class="imagezoom" data-okimage="<?php echo $imagezoom[0]; ?>">
				
				</div><!-- .featured-image -->	
			
			<?php endif; ?>		
		

		<div class="meta white center">	

			<?php if (has_post_thumbnail( $post->ID ) ): ?>

			<div class="light-italic gray zeta">

				<?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>

			</div>	

			<?php endif; ?>		

		<div class="title-area">	

		<h1 class="entry-title uppercase">

			<?php the_title(); ?> 	

		</h1>
		
		<ul class="entry-meta">		

						<?php $medium = get_the_term_list( get_the_ID(), 'medium') ?>	

										<?php if ( $medium ) { ?>	
												
													<?php echo '<li class="meta-link">Medium: '.$medium.'</li> '; ?>
												
												<?php } ?>	
				

				<!-- Exhibitions- from custom field called exhibitions -->
									
									<?php $exhibitions = get_post_meta($post->ID, 'exhibitions', false); ?>
								
												<?php if ( $exhibitions ) { ?>	

												Exhibition:
												
													<?php foreach($exhibitions as $exhibition) {
														echo '<li class="meta-link">'.$exhibition.'</li> ';
														} ?>
												
												<?php } ?>									


		</ul>		

		</div>									

		<div class="artist-area">

		<h2 class="entry-title">
			
			<?php echo rw_get_the_term_list(null, 'artist', false, '', ', ', ''); ?>

		</h2>	
		
			<ul class="entry-meta">	
									

									<?php $country = rw_get_the_term_list(null, 'artist', true, '', ', ', '');  ?>
								
												<?php if ( $country ) { ?>	
												
													<?php echo '<li class="meta-link">Origin: '.$country.'</li> '; ?>
												
												<?php } ?>	

									<?php $bornin = get_the_term_list( get_the_ID(), 'bornin') ?>	

										<?php if ( $bornin ) { ?>	
												
													<?php echo '<li class="meta-link">Born in: '.$bornin.'</li> '; ?>
												
												<?php } ?>		

													

								</ul>	

				</div>					
		
		</div><!-- .meta -->
	

			<?php related_posts(); ?>
			

			<h2 class="epsilon light gray padding-top">See nothing you like? <a href="wordpress/random">Why not take a chance?</a></h2>

		<?php setPostViews(get_the_ID()); ?>
		
	</div><!-- .entry-content -->
	
</article><!-- #post-<?php the_ID(); ?> -->






