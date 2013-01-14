<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package barjeel
 * @since barjeel 1.0
 */
?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- Gets the featured image -->
				
			<?php if (has_post_thumbnail( $post->ID ) ): ?>

				<div class="page-image">
		
					<?php the_post_thumbnail ('page-big'); ?>	
				
				</div><!-- .page-image -->
			
			<?php endif; ?>	

	<div class="page-text white">

				<?php $intro = get_post_meta($post->ID, 'Intro', true);
						//Checking if anything exists for the intro
						if ($intro) { ?>
						<?php echo '<div class="page-intro">'.$intro.'</div>'; ?>
					<?php } ?>
	
		<h1 class="entry-title"><?php the_title(); ?></h1>
	
	<div class="entry-content">
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->

</div><!-- .page-text -->
</article><!-- #post-<?php the_ID(); ?> -->
