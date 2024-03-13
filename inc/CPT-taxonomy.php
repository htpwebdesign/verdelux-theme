<?php
function vdx_register_custom_post_types()
{

   // Events CPT
   $labels = array(
      'name'                  => _x('Events', 'post type general name'),
      'singular_name'         => _x('Event', 'post type singular name'),
      'menu_name'             => _x('Events', 'admin menu'),
      'name_admin_bar'        => _x('Event', 'add new on admin bar'),
      'add_new'               => _x('Add New', 'Event'),
      'add_new_item'          => __('Add New Event'),
      'new_item'              => __('New Event'),
      'edit_item'             => __('Edit Event'),
      'view_item'             => __('View Event'),
      'all_items'             => __('All Events'),
      'search_items'          => __('Search Events'),
      'parent_item_colon'     => __('Parent Events:'),
      'not_found'             => __('No Events found.'),
      'not_found_in_trash'    => __('No Events found in Trash.'),
      'archives'              => __('Event Archives'),
      'insert_into_item'      => __('Insert into Events'),
      'uploaded_to_this_item' => __('Uploaded to this Events'),
      'filter_item_list'      => __('Filter Events list'),
      'items_list_navigation' => __('Events list navigation'),
      'items_list'            => __('Events list'),
      'featured_image'        => __('Events featured image'),
      'set_featured_image'    => __('Set Events featured image'),
      'remove_featured_image' => __('Remove Events featured image'),
      'use_featured_image'    => __('Use as featured image'),
   );
   $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'show_in_nav_menus'  => true,
      'show_in_admin_bar'  => true,
      'show_in_rest'       => true,
      'query_var'          => true,
      'rewrite'            => array('slug' => 'event'),
      'capability_type'    => 'post',
      'has_archive'        => false,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'menu_icon'          => 'dashicons-calendar-alt',
      'supports'           => array('title'),
   );
   register_post_type('vdx-events', $args);


   // Teams CPT
   $labels = array(
      'name'                  => _x('Team', 'post type general name'),
      'singular_name'         => _x('Team', 'post type singular name'),
      'menu_name'             => _x('Team', 'admin menu'),
      'name_admin_bar'        => _x('Teams', 'add new on admin bar'),
      'add_new'               => _x('Add New', 'Teams'),
      'add_new_item'          => __('Add New Team'),
      'new_item'              => __('New Team'),
      'edit_item'             => __('Edit Team'),
      'view_item'             => __('View Team'),
      'all_items'             => __('All Team'),
      'search_items'          => __('Search Team'),
      'parent_item_colon'     => __('Parent Team:'),
      'not_found'             => __('No Team found.'),
      'not_found_in_trash'    => __('No Team found in Trash.'),
      'archives'              => __('Team Archives'),
      'insert_into_item'      => __('Insert into Team'),
      'uploaded_to_this_item' => __('Uploaded to this Team'),
      'filter_item_list'      => __('Filter Team list'),
      'items_list_navigation' => __('Team list navigation'),
      'items_list'            => __('Team list'),
      'featured_image'        => __('Team featured image'),
      'set_featured_image'    => __('Set Team featured image'),
      'remove_featured_image' => __('Remove Team featured image'),
      'use_featured_image'    => __('Use as featured image'),
   );
   $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'show_in_nav_menus'  => true,
      'show_in_admin_bar'  => true,
      'show_in_rest'       => true,
      'query_var'          => true,
      'rewrite'            => array('slug' => 'team'),
      'capability_type'    => 'post',
      'has_archive'        => false,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'menu_icon'          => 'dashicons-businessperson',
      'supports'           => array('title'),
   );
   register_post_type('vdx-team', $args);


   // Menu Items CPT
   $labels = array(
      'name'                  => _x('Menu Items', 'post type general name'),
      'singular_name'         => _x('Menu Item', 'post type singular name'),
      'menu_name'             => _x('Menu Item', 'admin menu'),
      'name_admin_bar'        => _x('Menu Item', 'add new on admin bar'),
      'add_new'               => _x('Add New', 'Menu Item'),
      'add_new_item'          => __('Add New Menu Items'),
      'new_item'              => __('New Menu Items'),
      'edit_item'             => __('Edit Menu Items'),
      'view_item'             => __('View Menu Items'),
      'all_items'             => __('All Menu Items'),
      'search_items'          => __('Search Menu Items'),
      'parent_item_colon'     => __('Parent Menu Items:'),
      'not_found'             => __('No Menu Items found.'),
      'not_found_in_trash'    => __('No Menu Items found in Trash.'),
      'archives'              => __('Menu Items Archives'),
      'insert_into_item'      => __('Insert into Menu Items'),
      'uploaded_to_this_item' => __('Uploaded to this Menu Items'),
      'filter_item_list'      => __('Filter Menu Items list'),
      'items_list_navigation' => __('Menu Items list navigation'),
      'items_list'            => __('Menu Items list'),
      'featured_image'        => __('Menu Items featured image'),
      'set_featured_image'    => __('Set Menu Items featured image'),
      'remove_featured_image' => __('Remove Menu Items featured image'),
      'use_featured_image'    => __('Use as featured image'),
   );
   $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'show_in_nav_menus'  => true,
      'show_in_admin_bar'  => true,
      'show_in_rest'       => true,
      'query_var'          => true,
      'rewrite'            => array('slug' => 'menu-items'),
      'capability_type'    => 'post',
      'has_archive'        => false,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'menu_icon'          => 'dashicons-menu',
      'supports'           => array('title'),
   );
   register_post_type('vdx-menu-item', $args);


   // Careers CPT
   $labels = array(
      'name'                  => _x('Careers', 'post type general name'),
      'singular_name'         => _x('Career', 'post type singular name'),
      'menu_name'             => _x('Careers', 'admin menu'),
      'name_admin_bar'        => _x('Career', 'add new on admin bar'),
      'add_new'               => _x('Add New', 'Career'),
      'add_new_item'          => __('Add New Career'),
      'new_item'              => __('New Career'),
      'edit_item'             => __('Edit Career'),
      'view_item'             => __('View Career'),
      'all_items'             => __('All Careers'),
      'search_items'          => __('Search Careers'),
      'parent_item_colon'     => __('Parent Careers:'),
      'not_found'             => __('No Careers found.'),
      'not_found_in_trash'    => __('No Careers found in Trash.'),
      'archives'              => __('Careers Archives'),
      'insert_into_item'      => __('Insert into Careers'),
      'uploaded_to_this_item' => __('Uploaded to this Careers'),
      'filter_item_list'      => __('Filter Careers list'),
      'items_list_navigation' => __('Careers list navigation'),
      'items_list'            => __('Careers list'),
      'featured_image'        => __('Careers featured image'),
      'set_featured_image'    => __('Set Careers featured image'),
      'remove_featured_image' => __('Remove Careers featured image'),
      'use_featured_image'    => __('Use as featured image'),
   );
   $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'show_in_nav_menus'  => true,
      'show_in_admin_bar'  => true,
      'show_in_rest'       => true,
      'query_var'          => true,
      'rewrite'            => array('slug' => 'careers'),
      'capability_type'    => 'post',
      'has_archive'        => false,
      'hierarchical'       => false,
      'menu_position'      => 6,
      'menu_icon'          => 'dashicons-businessman',
      'supports'           => array('title'),
   );
   register_post_type('vdx-career', $args);

   // Locations CPT
   $labels = array(
      'name'                  => _x('Locations', 'post type general name'),
      'singular_name'         => _x('Location', 'post type singular name'),
      'menu_name'             => _x('Locations', 'admin menu'),
      'name_admin_bar'        => _x('Location', 'add new on admin bar'),
      'add_new'               => _x('Add New', 'Location'),
      'add_new_item'          => __('Add New Location'),
      'new_item'              => __('New Location'),
      'edit_item'             => __('Edit Location'),
      'view_item'             => __('View Location'),
      'all_items'             => __('All Locations'),
      'search_items'          => __('Search Locations'),
      'parent_item_colon'     => __('Parent Locations:'),
      'not_found'             => __('No Locations found.'),
      'not_found_in_trash'    => __('No Locations found in Trash.'),
      'archives'              => __('Locations Archives'),
      'insert_into_item'      => __('Insert into Location'),
      'uploaded_to_this_item' => __('Uploaded to this Location'),
      'filter_item_list'      => __('Filter Locations list'),
      'items_list_navigation' => __('Locations list navigation'),
      'items_list'            => __('Locations list'),
      'featured_image'        => __('Locations featured image'),
      'set_featured_image'    => __('Set Locations featured image'),
      'remove_featured_image' => __('Remove Locations featured image'),
      'use_featured_image'    => __('Use as featured image'),
   );
   $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'show_in_nav_menus'  => true,
      'show_in_admin_bar'  => true,
      'show_in_rest'       => true,
      'query_var'          => true,
      'rewrite'            => array('slug' => 'locations'),
      'capability_type'    => 'post',
      'has_archive'        => false,
      'hierarchical'       => false,
      'menu_position'      => 4,
      'menu_icon'          => 'dashicons-location',
      'supports'           => array('title'),
   );
   register_post_type('vdx-location', $args);


   // Testimonials CPT
   $labels = array(
      'name'                  => _x('Testimonials', 'post type general name'),
      'singular_name'         => _x('Testimonial', 'post type singular name'),
      'menu_name'             => _x('Testimonials', 'admin menu'),
      'name_admin_bar'        => _x('Testimonial', 'add new on admin bar'),
      'add_new'               => _x('Add New', 'Testimonial'),
      'add_new_item'          => __('Add New Testimonial'),
      'new_item'              => __('New Testimonial'),
      'edit_item'             => __('Edit Testimonial'),
      'view_item'             => __('View Testimonial'),
      'all_items'             => __('All Testimonials'),
      'search_items'          => __('Search Testimonials'),
      'parent_item_colon'     => __('Parent Testimonials:'),
      'not_found'             => __('No Testimonials found.'),
      'not_found_in_trash'    => __('No Testimonials found in Trash.'),
      'archives'              => __('Testimonials Archives'),
      'insert_into_item'      => __('Insert into Testimonial'),
      'uploaded_to_this_item' => __('Uploaded to this Testimonial'),
      'filter_item_list'      => __('Filter Testimonials list'),
      'items_list_navigation' => __('Testimonials list navigation'),
      'items_list'            => __('Testimonials list'),
      'featured_image'        => __('Testimonials featured image'),
      'set_featured_image'    => __('Set Testimonials featured image'),
      'remove_featured_image' => __('Remove Testimonials featured image'),
      'use_featured_image'    => __('Use as featured image'),
   );
   $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'show_in_nav_menus'  => true,
      'show_in_admin_bar'  => true,
      'show_in_rest'       => true,
      'query_var'          => true,
      'rewrite'            => array('slug' => 'testimonials'),
      'capability_type'    => 'post',
      'has_archive'        => false,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'menu_icon'          => 'dashicons-format-quote',
      'supports'           => array('title', 'editor'),
   );
   register_post_type('vdx-testimonial', $args);
}
add_action('init', 'vdx_register_custom_post_types');

// Taxonomy Function
function vdx_register_taxonomies()
{
   // Location Taxonomy
   $labels = array(
      'name'              => _x('Location Categories', 'taxonomy general name'),
      'singular_name'     => _x('Location Category', 'taxonomy singular name'),
      'search_items'      => __('Search Location Categories'),
      'all_items'         => __('All Location Categories'),
      'parent_item'       => __('Parent Location Category'),
      'parent_item_colon' => __('Parent Location Category:'),
      'edit_item'         => __('Edit Location Category'),
      'update_item'       => __('Update Location Category'),
      'add_new_item'      => __('Add New Location Category'),
      'new_item_name'     => __('New Location Category Name'),
      'menu_name'         => __('Location Categories'),
   );
   $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_in_menu'      => true,
      'show_in_nav_menus' => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array('slug' => 'location-category'),
   );
   register_taxonomy('vdx-location-category', array('vdx-location','vdx-team', 'vdx-career'), $args);

   // Menu Taxonomy
   $labels = array(
      'name'              => _x('Menu Types', 'taxonomy general name'),
      'singular_name'     => _x('Menu Type', 'taxonomy singular name'),
      'search_items'      => __('Search Menu Types'),
      'all_items'         => __('All Menu Types'),
      'parent_item'       => __('Parent Menu Type'),
      'parent_item_colon' => __('Parent Menu Type:'),
      'edit_item'         => __('Edit Menu Type'),
      'update_item'       => __('Update Menu Type'),
      'add_new_item'      => __('Add New Menu Type'),
      'new_item_name'     => __('New Menu Type Name'),
      'menu_name'         => __('Menu Types'),
   );
   $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_in_menu'      => true,
      'show_in_nav_menus' => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array('slug' => 'menu-type'),
   );
   register_taxonomy('vdx-menu-type', array('vdx-menu-item'), $args);
}
add_action('init', 'vdx_register_taxonomies');

// Flush rewrite rules on activation
function vdx_rewrite_flush()
{
   vdx_register_custom_post_types();
   vdx_register_taxonomies();
   flush_rewrite_rules();
}
add_action('after_switch_theme', 'vdx_rewrite_flush');
