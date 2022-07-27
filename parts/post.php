<!-- Card -->
<div class="card">
    <!-- Thumbnail -->
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height:auto;']) ?>
    <div class="card-body">
        <h5 class="card-title text-uppercase fw-semibold"><?php the_title() ?></h5>
        <!-- Category -->
        <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>
        <!-- Taxonomy -->
        <?php the_terms(get_the_ID(), 'conseil') ?>
        <!-- Excerpt -->
        <p class="card-text fw-lighter text-secondary"><?php the_excerpt() ?></p>
        <!-- Link to the post -->
        <a href="<?php the_permalink() ?>" class="card-link">Voir plus</a>
    </div>
</div>