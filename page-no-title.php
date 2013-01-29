<?php
/*
Template Name: Page - no title

*/
?>

<?php get_header(); ?>

<div class="page-content">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- Gets the featured image -->
				
			<?php if (has_post_thumbnail( $post->ID ) ): ?>

				<div class="page-image">
		
					<?php the_post_thumbnail ('page-big'); ?>	
				
				<div style="clear:left;"></div>
			
			<?php endif; ?>	

			<?php $asideone = get_post_meta($post->ID, 'aside-one', true);
						//Checking if anything exists for the first aside
						if ($asideone) { ?>
						<?php echo '<aside class="left-aside-one center round">'.$asideone.'</aside>'; ?>
					<?php } ?>

			<?php $asidetwo = get_post_meta($post->ID, 'aside-two', true);
						//Checking if anything exists for the first aside
						if ($asidetwo) { ?>
						<?php echo '<aside class="left-aside-two center round">'.$asidetwo.'</aside>'; ?>
					<?php } ?>	

					</div><!-- .page-image -->	

	<div class="page-text">

				<?php $intro = get_post_meta($post->ID, 'Intro', true);
						//Checking if anything exists for the intro
						if ($intro) { ?>
						<?php echo '<div class="page-intro">'.$intro.'</div>'; ?>
					<?php } ?>
	
	<div class="entry-content">
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->

</div><!-- .page-text -->
</article><!-- #post-<?php the_ID(); ?> -->

</div><!-- .page-content -->

<?php get_footer(); ?>
