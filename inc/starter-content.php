<?php
/**
 * Unax Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * @package Unax
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `unax_starter_content` filter before returning.
 *
 * @since Unax 1.1.3
 *
 * @return array A filtered array of args for the starter_content.
 */
function unax_get_starter_content() {

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(

		// // Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'     => array(
			'about',
			'contact',
			'blog',
		),

		// Default to a static front page and assign the front and posts pages.
		'options'   => array(
			'show_on_front'  => 'posts',
		),

		// Place example widgets.
		'widgets' => array(
			// Place core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'search',
				'recent-posts',
				'archives',
				'tags-cloud',
			),

			// Add the example text widget to header area.
			'header-widget-area' => array(
				'example_header_widget' => array(
					'text',
					array(
						'title' => esc_html__( 'Example widget here', 'unax' ),
					),
				),
			),

			// Add the example text widget to the primary menu area.
			'primary-menu-widget-area' => array(
				'example_primary_menu_widget' => array(
					'text',
					array(
						'title' => esc_html__( 'Another widget', 'unax' ),
					),
				),
			),

			// Add the example text widget to footer area.
			'footer-widget-area' => array(
				'example_footer_widget' => array(
					'text',
					array(
						'title' => esc_html__( 'Widget title', 'unax' ),
						'text'  => esc_html__( 'Widget text', 'unax' ),
					),
				),
			),
		),

		// Set up nav menus for each area registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "primary-menu" location.
			'primary' => array(
				'name' => esc_html__( 'Primary menu', 'unax' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
				),
			),

			// Assign a menu to the "mobile-menu" location.
			'mobile' => array(
				'name' => esc_html__( 'Mobile menu', 'unax' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
				),
			),

			// Assign a menu to the "footer-menu" location.
			'footer' => array(
				'name' => esc_html__( 'Footer menu', 'unax' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_contact',
				),
			),
		),
	);

	/**
	 * Filters the array of starter content.
	 *
	 * @since Unax 1.1.3
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'unax_starter_content', $starter_content );
}
