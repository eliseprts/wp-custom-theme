<?php get_header() ?>

<div class="row g-5">
    <div class="col-md-8">

        <?php while (have_posts()) : the_post() ?>

            <h1><?php the_title() ?></h1>

            <div><?php the_content() ?></div>

            <a href="<?= get_post_type_archive_link('post') ?>">Voir les dernières actualités</a>

        <?php endwhile; ?>

    </div>

    <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
            <?= get_sidebar('homepage'); ?>
        </div>
    </div>
</div>

<?php get_footer() ?>