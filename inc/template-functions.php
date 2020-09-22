<?php
/**
 * Template Functions
 *
 * @package unax
 */

/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
function unax_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on unax, use a find and replace
	 * to change 'unax' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'unax', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-menu' 	=> esc_html__( 'Primary menu', 'unax-theme' ),
			'mobile-menu' 	=> esc_html__( 'Mobile menu', 'unax-theme' ),
			'footer-menu' 	=> esc_html__( 'Footer menu', 'unax-theme' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'unax_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'width'       => 200,
			'height'      => 124,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

}

/**
 * Registers an editor stylesheet for the theme.
 */
function unax_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}

/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function unax_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'unax-theme' ),
			'id'            => 'sidebar-main',
			'description'   => esc_html__( 'Add widgets here.', 'unax-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget Area', 'unax-theme' ),
		'id'            => 'header-widget-area',
		'description'   => esc_html__( 'Add widgets here.', 'unax-theme' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Primary Menu Widget Area', 'unax-theme' ),
		'id'            => 'primary-menu-widget-area',
		'description'   => esc_html__( 'Add widgets here.', 'unax-theme' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'unax-theme' ),
		'id'            => 'footer-widget-area',
		'description'   => esc_html__( 'Add widgets here.', 'unax-theme' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

}


/**
* Enqueue scripts and styles.
*/
function unax_scripts() {

	wp_enqueue_style( 'unax-style', get_stylesheet_uri(), array(), THEME_VERSION );

	wp_style_add_data( 'unax-style', 'rtl', 'replace' );

	wp_enqueue_script( 'unax-navigation', get_template_directory_uri() . '/dist/js/index.min.js', array( 'jquery' ), THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function unax_body_classes( $classes ) {

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( !is_active_sidebar( 'sidebar-main' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}


/**
 * Get columns count for post grid
 */
function unax_grid_columns() {

	$grid_columns_default = 3;

	$grid_columns = (int)get_theme_mod( 'grid_columns', $grid_columns_default );

	/*
	 * Apply filter to columns count
	 */
	$grid_columns = (int)apply_filters( 'unax_grid_columns', $grid_columns_default );

	if( empty( $grid_columns ) || $grid_columns < 1 || $grid_columns > 6 ) {
		$grid_columns = $grid_columns_default;
	}

	return 'columns-' . $grid_columns;

}


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function unax_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}


/**
 * Add a Sub Nav Toggle to the Expanded Menu and Mobile Menu.
 *
 * @param stdClass $args An array of arguments.
 * @param string   $item Menu item.
 * @param int      $depth Depth of the current menu item.
 *
 * @return stdClass $args An object of wp_nav_menu() arguments.
 */
function unax_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

	// Add sub menu toggles to the Expanded Menu with toggles.
	if ( isset( $args->show_toggles ) && $args->show_toggles ) {

		// Wrap the menu item link contents in a div, used for positioning.
		$args->before = '<span class="ancestor-wrapper">';
		$args->after  = '';

		// Add a toggle to items with children.
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

			$toggle_target_string = '.menu-modal .menu-item-' . $item->ID . ' > .sub-menu';
			$toggle_duration      = unax_toggle_duration();

			// Add the sub menu toggle.
			$args->after .= '<button class="toggle sub-menu-toggle fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="' . absint( $toggle_duration ) . '" aria-expanded="false"><span class="screen-reader-text">' . __( 'Submenu', 'unax-theme' ) . '</span><i class="fas fa-chevron-down"></i></button>';

		}

		// Close the wrapper.
		$args->after .= '</span><!-- .ancestor-wrapper -->';

		// Add sub menu icons to the primary menu without toggles.
	} elseif ( 'primary' === $args->theme_location ) {
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$args->after = '<span class="icon"></span>';
		} else {
			$args->after = '';
		}
	}

	return $args;

}


/**
 * Toggle animation duration in milliseconds.``
 *
 * @return integer Duration in milliseconds
 */
function unax_toggle_duration() {
	/**
	 * Filters the animation duration/speed used usually for submenu toggles.
	 *
	 * @since 1.0
	 *
	 * @param integer $duration Duration in milliseconds.
	 */
	$duration = apply_filters( 'unax_toggle_duration', 250 );

	return $duration;
}


/**
 * Add Facebook Messanger button
 *
 * @return void
 */
function unax_facebook_messanger() {

	$facebook_page = get_theme_mod( 'facebook_page', '' );

	if( empty( $facebook_page ) ) {
		return;
	}

	?>
    <a
		href="<?php echo esc_url( 'https://m.me/' . $facebook_page ) ?>"
		class="fb-messanger"
		target="_blank"
		title="<?php echo esc_attr__( 'Facebook Message', 'unax-theme' ); ?>"
		>
		<svg width="60px" height="60px" viewBox="0 0 60 60">
			<svg x="0" y="0" width="60px" height="60px">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<g>
						<circle fill="#4267B2" cx="30" cy="30" r="30"></circle>
						<svg x="10" y="10"><g transform="translate(0.000000, -10.000000)" fill="#FFFFFF"><g id="logo" transform="translate(0.000000, 10.000000)"><path d="M20,0 C31.2666,0 40,8.2528 40,19.4 C40,30.5472 31.2666,38.8 20,38.8 C17.9763,38.8 16.0348,38.5327 14.2106,38.0311 C13.856,37.9335 13.4789,37.9612 13.1424,38.1098 L9.1727,39.8621 C8.1343,40.3205 6.9621,39.5819 6.9273,38.4474 L6.8184,34.8894 C6.805,34.4513 6.6078,34.0414 6.2811,33.7492 C2.3896,30.2691 0,25.2307 0,19.4 C0,8.2528 8.7334,0 20,0 Z M7.99009,25.07344 C7.42629,25.96794 8.52579,26.97594 9.36809,26.33674 L15.67879,21.54734 C16.10569,21.22334 16.69559,21.22164 17.12429,21.54314 L21.79709,25.04774 C23.19919,26.09944 25.20039,25.73014 26.13499,24.24744 L32.00999,14.92654 C32.57369,14.03204 31.47419,13.02404 30.63189,13.66324 L24.32119,18.45264 C23.89429,18.77664 23.30439,18.77834 22.87569,18.45674 L18.20299,14.95224 C16.80079,13.90064 14.79959,14.26984 13.86509,15.75264 L7.99009,25.07344 Z"></path></g></g></svg>
					</g>
				</g>
			</svg>
		</svg>
	</a>
	<?php
	return;
}
