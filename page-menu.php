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

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
	<div class="slick-carousel">
		<?php
		$image_ids = array(137, 139, 200);

		//filter value from URL
		$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

		// Grab the filter value from the URL
		$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

		foreach ($image_ids as $image_id) {
			// Check if the image should be displayed based on the filter
			if ($filter === '' || has_term($filter, 'vdx-menu-type', $image_id)) {
				$image_url = wp_get_attachment_image_src($image_id, 'full');
				if ($image_url) {
					echo '<img src="' . $image_url[0] . '" alt="Image ' . $image_id . '">';
				}
			}
		}
		?>


	</div>
	<div class="menu-tabs">
		<a class="menu-tab" data-filter="chefs-special" id="chef-menu">Chef's Special</a>
		<a class="menu-tab" data-filter="appetizers">Appetizers</a>
		<a class="menu-tab" data-filter="soups-and-salads">Soups and Salads</a>
		<a class="menu-tab" data-filter="pizza">Pizza</a>
		<a class="menu-tab" data-filter="dessert">Dessert</a>
		<div class="menu-dropdown">
			<a class="menu-tab">Wines</a>
			<div class="menu-dropdown-content">
				<a class="menu-tab" data-filter="red-wines">Red Wines</a>
				<a class="menu-tab" data-filter="white-wines">White Wines</a>
			</div>
		</div>
	</div>
	<!-- <div class="menu-tabs">
		<?php
		$terms = get_terms(array(
			'taxonomy' => 'vdx-menu-type',
			'hide_empty' => false, // Set to true if you want to hide empty terms
		));

		if ($terms && !is_wp_error($terms)) {
			foreach ($terms as $term) {
				echo '<a class="menu-tab" data-filter="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</a>';
			}
		}
		?>
		</div> -->

	<?php
	echo '<section>';
	//allergen symbols legend
	echo '<h2>Allergen Symbols</h2>';
	echo '<div> <p>Contain Nuts</p> <span>' . get_template_part('images/peanut') . '</span> </div>';
	echo '<p>Gluten-Free</p>' . get_template_part('images/gluten-free');
	echo '<p>Vegan</p>' . get_template_part('images/vegan');
	echo '<p>Alcohol</p>' . get_template_part('images/alcohol');
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
				echo '<section id="' . esc_html($term->slug) . '" class="menu-contents">';
				echo '<h2>' . esc_html($term->name) . '</h2>';


				while ($query->have_posts()) {
					$query->the_post();


					if (function_exists('get_field')) {
						// $fields = get_fields();
						$dish_image = get_field('dish_image');
						echo '<article>';
						echo wp_get_attachment_image($dish_image, 'medium');

						//output title 
						$title = get_the_title();
						echo '<h3>' . esc_html($title) . '</h3>';


						//Ingredients
						if (function_exists('get_field')) {
							$dish_ingredients = get_field('dish_ingredients');
							echo '<p>' . $dish_ingredients . '</p>';
						}
						//Allergen symbols
						$dish_legend = get_field('dish_legend');
						if ($dish_legend) : ?>
							<object>
								<?php foreach ($dish_legend as $legend) :
									$url = 'images/' . $legend;
									get_template_part($url);
								?>
								<?php endforeach; ?>
							</object>
	<?php endif;
						echo '</article>';
					}
				}
				echo '</section>';
			}
		}
	}
		endwhile;
	?>
		

</main><!-- #main -->

<?php
get_footer();
