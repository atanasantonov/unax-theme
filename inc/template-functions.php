<?php
/**
 * Template Functions
 *
 * @package unax
 */

/**
 * Define colors for editor palette
 */
function unax_editor_color_palette() {
	return array(
		'primary'   => apply_filters( 'unax_editor_color_palette_primary', '#007bff' ),
		'secondary' => apply_filters( 'unax_editor_color_palette_secondary', '#6c757d' ),
		'success'   => apply_filters( 'unax_editor_color_palette_success', '#28a745' ),
		'danger'    => apply_filters( 'unax_editor_color_palette_danger', '#dc3545' ),
		'warning'   => apply_filters( 'unax_editor_color_palette_warning', '#ffc107' ),
		'info'      => apply_filters( 'unax_editor_color_palette_info', '#17a2b8' ),
		'white'     => apply_filters( 'unax_editor_color_palette_white', '#fff' ),
		'light'     => apply_filters( 'unax_editor_color_palette_light', '#f8f9fa' ),
		'dark'      => apply_filters( 'unax_editor_color_palette_dark', '#343a40' ),
		'black'     => apply_filters( 'unax_editor_color_palette_black', '#000' ),
	);
}

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
			'primary' => esc_html__( 'Primary menu', 'unax' ),
			'mobile'  => esc_html__( 'Mobile menu', 'unax' ),
			'footer'  => esc_html__( 'Footer menu', 'unax' ),
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
			'responsive-embeds',
			'navigation-widgets',
		)
	);

	// Add colors palette to the editor.
	$colors = unax_editor_color_palette();
	add_theme_support(
		'editor-color-palette',
		apply_filters(
			'unax_editor_color_palette',
			array(
				array(
					'name' => __( 'Primary Color', 'unax' ),
					'slug' => 'primary',
					'color' => $colors['primary'],
				),
				array(
					'name' => __( 'Secondary Color', 'unax' ),
					'slug' => 'secondary',
					'color' => $colors['secondary'],
				),
				array(
					'name' => __( 'Success Color', 'unax' ),
					'slug' => 'success',
					'color' => $colors['success'],
				),
				array(
					'name' => __( 'Danger color', 'unax' ),
					'slug' => 'danger',
					'color' => $colors['danger'],
				),
				array(
					'name' => __( 'Warning color', 'unax' ),
					'slug' => 'warning',
					'color' => $colors['warning'],
				),
				array(
					'name' => __( 'Info Color', 'unax' ),
					'slug' => 'info',
					'color' => $colors['info'],
				),
				array(
					'name' => __( 'White', 'unax' ),
					'slug' => 'white',
					'color' => $colors['white'],
				),
				array(
					'name' => __( 'Light', 'unax' ),
					'slug' => 'light',
					'color' => $colors['light'],
				),
				array(
					'name' => __( 'Dark', 'unax' ),
					'slug' => 'dark',
					'color' => $colors['dark'],
				),
				array(
					'name' => __( 'Black', 'unax' ),
					'slug' => 'black',
					'color' => $colors['black'],
				),
			)
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
		apply_filters(
			'unax_custom_logo',
			array(
				'width'       => 200,
				'height'      => 124,
				'flex-width'  => true,
				'flex-height' => true,
			)
		)
	);

	/**
	 * Add support of possibility to define a “wide” or “full” alignment in some blocks.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/
	 */
	add_theme_support( 'align-wide' );

	/*
	* Adds starter content to highlight the theme on fresh sites.
	* This is done conditionally to avoid loading the starter content on every
	* page load, as it is a one-off operation only needed once in the customizer.
	*/
	if ( is_customize_preview() ) {
		require get_template_directory() . '/inc/starter-content.php';
		add_theme_support( 'starter-content', unax_get_starter_content() );
	}
}

/**
 * Registers an editor stylesheet for the theme.
 */
function unax_add_editor_style() {
	wp_enqueue_style(
		'custom-editor-style',
		get_template_directory_uri() . '/editor-style.css',
		array( 'wp-edit-blocks' ),
		wp_get_theme()->get( 'Version' )
	);
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function unax_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'unax' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets to the sidebar.', 'unax' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header', 'unax' ),
			'id'            => 'header-widget-area',
			'description'   => esc_html__( 'Add widgets to header.', 'unax' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Primary Menu', 'unax' ),
			'id'            => 'primary-menu-widget-area',
			'description'   => esc_html__( 'Add widgets to right side of primary menu.', 'unax' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Menu', 'unax' ),
			'id'            => 'footer-menu-widget-area',
			'description'   => esc_html__( 'Add widgets to right side of footer menu.', 'unax' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'unax' ),
			'id'            => 'footer-widget-area',
			'description'   => esc_html__( 'Add widgets to footer.', 'unax' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Credits Left', 'unax' ),
			'id'            => 'footer-credits-left-widget-area',
			'description'   => esc_html__( 'Add widgets to footer credits left area.', 'unax' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Credits Right', 'unax' ),
			'id'            => 'footer-credits-right-widget-area',
			'description'   => esc_html__( 'Add widgets to footer credits right area.', 'unax' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
}


/**
 * Enqueue scripts and styles.
 */
function unax_scripts() {
	wp_enqueue_style( 'unax', get_template_directory_uri() . '/style.css', array(), UNAX_THEME_VERSION );

	wp_style_add_data( 'unax', 'rtl', 'replace' );

	wp_add_inline_style( 'unax', unax_inline_style() );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/dist/vendor/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '4.4.1', true );
	wp_enqueue_script( 'unax', get_template_directory_uri() . '/dist/js/index.min.js', array( 'jquery', 'bootstrap' ), UNAX_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


/**
 * Adds inline css.
 *
 * @return string
 */
function unax_inline_style() {
	return unax_color_palette_css();
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
	if ( ! is_active_sidebar( 'sidebar-main' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}


/**
 * Get columns count for post grid
 */
function unax_grid_columns() {
	$grid_columns_default = 3;

	$grid_columns = (int) get_theme_mod( 'grid_columns', $grid_columns_default );

	/*
	 * Apply filter to columns count
	 */
	$grid_columns = (int) apply_filters( 'unax_grid_columns', $grid_columns );

	if ( empty( $grid_columns ) ) {
		$grid_columns = $grid_columns_default;
	}

	if ( $grid_columns < 1 ) {
		$grid_columns = 1;
	}

	if ( $grid_columns > 6 ) {
		$grid_columns = 6;
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
			$toggle_duration      = apply_filters( 'unax_toggle_duration', 250 );

			// Add the sub menu toggle.
			$args->after .= '<button class="toggle sub-menu-toggle fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="' . absint( $toggle_duration ) . '" aria-expanded="false"><span class="screen-reader-text">' . __( 'Submenu', 'unax' ) . '</span><i class="fas fa-chevron-down"></i></button>';
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
