<?php

////////////////////////////////////////////////////////////////////
// Theme Information
////////////////////////////////////////////////////////////////////

    $themename = "wordpress_bootstrap_flatly";
    $developer_uri = "http://Wbf.com";
    $shortname = "dm";
    $version = '1.80';
    load_theme_textdomain( 'wordpress_bootstrap_flatly', get_template_directory() . '/languages' );

////////////////////////////////////////////////////////////////////
// include Theme-options.php for Admin Theme settings
////////////////////////////////////////////////////////////////////

   include 'theme-options.php';


////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////
    function wordpress_bootstrap_flatly_theme_stylesheets()
    {
        wp_register_style('bootstrap.css', get_template_directory_uri() . '/css/bootstrap.css', array(), '1', 'all' );
        wp_enqueue_style( 'bootstrap.css');
        wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '1', 'all' );
        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    }
    add_action('wp_enqueue_scripts', 'wordpress_bootstrap_flatly_theme_stylesheets');

//Editor Style
    add_editor_style('css/editor-style.css');

////////////////////////////////////////////////////////////////////
// Register Bootstrap JS with jquery
////////////////////////////////////////////////////////////////////
    function wordpress_bootstrap_flatly_theme_js()
    {
        global $version;
        wp_enqueue_script('theme-js', get_template_directory_uri() . '/js/bootstrap.js',array( 'jquery' ),$version,true );
    }
    add_action('wp_enqueue_scripts', 'wordpress_bootstrap_flatly_theme_js');


//----------------------------------------------------------/
//  responsive images [ 1) add img-responsive class 2) remove dimensions ]
//----------------------------------------------------------/
function bootstrap_responsive_images( $html ){
  $classes = 'img-responsive'; // separated by spaces, e.g. 'img image-link'
  // check if there are already classes assigned to the anchor
  if ( preg_match('/<img.*? class="/', $html) ) {
    $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
  } else {
    $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
  }
  // remove dimensions from images,, does not need it!
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}
add_filter( 'the_content','bootstrap_responsive_images',10 );
add_filter( 'post_thumbnail_html', 'bootstrap_responsive_images', 10 );
    
////////////////////////////////////////////////////////////////////
// Add Title Tag Support with Regular Title Tag injection Fall back.
////////////////////////////////////////////////////////////////////
function custom_theme_setup() {
    add_theme_support( 'html5', array( 'comment-list' ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );
function wordpress_bootstrap_flatly_title_tag() {
    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'wordpress_bootstrap_flatly_title_tag' );

if(!function_exists( '_wp_render_title_tag')) {

    function wordpress_bootstrap_flatly_render_title() {
        ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php
    }
    add_action( 'wp_head', 'wordpress_bootstrap_flatly_render_title' );

}

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'acme_product',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
////////////////////////////////////////////////////////////////////
// Register Custom Navigation Walker include custom menu widget to use walkerclass
////////////////////////////////////////////////////////////////////

    require_once('lib/wp_bootstrap_navwalker.php');
    require_once('lib/class-wp-bootstrap-comment-walker.php');
    
    require_once('lib/bootstrap-custom-menu-widget.php');
    require_once('lib/bootstrap-custom-hero-widget.php');
    require_once('lib/bootstrap-navbar-social-icons.php');
    require_once('lib/bootstrap-page-install-widget.php');
    require_once('lib/bootstrap-page-youtube-widget.php');
    require_once('lib/bootstrap-navbar-search-widget.php');
////////////////////////////////////////////////////////////////////
// Register Menus
////////////////////////////////////////////////////////////////////

        register_nav_menus(
            array(
                'main_menu' => 'Main Menu',
                'footer_menu' => 'Footer Menu'
            )
        );

////////////////////////////////////////////////////////////////////
// Register the Sidebar(s)
////////////////////////////////////////////////////////////////////

        register_sidebar(
            array(
            'name' => 'Right Sidebar',
            'id' => 'right-sidebar',
            'before_widget' => '<div class="panel panel-primary">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
            'after_title' => '</h3></div><div class="panel-body">',
        ));

        register_sidebar(
            array(
            'name' => 'Left Sidebar',
            'id' => 'left-sidebar',
            'before_widget' => '<div class="panel panel-info">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
            'after_title' => '</h3></div><div class="panel-body">',
        ));
        
        register_sidebar(
            array(
            'name' => 'Hero Widget One',
            'id' => 'hero-widget-one',
            'before_widget' => '<div class="panel panel-default">',
            'after_widget' => '</div>',
            'before_title' => '<div class="panel-body text-center">',
            'after_title' => '</div>',
        ));
        
        register_sidebar(
            array(
            'name' => 'Hero Widget Two',
            'id' => 'hero-widget-two',
            'before_widget' => '<div class="panel panel-default">',
            'after_widget' => '</div>',
            'before_title' => '<div class="panel-body text-center">',
            'after_title' => '</div>',
        ));
        
        register_sidebar(
            array(
            'name' => 'Hero Widget Thre',
            'id' => 'hero-widget-thre',
            'before_widget' => '<div class="panel panel-default">',
            'after_widget' => '</div>',
            'before_title' => '<div class="panel-body text-center">',
            'after_title' => '</div>',
        ));
        
        register_sidebar(
            array(
            'name' => 'Top Navbar Social Icons',
            'id' => 'top-navbar-social-icons',
            'before_widget' => '<li>',
            'after_widget' => '</li>',
            'before_title' => '',
            'after_title' => '',
        ));
        
        register_sidebar(
            array(
            'name' => 'Install Page',
            'id' => 'install-page',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        ));
        
        register_sidebar(
            array(
            'name' => 'Youtube Page',
            'id' => 'youtube-page',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        ));
        
        register_sidebar(
            array(
            'name' => 'Navbar Search',
            'id' => 'navbar-search',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        ));
////////////////////////////////////////////////////////////////////
// Register hook and action to set Main content area col-md- width based on sidebar declarations
////////////////////////////////////////////////////////////////////

add_action( 'wordpress_bootstrap_flatly_main_content_width_hook', 'wordpress_bootstrap_flatly_main_content_width_columns');

function wordpress_bootstrap_flatly_main_content_width_columns () {

    global $dm_settings;

    $columns = '12';

    if ($dm_settings['right_sidebar'] != 0) {
        $columns = $columns - $dm_settings['right_sidebar_width'];
    }

    if ($dm_settings['left_sidebar'] != 0) {
        $columns = $columns - $dm_settings['left_sidebar_width'];
    }

    echo $columns;
}

function wordpress_bootstrap_flatly_main_content_width() {
    do_action('wordpress_bootstrap_flatly_main_content_width_hook');
}
/**
 * If more than one page exists, return TRUE.
 */
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}


////////////////////////////////////////////////////////////////////
// Add support for a featured image and the size
////////////////////////////////////////////////////////////////////

    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size(300,300, true);

////////////////////////////////////////////////////////////////////
// Adds RSS feed links to for posts and comments.
////////////////////////////////////////////////////////////////////

    add_theme_support( 'automatic-feed-links' );


	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function bootstrap_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>
		<li class="media">
			<div class="media-left">
				<?php echo get_avatar( $comment ); ?>
			</div>
			<div class="media-body">
				<h4 class="media-heading"><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</div>
		<?php endif;
	}

// [bartag foo="foo-value"]
function bartag_func( $atts ) {
    $a = shortcode_atts( array(
        'foo' => 'something',
        'bar' => 'something else',
    ), $atts );

    return "foo = {$a['foo']}";
}
add_shortcode( 'bartag', 'bartag_func' );

/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	
	$optionsframework_settings = get_option('optionsframework');
	
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
		
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}
////////////////////////////////////////////////////////////////////
// Set Content Width
////////////////////////////////////////////////////////////////////

if ( ! isset( $content_width ) ) $content_width = 800;

?>
