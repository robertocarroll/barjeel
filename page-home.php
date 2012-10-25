<?php
/*
Template Name: Home Page

*/
?>

<?php get_header(); ?>
		
			
		
	<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php
 $mostviewed = array(
   'meta_key' => 'post_views_count',
   'orderby' => 'meta_value_num',
   'order' => 'DESC',
   'posts_per_page'    => 6,
    'category_name' => 'collection',
 );
 $mostviewed_query = new WP_Query($mostviewed); ?>

<?php if( $mostviewed_query->have_posts() ) : ?>
    <h2>Most Popular</h2>

    <div id="slider-code">


     		
     <div class="viewport">
        <ul class="overview">
    
        <?php while ( $mostviewed_query->have_posts() ) : $mostviewed_query->the_post(); ?>
          
								<li>
								<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php echo rw_get_the_term_list(null, 'artist', false, '', ', ', ''); ?>

								<?php echo getPostViews(get_the_ID()); ?>						
									<?php
									if ( has_post_thumbnail() ){ ?>
										<a href="<?php the_permalink(); ?>">
											<?php $thumbID = get_post_thumbnail_id($post->ID); ?>
											<?php the_post_thumbnail('collection-thumb'); ?>
										</a>	
									<?php } ?>	
							
								
								
								

							</li>

				   
        
            <?php endwhile; ?>

            </ul>
    </div>

    <div class="slidernav">

    		<a class="buttons prev" href="#">left</a>
     		<a class="buttons next" href="#">right</a>
     	</div>
  
</div>
				
		<?php endif; ?>	
    
    <?php wp_reset_postdata(); ?>




	

<?php get_footer(); ?>