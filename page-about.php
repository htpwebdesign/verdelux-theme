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
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'page' );
		?>
		
		<section class="about-chef">
			
			<?php
				if (function_exists( 'get_field' )) {

					if ( get_field( 'title' ) ) {
						echo '<h1>';
							the_field( 'title' );
						echo '</h1>';
					}
					
					if (get_field('chef_image') ) {
						echo wp_get_attachment_image(
							get_field( 'chef_image' ),
							'medium', '', array( 'class' => 'alignleft')
						);
					}
					
					if ( get_field( 'chef_about' ) ) {
						echo '<p>';
							the_field( 'chef_about' );
						echo '</p>';
					}

					//output Team header title 
					if ( get_field( 'team_text' ) ) {
						echo '<h2>';
							the_field( 'team_text' );
						echo '</h2>';
					}
				}
			?>
		</section>

		<section class="about-team">
				<?php
					$taxonomy = 'vdx-location-category';
					$terms    = get_terms(
						array(
							'taxonomy' => $taxonomy
						)
					);
					if($terms && ! is_wp_error($terms) ){
						foreach($terms as $term){
							$args = array(	
								'post_type'      => 'vdx-team',
								'posts_per_page' => -1,
								'order'          => 'ASC',
								'orderby'        => 'title',
								'tax_query'      => array(
									array(
										'taxonomy' => $taxonomy,
										'field'    => 'slug',
										'terms'    => $term->slug,
									)
								),
							);
							$query = new WP_Query( $args );

							if ( $query -> have_posts() ) {
								//Output Term name. (locations: Brisbane or Gold Coast)
								echo '<h2>' . esc_html( $term->name ) . '</h2>';
								
								//wp_reset_postdata();

								// Output Content.
								while ( $query -> have_posts() ) {
									$query -> the_post();
									
									if ( function_exists( 'get_field' ) ) {
										
										//team member image
										if (get_field('member_image_') ) {
											echo wp_get_attachment_image(
												get_field( 'member_image_' ), 'medium'
											);
										}

										//team member name
										echo '<h3>' . esc_html(get_the_title()) . '</h3>';
										
										// job title 
										/*if ( get_field( 'position' ) ) {
											echo '<p>';
												the_field( 'position' );
											echo '</p>';
										}*/
										if (get_field('position')) {
											echo '<p>' . esc_html(get_field('position')) . '</p>';
										}
									}
								}
								wp_reset_postdata();
							}
						}
					}
				?>
		</section>
        
		<?php
			endwhile; // End of the loop.
		?>


	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
