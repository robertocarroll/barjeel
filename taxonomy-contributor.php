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
    $staff_key = 'staff';

    if (function_exists('get_all_wp_terms_meta'))
    {
     $image = wp_get_terms_meta($term_id, $image_key ,true);
     $firstname = wp_get_terms_meta($term_id, $firstname_key ,true);
     $lastname = wp_get_terms_meta($term_id, $lastname_key ,true);
     $title = wp_get_terms_meta($term_id, $title_key ,true);
     $email = wp_get_terms_meta($term_id, $email_key ,true);
     $summary = wp_get_terms_meta($term_id, $summary_key ,true);
    }

    ?>

    <div class="contributor-outer">
      <div class="contributor-details">
        <img width="100%" class="round" height="auto" src="<?php echo $image; ?>">
      </div><!-- .contributor-details -->
      <div class="category-description padding-top-most padding-bottom-half ta-left cb">
        <h1 class="alpha bold uppercase gray margin-below-half center big-line"><span class="inline-block"><?php echo $firstname ; ?></span> <span class="inline-block"><?php echo $lastname ; ?></span></h1>
        <h2 class="beta bold uppercase blue margin-below margin-top-half center big-line"><?php echo $title; ?></h2>

        <?php if ($email) { ?>
          <p class="center"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
        <?php } ?>
        <?php if ($summary) { ?>
          <?php echo $summary; ?>
        <?php } ?>
      </div>

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
            $has_curated_posts = true;
    ?>
    <div class="contributor-left">
    <h2 class="bold gray gamma mid-line"><span class="red">Curating by</span> <?php echo $firstname; ?></h2>
    <?php while ( $exhibition_query->have_posts() ) : $exhibition_query->the_post(); ?>
      <h2 class="date delta e-date padding-bottom-half">
        <a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); echo $title; ?>
        </a>
      </h2>
    <?php endwhile; ?>
      </div>
     <?php
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

           if ($has_curated_posts === true) {
            echo '<div class="contributor-right">';
           }

           else {
            echo '<div class="contributor-left">';
           }
    ?>
    <h2 class="bold gray gamma mid-line"><span class="red">Writing by</span> <?php echo $firstname; ?></h2>
    <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
     <h2 class="date delta e-date padding-bottom-half">
      <a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); echo $title; ?>
      </a>
    </h2>
    <?php endwhile; ?>
      </div>
     <?php
      }
     ?>
    <?php /* Reset query */ wp_reset_query();
           remove_filter('post_limits', 'your_query_limit');
          ?>
    </div> <!-- .contributor-outer -->

   <h2 class="related-title padding-top-most cb">Staff and contributors</h2>
   <div id="sortArtwork">
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
    $contributors_staff_custom = array();
    $contributors_nonstaff_custom = array();
    $i = 0;

     foreach ( $all_contributors as $contributor ) {
        $contributor_term_id = $contributor->term_id;
        $contributor_link = get_term_link( $contributor->slug, 'contributor' );
        $contributor_firstname = wp_get_terms_meta($contributor_term_id, $firstname_key ,true);
        $contributor_lastname = wp_get_terms_meta($contributor_term_id, $lastname_key ,true);
        $contributor_image = wp_get_terms_meta($contributor_term_id, $image_key ,true);
        $contributor_title = wp_get_terms_meta($contributor_term_id, $title_key ,true);
        $contributor_staff = wp_get_terms_meta($contributor_term_id, $staff_key ,true);
        $contributor_fullname = $contributor_firstname . ' ' . $contributor_lastname;

       if ($contributor_staff == 'checked') {
        $contributors_staff_custom[$i]['link'] = $contributor_link;
        $contributors_staff_custom[$i]['lastname'] = $contributor_lastname;
        $contributors_staff_custom[$i]['fullname'] = $contributor_fullname;
        $contributors_staff_custom[$i]['title'] = $contributor_title;
        $contributors_staff_custom[$i]['image'] = $contributor_image;
       }

       else {
        $contributors_nonstaff_custom[$i]['link'] = $contributor_link;
        $contributors_nonstaff_custom[$i]['lastname'] = $contributor_lastname;
        $contributors_nonstaff_custom[$i]['fullname'] = $contributor_fullname;
        $contributors_nonstaff_custom[$i]['title'] = $contributor_title;
        $contributors_nonstaff_custom[$i]['image'] = $contributor_image;
       }

        $i++;

       }

      function compareByName($a, $b) {
        return strcmp($a["lastname"], $b["lastname"]);
      }

      usort($contributors_staff_custom, 'compareByName');
      usort($contributors_nonstaff_custom, 'compareByName');

    ?>

    <?php foreach ( $contributors_staff_custom as $contributor_custom ) { ?>

    <div class="box-ms-contributor padding-bottom">
     <article <?php post_class(); ?>>
      <div class="center round">
        <a href="<?php echo $contributor_custom['link'] ?>">
        <div class="vignette staff-border">
           <img width="220" height="220" src="<?php echo $contributor_custom['image']; ?>">
         </div> <!-- .vignette -->
        </a>
        <h1 class="light epsilon no-margin-below padding-top-quarter">
          <a href="<?php echo $contributor_custom['link'] ?>">
            <?php echo $contributor_custom['fullname'] ?>
          </a>
        </h1>
        <h2 class="date micro bold no-margin-below">
              <?php echo $contributor_custom['title']; ?>
        </h2>
        </div><!-- .center -->
      </article>
    </div><!-- .box-ms -->

    <?php } ?>

    <?php foreach ( $contributors_nonstaff_custom as $contributor_custom ) { ?>

    <div class="box-ms-contributor padding-bottom">
     <article <?php post_class(); ?>>
      <div class="center round">
        <a href="<?php echo $contributor_custom['link'] ?>">
        <div class="vignette">
           <img width="220" height="220" src="<?php echo $contributor_custom['image']; ?>">
         </div> <!-- .vignette -->
        </a>
        <h1 class="light epsilon no-margin-below padding-top-quarter">
          <a href="<?php echo $contributor_custom['link'] ?>">
            <?php echo $contributor_custom['fullname'] ?>
          </a>
        </h1>
        <h2 class="date micro bold no-margin-below">
              <?php echo $contributor_custom['title']; ?>
        </h2>
        </div><!-- .center -->
      </article>
    </div><!-- .box-ms -->

    <?php } ?>


      </div><!-- sort -->
    </div><!-- #content -->
  </section><!-- #primary .site-content -->

<?php get_footer(); ?>
