<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 */
?>
<nav class="next-previous column-two-three-four">
  <ul class="nav uppercase no-margin-below">
    <li class="previous">
      <?php
        $prev_post = get_previous_post(true);
          if (!empty( $prev_post )) {
            previous_post_link('%link', 'Previous post', TRUE);
          }
          else {
            echo '<div class="no-link">Previous post</div>';
          }
        ?>
      </li>
      <li class="next">
        <?php
          $next_post = get_next_post(true);
          if (!empty( $next_post )) {
            next_post_link('%link', 'Next post', TRUE);
          }
          else {
            echo '<div class="no-link">Next post</div>';
          }
        ?>
      </li>
    </ul>
</nav>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="news-main">
    <?php
      $royal_slideshow = get_post_meta($post->ID, 'slideshow', true);
        if ($royal_slideshow)
          { ?>
        <?php echo '<div class="exhibition-slideshow">' ?>
        <?php echo get_new_royalslider($royal_slideshow); ?>
        <?php echo '</div>' ?>
      <?php }

      else { ?>
      <?php
        if ( has_post_thumbnail() ){ ?>
          <div class="featured-image center">
            <?php $thumbID = get_post_thumbnail_id($post->ID); ?>
            <?php the_post_thumbnail('collection-big'); ?>
          </div><!-- .featured-image -->
    <?php }
} ?>

<div class="news-entry white">
  <?php if (!$royal_slideshow)
    {
      if ( has_post_thumbnail() ) {?>
        <div class="light-italic gray zeta center padding-top-quarter">
          <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
        </div>
      <?php }
    }	?>
      <h2 class="date zeta exhibition-title e-date"><?php the_time('j F Y'); ?></h2>
      <h1 class="entry-title-page margin-below"><?php the_title(); ?></h1>

        <?php
        $terms = wp_get_post_terms($post->ID,'contributor-writer');
        $count = count($terms);
         if ( $count > 0 ){
           echo '<ul class="entry-meta meta-exhibition padding-bottom">Written by';
             foreach ( $terms as $term ) {
               echo '<li><a href="'.get_term_link($term->slug, 'contributor-writer').'">'. $term->name . "</a></li>";
             }
             echo "</ul>";
           } ?>

      <?php the_content(); ?>
      <?php $terms = get_the_terms( $post->ID, 'news-themes' ); ?>
      <?php if ($terms) { ?>
          <ul class="light uppercase meta-news nav">
            <?php echo get_the_term_list( get_the_ID(), 'news-themes', '<li class="meta-link">', '</li><li class="meta-link">', '</li>') ?>
          </ul>
        <?php } ?>
    </div><!-- .news-text -->
  </div><!-- .news-main -->
</article><!-- #post-<?php the_ID(); ?> -->
<div class="related-news">
  <?php related_posts();?>
</div>
