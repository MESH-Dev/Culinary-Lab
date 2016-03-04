<?php

//enqueue scripts and styles *use production assets. Dev assets are located in assets/css and assets/js
function loadup_scripts() {
    wp_enqueue_script( 'skrollr', get_template_directory_uri().'/js/skrollr.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'theme-js', get_template_directory_uri().'/js/mesh.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri().'/js/slick.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'mixitup-js', get_template_directory_uri().'/js/jquery.mixitup.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'sidr', get_template_directory_uri().'/js/jquery.sidr.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'materialize', get_template_directory_uri().'/js/materialize.js', array('jquery'), '1.0.0', true );

	wp_enqueue_style( 'slick-css', get_template_directory_uri().'/css/slick.css', '1.0.0', true );
    wp_enqueue_style( 'sidr-css', get_template_directory_uri().'/css/jquery.sidr.bare.css', '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'loadup_scripts' );

add_image_size('full-size', 2200, true);
add_image_size('study-size', 750, true);

//Register WP Menus
register_nav_menus(
    array(
        'main_nav' => 'Header and breadcrumb trail heirarchy',
        'social_nav' => 'Social menu used throughout'
    )
);

// Register Widget Area for the Sidebar
register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'Sidebar' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'Sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );

//disable code editors
add_theme_support('html5');
add_theme_support('automatic-feed-links');

//Security and header clean-ups
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'wp_generator'); // remove WP version from header
remove_action( 'wp_head','wp_shortlink_wp_head');


?>
