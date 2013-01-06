<?php
/*
Template Name: Home Page

*/
?>

<?php get_header(); ?>
		
			
		
	<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php 
					 // Custom widget Area Start
					 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage-main') ) : ?>
					<?php endif;
					// Custom widget Area End
					?>		


			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

	

<?php get_footer(); ?>