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
						<?php echo '<h2 class="date epsilon e-date">'.$dates.'</h2>'; ?>
					<?php } ?>	

					<?php $location = get_post_meta($post->ID, 'Location', true);
						//Checking if anything exists for the location
						if ($location) { ?>
						<?php echo '<h2 class="date epsilon">'.$location.'</h2>'; ?>
					<?php } ?>	
		
	<div class="entry-content">
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->


		<!-- Artists - from custom field called artists -->
		
	<?php $artists = get_post_meta($post->ID, 'artists', false); ?>
	
	<?php if ( $artists ) { ?>	
	
	<ul>
		<?php foreach($artists as $artist) {
			echo '<li>'.$artist.'</li>';
			} ?>
	</ul>
	<?php } ?>

	</article><!-- #post-<?php the_ID(); ?> -->

	<div style="clear:both;"></div>
	
						
	<!-- Press releases - looks for posts with a category press releases and a taxonomy exhibition -->
	
		<?php global $post;
			$pressreleases['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'terms' => array('press-releases'),
					'field' => 'slug',
				),
				array(
					'taxonomy' => 'exhibition',
					'terms' => array($post->post_name),
					'field' => 'slug',
				),
			);
			 ?>					
	
				<?php $pressreleases_query = new WP_Query( $pressreleases ); ?>
				
				<?php /* Start the Loop */ ?>
				
				<?php if( $pressreleases_query->have_posts() ) : ?>
				
				<h2 class="related-title">News about <?php the_title(); ?> </h2>
				
				<?php while ( $pressreleases_query->have_posts() ) : $pressreleases_query->the_post(); ?>
				
					<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php endwhile; ?>	
			
			<?php endif; ?>	
			
			<?php /* Reset query */ wp_reset_postdata(); ?>
	

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


