<?php get_header(); ?>

		<section id="primary" class="site-content">
			<div id="content" class="container" role="main">

      <?php $exhibition_meta = array (); ?>
      <?php if ( have_posts() ) : ?>
        <?php $total_posts = $wp_query->found_posts; ?>

        <?php /* Check if more than one image */ ?>

        <?php if ( $total_posts == 1 ) { ?>

        <div class="featured-image center">

                  <?php
                  if ( has_post_thumbnail() ){ ?>

                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >

                  <?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'carousel-gallery' ); ?>

                   <img src="<?php echo $thumbnail['0']; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" width="<?php echo $thumbnail[1]; ?>" height="<?php echo $thumbnail[2]; ?>" />

                    </a>

                    <?php } ?>

                  <div class="light-italic white zeta">

                    <?php echo the_title_attribute(); ?> by

                  <?php $artist_name = rw_get_the_term_list(null, 'artist', false, '', ', ', '');

                      $artist_name = strip_tags( $artist_name );

                      echo $artist_name;  ?>

                </div>

              </div><!-- .featured-image -->

                <?php } ?>

                <?php $exhibitions = get_post_meta($post->ID, 'exhibitions', false);

                $exhibition_meta [] = $exhibitions;

                ?>

				<div class="meta white">
					<div class= "artist-text">
						<div class= "center margin-below-half">
              <h1 class="epsilon bold artist-title gray"><?php printf( __( '%s', 'barjeel' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
				<?php

					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

					if($term->parent > 0)  { ?>

				<ul class="entry-meta-artist">
					<?php $country = rw_get_the_term_list(null, 'artist', true, '', ', ', '');  ?>

												<?php if ( $country ) { ?>

													<?php echo '<li class="meta-link">Country: '.$country.'</li> '; ?>

												<?php } ?>

							<?php	if(!empty($exhibition_meta)) { ?>

											Exhibition:

												<?php

												list($value) = $exhibition_meta;

							  							print '<li class="meta-link">'.$value.'</li>';

													?>
										<?php } ?>

							<?php $bornin = get_the_term_list( get_the_ID(), 'bornin') ?>

										<?php if ( $bornin ) { ?>

													<?php echo '<li class="meta-link">Born in: '.$bornin.'</li> '; ?>

												<?php } ?>

					</ul>
				<?php
					}
				 ?>

				</div>

				<div class= "artist-detail">
					<?php echo category_description(); ?>

        <?php if ( $total_posts > 1 ) { ?>

       <?php /* Reset query */ wp_reset_query();

  /* Setting a crazy limit here */
  add_filter('post_limits', 'your_query_limit');
  function your_query_limit($limit){
      return "LIMIT 500";
}
?>

<!-- Artwork - looks for posts with a category collection and a taxonomy exhibition -->

    <?php global $post;
      $taxonomy_name = get_queried_object()->slug;

      $artwork['tax_query'] = array(
        array(
          'taxonomy' => 'category',
          'terms' => array('collection'),
          'field' => 'slug',
        ),
        array(
          'taxonomy' => 'artist',
          'terms' => array($taxonomy_name),
          'field' => 'slug',
        )
      );

      ?>

      <div class="related-artwork">

        <?php $artwork_query = new WP_Query( $artwork );  ?>

        <h2 class="related-title">Artwork by <?php echo get_queried_object()->name; ?> </h2>

        <div id="sort">

        <?php while ( $artwork_query->have_posts() ) : $artwork_query->the_post(); ?>

          <?php get_template_part('catalogue'); ?>

        <?php endwhile; ?>

        </div>

        <?php /* Reset query */ wp_reset_query();

        remove_filter('post_limits', 'your_query_limit');

        ?>
      </div>
      <?php } ?>
      <?php endif; ?>

      </div><!-- .artist-detail -->
          </div><!-- .artist-text -->
        </div><!-- .meta -->

				<?php

					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

					if($term->parent > 0)
							{

							$termID = $term->parent;
							$taxonomyName = $term->taxonomy;
							$termchildren = get_term_children( $termID, $taxonomyName );
							$exclude = array($term->term_id);

 							if (empty($termchildren) or ($termchildren==$exclude)) {

 								}

 								else {

								echo '<h2 class="related-title">Related artists by country</h2><div class="artist-list"><ul class = "nav  nav--stacked">';

								foreach ($termchildren as $child) {

									if (!in_array($child, $exclude)) {

									$term = get_term_by( 'id', $child, $taxonomyName );
									echo '<li><a href="' . get_term_link( intval($term->term_id), $taxonomyName ) . '">' . $term->name . '</a></li>';

									}
								}
								echo '</ul></div><!-- .artist-list -->	';
								}
							}
							else
							{

							$show_count   = 0;      // 1 for yes, 0 for no
							$pad_counts   = 1;      // 1 for yes, 0 for no
							$orderby      = 'name';

							 $args = array(
								'child_of' => $term->term_id,
								'taxonomy' => $term->taxonomy,
								'pad_counts'   => $pad_counts,
								'orderby'      => $orderby,
								'title_li' => '',
								'show_count' => $show_count
								);
							 ?>
						<h2 class="related-title">Artists in this country</h2><div class="artist-list">
							<ul class = "nav  nav--stacked">

									<?php 	 wp_list_categories( $args);

										}
									?>
							</ul>

						</div><!-- .artist-list -->

							<?php rewind_posts(); ?>


			</div><!-- #content -->
		</section><!-- #primary .site-content -->

<?php get_footer(); ?>
