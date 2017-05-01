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

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php wp_title(''); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Favicons and Apple Touch icons
	================================================== -->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />

	<!-- Standard iPhone -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/images/b-114.png" />
	<!-- Retina iPhone -->
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/images/b-114.png"  />
	<!-- Standard iPad -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/images/b-144.png" />
	<!-- Retina iPad -->
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/images/b-144.png"  />

<!-- Typekit
	================================================== -->
	<script type="text/javascript" src="//use.typekit.net/lzb2ijb.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

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

		<div class="logo-wrapper">

			<a href="<?php echo get_settings('home'); ?>" accesskey="1" title="Home"><div class="logo"></div><!-- .logo -->	</a>

	</div><!-- .logo-wrapper -->

		<!-- Then the navigation -->

		<nav role="navigation">
			<a href="#menu" class="menu-trigger"></a>
			<h1 class="assistive-text"><?php _e( 'Menu', 'barjeel' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'barjeel' ); ?>"><?php _e( 'Skip to content', 'barjeel' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class'      => 'nav  nav--stacked bold') ); ?>

		</nav>

	</header>

<!-- End Header -->

<!-- Body starts here -->

	<div id="main" class="site-main">
