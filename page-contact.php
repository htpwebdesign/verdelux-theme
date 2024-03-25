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

<main id="primary" class="vlx__main site-main">

	<?php
	while (have_posts()) : the_post();
		get_template_part('template-parts/content', 'page');
	?>

	<?php
		echo '<section class="vlx__contact">';

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
				echo '<article class="vlx__contact--location">';

				if (function_exists('get_field')) {

					if (get_field('location_name_')) {
						echo '<h2 class="vlx__contact__location--locationTitle">' . get_field('location_name_') . '</h2>';
					}
					
					$location = get_field('map_location');
					if( $location ): ?>
						 <div class="acf-map" data-zoom="16">
							  <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
							  <p><em><?php echo esc_html( $location['address'] ); ?></em></p>
							</div>
						 </div>
					<?php endif; 

					if (get_field('address')) {
						echo '<p class="vlx__contact__location--address">' . get_field('address') . '</p>';
					}

					if (get_field('hours')) {
						if (is_array(get_field('hours'))) {
							$hours = get_field('hours');

							echo '<ul class="vlx__contact__location__hours--list">';

							foreach ($hours as $dayTime) {
								echo '<li class="vlx__contact__location__hours--item">' . $dayTime['day'] . ' ' . $dayTime['time_'] . '</li>';
							}
							echo '</ul>';
						};
					}
					echo '<div class="vlx__contact__location--contactInfo">';
					if (get_field('email')) {
						echo '<a href="mailto:' . get_field('email') . '" class="vlx__contact__location__contactInfo--email">' . get_field('email') . '</a>';
					}

					if (get_field('phone_number_')) {
						echo '<a href="tel:' . get_field('phone_number') . '" class="vlx__contact__location__contactInfo--phone">' . get_field('phone_number_') . '</a>';
					}
					echo '</div>';
				}
				echo '</article>';
			}
		}

	endwhile; // End of the loop.
	echo '</section>';
	?>
</main><!-- #main -->

<?php
get_footer();
