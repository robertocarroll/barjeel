<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 * Template for the exhibitions posts 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<h1 class="entry-title"><?php the_title(); ?></h1>
		
	<div class="entry-content">
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->
	
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
				
				<h3>Artwork <?php the_title(); ?> </h3>
				
				<div id="sort">
				
				<?php while ( $artwork_query->have_posts() ) : $artwork_query->the_post(); ?>
		
					<div class="box-ms">
		
							<article <?php post_class(); ?>>
							
							<div class="center">						
							<?php
							if ( has_post_thumbnail() ){ ?>
							<a href="<?php the_permalink(); ?>">
								<?php $thumbID = get_post_thumbnail_id($post->ID); ?>
								<?php the_post_thumbnail('collection-thumb'); ?>
							</a>	
						<?php } ?>
						
						</div><!-- .center -->	
							
								<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								
								<p class="artist"><?php echo rw_get_the_term_list(null, 'artist', false, '', ', ', ''); ?></p>
		
							</article>
									
								</div>
				
				<?php endwhile; ?>
				
				</div>
				
				<?php endif; ?>	
				
				<?php /* Reset query */ wp_reset_postdata(); ?>
				
						
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
				
				<h3>Press releases about <?php the_title(); ?> </h3>
				
				<?php while ( $pressreleases_query->have_posts() ) : $pressreleases_query->the_post(); ?>
				
					<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php endwhile; ?>	
			
			<?php endif; ?>	
			
			<?php /* Reset query */ wp_reset_postdata(); ?>
	
	
	<!-- Artists - from custom field called artists -->
		
	<?php $artists = get_post_meta($post->ID, 'artists', false); ?>
	
	<?php if ( $artists ) { ?>	
	<h3>Artists in <?php the_title(); ?> </h3>
	
	<ul>
		<?php foreach($artists as $artist) {
			echo '<li>'.$artist.'</li>';
			} ?>
	</ul>
	<?php } ?>
	
	

</article><!-- #post-<?php the_ID(); ?> -->
