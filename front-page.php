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

    endwhile; // End of the loop.
    ?>

    <section class="about-section">
        <?php
        // Initialize variables to store image data
        if (get_field('chef_photo')) {
            $chef_image = get_field('chef_photo');
            $size = 'large';
            $chef_image_output = wp_get_attachment_image($chef_image, $size);
            echo $chef_image_output; // Output the image
        }

        if (get_field('about_restuarant_')) {
            echo '<p>' . get_field('about_restuarant_') . '</p>';
        }
        ?>
    </section>

    <section class="location-section">
        <h2>Locations</h2>
        <?php
        $args = array(
            'post_type'      => 'vdx-location',
            'posts_per_page' => -1
        );
        $location_query = new WP_Query($args);

        if ($location_query->have_posts()) :
            $counter = 0; // Initialize counter variable
            while ($location_query->have_posts()) :
                $location_query->the_post();
                $counter++; // Increment counter for each location entry
        ?>
                <section class="location-entry-<?php echo $counter; ?>">
                    <?php
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
                            echo '<h3>' . $value . '</h3>';
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

                    ?>
                </section>

        <?php
            endwhile;
        endif;
        wp_reset_postdata(); // Reset post data after custom query
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
                'post_type'      => 'vdx-testimonial',
                'posts_per_page' => -1
            );
            $testimonial_query = new WP_Query($args);

            if ($testimonial_query->have_posts()) :
                $testimonial_counter = 0; // Initialize testimonial counter variable

                while ($testimonial_query->have_posts()) :
                    $testimonial_query->the_post();
                    $testimonial_counter++; // Increment testimonial counter for each testimonial entry
            ?>
                    <section class="testimonial-entry-<?php echo $testimonial_counter; ?>">
                        <?php
                        // Get all the ACF fields for the testimonial
                        $fields = get_fields();

                        // Initialize variables to store image data
                        $testimonial_image = get_field('testimonials_image');
                        $testimonial_image_output = '';

                        // Check if image is available
                        if ($testimonial_image) {
                            $size = 'medium';
                            $testimonial_image_output = wp_get_attachment_image($testimonial_image, $size);
                            echo $testimonial_image_output; // Output the image
                        }

                        // Output testimonial fields
                        foreach ($fields as $key => $value) {
                            $field_object = get_field_object($key);
                            $label = $field_object['label'];

                            if ($key === 'name_') {
                                echo '<h3 class=>' . $value . '</h3>';
                            }

                            if ($key === 'testimonials_text') {
                                echo '<p>' . $value . '</p>';
                            }

                            if ($key === 'testimonials_rating') {
                                echo '<p>' . $value . " /5" . '</p>';
                            }
                        }

                        ?>
                    </section>
            <?php
                endwhile;
            endif;
            wp_reset_postdata(); // Reset post data after custom query
            ?>
        </section> <!-- End of .reviews -->
    </section> <!-- End of .testimonials -->
</main><!-- #main -->

<?php
get_footer();
