<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Unax
 */

if ( unax_is_woocommerce_page() ) {
	return;
}

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<aside id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
	<?php
endif;
