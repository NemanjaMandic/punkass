<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package punkass
 */

?>

    </div><!-- .content-wrapper -->
	

	<footer id="colophon" class="site-footer text-center" role="contentinfo">
	<hr>
	
	<?php if ( is_active_sidebar( 'sidebar-2' )) : ?>
			<div id="footer-widget" class="footer-widget-area">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		<?php endif; ?>
		
		<div class="site-info">
		
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'punkass' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'punkass' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'punkass' ), 'punkass', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->

		
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
