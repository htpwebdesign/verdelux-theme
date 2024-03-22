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
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// endwhile; // End of the loop.
		?>
		<div class="slick-carousel">
			<?php
			$image_ids = get_field('banner_image_carousel');
		
			foreach ($image_ids as $image_id){
				$image_html = wp_get_attachment_image($image_id, 'full');

				if($image_html){
					?>
					<div class="banner-image">
						<?php echo $image_html; ?>
					</div>
					<?php
				}
			}
			?>
			</div>
		
		<div class="menu-tabs">
			<?php
			$terms = get_terms(array(
				'taxonomy' => 'vdx-menu-type',
				'orderby' => 'meta_value_num',
				'order'  => 'ASC',
				'meta_key' => 'menu_order',
				
			));
			foreach ($terms as $term){
				
					echo '<a class="menu-tab" data-filter="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</a>';
				}
				
			
			
			
			
			?>
		
		</div>
		
		
		<?php
		//allergen symbols legend
		echo '<h2>Allergen Symbols</h2>';
		echo '<p>Contain Nuts</p>' . get_template_part('images/peanut');
		echo '<p>Gluten-Free</p>' . get_template_part('images/gluten-free');
		echo '<p>Vegan</p>' . get_template_part('images/vegan');
		echo '<p>Alcohol</p>' . get_template_part('images/alcohol');
		$terms = get_terms(
			array(
				'taxonomy' => 'vdx-menu-type'
			)
		);
		if($terms && ! is_wp_error($terms)){
			foreach($terms as $term){
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
				if($query->have_posts()){
					echo '<section id="'.esc_html($term->slug) .'" class="menu-contents">';
					echo '<h2>' . esc_html($term->name) . '</h2>';
				

					while($query->have_posts()){
						$query->the_post();
						

						if(function_exists('get_field')){
							// $fields = get_fields();
							$dish_image = get_field('dish_image');
							echo '<article>';
							echo wp_get_attachment_image( $dish_image, 'medium' );

							//output title 
							$title = get_the_title();
							echo '<p>' . esc_html($title) . '</p>';
							

							//Ingredients
							if(function_exists('get_field')){
								$dish_ingredients = get_field('dish_ingredients');
								echo $dish_ingredients;
								
							}
							//Allergen symbols
							$dish_legend = get_field('dish_legend');
							if($dish_legend): ?>
							<ul>
								<?php foreach($dish_legend as $legend):
									$url = 'images/' . $legend;
									get_template_part($url);
									?>
								
								
								<?php endforeach; ?>
							</ul>
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
get_sidebar();
get_footer();
