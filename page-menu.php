<?php

/**
 * Template name: page-menu.php
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
		<div class="vlx__menu--carousel slick-carousel">
			<?php
			$image_ids = get_field('banner_image_carousel');

			foreach ($image_ids as $image_id) {
				$image_html = wp_get_attachment_image($image_id, 'full');

				if ($image_html) {
			?>
					<div class="banner-image">
						<?php echo $image_html; ?>
					</div>
			<?php
				}
			}
			?>
		</div>

		<section class="vlx__menu--tabs menu-tabs">
			<?php
			$terms = get_terms(array(
				'taxonomy' => 'vdx-menu-type',
				'orderby' => 'meta_value_num',
				'order'  => 'ASC',
				'meta_key' => 'menu_order',

			));
			echo '<ul class="vlx__menu__tabs--list" aria-label="Menu category tabs">';
			foreach ($terms as $term) {
				echo '<li class="vlx__menu__tabs--item">';
				echo '<a class="vlx__menu__tabs--link menu-tab" data-filter="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</a>';
				echo '</li>';
			}
			echo '</ul>';
			?>

		</section>

		<?php
		//allergen symbols legend
		echo '<section class="vlx__menu--allergen">';
		echo '<h2 class="vlx__menu__allergen--title">Allergen Symbols</h2>';

		$allergens = array(
			"Contain Nuts" => 'images/peanut',
			"Gluten-Free" => 'images/gluten-free',
			"Vegan" => 'images/vegan',
			"Alcohol" => 'images/alcohol'
		);

		echo '<div class="vlx__menu__allergen--container">';
		foreach ($allergens as $allergen => $image) {
			echo '<div class="vlx__menu__allergen--item">';
			echo '<p class="vlx__menu__allergen--text">' . $allergen . '</p>' . get_template_part($image);
			echo '</div>';
		}
		echo '</div>';

		echo '</section>';

		$terms = get_terms(
			array(
				'taxonomy' => 'vdx-menu-type'
			)
		);
		if ($terms && !is_wp_error($terms)) {
			foreach ($terms as $term) {
				$args = array(
					'post_type' => 'vdx-menu-item',
					'posts_per_page' => -1,
					'order'	=> 'ASC',
					'orderby' => 'title',
					'tax_query' => array(
						array(
							'taxonomy' => 'vdx-menu-type',
							'field'	=> 'slug',
							'terms' => $term->slug,
						)
					)
				);

				$query = new WP_Query($args);
				if ($query->have_posts()) {
					echo '<section id="' . esc_html($term->slug) . '" class="vlx__menu__category menu-contents">';
					echo '<h2 class="vlx__menu__category--title">' . esc_html($term->name) . '</h2>';

					echo '<div class="vlx__menu__category__container">';
					while ($query->have_posts()) {
						$query->the_post();

						if (function_exists('get_field')) {
							// $fields = get_fields();
							$dish_image = get_field('dish_image');
							echo '<article class="vlx__menu__category--item">';
							echo wp_get_attachment_image($dish_image, 'medium');

							//output title 
							$title = get_the_title();
							echo '<p class="vlx__menu__category__item--text">' . esc_html($title) . '</p>';

							//Ingredients
							if (function_exists('get_field')) {
								$dish_ingredients = get_field('dish_ingredients');
								echo '<p>' . $dish_ingredients . '</p>';
							}

							//Allergen symbols
							$dish_legend = get_field('dish_legend');
							if ($dish_legend) : ?>
								<ul class="vlx__menu__category__item--allergen">
									<?php foreach ($dish_legend as $legend) :
										$url = 'images/' . $legend;
										get_template_part($url);
									?>

									<?php endforeach; ?>
								</ul>
	<?php endif;
							echo '</article>';
						}
					}
					echo '</div>';
					echo '</section>';
				}
			}
		}
	endwhile;
	?>


</main><!-- #main -->

<?php
get_footer();
