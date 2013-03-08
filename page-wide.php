<?php
/*
Template Name: Full width page

*/
?>

<?php get_header(); ?>

<div class="page-content">	

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="pad-in padding-top-most">

		<h1 class="entry-title-page no-margin-below"><?php the_title(); ?></h1>
	
	<div class="entry-content">
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->


	</div><!-- .pad-in -->

</article><!-- #post-<?php the_ID(); ?> -->

</div><!-- .page-content -->

<?php get_footer(); ?>