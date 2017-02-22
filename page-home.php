<?php /* Template Name: Home */ get_header(); ?>
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div id="home-top">
				<div id="home-top-left">
					<header class="header">
						<div>
							<h1 class="entry-title"><?php the_title(); ?> <span> & Beyond</span></h1>
						</div>
						<?php edit_post_link(); ?>
					</header>
					<section class="entry-content">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
						<?php the_content(); ?>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
					<section class="video-player" data-embed="rStL7niR7gs">
						<div class="play-button"></div>
					</section>
				</div>
				<div id="home-top-right">
					<div>
						<h3>Happening Now</h3>
						<h3>Oakland City Council Bill</h3>
					</div>
					<div>
						<p>Lorem ipsum dolor sit amet,
							consectetur adipiscing elit. Sed quis
							sem ac tellus fermentum dictum.
							Praesent egestas justo erat, sit amet
							lacinia purus sollicitudin vel. Mauris
							nunc lacus, pretium et condimentum
							id, auctor ut sem.</p>

						<p>Lorem ipsum dolor sit amet,
							consectetur adipiscing elit. Sed quis
							sem ac tellus fermentum dictum.
							Praesent egestas justo erat, sit amet
							lacinia purus sollicitudin vel. Mauris
							nunc lacus, pretium et condimentum
							id, auctor ut sem.</p>
							<p>Lorem ipsum dolor sit amet,
							consectetur adipiscing elit. Sed quis
							sem ac tellus fermentum dictum.
							Praesent egestas justo erat, sit amet
							lacinia purus sollicitudin vel. Mauris
							nunc lacus, pretium et condimentum
							id, auctor ut sem.</p>
						<p>Learn how to <a href="#">get involved</a>.</p>
					</div>
				</div>
			</div>
			<div id="home-bottom">
				<div class="video-thumb-container">
					<div class="video-thumb" data-embed="rStL7niR7gs">
						<div class="play-button"></div>
					</div>
				</div>	
				<div class="video-thumb-container">
					<div class="video-thumb" data-embed="Mky11UJb9AY">
						<div class="play-button"></div>
					</div>
				</div>	
				<div class="video-thumb-container">
					<div class="video-thumb" data-embed="s7tWHJfhiyo">
						<div class="play-button"></div>
					</div>
				</div>	
				<div class="video-thumb-container">
					<div class="video-thumb" data-embed="OUS9mM8Xbbw">
						<div class="play-button"></div>
					</div>
				</div>	
				<div class="video-thumb-container">
					<div class="video-thumb" data-embed="3uBcq1x7P34">
						<div class="play-button"></div>
					</div>
				</div>	
				<div class="video-thumb-container">
					<div class="video-thumb" data-embed="rE3j_RHkqJc">
						<div class="play-button"></div>
					</div>
				</div>		
			</div>
		</article>
		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>