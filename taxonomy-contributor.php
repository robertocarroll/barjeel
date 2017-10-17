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
    $title_key = 'title';
    $email_key = 'email';
    $summary_key = 'summary';

    if (function_exists('get_all_wp_terms_meta'))
    {
     $image = wp_get_terms_meta($term_id, $image_key ,true);
     $firstname = wp_get_terms_meta($term_id, $firstname_key ,true);
     $lastname = wp_get_terms_meta($term_id, $lastname_key ,true);
     $title = wp_get_terms_meta($term_id, $title_key ,true);
     $email = wp_get_terms_meta($term_id, $email_key ,true);
     $summary = wp_get_terms_meta($term_id, $summary_key ,true);
    }
    $full_name = $firstname . ' ' . $lastname;

    ?>

    <img width="100%" class="round" height="auto" src="<?php print_r($image); ?>">
    <h1 class="alpha bold uppercase gray no-margin-below center"><?php print_r($full_name); ?></h1>
    <h2 class="beta bold uppercase blue no-margin-below center"><?php print_r($title); ?></h2>
    <p class="category-description center"><a href="<?php print_r($email); ?>"><?php print_r($email); ?></a></p>
    <p class="category-description"><?php print_r($summary); ?></p>

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

    <h2 class="bold gray gamma"><span class="red">Curating by</span> <?php print_r($firstname); ?></h2>
    <?php while ( $exhibition_query->have_posts() ) : $exhibition_query->the_post(); ?>
      <h2 class="date delta e-date">
        <a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); print_r($title); ?>
        </a>
      </h2>
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
    <h2 class="bold gray gamma"><span class="red">Writing by</span> <?php print_r($firstname); ?></h2>
    <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>

     <h2 class="date delta e-date">
      <a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); print_r($title); ?>
      </a>
    </h2>

    <?php endwhile;
      }
     ?>

    <?php /* Reset query */ wp_reset_query();
           remove_filter('post_limits', 'your_query_limit');
          ?>

   <h2 class="related-title" style="clear:both">Staff and contributors</h2>
   <div id="sort">
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
        $contributor_link = get_term_link( $contributor->slug, 'contributor' );
        $contributor_firstname = wp_get_terms_meta($contributor_term_id, $firstname_key ,true);
        $contributor_lastname = wp_get_terms_meta($contributor_term_id, $lastname_key ,true);
        $contributor_image = wp_get_terms_meta($contributor_term_id, $image_key ,true);
        $contributor_title = wp_get_terms_meta($contributor_term_id, $title_key ,true);
        $contributor_fullname = $contributor_firstname . ' ' . $contributor_lastname;

    ?>

    <div class="box-ms">
     <article <?php post_class(); ?>>
      <div class="center round">
        <a href="<?php echo $contributor_link ?>">
        <div class="vignette">
           <img width="100%" height="auto" src="<?php print_r($contributor_image); ?>">
         </div> <!-- .vignette -->
        </a>
        <h1 class="artwork-title uppercase bold-italic">
          <a href="<?php echo $contributor_link ?>">
            <?php echo $contributor_fullname ?>
          </a>
        </h1>
        <ul class="artwork-meta">
              <?php echo '<li class="meta-link">'.$contributor_title.'</li> '; ?>
        </ul>
        </div><!-- .center -->
      </article>
    </div><!-- .box-ms -->

    <?php
      }
    ?>
      </div><!-- sort -->
    </div><!-- #content -->
  </section><!-- #primary .site-content -->

<?php get_footer(); ?>
