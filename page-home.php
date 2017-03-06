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
					<?php $videos = get_field('owc_video_list'); ?>
					<section class="video-player" data-embed="<?php echo $videos[0]['embed_code']; ?>">
						<div class="play-button"></div>
					</section>
				</div>
				<div id="home-top-right">
					<div>						
						<h3><?php print get_field('hn_header'); ?></h3>
						<h3><?php print get_field('hn_headline'); ?></h3>
					</div>
					<div>
						<?php print get_field('hn_body_text'); ?>
						<?php print get_field('hn_call_to_action'); ?>
					</div>
				</div>
			</div>
			<div id="home-bottom">
				<?php print owc_populate_videos($videos); ?>
			</div>
		</article>
		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>