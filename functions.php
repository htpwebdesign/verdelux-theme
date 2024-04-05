<?php

/**
 * Verdelux Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Verdelux_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function verdelux_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Verdelux Theme, use a find and replace
		* to change 'verdelux-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('verdelux-theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'verdelux-theme'),
			'footer-left' => esc_html__('Footer - Left Side', 'verdelux-theme'),
			'footer-right' => esc_html__('Footer - Right Side', 'verdelux-theme'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'verdelux_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'verdelux_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function verdelux_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('verdelux_theme_content_width', 640);
}
add_action('after_setup_theme', 'verdelux_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function verdelux_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'verdelux-theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'verdelux-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'verdelux_theme_widgets_init');

/**
 * Enqueue scripts and styles. 
 */
function verdelux_theme_scripts()
{
	wp_enqueue_style(
		'verdelux-textfont', //custom texts from google fonts : work sans & eagle lake 
		'https://fonts.googleapis.com/css2?family=Eagle+Lake&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap',
		array(),
		null
	);

	wp_enqueue_style('verdelux-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('verdelux-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('verdelux-theme-style', 'rtl', 'replace');
	wp_enqueue_script('verdelux-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	wp_enqueue_script('verdelux-theme-jobPostDescripToggle', get_template_directory_uri() . '/js/jobPostDescripToggle.js', array(), _S_VERSION);
	// check if page is contact page - output the location information 
	if (is_page($page = 'contact')) {
		wp_enqueue_script('googleMaps', get_template_directory_uri() . '/js/googleMaps.js', array('googleMapsKey', 'jquery'), '1.0.0', true);
		wp_enqueue_script('googleMapsKey', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAgKjLxZAbjdoqpa8zcmIMhu53vA6h9xYU&callback=Function.prototype', array(), '1.0', true);
		wp_enqueue_style('google-maps', get_template_directory_uri() . '/google-maps.css');
	}
	if (is_page($page = 'menu')) {
		wp_enqueue_style('slick-css', get_template_directory_uri() . '/slick/slick.css');
		wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/slick/slick-theme.css');

		wp_enqueue_script('slick-js', get_template_directory_uri() . '/slick/slick.js', array('jquery'), '1.0', true);
		wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery', 'slick-js'), '1.0', true);
		wp_enqueue_script('menu-tab', get_template_directory_uri() . '/js/menu-tab.js');
	}


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'verdelux_theme_scripts');

// Load in custom login styles and scripts
function vdx_login_stylesheet()
{

	// CSS Styles
	wp_enqueue_style(
		'custom-login', // unique handle
		get_stylesheet_directory_uri() . '/style-login.css', // URL path
		array(), // dependencies
		_S_VERSION, // version
	);
}
add_action('login_enqueue_scripts', 'vdx_login_stylesheet');

// Custom login logo URL
function vdx_login_logo_url()
{
	return home_url();
}
add_filter('login_headerurl', 'vdx_login_logo_url');

// Custom login URL title
function vdx_login_logo_url_title()
{
	return 'Verdelux | Casually elegant laid back vegetarian restaurants in the heart of the city';
}
add_filter('login_headertext', 'vdx_login_logo_url_title');


// Add google api key for ACF
function google_api_acf_init($api)
{

	$api['key'] = 'AIzaSyAgKjLxZAbjdoqpa8zcmIMhu53vA6h9xYU';
	return $api;
}
add_filter('acf/fields/google_map/api', 'google_api_acf_init');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Gravity form select option field values function
 * */
require get_template_directory() . '/inc/job-selection-function.php';

/**
 * Google Maps Template Part 
 */
// require get_template_directory() . '/inc/googleMaps.php';

/**
 * Load Jetpack compatibility file.
 */

if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Customizer Types & Taxonmomies.
 */
require get_template_directory() . '/inc/CPT-taxonomy.php';

// ** Custom Post Types **



// Edit Placeholder Text Section

// Change 'Add Title' placeholder text to 'Add Menu Item Title'
function vdx_change_menu_item_title($title, $post_type)
{
	if ('vdx-menu-item' === get_post_type()) {
		return __('Add Menu Item Title', 'textdomain');
	}
	return $title;
}
add_filter('enter_title_here', 'vdx_change_menu_item_title', 10, 2);

// Change 'Add Title' placeholder text to 'Add Team Member Name'
function vdx_change_team_member_name($title, $post_type)
{
	if ('vdx-team' === get_post_type()) {
		return __('Add Team Member Name', 'textdomain');
	}
	return $title;
}
add_filter('enter_title_here', 'vdx_change_team_member_name', 10, 2);

// Change 'Add Title' placeholder text to 'Add Event Title'
function vdx_change_event_title($title, $post_type)
{
	if ('vdx-events' === get_post_type()) {
		return __('Add Event Title', 'textdomain');
	}
	return $title;
}
add_filter('enter_title_here', 'vdx_change_event_title', 10, 2);

function vdx_change_career_title($title, $post_type)
{
	if ('vdx-career' === get_post_type()) {
		return __('Add Job Post Title', 'textdomain');
	}
	return $title;
}
add_filter('enter_title_here', 'vdx_change_career_title', 10, 2);

function vdx_change_testimonial_title($title, $post_type)
{
	if ('vdx-testimonial' === get_post_type()) {
		return __('Add Customer Name', 'textdomain');
	}
	return $title;
}
add_filter('enter_title_here', 'vdx_change_testimonial_title', 10, 2);


/**
 * New dashboard widgets.
 * Function to declare to ADD the dasboard widget
 */

 function admin_dashboard_widget()
 {
	wp_add_dashboard_widget(
		 'custom_dashboard_widget', //slug id
		 'Welcome to Verdelux!', //title
		 'dashboard_widgets_display' //display function 
	);
 
	wp_add_dashboard_widget(
		 'custom_dashboard_widget', //slug id
		 'Navigating Wordpress', //title
		 'dashboard_widgets_display' //display function 
	);

	wp_add_dashboard_widget(
		'custom_dashboard_widget_2', //slug id
		'Navigating Wordpress: A Detailed Guide', //title
		'dashboard_widgets_display_2' //display function 
	);
 }
 add_action('wp_dashboard_setup', 'admin_dashboard_widget');
 

/**
 * 
 * Function to MODIFY/DISPLAY content
 */
 function dashboard_widgets_display()
 {
	 echo "<p>Our passion for vegetarian cuisine is evident in every bite, as we bring together the freshest ingredients from the local community to create a culinary experience unlike any other.</p>";
 
	 echo '<iframe width="100%" height="315" src="https://www.youtube.com/embed/Z0QIkCIiugg?si=tVJxCmg1jvWwQDMF" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
 }
 
//SECOND Widget Output Function: Navigating Wordpress- Detailed Guide
function dashboard_widgets_display_2()
 {
	 echo '<iframe width="100%" height="315" src="https://www.youtube.com/embed/FgZscfHWcXM?si=6Yd1QijxdwjDJxiS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
 }
 

// function to REMOVE from the dashboard
//removed widgets: wordpress events&news
function remove_dashboard_widget()
{
	remove_meta_box('dashboard_primary', 'dashboard', 'side');
}
add_action('wp_dashboard_setup', 'remove_dashboard_widget');



// Remove admin menu links for non-Administrator accounts//
function fwd_remove_admin_links() {
	if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'edit.php' );           // Remove Posts link
    		remove_menu_page( 'edit-comments.php' );  // Remove Comments link
	}
}
add_action( 'admin_menu', 'fwd_remove_admin_links' );