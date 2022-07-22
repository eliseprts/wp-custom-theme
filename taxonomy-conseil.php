<?php get_header() ?>

<h1><?= get_queried_object()->name ?></h1>

<?php get_template_part("parts/taxonomy-nav"); ?>


<?php if (have_posts()) : ?>

    <div class="row mt-5">

        <?php while (have_posts()) : the_post(); ?>

            <div class="col-sm-4 gx-3 gy-3">

                <?php get_template_part("parts/post"); ?>

            </div>

        <?php endwhile; ?>

    </div>

    <div class="row my-5">

        <?php montheme_pagination() ?>

    </div>

<?php else : ?>
    <h1>Il n'y malheureusement pas d'articles...</h1>

<?php endif; ?>

<?php get_footer() ?>