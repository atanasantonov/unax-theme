<?php

add_action( 'after_setup_theme', function() {

    // Add foundation color palette to the editor
    add_theme_support( 'editor-color-palette', array(

        array(
            'name' => __( 'Primary Color', 'unax-theme' ),
            'slug' => 'primary',
            'color' => '#007bff',
        ),
        array(
            'name' => __( 'Secondary Color', 'unax-theme' ),
            'slug' => 'secondary',
            'color' => '#6c757d',
        ),
        array(
            'name' => __( 'Success Color', 'unax-theme' ),
            'slug' => 'success',
            'color' => '#28a745',
        ),
        array(
            'name' => __( 'Danger color', 'unax-theme' ),
            'slug' => 'danger',
            'color' => '#dc3545',
        ),
        array(
            'name' => __( 'Warning color', 'unax-theme' ),
            'slug' => 'warning',
            'color' => '#ffc107',
        ),
        array(
            'name' => __( 'Info Color', 'unax-theme' ),
            'slug' => 'info',
            'color' => '#17a2b8',
        ),
		array(
			'name' => __( 'White', 'unax-theme' ),
			'slug' => 'white',
			'color' => '#fff',
		),
        array(
            'name' => __( 'Light Gray', 'unax-theme' ),
            'slug' => 'gray-100',
            'color' => '#f8f9fa',
        ),
        array(
            'name' => __( 'Medium Gray', 'unax-theme' ),
            'slug' => 'gray-400',
            'color' => '#ced4da',
        ),
        array(
            'name' => __( 'Dark Gray', 'unax-theme' ),
            'slug' => 'gray-700',
            'color' => '#495057',
        ),
        array(
            'name' => __( 'Black', 'unax-theme' ),
            'slug' => 'black',
            'color' => '#000',
        ),
    ) );

});
