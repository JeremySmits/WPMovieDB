<?php

// Movie Custom Movie Type
function movie_init() {
    // set up movie labels
    $labels = array(
        'name' => 'Movies',
        'singular_name' => 'Movie',
        'add_new' => 'Add New Movie',
        'add_new_item' => 'Add New Movie',
        'edit_item' => 'Edit Movie',
        'new_item' => 'New Movie',
        'all_items' => 'All Movies',
        'view_item' => 'View Movie',
        'search_items' => 'Search Movie',
        'not_found' =>  'No Movies Found',
        'not_found_in_trash' => 'No Movies found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Movies',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'movie'),
        'query_var' => true,
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => array(
            'title',
            'custom-fields'
        ),
    );

	
    register_post_type( 'movie', $args );
    
    // register taxonomy
    register_taxonomy('movie_category', 'movie', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'movie-category' )));
}
add_action( 'init', 'movie_init' );
