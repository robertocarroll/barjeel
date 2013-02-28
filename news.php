<article>

			<div class="news-item">	

			<!-- Gets the cropped image -->

			<div class="news-image">	

				<a href="<?php the_permalink(); ?>">	

				 <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'feature-image-2', NULL,  'news-cropped-thumb'); 

				 endif; ?>			

				</a>	

			</div>	

			
			<div class="news-text">

					<h2 class="epsilon date no-margin-below"><?php the_time('j F Y'); ?></h3>

					<h1 class="gamma bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>		
					
					<ul class="entry-meta-news light uppercase meta-news nav">		

				<?php echo get_the_term_list( get_the_ID(), 'news-themes', '<li class="meta-link">', '</li><li class="meta-link">', '</li>') ?>	

					</ul>	

			</div>							

			</div>

		</article>