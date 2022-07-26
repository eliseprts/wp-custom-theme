<?php

use MonTheme\CommentWalker;

$count = absint(get_comments_number());
?>

<!-- Title -->
<?php if ($count > 0) : ?>
    <h2><?= $count ?> commentaire<?= $count > 1 ? 's' : '' ?></h2>
<?php else : ?>
    <h2>Laisser un commentaire</h2>
<?php endif ?>

<!-- Comment form -->
<?php if (comments_open()) : ?>
    <?php comment_form(['title_reply' => '']) ?>
<?php endif ?>

<!-- List of comments -->
<?php wp_list_comments([
    'style' => 'div',
    'walker' => new CommentWalker
]) ?>

<!-- Pagination -->
<?php paginate_comments_links() ?>