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

	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote' ) );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'barjeel' ),
		'artist' => __( 'Artist Menu', 'barjeel' ),
		'filter' => __( 'Filter Menu', 'barjeel' ),
		'sort' => __( 'Sort Menu', 'barjeel' ),
		'medium' => __( 'Medium Menu', 'barjeel' ),
		'news' => __( 'News Menu', 'barjeel' ),
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

add_action( 'wp_enqueue_scripts', 'child_add_ie8_style_sheet', 200 );
/**
 * Enqueue a IE-specific style sheet.
 *
 * Add a style sheet for everyone, then mark it as conditional to IE7 or below.
 *
 * @author Gary Jones
 * @link   http://code.garyjones.co.uk/enqueued-style-sheet-extras/
 */
function child_add_ie8_style_sheet() {
	global $wp_styles;
	wp_enqueue_style( 'child-ie8', get_stylesheet_directory_uri() . '/barjeel-old-ie.css', array(), '1.0' );
	$wp_styles->add_data( 'child-ie8', 'conditional', 'lte IE 8' );
}


################################################################################
// Loading all JS Script Files.  Remove any files you are not using!
################################################################################

function barjeel_scripts() {

	wp_enqueue_script( 'okzoom', get_template_directory_uri() . '/javascripts/build/okzoom.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'barjeel', get_template_directory_uri() . '/javascripts/build/barjeel.min.js', array( 'jquery' ), '20120206', true );


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

	register_sidebar( array(
		'name' => __( 'Footer-1', 'barjeel' ),
		'id' => 'footer-1',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer-2', 'barjeel' ),
		'id' => 'footer-2',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer-3', 'barjeel' ),
		'id' => 'footer-3',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer-4', 'barjeel' ),
		'id' => 'footer-4',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer-5', 'barjeel' ),
		'id' => 'footer-5',
		'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );


	register_sidebar( array(
		'name' => __( 'Exhibition-main', 'barjeel' ),
		'id' => 'exhibitionpage',
		'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
    'name' => __( 'Search', 'barjeel' ),
    'id' => 'search',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
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
| Get tag name from id (to exclude post) http://wp-snippets.com/exclude-posts-with-certain-tag-from-loop/
| -------------------------------------------------------------------
| */

function get_tag_id_by_name($tag_name) {
	global $wpdb;
	return $wpdb->get_var("SELECT term_id FROM ".$wpdb->terms." WHERE `name` =  '".$tag_name."'");
}

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
  	add_image_size( 'page-big', 490, 800 );
  	add_image_size( 'carousel-gallery', 900, 400 );
  	add_image_size('news-cropped-thumb', 220, 220, true);
  	add_image_size('cropped-thumb', 170, 170, true);
  	add_image_size('homepage-thumb', 745, 745, true);
  		add_image_size('slider-thumb', 400, 400, true);
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



/*
| -------------------------------------------------------------------
|Custom taxonomies
| -------------------------------------------------------------------
|
| */


add_action( 'init', 'create_my_taxonomies', 0 );

function create_my_taxonomies() {
	register_taxonomy( 'acquired', 'post', array( 'hierarchical' => false, 'label' => 'Acquired', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'medium', 'post', array( 'hierarchical' => false, 'label' => 'Medium', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'theme', 'post', array( 'hierarchical' => false, 'label' => 'Theme', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'artist', 'post', array( 'hierarchical' => true, 'label' => 'Artist', 'query_var' => true, 'rewrite' => array('hierarchical' => true ) ) );
	register_taxonomy( 'movement', 'post', array( 'hierarchical' => false, 'label' => 'Movement', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'exhibition', 'post', array( 'hierarchical' => false, 'label' => 'Exhibition', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'bornin', 'post', array( 'hierarchical' => false, 'label' => 'Born in', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'news-themes', 'post', array( 'hierarchical' => false, 'label' => 'News themes', 'query_var' => true, 'rewrite' => true ) );
  register_taxonomy( 'non-arab-artist', 'post', array( 'hierarchical' => true, 'label' => 'Non Arab Artist', 'query_var' => true, 'rewrite' => array('hierarchical' => true ) ) );
  register_taxonomy( 'artwork-year', 'post', array( 'hierarchical' => false, 'label' => 'Artwork year', 'query_var' => true, 'rewrite' => true ) );
  register_taxonomy( 'contributor', 'post', array( 'hierarchical' => false, 'label' => 'Contributor', 'query_var' => true, 'rewrite' => true ) );
}


function rw_get_the_term_list($id = null, $taxonomy, $parent = true, $before = '', $sep = ', ', $after = '') {

	$id = empty($id) ? get_the_ID() : $id;

	$terms = get_the_terms($id, $taxonomy);

	$html = array();

	if(!empty($terms)) {

	foreach ($terms as $term) {

		if (($parent && 0 == $term->parent) || (!$parent && $term->parent)) {

			$term_name = $term->name;
			$term_short = mb_strimwidth($term_name, 0, 100, '...');

			$html[] = '<a href="' . get_term_link($term, $taxonomy) . '">' . $term_short . '</a>';

		}

	}

	return $before . implode($sep, $html) . $after;

	}

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

    if ( $safe_text == 'Link' )
        return 'Image (non-Arab)';

   if ( $safe_text == 'Quote' )
        return 'Download';
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
		'prev_text'    => __('PREVIOUS'),
		'next_text'    => __('NEXT'),
		'end_size' => 1,
		'mid_size' => 2,
    'before_page_number' => '<span class="page-number">',
    'after_page_number' => '</span>',
	) );

	// Display the pagination if more than one page is found
	if ( $paginate_links ) {
		echo '<div class="pagination-wrapper"><div class="pagination">';
		echo $paginate_links;
		echo '</div><!--// end .pagination --></div>';
	}
}



/**
 * Don't load css for the language switcher - WPML *
 *
 * http://wpml.org/forums/topic/custom-css-for-language-switcher/
 */

define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);


/**
 * Pagination permalinks fix  *
 *
 * http://wordpress.stackexchange.com/questions/44537/why-is-page-2-not-working
 */

add_filter( 'redirect_canonical', 'custom_disable_redirect_canonical' );
function custom_disable_redirect_canonical( $redirect_url ) {
    if ( is_paged() && is_singular() ) $redirect_url = false;
    return $redirect_url;
}

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


/**
 * Related Post Connection *
 *
 * http://www.billerickson.net/manually-curated-related-posts/
 */

add_action( 'init', 'be_post_type_connections' );

function be_post_type_connections() {

	// Make Sure plugin is active
	if ( !function_exists( 'p2p_register_connection_type' ) )
		return;

	p2p_register_connection_type( array(
		'name' => 'related-articles', // unique name
		'from' => 'post',
		'to' => 'post',
		'title' => array( 'to' => 'All Connections', 'from' => 'Related Articles' )
	) );
}


/**
 * Update custom field with taxonomy *
 *
 *
 */


add_action('save_post', 'save_my_metadata');

function save_my_metadata()
{

	$id = empty($id) ? get_the_ID() : $id;

	if ( in_category( 'collection', $id ))

{

	$taxonomy_name = 'artist';

	$parent_taxonomies = get_terms( $taxonomy_name, array( 'parent' => 0, 'hide_empty' => 0  ) ); // get parent taxonomies for artist

	$parent_terms = array();

	 foreach ( $parent_taxonomies as $term )
     {
		$parent_terms [] = $term->name; // get the names for the artist parent taxonomies

     }

	$terms = get_the_terms( $post->ID, $taxonomy_name );	// get the terms in artist taxonomy for this post

	$artist_taxonomies = array();

     foreach ( $terms as $term )
     {
		$artist_taxonomies [] = $term->name;

     }

     	$result = array_diff($artist_taxonomies, $parent_terms); // remove the parent terms

		     	foreach ($result as $key => $value) {

		    		$value = trim($value);

				    if (!empty($value))
				       $artist_name = $value;

					}


			$result_countries = array_intersect($artist_taxonomies, $parent_terms); // remove the parent terms

		     	foreach ($result_countries as $key => $value) {

		    		$value = trim($value);

				    if (!empty($value))
				       $country_name = $value;

					}

        delete_post_meta($id, 'artist');
        update_post_meta($id, 'artist', $artist_name);


        delete_post_meta($id, 'country');
        update_post_meta($id, 'country', $country_name);


       } //close if category

} //close save_metadata



add_action('save_post', 'save_my_metadata_non_arab');

function save_my_metadata_non_arab()
{

  $id = empty($id) ? get_the_ID() : $id;

  if ( in_category( 'non-arab-art', $id ))

{

  $taxonomy_name = 'non-arab-artist';

  $parent_taxonomies = get_terms( $taxonomy_name, array( 'parent' => 0, 'hide_empty' => 0  ) ); // get parent taxonomies for artist

  $parent_terms = array();

   foreach ( $parent_taxonomies as $term )
     {
    $parent_terms [] = $term->name; // get the names for the artist parent taxonomies

     }

  $terms = get_the_terms( $post->ID, $taxonomy_name );  // get the terms in artist taxonomy for this post

  $artist_taxonomies = array();

     foreach ( $terms as $term )
     {
    $artist_taxonomies [] = $term->name;

     }

      $result = array_diff($artist_taxonomies, $parent_terms); // remove the parent terms

          foreach ($result as $key => $value) {

            $value = trim($value);

            if (!empty($value))
               $artist_name = $value;

          }


      $result_countries = array_intersect($artist_taxonomies, $parent_terms); // remove the parent terms

          foreach ($result_countries as $key => $value) {

            $value = trim($value);

            if (!empty($value))
               $country_name = $value;

          }

        delete_post_meta($id, 'artist');
        update_post_meta($id, 'artist', $artist_name);


        delete_post_meta($id, 'country');
        update_post_meta($id, 'country', $country_name);


       } //close if category

} //close save_metadata_non_arab




// check for a certain meta key on the current post and add a body class if meta value exists

add_filter('post_class','barjeel_custom_field_post_class');

function barjeel_custom_field_post_class( $classes ) {

	if ( get_post_meta( get_the_ID(), 'video', true ) ) {

		$classes[] = 'video-thumb';

	}

	// return the $classes array
	return $classes;

}


/**
 * These filters limit the categories on the related posts Yarpp *
 *
 *
 */

function only_news_cat($query) {

	$query->set('category_name', 'News');

	return $query;

}


function only_collection_cat($query) {

	$query->set('category_name', 'Collection');

	return $query;

}



add_action( 'pre_get_posts', 'be_change_event_posts_per_page' );

/**
 * Change Posts Per Page for Exhibition
 *
 */
function be_change_event_posts_per_page( $query ) {

	if( $query->is_main_query() && !is_admin() && is_category( 'exhibitions' ) ) {
		$query->set( 'posts_per_page', '18' );
		$query-> set('tag__not_in',array(173));
	}

	if( $query->is_main_query() && !is_admin() && is_category( 'downloads' ) ) {
		$query->set( 'posts_per_page', '12' );
	}

	if( $query->is_main_query() && !is_admin() && is_category( 'news' ) ) {
		$query->set( 'posts_per_page', '10' );
	}

	if( $query->is_main_query() && !is_admin() && is_tax( 'news-themes' ) ) {
		$query->set( 'posts_per_page', '10' );
	}

}

/**
 * Allow HTML in term (category, tag) descriptions
 *
 */

foreach ( array( 'pre_term_description' ) as $filter ) {
  remove_filter( $filter, 'wp_filter_kses' );
}

foreach ( array( 'term_description' ) as $filter ) {
  remove_filter( $filter, 'wp_kses_data' );
}

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


// Add image to taxonomy - https://catapultthemes.com/adding-an-image-upload-field-to-categories/
add_action( 'contributor_add_form_fields', 'add_category_image', 10, 2 );
add_action( 'contributor_category', 'save_category_image', 10, 2 );
add_action( 'contributor_edit_form_fields', 'update_category_image', 10, 2 );
add_action( 'edited_contributor', 'updated_category_image', 10, 2 );
add_action( 'admin_enqueue_scripts', 'load_media');
add_action( 'admin_footer', 'add_script');


function load_media() {
   if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'contributor' ) {
     return;
   }
   wp_enqueue_media();
 }

 /**
  * Add a form field in the new category page
  * @since 1.0.0
  */

 function add_category_image( $taxonomy ) { ?>
   <div class="form-field term-group">
     <label for="showcase-taxonomy-image-id"><?php _e( 'Image', 'showcase' ); ?></label>
     <input type="hidden" id="showcase-taxonomy-image-id" name="showcase-taxonomy-image-id" class="custom_media_url" value="">
     <div id="category-image-wrapper"></div>
     <p>
       <input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php _e( 'Add Image', 'showcase' ); ?>" />
       <input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php _e( 'Remove Image', 'showcase' ); ?>" />
     </p>
   </div>
 <?php }

 /**
  * Save the form field
  * @since 1.0.0
  */
 function save_category_image( $term_id, $tt_id ) {
   if( isset( $_POST['showcase-taxonomy-image-id'] ) && '' !== $_POST['showcase-taxonomy-image-id'] ){
     add_term_meta( $term_id, 'showcase-taxonomy-image-id', absint( $_POST['showcase-taxonomy-image-id'] ), true );
   }
  }

  /**
   * Edit the form field
   * @since 1.0.0
   */
  function update_category_image( $term, $taxonomy ) { ?>
    <tr class="form-field term-group-wrap">
      <th scope="row">
        <label for="showcase-taxonomy-image-id"><?php _e( 'Image', 'showcase' ); ?></label>
      </th>
      <td>
        <?php $image_id = get_term_meta( $term->term_id, 'showcase-taxonomy-image-id', true ); ?>
        <input type="hidden" id="showcase-taxonomy-image-id" name="showcase-taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
        <div id="category-image-wrapper">
          <?php if( $image_id ) { ?>
            <?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
          <?php } ?>
        </div>
        <p>
          <input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php _e( 'Add Image', 'showcase' ); ?>" />
          <input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php _e( 'Remove Image', 'showcase' ); ?>" />
        </p>
      </td>
    </tr>
 <?php }

 /**
  * Update the form field value
  * @since 1.0.0
  */
 function updated_category_image( $term_id, $tt_id ) {
   if( isset( $_POST['showcase-taxonomy-image-id'] ) && '' !== $_POST['showcase-taxonomy-image-id'] ){
     update_term_meta( $term_id, 'showcase-taxonomy-image-id', absint( $_POST['showcase-taxonomy-image-id'] ) );
   } else {
     update_term_meta( $term_id, 'showcase-taxonomy-image-id', '' );
   }
 }

 /**
  * Enqueue styles and scripts
  * @since 1.0.0
  */
 function add_script() {
   if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'contributor' ) {
     return;
   } ?>
   <script> jQuery(document).ready( function($) {
     _wpMediaViewsL10n.insertIntoPost = '<?php _e( "Insert", "showcase" ); ?>';
     function ct_media_upload(button_class) {
       var _custom_media = true, _orig_send_attachment = wp.media.editor.send.attachment;
       $('body').on('click', button_class, function(e) {
         var button_id = '#'+$(this).attr('id');
         var send_attachment_bkp = wp.media.editor.send.attachment;
         var button = $(button_id);
         _custom_media = true;
         wp.media.editor.send.attachment = function(props, attachment){
           if( _custom_media ) {
             $('#showcase-taxonomy-image-id').val(attachment.id);
             $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
             $( '#category-image-wrapper .custom_media_image' ).attr( 'src',attachment.url ).css( 'display','block' );
           } else {
             return _orig_send_attachment.apply( button_id, [props, attachment] );
           }
         }
         wp.media.editor.open(button); return false;
       });
     }
     ct_media_upload('.showcase_tax_media_button.button');
     $('body').on('click','.showcase_tax_media_remove',function(){
       $('#showcase-taxonomy-image-id').val('');
       $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     });
     // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
     $(document).ajaxComplete(function(event, xhr, settings) {
       var queryStringArr = settings.data.split('&');
       if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
         var xml = xhr.responseXML;
         $response = $(xml).find('term_id').text();
         if($response!=""){
           // Clear the thumb image
           $('#category-image-wrapper').html('');
         }
        }
      });
    });
  </script>
 <?php }


