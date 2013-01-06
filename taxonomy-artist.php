<?php get_header(); ?>

		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">

			<?php if ( have_posts() ) : ?>
			
			<header class="page-header">
					
					Using Artist
					
				<h1 class="gamma">
						<?php
								printf( __( '%s', 'barjeel' ), '<span>' . single_cat_title( '', false ) . '</span>' );
						?>
					</h1>
					
					<?php echo category_description(); ?>
					
			</header>
					
					
					<?php 
					
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					
					if($term->parent > 0) 
							{ 
							 			
							$termID = $term->parent;
							$taxonomyName = $term->taxonomy;
							$termchildren = get_term_children( $termID, $taxonomyName );
							$exclude = array($term->term_id);

 							if (empty($termchildren) or ($termchildren==$exclude)) {
 								echo 'do nothing';
 								}

 								else {

								echo '<h2>Related artists</h2><ul>';

								foreach ($termchildren as $child) {
									
									if (!in_array($child, $exclude)) {
								
									$term = get_term_by( 'id', $child, $taxonomyName );
									echo '<li><a href="' . get_term_link( $term->slug, $taxonomyName ) . '">' . $term->name . '</a></li>';
									
									}
								}
								echo '</ul>';
								}
							} 
							else 
							{ 
			
							$title        = 'Artists in this country';
							$show_count   = 1;      // 1 for yes, 0 for no
							$pad_counts   = 1;      // 1 for yes, 0 for no
							$orderby      = 'name'; 
							
							 $args = array(
								'child_of' => $term->term_id,
								'taxonomy' => $term->taxonomy,
								'pad_counts'   => $pad_counts,
								'orderby'      => $orderby,
								'title_li' => $title,
								'show_count' => $show_count
								); 
							 
							 
							 wp_list_categories( $args);
							 
							}
					?>
					
		
				<?php rewind_posts(); ?>
				
				
				Art in the collection by <?php
								printf( __( '%s', 'barjeel' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						?>
						
		
				<div id="sort">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
		
							<?php get_template_part('catalogue');?> 

				<?php endwhile; ?>
				
				</div><!-- .sort -->
		
			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>