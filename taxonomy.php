<?php get_header(); ?>
		

		<?php
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

			echo 'Filtered by ' .$term->name. ' Showing ' .$term->count. ' results';
			
			?>

				<?php get_template_part('category-collection');?> 
			
<?php get_footer(); ?>