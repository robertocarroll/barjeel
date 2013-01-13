<?php
/**
 * barjeel functions and definitions
 *
 * @package barjeel
 * @since barjeel 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since barjeel 1.0
 */

if ( ! function_exists( 'barjeel_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since barjeel 1.0
 */
function barjeel_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on barjeel, use a find and replace
	 * to change 'barjeel' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'barjeel', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Enable support for Post Types
	 */
	
	add_theme_support( 'post-formats', array( 'aside', 'image' ) );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'barjeel' ),
		'artist' => __( 'Artist Menu', 'barjeel' ),
		'filter' => __( 'Filter Menu', 'barjeel' ),
		'country' => __( 'Country Menu', 'barjeel' )
	) );


}
endif; // barjeel_setup
add_action( 'after_setup_theme', 'barjeel_setup' );


/**
 * Enqueue scripts and styles
 */
 
 ################################################################################
// Loading All CSS Stylesheets
################################################################################
  function barjeel_css_loader() {
  
    wp_enqueue_style('barjeel', get_template_directory_uri().'/stylesheets/barjeel.css', false ,'0.90', 'all' );
    
    if (ICL_LANGUAGE_CODE == "ar") {
	 wp_enqueue_style('barjeel-ar', get_template_directory_uri().'/stylesheets/barjeel-rtl.css', false ,'0.90', 'all' );
	}

  }
add_action('wp_enqueue_scripts', 'barjeel_css_loader');
 
 
################################################################################
// Loading all JS Script Files.  Remove any files you are not using!
################################################################################ 
 
function barjeel_scripts() {

	wp_enqueue_script( 'okzoom', get_template_directory_uri() . '/javascripts/okzoom.js', array( 'jquery' ), '20120206', true );
	
	wp_enqueue_script( 'barjeel', get_template_directory_uri() . '/javascripts/barjeel.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'backstretch', get_template_directory_uri() . '/javascripts/jquery.backstretch.min.js', array( 'jquery' ), '20120206', true );
	
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/javascripts/jquery.isotope.min.js', array( 'jquery' ), '20120206', true );
		
}
add_action( 'wp_enqueue_scripts', 'barjeel_scripts' );


/*
| -------------------------------------------------------------------
| Registering Widget Sections
| -------------------------------------------------------------------
| */

function barjeel_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'barjeel' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage-main', 'barjeel' ),
		'id' => 'homepage',
		'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

}
add_action( 'widgets_init', 'barjeel_widgets_init' );


/*
| -------------------------------------------------------------------
| Define additional "post thumbnails". Relies on MultiPostThumbnails to work
| -------------------------------------------------------------------
| */

// 
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
        'label' => 'Cropped image',
        'id' => 'feature-image-2',
        'post_type' => 'post'
        )
    );

    };


/*
| -------------------------------------------------------------------
| Adding Post Thumbnails and Image Sizes
| -------------------------------------------------------------------
| */
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 160, 120 ); // 160 pixels wide by 120 pixels high
}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'collection-zoom', 1500, 1500 ); // 1500 pixels wide by 1500 pixels high
	add_image_size( 'collection-big', 680, 500 ); // 680 pixels wide by 680 pixels high
  	add_image_size('cropped-thumb', 170, 170, true);
  	add_image_size('homepage-thumb', 745, 745, true);
}


/*
| -------------------------------------------------------------------
| Get the menu name
| -------------------------------------------------------------------
| */

function mf_get_menu_name($location){
    if(!has_nav_menu($location)) return false;
    $menus = get_nav_menu_locations();
    $menu_title = wp_get_nav_menu_object($menus[$location])->name;
    return $menu_title;
}


/*
| -------------------------------------------------------------------
| Revising Default Excerpt
| -------------------------------------------------------------------
| Adding filter to post excerpts to contain ...Continue Reading link
| */
function barjeel_excerpt($more) {
       global $post;
  return '&nbsp; &nbsp;<a href="'. get_permalink($post->ID) . '">...Continue Reading</a>';
}
add_filter('excerpt_more', 'barjeel_excerpt');

/*
| -------------------------------------------------------------------
| Checking for Post Thumbnail
| -------------------------------------------------------------------
|
| */
function barjeel_post_thumbnail_check() {
    global $post;
    if (get_the_post_thumbnail()) {
          return true; }
          else { return false; }
}

/*
| -------------------------------------------------------------------
| Setting Featured Image (Post Thumbnail)
| -------------------------------------------------------------------
| Will automatically add the first image attached to a post as the Featured Image if post does not have a featured image previously set.
| */
function barjeel_autoset_featured_img() {

  $post_thumbnail = barjeel_post_thumbnail_check();
  if ($post_thumbnail == true ){
    return the_post_thumbnail();
  }
    if ($post_thumbnail == false ){
      $image_args = array(
                'post_type' => 'attachment',
                'numberposts' => 1,
                'post_mime_type' => 'image',
                'post_parent' => $post->ID,
                'order' => 'desc'
          );
      $attached_image = get_children( $image_args );
             if ($attached_image) {
                                foreach ($attached_image as $attachment_id => $attachment) {
                                set_post_thumbnail($post->ID, $attachment_id);
                                }
            return the_post_thumbnail();
          } else { return " ";}
        }
      }  //end function

/*
| -------------------------------------------------------------------
| Dynamic copyright in footer
| -------------------------------------------------------------------
| 
| */

function barjeel_copyright() {
	global $wpdb;
			$copyright_dates = $wpdb->get_results("
					SELECT
					YEAR(min(post_date_gmt)) AS firstdate,
					YEAR(max(post_date_gmt)) AS lastdate
					FROM
					$wpdb->posts
					WHERE
					post_status = 'publish'
			");
			
			$output = '';
			
			if($copyright_dates) {
				$copyright = "&copy; " . $copyright_dates[0]->firstdate;
			
			if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
				$copyright .= '-' . $copyright_dates[0]->lastdate;
			}
			$output = $copyright;
		}
	return $output;
}


/*
| -------------------------------------------------------------------
|Display navigation to next/previous pages when applicable
| -------------------------------------------------------------------
| 
| */

if ( ! function_exists( 'barjeel_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function barjeel_content_nav( $nav_id ) {
	global $wp_query;

	?>

	<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="pager">
		<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '', 'Previous post link', 'barjeel' ) . '</span> %title', 'Next post in category', TRUE ); ?>
		<?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '', 'Next post link', 'barjeel' ) . '</span>', 'Next post in category', TRUE ); ?>
</ul>
	
	<?php endif; ?>

	<?php
}
endif; // barjeel_content_nav


/*
| -------------------------------------------------------------------
|Thumbnail caption
| -------------------------------------------------------------------
| 
| */

function the_post_thumbnail_caption() {
  global $post;

  $thumb_id = get_post_thumbnail_id($post->id);

  $args = array(
	'post_type' => 'attachment',
	'post_status' => null,
	'post_parent' => $post->ID,
	'include'  => $thumb_id
	); 

   $thumbnail_image = get_posts($args);

   if ($thumbnail_image && isset($thumbnail_image[0])) {
     //show thumbnail title
     //echo $thumbnail_image[0]->post_title; 

     //Uncomment to show the thumbnail caption
     echo '<div class="f_caption"><p>'.$thumbnail_image[0]->post_excerpt.'</p></div>';

     //Uncomment to show the thumbnail description
     //echo $thumbnail_image[0]->post_content; 

     //Uncomment to show the thumbnail alt field
     //$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
     //if(count($alt)) echo $alt;
  }
  
  else {echo '<div class="bottom"></div>';}
  
}

/*
| -------------------------------------------------------------------
|Custom taxonomies
| -------------------------------------------------------------------
| 
| */


add_action( 'init', 'create_my_taxonomies', 0 );

function create_my_taxonomies() {
	register_taxonomy( 'medium', 'post', array( 'hierarchical' => false, 'label' => 'Medium', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'theme', 'post', array( 'hierarchical' => false, 'label' => 'Theme', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'artist', 'post', array( 'hierarchical' => true, 'label' => 'Artist', 'query_var' => true, 'rewrite' => array('hierarchical' => true ) ) );
	register_taxonomy( 'movement', 'post', array( 'hierarchical' => false, 'label' => 'Movement', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'exhibition', 'post', array( 'hierarchical' => false, 'label' => 'Exhibition', 'query_var' => true, 'rewrite' => true ) );
}


function rw_get_the_term_list($id = null, $taxonomy, $parent = true, $before = '', $sep = ', ', $after = '') {

	$id = empty($id) ? get_the_ID() : $id;

	$terms = get_the_terms($id, $taxonomy);

	$html = array();

	foreach ($terms as $term) {

		if (($parent && 0 == $term->parent) || (!$parent && $term->parent)) {

			$html[] = '<a href="' . get_term_link($term, $taxonomy) . '">' . $term->name . '</a>';

		}

	}

	return $before . implode($sep, $html) . $after;

}

/*
| -------------------------------------------------------------------
|Allow HTML in category description 
| -------------------------------------------------------------------
| 
| */

$filters = array('term_description' , 'category_description' , 'pre_term_description');
foreach ( $filters as $filter ) {
remove_filter($filter, 'wptexturize');
remove_filter($filter, 'convert_chars');
remove_filter($filter, 'wpautop');
remove_filter($filter, 'wp_filter_kses');
remove_filter($filter, 'strip_tags');
}


/**
 * Rename custom post format
 */

function rename_post_formats( $safe_text ) {
    if ( $safe_text == 'Aside' )
        return 'Exhibitions';
    return $safe_text;
}
add_filter( 'esc_html', 'rename_post_formats' );
//rename Aside in posts list table
function live_rename_formats() {
    global $current_screen;
    if ( $current_screen->id == 'edit-post' ) { ?>
        <script type="text/javascript">
        jQuery('document').ready(function() {
            jQuery("span.post-state-format").each(function() {
                if ( jQuery(this).text() == "Aside" )
                    jQuery(this).text("Exhibitions");
            });
        });
        </script>
<?php }
}
add_action('admin_head', 'live_rename_formats');



/**
 * Pagination for archive, taxonomy, category, tag and search results pages
 *
 * @global $wp_query http://codex.wordpress.org/Class_Reference/WP_Query
 * @return Prints the HTML for the pagination if a template is $paged
 */
function base_pagination() {
	global $wp_query;
 
	$big = 999999999; // This needs to be an unlikely integer
 
	// For more options and info view the docs for paginate_links()
	// http://codex.wordpress.org/Function_Reference/paginate_links
	$paginate_links = paginate_links( array(
		'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'prev_text'    => __('Previous'),
		'next_text'    => __('Next'),
		'mid_size' => 5
	) );
 
	// Display the pagination if more than one page is found
	if ( $paginate_links ) {
		echo '<div class="pagination">';
		echo $paginate_links;
		echo '</div><!--// end .pagination -->';
	}
}


/**
 * Don't load css for the language switcher - WPML *
 * 
 * http://wpml.org/forums/topic/custom-css-for-language-switcher/
 */

define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);


/**
 * Count page views *
 * 
 * http://wpsnipp.com/index.php/functions-php/track-post-views-without-a-plugin-using-post-meta/
 */

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count;
}
function setPostViews($postID) {
if (!current_user_can('level_7') ) :
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
endif;
}





?>