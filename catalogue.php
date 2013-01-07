	
		
						<div class="box-ms">
		
							<article <?php post_class(); ?>>
									
								<div class="center">

								<a href="<?php the_permalink(); ?>">	
								 
								 <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'feature-image-2', NULL,  'cropped-thumb'); 

								 endif; ?>						
								</a>	

								</div><!-- .center -->	
							
								<h3 class="title"><a href="<?php the_permalink(); ?>">

									<?php $title = get_the_title(); 
									echo mb_strimwidth($title, 0, 20, '...'); 
									?>
								
								</a></h3>
								
								<p class="artist"><?php echo rw_get_the_term_list(null, 'artist', false, '', ', ', ''); ?></p>
									
		
							</article>
									
						</div><!-- .box-ms -->	
					
			