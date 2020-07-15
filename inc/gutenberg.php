<?php

add_action( 'after_setup_theme', function() {

    // Add foundation color palette to the editor
    add_theme_support( 'editor-color-palette', array(

        array(
            'name' => __( 'Primary Color', 'womeninbusiness' ),
            'slug' => 'primary',
            'color' => '#007bff',
        ),
        array(
            'name' => __( 'Secondary Color', 'womeninbusiness' ),
            'slug' => 'secondary',
            'color' => '#6c757d',
        ),
        array(
            'name' => __( 'Success Color', 'womeninbusiness' ),
            'slug' => 'success',
            'color' => '#28a745',
        ),
        array(
            'name' => __( 'Danger color', 'womeninbusiness' ),
            'slug' => 'danger',
            'color' => '#dc3545',
        ),
        array(
            'name' => __( 'Warning color', 'womeninbusiness' ),
            'slug' => 'warning',
            'color' => '#ffc107',
        ),
        array(
            'name' => __( 'Info Color', 'womeninbusiness' ),
            'slug' => 'info',
            'color' => '#17a2b8',
        ),
		array(
			'name' => __( 'White', 'womeninbusiness' ),
			'slug' => 'white',
			'color' => '#fff',
		),
        array(
            'name' => __( 'Light Gray', 'womeninbusiness' ),
            'slug' => 'gray-100',
            'color' => '#f8f9fa',
        ),
        array(
            'name' => __( 'Medium Gray', 'womeninbusiness' ),
            'slug' => 'gray-400',
            'color' => '#ced4da',
        ),
        array(
            'name' => __( 'Dark Gray', 'womeninbusiness' ),
            'slug' => 'gray-700',
            'color' => '#495057',
        ),
        array(
            'name' => __( 'Black', 'womeninbusiness' ),
            'slug' => 'black',
            'color' => '#000',
        ),
    ) );

});

register_block_style(
    'core/group',
    array(
        'name'         => 'container',
        'label'        => __( 'Контейнер', 'womeninbusiness' ),
    )
);

register_block_style(
    'core/cover',
    array(
        'name'         => 'container',
        'label'        => __( 'Контейнер', 'womeninbusiness' ),
    )
);
