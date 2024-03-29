<?php
/**
 * Template hooks.
 *
 * @package Unax
 */

// Admin.
add_action( 'admin_enqueue_scripts', 'unax_add_editor_style' );

// Theme setup.
add_action( 'after_setup_theme', 'unax_setup' );
add_action( 'widgets_init', 'unax_widgets_init' );
add_action( 'wp_enqueue_scripts', 'unax_scripts' );
add_action( 'after_setup_theme', 'unax_custom_header_setup' );

// Customizer.
add_action( 'customize_register', 'unax_customize_register' );
add_action( 'customize_preview_init', 'unax_customize_preview_js' );

// Head.
add_action( 'wp_head', 'unax_pingback_header' );

// Header.
add_action( 'unax_header', 'unax_header_top', 10 );
add_action( 'unax_header', 'unax_main_navigation', 30 );
add_action( 'unax_header', 'unax_custom_header', 40 );
add_action( 'unax_header', 'unax_breadcrumbs', 50 );

add_action( 'unax_below_header', 'unax_top_widget_area', 10 );

// WooCommerce.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 'unax_woocommerce_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'unax_woocommerce_wrapper_end', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
