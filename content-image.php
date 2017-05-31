<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 */
?>

<nav class="next-previous">
  <ul class="nav uppercase no-margin-below">
    <li class="previous">
      <?php $prev_post = get_previous_post(true);
        if  (!empty( $prev_post )) {
          previous_post_link('%link', 'Previous artwork', TRUE);
        }
        else {
          echo '<div class="no-link">Previous artwork</div>';
        }
      ?>
    </li>
    <li class="random"><a href="/random">Random</a></li>
    <li class="next">
      <?php $next_post = get_next_post(true);
        if  (!empty( $next_post )) {
          next_post_link('%link', 'Next artwork', TRUE);
        }
        else {
          echo '<div class="no-link">Next artwork</div>';
        }
      ?>

    </li>
  </ul>
</nav>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content-article">
    <?php $has_video = false;  ?>
		<?php
			// Get the video URL and put it in the $video variable
			$video = get_post_meta($post->ID, 'video', true);
			// Check if there is in fact a video URL
			if ($video) {
				$has_video = true;

				echo '<div class="videoWrapperimage">';
				// Echo the embed code via oEmbed

				echo '<iframe width="100%" height="auto" src="http://player.vimeo.com/video/' . $video . '?title=0&byline=0&portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';

				echo '</div>';
			}
		?>

			<?php if (!$has_video) { ?>

			<?php if (has_post_thumbnail( $post->ID ) ): ?>

			<!-- Gets the featured image -->

			<div class="featured-image center">

				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'collection-big' ); ?>

				<!-- This is for the zoom - gets an even bigger image and adds it to the data attribute data-okimage -->
				<?php $imagezoom = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'collection-zoom' ); ?>

				<img src="<?php echo $image[0]; ?>" class="imagezoom" data-okimage="<?php echo $imagezoom[0]; ?>">

				</div><!-- .featured-image -->

			<?php endif; ?>

			<?php } ?>


		<div class="meta white center">

			<!-- Gets the caption for the featured image -->

			<?php if (has_post_thumbnail( $post->ID ) ): ?>

			<div class="light-italic gray micro">

				<?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>

			</div>

			<?php endif; ?>

		<div class="title-area">

		<h1 class="entry-title uppercase bold-italic">

			<?php the_title(); ?>

		</h1>

  <ul class="entry-meta">
    <?php $medium = get_the_term_list( get_the_ID(), 'medium') ?>
      <?php if ( $medium ) { ?>
        <?php echo '<li class="meta-link">Medium: '.$medium.'</li> '; ?>
      <?php } ?>

<!-- Exhibitions- from custom field called exhibitions -->
    <?php $exhibitions = get_post_meta($post->ID, 'exhibitions', false); ?>
      <?php if ( $exhibitions ) { ?>
        <li class="meta-link meta-exhibition">Exhibition:</li>
          <?php echo implode(', ', $exhibitions); ?>
    <?php } ?>
  </ul>
</div>

  <div class="artist-area">
    <h2 class="entry-title">
      <?php echo rw_get_the_term_list(null, 'artist', false, '', ', ', ''); ?>
    </h2>

  <ul class="entry-meta">
    <?php $country = rw_get_the_term_list(null, 'artist', true, '', ', ', '');  ?>
      <?php if ( $country ) { ?>
      <?php echo '<li class="meta-link">Origin: '.$country.'</li> '; ?>
      <?php } ?>

      </ul>
  </div>
</div><!-- .meta -->
      <?php related_posts(); ?>
    <?php setPostViews(get_the_ID()); ?>
  </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->






