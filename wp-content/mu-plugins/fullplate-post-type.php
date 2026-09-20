<?php

function fullplate_post_types()
{

    // Recipe Post Type
    register_post_type('recipe', array(
        'capability_type' => 'recipe',
        'map_meta_cap' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'recipes'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Recipes',
            'add_new_item' => 'Add New Recipe',
            'edit_item' => 'Edit Recipe',
            'all_items' => 'All Recipes',
            'singular_name' => 'Recipe'
        ),
        'menu_icon' => 'dashicons-food'
    ));


    // Food Story Post Type
    register_post_type('story', array(
        'capability_type' => 'story',
        'map_meta_cap' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'stories'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Stories',
            'add_new_item' => 'Add New Story',
            'edit_item' => 'Edit Story',
            'all_items' => 'All Stories',
            'singular_name' => 'Story'
        ),
        'menu_icon' => 'dashicons-book'
    ));


    // Tool Post Type
    register_post_type('tool', array(
        'capability_type' => 'tool',
        'map_meta_cap' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'tools'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Tools',
            'add_new_item' => 'Add New Tool',
            'edit_item' => 'Edit Tool',
            'all_items' => 'All Tools',
            'singular_name' => 'Tool'
        ),
        'menu_icon' => 'dashicons-hammer'
    ));


    // Tip Post Type
    register_post_type('tip', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'tips'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Tips',
            'add_new_item' => 'Add New Tip',
            'edit_item' => 'Edit Tip',
            'all_items' => 'All Tips',
            'singular_name' => 'Tip'
        ),
        'menu_icon' => 'dashicons-lightbulb'
    ));
}

add_action('init', 'fullplate_post_types');
