<?php
/*
Template Name: Contributors
*/
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="pad-in white padding-top-most filter-sort-menu-wide">
  <h1 class="entry-title-page no-margin-below padding-top-most">
    <?php the_title(); ?>
  </h1>

  <div class="category-description">
     <?php the_content(); ?>
  </div><!-- .entry-content -->

</div><!-- .pad-in -->

<?php endwhile; ?>

   <div id="sortArtwork" class="cb padding-top-most">
    <?php

    $all_contributors = get_terms( array(
        'taxonomy' => 'contributor',
        'orderby'       => 'name',
        'order'         => 'ASC',
        'hide_empty' => false
    ) );

    $contributors_staff_custom = array();
    $contributors_nonstaff_custom = array();
    $i = 0;

    $image_key = 'portrait';
    $firstname_key = 'first-name';
    $lastname_key = 'last-name';
    $title_key = 'title';
    $email_key = 'email';
    $summary_key = 'summary';
    $staff_key = 'staff';

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

    <?php foreach ( $contributors_staff_custom as $contributor_custom ) {

      ?>

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

<?php get_footer(); ?>
