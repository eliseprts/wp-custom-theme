</div>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">
            <?php wp_nav_menu([
                'theme_location' => 'footer',
                'container' => false,
                'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0'
            ]) ?>
        </span>
    </div>
</footer>

<!-- To display admin bar -->
<?php wp_footer() ?>

</body>

</html>