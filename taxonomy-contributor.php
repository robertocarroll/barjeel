<?php get_header(); ?>
  <section id="primary" class="site-content">
    <div id="content" class="container" role="main">

    <?php
    $queried_object = get_queried_object();
    $term_id = $queried_object->term_id;
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

    </div><!-- #content -->
  </section><!-- #primary .site-content -->

<?php get_footer(); ?>
