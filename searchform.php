<form class="d-flex" action="<?= esc_url(home_url('/')) ?>">
    <input class="form-control me-2" name="s" type="search" placeholder="Recherche" aria-label="Recherche" value="<?= get_search_query() ?>">
    <button class="btn btn-light text-primary" type="submit">Rechercher</button>
</form>