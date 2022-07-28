<?php get_header() ?>

<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <h1 class="mt-5 mb-5"><?php the_title() ?></h1>

        <div>
            <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:80%; height:auto;">
        </div>

        <div class="mb-5"><?php the_content() ?></div>

        <!-- Informations -->
        <div class="card text-dark bg-light mb-5 shadow-sm border-0" style="max-width: 25rem;">
            <div class="card-header fs-5 fw-bolder">Informations</div>
            <div class="card-body">
                <!-- Surface -->
                <p class="card-text">
                    Surface :
                    <?php the_field('surface') ?>
                    m<sup>2</sup>
                </p>
                <!-- Garden -->
                <?php if (get_field('jardin') === true) : ?>
                    <p class="card-text">
                        Jardin : oui
                    </p>
                    <p class="card-text">
                        Surface du jardin :
                        <?php the_field('surface_jardin') ?>
                        m<sup>2</sup>
                    </p>
                <?php else : ?>
                    <p class="card-text">
                        Jardin : non
                    </p>
                <?php endif; ?>
                <!-- Documents -->
                <p>Documents :</p>
                <?php if (have_rows('documents')) : ?>
                    <ul>
                        <?php while (have_rows('documents')) : the_row() ?>
                            <li><a href="<?php the_sub_field('file') ?>" target="_blank"><?php the_sub_field('name') ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                <?php else : ?>
                    <ul>
                        <li>Il n'y a pas encore de documents disponibles</li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

<?php endwhile;
endif; ?>

<?php get_footer() ?>