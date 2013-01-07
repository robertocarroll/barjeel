<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<div class="entry-content">
		
		<div class="featured-image center grey">

			<!-- Gets the featured image -->
				
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
		
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'collection-big' ); ?>	

				<!-- This is for the zoom - gets an even bigger image and adds it to the data attribute data-okimage -->
				<?php $imagezoom = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'collection-zoom' ); ?>
				
				<img src="<?php echo $image[0]; ?>" class="imagezoom" data-okimage="<?php echo $imagezoom[0]; ?>">
				
				</div><!-- .featured-image -->	
			
			<?php endif; ?>		
		

		<div class="meta white center">	

		<h1 class="entry-title"><?php the_title(); ?></h1>
		
			<ul>
				
				<li><?php echo rw_get_the_term_list(null, 'artist', false, 'Artist: ', ', ', ''); ?></li>
				
				<li><?php echo rw_get_the_term_list(null, 'artist', true, 'Country: ', ', ', ''); ?></li>
			
				<li><?php echo get_the_term_list( get_the_ID(), 'theme', "Theme: " ) ?></li>
				
				<!-- Exhibitions- from custom field called exhibitions -->
				
				<?php $exhibitions = get_post_meta($post->ID, 'exhibitions', false); ?>
			
							<?php if ( $exhibitions ) { ?>	
							<li>Exhibition:
								<?php foreach($exhibitions as $exhibition) {
									echo ''.$exhibition.' ';
									} ?>
							</li>
							<?php } ?>
			</ul>		

			<?php the_content(); ?>
		
		</div><!-- .meta -->
	

			<?php related_posts(); ?>
		

		<?php setPostViews(get_the_ID()); ?>
		
	</div><!-- .entry-content -->
	
</article><!-- #post-<?php the_ID(); ?> -->






