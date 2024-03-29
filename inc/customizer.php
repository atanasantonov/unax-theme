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

	// Site title and description selective refresh.
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

	// Colors.
	$unax_theme_default_colors = unax_default_colors();
	foreach ( $unax_theme_default_colors as $key => $value ) {
		$wp_customize->add_setting(
			sprintf( 'unax_editor_color_palette_%s', $key ),
			array(
				'default' => $value,
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				sprintf( 'unax_editor_color_palette_%s', $key ),
				array(
					// translators: Label of the color.
					'label'    => sprintf( esc_html__( '%s color.', 'unax' ), ucfirst( $key ) ),
					'section'  => 'colors',
					'settings' => sprintf( 'unax_editor_color_palette_%s', $key ),
				)
			)
		);
	}

	// Footer credits.
	$wp_customize->add_setting(
		'unax_display_footer_credits',
		array(
			'default' => '1',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_display_footer_credits',
			[
				'label'    => esc_html__( 'Display footer credits.', 'unax' ),
				'priority' => 50,
				'type'     => 'checkbox',
				'section'  => 'title_tagline',
			]
		)
	);

	// Site title in footer.
	$wp_customize->add_setting(
		'unax_display_footer_title',
		array(
			'default' => '1',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_display_footer_title',
			[
				'label'    => __( 'Display site title in footer.', 'unax' ),
				'priority' => 51,
				'type'     => 'checkbox',
				'section'  => 'title_tagline',
			]
		)
	);

	/**
	 * Section Theme settings.
	 */
	$wp_customize->add_section(
		'unax_common_settings',
		array(
			'title'      => esc_html__( 'Theme Settings', 'unax' ),
			'priority'   => 20,
		)
	);

	// Sticky header.
	$wp_customize->add_setting(
		'unax_sticky_header',
		array(
			'default'           => '0',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_sticky_header',
			array(
				'label'    => esc_html__( 'Enable sticky header.', 'unax' ),
				'section'  => 'unax_common_settings',
				'priority' => 10,
				'type'     => 'checkbox',
			)
		)
	);

	// To top button.
	$wp_customize->add_setting(
		'unax_to_top_button',
		array(
			'default'           => '0',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_to_top_button',
			array(
				'label'    => esc_html__( 'Enable "To top" button.', 'unax' ),
				'section'  => 'unax_common_settings',
				'priority' => 10,
				'type'     => 'checkbox',
			)
		)
	);

	// Archive display option.
	$wp_customize->add_setting(
		'archive_display',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => 'card',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'archive_display',
			[
				'label'       => esc_html__( 'Archive display option', 'unax' ),
				'description' => esc_html__( 'Choose the archive display for archive pages.', 'unax' ),
				'section'     => 'unax_common_settings',
				'type'        => 'select',
				'choices' => array(
					'card' => __( 'Grid', 'unax' ),
					'excerpt' => __( 'List', 'unax' ),
				),
			]
		)
	);

	// Grid columns.
	$wp_customize->add_setting(
		'grid_columns',
		array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'grid_columns',
			[
				'label'       => esc_html__( 'Grid columns', 'unax' ),
				'description' => esc_html__( 'Choose the default columns count for archive pages.', 'unax' ),
				'section'     => 'unax_common_settings',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 6,
					'step' => 1,
				),
			]
		)
	);

	/**
	 * Section Contacts.
	 */
	$wp_customize->add_section(
		'unax_section_contacts',
		array(
			'title'       => esc_html__( 'Contacts', 'unax' ),
			'description' => esc_html__( 'Use contact details with Contacts Widget. Blank fields not rendered.', 'unax' ),
			'priority'    => 30,
		)
	);

	// Phone.
	$wp_customize->add_setting(
		'unax_contact_phone',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_contact_phone',
			[
				'label'    => __( 'Phone', 'unax' ),
				'section'  => 'unax_section_contacts',
			]
		)
	);

	// Email.
	$wp_customize->add_setting(
		'unax_contact_email',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_contact_email',
			[
				'label'    => __( 'Email', 'unax' ),
				'section'  => 'unax_section_contacts',
			]
		)
	);

	// Facebook page.
	$wp_customize->add_setting(
		'unax_contact_facebook_page',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_contact_facebook_page',
			[
				'label'    => __( 'Facebook page', 'unax' ),
				'section'  => 'unax_section_contacts',
			]
		)
	);

	// Youtube.
	$wp_customize->add_setting(
		'unax_contact_youtube',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_contact_youtube',
			[
				'label'    => __( 'Youtube', 'unax' ),
				'section'  => 'unax_section_contacts',
			]
		)
	);

	// LinkedIn.
	$wp_customize->add_setting(
		'unax_contact_linkedin',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_contact_linkedin',
			[
				'label'    => __( 'LinkedIn', 'unax' ),
				'section'  => 'unax_section_contacts',
			]
		)
	);

	// Skype.
	$wp_customize->add_setting(
		'unax_contact_skype',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_contact_skype',
			[
				'label'    => __( 'Skype', 'unax' ),
				'section'  => 'unax_section_contacts',
			]
		)
	);

	// Address.
	$wp_customize->add_setting(
		'unax_contact_address',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_contact_address',
			[
				'label'    => __( 'Address', 'unax' ),
				'section'  => 'unax_section_contacts',
			]
		)
	);

	$wp_customize->add_setting(
		'unax_contact_address_map',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_url',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_contact_address_map',
			[
				'label'    => __( 'Address map', 'unax' ),
				'section'  => 'unax_section_contacts',
			]
		)
	);

	// Working hours.
	$wp_customize->add_setting(
		'unax_contact_working_hours',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'unax_contact_working_hours',
			[
				'label'    => __( 'Working hours', 'unax' ),
				'section'  => 'unax_section_contacts',
			]
		)
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
