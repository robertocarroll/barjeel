<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package barjeel
 * @since barjeel 1.0
 */
?>

		</div><!-- #main .site-main -->

	</div><!-- #page .hfeed .site -->


<footer role="contentinfo">

	<div class="footerwrapper">

	<div class="footer">	
			
		<div class="logo footer-logo">	
			<a href="<?php echo get_settings('home'); ?>" accesskey="1" title="Home"><img src="<?php bloginfo('template_directory'); ?>/images/logofooter.png" alt="<?php bloginfo('name'); ?>" /></a>
		
		<div class="address-footer">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer-5') ) : ?>
				<!-- Sidebar 1 content -->	

		<?php endif; ?>

		</div><!-- .address-footer -->	


		</div><!-- .logo -->


	<div class="twitter-one">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer-1') ) : ?>
				<!-- Sidebar 1 content -->	

		<?php endif; ?>

		</div><!-- .twitter-one -->


		<div class="twitter-two">

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer-2') ) : ?>
				<!-- Sidebar 2 content -->	

		<?php endif; ?>

		</div><!-- .twitter-two -->

		<div class="twitter-three">

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer-3') ) : ?>
				<!-- Sidebar 3 content -->	

		<?php endif; ?>

		</div><!-- .twitter-three -->

		<div class="twitter-four">

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer-4') ) : ?>
				<!-- Sidebar 3 content -->	

		<?php endif; ?>

		</div><!-- .twitter-four -->

		<div style="clear:both;"></div>


		<p class="copyright"><?php echo barjeel_copyright(); ?> <?php bloginfo('name'); ?></p>

	</div><!-- .footer -->

</div><!-- .footerwrapper -->

</footer>



<?php wp_footer(); ?>

</body>
</html>