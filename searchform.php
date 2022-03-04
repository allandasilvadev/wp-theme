<form action="<?php echo esc_url( home_url() . '/' ); ?>" role="search" method="get" id="pesquisar" class="pesquisar navbar-search pull-left">
	<input type="text" class="search-query" placeholder="Pesquisar" value="<?php echo get_search_query(); ?>" name="s" id="s">
	<input class="btn btn-success" type="submit" id="buscar" value="Pesquisar">
</form>