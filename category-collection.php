<?php get_header(); ?>
		
		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">

				<?php if ( have_posts() ) : ?>

			<?php
			
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

				$category = get_the_category();

				$total_posts = (int) $wp_query->found_posts;

				$current_page = ( get_query_var('paged') && get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

				$total_pages = (int) $wp_query->max_num_pages;

				if ( is_tax() ) {

					if ($total_pages > 1) {

						echo  '<h2 class="epsilon light gray"><span class="red">' .$term->name. '</span> - we have ' .$term->count. ' artworks in our collection and this is page ' .$current_page. ' of ' .$total_pages. '</h2>' ;

						}

					else {

						echo  '<h2 class="epsilon light gray"><span class="red">' .$term->name. '</span> - we have ' .$term->count. ' artworks in our collection</h2>';
					}	
				}	

				else {

					echo '<h2 class="epsilon light gray">We have ' .$total_posts. ' artworks in our collection and this is page ' .$current_page. ' of ' .$total_pages. '</h2>' ;

				}
			
			?>		
					
				</header>
	
				<?php rewind_posts(); ?>
			
				<div id="sort">
					<?php /* Start the Loop */ ?>
					
						<?php while ( have_posts() ) : the_post(); ?>
		
							<?php get_template_part('catalogue'); ?>
					
						<?php endwhile; ?>
				
				</div><!-- sort -->	

			<aside>

				<div class="browse center">

					<h1 class="browse-title">Browse our collection</h1>

					<h2 class="list-title"><?php echo mf_get_menu_name('artist'); ?></h2>

					<?php wp_nav_menu( array( 'theme_location' => 'artist', 'container' => '', 'menu_class'      => 'nav  nav--stacked light small') ); ?>

					<h2 class="list-title"><?php echo mf_get_menu_name('country'); ?></h2>

					<?php wp_nav_menu( array( 'theme_location' => 'country', 'container' => '', 'menu_class'      => 'nav  nav--stacked light small') ); ?> 

					<h2 class="list-title"><?php echo mf_get_menu_name('filter'); ?></h2>

					<?php wp_nav_menu( array( 'theme_location' => 'filter', 'container' => '', 'menu_class'      => 'nav  nav--stacked light small') ); ?>
				
				</div> <!-- browse -->	

			</aside>

					<div style="clear:both;"></div>
				
				<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>
					
					<?php } ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>