<?php
/**
 * punkass Theme Customizer.
 *
 * @package punkass
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function punkass_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

    $wp_customize->add_setting( 'site_logo', array(
         
         'default'   => '',
         'transport' => 'postMessage',
    	));

    $wp_customize->add_section( 'punkass_logo_section', array(
             'title' => __('Custom logo', 'prowordpress'),
			 'description' => __('Add a custom logo for the site', 'prowordpress'),
			 'priority' => 30,
    	));

    

	  $wp_customize->add_setting( 'link_color', array(
     		'default' => 'FF00FF',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
     	)); 

     $wp_customize->add_section( 'punkass_content_customizations', array(
            'title'       => __('Content customizations', 'punkass' ),
            'description' => __('Customize the link colors in the theme', 'punkass'),
            'priority'    => 30,
     	));

     $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'link_color_control', array(
			'label' => __( 'Link Color', 'prowordpress' ),
			'section' => 'prowordpress_content_customizations',
			'settings' => 'link_color',
	)));
}
add_action( 'customize_register', 'punkass_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function punkass_customize_preview_js() {
	wp_enqueue_script( 'punkass_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'punkass_customize_preview_js' );


