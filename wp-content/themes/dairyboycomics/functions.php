<?php

function theme_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {

}
add_action( 'wp_enqueue_scripts', 'theme_js');

function add_bootstrap() {
    wp_register_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), NULL, true );
    wp_register_style( 'bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', false, NULL, 'all' );
 
    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_style( 'bootstrap-css' );
}
add_action( 'wp_enqueue_scripts', 'add_bootstrap' );

//Character Bios CPT

function create_character_bios() {
    $labels = array(
        'name'                => __( 'Characters' ),
        'singular_name'       => __( 'Character' ),
        'menu_name'           => __( 'Characters' ),
        'all_items'           => __( 'All Characters' ),
        'view_item'           => __( 'View Character' ),
        'add_new_item'        => __( 'Add New Character' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Character' ),
        'update_item'         => __( 'Update Character' ),
        'search_items'        => __( 'Search Character' )
    );

    $args = array(
      'label' => 'Characters',
      'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'characters'),
        'query_var' => true,
        'menu_icon' => 'dashicons-id-alt',
        'supports' => array(
            'title',
            'editor',
            'thumbnail'),
        );
    register_post_type( 'characters', $args );
}
add_action( 'init', 'create_character_bios' );

function comic_taxonomy() { 

    register_taxonomy(
        'from_comic',
        'characters',
        array(
            'labels' => array(
                'name' => 'From Comic',
                'add_new_item' => 'Add New Comic',
                'new_item_name' => 'New Comic'
            ),
            'show_ui' => true,
            'hierarchical' => true
        )
    );    

}
add_action ('init', 'comic_taxonomy', 0);

function include_search_form() {
    include "includes/search-form.php";
}