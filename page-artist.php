<?php
/*
Template Name: Artist list

http://wpquestions.com/question/show/id/3864

*/
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="pad-in white padding-bottom padding-top-most">

	<h1 class="entry-title-page no-margin-below padding-top-most"><?php the_title(); ?></h1>

	<div class="entry-content">

<?php

$args = array('hide_empty' => 1, 'orderby' => 'name');

$terms = get_terms('artist', $args);

if($terms) :

	$output .= '<ul id="list" class="country-list">';

    foreach($terms as $term) :	

		if($parent = $term->parent) :

			$output .= '<li><a href="'.get_term_link($term->slug, 'artist').'">'.$term->name.'</a></li>';

		endif;   

		$parent = $term->parent; 

    endforeach;

	$output .= '</ul>';

    echo $output;

endif;

?>

</div><!-- .entry-content -->

</div><!-- .pad-in -->

<?php endwhile; ?>

<?php get_footer(); ?>