<form role="search" method="get" class="search-form form-inline my-2 my-lg-0" action="<?= esc_url(home_url('/')) ?>"
      xmlns="http://www.w3.org/1999/html">
    <div class="btn-group" role="group" aria-label="Basic example">
        <input type="search" class="search-field form-control mr-sm-2" placeholder="Pretraga" value="<?= get_search_query() ?>" name="s" aria-label="Search" />
        <button type="submit" class="search-submit btn btn-outline-success my-sm-0">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
