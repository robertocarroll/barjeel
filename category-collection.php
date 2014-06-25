<?php get_header(); ?>
		
		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">

				<?php
		
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

				$category = get_the_category();

				$the_tax = get_query_var( 'taxonomy' );

				$total_posts = (int) $wp_query->found_posts;

				$current_page = ( get_query_var('paged') && get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

				$total_pages = (int) $wp_query->max_num_pages;

				if ( is_tax() ) {

					if ($term->count == 1) 
					{
						echo  '<div class="collection-meta"><h2 class="zeta light gray inline"><span class="red bold uppercase">' .$term->name. '</span> - we have <span class="bold uppercase blue"> ' .$term->count. '</span> artwork in this category</h2></div>';			
					}

					else 
					{
						echo  '<div class="collection-meta"><h2 class="zeta light gray inline"><span class="red bold uppercase">' .$term->name. '</span> - we have <span class="bold uppercase blue"> ' .$term->count. '</span> artworks in this category</h2></div>';
					}

				}	

				else {

					echo '<div class="collection-meta"><div class="collection-details center"><h2 class="zeta light gray inline">We have <span class="bold uppercase blue">' .$total_posts. '</span> artworks<br>in our online collection</h2></div>' ;

				 ?>	

				 <?php	

					if( isset($_GET['o']) && $_GET['o'] != '')
					          {
					              $order = $_GET['o'];
					              switch($order)
					              {
					                case 'date-desc': $orderby = "date";
					                            $msg = 'Date Descending';
					                            $order_set = 'DESC';
					                              break;
					                          
					                case 'title-asc': $orderby = "title";
					                                $msg = 'Title A-Z';
					                                $order_set = 'ASC';
					                                break;

					                case 'artist-asc': $orderby = "meta_value";
					                					$meta_key = "artist";
					                					$order_set = 'ASC';
						                                $msg = 'Artist A-Z';
					                                break;                
					                             
					              }
					          }
					          else
					          {
					              $orderby = "date";
					              $msg = 'Date Descending (default)';
					          }
					?> 	


			<div class="filter-sort-menu">

		        <span class="list-title uppercase small filter-title"><?php echo mf_get_menu_name('filter'); ?></span>

					<?php wp_nav_menu( array( 'theme_location' => 'filter', 'container' => '', 'menu_class'      => 'nav light uppercase small top-menu filter-collection') ); ?>

			 </div><!-- filter-sort-menu -->		

				<div class="sort-collection">

				<span class="list-title uppercase small top-menu">Sort by</span>

				<select class="sort-by">

		            <option value="date-desc" <?php echo (!isset($order) || $order == '' || $order == 'date-desc')? 'selected="selected"':''; ?>>&nbsp;Date Added&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		            <option value="title-asc" <?php echo ($order == 'title-asc')? 'selected="selected"':''; ?>>&nbsp;Title (A to Z)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		            <option value="artist-asc" <?php echo ($order == 'artist-asc')? 'selected="selected"':''; ?>>&nbsp;Artist (A to Z)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		              
		        </select>

		       </div><!-- sort-collection -->	

		    </div><!-- collection-meta -->	

		    <?php	}
			
			?>

		    <div style="clear:left;"></div>

		    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

		      <?php 

		      if ( is_tax() ) {

		      $args = array(

		      	'tax_query' => array(
						array(
							'taxonomy' => $the_tax,
						     'field' => 'slug',
							'terms' => $term->name

						)
					), 'paged' => $paged 

		      				 );

		  }	

		  else {

		  	$args = array(
		      	'category_name' => 'collection',
			 	'orderby' => "$orderby",
			 	'meta_key' => "$meta_key",
			   'order' => "$order_set",
			   'paged' => $paged 
			 );

		  }


		      $query = new WP_Query( $args );

		      ?>	
   
				<?php if($query->have_posts()) : ?>
					
				</header>
			
				<div id="sort">
					<?php /* Start the Loop */ ?>
					
						<?php while($query->have_posts()) : $query->the_post() ?>
		
							<?php get_template_part('catalogue'); ?>
					
						<?php endwhile; ?>
				
				</div><!-- sort -->	

			</div>

			<aside class="browse-wrapper">

				<div class="browse center">

					<h1 class="browse-title">Browse our collection</h1>

					<h2 class="list-title"><?php echo mf_get_menu_name('artist'); ?></h2>

					<?php wp_nav_menu( array( 'theme_location' => 'artist', 'container' => '', 'menu_class'      => 'nav  nav--stacked light small') ); ?>

					<h2 class="list-title"><?php echo mf_get_menu_name('country'); ?></h2>

					<?php wp_nav_menu( array( 'theme_location' => 'country', 'container' => '', 'menu_class'      => 'nav  nav--stacked light small') ); ?> 

					<h2 class="list-title"><?php echo mf_get_menu_name('medium'); ?></h2>

					<?php wp_nav_menu( array( 'theme_location' => 'medium', 'container' => '', 'menu_class'      => 'nav  nav--stacked light small') ); ?> 

					
				
				</div> <!-- browse -->	

			</aside>

			<div class="pagination-wrapper">

					<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>

					<?php } ?> 

					<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>