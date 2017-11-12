<?php
/*
Template Name: Contributor single
*/
?>

<?php get_header();
   $firstname = get_post_meta($post->ID, 'first-name', true);
   $lastname = get_post_meta($post->ID, 'last-name', true);
   $email = get_post_meta($post->ID, 'email', true);
   $title = get_post_meta($post->ID, 'title', true);

?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="contributor-outer">

  <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-thumb' ); ?>
  <div class="contributor-details">
    <img width="100%" class="round" height="auto" src="<?php echo $image[0]; ?>">
  </div><!-- .contributor-details -->
  <?php endif; ?>
  <div class="category-description padding-top-most padding-bottom-half ta-left cb">
    <h1 class="alpha bold uppercase gray margin-below-half center big-line"><span class="inline-block"><?php echo $firstname ; ?></span> <span class="inline-block"><?php echo $lastname ; ?></span></h1>
    <h2 class="beta bold uppercase blue margin-below margin-top-half center big-line"><?php echo $title; ?></h2>

    <?php if ($email) { ?>
      <p class="center"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
    <?php } ?>
    <?php the_content(); ?>
  </div>

</div> <!-- .contributor-outer -->

<?php endwhile; ?>

<?php /* Reset query */ wp_reset_query();
           remove_filter('post_limits', 'your_query_limit');
          ?>


   <h2 class="related-title padding-top-most cb">Staff and contributors</h2>
   <div id="sortArtwork-contributor">
    <?php
      $parent_page_id = ( '0' != $post->post_parent ? $post->post_parent : $post->ID );
      $all_contributors = get_pages( array( 'child_of' => $parent_page_id));
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
