<?php

/*
   Template Name: Jebacki No Title Page
 */
get_header(); ?>

	<div style="background: orange;">
		

		<?php
		if ( have_posts() ) :

			
        
            
			/* Start the Loop */
			while ( have_posts() ) : the_post();

			

			 echo "<h1>Ovo je jebacka strana bez naslova</h1>";

			  the_content(); 

			endwhile;


		endif; ?>

		
	</div><!-- #primary -->

<?php

get_footer();
