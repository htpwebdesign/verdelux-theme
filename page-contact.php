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

				if($key === 'map_location'){
				echo '<div id="map"></div>';
				}

				if ($key === 'address') {
					echo '<p>' . $value . '</p>';
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

	// if ($location_query->have_posts()) {
	// 	while ($location_query->have_posts()) {
	// 		$location_query->the_post();

	// 		$location_title = get_field('location_title');
	// 		echo '<h2>' . $location_title . '</h2>';
	// 	}
	// 	wp_reset_postdata();
	// }
	?>


</main><!-- #main -->

<?php
get_footer();
