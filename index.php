<?php get_header(); ?>
<?php get_sidebar(); ?>

<div class="span9">

	<?php if ( is_day() ) : ?>
		<p>Posts de: <?php the_time( 'j \d\e F \d\e Y' ); ?></p>
	<?php elseif( is_month() ) : ?>
		<p>Posts de: <?php the_time( 'F \d\e Y' ); ?></p>
	<?php elseif( is_year() ) : ?>
		<p>Posts de: <?php the_time( 'Y' ); ?></p>
	<?php elseif( is_category() ) : ?>
		<p>Posts da categoria: <?php single_cat_title( '', true ); ?></p>
	<?php elseif( is_tag() ) : ?>
		<p>Posts marcados com a tag: <?php single_tag_title( '', true ); ?></p>
	<?php elseif( is_author() ) : ?>
		<?php 
		global $author;
		$dados_author = get_userdata( $author );
		?>
		<p>Posts do autor: <?php echo $dados_author->display_name; ?></p>
	<?php endif; ?>

    <?php if ( is_search() ) : ?>
			<h2 style="margin-bottom: 14px;">
				<small>Palavra pesquisada : </small><?php the_search_query(); ?>
			</h2>
			<?php 
			    global $wp_query;
			    $results = intval( $wp_query->found_posts );

			    if ( $results > 0 ) {
			    	if ( $results > 1 ) {
			    		echo $results . ' resultados encontrados.';       
			    	} else {
			    		echo '1 resultado encontrado.';
			    	}

			    } else {
			    	echo 'Nenhum resultado encontrado.';
			    }
			?>
		<?php endif; ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="row-fluid posts">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<p class="muted">
				<span>Autor </span>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
			</p>

			<p class="muted">
				<span>Publicado em</span>
				<a rel="bookmark" title="" href="<?php the_permalink(); ?>">
				    <span><?php echo get_the_date(); ?></span>
				</a>
			</p>

			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'galeria' ) ); ?>

			<p><?php the_excerpt(); ?></p>
			
			<p class="muted">
				<span>Categoria</span>
				<?php the_category( ', ' ); ?>
				|
				<a rel="category" href="<?php comments_link(); ?>">
					<?php comments_number( 'Sem comentários', '1 comentário', "%s comentários" ); ?>
				</a>
			</p>
		</div>

	    <?php endwhile; else : ?>
	        <?php if ( ! is_search() ) : ?>
	            <?php get_template_part( 'sem-resultado' ); ?>
	        <?php endif; ?>
	    <?php endif; ?>

	    <div class="pagination">
	    	<?php echo paginate_links( array( 'type' => 'list' ) ); ?>	    	
	    </div>

	    <?php //pagination(); ?>
	</div>
</div>

<?php get_footer(); ?>