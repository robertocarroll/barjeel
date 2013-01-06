<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package barjeel
 * @since barjeel 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<!-- Meta Data & SEO -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />

  <!--  Mobile Viewport Fix
        j.mp/mobileviewport & davidbcalhoun.com/2010/viewport-metatag 
  device-width : Occupy full width of the screen in its current orientation
  initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
  maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width
  -->
<meta content="width=device-width, initial-scale=1.0" name="viewport">


<title><?php wp_title(''); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Favicons and Apple Touch icons
	================================================== -->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon-114x114.png">

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/javascripts/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

</head>

<!-- Header starts here -->

<body <?php body_class(); ?> >

<div id="page" class="hfeed site">
	
	<?php do_action( 'before' ); ?>
	
	<header role="banner">
		
		<!-- First comes the logo -->

		<div class="logo">	
			<a href="<?php echo get_settings('home'); ?>" accesskey="1" title="Home"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
		</div><!-- .logo -->

		<!-- Then the navigation -->		
			
		<nav role="navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', 'barjeel' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'barjeel' ); ?>"><?php _e( 'Skip to content', 'barjeel' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class'      => 'nav  nav--stacked') ); ?>
		</nav>
	</header>

<!-- End Header -->
 
<!-- Body starts here -->

	<div id="main" class="site-main">