<?php /*
Related Thumbnails
*/
?>

<?php if ($related_query->have_posts()):?>
	
	<h2>Related artworks</h2>

	<div id="sort">
		<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>

			<?php get_template_part('catalogue');?> 

		<?php endwhile; ?>
	
	</div>
	
<?php endif; ?>
