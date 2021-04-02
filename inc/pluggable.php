<?php
/**
 * Template Pluggable Functions
 *
 * @package unax
 */

if ( ! function_exists( 'unax_header_top' ) ) {

	/**
	 * Header top
	 */
	function unax_header_top() { ?>
	<div class="header-top">
		<div class="<?php echo esc_attr( apply_filters( 'unax_container_class', 'container' ) ); ?>">
			<div class="site-branding">
			<?php

			if ( has_custom_logo() ) :
				the_custom_logo();
			endif;

			if ( display_header_text() ) :

				?>
				<div class="site-branding-texts">

					<?php if ( is_home() || is_front_page() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( bloginfo( 'name' ) ); ?></a></h1>
					<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( bloginfo( 'name' ) ); ?></a></p>
					<?php endif; ?>

					<?php $unax_description = get_bloginfo( 'description', 'display' ); ?>
					<?php if ( $unax_description ) : ?>
					<p class="site-description"><?php echo esc_html( $unax_description ); ?></p>
					<?php endif; ?>

				</div><!-- .site-branding-text -->
				<?php endif; ?>

			</div><!-- .site-branding -->

			<?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'header-widget-area' ); ?>
			</div>
			<?php endif; ?>

		</div><!-- .container -->

	</div><!-- .header-top -->
		<?php
	}
}


if ( ! function_exists( 'unax_main_navigation' ) ) {

	/**
	 * Main navigation
	 */
	function unax_main_navigation() {
		?>
		<div class="main-navigation">

			<?php
			/*
			 * Apply the filters to container
			 */
			?>
			<div class="<?php echo esc_attr( apply_filters( 'unax_container_class', 'container' ) ); ?>">

				<button
					class="toggle nav-toggle mobile-nav-toggle"
					data-toggle-target=".menu-modal"
					data-toggle-body-class="showing-menu-modal"
					aria-expanded="false"
					data-set-focus=".close-nav-toggle"
					>
					<span class="toggle-inner">
						<i class="fas fa-bars"></i>
						<span class="screen-reader-text">
							<?php esc_html_e( 'Menu', 'unax' ); ?>
						</span>
					</span>
				</button><!-- .nav-toggle -->

				<?php
				$container_class = is_active_sidebar( 'primary-menu-widget-area' ) ? ' has-widget-area' : '';
				if ( has_nav_menu( 'primary' ) ) :
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'menu_class'      => 'primary-menu',
							'container_class' => 'primary-menu-wrapper' . $container_class,
							'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
							'fallback_cb'     => false,
						)
					);
				endif;
				?>

				<?php if ( is_active_sidebar( 'primary-menu-widget-area' ) ) : ?>
				<div class="widget-area text-right">
					<?php dynamic_sidebar( 'primary-menu-widget-area' ); ?>
				</div>
				<?php endif; ?>

			</div><!-- .container -->

		</div><!-- .main-navigation -->
		<?php
	}
}


if ( ! function_exists( 'unax_breadcrumbs' ) ) {

	/**
	 * Breadcrumbs (Yoast compatible)
	 */
	function unax_breadcrumbs() {
		if ( ! is_home() && ! is_front_page() ) {
			?>
		<div class="breadcrumbs">
			<div class="<?php echo esc_attr( apply_filters( 'unax_container_class', 'container' ) ); ?>">
			<?php

			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
			}

			?>
			</div>
		</div>
			<?php
		}
	}
}


if ( ! function_exists( 'unax_archive_header' ) ) {
	/**
	 * Archive header
	 */
	function unax_archive_header() {
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="archive-description">', '</div>' );
	}
}


if ( ! function_exists( 'unax_loop_class' ) ) {
	/**
	 * Archive header
	 *
	 * @param string $class Class names.
	 */
	function unax_loop_class( $class = '' ) {
		$archive_loop_class_array = [];

		$archive_loop_class_array[] = 'archive-loop';
		$archive_loop_class_array[] = unax_grid_columns();
		$archive_loop_class_array[] = 'card-columns';

		if ( ! empty( $class ) ) {
			$archive_loop_class_array[] = $class;
		}

		$archive_loop_class = apply_filters( 'unax_archive_loop_class', $archive_loop_class_array );

		return implode( ' ', $archive_loop_class );
	}
}
