<?php
/*
Template Name: Random post

http://wp.smashingmagazine.com/2012/04/19/random-redirection-in-wordpress/

*/
?>

<?php

// set arguments for WP_Query()

		$args = array(

		    'category_name' => 'collection', // remember, we are using category slug here
		    'posts_per_page' => 1,
		    'orderby' => 'rand'
		);

// get a random post from the database

		$my_random_post = new WP_Query ( $args );

// process the database request through WP_Query

	while ( $my_random_post->have_posts () ) {

	  $my_random_post->the_post ();

	  // redirect the user to the random post

	  wp_redirect( get_permalink(), 307 );

	  exit;

	}

 ?>
