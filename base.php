<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . '/css/bootstrap.min.css'; ?>" media="screen">
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>" media="screen">
	</head>
	<body>
		<div class="container">
			
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<a href="#" class="brand">Blog Treinaweb</a>

					<ul class="nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Link 1</a></li>
						<li><a href="#">Link 2</a></li>
						<li><a href="#">Link 3</a></li>
					</ul>

					<form action="" class="navbar-search pull-left">
						<input type="text" class="search-query" placeholder="Pesquisar">
					</form>

					<ul class="nav pull-right">
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Opções&nbsp;<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Ação 1</a></li>
								<li><a href="#">Ação 2</a></li>
								<li><a href="#">Ação 3</a></li>
								<li class="divider"></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>

			<div class="row-fluid">
				<div class="hero-unit">
					<h1>Nome do blog</h1>
					<p>Boas vindas</p>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span3">
					<div class="well">
						<ul class="nav nav-list">
							<li class="nav-header">Posts recentes</li>
							<li class="active"><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>

							<li class="nav-header">Arquivos</li>
							<li><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>

							<li class="nav-header">Categorias</li>
							<li><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>
						</ul>
					</div>
				</div>

				<div class="span9">
					<div class="row-fluid posts">
						<h2><a href="#">Título do post</a></h2>

						<p class="muted">
							<span>Publicado em</span>
							<a rel="bookmark" title="" href="#">
								<span class="entry-date">21 de março de 2012</span>
							</a>
						</p>

						<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>

						<p class="muted">
							<span>Categoria</span>
							<a rel="category" title="" href="#">Assuntos gerais</a>
						</p>
					</div>


					<div class="row-fluid posts">
						<h2><a href="#">Título do post</a></h2>

						<p class="muted">
							<span>Publicado em</span>
							<a rel="bookmark" title="" href="#">
								<span class="entry-date">21 de março de 2012</span>
							</a>
						</p>

						<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>

						<p class="muted">
							<span>Categoria</span>
							<a rel="category" title="" href="#">Assuntos gerais</a>
						</p>
					</div>
				</div>
			</div>

			<hr>

			<footer>
				<p>&copy; Treinaweb Cursos 2012</p>
			</footer>

		</div>
		
		<script type="text/javascript" src="<?php echo BASE_URL . '/js/jquery.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo BASE_URL . '/js/bootstrap.min.js'; ?>"></script>
	</body>
</html>