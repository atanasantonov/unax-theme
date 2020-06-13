<?php
/**
 * Unax Theme Customizer
 *
 * @package Unax
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function unax_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'unax_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'unax_customize_partial_blogdescription',
			)
		);
	}


	$wp_customize->add_setting( 'google_analytics' , array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control(
		 new WP_Customize_Control( $wp_customize, 'google_analytics', [
			 'label'    => __( 'Google Analytics ID', 'unax' ),
			 'section'  => 'title_tagline',
		 ])
 	);

	$wp_customize->add_setting( 'facebook_page' , array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control(
		 new WP_Customize_Control( $wp_customize, 'facebook_page', [
			 'label'    => __( 'Facebook Page', 'unax' ),
			 'section'  => 'title_tagline',
		 ])
 	);

}


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function unax_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function unax_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function unax_customize_preview_js() {
	wp_enqueue_script( 'unax-customizer', get_template_directory_uri() . '/dist/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
