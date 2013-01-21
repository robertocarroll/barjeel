<?php get_header(); ?>
		
		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					
					<div class="filter filter-one lighter"> 		
							
							<span class="filter-title">Sort by</span>	

							<select class="dropdown sort-by">
							  <option value="original-order">Date</a></option>
							  <option value="random">Random</a></option>
							  <option value="title">Title</a></option>
							  <option value="artist">Artist</a></option>
							</select>

					</div>  <!-- .filter -->

					<div class="filter filter-two lighter"> 	
						
							<span class="filter-title">Filter by</span>	

							<?php
									$items = wp_get_nav_menu_items('filter');

									 echo "<select class='dropdown filter-by'>";

									echo "<option value='/collection'>All work</option>";

									 foreach ($items as $list)
									 	{
									 		
											echo "<option value=".$list->url.">".$list->title."</option>";
									 }

								 echo "</select>";
								 
								 ?>

					</div>  <!-- .filter -->
					
				</header>
	
				<?php rewind_posts(); ?>
			
				<div id="sort">
					<?php /* Start the Loop */ ?>
					
						<?php while ( have_posts() ) : the_post(); ?>
		
							<?php get_template_part('catalogue'); ?>
					
						<?php endwhile; ?>
				
				</div><!-- sort -->	

			<aside>

				<div class="browse">

					<h1 class="browse-title">Browse our collection</h1>

					<h2 class="list-title"><?php echo mf_get_menu_name('artist'); ?></h2>

					<?php wp_nav_menu( array( 'theme_location' => 'artist', 'container' => '', 'menu_class'      => 'nav  nav--stacked light small') ); ?>

					<h2 class="list-title"><?php echo mf_get_menu_name('country'); ?></h2>

					<?php wp_nav_menu( array( 'theme_location' => 'country', 'container' => '', 'menu_class'      => 'nav  nav--stacked light small') ); ?> 

				</div> <!-- browse -->	

			</aside>

					
				
				<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>
					
					<?php } ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>