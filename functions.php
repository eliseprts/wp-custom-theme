<!-- Code executed each time theme is loaded -->
<?php

// Function to display dynamic title
function montheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

// Function to use Bootstrap
function montheme_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js', ['popper'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

// Change title separator
function montheme_title_separator()
{
    return '•';
}

// // Remove tagline from title
// function montheme_document_title_parts ($title) {
//     unset($title['tagline']);
//     return $title;
// }

add_action('after_setup_theme', 'montheme_supports');
add_action('wp_enqueue_scripts', 'montheme_register_assets');
add_filter('document_title_separator', 'montheme_title_separator');
    // add_filter('document_title_parts', 'montheme_document_title_parts');
