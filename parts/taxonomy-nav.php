<?php $conseils = get_terms(['taxonomy' => 'conseil']); ?>

<ul class="nav nav-pills my-4">
    <?php foreach ($conseils as $conseil) : ?>
        <li class="nav-item text-uppercase">
            <a href="<?= get_term_link($conseil) ?>" class="nav-link <?= is_tax($conseil, $conseil->term_id) ? 'active' : '' ?>"><?= $conseil->name ?></a>
        </li>
    <?php endforeach; ?>
</ul>