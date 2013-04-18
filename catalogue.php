	
		
						<div class="box-ms">
		
							<article <?php post_class(); ?>>
									
								<div class="center round">

								<a href="<?php the_permalink(); ?>">

								<div class="vignette">	
								 
								 <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'feature-image-2', NULL,  'cropped-thumb'); 

								 endif; ?>	

								 </div> <!-- .vignette -->					
								</a>	
							
								<h1 class="artwork-title uppercase bold-italic">

									<a href="<?php the_permalink(); ?>">

									<?php $title = get_the_title(); 
									echo mb_strimwidth($title, 0, 20, '...'); 
									?>
								
									</a> 

								</h1>	

								<h2 class="artist-name">	
									<?php echo rw_get_the_term_list(null, 'artist', false, '', ', ', ''); ?>
								</h2>

								
								
								<ul class="artwork-meta">	
									
									<!-- Exhibitions- from custom field called exhibitions
									
									<?php $exhibitions = get_post_meta($post->ID, 'exhibitions', false); ?>
								
												<?php if ( $exhibitions ) { ?>	
												
													<?php foreach($exhibitions as $exhibition) {
														echo '<li>'.$exhibition.'</li> ';
														} ?>
												
												<?php } ?> -->


									<?php $country = rw_get_the_term_list(null, 'artist', true, '', ', ', '');  ?>
								
												<?php if ( $country ) { ?>

													<?php echo '<li class="meta-link">'.$country.'</li> '; ?>
												
												<?php } ?>			

									
								</ul>
								
								</div><!-- .center -->		
		
							</article>
									
						</div><!-- .box-ms -->	
					
			