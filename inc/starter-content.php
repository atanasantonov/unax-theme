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

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'     => array(
			'front' => array(
				'post_type'    => 'page',
				'post_title'   => esc_html_x( 'Create your website with blocks', 'Theme starter content', 'unax' ),
				'post_content' => '
				<!-- wp:spacer {"height":50} -->
				<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:paragraph {"fontSize":"medium"} -->
				<p class="has-medium-font-size"><a href="https://wordpress.org/gutenberg/" target="_blank" rel="noreferrer noopener">' . esc_html_x( 'Say Hello to Gutenberg editor', 'Theme starter content', 'unax' ) . '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:spacer {"height":50} -->
				<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:heading {"level":3} -->
				<h3><strong>' . esc_html_x( 'Paragraph block', 'Theme starter content', 'unax' ) . '</strong></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html_x(
					'
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
					been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took
					a galley of type and scrambled it to make a type specimen book. It has survived not only five
					centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
					It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
					passages, and more recently with desktop publishing software like Aldus PageMaker including
					versions of Lorem Ipsum.
					',
					'Theme starter content',
					'unax'
				) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:spacer {"height":50} -->
				<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:heading {"level":3} -->
				<h3>Image block</h3>
				<!-- /wp:heading -->

				<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
				<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/dist/img/koral.jpg" alt="' . esc_attr__( 'Koral beach, Bulgaria', 'unax' ) . '"/></figure>
				<!-- /wp:image -->

				<!-- wp:spacer {"height":50} -->
				<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:heading {"level":3} -->
				<h3>' . esc_html_x( 'Columns block', 'Theme starter content', 'unax' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:paragraph -->
				<p>' . esc_html_x( 'Column 1', 'Theme starter content', 'unax' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:paragraph -->
				<p>' . esc_html_x( 'Column 2', 'Theme starter content', 'unax' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:paragraph -->
				<p>' . esc_html_x( 'Column 3', 'Theme starter content', 'unax' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->

				<!-- wp:spacer {"height":50} -->
				<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:heading {"level":3} -->
				<h3>' . esc_html_x( 'Media &amp; text block', 'Theme starter content', 'unax' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:media-text {"mediaType":"image","verticalAlignment":"center"} -->
				<div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center">
				<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/dist/img/koral.jpg" alt="' . esc_attr__( 'Koral beach, Bulgaria', 'unax' ) . '" class="size-full"/></figure>
				<div class="wp-block-media-text__content">
				<p>' . esc_html_x(
					'
					It is a long established fact that a reader will be distracted by the readable content of a
					page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
					normal distribution of letters, as opposed to using "Content here, content here", making it
					look like readable text.
					',
					'Theme starter content',
					'unax'
				) . '</p>
				</div></div>
				<!-- /wp:media-text -->

				<!-- wp:spacer {"height":50} -->
				<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->
				',
			),
			'about',
			'contact',
			'blog',
		),

		// Default to a static front page and assign the front and posts pages.
		'options'   => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{front}}',
			'page_for_posts' => '{{blog}}',
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
