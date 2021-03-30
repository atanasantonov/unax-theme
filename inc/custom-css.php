<?php
/**
 * Custom CSS
 *
 * @package WordPress
 * @subpackage Unax
 */

/**
 * Generate color palette CSS.
 */
function unax_color_palette_css() {
	// Get color palette.
	$colors = unax_editor_color_palette();

	ob_start();
	foreach ( $colors as $key => $value ) : ?>

		/* <?php echo esc_html( $key ); ?> */
		.has-<?php echo esc_html( $key ); ?>-color {
			color: <?php echo esc_html( $value ); ?>;
		}
		a.has-<?php echo esc_html( $key ); ?>-color,
		a.has-<?php echo esc_html( $key ); ?>-color:hover,
		a.has-<?php echo esc_html( $key ); ?>-color:focus,
		a.has-<?php echo esc_html( $key ); ?>-color.active,
		.wp-block-button__link.has-<?php echo esc_html( $key ); ?>-color,
		.wp-block-button__link.has-<?php echo esc_html( $key ); ?>-color:hover,
		.wp-block-button__link.has-<?php echo esc_html( $key ); ?>-color:focus,
		.wp-block-button__link.has-<?php echo esc_html( $key ); ?>-color.active {
			color: <?php echo esc_html( $value ); ?>;
		}
		.has-<?php echo esc_html( $key ); ?>-background-color,
		.wp-block-cover.has-background-dim.has-<?php echo esc_html( $key ); ?>-background-color {
			background-color: <?php echo esc_html( $value ); ?>;
		}
	<?php endforeach; ?>

	/* cover */
	.wp-block-cover {
		&.has-background-dim {
			p:not(.has-text-color) {
				color: <?php echo esc_html( $colors['white'] ); ?>;
			}
		}
	}
	<?php

	$ob = ob_get_clean();
	return $ob;
}
