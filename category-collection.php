<?php get_header(); ?>
		
		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="gamma">
						<?php printf( __( '%s', 'barjeel' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
					</h1>
					
					<select class="sort-by">
					  <option value="original-order">Date</a></option>
					  <option value="random">Random</a></option>
					  <option value="title">Title</a></option>
					  <option value="artist">Artist</a></option>
					</select>  
					
				</header>
	
				<?php rewind_posts(); ?>
			
				<div id="sort">
					<?php /* Start the Loop */ ?>
					
						<?php while ( have_posts() ) : the_post(); ?>
		
							<?php get_template_part('catalogue'); ?>
					
						<?php endwhile; ?>
				
				</div><!-- sort -->	
				
				<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>
					<div class="navigation clearfix">
						<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
						<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
					</div>
					<?php } ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>