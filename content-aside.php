<?php
/**
 * @package barjeel
 * @since barjeel 1.0
 * Template for the exhibitions posts
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="exhibition-main">

			<?php
				$royal_slideshow = get_post_meta($post->ID, 'slideshow', true);
				if ($royal_slideshow)
				{

			?>

				<?php echo '<div class="exhibition-slideshow">' ?>

					<?php echo get_new_royalslider($royal_slideshow); ?>

				<?php echo '</div>' ?>

				<?php } ?>

		<div class="exhibition-text white">

					<h1 class="alpha bold exhibition-title gray"><?php the_title(); ?></h1>

								<?php $dates = get_post_meta($post->ID, 'Dates', true); ?>

								<?php $location = get_post_meta($post->ID, 'Location', true); ?>

								<?php $exhibition_meta = array ($dates, $location) ?>

								<?php	if(!empty($exhibition_meta)) { ?>

									<?php echo '<ul class="exhibition-meta-list">' ?>

									<?php

										foreach($exhibition_meta as $value) {
			  							print '<li>'.$value.'</li>'; ;
										}
									?>

									<?php echo '</ul>' ?>
									<?php } ?>


					<div class="exhibition-main-text">

						<?php the_content(); ?>

					</div><!-- .exhibition-main-text -->

			</div><!-- .white -->

		</div><!-- .exhibition-main -->

	</article><!-- #post-<?php the_ID(); ?> -->


	<!-- Related posts - manually chosen posts  -->


			<?php
			    $barjeel_style_classes = array('article-one','article-two','article-three', 'article-four');
			    $barjeel_styles_count = count($barjeel_style_classes);
			    $barjeel_style_index = 0;
			?>

			<?php

				if ( !function_exists( 'p2p_register_connection_type' ) )

				return;

				global $wp_query;

				p2p_type( 'related-articles' )->each_connected( $wp_query );

					global $post;
					if( isset( $post->connected ) && !empty( $post->connected ) ):

		echo '<div class="related-posts">';

						$count = 1;

						foreach( $post->connected as $related ):

							if( $count < 4 ) {	?>

				<article>

					<div class="related-list <?php echo $barjeel_style_classes[$barjeel_style_index++ % $barjeel_styles_count]; ?>">

							<div class="square">&nbsp;</div>

							<?php echo '<a href="' . get_permalink( $related->ID ) . '">'; ?>

									<div class="vignette-square">

										 <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'feature-image-2', $related->ID,  'cropped-thumb');

										 endif; ?>

									</div>

								</a>

							<h1 class="gamma bold article-list"><?php echo '<a href="' . get_permalink( $related->ID ) . '">' . $related->post_title . '</a>'; ?></h1>

							<?php $dates = get_post_meta($related->ID, 'Dates', true);
								//Checking if anything exists for the dates
								if ($dates) { ?>
								<?php echo '<h2 class="date epsilon e-date">'.$dates.'</h2>'; ?>
							<?php } ?>

					</div>

				</article>


						<?php
								$count++;


							}
						endforeach;

		echo '</div>';

					endif;


?>


<?php /* Reset query */ wp_reset_query(); ?>

<!-- Artwork - looks for posts with a category collection and a taxonomy exhibition -->

		<?php global $post;

      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;//The magic, ternary if statement

      $artwork = array(

            'tax_query' => array(
            array(
          'taxonomy' => 'category',
          'terms' => array('collection'),
          'field' => 'slug',
        ),
        array(
          'taxonomy' => 'exhibition',
          'terms' => array($post->post_name),
          'field' => 'slug',
        ),
          ), 'paged' => $paged,
          'posts_per_page' => 9

                   );

      $custom_query = new WP_Query( $artwork );

			?>

      <h2 class="related-title" id="exhibition-artwork" style="clear:both">Artwork from <?php the_title(); ?> </h2>

      <div id="sort">
		   <?php	if ( $custom_query->have_posts() ) :
    while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

        <?php get_template_part('catalogue'); ?>

    <?php endwhile; ?>

     </div>

<?php  $total_pages = $custom_query->max_num_pages;

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo '<div class="pagination-wrapper"><div class="pagination">';
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('PREVIOUS'),
            'next_text'    => __('NEXT'),
            'end_size' => 1,
            'mid_size' => 2,
            'before_page_number' => '<span class="page-number">',
            'after_page_number' => '</span>'
        ));
        echo '</div><!--// end .pagination --></div>';

    }
?>


          <?php endif; ?>
        <?php wp_reset_postdata(); // reset the query ?>
			</div>

