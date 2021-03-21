<?php
/**
 * Custom CSS
 *
 * @package WordPress
 * @subpackage Unax
 */

/**
 * Generate color palette CSS.
 *
 * @return string
 */
function unax_color_palette_css() {

	// Get color palette.
	$colors = unax_editor_color_palette();

	ob_start();
	?>

	// primary
	.has-primary-color {
	    color: <?php echo esc_html( $colors['primary'] ); ?>;
	}
	a.has-primary-color,
	.wp-block-button__link.has-primary-color {
	    &:hover,
	    &:focus,
	    &.active {
	        color: <?php echo esc_html( $colors['primary'] ); ?>;
	    }
	}
	.has-primary-background-color,
	.wp-block-cover.has-background-dim.has-primary-background-color {
	    background-color: <?php echo esc_html( $colors['primary'] ); ?>;
	}

	// secondary
	.has-secondary-color {
	    color: <?php echo esc_html( $colors['secondary'] ); ?>;
	}
	a.has-secondary-color,
	.wp-block-button__link.has-secondary-color {
	    &:hover,
	    &:focus,
	    &.active {
	        color: <?php echo esc_html( $colors['secondary'] ); ?>;
	    }
	}
	.has-secondary-background-color,
	.wp-block-cover.has-background-dim.has-secondary-background-color {
	    background-color: <?php echo esc_html( $colors['secondary'] ); ?>;
	}

	// success
	.has-success-color {
	    color: <?php echo esc_html( $colors['success'] ); ?>;
	}
	a.has-success-color,
	.wp-block-button__link.has-success-color {
	    &:hover,
	    &:focus,
	    &.active {
	        color: <?php echo esc_html( $colors['success'] ); ?>;
	    }
	}
	.has-success-background-color,
	.wp-block-cover.has-background-dim.has-success-background-color {
	    background-color: <?php echo esc_html( $colors['success'] ); ?>;
	}

	// info
	.has-info-color {
	    color: <?php echo esc_html( $colors['info'] ); ?>;
	}
	a.has-info-color,
	.wp-block-button__link.has-info-color {
	    &:hover,
	    &:focus,
	    &.active {
	        color: <?php echo esc_html( $colors['info'] ); ?>;
	    }
	}
	.has-info-background-color,
	.wp-block-cover.has-background-dim.has-info-background-color {
	    background-color: <?php echo esc_html( $colors['info'] ); ?>;
	}

	// warning
	.has-warning-color {
	    color: <?php echo esc_html( $colors['warning'] ); ?>;
	}
	a.has-warning-color,
	.wp-block-button__link.has-warning-color {
	    &:hover,
	    &:focus,
	    &.active {
	        color: <?php echo esc_html( $colors['warning'] ); ?>;
	    }
	}
	.has-warning-background-color,
	.wp-block-cover.has-background-dim.has-warning-background-color {
	    background-color: <?php echo esc_html( $colors['warning'] ); ?>;
	}

	// danger
	.has-danger-color {
	    color: <?php echo esc_html( $colors['danger'] ); ?>;
	}
	a.has-danger-color,
	.wp-block-button__link.has-danger-color {
	    &:hover,
	    &:focus,
	    &.active {
	        color: <?php echo esc_html( $colors['danger'] ); ?>;
	    }
	}
	.has-danger-background-color,
	.wp-block-cover.has-background-dim.has-danger-background-color {
	    background-color: <?php echo esc_html( $colors['danger'] ); ?>;
	}

	// white
	.has-white-color {
	    color: <?php echo esc_html( $colors['white'] ); ?>;
	}
	a.has-white-color,
	.wp-block-button__link.has-white-color {
	    &:hover,
	    &:focus,
	    &.active {
	        color: <?php echo esc_html( $colors['white'] ); ?>;
	    }
	}
	.has-white-background-color,
	.wp-block-cover.has-background-dim.has-white-background-color {
	    background-color: <?php echo esc_html( $colors['white'] ); ?>;
	}

	// light
	.has-light-color {
	    color: <?php echo esc_html( $colors['light'] ); ?>;
	}
	a.has-light-color,
	.wp-block-button__link.has-light-color {
	    &:hover,
	    &:focus,
	    &.active {
	        color: <?php echo esc_html( $colors['light'] ); ?>;
	    }
	}
	.has-light-background-color,
	.wp-block-cover.has-background-dim.has-light-background-color {
	    background-color: <?php echo esc_html( $colors['light'] ); ?>;
	}

	// medium
	.has-medium-color {
	    color: <?php echo esc_html( $colors['medium'] ); ?>;
	}
	a.has-medium-color,
	.wp-block-button__link.has-medium-color {
	    &:hover,
	    &:focus,
	    &.active {
	        color: <?php echo esc_html( $colors['medium'] ); ?>;
	    }
	}
	.has-medium-background-color,
	.wp-block-cover.has-background-dim.has-medium-background-color {
	    background-color: <?php echo esc_html( $colors['medium'] ); ?>;
	}

	// dark
	.has-dark-color {
	    color: <?php echo esc_html( $colors['dark'] ); ?>;
	}
	a.has-dark-color,
	.wp-block-button__link.has-dark-color {
	    &:hover,
	    &:focus,
	    &.active {
	        color: <?php echo esc_html( $colors['dark'] ); ?>;
	    }
	}
	.has-dark-background-color,
	.wp-block-cover.has-background-dim.has-dark-background-color {
	    background-color: <?php echo esc_html( $colors['dark'] ); ?>;
	}

	// black
	.has-black-color {
	    color: <?php echo esc_html( $colors['black'] ); ?>;
	}
	a.has-black-color,
	.wp-block-button__link.has-black-color {
	    &:hover,
	    &:focus,
	    &.active {
	        color: <?php echo esc_html( $colors['black'] ); ?>;
	    }
	}
	.has-black-background-color,
	.wp-block-cover.has-background-dim.has-black-background-color {
	    background-color: <?php echo esc_html( $colors['black'] ); ?>;
	}

	// cover
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
