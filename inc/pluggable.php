<?php
/**
 * Template Pluggable Functions
 *
 * @package unax
 */

if ( ! function_exists( 'unax_header_top' ) ) {

	/**
	 * Header top
	 */
	function unax_header_top() {
		get_template_part( 'template-parts/header/default' );
	}
}


if ( ! function_exists( 'unax_main_navigation' ) ) {

	/**
	 * Main navigation
	 */
	function unax_main_navigation() {
		get_template_part( 'template-parts/navigation/main' );
	}
}


if ( ! function_exists( 'unax_breadcrumbs' ) ) {

	/**
	 * Breadcrumbs (Yoast and WooCommerce compatible)
	 */
	function unax_breadcrumbs() {
		if ( is_front_page() ) {
			return;
		}

		printf(
			'<div class="breadcrumbs"><div class="%s%s">',
			function_exists( 'woocommerce_breadcrumb' ) ? 'woocommerce ' : '',
			esc_attr( apply_filters( 'unax_container_class', 'container' ) )
		);

		if ( function_exists( 'woocommerce_breadcrumb' ) ) {
			woocommerce_breadcrumb(
				array(
					'wrap_before' => '<nav id="breadcrumbs" class="woocommerce-breadcrumb">',
					'wrap_after'  => '</nav>',
					'before'      => '',
					'after'       => '',
					'home'        => _x( 'Home', 'breadcrumb', 'unax' ),
				)
			);
		} elseif ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<nav id="breadcrumbs">', '</nav>' );
		}

		echo '</div></div>';
	}
}
