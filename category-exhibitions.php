<?php get_header(); ?>
		

		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">
			
	<h2>Featured Post (sticky) </h2>
			<?php
				$args = array(
					'posts_per_page' => 1,
					'post__in'  => get_option( 'sticky_posts' ),
					'ignore_sticky_posts' => 1,
					'category_name' => 'exhibitions'
				);
				
				query_posts( $args ); ?>
											
				<?php while (have_posts()) : the_post(); ?>
					<article class="sticky">
			
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<ul class="post-info">
								<li><?php the_time('j F Y'); ?></li>
								<li><?php the_category(', '); ?></li>
							</ul>
					
					</article>
								 
							</article>
				<?php endwhile; ?>

				<?php wp_reset_query(); ?>  
			
			
			


<h2>Upcoming Events</h2>

			<?php

			//tommorrow to seventy days later.
				$tomorrow = date('Y-m-d', strtotime('1 days'))." 0:00:00";
				$seven_days = date('Y-m-d', strtotime('70 days'))." 23:59:59";

				global $wpdb;

			$fivesdrafts = $wpdb->get_results("
			SELECT * FROM $wpdb->posts
			WHERE post_status = 'future'
			AND post_date BETWEEN \"$tomorrow\" AND \"$seven_days\" 
			ORDER BY post_date ASC");
			
			?>
			
			<?php
			foreach ($fivesdrafts as $post) { setup_postdata($post);?>

			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

			<?php } ?>



<h2>Past Events</h2>

		<?php 
													
			query_posts(array("post__not_in" =>get_option("sticky_posts"), 'category_name' => 'exhibitions', 'paged' => get_query_var('paged'), 'posts_per_page' => 2)); ?>
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>

					<article <?php post_class(); ?>>
		
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<ul class="post-info">
								<li><?php the_time('j F Y'); ?></li>
								<li><?php the_category(', '); ?></li>
							</ul>
					
					</article>

				<?php endwhile; ?>
				
				<?php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>
					<div class="navigation clearfix">
						<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
						<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
					</div>
					<?php } ?>
				
				
				<?php endif; ?>

		<?php wp_reset_query(); ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->
			
<?php get_footer(); ?>