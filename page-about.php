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

<main id="primary" class="vlx__main site-main">


	<?php
	while (have_posts()) :
		the_post();
		get_template_part('template-parts/content', 'page');
	?>
	
		<section class="vlx__about__chef about-chef">
			<?php
			if (function_exists('get_field')) {

				if (get_field('title')) {
					echo '<h2 class="vlx__about__chef--title">' . get_field('title') . '</h2>';
				}
				echo '<div class="vlx__about__chef--content">';
				if (get_field('chef_image')) {
					echo wp_get_attachment_image(
						get_field('chef_image'),
						'large'
					);
				}
				
				if (get_field('chef_about')) {
					echo '<div class="vlx__about__text--container">'; //flex container
					echo '<p class="vlx__about__chef--text">' . get_field('chef_about') . '</p>';
					echo '</div>'; // Close
				}
				echo '</div>';
			}
			?>
		</section>

		<section class="vlx__about__team about-team">

			<?php if (get_field('team_title')) {
				echo '<h2 class="vlx__about__team--title">' . get_field('team_title') . '</h2>';
			} ?>

			<section class="vlx__about__team--tabs filter-tabs">
				<ul class="vlx__about__team__tabs--list">
					<?php
					//display filter tabs for Brisbane and Gold Coast
					$locations = array('brisbane', 'gold-coast');
					foreach ($locations as $location) {
						echo '<li class="vlx__about__team__list--item"><a href="?location=' . $location . '" class="vlx__about__team__item__link">' . ucfirst(str_replace('-', ' ', $location)) . '</a></li>';
					}
					?>
				</ul>
			</section>

			<section class="vlx__about__team--content team-content">
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
					echo '<h3 class="vlx__about__team__content--locationTitle">' . ucfirst(str_replace('-', ' ', $location)) . '</h3>';

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
							echo '<h4 class="vlx__about__team__content--name">' . esc_html(get_the_title()) . '</h4>';

							//output job title 
							if (get_field('position')) {
								echo '<p class="vlx__about__team__content--text">' . esc_html(get_field('position')) . '</p>';
							}
						}
					}
					wp_reset_postdata();
				} else {
					echo 'No team members at this location';
				}

				?>
			</section>
		</section>

	<?php
	endwhile; // end of the loop
	?>
</main><!-- #main -->
<?php
get_footer();
