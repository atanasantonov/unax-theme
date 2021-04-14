<?php
/**
 * Displays the main navigation
 *
 * @package Unax
 */

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
