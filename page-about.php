<?php

/**
 * The template for displaying the About Page
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
	while (have_posts()) :
		the_post();
		get_template_part('template-parts/content', 'page');
	?>

		<section class="about-chef">

			<?php
			if (function_exists('get_field')) {

				if (get_field('title')) {
					echo '<h2>' . get_field('title') . '</h2>';
				}

				if (get_field('chef_image')) {
					echo wp_get_attachment_image(
						get_field('chef_image'),
						'medium'
					);
				}

				if (get_field('chef_about')) {
					echo '<p>' . get_field('chef_about') . '</p>';
				}
			}
			?>
		</section>

		<section class="about-team">

			<?php if (get_field('team_title')) {
				echo '<h2>' . get_field('team_title') . '</h2>';
			} ?>

			<div class="filter-tabs">
				<ul>
					<?php
					//display filter tabs for Brisbane and Gold Coast
					$locations = array('brisbane', 'gold-coast');
					foreach ($locations as $location) {
						echo '<li><a href="?location=' . $location . '">' . ucfirst(str_replace('-', ' ', $location)) . '</a></li>';
					}
					?>
				</ul>
			</div>
			<div class="team-content">
				<?php
				//default to Brisbane location on intial page load
				$location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : 'brisbane';

				//display team members based on the selected location
				$args = array(
					'post_type'      => 'vdx-team',
					'posts_per_page' => -1,
					'order'          => 'ASC',
					'orderby'        => 'title',
					'tax_query'      => array(
						array(
							'taxonomy' => 'vdx-location-category',
							'field'    => 'slug',
							'terms'    => $location,
						)
					),
				);
				$query = new WP_Query($args);

				if ($query->have_posts()) {
					//output Term name (locations: Brisbane or Gold Coast) *REMOVE THIS LINE ONCE FILTER TABS R WORKING*
					echo '<h3>' . ucfirst(str_replace('-', ' ', $location)) . '</h3>';

					// output Content
					while ($query->have_posts()) {
						$query->the_post();

						if (function_exists('get_field')) {
							//output team member image
							if (get_field('member_image_')) {
								echo wp_get_attachment_image(
									get_field('member_image_'),
									'medium'
								);
							}

							//output team member name
							echo '<h4>' . esc_html(get_the_title()) . '</h4>';

							//output job title 
							if (get_field('position')) {
								echo '<p>' . esc_html(get_field('position')) . '</p>';
							}
						}
					}
					wp_reset_postdata();
				} else {
					echo 'No team members at this location';
				}

				?>
			</div>
		</section>

	<?php
	endwhile; // end of the loop
	?>
</main><!-- #main -->
<?php
get_footer();
