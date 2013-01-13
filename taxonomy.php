<?php get_header(); ?>
		
			<?php echo rw_get_the_term_list(null, 'artist', false, 'Filtered by ', ', ', ''); ?>
			
				<?php get_template_part('category-collection');?> 
			
<?php get_footer(); ?>