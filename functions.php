<?php
/**
 * Unax constants and includes
 *
 * @package Unax
 */

if ( ! defined( 'UNAX_THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'UNAX_THEME_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! isset( $content_width ) ) {
	$content_width = 992;
}


/**
 * Load the theme textdomain for translation.
 */
function unax_load_textdomain() {
	load_theme_textdomain( 'unax', get_template_directory() . '/languages' );
}

/**
 * Load the theme textdomain for translation.
 */
add_action( 'init', 'unax_load_textdomain' );


/**
 * Updates related actions.
 */
require get_template_directory() . '/inc/update.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/custom-css.php';
require get_template_directory() . '/inc/pluggable.php';
require get_template_directory() . '/inc/template-filters.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Widgets.
 */
require get_template_directory() . '/inc/widgets/class-unax-contacts-widget.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register custom Gutenberg block styles.
 */
unax_register_block_styles();
