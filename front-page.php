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

    

    <section id="home-header" class="home-custom-header">
        <?php 
        if (get_field('home_banner_image')) {
            $home_image = get_field('home_banner_image');
            $size = 'full';
            $home_image_output = wp_get_attachment_image($home_image, $size);
            echo $home_image_output; // Output the image
        }
        ?>

        <div class="header-content">
            <a class="home-logo" href=<?php echo home_url(); ?>><?php include 'images/logo.php'?></a>
            <?php 
            if (get_field('tagline')) {
                echo '<p class="tagline">' . esc_html(get_field('tagline')) . '</p>';
            }

            $call_to_action = get_field('call_to_action');
            if ($call_to_action) {
                $escaped_call_to_action = esc_url($call_to_action);
                echo '<a href="' . $escaped_call_to_action . '" id="cta" class="call_to_action">Menu</a>'; 
            }
            ?>
        </div>
    </section>

    <section class="vlx_main">
            <section class="about-section vlx__home__about">
                <article class="vlx__home__about__article">
                    <?php
                    // Initialize variables to store image data
                    if (get_field('chef_photo')) {
                        $chef_image = get_field('chef_photo');
                        $size = 'large';
                        $chef_image_output = wp_get_attachment_image($chef_image, $size);
                    echo $chef_image_output; // Output the image
                    }
                    

                    if (get_field('about_restuarant_')) {
                        '<p class="vlx__about_p">' . the_field('about_restuarant_') . '</p>';
                    }
                    ?>
                </article>
            </section>

            <section class="vlx-location-section vlx__home__locations">
                <h2 class=" vlx__home__location--title">Locations</h2>
                    <section class="vlx-location-card">
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
                                <article class="vlx__home__locations--location location-entry-<?php echo $counter; ?>">
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

                                   // Check if any of the fields exist
                                    if (isset($fields['location_name_']) || isset($fields['address']) || isset($fields['phone_number_']) || isset($fields['email'])) {
                                        echo '<div class="location-info">';
                                    }

                                    // Output location name
                                    if (isset($fields['location_name_'])) {
                                        $location_name = $fields['location_name_'];
                                        echo '<div class="location-name">';
                                        echo '<h3 class="vlx__home__locations--name">' . $location_name . '</h3>';
                                        echo '</div>';
                                    }

                                    // Output address
                                    if (isset($fields['address'])) {
                                        $address = $fields['address'];
                                        echo '<div class="location-address">';
                                        echo '<div>';
                                        echo '<p class="vlx__home__locations--address">' . $address . '</p>';
                                        echo '</div>';
                                        echo '</div>';
                                    }

                                    // Output phone number
                                    if (isset($fields['phone_number_'])) {
                                        $phone_number = $fields['phone_number_'];
                                        echo '<div class="location-number">';
                                        echo '<p class="vlx__home__locations--phone">' . $phone_number . '</p>';
                                        echo '</div>';
                                    }

                                    // Output email
                                    if (isset($fields['email'])) {
                                        $email = $fields['email'];
                                        echo '<div class="location-email">';
                                        echo '<a href="mailto:' . $email . '" class="vlx__home__locations--email">' . $email . '</a>';
                                        echo '</div>';
                                    }

                                    // Close the grouping div if any of the fields exist
                                    if (isset($fields['location_name_']) || isset($fields['address']) || isset($fields['phone_number_']) || isset($fields['email'])) {
                                        echo '</div>';
                                    }

                                    ?>
                                </article>
                    <?php
                        endwhile;
                    endif;
                    wp_reset_postdata(); // Reset post data after custom query
                    ?>
                </section>
            </section>

            <section class="vlx__home__testimonials testimonials">
                <h2 class="vlx__home__testimonials--title">Testimonials</h2>

                <section class="vlx__home__testimonials--instagramFeed instagram-feed">
                    <h3 class="vlx__home__testimonials--IGTitle">Instagram</h3>

                    <?php
                    // Output Instagram feed shortcode
                    echo do_shortcode('[instagram-feed feed=1]');
                    ?>
                </section>

                <section class="vlx__home__testimonials--reviews reviews">
                    <h3 class="vlx__home__testimonials--reviewsTitle">Reviews</h3>
                    <section class="vlx_reviews_card">
                        

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
                                <article class="vlx__home__testimonials--review testimonial-entry-<?php echo $testimonial_counter; ?>">
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
                                    echo '<h3 class="vlx__home__testimonials--reviewTitle">' . $value . '</h3>';
                                }
                            
                                if ($key === 'testimonials_text') {
                                    echo '<p class="vlx__home__testimonials--reviewContent">' . $value . '</p>';
                                }
                            
                                if ($key === 'testimonials_rating') {
                                    echo '<p class="vlx__home__testimonials--reviewRating">' . $value . " /5" . '</p>';
                                 
                                }
                            }
                                    ?>
                                </article>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata(); // Reset post data after custom query
                        ?>
                    </section> <!-- End of .reviews card -->
                </section> <!-- End of .reviews -->
            </section> <!-- End of .testimonials -->
        </section> <!-- End of .vlx_main -->
    <?php endwhile // End of the loop. 
    ?>

</main><!-- #main -->

<?php
get_footer();
