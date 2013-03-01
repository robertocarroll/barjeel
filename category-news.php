<?php get_header(); ?>
		
		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">	


   
				<?php if ( have_posts() ) : ?>
					
				<h1 class="gamma bold gray">
						<?php
								printf( __( '%s', 'barjeel' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						?>
				</h1>	

						<?php 

							$taxonomy     = 'news-themes';
							$orderby      = 'name'; 
							$show_count   = 0;      // 1 for yes, 0 for no
							$pad_counts   = 0;      // 1 for yes, 0 for no
							$hierarchical = 0;      // 1 for yes, 0 for no
							$title        = '';

							$args = array(
							  'taxonomy'     => $taxonomy,
							  'orderby'      => $orderby,
							  'show_count'   => $show_count,
							  'pad_counts'   => $pad_counts,
							  'hierarchical' => $hierarchical,
							  'title_li'     => $title
							);
							?>
							<span class="list-title uppercase small top-menu">Categories</span>

							<ul class="nav light uppercase small top-menu">
								<?php wp_list_categories( $args ); ?>
							</ul>

				<div>
		
				<?php rewind_posts(); ?>
			
			
					<?php /* Start the Loop */ ?>
					
						<?php while ( have_posts() ) : the_post(); ?>						

						<?php get_template_part('news');?> 
							
						<?php endwhile; ?>
								
				<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>
					
					<?php } ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>