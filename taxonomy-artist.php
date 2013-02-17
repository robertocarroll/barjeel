<?php get_header(); ?>

		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">

		<?php $exhibition_meta = array (); ?>

			<?php if ( have_posts() ) : ?>

				<?php $total_posts = $wp_query->found_posts; ?>

				<?php /* Check if more than one image */ ?>

				<?php if ( $total_posts > 1 ) { ?>	

				<div class="exhibition-slideshow">

					<div class="royalSlider rsDefaultInv">	

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
						
							 <div class="rsContent">
		
									<?php
									if ( has_post_thumbnail() ){ ?>

									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >

									<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'carousel-gallery' ); ?>	
				
									 <img src="<?php echo $thumbnail['0']; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" width="<?php echo $thumbnail[1]; ?>" height="<?php echo $thumbnail[2]; ?>" />
   									
   									</a>

		   			
										
								<?php } ?>
							
									<?php $exhibitions = get_post_meta($post->ID, 'exhibitions', true); 


									?>

								<?php $exhibition_meta[] = $exhibitions; ?>	

									<div class="rsGCaption">

							   			<div class="royalCaptionItem" >

											<?php echo the_title_attribute(); ?> by

											<?php echo rw_get_the_term_list(null, 'artist', false, '', ', ', ''); ?>

										</div>		

									</div>



							</div><!-- .rsContent-->


					

				<?php endwhile; ?>
				
				</div><!-- .carousel-gallery-->

			</div><!-- .slideshow-->

				<?php } ?>	

				<?php /* Do this if there's only one image */ ?>	

				<?php if ( $total_posts == 1 ) { ?>	

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
						
							 <div class="featured-image center">
		
									<?php
									if ( has_post_thumbnail() ){ ?>

									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >

									<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'carousel-gallery' ); ?>	
				
									 <img src="<?php echo $thumbnail['0']; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" width="<?php echo $thumbnail[1]; ?>" height="<?php echo $thumbnail[2]; ?>" />
   									
   									</a>

   								<div class="light-italic white zeta">

	   								<?php echo the_title_attribute(); ?> by

									<?php echo rw_get_the_term_list(null, 'artist', false, '', ', ', ''); ?>

								</div>	
								
								<?php } ?>
								
								<?php $exhibitions = get_post_meta($post->ID, 'exhibitions', true); 

								$exhibition_meta [] = $exhibitions;

								?>
									
							</div><!-- .featured-image -->			

				<?php endwhile; ?>

				<?php } ?>	
		
			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

				
			
				<div class="meta white">	

				<div class= "artist-text">	

				<div class= "center margin-below-half">	

				<h1 class="alpha bold artist-title gray">
	
					<?php printf( __( '%s', 'barjeel' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
				
				</h1>


				<?php 
					
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					
					if($term->parent > 0)  { ?>	

				<ul class="entry-meta">	
					<?php $country = rw_get_the_term_list(null, 'artist', true, '', ', ', '');  ?>
								
												<?php if ( $country ) { ?>	
												
													<?php echo '<li class="meta-link">Country: '.$country.'</li> '; ?>
												
												<?php } ?>	

							<?php	if(!empty($exhibition_meta)) { ?>

											Exhibition:

												<?php	

												list($value) = $exhibition_meta;
							  						
							  							print '<li class="meta-link">'.$value.'</li>'; 
														
													?>		
										<?php } ?>

							<?php $bornin = get_the_term_list( get_the_ID(), 'bornin') ?>	

										<?php if ( $bornin ) { ?>	
												
													<?php echo '<li class="meta-link">Born in: '.$bornin.'</li> '; ?>
												
												<?php } ?>				
										
					</ul>	
				<?php	
					}	
				 ?>		

				</div>

				<div class= "artist-detail">	
					
					<?php echo category_description(); ?>
			
				<?php 
					
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					
					if($term->parent > 0) 
							{ 
							 			
							$termID = $term->parent;
							$taxonomyName = $term->taxonomy;
							$termchildren = get_term_children( $termID, $taxonomyName );
							$exclude = array($term->term_id);

 							if (empty($termchildren) or ($termchildren==$exclude)) {
 								
 								}

 								else {

								echo '<h2 class="related-title">Related artists</h2><div class="artist-list"><ul class = "nav  nav--stacked">';

								foreach ($termchildren as $child) {
									
									if (!in_array($child, $exclude)) {
								
									$term = get_term_by( 'id', $child, $taxonomyName );
									echo '<li><a href="' . get_term_link( intval($term->term_id), $taxonomyName ) . '">' . $term->name . '</a></li>';
									
									}
								}
								echo '</ul></div><!-- .artist-list -->	';
								}
							} 
							else 
							{ 
			
							$show_count   = 0;      // 1 for yes, 0 for no
							$pad_counts   = 1;      // 1 for yes, 0 for no
							$orderby      = 'name'; 
							
							 $args = array(
								'child_of' => $term->term_id,
								'taxonomy' => $term->taxonomy,
								'pad_counts'   => $pad_counts,
								'orderby'      => $orderby,
								'title_li' => '',
								'show_count' => $show_count
								); 
							 ?>
						<h2 class="related-title">Artists in this country</h2><div class="artist-list">	
							<ul class = "nav  nav--stacked">

									<?php 	 wp_list_categories( $args);
										 
										}
									?>
							</ul></div><!-- .artist-list -->	

							<?php rewind_posts(); ?>

						</div><!-- .artist-detail -->	

					</div><!-- .artist-text -->	

				</div><!-- .meta -->	
					
									
				
				<?php related_posts(); ?>
		

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>