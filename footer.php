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
					// translators: Footer credits url.
					esc_url( apply_filters( 'unax_powered_by_url', __( 'https://wordpress.org/', 'unax' ) ) ),
					// translators: Footer credits text.
					esc_html( apply_filters( 'unax_powered_by_text', __( 'Proudly powered by WordPress', 'unax' ) ) )
				);
 			?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
