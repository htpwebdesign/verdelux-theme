<?php

/**
 * The template for displaying all pages
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

<main id="primary" class="site-main">

	<?php
	while (have_posts()) : the_post();
		get_template_part('template-parts/content', 'page');
	?>

	<?php

		$args = array(
			'post_type' => 'vdx-location',
			'posts_per_page' => -1
		);
		$location_query = new WP_Query($args);

		if ($location_query->have_posts()) {
			while ($location_query->have_posts()) {
				$location_query->the_post();

				// Get all the ACF fields for the post
				$fields = get_fields();
				echo '<article>';

				if (function_exists('get_field')) {

					if (get_field('location_name_')) {
						echo '<h2>' . get_field('location_name_') . '</h2>';
					}

					if (get_field('map_location')) {
						var_dump(get_field('map_location'));
						// echo '<p>' . the_field('location_name_') . '</p>';
					}

					if (get_field('address')) {
						echo '<p>' . get_field('address') . '</p>';
					}

					if (get_field('hours')) {
						if (is_array(get_field('hours'))) {
							$hours = get_field('hours');

							echo '<ul>';

							foreach ($hours as $dayTime) {
								echo '<li>' . $dayTime['day'] . ' ' . $dayTime['time_'] . '</li>';
							}
							echo '</ul>';
						};
					}
					echo '<div>';
					if (get_field('email')) {
						echo '<a href="mailto:' . get_field('email') . '">' . get_field('email') . '</a>';
					}

					if (get_field('phone_number_')) {
						echo '<a href="tel:' . get_field('phone_number') . '">' . get_field('phone_number_') . '</a>';
					}
					echo '</div>';
				}
				echo '</article>';
			}
		}

	endwhile; // End of the loop.
	?>
</main><!-- #main -->

<?php
get_footer();
