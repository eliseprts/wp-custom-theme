</div>

<footer class="footer mt-auto py-3 px-5 bg-light">
    <div class="row">
        <div class="col-6">
            <span class="text-muted">
                <?php wp_nav_menu([
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0'
                ]) ?>
            </span>
        </div>
        <div class="col-6 text-muted text-end">
            <?= get_option('agence_horaire') ?>
        </div>
    </div>
</footer>

<!-- To display admin bar -->
<?php wp_footer() ?>

</body>

</html>