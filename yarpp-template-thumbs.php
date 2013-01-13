<?php /*
Related Thumbnails
*/
?>

<?php if ($related_query->have_posts()):?>
	
	<h2 class="related-title">Related artwork</h2>

	<div id="sort1">
		
		<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>

			<?php get_template_part('catalogue');?> 

		<?php endwhile; ?>
	
	</div>
	
<?php endif; ?>
