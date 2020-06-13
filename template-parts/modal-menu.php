<?php
/**
 * Displays the menu icon and modal
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<div class="menu-modal cover-modal" data-modal-target-string=".menu-modal">

	<div class="menu-modal-inner modal-inner">

		<div class="menu-wrapper section-inner">

			<div class="menu-top">

				<button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">

					<i class="fas fa-times fa-2x"></i>
					<span class="screen-reader-text">
						<?php _e( 'Затвори меню', 'unax' ); ?>
					</span>
				</button><!-- .nav-toggle -->

				<nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile menu', 'unax'); ?>" role="navigation">

					<?php
					wp_nav_menu(
						array(
							'container'      => '',
							'container_class'=> 'modal-menu',
							'items_wrap'     => '%3$s',
							'show_toggles'   => true,
							'theme_location' => 'mobile-menu',
							'depth'      	 => 2,
						)
					);
					?>

				</nav>

			</div><!-- .menu-top -->

		</div><!-- .menu-wrapper -->

	</div><!-- .menu-modal-inner -->

</div><!-- .menu-modal -->
