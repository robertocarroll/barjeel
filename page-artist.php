<?php
/*
Template Name: Artist list

http://wpquestions.com/question/show/id/3864

*/
?>

<?php get_header(); ?>

<?php

$args = array('hide_empty' => 1, 'orderby' => 'name');

$terms = get_terms('artist', $args);

if($terms) :

	$output .= '<ul id="list">';

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

<?php get_footer(); ?>