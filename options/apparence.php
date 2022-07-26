<!-- To add options to the interface where we can customize our theme (chap 27)-->
<?php
add_action('customize_register', function (WP_Customize_Manager $manager) {

    // Add a new section
    $manager->add_section('montheme_apparence', [
        'title' => 'Personnalisation de l\'apparence'
    ]);
    // Add setting
    $manager->add_setting('header_background', [
        'default' => '#FAFAFA',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);
    // Add control
    $manager->add_control(new WP_Customize_Color_Control($manager, 'header_background', [
        'section' => 'montheme_apparence',
        'setting' => 'header_background',
        'label' => 'Couleur de l\'entête'
    ]));
});

add_action('customize_preview_init', function () {
    wp_enqueue_script('montheme_apparence', get_template_directory_uri() . '/assets/apparence.js', ['jquery', 'customize-preview'], '', true);
});
