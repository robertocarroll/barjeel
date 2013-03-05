<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package barjeel
 * @since barjeel 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title white pad-in uppercase"><?php _e( 'Sorry! That page can&rsquo;t be found. Why not try searching?', 'barjeel' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
		
					<?php get_search_form(); ?>

					
				</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

	<script>

 jQuery(document).ready(function ($) {
      $.backstretch("http://localhost:8888/wordpress/assets/Ahmad-Askalany_Hens-1500x1056.jpg");
    });
	
    
</script>

<?php get_footer(); ?>