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


	$wp_customize->add_section( 'unax_common_settings' , array(
	    'title'      => esc_html__( 'Unax Settings', 'unax' ),
	    'priority'   => 120,
	) );

	$wp_customize->add_setting( 'grid_columns' , array(
			'default' 			=> 3,
			'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control(
		 new WP_Customize_Control( $wp_customize, 'grid_columns', [
			 'label'       => esc_html__( 'Grid columns', 'unax' ),
			 'description' => esc_html__( 'Choose the default columns count for archive pages.', 'unax' ),
			 'section'     => 'unax_common_settings',
			 'settings'    => 'grid_columns',
			 'type'        => 'number',
			 'input_attrs' => array(
				'min'  => 1,
				'max'  => 6,
				'step' => 1,
			 ),
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
