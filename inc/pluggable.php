<?php
/**
 * Template Pluggable Functions
 *
 * @package unax
 */

if ( ! function_exists( 'unax_archive_header' ) ) :
	/**
	 * Archive header
	 */
	function unax_archive_header() {
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="archive-description">', '</div>' );
	}
endif;
