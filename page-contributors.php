<?php
/*
Template Name: Contributors
*/
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="pad-in padding-top-most filter-sort-menu-wide">
  <h1 class="entry-title-page no-margin-below padding-top-most">
    <?php the_title(); ?>
  </h1>

  <div class="category-description">
     <?php the_content(); ?>
  </div><!-- .entry-content -->

</div><!-- .pad-in -->

<?php endwhile; ?>

   <div id="sortArtwork-contributor" class="padding-top-most cb">
    <?php

      $all_contributors = get_pages( array(
            'child_of' => $post->ID
            ));
      $contributors_staff_custom = array();
      $contributors_nonstaff_custom = array();
      $i = 0;

      foreach ( $all_contributors as $contributor ) {
        $contributor_term_id = $contributor->ID;
        $contributor_firstname = get_post_meta($contributor_term_id, 'first-name', true);
        $contributor_lastname = get_post_meta($contributor_term_id, 'last-name', true);
        $contributor_title = get_post_meta($contributor_term_id, 'title', true);
        $contributor_staff = get_post_meta($contributor_term_id, 'staff', true);
        $contributor_fullname = $contributor->post_title;
        $contributor_image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $contributor_term_id ), 'slider-thumb' );
        $contributor_image = $contributor_image_array[0];
        $contributor_link = get_permalink( $contributor_term_id );

        if ($contributor_staff) {
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

<?php get_footer(); ?>
