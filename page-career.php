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
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');
	?>


		<!-- Job Post section -->
		<section class="vlx__career">
			<header class="vlx__career--header">
				<h2 class="vlx__career__header--title"><?php the_field('join_team') ?></h2>
				<p class="vlx__career__header--text"><?php the_field('intro_message') ?></p>
			</header>

			<section class="vlx__career__jobPost--listing">
				<?php
				$args = array(
					'post_type' => 'vdx-career',
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order' => 'ASC'
				);

				$career_post_query = new WP_Query($args);

				if ($career_post_query->have_posts()) :
					while ($career_post_query->have_posts()) : $career_post_query->the_post();
						$description = get_field('description');

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

						echo '<article class="vlx__career__jobPost--post">
							<header class="vlx__career__jobPost__post--header">
								<h3 class="vlx__career__jobPost__post--title"> Position: ' . get_field('job_listing') . '</h3>
								<p class="vlx__career__jobPost__post--location">Location: ' . $location_list . '</p>
							</header>
							<div class=" vlx__career__jobPost__post--description job-description " style="display: none">' . $description . '</div>
							<footer class="vlx__career__jobPost__post--footer">
								<button class="vlx__career__jobPost__post--viewMore view-more"> View Job Posting</button>
							</footer>
						</article>';

					endwhile;
					wp_reset_postdata();
				else :
					echo '<p> No Job Posting Currently</p>';

				endif;
				?>
			</section>
		</section>

		<!-- Job Application section -->
		<section class="vlx__career__application">
			<h2 class="vlx__career__application--title"><?php the_field('form_title') ?></h2>

			<?php
			if (function_exists('gravity_form')) {
				gravity_form(1, false, false, true, null, false, null, true, null, false);
			}
			?>
		</section>

		<section class="vlx__career__apply">
			<h3 class="vlx__career__apply--title"><?php the_field('apply_title') ?></h3>
			<p class="vlx__career__apply--text"><?php the_field('apply_text') ?></p>
			<a href="mailto: <?php the_field('email_link') ?>">Apply With Us </a>
		</section>
	<?php endwhile; ?>
</main><!-- #main -->

<?php
get_footer();
