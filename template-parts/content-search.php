<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package punkass
 */

?>


<article class="results-found" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

	<div class="search-image">

    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    
	<?php the_post_thumbnail(); ?>
	
		

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php punkass_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	

	</div>
</article><!-- #post-## -->

