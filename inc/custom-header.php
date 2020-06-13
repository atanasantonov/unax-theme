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
				'height'             => 618,
				'flex-width'         => true,
	   			'flex-height'        => true,
			)
		)
	);
}
