<section class="entry-content">
	<div class="entry-featured-image"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></div>
	<?php the_content(); ?>
	<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>