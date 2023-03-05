<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package first_task
 */

get_header();
$args_post    = array(
	'post_type' => 'post',
	'orderby'   => 'date',
	'posts_per_page' => 1,
	'order'  => 'desc',
);
$the_post = new WP_Query('$args_post');

if ( have_posts() ) : ?>
  <div class="container py-5">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="post">
        <h2><?php the_title(); ?></h2>
        <div class="post-content"><?php the_content(); ?></div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif;//end if condition 
  wp_reset_postdata();?>
<?php
get_footer();
