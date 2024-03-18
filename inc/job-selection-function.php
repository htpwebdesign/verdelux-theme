<?php
function job_post_title($form){

   foreach ($form['fields'] as &$field) {
      // Replace 'your_field_id' with your actual field ID
      if ($field->type != 'select' || $field->id != '27') {
         continue;
      }
      
      // Get job posts
      $args = array(
         'post_type' => 'vdx-career',
         'posts_per_page' => -1,
         'orderby' => 'date',
         'order' => 'ASC'
      );
      $job_posts = get_posts($args);
      
      // Create choices array
      $choices = array();
      foreach ($job_posts as $job_post) {
         $choices[] = array('text' => $job_post->post_title, 'value' => $job_post->post_title);
      }
      
      // Set field choices
      $field->choices = $choices;
   }
   
   return $form;
   
}

add_filter('gform_pre_render_1', 'job_post_title');
add_filter('gform_pre_validation_1', 'job_post_title');
add_filter('gform_pre_submission_filter_1', 'job_post_title');
add_filter('gform_admin_pre_render_1', 'job_post_title');