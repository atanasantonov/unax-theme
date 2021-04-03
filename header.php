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
	<?php unax_wp_body_open(); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'unax' ); ?></a>
		<header id="masthead" class="site-header">
			<?php
			/**
			 * Hook: unax_header
			 *
			 * @hooked unax_header_top - 10
			 * @hooked unax_main_navigation - 30
			 * @hooked unax_custom_header - 40
			 * @hooked unax_breadcrumbs (Yoast compatible) - 50
			 */
			do_action( 'unax_header' );
			?>

		</header><!-- .site-header -->
		<?php get_template_part( 'template-parts/modal-menu' ); ?>
