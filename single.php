<?php get_header(); ?>
<?php get_sidebar(); ?>

<div class="span9">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="row-fluid posts">
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>					
				</a>
			</h1>

			<?php 

			$categories = get_the_category();
			$resp = '';

			if ( is_array( $categories ) && sizeof( $categories ) > 0 ) {
				$n = 0;
				foreach ( $categories as $category ) {
					$resp .= '<a href="'. esc_url( get_category_link( $category->term_id ) ) .'">';
					$resp .= esc_html( $category->name );
					$resp .= '</a>';

					if ( sizeof( $categories ) > 1 ) {
						if ( $n == (sizeof( $categories ) - 1) ){
							
						} else {
							$resp .= ',&nbsp;';		
						}						
					}	

					$n++;				
				}
			}

			if ( has_tag() ) {
				$tags = "| <span>Tags: </span>" . get_the_tags('', ', ', '' ) . "";
			} else {
				$tags = '';
			}

			?>

			<small>Em <?php echo get_the_date(); ?></small> | <span>Autor </span>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
			<?php if ( has_tag() ) { ?> | <span>Tags: </span> <?php the_tags( '', ', ', '' ); ?> <?php } ?> 
			| <span>Categorias</span> <?php echo $resp; ?>

			<p><?php the_content(); ?></p>
		</div>

		<nav class="post-nav">
			<ul class="pager">
				<li class="previous"><?php previous_post_link( '%link', '&laquo; %title' ); ?></li>
				<li class="next"><?php next_post_link( '%link', '%title &raquo;' ); ?></li>
			</ul>
		</nav>
		
	<?php endwhile; endif; ?>

	<div class="comentarios">
		<?php comments_template(); ?>
	</div>
</div>

<?php get_footer(); ?>