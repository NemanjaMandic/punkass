<?php get_header(); ?>

	<?php

		if( have_posts() ):

			while( have_posts() ): the_post(); ?>

		<h3><?php the_title(); ?></h3>
		<p><?php the_content(); ?></p>
        <p>Ovo je neki lik</p>
        <img src="https://scontent.fbeg2-1.fna.fbcdn.net/v/t1.0-0/p480x480/14457430_2402544489768596_3009055818804630017_n.jpg?oh=5e392b892a444b94398ce19ee0e33cf5&oe=58A3943C">
		<hr>

		<?php endwhile;
		endif;
	?>
<?php get_footer(); ?>