<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Unax
 */

/**
 * Set up the WordPress core custom header feature.
 */
function unax_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'unax_custom_header_args',
			array(
				'width'              => 1000,
				'height'             => 382,
				'flex-width'         => true,
				'flex-height'        => true,
				'wp-head-callback'   => 'unax_header_style',
			)
		)
	);
}


/**
 * Styles the header image and text displayed on the blog.
 *
 * @see unax_custom_header_setup().
 */
function unax_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
	// Has the text been hidden?
	if ( ! display_header_text() ) :
		?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
	else :
		?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}


/**
 * Displays custom header.
 */
function unax_custom_header() {
	if ( ! has_header_image() ) {
		return;
	}

	if ( is_page_template( 'templates/full-width.php' ) ) {
		return;
	}

	$custom_header_wrapper_class = apply_filters( 'unax_custom_header_class', 'custom-header-wrapper' );
	$custom_header_class = apply_filters( 'unax_custom_header_class', 'custom-header' );

	return printf(
		'<div class="%s"><img src="%s" class="%s" alt="%s"></div>',
		esc_attr( $custom_header_wrapper_class ),
		esc_url( get_header_image() ),
		esc_attr( $custom_header_class ),
		''
	);
}
