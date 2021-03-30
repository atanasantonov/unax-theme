<?php
/**
 * Updates related actions.
 *
 * @package Unax
 * @since 1.1.3
 */

/**
 * Migrate chaged menu locations and sidebars.
 *
 * Will be removed in 1.2.0
 *
 * @since 1.1.3
 */
function unax_migrate_menu_locations_and_sidebars() {

	// Get theme mods.
	$theme_mods = get_option( 'theme_mods_unax' );

	// Update menu locations.
	$nav_menu_locations = $theme_mods['nav_menu_locations'];
	$nav_menu_locations_needs_update = false;

	if ( array_key_exists( 'primary-menu', $nav_menu_locations ) ) {
		$nav_menu_locations_needs_update = true;
		$nav_menu_locations['primary'] = $nav_menu_locations['primary-menu'];
		unset( $nav_menu_locations['primary-menu'] );
	}

	if ( array_key_exists( 'mobile-menu', $nav_menu_locations ) ) {
		$nav_menu_locations_needs_update = true;
		$nav_menu_locations['mobile'] = $nav_menu_locations['mobile-menu'];
		unset( $nav_menu_locations['mobile-menu'] );
	}

	if ( array_key_exists( 'footer-menu', $nav_menu_locations ) ) {
		$nav_menu_locations_needs_update = true;
		$nav_menu_locations['footer'] = $nav_menu_locations['footer-menu'];
		unset( $nav_menu_locations['footer-menu'] );
	}

	if ( $nav_menu_locations_needs_update ) {
		set_theme_mod( 'nav_menu_locations', $nav_menu_locations );
	}

	// Update sidebar.
	if ( isset( $theme_mods['sidebars_widgets']['data'] ) && array_key_exists( 'sidebar-main', $theme_mods['sidebars_widgets']['data'] ) ) {
		$theme_mods['sidebars_widgets']['data']['sidebar-1'] = $theme_mods['sidebars_widgets']['data']['sidebar-main'];
		unset( $theme_mods['sidebars_widgets']['data']['sidebar-main'] );
		set_theme_mod( 'sidebars_widgets', $theme_mods['sidebars_widgets']['data'] );
	}

	$sidebars_widgets = get_option( 'sidebars_widgets' );
	if ( array_key_exists( 'sidebar-main', $sidebars_widgets ) ) {
		$sidebars_widgets['sidebar-1'] = $sidebars_widgets['sidebar-main'];
		unset( $sidebars_widgets['sidebar-main'] );
		update_option( 'sidebars_widgets', $sidebars_widgets );
	}

	// Update footer credits.
	if ( false === get_theme_mod( 'unax_display_footer_credits' ) ) {
		set_theme_mod( 'unax_display_footer_credits', '1' );
	}

	if ( false === get_theme_mod( 'unax_display_footer_title' ) ) {
		set_theme_mod( 'unax_display_footer_title', '1' );
	}
}
add_action( 'after_setup_theme', 'unax_migrate_menu_locations_and_sidebars', 1 );
