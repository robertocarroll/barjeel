<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1 class="entry-title"><?php the_title(); ?></h1>
		
	<div class="entry-content">
		
		<div class="featured-image center">

			<!-- Gets the featured image -->
				
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
		
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'collection-big' ); ?>	

				<!-- This is for the zoom - gets an even bigger image and adds it to the data attribute data-okimage -->
				<?php $imagezoom = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'collection-zoom' ); ?>
				
				<img src="<?php echo $image[0]; ?>" class="imagezoom" data-okimage="<?php echo $imagezoom[0]; ?>">
				
				</div><!-- .featured-image -->	
			
			<?php endif; ?>		
		
		<div class="meta">
		
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
		
		</div><!-- .meta -->
	
		<?php the_content(); ?>

		<?php setPostViews(get_the_ID()); ?>
		
	</div><!-- .entry-content -->
	
</article><!-- #post-<?php the_ID(); ?> -->

<aside>

<!-- Get other work by the same artist by looking for other posts with the same term (artistname) in the taxonomy artist -->

<?php 

$artistlink = rw_get_the_term_list(null, 'artist', false, '', ', ', ''); 
$artist = strip_tags($artistlink);

?>

<?php

global $post;
$currentID = get_the_ID();

			$artistwork = array(
			'post__not_in' => array($currentID),
			'tax_query' => array(
				array(
							'taxonomy' => 'category',
							'terms' => array('collection'),
							'field' => 'slug',
						),
				array(
							'taxonomy' => 'artist',
							'field' => 'slug',
							'terms' => $artist
						),
			)
		);

			
			?>
			
				<?php $artwork_query = new WP_Query( $artistwork ); ?>
				
				<?php /* Start the Loop */ ?>
				
				<?php if( $artwork_query->have_posts() ) : ?>

					<h2><?php echo rw_get_the_term_list(null, 'artist', false, 'More work by ', ', ', ''); ?></h2>
				
				<div id="sortartist">
			
				<?php while ( $artwork_query->have_posts() ) : $artwork_query->the_post(); ?>
		
					<?php get_template_part('catalogue');?> 	      

				<?php endwhile; ?>

			</div><!-- .sortartist -->	 

				<?php echo rw_get_the_term_list(null, 'artist', false, 'Go to ', ', ', ''); ?>
				
				<?php endif; ?>	
				
				<?php /* Reset query */ wp_reset_postdata(); ?>


</aside> 


