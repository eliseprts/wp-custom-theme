<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Delete tag <title> and create functions.php -->
    <!-- To display admin bar -->
    <?php wp_head() ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow" style="background-color: <?= get_theme_mod('header_background'); ?>!important">
        <div class="container-fluid">
            <a class="navbar-brand text-uppercase" href="/go-immo">
                <?php bloginfo('name') ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                    'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0'
                ]) ?>
                <?= get_search_form() ?>
            </div>
        </div>
    </nav>

    <div class="container">