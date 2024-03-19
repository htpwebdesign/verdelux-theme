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
	endwhile; // End of the loop.
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

			foreach ($fields as $key => $value) {
				$field_object = get_field_object($key);
				$label = $field_object['label'];

				if ($key === 'location_name_') {
					echo '<h2>' . $value . '</h2>';
				}

				if ($key === 'map_location') {

					$location = get_field('map_location');
					if ($location) {

						echo '<div class="acf-map" data-zoom="16">';
						echo '<div class="marker" data-lat="' . esc_attr($location['lat']) . '" data-lng="' . esc_attr($location['lng']) . '"></div>';
						echo '</div>';
					}
				}

				if ($key === 'address') {
					echo '<p>' . $value . '</p>';
				}

				if ($key === 'hours') {
					if ( is_array($value)) {
						foreach ($value as $dayTime) {
							echo '<p>' . $dayTime['day'] . ' ' . $dayTime['time_'] . '</p>';
						}
					}
				}

				if ($key === 'phone_number_') {
					echo '<p>' . $value . '</p>';
				}

				if ($key === 'email') {
					echo '<a href="mailto:' . $value . '"> ' . $value . '</a>';
				}
			}
		}
	}
	?>


</main><!-- #main -->

<?php
get_footer();
