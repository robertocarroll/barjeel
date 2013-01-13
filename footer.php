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
			
		<div class="logo">	
			<a href="<?php echo get_settings('home'); ?>" accesskey="1" title="Home"><img src="<?php bloginfo('template_directory'); ?>/images/logofooter.png" alt="<?php bloginfo('name'); ?>" /></a>
		</div><!-- .logo -->

	</div><!-- .footer -->

</div><!-- .footerwrapper -->

</footer>



<?php wp_footer(); ?>

</body>
</html>