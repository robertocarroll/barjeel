<?php
/*
Template Name: Country list

http://wpquestions.com/question/show/id/3864

http://wordpress.stackexchange.com/questions/24794/get-the-the-top-level-parent-of-a-custom-taxonomy-term

*/
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


<div class="pad-in white padding-bottom padding-top-most">

	<h1 class="entry-title-page no-margin-below padding-top-most"><?php the_title(); ?></h1>

	<div class="entry-content">

<?php 
//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

$taxonomy     = 'artist';
$orderby      = 'name'; 
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'hide_empty' => 1,
  'title_li'     => $title
);
?>

<ul class="country-list">
	<?php wp_list_categories( $args ); ?>
</ul>

</div><!-- .entry-content -->

</div><!-- .pad-in -->

<?php endwhile; ?>

<?php get_footer(); ?>