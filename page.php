<?php get_header(); ?>
<?php get_sidebar(); ?>

<div class="span9">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<ul class="breadcrumb">
			<li>
				<a href="<?php echo esc_url( home_url() ); ?>">Home</a>&nbsp;<span class="divider">/</span>
			</li>
			<li class="active">
				<?php the_title(); ?>
			</li>
		</ul>

		<div class="row-fluid posts">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p><?php the_content(); ?></p>
		</div>

		<?php wp_link_pages( array() ); ?>

	<?php endwhile; endif; ?>


	<nav class="post-nav">
  		<ul class="pager">
    		<li class="previous"><?php previous_post_link( '%link', '&larr; %title' ); ?></li>
    		<li class="next"><?php next_post_link( '%link', '%title &rarr;' ); ?></li>
  		</ul>
	</nav>

</div>

<?php get_footer(); ?>