<?php

/**
 * Plugin Name:       WP Ajax
 * Plugin URI:        https://wordpress.org/plugins/
 * Description:       Display next posts
 * Version:           1.0.0
 * Author:            Ahmad Wael
 * Author URI:        https://github.com/DevWael
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

function my_load_more_function()
{
	$post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : null;
	if (empty($post_id) || $post_id <= 0) {
		wp_send_json_error('Invalid post ID');
	}

	if ($post_id && is_numeric($post_id) && $post_id > 0) {

		global $post;
		$post = get_post($post_id);

		// check if the previous post exists
		if ($previous_post = get_previous_post()) {

			$prev_post_id = $previous_post->ID;

			$post_data = [
				'id' => $prev_post_id,
				'image_url' => get_the_post_thumbnail_url($prev_post_id, 'full'),
				'title' => get_the_title($prev_post_id),
				'content' => apply_filters('the_content', $previous_post->post_content),
				'link' => get_permalink($prev_post_id),
			];

			wp_send_json_success($post_data);
		} else {
			wp_send_json_error('No previous post found.');
		}
	} else {
		wp_send_json_error('Invalid request.');
	}
}

add_action('wp_ajax_my_load_more_function', 'my_load_more_function');
add_action('wp_ajax_nopriv_my_load_more_function', 'my_load_more_function');


function load_ajax_more()
{
	if (is_single()) {
		wp_enqueue_style(
			'load-more-css',
			plugin_dir_url(__FILE__) . '/style.css'
		);
		wp_enqueue_script(
			'load-more-js',
			plugin_dir_url(__FILE__) . '/main.js',
			['jquery'],
			'1.0.0',
			true
		);
		wp_localize_script('load-more-js', 'loadMore', [
			'ajax_url' => esc_url(admin_url('admin-ajax.php')),
		]);
	}
}

add_action('wp_enqueue_scripts', 'load_ajax_more');

function load_more_point($post_content)
{
	if (is_single()) {
		$post_id      = get_the_ID();
		$post_content .= '<div class="load-more-content"></div><div class="load-more-point" data-post-id="'
			.  $post_id  . '"></div>';
	}

	return $post_content;
}

add_filter('the_content', 'load_more_point');


function add_load_more_class($classes)
{
	if (is_single()) {
		$classes[] = 'tarek-class';
	}

	return $classes;
}

add_filter('body_class', 'add_load_more_class');
