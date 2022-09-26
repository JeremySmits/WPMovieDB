<?php

function load_files(){
    wp_enqueue_style('main_styles', get_stylesheet_uri());
    
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', 
    array(), false, 'all');
    wp_enqueue_style('bootstrap');
}

function add_query_vars_filter( $vars ){
    $vars[] = "category";
    return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

add_action('wp_enqueue_scripts', 'load_css'); ?>