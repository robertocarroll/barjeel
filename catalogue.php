	
		
						<div class="box-ms">
		
							<article <?php post_class(); ?>>
									
								<div class="center">						
									<?php
									if ( has_post_thumbnail() ){ ?>
										<a href="<?php the_permalink(); ?>">
											<?php $thumbID = get_post_thumbnail_id($post->ID); ?>
											<?php the_post_thumbnail('collection-thumb'); ?>
										</a>	
									<?php } ?>
								
								</div><!-- .center -->	
							
								<h3 class="title"><a href="<?php the_permalink(); ?>">

									<?php $title = get_the_title(); 
									echo mb_strimwidth($title, 0, 20, '...'); 
									?>
								</a></h3>
								
								<p class="artist"><?php echo rw_get_the_term_list(null, 'artist', false, '', ', ', ''); ?></p>
									
		
							</article>
									
						</div><!-- .box-ms -->	
					
			