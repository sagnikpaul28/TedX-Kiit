<?php
/*
===================================================================
Activate CSS and JS files
===================================================================
*/

function style_enqueue(){
    
    wp_enqueue_style('bootstrapcss', get_template_directory_uri().'/css/bootstrap.min.css', array(), '', 'all');
    wp_enqueue_style('customstyle', get_template_directory_uri().'/css/index.css', array(), '1.0.0', 'all');
}

wp_enqueue_script('jquery');


function script_enqueue(){
    
    wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array(), '1.0.0', true); 
    wp_enqueue_script('customscript', get_template_directory_uri().'/js/index.js', array(), '1.0.0', true); 
    
    
}

add_action('wp_enqueue_scripts', 'style_enqueue');
add_action('wp_enqueue_scripts', 'script_enqueue');



/*
===================================================================
Activate Theme Supports
===================================================================
*/


function theme_supports(){
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    add_theme_support('menus');
    
    
    register_nav_menu('primary', 'Primary Header Navigation');

}

add_action('init', 'theme_supports');


/*
===================================================================
Include Walker Class
===================================================================
*/

require get_template_directory() . '/nav_walker.php';