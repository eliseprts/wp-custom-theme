<!-- Code executed each time theme is loaded -->
<?php

function montheme_supports()
{
    // To display dynamic title
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    // To add menu
    add_theme_support('menus');
    // To place the header menu
    register_nav_menu('header', 'En tête du menu');
    // To place the footer menu
    register_nav_menu('footer', 'Pied de page');
    // To add a new image format
    add_image_size('post-thumbnail', 350, 215, true);
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

// Change classes of menu items
function montheme_menu_class($classes)
{
    $classes[] = 'nav-item';
    return $classes;
}

// Change classes of menu links
function montheme_menu_link_class($attrs)
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}

// Pagination layout
function montheme_pagination()
{
    $pages = paginate_links(['type' => 'array']);
    // If no page : there is no pagination displaying
    if ($pages === null) {
        return;
    }
    // Of pages : display a pagination
    echo '<nav aria-label="pagination">';
    echo '<ul class="pagination">';
    foreach ($pages as $page) {
        $active = strpos($page, 'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class = ' active';
        }
        echo '<li class="' . $class . '">';
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
}

add_action('after_setup_theme', 'montheme_supports');
add_action('wp_enqueue_scripts', 'montheme_register_assets');
add_filter('document_title_separator', 'montheme_title_separator');
// add_filter('document_title_parts', 'montheme_document_title_parts');
add_filter('nav_menu_css_class', 'montheme_menu_class');
add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');

// Add sponso metadata
require_once('/Applications/MAMP/htdocs/go-immo/wp-content/themes/montheme/metaboxes/sponso.php');
SponsoMetaBox::register();
