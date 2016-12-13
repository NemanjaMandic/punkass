<?php
/**
 * punkass functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package punkass
 */


require_once('wp_bootstrap_navwalker.php');


if ( ! function_exists( 'punkass_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function punkass_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on punkass, use a find and replace
	 * to change 'punkass' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'punkass', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'punkass' ),
		'footer-navigation' => esc_html__('Footer Navigatin', 'punkass'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'punkass_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo', array(
          'height'      => 100,
          'width'       => 200,
          'flex-height' => true,
          'flex-width'  => true,
          'header-text' => array( 'site-title', 'site-description' ),
		) );
}
endif;
add_action( 'after_setup_theme', 'punkass_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function punkass_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'punkass_content_width', 640 );
}
add_action( 'after_setup_theme', 'punkass_content_width', 0 );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function punkass_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'punkass' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'punkass' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'punkass' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'punkass' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'punkass_widgets_init' );

/**
* Creating roles to my site
*/


/**
 * Enqueue scripts and styles.
 */
function punkass_scripts() {

	wp_enqueue_style( 'punkass-style', get_stylesheet_uri() );

    wp_enqueue_style( 'punkass-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
    
   wp_enqueue_style( 'railway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );

    wp_enqueue_style( 'punkass-woocommerce-style', get_template_directory_uri() . '/css/woocommerce-custom.css' );


    wp_enqueue_style( 'punkass-pater', get_template_directory_uri() . '/css/pater.css' );

	wp_enqueue_script( 'punkass-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'punkass-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery','customize-preview' ), '20151215', true );

	wp_enqueue_script( 'punkass-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'punkass-bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'punkass_scripts' );

/**
* Woo commerce
*/

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'woocommerce_support' );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );



add_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
function woocommerce_custom_sales_price( $html, $product ){

	$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );

	return $html . sprintf( __( ' Save %s', 'woocommerce' ), $percentage . '%' );
}

//Add Empty Cart button
add_action( 'woocommerce_cart_actions', 'punkass_empty_cart_button' );

function punkass_empty_cart_button(){
   echo "<a class='button' href='?empty-cart=true'>" . __('Empty Cart', 'woocommerce' ) . "</a>";
}

//Actualy empty the cart
add_action( 'init', 'punkass_empty_cart' );

function punkass_empty_cart(){

  global $woocommerce;

  if( isset( $_GET['empty-cart'] ) ){
  	$woocommerce->cart->empty_cart();
  }
}


/*
add_filter( 'add_to_cart_redirect', 'redirect_to_checkout' );

function redirect_to_checkout(){
	global $woocommerce;
	$checkout_url = $woocommerce->cart->get_checkout_url();
	return $checkout_url;
}
*/

//Display cart on single product page
add_action( 'woocommerce_single_product_summary', 'punkass_cart_in_product_page', 21 );

function punkass_cart_in_product_page(){
	
    wc_get_template_part('inc/single-product', 'cart');
}

/**
	 * Get the product thumbnail for the loop.
	 *
	 * @subpackage	Loop

	 */
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
	function woocommerce_template_loop_product_thumbnail() {
		if( is_product() ){
			echo woocommerce_get_product_thumbnail('thumbnail');
		}else{
			echo woocommerce_get_product_thumbnail();
		}
		
	}
}

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

//Customize Cart
add_action( 'woocommerce_before_cart', 'kujo');

function kujo(){
   
	echo "<div class='container'>";
}

add_action( 'woocommerce_after_cart', 'punkass_after_cart' );

function punkass_after_cart(){
	echo "</div>";
}

add_action( 'woocommerce_before_checkout_form', 'punkass_before_checkout_form');

function punkass_before_checkout_form( ){
	echo "<div class='container'>";
	
}

add_action( 'woocommerce_after_checkout_form', 'punkass_after_checkout_form' );

function punkass_after_checkout_form(){

	echo "</div>";
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
