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
	while (have_posts()) :
		the_post();

		if (has_post_thumbnail()) {
			// the_post_thumbnail();
		}
		get_template_part('template-parts/content', 'page');

	endwhile; // End of the loop.
	?>

	<!-- Job Post section -->
	<section>
		<div>
			<h2><?php the_field('join_team') ?></h2>
			<p><?php the_field('intro_message') ?></p>
		</div>

		<section>
			<?php
			$args = array(
				'post_type' => 'vdx-career',
				'post_per_page' => -1,
				'orderby' => 'date',
				'order' => 'ASC'
			);

			$career_post_query = new WP_Query($args);

			if ($career_post_query->have_posts()) :
				while ($career_post_query->have_posts()) : $career_post_query->the_post();
					$description = get_field('description');
					$excerpt = substr($description, 0, 0);

					// Location taxonomy
					$locations = get_the_terms(get_the_ID(), 'vdx-location-category');
					$location_names = array();
					if ($locations) {
						foreach ($locations as $location) {
							if (is_object($location) && property_exists($location, 'name')) {
								$location_names[] = $location->name;
							}
						}
					}
					$location_list = implode(', ', $location_names);

					echo '<article>';
					echo '<h3> Position: ' . get_field('job_listing') . '</h3>';
					echo '<p>Location: ' . $location_list . '</p>';
					// echo '<p>' . the_field('description') . '</p>';
					'<p class="job-description" data-full="' . $description . '">' . $excerpt . '</p>';
					echo '<button class="view-more"> View Job Posting</button>';
					echo '</article>';

				endwhile;
				wp_reset_postdata();
			else :
				echo '<p> No Job Posting Currently</p>';

			endif;
			?>
		</section>
	</section>

	<!-- Job Application section -->
	<section>
		<h2><?php the_field('form_title') ?></h2>

		<?php
		if (function_exists('gravity_form')) {
			gravity_form(1, false, false, true, null, false, null, true, null, false);
		}
		?>
	</section>

	<section>
		<h2><?php the_field('apply_title') ?></h2>
		<p><?php the_field('apply_text') ?></p>
		<a href="mailto: <?php the_field('email_link') ?>">Apply With Us </a>
	</section>

</main><!-- #main -->

<?php
get_footer();
?>