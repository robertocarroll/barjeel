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
<?php get_footer(); ?>
