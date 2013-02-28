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
						//list terms in a given taxonomy
						$taxonomy = 'news-themes';
						$tax_terms = get_terms($taxonomy);
				?>

				<span class="list-title uppercase small top-menu">Categories</span>
						<ul class="nav light uppercase small top-menu">
							<?php
							foreach ($tax_terms as $tax_term) {
							echo '<li class="meta-link">' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a></li>';
							}
							?>							
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