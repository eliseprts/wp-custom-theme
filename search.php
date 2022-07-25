<?php get_header() ?>

<form class="row row-cols-lg-auto g-3 align-items-center my-4">

    <div class="col-12">
        <input type="search" name="s" class="form-control mb-2 mr-sm-2" value="<?= get_search_query() ?>" placeholder="Votre recherche">
    </div>

    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="sponso" id="inlineFormCheck" <?= checked('1', get_query_var('sponso')) ?>>
            <label class="form-check-label" for="inlineFormCheck">
                Articles sponsorisés seulement
            </label>
        </div>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>
</form>

<h1 class="mb-4">Résultats de votre recherche "<?= get_search_query() ?>"</h1>

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