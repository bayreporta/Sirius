<?php /* Template Name: Blog */get_header(); ?>
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="header">
				<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
			</header>
			<section class="entry-content">
				<?php the_content(); ?>
			</section>
			<hr />
		<?php 
			$args = array(
				'post_type'              => array( 'post' ),
				'post_status'            => array( 'publish' ),
				'nopaging'               => true,
				'order'                  => 'DESC',
			);
			$query = new WP_Query( $args );
			while ($query->have_posts()) : $query->the_post();?>			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="header">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<section class="entry-meta">
							<span class="author vcard">By <?php the_author_posts_link(); ?></span>
							<span class="meta-sep"> | </span>
							<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
						</section>
					</header>
					<section class="entry-content">
						<?php the_excerpt(); ?>
					</section>
					<footer class="entry-footer">
						<p class="cat-links"><?php _e( 'Categories: ', 'sirius' ); ?><?php the_category( ', ' ); ?></p>
						<p class="tag-links"><?php the_tags(); ?></p>
					</footer> 
				</article>
			<?php endwhile;			
		 ?>
		</article>
	<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>