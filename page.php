<?php
/*
	Template Name: Custom page
*/
?>

<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php while ( have_posts() ) : the_post(); ?>

	<div class="exhibition-main">
		
		<?php
			if ( has_post_thumbnail() ){ ?>
			<div class="featured-image center">
				<?php $thumbID = get_post_thumbnail_id($post->ID); ?>
				<?php the_post_thumbnail('collection-big'); ?>
			</div><!-- .featured-image -->				
		<?php } ?>

		<div class="exhibition-text white padding-top-quarter">	
		<?php 
			if ( has_post_thumbnail() ) {?>
				<div class="light-italic gray zeta center padding-bottom">
					<?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
				</div>	
		<?php } 	?>	

			<h1 class="entry-title-page no-margin-below"><?php the_title(); ?></h1>
				<div class="education-main-text">
					<?php the_content(); ?>
				</div><!-- .education-main-text -->
		</div><!-- .exhibition-text white -->	
	</div><!-- .exhibition-main -->

	<?php endwhile; // end of the loop. ?>

</article><!-- #post-<?php the_ID(); ?> -->

<div class="related-posts">
		<?php global $post; 
			$asideone = get_post_meta($post->ID, 'aside-one', true);
				//Checking if anything exists for the first aside
				if ($asideone) { ?>
				<?php echo '<aside class="aside-one aside-right">'.$asideone.'</aside>'; ?>
			<?php } ?>

		<?php $asidetwo = get_post_meta($post->ID, 'aside-two', true);
			//Checking if anything exists for the first aside
			if ($asidetwo) { ?>
			<?php echo '<aside class="aside-two aside-right">'.$asidetwo.'</aside>'; ?>
		<?php } ?>	

		<?php $asidethree = get_post_meta($post->ID, 'aside-three', true);
			//Checking if anything exists for the first aside
			if ($asidethree) { ?>
			<?php echo '<aside class="aside-three aside-right">'.$asidethree.'</aside>'; ?>
		<?php } ?>			
</div><!-- .related-posts -->

	<?php 
			global $post; 
			$relatedcategory = get_post_meta($post->ID, 'relatedcategory', true); 
			$newstheme = get_post_meta($post->ID, 'news-theme', true); 

			if ($relatedcategory) {
				$args = array(
			'posts_per_page' => 8,
					'category_name' => $relatedcategory,
					'ignore_sticky_posts' => 1,
		);
				query_posts( $args ); 
			}
			
			else {
				$args = array(
			'posts_per_page' => 8,
			'category_name' => 'news',
			 'news-themes' => $newstheme,
			'ignore_sticky_posts' => 1,
		);
		query_posts( $args );
			}	 
		?> 

<?php if ($newstheme  || $relatedcategory) { ?>

	<div class="article-row">
		<?php
			$barjeel_style_classes = array('article-one column-one','article-two column-two','article-three column-three', 'article-four column-four');
			$barjeel_styles_count = count($barjeel_style_classes);
			$barjeel_style_index = 0;
		?>		
		
		<?php while (have_posts()) : the_post(); ?>
				
		<div class="<?php echo $barjeel_style_classes[$barjeel_style_index++ % $barjeel_styles_count]; ?>">		
			<article>	
				<div class="square">&nbsp;</div>
				<?php	$fpw_img_tag = MultiPostThumbnails::get_the_post_thumbnail('post', 'feature-image-2', NULL,  'cropped-thumb');	?>
				<?php if (!empty($fpw_img_tag)) {
					echo '<a href="'.get_permalink().'"><div class="vignette-square">'.$fpw_img_tag.'</div></a>';
				}?>		

				<?php if ($relatedcategory) { ?>
					<?php echo '<h1 class="delta bold article-list">'; ?>
				<?php } ?>	

				<?php if ($newstheme) {?>
					<?php echo '<h1 class="gamma bold article-list">'; ?>
				<?php } ?>	

				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<?php $dates = get_post_meta($post->ID, 'Dates', true);
					//Checking if anything exists for the dates
					if ($dates) { ?>
					<?php echo '<h2 class="date epsilon e-date">'.$dates.'</h2>'; ?>
				<?php } ?>
			</article>
		</div>
		<?php endwhile; ?>

		<?php wp_reset_query(); ?>  		

	</div>	<!-- .article-row -->

	<?php global $post; $morelink = get_post_meta($post->ID, 'more-post-link', true); ?> 

	<div class="see-more"><?php echo '<a href="'.$morelink.'">'; ?>See all <?php the_title(); ?> posts</a></div>
<?php } //End if for the related posts ?>		
<?php get_footer(); ?>