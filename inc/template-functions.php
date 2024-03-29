<?php
/**
 * Template Functions
 *
 * @package unax
 */

/**
 * Define colors for editor palette
 */
function unax_default_colors() {
	return array(
		'primary'   => '#007bff',
		'secondary' => '#6c757d',
		'success'   => '#28a745',
		'danger'    => '#dc3545',
		'warning'   => '#ffc107',
		'info'      => '#17a2b8',
		'white'     => '#fff',
		'light'     => '#f8f9fa',
		'dark'      => '#343a40',
		'black'     => '#000',
	);
}

/**
 * Define colors for editor palette
 */
function unax_editor_color_palette() {
	$unax_theme_default_colors = unax_default_colors();

	$unax_theme_colors = array();
	$mods              = get_theme_mods();

	foreach ( $unax_theme_default_colors as $key => $value ) {
		$unax_theme_colors[ $key ] = empty( $mods[ sprintf( 'unax_editor_color_palette_%s', $key ) ] ) ? $value : $mods[ sprintf( 'unax_editor_color_palette_%s', $key ) ]; // phpcs:ignore
		$unax_theme_colors[ $key ] = apply_filters( sprintf( 'unax_editor_color_palette_%s', $key ), $unax_theme_colors[ $key ] ); // phpcs:ignore
	}

	return $unax_theme_colors;
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

	/*
	 * Add colors palette to the editor.
	 */
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

	/**
	 * Default block styles.
	 *
	 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#default-block-styles
	 */
	add_theme_support( 'wp-block-styles' );

	/**
	 * Responsive embeds.
	 *
	 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
	 */
	add_theme_support( 'responsive-embeds' );

	/*
	* Adds starter content to highlight the theme on fresh sites.
	* This is done conditionally to avoid loading the starter content on every
	* page load, as it is a one-off operation only needed once in the customizer.
	*/
	if ( is_customize_preview() ) {
		get_template_part( 'inc/starter-content', '' );
		add_theme_support( 'starter-content', unax_get_starter_content() );
	}

	/**
	 * Add support of WooCommerce.
	 *
	 * @link https://woocommerce.com/document/woocommerce-theme-developer-handbook/
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
}

/**
 * Registers an editor stylesheet for the theme.
 */
function unax_add_editor_style() {
	wp_enqueue_style(
		'custom-editor-style',
		get_template_directory_uri() . '/dist/css/editor-style.css',
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
			'name'          => esc_html__( 'Top widget area', 'unax' ),
			'id'            => 'top-widget-area',
			'description'   => esc_html__( 'Add widgets below header.', 'unax' ),
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
 * Top widget area.
 */
function unax_top_widget_area() {
	if ( ! is_active_sidebar( 'top-widget-area' ) ) {
		return;
	}

	echo sprintf( '<div class="widget-area top-widget-area text-center %s">', esc_attr( apply_filters( 'unax_container_class', 'container' ) ) );
	dynamic_sidebar( 'top-widget-area' );
	echo '</div>';
}


/**
 * Enqueue scripts and styles.
 */
function unax_scripts() {
	wp_enqueue_style( 'unax', get_template_directory_uri() . '/style.min.css', array(), UNAX_THEME_VERSION );
	wp_add_inline_style( 'unax', unax_inline_style() );

	if ( is_rtl() ) {
		wp_enqueue_style( 'unax-rtl', get_template_directory_uri() . '/dist/css/style-rtl.css', array( 'unax' ), UNAX_THEME_VERSION );
	}

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
 * Check if is WooCommerce cart, checkout or account page.
 *
 * @return bool
 */
function unax_is_woocommerce_page() {
	if ( ! function_exists( 'is_cart' ) || ! function_exists( 'is_checkout' ) || ! function_exists( 'is_account_page' ) ) {
		return false;
	}

	if ( is_cart() || is_checkout() || is_account_page() ) {
		return true;
	}

	return false;
}


/**
 * Unax theme wrapper start.
 */
function unax_get_sidebar() {
	get_sidebar();
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

	if ( unax_is_woocommerce_page() ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}


/**
 * Unax theme wrapper start.
 */
function unax_woocommerce_wrapper_start() {
	printf( " <div id=\"content\" class=\"site-content no-sidebar %s\">\n", esc_attr( apply_filters( 'unax_container_class', 'container' ) ) );
	echo '<main id="primary" class="site-main">';
}


/**
 * Unax theme wrapper end.
 */
function unax_woocommerce_wrapper_end() {
	echo "	</main>\n";
	get_sidebar();
	echo '</div>';
}


/**
 * Archive loop container class.
 *
 * @param string $class Class names.
 * @return string
 */
function unax_loop_class( $class = '' ) {
	$archive_loop_class_array = [];

	$archive_loop_class_array[] = 'archive-loop';

	if ( 'card' === unax_archive_post_content() ) {
		$archive_loop_class_array[] = unax_grid_columns();
		$archive_loop_class_array[] = 'card-columns';
	}

	if ( ! empty( $class ) ) {
		$archive_loop_class_array[] = $class;
	}

	$archive_loop_class = apply_filters( 'unax_archive_loop_class', $archive_loop_class_array );

	return implode( ' ', $archive_loop_class );
}


/**
 * Get archive display option.
 *
 * @return string
 */
function unax_archive_post_content() {
	$archive_post_content_default = 'excerpt';

	$archive_post_content = get_theme_mod( 'archive_display', $archive_post_content_default );

	if ( ! in_array( $archive_post_content, array( 'card', 'excerpt' ), true ) ) {
		$archive_post_content = $archive_post_content_default;
	}

	if ( 'post' !== get_post_type() ) {
		$archive_post_content = get_post_type();
	}

	/*
	 * Apply filter to archive display.
	 */
	return apply_filters( 'unax_archive_post_content', $archive_post_content );
}


/**
 * Get columns count for post grid.
 */
function unax_grid_columns() {
	$grid_columns_default = 3;

	$grid_columns = (int) get_theme_mod( 'grid_columns', $grid_columns_default );

	/*
	 * Apply filter to columns count.
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
			$args->after .= '<button class="toggle sub-menu-toggle fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="' . absint( $toggle_duration ) . '" aria-expanded="false"><span class="screen-reader-text">' . __( 'Submenu', 'unax' ) . '</span><img src="' . esc_url( get_template_directory_uri() ) . '/dist/icons/chevron-down-solid.svg"></button>';
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
 * Extends allowed html for wp_kses.
 *
 * @param array  $tags An array of arguments.
 * @param string $context Menu item.
 *
 * @return array
 */
function unax_wp_kses_allowed_html( $tags, $context ) {
	if ( 'post' === $context ) {
		$tags['iframe'] = array(
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
		);
	}
	return $tags;
}


/**
 * Add a preview of embeded content.
 *
 * @return string
 */
function unax_block_core_embed_preview() {
	$core_embeds = array(
		'youtube',
		'wordpress-tv',
	);

	$blocks = parse_blocks( get_the_content() );
	foreach ( $core_embeds as $core_embed ) {
		if ( ! has_block( 'core-embed/' . $core_embed ) ) {
			return;
		}

		foreach ( $blocks as $block ) {
			if ( 'core-embed/' . $core_embed === $block['blockName'] ) {
				$block['attrs']['url']              = esc_url( $block['attrs']['url'] );
				$block['attrs']['type']             = esc_attr( $block['attrs']['type'] );
				$block['attrs']['providerNameSlug'] = esc_attr( $block['attrs']['providerNameSlug'] );
				$block['attrs']['className']        = esc_attr( $block['attrs']['className'] );

				add_filter( 'wp_kses_allowed_html', 'unax_wp_kses_allowed_html', 10, 2 );

				return apply_filters( 'the_content', render_block( $block ) ); // phpcs:ignore.
			}
		}
	}
}

/**
 * Register block styles.
 */
function unax_register_block_styles() {
	$blocks = array(
		'columns',
		'coverImage',
		'group',
		'gallery',
		'heading',
		'html',
		'image',
		'paragraph',
		'shortcode',
		'subhead',
		'table',
		'textColumns',
		'video',
	);

	foreach ( $blocks as $block ) {
		register_block_style(
			'core/' . $block,
			array(
				'name'         => 'container',
				'label'        => __( 'Container', 'unax' ),
			)
		);
	}
}
unax_register_block_styles();
