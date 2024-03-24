<?php

/**
 * Template name: page-community.php 
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verdelux_Theme
 */

get_header();
?>

<main id="primary" class="vlx__main site-main">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');

		$args = array(
			'post_type'			=> 'vdx-events',
			'posts_per_page'	=> -1,
			'order'				=> 'ASC',

		);

		$query = new WP_Query($args);
		if ($query->have_posts()) {
			echo '<section class="vlx__community">';
			echo '<h2 class="vlx__community--title">Upcoming</h2>';
			while ($query->have_posts()) {
				$query->the_post();
				echo '<article class="vlx__community--event">';
				echo '<h3 class="vlx__community__event--title">' . esc_html(get_the_title()) . '</h3>';
				echo the_field('description_&_details_');
				echo '</article>';
			}
			wp_reset_postdata();
			echo '</section>';
		}

	?>
	<?php
	endwhile; // End of the loop.
	?>
</main><!-- #main -->

<?php
get_footer();
