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

        get_template_part('template-parts/content', 'page');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

	<section class="location-section">
    <?php
    $args = array(
        'post_type'      => 'vdx-location',
        'posts_per_page' => -1
    );
    $location_query = new WP_Query($args);

    if ($location_query->have_posts()) :
        while ($location_query->have_posts()) :
            $location_query->the_post();

            // Get all the ACF fields for the post
            $fields = get_fields();

            // Initialize variables to store image data
            $image = get_field('location_image');
            $image_output = '';

            // Check if image is available
            if ($image) {
                $size = 'large';
                $image_output = wp_get_attachment_image($image, $size);
                echo $image_output; // Output the image
            }

            // Output other fields except email
            foreach ($fields as $key => $value) {
                $field_object = get_field_object($key);
                $label = $field_object['label'];

                if ($key === 'location_name_') {
                    echo '<h2>' . $value . '</h2>';
                }

                if ($key === 'address') {
                    echo '<p>' . $value . '</p>';
                }

                if ($key === 'phone_number_') {
                    echo '<p>' . $value . '</p>';
                }
            }

            // Output the email
            if (isset($fields['email'])) {
                echo '<a href="mailto:' . $fields['email'] . '">' . $fields['email'] . '</a>';
            }

            // Add a line break after each location
            echo '<br>';

        endwhile;
    endif;
    ?>
	</section>

	<section class="testimonials">
		<h2>Testimonials</h2>

		<section class="instagram-feed">
			<h3>Instagram</h3>

			<?php
			// Output Instagram feed shortcode
			echo do_shortcode('[instagram-feed feed=1]');
			?>
		</section>

		<section class="reviews">
			<h3>Reviews</h3>

			<?php
				$args = array(
					'post_type'			=> 'vdx-testimonial',
					'posts_per_page'	=> -1
				);
				$testimonial_query = new WP_Query($args);

				if ($testimonial_query->have_posts()) :
					while ($testimonial_query->have_posts()) :
						$testimonial_query->the_post();

						// Get all the ACF fields for the post
						$fields = get_fields();

						// Initialize variables to store image data
						$testimonial_image = get_field('testimonials_image');
						$testimonial_image_output = '';

						// Check if image is available
						if ($testimonial_image) {
							$size = 'medium';
							echo $image_output = wp_get_attachment_image($testimonial_image,$size);
						}

						// Output fields
						foreach ($fields as $key => $value) {
							$field_object = get_field_object($key);
							$label = $field_object['label'];

							if ($key === 'name_') {
								echo '<h3>' . $value . '</h3>';
							}

							if ($key === 'testimonials_text') {
								echo '<p>' . $value . '</p>';
							}

							if ($key === 'testimonials_rating') {
								echo '<p>' . $value . '</p>';
							}

						}

					endwhile;
				endif;
			?>
		</section>
	</section>
</main><!-- #main -->

<?php
get_footer();
