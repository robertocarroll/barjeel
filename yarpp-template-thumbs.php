<?php /*
Related Thumbnails
*/
?>

<?php if ( in_category( 'collection' )) { ?>

<?php add_filter('posts_where', 'only_collection_cat'); ?>

<?php if ($related_query->have_posts()):?>
	
	<h2 class="related-title">Related artwork</h2>

	<div id="sortArtwork">
		
		<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>

			<?php get_template_part('catalogue');?> 

		<?php endwhile; ?>
	
	</div>
	
<?php endif; ?>

<?php } ?>



<?php if ( in_category( 'news' )) { ?>

<?php add_filter('posts_where', 'only_news_cat'); ?>

<?php if ($related_query->have_posts()):?>
	
	<h2 class="related-title">Related news</h2>

		<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>

			<?php get_template_part('news');?> 

		<?php endwhile; ?>
	
<?php endif; ?>


<?php } ?>