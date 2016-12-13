<?php


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

           <?php 
               
                $lastBlog = new WP_Query('type=post&posts_per_page=1');

                if ( $lastBlog->have_posts() ) :

			
				  	while ( $lastBlog->have_posts() ) : $lastBlog->the_post();

				
		            if ( has_post_thumbnail() ) {
			               the_post_thumbnail();
		            } 
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
            
			endif;

           ?>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
				<h1>Drkela</h1>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				
			<?php
            
			endif;
         
        
        
              
        
            
            
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
            if ( has_post_thumbnail() ) {
	               the_post_thumbnail();
            } 
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

		

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
