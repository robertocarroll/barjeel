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
			
		<div class="footer-logo">	
			<a href="<?php echo get_settings('home'); ?>" accesskey="1" title="Home"><img src="<?php bloginfo('template_directory'); ?>/images/logofooter.png" alt="<?php bloginfo('name'); ?>" /></a>
		
		<div class="address-footer">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer-5') ) : ?>
				<!-- Sidebar 1 content -->	

		<?php endif; ?>

		</div><!-- .address-footer -->	


		</div><!-- .logo -->

	<div class="twitter-wrapper">	

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

	</div><!-- .twitter-wrapper -->

		<p class="copyright"><?php echo barjeel_copyright(); ?> <?php bloginfo('name'); ?></p>

	</div><!-- .footer -->

</div><!-- .footerwrapper -->

</footer>

<!-- Optimized Google Analytics -->
	<script>var _gaq=[['_setAccount','UA-39152844-1'],['_trackPageview']];(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src='//www.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'))</script>
	

<?php wp_footer(); ?>

</body>
</html>