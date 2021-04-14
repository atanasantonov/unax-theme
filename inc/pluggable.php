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
	 * Breadcrumbs (Yoast compatible)
	 */
	function unax_breadcrumbs() {
		if ( is_front_page() ) {
			return;
		}
		?>
		<div class="breadcrumbs">
			<div class="<?php echo esc_attr( apply_filters( 'unax_container_class', 'container' ) ); ?>">
			<?php

			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
			}

			?>
			</div>
		</div>
		<?php
	}
}
