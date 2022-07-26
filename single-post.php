<?php get_header() ?>

<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <h1><?php the_title() ?></h1>

        <!-- Display alert if article is sponsored -->
        <?php if (get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === '1') : ?>
            <div class="alert alert-info">Cette article est sponsorisé</div>
        <?php endif ?>

        <div>
            <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:80%; height:auto;">
        </div>

        <div><?php the_content() ?></div>

        <?php
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>

<?php endwhile;
endif; ?>

<?php get_footer() ?>