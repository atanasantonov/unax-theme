<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Unax
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">

		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'unax' ); ?>
		</a>

		<header id="masthead" class="site-header">

			<div class="header-top">

				<?php
				/*
				 * Apply the filters to wrapper
				 */
				?>
				<div class="<?php echo esc_attr( apply_filters( 'unax_header_top_container_class', 'container' ) ) ?>">

					<div class="site-branding">

						<?php

						if( has_custom_logo() ) :
							the_custom_logo();
						endif;

						?>

						<?php if( display_header_text() ) : ?>
						<div class="site-header-text">

							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

							<?php

							$unax_description = get_bloginfo( 'description', 'display' );
							if ( $unax_description ) : ?>
								<p class="site-description"><?php echo $unax_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
							<?php endif; ?>

						</div><!-- .site-branding -->
						<?php endif; ?>

					</div><!-- .site-branding -->

					<div class="sidebar">123
						<?php dynamic_sidebar( 'sidebar-header' ); ?>
					</div>

				</div><!-- .container -->

			</div><!-- .header-top -->

			<div class="main-navigation">

				<?php
				/*
				 * Apply the filters to container
				 */
				?>
				<div class="<?php echo esc_attr( apply_filters( 'unax_main_navigation_container_class', 'container' ) ) ?>">

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
								<?php _e( 'Menu', 'unax' ); ?>
							</span>
						</span>
					</button><!-- .nav-toggle -->

					<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Menu', 'unax' ); ?>" role="navigation">
						<ul class="primary-menu reset-list-style">
						<?php
						if ( has_nav_menu( 'primary' ) ) :
							wp_nav_menu(
								array(
									'container'  => '',
									'items_wrap' => '%3$s',
									'theme_location' => 'primary',
								)
							);
						endif;
						?>
						</ul>
					</nav><!-- .primary-menu-wrapper -->

				</div><!-- .container -->

			</div><!-- .main-navigation -->

		</header><!-- .site-header -->

		<?php get_template_part( 'template-parts/modal-menu' ); ?>

		<div id="search-form-container" class="search-form-container">
			<div class="search-form-container-inner">
				<div class="text-right">
					<a href="#" id="search-form-close" class="search-form-close">&times;</a>
				</div>
				<?php get_search_form(); ?>
			</div>
		</div>

		<?php if( !is_home() && !is_front_page() ) : ?>
		<div class="breadcrumbs">
			<div class="container">
				<?php do_action( 'unax_breadcrumb' ); ?>
			</div>
		</div>
		<?php endif; ?>

		<div id="content" class="site-content">
