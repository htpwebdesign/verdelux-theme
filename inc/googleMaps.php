<?php
function add_map_data()
{
   global $post;
   $fields = get_fields($post->ID);

   $args = array(
      'post_type' => 'vdx-location',
      'posts_per_page' => -1,
   );

   $query = new WP_Query($args);

   if ($query->have_posts()) {
      while ($query->have_posts()) {
         $query->the_post();
         $fields = get_fields($post->ID);

         if ($fields && isset($fields['map_location'])) {
            $map_data = $fields['map_location'];
         } else {
            echo '???';
         }

         wp_localize_script('google-maps', 'mapData', array(
            'lat' => $map_data['lat'],
            'lng' => $map_data['lng'],
            'zoom' => $map_data['zoom']
         ));
      }
   }
   wp_reset_postdata();
}
add_action('wp_enqueue_scripts', 'add_map_data');
