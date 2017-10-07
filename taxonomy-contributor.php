<?php get_header(); ?>
  <section id="primary" class="site-content">
    <div id="content" class="container" role="main">

    <?php
    $queried_object = get_queried_object();
    $term_id = $queried_object->term_id;
    $taxonomy = $queried_object->taxonomy;
    $image_key = 'portrait';
    $firstname_key = 'first-name';
    $lastname_key = 'last-name';
    $email_key = 'email';
    $summary_key = 'summary';

    if (function_exists('get_all_wp_terms_meta'))
    {
     $image = wp_get_terms_meta($term_id, $image_key ,true);
     $firstname = wp_get_terms_meta($term_id, $firstname_key ,true);
     $lastname = wp_get_terms_meta($term_id, $lastname_key ,true);
     $email = wp_get_terms_meta($term_id, $email_key ,true);
     $summary = wp_get_terms_meta($term_id, $summary_key ,true);
    }

    // array all meta fields for category/term
    print_r($image);
    print_r($firstname);
    print_r($lastname);
    print_r($email);
    print_r($summary);

    ?>

    <?php $exhibition['tax_query'] = array(

        array(
          'taxonomy' => 'category',
          'terms' => array('exhibitions'),
          'field' => 'slug',
        ),

        array(
          'taxonomy' => $taxonomy,
          'terms' => array($queried_object->slug),
          'field' => 'slug',
        )
      );

      ?>

    <?php $exhibition_query = new WP_Query( $exhibition );
          if($exhibition_query->have_posts()) {
           ?>

    <p>Curating by <?php print_r($firstname); ?></p>

    <?php while ( $exhibition_query->have_posts() ) : $exhibition_query->the_post(); ?>

    <?php $title = get_the_title();
          print_r($title);
    ?>

    <?php endwhile;
        }
     ?>

    <?php /* Reset query */ wp_reset_query();
           remove_filter('post_limits', 'your_query_limit');
          ?>

    <?php $news['tax_query'] = array(

        array(
          'taxonomy' => 'category',
          'terms' => array('news'),
          'field' => 'slug',
        ),

        array(
          'taxonomy' => $taxonomy,
          'terms' => array($queried_object->slug),
          'field' => 'slug',
        )
      );

      ?>

    <?php $news_query = new WP_Query( $news );
           if($news_query->have_posts()) {
    ?>

    <p>Writing by <?php print_r($firstname); ?></p>

    <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>

   <p> <?php $title = get_the_title();
          print_r($title);
    ?></p>

    <?php endwhile;
          }
     ?>

    <?php /* Reset query */ wp_reset_query();
           remove_filter('post_limits', 'your_query_limit');
          ?>

    <?php

    // get the other contributors and exclude the current one

    $taxonomies = array(
      $taxonomy
    );

    $args = array(
    'orderby'       => 'name',
    'order'         => 'ASC',
    'hide_empty'    => false,
    'exclude'       => array($term_id)
    );


    $all_contributors = get_terms( $taxonomies , $args);

     foreach ( $all_contributors as $contributor ) {
        $contributor_term_id = $contributor->term_id;
        $contributor_firstname = wp_get_terms_meta($contributor_term_id, $firstname_key ,true);
        $contributor_image = wp_get_terms_meta($contributor_term_id, $image_key ,true);
        print_r($contributor_image);
        print_r($contributor_firstname);

    }

    ?>

    </div><!-- #content -->
  </section><!-- #primary .site-content -->

<?php get_footer(); ?>
