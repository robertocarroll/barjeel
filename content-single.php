<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		
	<div class="entry-content">
		
		<div class="featured-image center">
		<?php
			if ( has_post_thumbnail() ){ ?>
				<?php $thumbID = get_post_thumbnail_id($post->ID); ?>
				<?php the_post_thumbnail('collection-big'); ?>
						
				<?php } ?>
		</div><!-- .featured-image -->	
		
		<div class="meta">
		
		<ul>
		
		<li><?php echo rw_get_the_term_list(null, 'artist', false, 'Artist: ', ', ', ''); ?></li>
		
		<li><?php echo rw_get_the_term_list(null, 'artist', true, 'Country: ', ', ', ''); ?></li>
	
		<li><?php echo get_the_term_list( get_the_ID(), 'theme', "Theme: " ) ?></li>
		
		</div><!-- .meta -->
	
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
