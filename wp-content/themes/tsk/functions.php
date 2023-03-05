<?php

/**
 * first task functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package first_task
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
function tsk_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on first task, use a find and replace
		* to change 'tsk' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('tsk', get_template_directory() . '/languages');

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
			'menu-1' => esc_html__('Primary', 'tsk'),
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
			'tsk_custom_background_args',
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
add_action('after_setup_theme', 'tsk_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tsk_content_width()
{
	$GLOBALS['content_width'] = apply_filters('tsk_content_width', 640);
}
add_action('after_setup_theme', 'tsk_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tsk_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'tsk'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'tsk'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'tsk_widgets_init');

/**
 * Enqueue scripts and styles.
 */

$base = get_template_directory_uri() . '/';
function tsk_scripts()
{
	global $base;
	//style 

	wp_enqueue_style('boostrap-style', $base . 'assets/css/bootstrap.min.css', [], null);
	wp_enqueue_style('fontawasme-style', $base . 'assets/css/fontawesome.min.css', [], null);
	wp_enqueue_style('all-style', $base . 'assets/css/all.min.css', [], null);
	// wp_enqueue_style('aos-style', $base . 'assets/css/aos.min.css', [], null);
	// wp_enqueue_style('hover-style', $base . 'assets/css/hover-min.css', [], null);
	wp_enqueue_style('swiper-style', $base . 'assets/css/swiper-bundle.min.css', [], null);

	wp_enqueue_style('tsk-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('tsk-style', 'rtl', 'replace');

	//scripts
	wp_enqueue_script('all-script', $base . 'assets/js/all.min.js', [], null, true);
	wp_enqueue_script('jquery');

	wp_enqueue_script('boostrap-script', $base . 'assets/js/bootstrap.min.js', [], null, true);
	//for infinty loop
	wp_enqueue_script('infinite-scroll', $base . 'assets/js/infinite-scroll.js', array('jquery'), '', true);
	wp_localize_script('infinite-scroll', 'ajaxurl', admin_url('admin-ajax.php'));
	wp_enqueue_script('fontawasme-script', $base . 'assets/js/fontawesome.min.js', [], null, true);
	wp_enqueue_script('swiper-script', $base . 'assets/js/swiper-bundle.min.js', [], null, true);
	wp_enqueue_script('aos-script', $base . 'assets/js/aos.min.js', [], null, true);
	wp_enqueue_script('main-script', $base . 'assets/js/main.js', [], null, true);

	wp_enqueue_script('tsk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'tsk_scripts');

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
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// function for load more post
// add_action("wp_ajax_load_more_posts", "load_more_posts");
// add_action("wp_ajax_nopriv_load_more_posts", "load_more_posts");

// function load_more_posts() {
//     $page = $_POST["page"];
//     $query = new WP_Query(array(
//         "post_type" => "post",
//         "posts_per_page" => 10,
//         "paged" => $page
//     ));
//     while ($query->have_posts()) {
//         $query->the_post();
//         get_template_part("content", get_post_format());
//     }
//     wp_reset_postdata();
//     exit;
// }


// add_action('wp_ajax_nopriv_sunset_load_more', 'sunset_load_more');
// add_action('wp_ajax_sunset_load_more', 'sunset_load_more');

// function sunset_load_more()
// {

// 	$paged = $_POST["page"] - 1;
// 	$post_id = $_GET['post_id'] ?? null;
// 	if ($post_id && is_numeric($post_id) && $post_id > 0) {
// 		global $post;
// 		$post          = get_post($post_id);
// 		$previous_post = get_previous_post();
// 		$prev_post_id  = $previous_post->id;
// 	}

// 	$query = new WP_Query(array(
// 		'post_type' => 'post',
// 		// 'paged' => $paged
// 	));

// 	if ($query->have_posts()) :

// 		while ($query->have_posts()) : $query->the_post();


// 			if (has_post_thumbnail($prev_post_id)) {
// 				echo get_the_post_thumbnail($prev_post_id, 'thumbnail');
// 			}
// 			echo '<h2>' . get_the_title($prev_post_id) . '</h2>';
// 		endwhile;

// 	endif;

// 	wp_reset_postdata();

// 	die();
// }
