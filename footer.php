<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Unax
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info container text-center">

			<?php
			if ( has_nav_menu( 'footer-menu' ) ) :
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
					)
				);
			endif;
			?>

			<?php dynamic_sidebar( 'footer-widget-area' ); ?>
			<br>
			<?php
				printf(
					'<a href="%s" target="_blank">%s</a>',
					'https://wordpress.org/',
					'Proudly powered by WordPress'
				);
 			?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
