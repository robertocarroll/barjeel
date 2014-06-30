<?php get_header(); ?>
		
		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">
				
				<div class="collection-non-arab-art">

				<?php
		
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

				$category = get_the_category();

				$the_tax = get_query_var( 'taxonomy' );

				$total_posts = (int) $wp_query->found_posts;

				$current_page = ( get_query_var('paged') && get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

				$total_pages = (int) $wp_query->max_num_pages;

				if ( is_tax() ) {

					if ($term->count == 1) {
						echo  '<div class="collection-meta"><h2 class="zeta light gray inline"><span class="red bold uppercase">' .$term->name. '</span> - we have <span class="bold uppercase blue"> ' .$term->count. '</span> artwork by this artist.</h2></div>';			
					}

					else {
						echo  '<div class="collection-meta"><h2 class="zeta light gray inline"><span class="red bold uppercase">' .$term->name. '</span> - we have <span class="bold uppercase blue"> ' .$term->count. '</span> artworks by this artist.</h2></div>';			
					}
					
					}

					else {
						echo '<div class="collection-meta-non-arab"><h2 class="zeta light gray inline">The non-Arab art collection is a small portion of the personal collection of Sultan Sooud Al Qassemi. We have <span class="bold uppercase blue">' .$total_posts. '</span> artworks in this collection.</h2></div>' ;
					}

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

				<?php if ( is_category() ) {	 ?>
							
				<div class="sort-collection-non-arab">

				<span class="list-title uppercase small top-menu">Sort by</span>

				<select class="sort-by">

		            <option value="date-desc" <?php echo (!isset($order) || $order == '' || $order == 'date-desc')? 'selected="selected"':''; ?>>&nbsp;Date Added&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		            <option value="title-asc" <?php echo ($order == 'title-asc')? 'selected="selected"':''; ?>>&nbsp;Title (A to Z)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		            <option value="artist-asc" <?php echo ($order == 'artist-asc')? 'selected="selected"':''; ?>>&nbsp;Artist (A to Z)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		              
		        </select>

		       </div><!-- sort-collection -->	

		     <?php }	 ?> 

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
				
				<div class="artwork-list">

					<?php /* Start the Loop */ ?>
					
						<?php while($query->have_posts()) : $query->the_post() ?>
	
							<article <?php post_class(); ?>>
									
													<div class="thumbnail-image-non-arab center">

														 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'collection-big' ); ?>	

														 <?php if ($image) { ?> <img src="<?php echo $image[0]; ?>" ><?php }	?> 

													</div><!-- close featured image --> 

								<div class="meta white center padding-bottom-half">	
							
											<h1 class="artwork-title uppercase bold-italic">

												<?php $title = get_the_title(); 
												echo mb_strimwidth($title, 0, 40, '...'); 
												?>

											</h1>	

											<h2 class="artist-name">	
												
												<?php $artist_name_no_tags = rw_get_the_term_list(null, 'non-arab-artist', false, '', ', ', ''); ?>

												<?php echo wp_strip_all_tags( $artist_name_no_tags, $remove_breaks );?>

											</h2>
						
											<ul class="artwork-meta">	
					
												<?php $country = rw_get_the_term_list(null, 'non-arab-artist', true, '', ', ', '');  ?>

												<?php $country_no_tags = wp_strip_all_tags( $country, $remove_breaks );?>
											
															<?php if ( $country ) { ?>

																<?php echo '<li class="meta-link">'.$country_no_tags.'</li> '; ?>
															
															<?php } ?>			
							
											</ul>

								</div><!-- meta --> 
		
							</article>

						<?php endwhile; ?>

							</div><!--artwork-list -->

						

								<div class="pagination-wrapper">

										<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>

										<?php } ?> 

										<?php else : ?>

									<?php get_template_part( 'no-results', 'archive' ); ?>

								<?php endif; ?>

								</div>

				</div><!--collection-non-arab-art -->

						<aside>

				<div class="browse center">

					<h1 class="browse-title">Browse by artist</h1>

					<?php

							$args = array('hide_empty' => 1, 'orderby' => 'name');

							$terms = get_terms('non-arab-artist', $args);

							if($terms) :

								$output .= '<ul class="country-list small">';

							    foreach($terms as $term) :	

									if($parent = $term->parent) :

										$output .= '<li><a href="'.get_term_link($term->slug, 'non-arab-artist').'">'.$term->name.'</a></li>';

									endif;   

									$parent = $term->parent; 

							    endforeach;

								$output .= '</ul>';

							    echo $output;

							endif;

							?>
				
				</div> <!-- browse -->	

			</aside>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>