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

					echo '<div class="collection-meta"><h2 class="zeta light gray inline">We have <span class="bold uppercase blue">' .$total_posts. '</span> artworks in the <br>personal collection of Sultan Sooud Al Qassemi</h2></div>' ;

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

				<div class="sort-collection">

				<span class="list-title uppercase small top-menu">Sort by</span>

				<select class="sort-by">

		            <option value="date-desc" <?php echo (!isset($order) || $order == '' || $order == 'date-desc')? 'selected="selected"':''; ?>>&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		            <option value="title-asc" <?php echo ($order == 'title-asc')? 'selected="selected"':''; ?>>&nbsp;Title (A to Z)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		            <option value="artist-asc" <?php echo ($order == 'artist-asc')? 'selected="selected"':''; ?>>&nbsp;Artist (A to Z)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		              
		        </select>

		       </div><!-- sort-collection -->	

		    </div><!-- collection-meta -->	

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
		      	'category_name' => 'non-arab-art',
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
									<?php $artist_name_no_tags = rw_get_the_term_list(null, 'artist', false, '', ', ', ''); ?>

									<?php echo wp_strip_all_tags( $artist_name_no_tags, $remove_breaks );?>

								</h2>
						
								<ul class="artwork-meta">	
		
									<?php $country = rw_get_the_term_list(null, 'artist', true, '', ', ', '');  ?>

									<?php $country_no_tags = wp_strip_all_tags( $country, $remove_breaks );?>
								
												<?php if ( $country ) { ?>

													<?php echo '<li class="meta-link">'.$country_no_tags.'</li> '; ?>
												
												<?php } ?>			

									
								</ul>
								
								</div><!-- .center -->		
		
							</article>
									
						</div><!-- .box-ms -->	
					
						<?php endwhile; ?>
				
				</div><!-- sort -->	

			</div>

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