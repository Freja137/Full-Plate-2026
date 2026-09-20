<?php

/* Opretter en funktion, hvor vi henter teamets css, javaScript, fonte og ikoner */
function fullplate_files()
{
    wp_enqueue_style('roboto-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('playfair-display', '//fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css');
    wp_enqueue_script('main-fullplate-js', get_theme_file_uri('/login-panel.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('fullplate-main-style', get_theme_file_uri('/style.css'));
    wp_enqueue_script('single-recipe-js', get_theme_file_uri('/single-recipe.js'), array(), '1.0', true);
    wp_enqueue_script('fullplate-search-js', get_theme_file_uri('/search.js'), array(), '1.0', true);
}

/* Kalder funktionen fullplate_files */
add_action('wp_enqueue_scripts', 'fullplate_files');

/* Tilføjer wordpress features */
function fullplate_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('recipe-card', 500, 350, true);
}

/* Kalder funktionen fullplate_features */
add_action('after_setup_theme', 'fullplate_features');

/* Ændre main query */
function fullplate_adjust_queries($query)
{
    if (
        !is_admin() &&
        $query->is_main_query() &&
        $query->is_post_type_archive(
            array('recipe', 'story', 'tool')
        )
    ) {
        // Sorteres efter alfabetisk rækkefølge
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', 8);
    }
}

/* Kalder funktionen fullplate_adjust_queries */
add_action('pre_get_posts', 'fullplate_adjust_queries');

// Sender Home Cook væk fra WordPress dashboardet
add_action('admin_init', 'redirectHomeCookToFrontend');

/* Tjekker om brugerrolle er home cook, som sender brugeren til forsiden */
function redirectHomeCookToFrontend()
{
    $currentUser = wp_get_current_user();
    if (count($currentUser->roles) == 1 and $currentUser->roles[0] == 'home_cook') {
        wp_redirect(site_url('/'));
        exit;
    }
}

// Skjul WordPress-adminbaren på frontend
add_filter('show_admin_bar', '__return_false');
