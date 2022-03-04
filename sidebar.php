<div class="span3">
	<div class="well">
		<ul class="nav nav-list">

			<li class="nav-header">Posts recentes</li>
			<?php 
			    $args = array( 'posts_per_page' => 4 );
			    $postsRecentes = new WP_Query( $args );
			?>

			<?php if ( $postsRecentes->have_posts() ) : while ( $postsRecentes->have_posts() ) : $postsRecentes->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; else: ?>
			    <h3>Nenhum post encontrado.</h3>
			<?php endif; ?>

			<li class="nav-header">Arquivos</li>
			<?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'html' ) ); ?>

			<li class="nav-header">Categorias</li>
			<?php wp_list_categories( array( 'title_li' => '', 'number' => 8 ) ); ?>
		</ul>
	</div>

	<?php if ( is_active_sidebar( 'Widget Lateral' ) ) : ?>
		<div class="well">
			<?php dynamic_sidebar( 'Widget Lateral' ); ?>
		</div>
	<?php else : ?>
	<?php endif; ?>
	
</div>