<?php get_header(); ?>

		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">

			<?php if ( have_posts() ) : ?>

				<div id="carousel-gallery" class="touchcarousel black-and-white"> 

					<ul class="touchcarousel-container">				

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

						
							 <li class="touchcarousel-item">
		
									<?php
									if ( has_post_thumbnail() ){ ?>

									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >

									<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'carousel-gallery' ); ?>	
				
									 <img src="<?php echo $thumbnail['0']; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" width="<?php echo $thumbnail[1]; ?>" height="<?php echo $thumbnail[2]; ?>" />
   									
   									</a>
								
								<?php } ?>
							
									
							</li><!-- .touchcarousel-item -->			

				<?php endwhile; ?>

				</ul>
				
				</div><!-- .carousel-gallery-->
		
			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>
			
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
									echo '<li><a href="' . get_term_link( $term->name, $taxonomyName ) . '">' . $term->name . '</a></li>';
									
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
				
		

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>