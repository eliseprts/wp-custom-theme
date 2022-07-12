<?php get_header() ?>

<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <h1><?php the_title() ?></h1>

        <div>
            <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:80%; height:auto;">
        </div>

        <div><?php the_content() ?></div>

<?php endwhile;
endif; ?>

<?php get_footer() ?>