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
		'verdelux-textfont', //custom text from google fonts
		'https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap',
		array(), 
		null
	); 

	wp_enqueue_style(
		'verdelux-headerfont', //custom header text 
		'https://fonts.googleapis.com/css2?family=Eagle+Lake&display=swap',
		array(), 
		null
	); 

	wp_enqueue_style('verdelux-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('verdelux-theme-style', 'rtl', 'replace');

	wp_enqueue_script('verdelux-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('verdelux-theme-scripts', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION);
	wp_enqueue_script('google-maps', get_template_directory_uri() . '/js/googleMaps.js', array(), '1.0.0', true);
	
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'verdelux_theme_scripts');


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
require get_template_directory() . '/inc/googleMaps.php';

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

/**
 * Enqueue Slick CSS
 */
function enqueue_slick_styles() {
    wp_enqueue_style('slick-css' , get_template_directory_uri() . '/slick/slick.css');
}
add_action('wp_enqueue_scripts', 'enqueue_slick_styles');

function enqueue_slick_theme_styles() {
    wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/slick/slick-theme.css');
}
add_action('wp_enqueue_scripts', 'enqueue_slick_styles');

/**
 * Enqueue Slick JavaScript
 */
function enqueue_slick_scripts() {
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/slick/slick.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_scripts');

function enqueue_slick_custom() {
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery', 'slick-js'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_custom');
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
