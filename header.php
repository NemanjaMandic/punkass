<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package punkass
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'punkass' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
				
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a>

				
			<?php
			

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="my-navigation navbar" role="navigation">
			<div class="container-fluid my-nav">
                 <div class="navbar-header">
                  <button type="button" class="navbar-toggle togl" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                  </button>
                 
                </div>

                <form class="navbar-form navbar-right">
			        <div class="form-group">
			          <?php get_search_form(); ?>
			        </div>
			       
	            </form>
                     
                    <?php wp_nav_menu( 
                                  array( 
                                        'theme_location'  => 'primary', 
                                        'menu_id'         => 'primary-menu' ,
                                        'depth'           => 2,
                                        'container'       => 'div',
                                        'container_class' => 'collapse navbar-collapse',
                                        'container_id'    => 'myNavbar',
                                        'menu_class'      => 'nav navbar-nav',
                                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                        'walker'          => new wp_bootstrap_navwalker()
                                      ) ); ?>


            </div>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	
