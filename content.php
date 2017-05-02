<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="news-item">
    <!-- Gets the cropped image -->
    <div class="news-image">
      <a href="<?php the_permalink(); ?>">
        <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'feature-image-2', NULL,  'news-cropped-thumb');
          endif; ?>
        </a>
    </div>

  <div class="news-text pad-in">
    <h1 class="search-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
      <span class="epsilon light small gray margin-below permalink"><?php the_permalink(); ?></span>
        <h2 class="epsilon date margin-below-half padding-top"><?php the_time('j F Y'); ?></h3>
        <?php echo rw_get_the_term_list(null, 'artist', false, '', ', ', ''); ?>
        <?php if (function_exists('relevanssi_the_excerpt')) { relevanssi_the_excerpt(); }; ?>
      </div>
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
