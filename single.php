<?php get_header(); ?>
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'templates/entry' ); ?>
		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
	<footer class="footer">
		<?php get_template_part( 'templates/nav', 'below-single' ); ?>
	</footer>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>