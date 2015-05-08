<?php
/**
 * @package barjeel
 * @since barjeel 1.0 for the downloads posts
 */
?>
<nav class="next-previous column-two-three-four">
		<ul class="nav uppercase no-margin-below">
			<li class="previous">
				<?php $prev_post = get_previous_post(true);
							if  (!empty( $prev_post )) {
								previous_post_link('%link', 'Previous post', TRUE);
							}
							else {
								echo '<div class="no-link">Previous post</div>';
							}
					?>
			</li>		
			<li class="next">
				<?php $next_post = get_next_post(true);
					if  (!empty( $next_post )) {
						next_post_link('%link', 'Next post', TRUE); 
					}
					else {
						echo '<div class="no-link">Next post</div>';
					}
				?>
			</li>
		 </ul>
	</nav>

<?php global $post; $pdflink = get_post_meta($post->ID, 'pdflink', true); ?>		

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="news-main">	
	<div class="news-entry white">	
		<h2 class="date zeta exhibition-title e-date"><?php the_time('j F Y'); ?></h2>	
		<h1 class="entry-title-page margin-below-half"><?php the_title(); ?></h1>		
		<div class="download-page">
			<?php echo '<a class="download-link" href="'.$pdflink.'">'; ?>
					<?php	$fpw_img_tag = MultiPostThumbnails::get_the_post_thumbnail('post', 'feature-image-2', NULL, 'cropped-thumb');	?>
					<?php if (!empty($fpw_img_tag)) { echo $fpw_img_tag; } ?>
				<span class="download-text">Download this document as PDF</span>
			</a>
		</div>
	</div>				
	</div><!-- .news-main -->
</article><!-- #post-<?php the_ID(); ?> -->

