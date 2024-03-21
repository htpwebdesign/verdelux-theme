<?php
/**
 * Template name: page-community.php 
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

		endwhile; // End of the loop.
		?>
		<?php
		$args = array(
			'post_type'			=> 'vdx-events',
			'posts_per_page'	=> -1,
			'order'				=> 'ASC',
			

		);
		$query = new WP_Query( $args );
		if( $query -> have_posts()){
			echo '<section>';
			echo '<h2>Upcoming</h2>';
			while ($query -> have_posts()){
				$query -> the_post();
				// the_title();
				echo '<h2>' . esc_html(get_the_title()) . '</h2>';
				echo the_field('description_&_details_'); 
				
			}
			wp_reset_postdata();
			echo '</section>';
		}

		?>

	</main><!-- #main -->

<?php
get_footer();
