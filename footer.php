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
		<div class="container">
			<div class="row">

				<div class="col-12<?php echo is_active_sidebar( 'footer-menu-widget-area' ) ? ' col-lg-8' : ''; ?> text-center text-lg-left footer-menu">
				<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'footer',
							'menu_class'      => 'footer-menu',
							'container_class' => 'footer-menu-wrapper',
							'items_wrap'      => '<ul id="footer-menu-list" class="%2$s">%3$s</ul>',
							'fallback_cb'     => false,
						)
					);
					?>
				</div><!-- .footer-menu -->

				<?php if ( is_active_sidebar( 'footer-menu-widget-area' ) ) : ?>
				<div class="col-12 col-lg-4 text-center text-lg-right footer-menu-widget-area">
					<?php dynamic_sidebar( 'footer-menu-widget-area' ); ?>
				</div><!-- .footer-menu-widget-area -->
				<?php endif; ?>

			</div>

			<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
			<div class="row footer-widget-area">
				<div class="col-12 text-center text-lg-left">
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
				</div>
			</div><!-- .footer-widget-area -->
			<?php endif; ?>

			<div class="row site-info">
				<div class="col-12 col-lg-6 text-center text-lg-left">
				<?php

					// Footer credits left widget area.
				if ( is_active_sidebar( 'footer-credits-left-widget-area' ) ) {
					dynamic_sidebar( 'footer-credits-left-widget-area' );
				}

					// Get theme mod from site identity section.
				if ( ! empty( get_theme_mod( 'unax_display_footer_credits', '' ) ) ) {
					echo '<div class="credits">';

					printf(
						'%s <a href="%s" target="_blank">%s</a>',
						// translators: WordPress credits text.
						esc_html( apply_filters( 'unax_powered_by_text', __( 'Powered by', 'unax' ) ) ),
						// translators: WordPress credits url.
						esc_url( apply_filters( 'unax_powered_by_url', __( 'https://wordpress.org', 'unax' ) ) ),
						'WordPress'
					);

					echo ' | ' . esc_html__( 'Theme', 'unax' ) . ' ';

					printf(
						'<a href="%s" target="_blank">%s</a>',
						// translators: Theme credits url.
						esc_url( apply_filters( 'unax_theme_credits_url', __( 'https://unax.org/unax-theme', 'unax' ) ) ),
						// translators: Theme credits text.
						esc_html( apply_filters( 'unax_theme_credits_text', __( 'Unax', 'unax' ) ) )
					);

					echo '</div>';
				}

				?>
				</div>

				<div class="col-12 col-lg-6 text-center text-lg-right">
				<?php
					// Footer credits right widget area.
				if ( is_active_sidebar( 'footer-credits-right-widget-area' ) ) {
					dynamic_sidebar( 'footer-credits-right-widget-area' );
				}

					// Get theme mod from site identity section.
				if ( ! empty( get_theme_mod( 'unax_display_footer_title', '' ) ) ) {
					echo esc_html( bloginfo( 'name' ) );
				}
				?>
				</div>
			</div><!-- .site-info -->

		</div><!-- .container -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
