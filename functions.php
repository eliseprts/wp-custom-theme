<!-- Code executed each time theme is loaded -->
<?php

// Loading of CommentWalker.php
require_once('/Applications/MAMP/htdocs/go-immo/wp-content/themes/montheme/walker/CommentWalker.php');
// Customize API (chap 27)
require_once('/Applications/MAMP/htdocs/go-immo/wp-content/themes/montheme/options/apparence.php');

function montheme_supports()
{
    // To display dynamic title
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    // To add menu
    add_theme_support('menus');
    // To support html5
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
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
    // if (!is_customize_preview()) {
    //     wp_deregister_script('jquery');
    //     wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.slim.min.js', [], false, true);
    // }
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


function montheme_init()
{
    // Add a new taxonomy
    register_taxonomy('conseil', 'post', [
        'labels' => [
            'name' => 'Conseils',
            'singular_name' => 'Conseil',
            'plural_name' => 'Conseils',
            'search_items' => 'Rechercher des conseils',
            'all_items' => 'Tous les conseils',
            'edit_item' => 'Editer le conseil',
            'update_item' => 'Mettre à jour le conseil',
            'add_new_item' => 'Ajouter un nouveau conseil',
            'new_item_name' => 'Ajouter un nouveau conseil',
            'menu_name' => 'Conseils',
        ],
        // To show in post editor
        'show_in_rest' => true,
        // To display on checkbox format
        'hierarchical' => true,
        // Add a column with taxonomy in articles panel in dashboard
        'show_admin_column' => true
    ]);
    // Add a new custom post type
    register_post_type('bien', [
        'labels' => [
            'name' => 'Biens',
            'singular_name' => 'Bien',
            'plural_name' => 'Biens',
            'add_new_item' => 'Ajouter un nouveau bien',
            'edit_item' => 'Editer le bien',
            'all_items' => 'Tous les biens',
            'menu_name' => 'Biens',
            'view_item' => 'Voir le bien',
            'view_items' => 'Voir les biens'
        ],
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-building',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
        'has_archive' => true,
    ]);
}

add_action('init', 'montheme_init');
add_action('after_setup_theme', 'montheme_supports');
add_action('wp_enqueue_scripts', 'montheme_register_assets');
add_filter('document_title_separator', 'montheme_title_separator');
// add_filter('document_title_parts', 'montheme_document_title_parts');
add_filter('nav_menu_css_class', 'montheme_menu_class');
add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');

// Add sponso metadata
require_once('/Applications/MAMP/htdocs/go-immo/wp-content/themes/montheme/metaboxes/sponso.php');
// Add add options to Settings menu
require_once('/Applications/MAMP/htdocs/go-immo/wp-content/themes/montheme/options/agence.php');

SponsoMetaBox::register();
AgenceMenuPage::register();

// Add a column to the list of all Biens posts
add_filter('manage_bien_posts_columns', function ($columns) {
    return [
        'cb' => $columns['cb'],
        'thumbnail' => 'Miniature',
        'title' => $columns['title'],
        'date' => $columns['date']
    ];
});
add_filter('manage_bien_posts_custom_column', function ($column, $postid) {
    if ($column === 'thumbnail') {
        the_post_thumbnail('thumbnail', $postid);
    }
}, 10, 2);
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('admin_montheme', get_template_directory_uri() . '/assets/admin.css');
});

// Add a column 'sponso' to the list of all posts
add_filter('manage_post_posts_columns', function ($columns) {
    $newColumns = [];
    foreach ($columns as $k => $v) {
        if ($k === 'date') {
            $newColumns['sponso'] = 'Article sponsorisé ?';
        }
        $newColumns[$k] = $v;
    }
    return $newColumns;
});
add_filter('manage_post_posts_custom_column', function ($column, $postid) {
    if ($column === 'sponso') {
        if (!empty(get_post_meta($postid, SponsoMetaBox::META_KEY, true))) {
            $class = 'yes';
        } else {
            $class = 'no';
        }
        echo '<div class="bullet bullet-' . $class . '"></div>';
    }
}, 10, 2);

// pre_get_posts action (chap 22)
function montheme_pre_get_posts(WP_Query $query)
{
    if (is_admin() || !is_search() || !$query->is_main_query()) {
        return;
    }
    if (get_query_var('sponso') === '1') {
        $meta_query = $query->get('meta_query', []);
        $meta_query[] = [
            'key' => SponsoMetaBox::META_KEY,
            'compare' => 'EXIST',
        ];
        $query->set('meta_query', $meta_query);
    }
}
function montheme_query_vars($params)
{
    $params[] = 'sponso';
    return $params;
}
add_action('pre_get_posts', 'montheme_pre_get_posts');
add_filter('query_vars', 'montheme_query_vars');

// Sidebars (chap 23) + Widget (chap 24)
require_once '/Applications/MAMP/htdocs/go-immo/wp-content/themes/montheme/widgets/YoutubeWidget.php';
function montheme_register_widget()
{
    register_widget(YoutubeWidget::class);
    register_sidebar([
        'id' => 'homepage',
        'name' => 'Sidebar Accueil',
        'before_widget' => '<div class="p-4 %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="fst-italic">',
        'after_title' => '</h4>'
    ]);
}
add_action('widgets_init', 'montheme_register_widget');
